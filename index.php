<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件導向</title>
</head>
<body>
<h1>□物件的宣告□ (˙ˇ˙)/</h1>
<?php

class Animal{
    // const type='animal';
    // type是變數，所以不用const
    // 要先加上封裝public的句子

    // protected $type='animal' /*不能用，會異常 */;

    public $type='animal';  
    public $name='John';
    public $hair_color='black';

    function __contruct($ytpe,$name,$hair_color){
        $this->type=$type;
        $this->name=$name;
        $this->hair_color=$hair_color;
    }

    function run(){
        echo $this->name.' is running';
    }

    // function run，如果前面沒有寫其實預設是public
    public function speed(){
        echo $this->name.' is running at 20km/h';
    }

}

    // 實例化(instance)，遊戲的副本也叫(instance)，｜instance 本身有複製的意思｜
    // 把new運算的結果指定給$cat，$cat是一個變數
    $cat=new Animal('cat','kitty','white');

    // 如果沒有加$，代表是一個值
    // 如果是$type，代表$type是可變變數
    echo $cat->type."<br>";
    echo $cat->name."<br>";
    echo $cat->hair_color."<br>";
    echo $cat->run()."<br>";
    echo $cat->speed()."<br>";






?>

</body>
</html>