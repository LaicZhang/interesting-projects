#include "editdialog.h"
#include "ui_editdialog.h"
#include<QFile>
#include<QTextStream>
#include<QDebug>
#include<QMessageBox>


EditDialog::EditDialog(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::EditDialog)
{
    ui->setupUi(this);
    this->stu_model=new QStandardItemModel;
    stu_model->setHorizontalHeaderItem(0,new QStandardItem(QObject::tr("姓名")));
    stu_model->setHorizontalHeaderItem(1,new QStandardItem(QObject::tr("学号")));
    stu_model->setHorizontalHeaderItem(2,new QStandardItem(QObject::tr("性别")));
    stu_model->setHorizontalHeaderItem(3,new QStandardItem(QObject::tr("出生日期")));
    //stu_model->setHorizontalHeaderItem(4,new QStandardItem(QObject::tr("interest")));
    stu_model->setHorizontalHeaderItem(4,new QStandardItem("英语"));
    stu_model->setHorizontalHeaderItem(5,new QStandardItem("数学"));
    stu_model->setHorizontalHeaderItem(6,new QStandardItem("语文"));
    stu_model->setHorizontalHeaderItem(7,new QStandardItem("总分"));

    ui->tableView->setModel(stu_model);     //在UI界面中展示出输入的数据


/*
    ui->tableView->setColumnWidth(0,100);
    ui->tableView->setColumnWidth(1,100);
    ui->tableView->setColumnWidth(2,100);
    ui->tableView->setColumnWidth(3,150);
    ui->tableView->setColumnWidth(4,150);
*/
    QFile file("./student.txt");    //给出文件打开路径
    if(!file.open(QIODevice::ReadOnly|QIODevice::Text))     //设置文件打开方式为readonly只读
    {return ;}
    QTextStream in(&file);

    while(!in.atEnd())      //判断是否是文件末尾，当不是文件末尾时，执行while循环
    {   QString s=in.readLine();
        stu_list.append(s);     //在stu_list列表后面追加s

    }
    showStudent();      //调用showStudent函数
    file.close();       //关闭文件


}
void EditDialog::showStudent()
{
    int row=0;
   for(int line=0;line<stu_list.size();line++)      //for循环输出文件内容
    {
    QString s=stu_list[line];
    QStringList stus=s.split(' ');
    for(int i=0;i<stus.size();i++)
      stu_model->setItem(row,i,new QStandardItem(stus[i]));
   /* QString interst;
    for(int i=4;i<stus.size();i++)
        interst+=stus[i]+" ";
    stu_model->setItem(row,4,new QStandardItem(interst));
    */
    row++;
   }
}

EditDialog::~EditDialog()
{
    delete ui;
}

void EditDialog::on_pushButton_clicked()        //定义on_pushButton_clicked函数
{
    int rows=stu_model->rowCount();
    for(int i=0;i<rows;i++)
    {
        stu_model->removeRow(0);
    }

    int index=ui->findcomboBox->currentIndex();
    QString inputFind=ui->searchEdit->text();       //searchEdit框中的内容赋值给inputFind，进行查找
    int row=0;
    for(int i=0;i<stu_list.size();i++)      //for循环，当syu_list.size()函数大于i时执行
    {
       QString s=stu_list[i];
       QStringList student=s.split(' ');        //s以‘ ’分隔
       if(index==0)
           if(inputFind!=student[0]) continue;      //如果student[0]不等于输入的需要查找的内容，跳出本次循环
       if(index==1)
             if(inputFind!=student[1]) continue;        //相似于if(inputFind!=student[0]) continue;
       if(index==2)
             if(inputFind!=student[2]) continue;        //相似于if(inputFind!=student[0]) continue;
       if(index==3)
             ui->searchEdit->setText("");

       for(int j=0;j<student.size();j++)        //for循环显示查找到的数据，直到全部显示
           stu_model->setItem(row,j,new QStandardItem(student[j]));
      /* QString interst;
       for(int j=4;j<student.size();j++)
           interst+=student[j]+" ";
       stu_model->setItem(row,4,new QStandardItem(interst));
       */
       row++;
    }
}

void EditDialog::on_delButton_clicked()     //定义on_delButton_clicked函数
{
    int index=ui->tableView->currentIndex().row();
//弹出窗口，询问确认是否删除
    if(QMessageBox::Yes==QMessageBox::information(this,"确认删除","确定要删除吗？",QMessageBox::Yes,QMessageBox::No))
   {    stu_model->removeRow(index);//界面中删除数据
        stu_list.removeAt(index);//删除stu_list列表该数据

        QFile file("./student.txt");
        if(!file.open(QIODevice::WriteOnly|QIODevice::Text))
        {return;}
        QTextStream out(&file);
        for(int i=0;i<stu_list.size();i++)//for循环保存修改
        {
            out<<stu_list[i]<<endl;//保存
        }
    }
}


void EditDialog::on_modifyButton_clicked()//定义on_modifyButton_clicked函数
{
    int row=ui->tableView->currentIndex().row();
    QString newStr,newStr2;
    double total=0;
    for(int col=0;col<8;col++)
    {
        newStr+=stu_model->item(row,col)->text()+" ";//包含总成绩
        if(col<7) newStr2+=stu_model->item(row,col)->text()+" ";//不包含总成绩
        if(col>=4&&col<7)
        {  QString scoreStr=stu_model->item(row,col)->text().trimmed();//使表格里的数据同步改变
           double score=scoreStr.toDouble();
           total+=score;
        }
    }
    qDebug()<<"total:"<<total;
    QString totalStr=QString::number(total,'f',2);
    newStr2+=totalStr;
    qDebug()<<"newStr2:"<<newStr2;
    qDebug()<<"newStr:"<<newStr;
    QString oldStr=stu_list[row];
    qDebug()<<"oldStr:"<<oldStr;
    if(oldStr.trimmed()!=newStr.trimmed())//if判断是否有新的数据，如果有，执行if语句
        if(QMessageBox::Yes==QMessageBox::information(this,"确认修改","确认要修改？",QMessageBox::Yes,QMessageBox::No))
        {   stu_list.removeAt(row);//移除原来的数据
            stu_list.insert(row,newStr2);//在移除数据的位置插入新的数据
            QFile file("./stuent.txt");
            if(!file.open(QIODevice::WriteOnly|QIODevice::Text))
            {return ;}
            QTextStream out(&file);
            for(int i=0;i<stu_list.size();i++)//for循环保存文件
                out<<stu_list[i]<<endl;
            file.close();
            stu_model->setItem(row,7,new QStandardItem(totalStr));
        }else
        {
            QStringList stus=oldStr.split(' ');//将' '作为分隔符
            for(int col=0;col<8;col++)//for循环显示数据
                stu_model->setItem(row,col,new QStandardItem(stus[col]));
          /*  QString interst;
            for(int col=4;col<stus.size();col++)
                interst+=stus[col]+" ";
            stu_model->setItem(row,4,new QStandardItem(interst));
           */
        }
}


void EditDialog::on_exitButton_clicked()//定义on_exitButton_clicked函数
{
    close();//关闭文件
}
