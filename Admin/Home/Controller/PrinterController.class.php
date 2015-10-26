<?php
namespace Home\Controller;
use Think\Controller;

class PrinterController extends Controller {

	public function index()
	{
		if ( ! admin_id())
		{
			$this->redirect('Index/index');
		}
		$Printer = M('Printer');
		$this->data = $Printer->select();
		$this->schlist = M('School')->field('id,name')->cache('schlist',7200)->select();
		$this->display();
	}

	public function addPrinter()
	{
		if ( ! admin_id())
		{
			$this->redirect('Index/index');
		}

		$data['account'] = I('post.account', null, C('REGEX_ACCOUNT'));
		if ($data['account'] == null)
		{
			$this->error('您输入的账号不合法！');
		}
		$data['password'] = encode(md5(I('post.password')), I('post.account'));
		$data['name'] = I('post.name');
		$data['sch_id'] = I('post.sch_id');
		$data['address'] = I('post.address');
		$data['phone'] = I('post.phone');

		$Printer = M('Printer');
		$result  = $Printer->add($data);
		if ($result)
		{
			$this->success('新增成功', 'index');
		}
		else
		{
			$this->error('数据插入失败'.$Printer->getError());
		}
	}

	public function changeInfo()
	{
		if ( ! admin_id())
		{
	 		$this->redirect('Index/index');
	 	}
	 	$pid = I('post.id', null, 'int');
	 	if (! $data['account'] = I('post.account', null, C('REGEX_ACCOUNT')))
	 	{
	 		echo '2';
	 		return;
	 	}
	 	$data['name'] = I('post.name');
	 	$data['address'] = I('post.address');
	 	$data['phone'] = I('post.phone', null, C('REGEX_PHONE'));
	 	$Printer = M('Printer');
		$result  = $Printer->where("id=%d",$pid)->save($data);
		echo $result ? '1' : '0';
	}

	public function changeStatus()
	{
		if ( ! admin_id())
		{
	 		$this->redirect('Index/index');
	 	}
	 	$pid = I('post.id', null, 'int');
	 	$data['status'] = I('post.status');
		$result  = M('Printer')->where("id=%d",$pid)->save($data);
		echo $result ? '1' : '0';
	}

	public function delete()
	{
		if ( ! admin_id())
		{
	 		$this->redirect('Index/index');
	 	}
	 	$pid = I('post.id', null, 'int');
		$result  = M('Printer')->where("id=%d",$pid)->delete();
		echo $result ? '1' : '0';
	}
}
