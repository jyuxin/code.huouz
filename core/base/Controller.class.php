<?php
namespace core\base;

class Controller{
    private $assign;

    function __construct(){

    }

    /*--------------------------------------------
     * 获取后台菜单
     */
    private function _admin_menu(){
        $controller = strtolower($GLOBALS['controller']);
        $method = strtolower($GLOBALS['method']);

        $public_top_menu = D('admin_menu')->get_top_menu();
        $public_left_menu = D('admin_menu')->get_left_menu($controller,$method);

        if( !empty($public_left_menu) ){
            $top_nav_id = $public_left_menu['active_menu']['top_nav_id'];
            $left_menu_id = $public_left_menu['active_menu']['left_menu_id'];
            unset($public_left_menu['active_menu']);
        }

        $this->assign(array(
            'top_nav_id' => !empty($top_nav_id)?$top_nav_id:'',
            'left_menu_id' => !empty($left_menu_id)?$left_menu_id:'',
            'public_top_menu' => $public_top_menu,
            'public_left_menu' => $public_left_menu,
        ));
    }
    /*--------------------------------------------
     * 分配变量
     */
    function assign($arr){
        foreach( $arr as $key => $val){
            $this->assign[$key] = $val;
        }
    }
    /*--------------------------------------------
     * 视图方法
     */
    function display($file){
        $file = $file.'.php';
        $file_path = APP_PATH.'/views/'.$file;

        if( is_file($file_path) ){
            $this->_admin_menu();
            if( isset($this->assign) ){
                extract($this->assign);
            }
            include($file_path);
        }else{
            die('Not Found File：'.$file_path);
        }
    }
    //--------------------------------------------
}