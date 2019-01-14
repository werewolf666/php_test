<?php
abstract class Person{
}
class Student extends Person{
}
class Employee extends Person {	
}
class Teacher {	
}

function show(Person $obj) {//父类可以指向子类的引用
	var_dump($obj);
	echo '<br>';
}
show(new Student);	//object(Student)#1 (0) { } 
show(new Employee);	//object(Employee)#1 (0) { } 
show(new Teacher);	//报错

