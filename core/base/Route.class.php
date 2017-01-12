<?php
namespace core\base;

class Route{
    public $controller;
    public $method;
    public $param;

    function __construct(){
        $this->set_route();
    }

    /*
     * 解析url规则  使用$_SERVER['PATH_INFO']变量
     *
     * 注意：(1)$_SERVER['REQUEST_URI'];
     *         使用此变量路径后面不可以加参数 [例：http://localhost/index/index?id=1&tile=abc]
     * 因为会把‘index?id=1&tile=abc’当作整体（当成方法名）
     *      (2)$_SERVER['PATH_INFO']; 使用此变量路径后面可以加参数 如：http://localhost/index/index?id=1&tile=abc
     */
    private function set_route(){
        if( !empty($_SERVER['PATH_INFO']) /*&& $_SERVER['REQUEST_URI'] != '/'*/){
            $url = $_SERVER['PATH_INFO'];
            $url_arr = explode('/',trim($url,'/'));

            if( isset($url_arr[0]) ){
                $this->controller = $url_arr[0];
                unset($url_arr[0]);
            }
            if( isset($url_arr[1]) ){
                $this->method = $url_arr[1];
                unset($url_arr[1]);
            }else{
                $this->method = 'index';
            }

            //路径模式参数
            /*if( !empty($url_arr) ){
                $count = count($url_arr) + 2;
                $i = 2;
                while ($i<$count){
                    if(isset($url_arr[$i+1])){
                        $_GET[$url_arr[$i]] = $url_arr[$i+1];
                    }
                    $i = $i+2;
                }
            }*/

        }else{
            $this->controller = 'Index';
            $this->method = 'index';
        }
    }
}