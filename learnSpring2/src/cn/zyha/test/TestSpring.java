package cn.zyha.test;

import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

import cn.zyha.service.ProductService;

public class TestSpring {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		ApplicationContext context = new ClassPathXmlApplicationContext(new String[] {"applicationContext.xml"});
		ProductService service = (ProductService) context.getBean("s");
		service.doSomeService();
	}

}
