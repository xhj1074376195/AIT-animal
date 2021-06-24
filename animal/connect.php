<?php
$_conn = mysqli_connect("localhost", "root", "root", "llm") or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器，选择数据库
mysqli_query($_conn,"set names utf8");						//设置数据库编码格式utf8
function _alert_back($_info) {
	echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
	exit();
}
function _alert_location($_info,$_url){
	echo "<script type='text/javascript'>alert('$_info');window.location.href='{$_url}';</script>";
	exit();
}
function _check_username($_string,$_min_num,$_max_num){
	$_string = trim($_string);
	if (mb_strlen($_string,'utf-8')<$_min_num || mb_strlen($_string,'utf-8')>$_max_num)
	_alert_back('账户需要是10位数字');
	return $_string;
}
function _check_tel($_string,$_min_num,$_max_num){
	$_string = trim($_string);
	if (mb_strlen($_string,'utf-8')<$_min_num || mb_strlen($_string,'utf-8')>$_max_num)
	_alert_back('手机号需要是11位数字');
	return $_string;
}

function _check_password($_password,$_repassword,$_min_num){
	if (mb_strlen($_password)<$_min_num)
	_alert_back('密码位数不得小于'.$_min_num);

  if ($_password !=$_repassword)
  	_alert_back('两次输入密码不同');
  return $_password;
}
?>