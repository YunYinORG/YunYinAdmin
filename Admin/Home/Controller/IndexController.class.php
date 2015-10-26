<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
    	if ( ! admin_id())
		{
			$this->display();
		}
		else
		{
			$this->redirect('Printer/index');
		}
    }

	public function auth()
	{
		if (I('post.captcha') != session('captcha'))
		{
			$this->error('验证码错误','index');
		}
		else
		{
			if (I('post.account') == C('ADMIN_ACCOUNT') && I('post.password') == C('ADMIN_PWD'))
			{
				session('admin_id', '1');
				// $token = update_token('1', C('ADMIN'));
				// cookie('token', $token, 60 * 15);//15min
				$this->redirect('Printer/index');
			}
			else
			{
				$this->error('账号或密码错误','index');
			}
		}
	}

	public function logout()
	{
		session(null);
		$this->redirect('index');
	}

	public function captcha()
	{
		$image = imagecreatetruecolor(130,40);
		$bgcolor = imagecolorallocate($image,255,255,255);
		imagefill($image,0,0,$bgcolor);
		//$code = '';
		$result = rand(10,20);
		$num = rand(0,9);
		$content = array($num,'+','?','=',$result);
		for ($i = 0;$i < 5;$i++)
		{
			$fontsize = 5;
			$fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
			//$str = 'abcdefghijkmnpqrstuvwxyz23456789';
			$fontcontent = $content[$i];//substr($str,rand(0,strlen($str)-1),1);
			//$code .= $fontcontent;
			$x = ($i * 90 / 5) + rand(5,10);
			$y = rand(10,20);
			imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
		}
		session('captcha',$result - $num);
		for ($i = 0;$i < 500;$i++)
		{
			$pointcolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
			imagesetpixel($image,rand(1,99),rand(1,99),$pointcolor);
		}
		for ($i = 0;$i < 3;$i++)
		{
			$linecolor = imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
			imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);
		}
		header('content-type:image/png');
		imagepng($image);
	}
}