<?php
namespace application\models;

use core\base\Model;

class Admin_model extends Model{
    function __construct(){
        parent::__construct();
        parent::init_table('ji_admin');
    }
    
    function all_admin(){

        $result = $this->select();

        return $result;
    }
}