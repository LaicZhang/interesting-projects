import os,re,requests,configparser
from subprocess import Popen
def main():
    c=int(input('输入数字：\n1、单个网址\n2、多个网址\n3、Bilibili Up Download\n'))
    if c==1:
        url=input('输入网址：\n')
        n=int(input('输入数字：\n1、查看格式\n2、调用播放器在线播放\n3、下载（默认最高画质）\n4、选择画质下载\n5、获取真实地址（Real URLs:后面的地址）\n'))
        if n==1:
            cmd=r'"%s" -i "%s"'%(idiryg,url)
            Popen(cmd).wait()
        elif n==2:
            cmd=r'"%s" -p "%s" "%s"'%(idiryg,playerpath,url)
            Popen(cmd).wait()
        elif n==3:
            cmd=r'"%s" -o "%s" "%s"'%(idiryg,savepath,url)
            Popen(cmd).wait()
        elif n==4:
            cmd=r'"%s" -i "%s"'%(idiryg,url)
            Popen(cmd).wait()
            format=input('输入画质，画质是- format:后面的字符串（例如：mp4hd2v2，直接回车默认下载最高画质）：\n')
            cmd=r'"%s" --format=%s -o "%s" "%s"'%(idiryg,format,savepath,url)
            Popen(cmd).wait()
        elif n==5:
            cmd=r'"%s" -u "%s"'%(idiryg,url)
            Popen(cmd).wait()
        else:
            print('请输入对应数字！')
    elif c==2:
        files=input('输入保存网址的文本文件路径（一个网址占一行）：\n')
        with open(r'%s'%files) as file:
            for durl in file:
                durl=durl.replace('\n','')
                cmd=r'"%s" -o "%s" "%s"'%(idiryg,savepath,durl)
                Popen(cmd).wait()
    elif c==3:
        upurl=input('输入Up主个人空间地址，类似于https://space.bilibili.com/8047632或者https://space.bilibili.com/8047632?from=search&seid=3287339846988974210或者https://space.bilibili.com/8047632?spm_id_from=333.788.b_765f7570696e666f.2\n')
        mid=re.findall(r'https://space.bilibili.com/(\d*)',upurl)[0]
        home=requests.get('https://space.bilibili.com/%s'%mid)
        upname=re.findall(r'<title>(.*)的个人空间',home.text)[0]
        u=int(input('输入数字：\n1、所有视频\n2、某个频道下的所有视频\n'))
        if u==1:
            pagehtml=requests.get('https://api.bilibili.com/x/space/arc/search?mid=%s'%mid)
            count=re.findall(r'{.*?,"ps":(\d*?),"count":(\d*?)}',pagehtml.text)
            pn=int(count[0][1])//int(count[0][0])+1
            print('正在下载%s的所有视频（共%s个视频）：'%(upname,count[0][1]))
            for page in range(1,pn+1):
                r=requests.get('https://api.bilibili.com/x/space/arc/search?mid=%s&pn=%s'%(mid,page))
                bvids=re.findall(r'"bvid":"(.+?)"',r.text)
                for bvid in bvids:
                    videohtml='https://www.bilibili.com/video/%s'%bvid
                    cmd=r'"%s" -o "%s" "%s"'%(idiryg,savepath,videohtml)
                    Popen(cmd).wait()
        elif u==2:
            channel=requests.get('https://api.bilibili.com/x/space/channel/index?mid=%s&guest=false&jsonp=jsonp&callback=__jp3'%mid,headers={'referer': 'https://space.bilibili.com/%s'%mid})
            columns=re.findall(r'"cid":(\d*?),"mid":\d*?,"name":"(.*?)"',channel.text)
            if columns==[]:
                print('%s没有频道'%upname)
            else:
                print('%s的所有频道如下：'%upname)
                ltmp,lname=[],[]
                for num,name in enumerate(columns):
                    print(num+1,name[1])
                    ltmp.append(name[0])
                    lname.append(name[1])
                i=int(input('输入频道对应的数字：\n'))
                pagehtml=requests.get('https://api.bilibili.com/x/space/channel/video?mid=%s&cid=%s&pn=1&ps=30&order=0&jsonp=jsonp&callback=__jp3'%(mid,ltmp[i-1]),headers={'referer': 'https://space.bilibili.com/%s/channel/detail?cid=%s'%(mid,ltmp[i-1])})
                count=re.findall(r'"count":(\d*),"num":\d*,"size":(\d*)',pagehtml.text)
                pn=int(count[0][0])//int(count[0][1])+1
                print('正在下载频道%s下的所有视频（共%s个视频）：'%(lname[i-1],count[0][0]))
                for page in range(1,pn+1):
                    r=requests.get('https://api.bilibili.com/x/space/channel/video?mid=%s&cid=%s&pn=%s&ps=30&order=0&jsonp=jsonp&callback=__jp3'%(mid,ltmp[i-1],page),headers={'referer': 'https://space.bilibili.com/%s/channel/detail?cid=%s'%(mid,ltmp[i-1])})
                    bvids=re.findall(r'"bvid":"(.+?)"',r.text)
                    for bvid in bvids:
                        videohtml='https://www.bilibili.com/video/%s'%bvid
                        cmd=r'"%s" -o "%s" "%s"'%(idiryg,savepath,videohtml)
                        Popen(cmd).wait()
        else:
            print('请输入对应数字！')
    else:
        print('请输入对应数字！')
idiryg='you-get.exe'
if os.path.isfile('You-Getconfig.ini'):
    config=configparser.ConfigParser()
    config.optionxform=lambda option:option
    config.read('You-Getconfig.ini')
    savepath=config['You-Get']['savepath']
    playerpath="'%s'"%config['You-Get']['playerpath']
    if os.path.exists(r'%s'%savepath)==False:
        os.mkdir(r'%s'%savepath)
        main()
    else:
        main()
    while True:
        i=input('是否继续？q：退出，其它：继续\n')
        if i=='q':
            break
        else:
            os.system('cls')
            main()
else:
    print('正在生成配置文件...')
    config=configparser.ConfigParser(allow_no_value=True)
    config.optionxform=lambda option:option
    config['You-Get']={}
    config['You-Get']['#下载路径，例如D:\You-Get']=None
    config['You-Get']['savepath']=''
    config['You-Get']['#播放器路径，例如C:\Program Files (x86)\Windows Media Player\wmplayer.exe']=None
    config['You-Get']['playerpath']=''
    with open('You-Getconfig.ini','w') as file:
        config.write(file)
    print('配置文件You-Getconfig.ini生成完成，填写好对应信息后再运行')
    os.system('pause')
