<?php
namespace core\base;

class Model{
    protected $db;
    protected $table_name;
    function __construct(){
        $this->db = new Db();
    }
    /*-------------------------------------------------
     * 初始化
     */
    function init_table($table_name){
        $this->table_name = $table_name;
    }
    /*-------------------------------------------------
    * 查询一条数据
    */
    function find($where = 'id > 0',$field = '*',$order = '',$group = '',$table = ''){
        if( empty($table) ){
            $table = $this->table_name;
        }

        $sql = "SELECT $field FROM $table WHERE $where";
        if( !empty($order) ){
            $sql .= " ORDER BY {$order}";
        }

        if( !empty($group) ){
            $sql .= " GROUP BY {$group}";
        }

        $sql .= " LIMIT 1";

        $result = $this->db->db_query($sql);
        if( !empty($result) ){
            $result = $result[0];
        }

        return $result;
    }
    /*-------------------------------------------------
     * 查询多条数据
     */
    function select($where = 'id > 0',$field = '*',$order = '',$group = '',$table = ''){
        if( empty($table) ){
            $table = $this->table_name;
        }

        $sql = "SELECT $field FROM $table WHERE $where";
        if( !empty($order) ){
            $sql .= " ORDER BY {$order}";
        }

        if( !empty($group) ){
            $sql .= " GROUP BY {$group}";
        }

        $result = $this->db->db_query($sql);

        return $result;
    }
    /*-------------------------------------------------
     * 更新数据
     */
    function update($where,$data,$table =''){
        if( empty($where) ){
            exit('where not null');
        }

        if( empty($table) ){
            $table = $this->table_name;
        }

        $result = $this->db->db_update($where,$data,$table);

        return $result;
    }
    /*-------------------------------------------------
     * 添加数据
     */
    function insert($data,$table = ''){
        if( empty($table) ){
            $table = $this->table_name;
        }

        $result = $this->db->db_insert($data,$table);

        return $result;
    }
    /*-------------------------------------------------
     * 删除数据
     */
    function delete(){

    }
    //-------------------------------------------------
}