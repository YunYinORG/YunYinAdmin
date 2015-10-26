<?php
	function encode($pwd, $id)
	{
		return md5(crypt($pwd, $id));
	}
	