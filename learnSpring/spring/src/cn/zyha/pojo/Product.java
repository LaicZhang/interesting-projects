// ����ԭ�ģ�https://how2j.cn/k/spring/spring-annotation-ioc-di/1067.html#nowhere
/*
 * ʹ��ע��ķ�ʽ���ע������Ч��
 * 1. ��applicationContext.xml������<context:annotation-config/>
 * 2. ��֮ǰע�����Ĵ���ע�͵�������ʹ��ע�������
 * 3. �ж��ַ���
 *    1. ��Product.java��category����ǰ����@Autowiredע��
 *    ���磺
 *    @Autowired
 *    private Category category;
 *    2. Ҳ������setCategory����ǰ����@Autowired
 *    ���磺
 *    @Autowired
 *    public void setCategory(Category category) 
 *    3. ������ʹ��@Resource
 *    ���磺
 *    @Resource(name="c")
 *    private Category category;
 * 4. ��Bean����ע������(δʵ��)
 *    1. �޸�applicationContext.xml��ʲô��ȥ����ֻ������<context:component-scan base-package="cn.zyha.pojo"/>
 * �������Ǹ���Spring��bean������cn.zyha.pojo�������
 *    2. ΪProduct�����@Componentע�⣬������������bean
 *    ���磺
 *    @Component("p")
 *    public class Product {
 *    ΪCategory �����@Componentע�⣬������������bean
 *    @Component("c")
 *    public class Category {
 *    3. ��Ϊ���ô�applicationContext.xml���Ƴ����ˣ��������Գ�ʼ���������������Ͻ����ˡ�
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