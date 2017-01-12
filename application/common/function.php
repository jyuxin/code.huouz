<?php
/*-------------------------------------------------
 * 返回JSON数据
 */
function return_json($flag=0,$mes='',$data=array()){
    $result['flag'] = $flag;
    $result['mes'] = $mes;
    $result['data'] = $data;

    echo json_encode($result);
    exit();
}
/*-------------------------------------------------
 * 处理上传图片
 */
function upload_img($file){
    $file_name = date('YmdHis').rand(100,999);
    $file_path = 'upload/images/'.date('Ymd').'/';

    $path = '';
    if(!file_exists($file_path)){
        $mk = mkdir($file_path);
        if($mk){
            $is_ok = move_uploaded_file($file['tmp_name'],$file_path.$file_name.'.jpg');
            if($is_ok){
                $path = '/'.$file_path.$file_name.'.jpg';
            }
        }
    }else{
        $is_ok = move_uploaded_file($file['tmp_name'],$file_path.$file_name.'.jpg');
        if($is_ok){
            $path = '/'.$file_path.$file_name.'.jpg';
        }
    }

    return array('path'=>$path);
}
/*-------------------------------------------------
 * 百度富文本编辑器 umeditor
 * @param $content:显示的内容
 * @param $um_id:编辑器的id 及 name
 * @param $width:宽度
 * @param $height:高度
 */
function get_content($content = '', $um_id = 'content', $width = '80%', $height = '340px'){
    $str = '';
    $str .= '<link href="/public/extend/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">';
    $str .= '<script type="text/javascript" src="/public/extend/umeditor/third-party/jquery.min.js"></script>';
    $str .= '<script type="text/javascript" src="/public/extend/umeditor/umeditor.config.js"></script>';
    $str .= '<script type="text/javascript" src="/public/extend/umeditor/umeditor.min.js"></script>';
    $str .= '<script type="text/javascript" src="/public/extend/umeditor/lang/zh-cn/zh-cn.js"></script>';

    $str .= '<textarea id="'.$um_id.'" name="'.$um_id.'" style="width:'.$width.';height:'.$height.';">'.$content.'</textarea>';

    $str .= '<script type="text/javascript">';
            //实例化编辑器
    $str .= 'var um = UM.getEditor("'.$um_id.'");';
    $str .= '</script>';
    
    echo $str;
}
//如果在页面中有多个编辑器，又不想导入js文件 则使用此方法
function add_content($content = '', $um_id = 'content', $width = '80%', $height = '340px'){
    $str = '';
    $str .= '<textarea id="'.$um_id.'" name="'.$um_id.'" style="width:'.$width.';height:'.$height.';">'.$content.'</textarea>';

    $str .= '<script type="text/javascript">';
    //实例化编辑器
    $str .= 'var um = UM.getEditor("'.$um_id.'");';
    $str .= '</script>';

    echo $str;
}
//-------------------------------------------------