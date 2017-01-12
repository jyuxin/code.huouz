<?php
namespace application\controllers;

/**
 * 导航菜单
 */
class Menu extends BASE{
    /*-------------------------------------------
     * 列表
     */
    function index(){
        $menu = D('admin_menu')->get_menu();

        $this->assign(array(
            'menu' => $menu,
        ));
        $this->display('menu/index');
    }
    /*-------------------------------------------
     * 修改、添加
     */
    function edit(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if( !empty($id) ){
            $menu = M('ji_admin_menu')->find("id = $id",'id,name,controller,method,param');
            if( !$menu ){
                exit('没有找到该记录！');
            }
        }else{
            $parent_id = isset($_GET['parent_id']) ? $_GET['parent_id'] : '';
        }

        require (APP_VIEW.'menu/edit.php');
    }
    /*-------------------------------------------
     * 保存
     */
    function save(){
        $id = isset($_POST['id'])?$_POST['id']:'';

        $parent_id = !empty($_POST['parent_id']) ? $_POST['parent_id'] : 0;
        if( $parent_id == 0 ){
            $layer_path = '0';
        }else{
            $parent_arr = M('ji_admin_menu')->find("id = $parent_id",'layer_path');
            if( !empty($parent_arr) ){
                $layer_path = $parent_arr['layer_path'].'-'.$parent_id;
            }else{
                exit('参数错误，001!');
            }
        }

        $data['name'] = $_POST['name'];
        if( empty($data['name']) ){
            exit('请输入名称。');
        }
        $data['controller'] = strtolower($_POST['controller']);
        if( empty($data['controller']) ){
            exit('请输入模块。');
        }
        $data['method'] = strtolower($_POST['method']);
        if( empty($data['method']) ){
            exit('请输入方法。');
        }
        $data['param'] = $_POST['param'];
        $data['utime'] = time();

        if( !empty($id) ){
            $rs = M('ji_admin_menu')->update("id = $id",$data);
        }else{
            $data['parent_id'] = $parent_id;
            $data['layer_path'] = $layer_path;
            $data['ctime'] = time();

            $rs = M('ji_admin_menu')->insert($data);
        }

        if( $rs ){
            show_info('/menu','操作成功');
        }else{
            show_info('','操作失败,请重试');
        }
    }
    /*-------------------------------------------
     * 删除
     */
    function delete(){
        $id = !empty($_GET['id']) ? $_GET['id'] : '';
        if( $id ){
            exit('参数错误');
        }

        $rs = D();

    }
    //-------------------------------------------
}