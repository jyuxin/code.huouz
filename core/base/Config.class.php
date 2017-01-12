<?php
namespace core\base;

class Config{
    static $config  =array();

    static function item($config_item,$config_name){
        $file_path = APP_PATH.'/config/'.$config_name.'.php';
        if(!is_file($file_path)){
            throw new \Exception('Not Found File:'.$file_path);
        }

        if(isset(self::$config[$config_name])){
            return self::$config[$config_name][$config_item];
        }else{
            $conf = include($file_path);

            if(isset($conf[$config_item])){
                self::$config[$config_name] = $conf;

                return self::$config[$config_name][$config_item];
            }else{
                throw new \Exception('Not Found Config Item:'.$config_item);
            }
        }
    }
}