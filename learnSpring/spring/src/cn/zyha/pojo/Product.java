// 步骤原文：https://how2j.cn/k/spring/spring-annotation-ioc-di/1067.html#nowhere
/*
 * 使用注解的方式完成注入对象的效果
 * 1. 在applicationContext.xml中添加<context:annotation-config/>
 * 2. 将之前注入对象的代码注释掉，后面使用注解来完成
 * 3. 有多种方法
 *    1. 在Product.java的category属性前加上@Autowired注解
 *    形如：
 *    @Autowired
 *    private Category category;
 *    2. 也可以在setCategory方法前加上@Autowired
 *    形如：
 *    @Autowired
 *    public void setCategory(Category category) 
 *    3. 还可以使用@Resource
 *    形如：
 *    @Resource(name="c")
 *    private Category category;
 * 4. 对Bean进行注解配置(未实验)
 *    1. 修改applicationContext.xml，什么都去掉，只新增：<context:component-scan base-package="cn.zyha.pojo"/>
 * 其作用是告诉Spring，bean都放在cn.zyha.pojo这个包下
 *    2. 为Product类加上@Component注解，即表明此类是bean
 *    形如：
 *    @Component("p")
 *    public class Product {
 *    为Category 类加上@Component注解，即表明此类是bean
 *    @Component("c")
 *    public class Category {
 *    3. 因为配置从applicationContext.xml中移出来了，所以属性初始化放在属性声明上进行了。
 *    private String name="product 1";
 *    private String name="category 1";
 *    
 */
package cn.zyha.pojo;

import javax.annotation.Resource;

import org.springframework.beans.factory.annotation.Autowired;

public class Product {
	private int id;
	private String name;
//	@Autowired
//	@Resource(name="c")
	private Category category;
	
    public void setId(int id){
    	this.id=id;
    }
    
    public void setName(String name){
    	this.name=name;
    }
    
    public int getId() {
		return id;
	}
    
    public String getName() {
		return name;
	}
    
    public Category getCategory() {
		return category;
	}
//    @Autowired
    public void setCategory() {
		this.category=category;
	}
}
