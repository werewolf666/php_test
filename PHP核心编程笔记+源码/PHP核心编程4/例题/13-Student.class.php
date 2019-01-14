<?php
class Student {
	private $name;
	private $sex;
	private $age;
	public function __construct($name,$sex,$age) {
		$this->name=$name;
		$this->sex=$sex;
		$this->age=$age;
	}
}
