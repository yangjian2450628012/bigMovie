package tech.yobbo.index.dao;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;
import org.springframework.test.context.transaction.TransactionConfiguration;
import org.springframework.transaction.annotation.Transactional;

import javax.annotation.Resource;
import java.util.List;
import java.util.Map;

/**
 * Created by xiaoJ on 2017/4/27.
 */
@Transactional  //开启事务，如果抛异常，就回滚数据
@TransactionConfiguration(transactionManager = "transactionManager",defaultRollback = true)
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:spring/spring-dao.xml","classpath:spring/spring-service.xml","classpath:spring/spring-web.xml"})
public class IndexDaoTest {
    @Resource
    private IndexDao indexDao;

    @Test
    public void select(){
    	try {
    		 List<Map<String,String>> list = this.indexDao.queryAll();
    	        System.out.print(list.size());
		} catch (Exception e) {
			e.printStackTrace();
		}
       
    }

}
