<?php
header('content-type:text/html;charset=utf-8');
class Animal {
	public function jiao() {
		echo '动物会叫<br>';
	}
}
class Dog extends Animal {
	public function jiao($n) {
		echo "我的狗一天叫{$n}次";
	}
}
$dog=new Dog;
$dog->jiao(3);