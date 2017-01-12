<?php
namespace application\models;

use core\base\Model;

class Admin_menu_model extends Model{
    function __construct(){
        parent::__construct();
        parent::init_table('ji_admin_menu');
    }

    /*----------------------------------------------------
     * 获取菜单
     */
    function get_menu(){
        $where = 'id > 0';
        $field = "*,concat(layer_path,'-',id) as path";
        $order = 'path';
        $result = $this->select($where,$field,$order);
        if( !empty($result )){
            foreach($result as $key => $val){
                $result[$key]['layer'] = count(explode('-',$val['layer_path']));
            }
        }

        return $result;
    }
    /*----------------------------------------------------
     * @desc 获取菜单 -> 后台顶部菜单
     */
    function get_top_menu(){
        $where = 'parent_id = 0';
        $field = "*,concat(layer_path,'-',id) as path";
        $order = 'path';

        $result = $this->select($where,$field,$order);
        if( !empty($result) ) {
            foreach ( $result as $key => $val ) {
                $result[$key]['son'] =  $this->select("parent_id = {$val['id']}",$field,$order);
            }
        }

        return $result;
    }
    /*----------------------------------------------------
     * @desc 获取菜单 -> 后台左侧菜单
     * @param $controller 控制器
     * @param $method 动作[方法]
     */
    function get_left_menu($controller,$method){
        $controller = strtolower($controller);
        $where = "controller = '{$controller}' AND method = '{$method}'";
        $field = "*,concat(layer_path,'-',id) as path";

        $menu = $this->find($where,$field,'path DESC');

        $result = array();
        if( !empty($menu) ){
            $layer_path_arr = explode('-',$menu['path']);
            $root_id = $layer_path_arr[1];

            $menu['top_nav_id'] = $root_id;
            if( count($layer_path_arr) >= 4 ){
                $menu['left_menu_id'] = $layer_path_arr[3];
            }else{
                $menu['left_menu_id'] = '';
            }

            $result = $this->select("parent_id = {$root_id}",$field,'path');
            if( !empty($result) ){
                foreach( $result as $key => $val ){
                    $result[$key]['son'] =  $this->select("parent_id = {$val['id']}",$field,'path');
                }
                $result['active_menu'] = $menu;
            }
        }

        return $result;
    }
    //----------------------------------------------------
}