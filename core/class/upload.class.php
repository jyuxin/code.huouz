<?php
class Upload{
    private $path = '/data/upload';
    private $allow_type = array('jpg','png','gif','jpeg');
    private $max_size = 1024*1024*2;

    private $file_name;
    private $file_size;
    private $file_type;
    private $error_num;
    private $error_mes;
    function __construct(){

    }
}