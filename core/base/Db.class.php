<?php
namespace core\base;

class Db {
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pwd;
    private $db;

    function __construct(){
        $this->db_host = C('db_host','database');
        $this->db_user = C('db_user','database');
        $this->db_pwd  = C('db_pwd','database');
        $this->db_name = C('db_name','database');
        $this->connect();
    }
    /*--------------------------------------------
     * 链接数据库
     */
    function connect(){
        $this->db = new \mysqli($this->db_host, $this->db_user, $this->db_pwd, $this->db_name);
        
        if( mysqli_connect_errno() ){
            die( mysqli_connect_error() );
        }

        $this->db->set_charset('utf8');
    }
    /*--------------------------------------------
     * 执行sql语句
     */
    function db_query($sql){
        $result = $this->db->query($sql) or die( mysqli_error($this->db) );

        $ary = array();
        while( $row = $result->fetch_assoc() ){
            $ary[] = $row;
        }

        return $ary;
    }
    /*--------------------------------------------
    * 插入数据
    */
    function db_insert($data,$table){

        foreach($data as $key => $value){
            $keyArr[] = $key;
            $valueArr[] = "'".$value."'";
        }

        $keys = implode(',',$keyArr);
        $values = implode(',',$valueArr);

        $sql = "INSERT INTO ".$table."(".$keys.")VALUES(".$values.")";

        $result = $this->db->query($sql) or die( mysqli_error($this->db) );

        return $result;
    }
    /*--------------------------------------------
    * 更新数据
    */
    function db_update($where,$data,$table){

        foreach($data as $key => $value){
            $keyAndvalueArr[] = $key." = '".$value."'";
        }

        $keyAndvalues = implode(',', $keyAndvalueArr);

        $sql = "UPDATE ".$table." SET ".$keyAndvalues." WHERE ".$where;

        $result = $this->db->query($sql) or die( mysqli_error($this->db) );

        return $this->db->affected_rows;
    }
    //--------------------------------------------
}