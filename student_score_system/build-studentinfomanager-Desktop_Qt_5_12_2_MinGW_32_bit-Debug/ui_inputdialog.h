/********************************************************************************
** Form generated from reading UI file 'inputdialog.ui'
**
** Created by: Qt User Interface Compiler version 5.12.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_INPUTDIALOG_H
#define UI_INPUTDIALOG_H

#include <QtCore/QVariant>
#include <QtWidgets/QApplication>
#include <QtWidgets/QButtonGroup>
#include <QtWidgets/QDateEdit>
#include <QtWidgets/QDialog>
#include <QtWidgets/QLabel>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QRadioButton>

QT_BEGIN_NAMESPACE

class Ui_InputDialog
{
public:
    QPushButton *saveButton;
    QPushButton *quitButton;
    QLabel *label;
    QLabel *label_2;
    QLabel *label_3;
    QLineEdit *nameEdit;
    QRadioButton *boyradioButton;
    QRadioButton *girlradioButton;
    QDateEdit *birthdaydateEdit;
    QLineEdit *idEdit;
    QLabel *label_5;
    QLabel *label_4;
    QLineEdit *englishEdit;
    QLabel *label_6;
    QLineEdit *mathEdit;
    QLabel *label_7;
    QLineEdit *chineseEdit;
    QButtonGroup *sexGroup;

    void setupUi(QDialog *InputDialog)
    {
        if (InputDialog->objectName().isEmpty())
            InputDialog->setObjectName(QString::fromUtf8("InputDialog"));
        InputDialog->resize(818, 543);
        saveButton = new QPushButton(InputDialog);
        saveButton->setObjectName(QString::fromUtf8("saveButton"));
        saveButton->setGeometry(QRect(210, 450, 91, 41));
        saveButton->setStyleSheet(QString::fromUtf8("font: 75 22pt \"\351\232\266\344\271\246\";"));
        quitButton = new QPushButton(InputDialog);
        quitButton->setObjectName(QString::fromUtf8("quitButton"));
        quitButton->setGeometry(QRect(450, 450, 91, 41));
        quitButton->setStyleSheet(QString::fromUtf8("font: 75 22pt \"\351\232\266\344\271\246\";"));
        label = new QLabel(InputDialog);
        label->setObjectName(QString::fromUtf8("label"));
        label->setGeometry(QRect(130, 50, 81, 31));
        label->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        label_2 = new QLabel(InputDialog);
        label_2->setObjectName(QString::fromUtf8("label_2"));
        label_2->setGeometry(QRect(140, 170, 81, 31));
        label_2->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        label_3 = new QLabel(InputDialog);
        label_3->setObjectName(QString::fromUtf8("label_3"));
        label_3->setGeometry(QRect(100, 230, 111, 31));
        label_3->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        nameEdit = new QLineEdit(InputDialog);
        nameEdit->setObjectName(QString::fromUtf8("nameEdit"));
        nameEdit->setGeometry(QRect(230, 49, 261, 41));
        nameEdit->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        boyradioButton = new QRadioButton(InputDialog);
        sexGroup = new QButtonGroup(InputDialog);
        sexGroup->setObjectName(QString::fromUtf8("sexGroup"));
        sexGroup->addButton(boyradioButton);
        boyradioButton->setObjectName(QString::fromUtf8("boyradioButton"));
        boyradioButton->setGeometry(QRect(230, 170, 89, 31));
        boyradioButton->setStyleSheet(QString::fromUtf8("font: 75 20pt \"Agency FB\";"));
        girlradioButton = new QRadioButton(InputDialog);
        sexGroup->addButton(girlradioButton);
        girlradioButton->setObjectName(QString::fromUtf8("girlradioButton"));
        girlradioButton->setGeometry(QRect(370, 170, 89, 31));
        girlradioButton->setStyleSheet(QString::fromUtf8("font: 75 20pt \"Agency FB\";"));
        birthdaydateEdit = new QDateEdit(InputDialog);
        birthdaydateEdit->setObjectName(QString::fromUtf8("birthdaydateEdit"));
        birthdaydateEdit->setGeometry(QRect(230, 220, 261, 41));
        birthdaydateEdit->setStyleSheet(QString::fromUtf8("font: 75 18pt \"Agency FB\";"));
        idEdit = new QLineEdit(InputDialog);
        idEdit->setObjectName(QString::fromUtf8("idEdit"));
        idEdit->setGeometry(QRect(230, 110, 261, 41));
        idEdit->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        label_5 = new QLabel(InputDialog);
        label_5->setObjectName(QString::fromUtf8("label_5"));
        label_5->setGeometry(QRect(130, 111, 81, 31));
        label_5->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        label_4 = new QLabel(InputDialog);
        label_4->setObjectName(QString::fromUtf8("label_4"));
        label_4->setGeometry(QRect(120, 280, 111, 31));
        label_4->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        englishEdit = new QLineEdit(InputDialog);
        englishEdit->setObjectName(QString::fromUtf8("englishEdit"));
        englishEdit->setGeometry(QRect(230, 280, 261, 41));
        englishEdit->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        label_6 = new QLabel(InputDialog);
        label_6->setObjectName(QString::fromUtf8("label_6"));
        label_6->setGeometry(QRect(120, 340, 111, 31));
        label_6->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        mathEdit = new QLineEdit(InputDialog);
        mathEdit->setObjectName(QString::fromUtf8("mathEdit"));
        mathEdit->setGeometry(QRect(230, 340, 261, 41));
        mathEdit->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        label_7 = new QLabel(InputDialog);
        label_7->setObjectName(QString::fromUtf8("label_7"));
        label_7->setGeometry(QRect(120, 390, 111, 31));
        label_7->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));
        chineseEdit = new QLineEdit(InputDialog);
        chineseEdit->setObjectName(QString::fromUtf8("chineseEdit"));
        chineseEdit->setGeometry(QRect(230, 390, 261, 41));
        chineseEdit->setStyleSheet(QString::fromUtf8("font: 75 18pt \"\351\232\266\344\271\246\";"));

        retranslateUi(InputDialog);

        QMetaObject::connectSlotsByName(InputDialog);
    } // setupUi

    void retranslateUi(QDialog *InputDialog)
    {
        InputDialog->setWindowTitle(QApplication::translate("InputDialog", "Dialog", nullptr));
        saveButton->setText(QApplication::translate("InputDialog", "\344\277\235\345\255\230", nullptr));
        quitButton->setText(QApplication::translate("InputDialog", "\351\200\200\345\207\272", nullptr));
        label->setText(QApplication::translate("InputDialog", "\345\247\223\345\220\215\357\274\232", nullptr));
        label_2->setText(QApplication::translate("InputDialog", "\346\200\247\345\210\253\357\274\232", nullptr));
        label_3->setText(QApplication::translate("InputDialog", "\345\207\272\347\224\237\346\227\245\346\234\237\357\274\232", nullptr));
        boyradioButton->setText(QApplication::translate("InputDialog", "\347\224\267", nullptr));
        girlradioButton->setText(QApplication::translate("InputDialog", "\345\245\263", nullptr));
        label_5->setText(QApplication::translate("InputDialog", "\345\255\246\345\217\267\357\274\232", nullptr));
        label_4->setText(QApplication::translate("InputDialog", "\350\213\261\350\257\255\357\274\232", nullptr));
        label_6->setText(QApplication::translate("InputDialog", "\346\225\260\345\255\246\357\274\232", nullptr));
        label_7->setText(QApplication::translate("InputDialog", "\350\257\255\346\226\207\357\274\232", nullptr));
    } // retranslateUi

};

namespace Ui {
    class InputDialog: public Ui_InputDialog {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_INPUTDIALOG_H
