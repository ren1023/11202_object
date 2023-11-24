


<?php


class Animal{

}

interface bark{
    function b();
}

class Dog extends Animal implements bark{

    function b(){
        return "汪";
    }
}
class Cat extends Animal{
    function b(){
        return "喵";
    }
}

// 在同一個資料夾中，不能有同名的class. 因為外掛intelephense的提示，但還是能執行。
$dog=new Dog;
$cat=new Cat;

echo $dog->b();
echo "<br>";
echo $cat->b();


?>