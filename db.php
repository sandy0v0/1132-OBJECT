<?php

// 去資料庫建一個db99的資料庫，要複製school的classes，點classes再去操作頁面，copy table to (database.table)，直接執行即可

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db99";
    protected $pdo;
    protected $table;

    // 建構式construct，    指定運算子=　　，this=DB
    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    // 我們把,$dept=$DEPT->q("SELECT * FROM classes")做成function
    // 在做前construct，已經先被執行，$pdo 跟 $table 已被指定，所以我們可以新建一個All從中取得資料
    /**
     * 撈出全部資料(=多筆資料 where)
     * 1. 整張資料表
     * 2. 有條件
     * 3. 其他SQL功能
    */
    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if(!empty($arg[0])){
            if(is_array($arg[0])){

                $where=$this->a2s($arg[0]);
                $sql=$sql . " WHERE ". join(" && ",$where);
            }else{
                //$sql=$sql.$arg[0];
                $sql .= $arg[0];
            }
        }

        return $this->fetchALL($sql);
    }

    // update table set[ a=>1,b=>2,]
    /**
    * 把陣列轉成條件字串陣列
    */
    function a2s($array){
        $tmp=[];
        foreach($array as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }

    function fetchOne($sql){
        // echo sql;
        return $this->pdo->query($sql)->fetch();

    }
    function fetchALL($sql){
        // echo sql;
        return $this->pdo->query($sql)->fetchALL();
    }
}

/*
    function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }
*/


function dd($array){
    echo "<pre>";
    print_r($array);
    echo "(/pre)";
}

// 你要抓的資料庫為(classes)，所以要注意抓的地方是哪裡
// new DB 在做實體化，把藍圖的功能實體化
$DEPT=new DB('classes');

// $dept=$DEPT->q("SELECT * FROM classes");
// 原本的程式碼如上，我們新增一個function all()，類別內的方法，來完成資料庫存取
// 取代$dept=$DEPT->q("SELECT * FROM classes")這段程式，使其更精簡
$dept=$DEPT->all(['id'=>3]);

dd($dept);

