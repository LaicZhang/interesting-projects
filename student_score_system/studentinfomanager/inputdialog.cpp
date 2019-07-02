#include "inputdialog.h"
#include "ui_inputdialog.h"
#include<QDebug>
#include<QFile>
#include<QTextStream>

InputDialog::InputDialog(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::InputDialog)
{
    ui->setupUi(this);
}

InputDialog::~InputDialog()
{
    delete ui;
}

void InputDialog::on_saveButton_clicked()//定义on_saveButton_clicked()函数
{
   QString name=ui->nameEdit->text();//从UI界面中获取nameEdit文本并赋值给name变量
   QString id=ui->idEdit->text();
   QString sex=ui->sexGroup->checkedButton()->text();
   QString birthday=ui->birthdaydateEdit->text();
   QString english=ui->englishEdit->text();
   QString math=ui->mathEdit->text();
   QString chinese=ui->chineseEdit->text();//从UI界面中获取ChineseEdit文本并复制给Chinese

   double total;
   total=english.toDouble()+math.toDouble()+chinese.toDouble();//用.toDouble()函数将成绩转换为double型
   QString totalStr=QString::number(total,'f',2);
   /*获得多选按钮被选中的按钮
   QString interest;
   QList<QAbstractButton *> ins=ui->interestGroup->buttons();
   for(int i=0;i<ins.size();i++)
       if(ins[i]->isChecked()) interest+=ins[i]->text()+" ";
    */
   QFile file("./student.txt");
   if(!file.open(QIODevice::WriteOnly|QIODevice::Text|QIODevice::Append))//打开方式为writeonly只写
   {return ;}
   QTextStream out(&file);
   out<<name<<" "<<id<<" "<<sex<<" "<<birthday<<" "<<english<<" "<<math<<" "<<chinese<<" "<<totalStr<<endl;//将数据输入到文件中
   file.close();//关闭文件

   ui->nameEdit->clear();//清空nameEdit框中的内容
   ui->idEdit->clear();
   ui->boyradioButton->setChecked(true);//设置boyradioButton多选按钮默认选项为true
   ui->girlradioButton->setChecked(false);
  /* 将多选按钮设置为不选状态
     for(int i=0;i<ins.size();i++)
       ins[i]->setChecked(false);
  */

    /*QString birthday=ui->birthdaydateEdit->text();
    QString name=ui->nameEdit->text();
    QString id=ui->idEdit->text();
    QString sex=ui->sexGroup->checkedButton()->text();
    QString interest;
    QList<QAbstractButton*> ins=ui->interestGroup->buttons();
    for(int i=0;i<ins.size();i++)
      if(ins[i]->isChecked())interest+=ins[i]->text()+" ";

    QFile file("./studentinfo.txt");
    if(!file.open(QIODevice::WriteOnly|QIODevice::Text|QIODevice::Append))
    {return ;}
    QTextStream out(&file);
    out<<name<<" "<<id<<" "<<sex<<" "<<birthday<<" "<<interest.trimmed()<<endl;
    file.close();
    ui->nameEdit->clear();
    ui->idEdit->clear();
    ui->boyradioButton->setChecked(true);
    ui->girlradioButton->setChecked(false);
    for(int i=0;i<ins.size();i++)
        ins[i]->setChecked(false);
        */
}

void InputDialog::on_quitButton_clicked()
{
    close();//退出
}
