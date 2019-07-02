#-------------------------------------------------
#
# Project created by QtCreator 2018-05-02T16:13:27
#
#-------------------------------------------------

QT       += core gui

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = studentinfomanager
TEMPLATE = app


SOURCES += main.cpp\
        mainwindow.cpp \
    inputdialog.cpp \
    editdialog.cpp

HEADERS  += mainwindow.h \
    inputdialog.h \
    editdialog.h

FORMS    += mainwindow.ui \
    inputdialog.ui \
    editdialog.ui
