from os import path
import tinify
import os

tinify.key = "TMLKRypjBq05ckKSyc2wLQhbRXSNbFw8"


def tinifying(file_name):
    source = tinify.from_file(file_name)
    source.to_file('tin_'+file_name)


if __name__ == "__main__":
    file_name = input()
    tinifying(file_name)
