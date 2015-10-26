<?php
function admin_id($redirect_url = null)
{
	$id = session('admin_id');
	if ($id)
	{
		return $id;
	}
	else
	{
		$token = I('cookie.token', null, C('REGEX_TOKEN'));
		if ($token)
		{
			$info = auth_token($token);
			if ($info['type'] == C('ADMIN'))
			{
				session('admin_id', $info['id']);
				return $info['id'];
			}
		}
	}

	if ($redirect_url)
	{
		redirect($redirect_url);
	}
	else
	{
		return 0;
	}
}
