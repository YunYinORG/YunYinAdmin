<?php
namespace Home\Controller;
use Think\Controller;

class FileController extends Controller {

	public function index()
	{
		if ( ! admin_id())
		{
			$this->redirect('Index/index');
		}
		else
		{	
			if (empty($status = I('post.status', null, 'int')))
			{
				$condition['status'] = array('between', '1,5');
				$status = 0;
			}
			else
			{
				switch ($status)
				{
					case 0:
					  $condition['status'] = array('between', '1,5');
					  break;  
					case 1:
					  $condition['status'] = 1;
					  break;
					case 2:
					  $condition['status'] = 2;
					  break;
					case 3:
					  $condition['status'] = 3;
					  break;
					case 4:
					  $condition['status'] = 4;
					  break;
					default:
					  $condition['status'] = array('between', '1,5');
				}
			}
			$File  = D('FileView');
			$count = $File->where($condition)->count();
			$Page  = new \Think\Page($count, 10);
			$show  = $Page->show();
			$ppt_layout = C('PPT_LAYOUT');
			$result = $File->where($condition)->order('file.id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			
			foreach ($result as &$file)
			{
				$file['ppt_layout'] = $ppt_layout[$file['ppt_layout']];
			}
			unset($file);
			$this->data = $result;
			$this->status = $status;
			$this->assign('page', $show);
			$this->display();			
		}
	}
}
