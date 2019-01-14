<?php

	//专门加载frame矿建
	header('Content-type:text/html;charset=utf-8');

	//接收参数
	$act = isset($_GET['act']) ? $_GET['act'] : 'index';


	//判断条件加载不同内容
	if($act == 'index'){

		//加载框架本身
		include_once 'templates/frameset.html';
	}elseif($act == 'top'){
		//获取用户信息

		//顶部
		include_once 'templates/top.html';
	}elseif($act == 'menu'){
		//菜单
		include_once 'templates/menu.html';
	}elseif($act == 'main'){
		//内容
		include_once 'templates/main.html';
	}	