<?php
/*-----------------------------------------
 * 打印函数
 */
function p($param,$exit = 0){
    echo '<pre>';
    print_r($param);
    echo '</pre>';

    if( $exit ){
        exit();
    }
}
/*-----------------------------------------
 * 成功信息
 */
function show_info($url='',$info='',$time=0.5){
    if( empty($url) ){
        $str =  '<script>';
        if( !empty($info) ){
            $str .= "\r\nalert('{$info}');\r\nwindow.history.back();\r\n";
        }else{
            $str .= "\r\nwindow.history.back();\r\n";
        }
        $str .=  '</script>';
        echo $str;
    }else{
        if( !empty($info) ){
            echo $info;
        }
        header("refresh:{$time};url={$url}");
    }

    exit();
}
/*-----------------------------------------
 * 封装$_GET
 */
function input_get($item){
    if( isset($item) ){
        $result = isset($_GET[$item]) ? $_GET[$item] : '';
    }else{
        $result = $_GET;
    }

    return $result;
}
/*-----------------------------------------
 * 封装$_POST
 */
function input_post($item){
    if( isset($item) ){
        $result = isset($_POST[$item]) ? $_POST[$item] : '';
    }else{
        $result = $_POST;
    }

    return $result;
}
/*-----------------------------------------
 * 获取配置项
 */
function C($config_item,$config_name='config'){
    $item = \core\base\Config::item($config_item,$config_name);

    return $item;
}
/*-----------------------------------------
 * 实例化表
 */
function M($table_name = ''){
    if( empty($table_name) ){
        return false;
    }else{
        $table_name = ($table_name);
        $obj = new \core\base\MODEL();
        $obj->init_table($table_name);

        return $obj;
    }
}
/*-----------------------------------------
 * 实例化模型
 */
function D($table_name = ''){
    if( empty($table_name) ){
        return false;
    }else{
        $app_path = str_replace('.','',APP_PATH);
        $app_path = str_replace('/','\\',$app_path);

        $table_name = ucfirst($table_name.'_model');

        $model_file = APP_PATH.'/models/'.$table_name.'.php';

        if(is_file($model_file)){
            $table_name = $app_path.'\models\\'.$table_name;
            $obj = new $table_name();
            return $obj;
        }else{
            die('Not Found File：'.$model_file);
        }
    }
}
//-----------------------------------------