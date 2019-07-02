#include<iostream>
#include<cstring>
#include<cstdlib>

using namespace std;

class Student{					//学生类 
	public:
		~Student();
		void InputStudent(void);//输入学生信息
		void OutputStudent(void);//输出学生信息
		void DeleteStudent(void);//删除学生信息
		void SerchStudent(void);//查找学生信息
		void ChangeStudent(void);//修改学生信息
		void ScortByChinese(void);//对语文成绩排序
		void ScortByMath(void);//对数学成绩排序
		void ScortByEnglish(void);//对英语成绩排序
		void ScortByTotal(void);//对总成绩排序
		void Show(void);	 
	private:
		Student *St;    //学生类指针
		int Size;       // 学生人数
		string Name;    //学生姓名
		int Age;        //学生年龄
		double No;         //学生学号
		float Score[3]; //三科成绩
		float Total;    //总分
		float Ave;     //平均分  
}; 

//析构函数
Student::~Student(){
	delete(St);
} 

//输入学生成绩函数
void Student::InputStudent(void){
	int len,temp;
	cout<<"请输入学生人数：";
	cin>>len;
	
	system("cls");
	Size = len;
	
	St = new Student[Size];/*^(*￣(oo)￣)^*/ 
	
	for(int i = 0; i < len; i++){
		cout<<"请输入第"<<i + 1<<"学生姓名：";
		cin>>St[i].Name;
		
		cout<<"请输入第"<<i + 1<<"学生年龄：";
		cin>>St[i].Age;
		
		cout<<"请输入第"<<i + 1 <<"学生学号：";
		cin>>St[i].No;
		
		one:cout<<"请输入第"<<i + 1<<"学生语文成绩：";
		cin>>temp;
		if(temp<0 || temp>100){
			cout<<"输入分数有误，请重新输入!"<<endl;
			goto one;
		}else 
		St[i].Score[0] = temp;
		
		
		two:cout<<"请输入第"<<i + 1<<"学生数学成绩：";
		cin>>temp;
		if(temp<0 || temp>100){
			cout<<"输入分数有误，请重新输入!"<<endl;
			goto two;
		}else 
		St[i].Score[1] = temp;
		
		three:cout<<"请输入第"<<i + 1<<"学生英语成绩：";
			cin>>temp;
		if(temp<0 || temp>100){
			cout<<"输入分数有误，请重新输入!"<<endl;
			goto three;
		}else 
		St[i].Score[2] = temp;
		
		St[i].Total = St[i].Score[0] + St[i].Score[1] + St[i].Score[2];
		
		St[i].Ave = St[i].Total/3.0f;
		
		system("cls"); 
	} 
} 

//输出学生成绩函数 
void Student::OutputStudent(void){
		
	cout<<"姓名\t年龄\t学号\t语文\t数学\t英语\t总分\t平均分"<<endl; 
	for(int i = 0; i < Size; i++){
		cout<<St[i].Name<<"\t"<<St[i].Age<<"\t"<<St[i].No<<"\t"<<St[i].Score[0]<<"\t"<<St[i].Score[1]<<"\t"<<St[i].Score[2]<<"\t"<<St[i].Total<<"\t"<<St[i].Ave<<endl; 
	}
} 

//删除学生成绩函数
void Student::DeleteStudent(void){
		
	string str;
	cout<<"请输入你要删除学生姓名："; 
	cin>>str;
	
	int num;	//标记性姓名相同时的下标 
	//寻找下标相同时 
	for(int i = 0; i < Size; i++){
		if(str == St[i].Name){
			num=i;
		}        
	}
	
	//将学生往前移
	for(int j = num + 1; j < Size; j++ ){
		St[j-1]=St[j];
	} 
	
	Size -= 1;  // 学生数减一 
} 

//查找学生成绩
void Student::SerchStudent(void){
		
	string name;
	int i;
	cout<<"请输入你要查找学生姓名：";
	cin>>name;
	
	for(i = 0; i < Size; i++){
		if(name == St[i].Name){
			cout<<"姓名\t年龄\t学号\t语文\t数学\t英语\t总分\t平均分"<<endl;
	        cout<<St[i].Name<<"\t"<<St[i].Age<<"\t"<<St[i].No<<"\t"<<St[i].Score[0]<<"\t"<<St[i].Score[1]<<"\t"<<St[i].Score[2]<<"\t"<<St[i].Total<<"\t"<<St[i].Ave<<endl;
		}else
		cout<<"查无此人！"<<endl;
	}
} 

//修改学生信息
void Student::ChangeStudent(void){
		
	string name;
	int i;
	back:cout<<"请输入你要修改学生姓名："; 
	cin>>name;
	
	for(i = 0; i < Size; i++){
		if(name == St[i].Name){
			break;
		}else
		{
			cout<<"查无此人！";
		   goto back;
	    }
	}
	cout<<"学生原有信息："<<endl;
	cout<<St[i].Name<<" "<<St[i].Age<<" "<<St[i].No<<" "<<St[i].Score[0]<<" "<<St[i].Score[1]<<" "<<St[i].Score[2]<<" "<<St[i].Total<<" "<<St[i].Ave<<endl;
    
    cout<<"请输入你要修改学生信息"<<endl;
    
    cout<<"请输入学生姓名：";
    cin>>St[i].Name;
    
    cout<<"请输入学生年龄：";
    cin>>St[i].Age;
    
    cout<<"请输入学生学号：";
    cin>>St[i].No;
    
    cout<<"请输入学生语文成绩：";
    cin>>St[i].Score[0];
    
    cout<<"请输入学生数学成绩：";
    cin>>St[i].Score[1];
    
    cout<<"请输入学生英语成绩：";
    cin>>St[i].Score[2];
    
    St[i].Total = St[i].Score[0] + St[i].Score[1] + St[i].Score[2];
    
	St[i].Ave = St[i].Total/3.0f;
}

