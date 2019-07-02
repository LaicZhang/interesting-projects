/********************************************************************************
** Form generated from reading UI file 'editdialog.ui'
**
** Created by: Qt User Interface Compiler version 5.12.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_EDITDIALOG_H
#define UI_EDITDIALOG_H

#include <QtCore/QVariant>
#include <QtWidgets/QApplication>
#include <QtWidgets/QComboBox>
#include <QtWidgets/QDialog>
#include <QtWidgets/QHeaderView>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QTableView>

QT_BEGIN_NAMESPACE

class Ui_EditDialog
{
public:
    QTableView *tableView;
    QComboBox *findcomboBox;
    QLineEdit *searchEdit;
    QPushButton *pushButton;
    QPushButton *delButton;
    QPushButton *modifyButton;
    QPushButton *exitButton;

    void setupUi(QDialog *EditDialog)
    {
        if (EditDialog->objectName().isEmpty())
            EditDialog->setObjectName(QString::fromUtf8("EditDialog"));
        EditDialog->resize(878, 584);
        tableView = new QTableView(EditDialog);
        tableView->setObjectName(QString::fromUtf8("tableView"));
        tableView->setGeometry(QRect(20, 110, 841, 371));
        tableView->setStyleSheet(QString::fromUtf8("font: 75 16pt \"Agency FB\";"));
        tableView->setShowGrid(true);
        findcomboBox = new QComboBox(EditDialog);
        findcomboBox->addItem(QString());
        findcomboBox->addItem(QString());
        findcomboBox->addItem(QString());
        findcomboBox->addItem(QString());
        findcomboBox->setObjectName(QString::fromUtf8("findcomboBox"));
        findcomboBox->setGeometry(QRect(50, 21, 101, 41));
        findcomboBox->setStyleSheet(QString::fromUtf8("font: 75 20pt \"Agency FB\";"));
        searchEdit = new QLineEdit(EditDialog);
        searchEdit->setObjectName(QString::fromUtf8("searchEdit"));
        searchEdit->setGeometry(QRect(190, 19, 271, 41));
        searchEdit->setStyleSheet(QString::fromUtf8("font: 75 20pt \"Agency FB\";"));
        pushButton = new QPushButton(EditDialog);
        pushButton->setObjectName(QString::fromUtf8("pushButton"));
        pushButton->setGeometry(QRect(490, 20, 75, 41));
        pushButton->setStyleSheet(QString::fromUtf8("font: 75 20pt \"\351\232\266\344\271\246\";"));
        delButton = new QPushButton(EditDialog);
        delButton->setObjectName(QString::fromUtf8("delButton"));
        delButton->setGeometry(QRect(70, 500, 75, 41));
        delButton->setStyleSheet(QString::fromUtf8("font: 75 20pt \"\351\232\266\344\271\246\";"));
        modifyButton = new QPushButton(EditDialog);
        modifyButton->setObjectName(QString::fromUtf8("modifyButton"));
        modifyButton->setGeometry(QRect(290, 500, 75, 41));
        modifyButton->setStyleSheet(QString::fromUtf8("font: 75 20pt \"\351\232\266\344\271\246\";"));
        exitButton = new QPushButton(EditDialog);
        exitButton->setObjectName(QString::fromUtf8("exitButton"));
        exitButton->setGeometry(QRect(470, 500, 75, 41));
        exitButton->setStyleSheet(QString::fromUtf8("font: 75 20pt \"\351\232\266\344\271\246\";"));

        retranslateUi(EditDialog);

        QMetaObject::connectSlotsByName(EditDialog);
    } // setupUi

    void retranslateUi(QDialog *EditDialog)
    {
        EditDialog->setWindowTitle(QApplication::translate("EditDialog", "Dialog", nullptr));
        findcomboBox->setItemText(0, QApplication::translate("EditDialog", "\345\247\223\345\220\215", nullptr));
        findcomboBox->setItemText(1, QApplication::translate("EditDialog", "\345\255\246\345\217\267", nullptr));
        findcomboBox->setItemText(2, QApplication::translate("EditDialog", "\346\200\247\345\210\253", nullptr));
        findcomboBox->setItemText(3, QApplication::translate("EditDialog", "\345\205\250\351\203\250", nullptr));

        pushButton->setText(QApplication::translate("EditDialog", "\346\237\245\350\257\242", nullptr));
        delButton->setText(QApplication::translate("EditDialog", "\345\210\240\351\231\244", nullptr));
        modifyButton->setText(QApplication::translate("EditDialog", "\344\277\256\346\224\271", nullptr));
        exitButton->setText(QApplication::translate("EditDialog", "\351\200\200\345\207\272", nullptr));
    } // retranslateUi

};

namespace Ui {
    class EditDialog: public Ui_EditDialog {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_EDITDIALOG_H
