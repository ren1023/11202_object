<?php
class Animal{
    protected $name;
    public function __construct($name)
    {
        $this->name=$name;
        
    }
    public function  setName($name){
        $this->name=$name;
    }
    
    public function getName(){
        return $this->name;
    }
    
}

$animal=New Animal (' 阿明 ');// 實例化

echo ' 顯示名稱:'.$animal->getName (); // 顯示名稱：阿明
echo "<br>";
$animal->setName (' 小花 ');
echo ' 顯示名稱:'.$animal->getName ();// 顯示名稱：小花
echo "<br>";
// $animal->name=' 阿中 ';
//echo ' 顯示名稱:'.$animal->name;
// 不能用 $name，因為被 protected Fatal error: Uncaught Error: Cannot access protected property Animal::$name in D:\05_php\my_php_project\11202_object\index1.php:25 Stack trace: #0 {main} thrown in D:\05_php\my_php_project\11202_object\index1.php on line 25
echo "<br>";

?>

<?php

class Dog extends Animal{
    function sit(){
        echo "坐下";
    }
}

$dog=new Dog (' 阿富 ');
echo $dog->getName();
echo "<br>";
echo $dog->setName (' 阿 旺 ');
echo $dog->getName();
$dog->sit();

echo $dog->setName('阿旺')
?>
