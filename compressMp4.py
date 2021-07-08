#coding=utf-8
import getopt
import os
import sys
 
# 来源：https://www.baikesec.com/webstudy/tools/8.html
 
T1 = ('==============================\n'
      '      视频批量压缩工具\n'
      '      www.baikesec.com\n'
      '==============================\n')
 
 
def main(argv):
    try:
        opts, args = getopt.getopt(argv, "hs:d:", ["help","spath=", "dpath="])
    except getopt.GetoptError:
        print('Error：请输入"-h"查看帮助')
        sys.exit(2)
    for opt, arg in opts:
        if opt == '-h':
            print(T1 + '\n参数：\n'
                  '     -s             源文件夹\n'
                  '     -d             目的文件夹\n\n\n'
                  + "举个栗子：mp4ys.py -s c:\\windows -d D:\\")
            sys.exit()
 
        elif opt in ("-s", "--spath"):
            global inputpath
            inputpath = arg
 
        elif opt in ("-d", "--dpath"):
            global d_path
            d_path = arg
            if "\\" != d_path[-1]:
                d_path = d_path + "\\"
 
def run():
    print(T1)
    file_l = os.listdir(inputpath)
    for file in file_l:
        global path
        path = os.path.join(inputpath, file)
        if ".mp4" in file:
            global file_re
            f_path,file_re = os.path.split(file)
            cmd = "ffmpeg.exe -i " + path + " -vcodec h264 -r 30 -b:v 2048k " + d_path + file_re + " -y"
            #print(cmd)
            os.system(cmd)
            print("视频：%s 压缩完成"%file_re)
 
if __name__ == "__main__":
    main(sys.argv[1:])
    run()
