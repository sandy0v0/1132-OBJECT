<?php

// 去資料庫建一個db99的資料庫，要複製school的classes，點classes再去操作頁面，copy table to (database.table)，直接執行即可

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db99";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }



}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "(/pre)";
}

// 你要抓的資料庫為(classes)，所以要注意抓的地方是哪裡
$DEPT=new DB('classes');

$dept=$DEPT->q("SELECT * FROM classes");

dd($dept);

