#include<iostream>
#include<cstdlib>
#include<cstring>
using namespace std;
struct kehu{
	char mima[20];
	int money;
};

void cx(int& money);
void qk(int& money);
void ck(int& money);
void xg(char mima[20]);

int main(){
	kehu kh123456;
    kh123456.mima[0]='1';
	kh123456.mima[1]='2';
	kh123456.mima[2]='3';
	kh123456.mima[3]='4';
	kh123456.mima[4]='5';
	kh123456.mima[5]='6';
	kh123456.mima[6]='\0';
	kh123456.money=10000;
	int a,c,i=0;
	char b[20];
	cout<<"欢迎使用本台ATM！"<<endl;
	cout<<"请输入卡号："<<endl;	
	cin>>a;
	if(a==123456){
		while(i<3){
		if(i<3) {
			cout<<"请输入密码："<<endl;
			cin>>b;
			if(strcmp(b,kh123456.mima)==0){
				while(1){
					cout<<"请选择："<<endl;
					cout<<"1,查询余额"<<endl;
					cout<<"2,取款"<<endl;
					cout<<"3,存款"<<endl;
					cout<<"4,修改密码"<<endl;
					cout<<"5,退出"<<endl;
					cin>>c;
					switch(c){
					case 1:cx(kh123456.money);break;
					case 2:qk(kh123456.money);break;
					case 3:ck(kh123456.money);break;
					case 4:xg(kh123456.mima);break;
					default:
						return 0;
					}
				}
				return 0;
			}
			else{
					cout<<"密码错误，请重新输入！"<<endl;
					i++;
					continue;
				}
		}
		}
		cout<<"错误超过三次，您的卡将在三秒后爆炸（^_^）"<<endl;
	}
	return 0;
}
void cx(int& money){
	cout<<"您卡上的余额为为："<<money<<endl;
}
void qk(int& money){
	cout<<"本机取款的规则是输入一个整数，将取出100*n的金额，请不要超过50"<<endl;
	int h=100,w;
	w=10000;
	while(h>50||money<(h*100)){
		cout<<"请输入取款金额："<<endl;
		cin>>h;
		w=h*100;
	}
	money-=h*100;
	cout<<"您取出了"<<w<<"元"<<endl;
	cout<<"余额为："<<money<<endl;
}
void ck(int& money){
	int o=1;
	while(o>0){
		cout<<"请放入100元钞票！"<<endl;
		cin>>o;
		if(o%100==0)break;
	}
	money+=o;
	cout<<"金额为："<<money<<endl;
}
void xg(char mima[]){
	cout<<"请输入密码："<<endl;
	char c[20],d[20]="0",e[20]={"1"};
	cin>>c;
	if(strcmp(c,mima) == 0){
		while(1){
			cout<<"请输入新密码："<<endl;
		    cin>>d;
		    cout<<"请再次输入密码："<<endl;
		    cin>>e;
			char *p;
			p=d;
			for(int i=0,j=0;i<strlen(d);i++){
				if(*p==*(p+i))
					j++;
			}
		    if(strcmp(d,e)==0&&strlen(d)>=6&&strlen(e)>=6){//if(strcmp(d,e)==0&&strlen(d)>=6&&strlen(e)>=6&&j!=strlen(d))
				cout<<"修改密码成功！"<<endl;
				break;
			}
		    else{
			    cout<<"输入有误，请重新输入！"<<endl;
				continue;
			}
		}
		strcpy(mima,d);
	}
}
