import base64
 
 
def encode_image(img_path: str):
    # 获取图片的字节码
    with open(img_path, 'rb') as img:
        # img_data数据可能混杂其他符号或者不完整，调用时需要检查下
        img_data = base64.b64encode(img.read())
        # print(img_data)
        print(type(img_data))
 
    # 图片太大时，print打印出来的信息会不完整，再写到文件中保存方便后续解码使用
    with open('ceshi.txt', 'wb') as f:  # 临时存的名字，当然，也可以不存名字，直接使用
        f.write(img_data)
 
 
def decode_image(img_str: str):
    # 图片字节码有格式要求，img_str模板："/9j/4AAQSkZJR+kRXhpZgA=="
    # 把图片解码到本地，需要引用图片的组件直接调用就可以显示了
    # img_str = open(img_str)
    # print(img_str)
    with open(img_str, 'r') as f:
        img_str = f.read()  # 读取全部bai内容为字符串
    print(type(img_str))
    # print(base64.b64decode(img_str))
    with open('123.png', 'wb') as img:  # 读取txt之后要保存到本地的图片名字
        img.write(base64.b64decode(img_str))
 
 
encode_image("001.png")
decode_image("./ceshi.txt")
