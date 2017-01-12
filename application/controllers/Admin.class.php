<?php
namespace application\controllers;

class Admin extends BASE{
    function __construct(){
        parent::__construct();
    }

    /*
     * 管理员
     */
    function index(){
        $admins = D('admin')->all_admin();

        $this->assign(array(
            'admins' => $admins,
        ));
        $this->display('admin/index');
    }
    //-----------------------------------
}