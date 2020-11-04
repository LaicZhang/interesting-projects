# pip install pandas

import pandas

df = pandas.read_csv(r"C:\Users\HP\Documents\GitHub\interesting-projects\DMdata.csv")
# 这里绝对路径一定要用/,windows下也是如此,不加参数默认csv文件首行为标题行
df.head()      #查看引入的csv文件前5行数据