//对语文成绩排序
void Student::ScortByChinese(void){
		
	for(int i = 0; i < Size; i++){
		
		for(int j = 0; j < Size-i; j++)
			
			if(St[j].Score[0] <St[j+1].Score[0] ){
				Student temp = St[j+1];
				St[j+1] = St[j];
				St[j] = temp; 
			}
		}
	} 

//对数学成绩排序
void Student::ScortByMath(void){
		
	for(int i = 0; i < Size; i++){
		
		for(int j = 0; j < Size-i; j++)
			
			if(St[j].Score[1] <St[j+1].Score[1] ){
				Student temp = St[j+1];
				St[j+1] = St[j];
				St[j] = temp; 
			}
		}
	} 

//对英语成绩排序
void Student::ScortByEnglish(void){
		
	for(int i = 0; i < Size-i; i++){
		
		for(int j = 0; j < Size; j++)
			
			if(St[j].Score[2] <St[j+1].Score[2] ){
				Student temp = St[j+1];
				St[j+1] = St[j];
				St[j] = temp; 
			}
		}
	} 

//对总成绩排序
void Student::ScortByTotal(void){
		
	for(int i = 0; i < Size-i; i++){
		
		for(int j = 0; j < Size; j++)
			
			if(St[j].Total <St[j+1].Total){
				Student temp = St[j+1];
				St[j+1] = St[j];
				St[j] = temp; 
			}
		}
	} 

//Show函数
void Student::Show(void){

	cout<<"======================================================="<<endl;
	cout<<"-------------------请选择需要操作的指令----------------"<<endl;
	cout<<"----------------------1 输入学生信息-------------------"<<endl;
	cout<<"----------------------2 输出学生信息-------------------"<<endl;
	cout<<"----------------------3 删除学生信息-------------------"<<endl;
	cout<<"----------------------4 查找学生信息-------------------"<<endl;
	cout<<"----------------------5 修改学生信息-------------------"<<endl;
	cout<<"----------------------6 将学生语文成绩从大到小排序-----"<<endl;
	cout<<"----------------------7 将学生数学成绩从大到小排序-----"<<endl;
	cout<<"----------------------8 将学生英语成绩从大到小排序-----"<<endl;
	cout<<"----------------------9 将学生总成绩从大到小排序-------"<<endl;
	cout<<"======================================================="<<endl<<endl; 
} 
 

int main(void){
	
	cout<<"                               ======================================================="<<endl;
	cout<<"                               ======================================================="<<endl;
	cout<<"                               ******************欢迎使用学生管理系统*****************"<<endl;
	cout<<"                               ======================================================="<<endl; 
	cout<<"                               ======================================================="<<endl<<endl;
	
	cout<<"                               -----------------请先注册学生管理系统------------------"<<endl;
	
	char str1[10];
 	char str2[10];
 	 cout<<"请输入你要注册的账号：";
	 gets(str1);
	 cout<<"请输入你要注册的密码：";
	 gets(str2); 
	 system("cls");
	 
	cout<<"                               ======================================================="<<endl;
	cout<<"                               ======================================================="<<endl;
	cout<<"                               ******************欢迎使用学生管理系统*****************"<<endl;
	cout<<"                               ======================================================="<<endl; 
	cout<<"                               ======================================================="<<endl<<endl;
	
	cout<<"                               -----------------请先登录学生管理系统------------------"<<endl;

	int count=0;
	char username[7], password[10];
	lable:cout<<endl<<"请输入你的用户名：";
	gets(username);
	cout<<endl<<"请输入你的密码：";
	gets(password);
	
	if(strcmp(username,str1)== 0 && strcmp(password,str2) == 0){ 
	system("cls");

	int Item;			//接收指令
	
	Student st;
	st.Show();
	
	while(true){
		cout<<"请输入你选择的操作指令：";
		cin>>Item;
		system("cls");
		 
		 switch(Item){
		 	
		 	case 1:{           //输入学生信息 	
		 	st.InputStudent();
		 	st.Show();
			 }
				break;
			
			case 2:{           //输出学生信息 
			st.Show();
			st.OutputStudent();
			}
				break; 
				
			case 3:{           //删除学生信息 
			st.DeleteStudent();
			}	
			 	break;
			 	
			case 4:{          //查找学生信息 
			st.Show();
			st.SerchStudent(); 
			}
				break;
				
			case 5:{           //修改学生信息 
			st.ChangeStudent();
		    }
				break;	
				
			case 6:{            //对语文成绩排序并输出 
			st.Show();
			st.ScortByChinese();
			st.OutputStudent();
			} 
				break;
				
			case 7:{            //对数学成绩排序并输出 
			st.Show();
			st.ScortByMath();
			st.OutputStudent();
			} 
				break;
				
			case 8:{            //对英语成绩排序并输出 
			st.Show();
			st.ScortByEnglish();
			st.OutputStudent();
			} 
				break;
				
			case 9:{            //对总成绩排序并输出 
			st.Show();
			st.ScortByTotal();
			st.OutputStudent();
			} 
				break;
			
			default:
				break; 
		 }
		 	 
	}
	}else{
		count++;
		if(count == 3){
			system("exit");
		}else goto lable;
	}
	system("pause"); 
	return 0;
}
