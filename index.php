<?php

class Animal{
    public $name;
    public function setName($name){
        $this->name=$name;
    }
    
}

$animal=new Animal (' 阿明 ');// 實例化 instant

echo ' 顯示名稱 '.$animal->name;
echo "<br>";
$animal->setName (' 小花 ');
echo ' 顯示稱名 '.$animal->name;
echo "<br>";
?>
<hr>
