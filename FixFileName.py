# -*- coding:utf-8 -*-
# 批量修改文件名

import os

path = 'the files path of you want to rename'
for file in os.listdir(path): # os.listdir(dir) : 获取指定目录下的所有子目录和文件名
    if os.path.isfile(os.path.join(path, file)) == True:
        newname = file.replace('oldname', 'newname')
        os.rename(os.path.join(path, file), os.path.join(path, newname)) # os.rename(原文件名，新文件名） : 对文件或目录改名
        print('Successfully modified:' + newname)