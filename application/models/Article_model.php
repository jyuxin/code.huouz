<?php
namespace application\models;

use core\base\Model;

class Article_model extends Model{
    function __construct(){
        parent::__construct();
        parent::init_table('ji_article');
    }
}