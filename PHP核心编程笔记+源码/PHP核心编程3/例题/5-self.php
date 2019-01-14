<?php
header('content-type:text/html;charset=utf-8');
class User {
	public static $count=0;
	public function __construct() {
		self::$count++;	//self表示当前类名
	}
	public function __destruct() {
		self::$count--;
	}
	public function showCount() {
		return self::$count;
	}
}
$user1=new User();
$user2=new User();
$user3=new User();
echo '现在有'.$user1->showCount().'人在线<br>';
unset($user1);
echo '现在有'.$user2->showCount().'人在线<br>';
