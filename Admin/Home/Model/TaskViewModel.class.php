<?php namespace Home\Model;
use Think\Model\ViewModel;

class TaskViewModel extends ViewModel {
	public $viewFields = array(
		'task'	=> 	array(
			'id',
			'use_id',
			'pri_id',
			'name',
			'time',
			'status',
			'copies',
			'`double`',
			'color',
			'format',
		),
		'printer' => array(
			'name' => 'pri_name',
			'_on' => 'printer.id=task.pri_id',
		),
		'user' => array(
			'name' => 'user_name',
			'number' => 'stu_num',
			'_on' => 'user.id=task.use_id'
		),
	);
}
