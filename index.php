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
    private $feet=['front-left','front-right','back-left','back-right'];

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
        $this->name=$name;
    }

    function getFeet(){
        return $this->feet;

}
}

    // 實例化(instance)，遊戲的副本也叫(instance)，｜instance 本身有複製的意思｜
    // 把new運算的結果指定給$cat，$cat是一個變數
    $cat=new Animal('cat','Kitty','white');
    print_r($cat->getFeet());
    // 如果沒有加$，代表是一個值
    // 如果是$type，代表$type是可變變數
    // echo $cat->type."<br>";
    echo $cat->getName()."<br>";
    // echo $cat->hair_color."<br>";
    echo $cat->run()."<br>";
    echo $cat->speed()."<br>";
    // print_r($cat->feet);

    echo $cat->setName('Mary');
    echo $cat->getName();

?>

<h1>繼承</h1>
<?php


// implements實作的意思
class Cat extends Animal implements Behavior{
    protected $type='cat';
    protected $name='Kitty';
    // protected $name="Judy";
    function __construct($hair_color){
        $this->hair_color=$hair_color;
    }

    function jump(){
        echo $this->name . " jumpping 2m";
    }
    /*  
    function getFeet(){
        return $this->feet;
    }
    */
}

Interface Behavior{
    public function run();
    public function speed();
    public function jump();
}

$mycat=new Cat('white');

print_r($mycat->getFeet());

echo $mycat->getName();
echo "<br>";
echo $mycat->run();
echo "<br>";
echo $mycat->speed();
echo "<br>";
$mycat->setName("judy");

echo $mycat->getName();
echo "<br>";
echo $mycat->jump();

//echo Cat::name;
?>

<H1>靜態宣告</H1>
<?php

class Dog extends Animal implements Behavior{
    protected $type='dog';
    protected $name='Doggy';
    protected static  $count=0;
    //static $count=0;

    function __construct($hair_color){
        $this->hair_color=$hair_color;
        self::$count++;
    }

    function bark(){
        echo $this->name . " is barking";
    }

    function getFeet(){
        return $this->feet;
    }

    static function getCount(){
        return self::$count;
    }

    function jump(){
        echo $this->name . " jumpping 1m";
    }
}

echo Dog::getCount();

$dog1=new Dog('brown');
$dog2=new Dog('black');
$dog3=new Dog('orange');
$dog4=new Dog('white');
$dog5=new Dog('yellow');


echo Dog::getCount();
?>

</body>
</html>