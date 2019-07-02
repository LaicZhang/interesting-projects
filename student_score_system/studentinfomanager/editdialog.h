#ifndef EDITDIALOG_H
#define EDITDIALOG_H

#include <QDialog>
#include<QStandardItemModel>

namespace Ui {
class EditDialog;
}

class EditDialog : public QDialog
{
    Q_OBJECT

public:
    explicit EditDialog(QWidget *parent = 0);
    ~EditDialog();
    void showStudent();

private slots:
    void on_pushButton_clicked();

    void on_delButton_clicked();

    void on_modifyButton_clicked();

    void on_exitButton_clicked();

private:
    Ui::EditDialog *ui;
    QList<QString> stu_list;
    QStandardItemModel *stu_model;//标准化模型类
};

#endif // EDITDIALOG_H
