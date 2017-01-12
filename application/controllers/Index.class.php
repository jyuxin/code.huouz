<?php
namespace application\controllers;

class Index extends Base{
    function __construct(){
        parent::__construct();
    }
    /*----------------------------------------------
     * 主页
     */
    function index(){
        $this->display('index/index');
    }
	/*----------------------------------------------
     * 修改密码
     */
    function password(){

        $this->display('index/password');
    }
    //----------------------------------------------
}