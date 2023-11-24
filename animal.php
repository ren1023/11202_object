


<?php


class Animal1{

}

interface bark{
    function b();
}

class Dog extends Animal1 implements bark{

    function b(){
        return "汪";
    }
}
class Cat extends Animal1{
    function b(){
        return "喵";
    }
}

// 在同一個資料夾中，不能有同名的class. 
$dog=new Dog;
$cat=new Cat;

echo $dog->b();
echo "<br>";
echo $cat->b();


?>