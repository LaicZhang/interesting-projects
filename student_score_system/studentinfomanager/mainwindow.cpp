#include "mainwindow.h"
#include "ui_mainwindow.h"
#include "inputdialog.h"
#include "editdialog.h"

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);//setupUI()函数将程序与UI界面联系起来
}

MainWindow::~MainWindow()//析构函数MainWindow()，删除内存释放资源
{
    delete ui;
}

void MainWindow::on_pushButton_clicked()//定义on_pushButton_clicked()函数
{
    InputDialog d;
    d.exec();//显示一个inputDialog对话框
}

void MainWindow::on_pushButton_2_clicked()
{
    EditDialog d;
    d.exec();
}
