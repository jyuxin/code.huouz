<?php
namespace application\controllers;

class Photo extends BASE{
    function __construct(){
        parent::__construct();

    }
    /*-----------------------------
     * 图片列表
     */
    function index(){
        $photos = M('ji_photo')->select();
		
		$this->display('photo/index');
    }
    //-----------------------------
}