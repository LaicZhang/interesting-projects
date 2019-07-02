/********************************************************************************
** Form generated from reading UI file 'editdialog.ui'
**
** Created by: Qt User Interface Compiler version 5.3.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_EDITDIALOG_H
#define UI_EDITDIALOG_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
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
            EditDialog->setObjectName(QStringLiteral("EditDialog"));
        EditDialog->resize(878, 584);
        tableView = new QTableView(EditDialog);
        tableView->setObjectName(QStringLiteral("tableView"));
        tableView->setGeometry(QRect(20, 110, 841, 371));
        tableView->setStyleSheet(QStringLiteral("font: 75 16pt \"Agency FB\";"));
        tableView->setShowGrid(true);
        findcomboBox = new QComboBox(EditDialog);
        findcomboBox->setObjectName(QStringLiteral("findcomboBox"));
        findcomboBox->setGeometry(QRect(50, 21, 101, 41));
        findcomboBox->setStyleSheet(QStringLiteral("font: 75 20pt \"Agency FB\";"));
        searchEdit = new QLineEdit(EditDialog);
        searchEdit->setObjectName(QStringLiteral("searchEdit"));
        searchEdit->setGeometry(QRect(190, 19, 271, 41));
        searchEdit->setStyleSheet(QStringLiteral("font: 75 20pt \"Agency FB\";"));
        pushButton = new QPushButton(EditDialog);
        pushButton->setObjectName(QStringLiteral("pushButton"));
        pushButton->setGeometry(QRect(490, 20, 75, 41));
        pushButton->setStyleSheet(QString::fromUtf8("font: 75 20pt \"\351\232\266\344\271\246\";"));
        delButton = new QPushButton(EditDialog);
        delButton->setObjectName(QStringLiteral("delButton"));
        delButton->setGeometry(QRect(70, 500, 75, 41));
        delButton->setStyleSheet(QString::fromUtf8("font: 75 20pt \"\351\232\266\344\271\246\";"));
        modifyButton = new QPushButton(EditDialog);
        modifyButton->setObjectName(QStringLiteral("modifyButton"));
        modifyButton->setGeometry(QRect(290, 500, 75, 41));
        modifyButton->setStyleSheet(QString::fromUtf8("font: 75 20pt \"\351\232\266\344\271\246\";"));
        exitButton = new QPushButton(EditDialog);
        exitButton->setObjectName(QStringLiteral("exitButton"));
        exitButton->setGeometry(QRect(470, 500, 75, 41));
        exitButton->setStyleSheet(QString::fromUtf8("font: 75 20pt \"\351\232\266\344\271\246\";"));

        retranslateUi(EditDialog);

        QMetaObject::connectSlotsByName(EditDialog);
    } // setupUi

    void retranslateUi(QDialog *EditDialog)
    {
        EditDialog->setWindowTitle(QApplication::translate("EditDialog", "Dialog", 0));
        findcomboBox->clear();
        findcomboBox->insertItems(0, QStringList()
         << QApplication::translate("EditDialog", "\345\247\223\345\220\215", 0)
         << QApplication::translate("EditDialog", "\345\255\246\345\217\267", 0)
         << QApplication::translate("EditDialog", "\346\200\247\345\210\253", 0)
         << QApplication::translate("EditDialog", "\345\205\250\351\203\250", 0)
        );
        pushButton->setText(QApplication::translate("EditDialog", "\346\237\245\350\257\242", 0));
        delButton->setText(QApplication::translate("EditDialog", "\345\210\240\351\231\244", 0));
        modifyButton->setText(QApplication::translate("EditDialog", "\344\277\256\346\224\271", 0));
        exitButton->setText(QApplication::translate("EditDialog", "\351\200\200\345\207\272", 0));
    } // retranslateUi

};

namespace Ui {
    class EditDialog: public Ui_EditDialog {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_EDITDIALOG_H
