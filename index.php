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
    // private $type='animal' /*不能用，會異常 */;

    protected $type='animal';  
    protected $name='John';
    protected $hair_color='black';
    protected $feet=['front-left','front-right','back-left','back-right'];

    function __construct($type,$name,$hair_color){
        // $this 代表Animal
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

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        return $this->name=$name;
    }

}

    // 實例化(instance)，遊戲的副本也叫(instance)，｜instance 本身有複製的意思｜
    // 把new運算的結果指定給$cat，$cat是一個變數
    $cat=new Animal('cat','kitty','white');

    // 如果沒有加$，代表是一個值
    // 如果是$type，代表$type是可變變數
    // echo $cat->type."<br>";
    echo $cat->getName()."<br>";
    // echo $cat->hair_color."<br>";
    echo $cat->run()."<br>";
    echo $cat->speed()."<br>";
    // print_r($cat->feet);

    $cat->setName('Mary');
    echo $cat->getName();

?>

<h1>繼承</h1>
<?php


class Cat extends Animal{
    protected $type='cat';
    protected $name="Judy";
    function __construct($hair_color){
        $this->hair_color=$hair_color;
    }
}

$mycat=new Cat('white');

echo $mycat->getName();
echo "<br>";
echo $mycat->run();
echo "<br>";
echo $mycat->speed();
echo "<br>";
$mycat->setName("judy");
echo $mycat->getName();
echo "<br>";

?>



</body>
</html>