<?php
return array(
	//'配置项'=>'配置值'
	'DB_HOST' => '', // 服务器地址
	'DB_NAME' => '', // 数据库名
	'DB_USER' => '', // 数据库用户名
	'DB_PWD'  => '', // 数据库密码
	'DB_TYPE' =>'',
	'ADMIN_ACCOUNT' => '',
	'ADMIN_PWD'     => '',
	
	//URL设定
	'URL_PARAMS_BIND' => TRUE,
	'URL_MODEL'       => 2,
	'URL_HTML_SUFFIX' => '',
	'MODULE_ALLOW_LIST' => array('Home'),
	'DEFAULT_MODULE' => 'Home', // 默认模块
	
	//打印ppt格式
	'PPT_LAYOUT' => array(
		0 => '-',
		1 => '1X1',
		2 => '2X3',
		3 => '2X4',
		4 => '3X3',
		10 =>'电子书',
	),

	'REGEX_ACCOUNT'    => '/^\w{3,16}$/', //打印店账号正则
	'REGEX_PHONE'      => '/^1[34578]\d{9}$/', //手机号正则
	'ADMIN'       => 0, //用户登录类型

	//模板渲染转义
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__.'/Public',
	),

	'DB_FIELDTYPE_CHECK'=>true,  // 开启字段类型验证
	'DEFAULT_FILTER' => 'htmlspecialchars', //默认过滤函数
);