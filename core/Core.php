<?php
namespace core;

use core\base\Route;

class Core{
    static $class_map = array();

    /*
     * 运行框架
     */
    static function run(){
        $route = new Route();
        $controller = ucfirst($route->controller);
        $method = $route->method;
        $GLOBALS['controller'] = $controller;
        $GLOBALS['method'] = $method;

        $app_path = str_replace('.','',APP_PATH);
        $app_path = str_replace('/','\\',$app_path);

        $controller_file = APP_PATH.'/controllers/'.$controller.'.class.php';

        if( is_file($controller_file) ){
            $controller = $app_path.'\controllers\\'.$controller;

            $obj = new $controller();
            $obj->$method();
        }else{
            die('Not Found File：'.$controller_file);
        }
    }

    /*
     * 自动加载类库
     */
    static function autoload($class){
        $class = str_replace('\\','/',$class);

        if(isset($class_map[$class])){
            return true;
        }else {
            if (is_file(ROOT_PATH . '/' . $class . '.class.php')) {
                include(ROOT_PATH . '/' . $class . '.class.php');
                self::$class_map[$class] = $class;
            } else {
                return false;
            }
        }
    }

    /*
     * 自动加载模型类
     */
    static function autoload_model($class){
        $class = str_replace('\\','/',$class);

        if(isset($class_map[$class])){
            return true;
        }else {
            if (is_file(ROOT_PATH . '/' . $class . '.php')) {
                include(ROOT_PATH . '/' . $class . '.php');
                self::$class_map[$class] = $class;
            } else {
                return false;
            }
        }
    }
}

//包含自定义函数库文件
/*$my_function = APP_PATH.'common/function.php';
if( file_exists($my_function) ){
    include($my_function);
}*/


//设置包含目录，类所在的目录 PATH_SEPARATOR 分隔符号 Linux(:) Windows(;)
/*$include_path = get_include_path();
$include_path .= PATH_SEPARATOR.CORE_PATH.'base/'; //框架基类
$include_path .= PATH_SEPARATOR.CORE_PATH.'class/'; //框架扩展类
$include_path .= PATH_SEPARATOR.APP_PATH.'controllers/'; //项目控制器类
$include_path .= PATH_SEPARATOR.APP_PATH.'models/'; //项目模型类*/


//设置include包含文件所在的所有目录
//set_include_path($include_path);


//自动加载类
/*function __autoload($className){
    //将类名转为小写
    if( strstr($className,'_model') ){
        include strtolower($className) . ".php";
    }else{
        include strtolower($className) . ".class.php";
    }
}*/

/*$route = new Route();
$controller = ucfirst($route->controller);
$method = $route->method;
$obj = new $controller();
$obj->$method();*/
//$obj->$method(isset($route->param)?$route->param:'');

//控制器、方法
/*$c = isset($_GET['c']) ? ucfirst( $_GET['c'] ) : 'Index';
$m = isset($_GET['m']) ? $_GET['m'] : 'index';


$obj = new $c();
$obj ->$m();*/