<?php 
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{

    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
    protected $pdo;
    protected $table;

    public function __construct($table)//因為會優先執行，故可以在此將pdo，來實作
    {
        $this -> table=$table;
        $this -> pdo=new PDO($this->dsn,'root','');
    }



    // *****提供條件*****
    function all( $where = '', $other = '')
    {
        // global $pdo;
        $sql = "select * from `$this->table` ";
        if (isset($this->table) && !empty($table)) {
            if (is_array($where)) {
                if (!empty($where)) {
                    foreach ($where as $col => $value) {
                        $tmp[] = "`$col`='$value'";
                    }
                    $sql .= " where " . join(" && ", $tmp);
                }
            } else {
                $sql .= " $where";
            }
            $sql .= $other;
            //echo 'all=>'.$sql;
            $rows = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } else {
            echo "錯誤:沒有指定的資料表名稱";
        }
    }


    // *****查詢資料*****
    function find( $id)
    {
        // global $pdo;
        $sql = "select * from `$this->table` ";
        if (is_array($id)) {
            foreach ($id as $col => $value) {
                $tmp[] = "`$col`='$value'";
            }
            $sql .= " where " . join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " where `id`='$id'";
        } else {
            echo "錯誤:參數的資料型態比須是數字或陣列";
        }
        //echo 'find=>'.$sql;
        $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $row;
    }



    // *****更新資料*****
    function update( $id, $cols)
    {
        // global $pdo;
        $sql = "update `$this->table` set ";
        if (!empty($cols)) {
            foreach ($cols as $col => $value) {
                $tmp[] = "`$col`='$value'";
            }
        } else {
            echo "錯誤:缺少要編輯的欄位陣列";
        }
        $sql .= join(",", $tmp);
        $tmp = [];
        if (is_array($id)) {
            foreach ($id as $col => $value) {
                $tmp[] = "`$col`='$value'";
            }
            $sql .= " where " . join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " where `id`='$id'";
        } else {
            echo "錯誤:參數的資料型態比須是數字或陣列";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }


    // *****新增資料*****
    function insert( $values)
    {
        // global $pdo;
        $sql = "insert into `$this->table` ";
        $cols = "(`" . join("`,`", array_keys($values)) . "`)";
        $vals = "('" . join("','", $values) . "')";
        $sql = $sql . $cols . " values " . $vals;
        //echo $sql;
        return $this->pdo->exec($sql);
    }
    // *****刪除*****
    function del( $id)
    {
        // global $pdo;
        $sql = "delete from `$this->table` where ";
        if (is_array($id)) {
            foreach ($id as $col => $value) {
                $tmp[] = "`$col`='$value'";
            }
            $sql .= join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " `id`='$id'";
        } else {
            echo "錯誤:參數的資料型態比須是數字或陣列";
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }
}
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
$student=new DB('students');
// $rows=$student->all();
// dd($rows);


// $rows=$student->update('1',['name'=>'丁于于']);
// dd($rows);


// $rows=$student->del('479');
// dd($rows);


// $rows=$student->find('479');
// dd($rows);




?>