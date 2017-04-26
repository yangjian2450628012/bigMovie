package com.movie.index.web;

import java.util.List;
import java.util.Map;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.servlet.ModelAndView;

import com.movie.index.dao.IndexDao;

@Controller
@RequestMapping(value="/index")
public class IndexController {
	private static final Logger logger = LoggerFactory.getLogger(IndexController.class);
	private IndexDao indexDao;
	
	@RequestMapping("queryAll")
	@ResponseBody
	public List<Map<String,String>> queryAll(){
		List<Map<String,String>> list = this.indexDao.queryAll();
		System.out.println(list.size());
		return this.indexDao.queryAll();
	}
	
	@RequestMapping("query")
	public ModelAndView query(){
		logger.info("query => 跳转路径");
		ModelAndView view = new ModelAndView("detail");
		view.addObject("name", "xiaoyang");
		return view;
	}

	@Autowired
	public void setIndexDao(IndexDao indexDao) {
		this.indexDao = indexDao;
	}
}
