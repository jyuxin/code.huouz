<?php
namespace application\controllers;

class Article extends BASE{
    function __construct(){
        parent::__construct();

    }
    /*-----------------------------------------
     * 文章列表
     */
    function index(){
        $articles = M('ji_article')->select('id > 0','*','ctime DESC');

        $this->assign(array(
            'articles' => $articles,
        ));
        $this->display('article/index');
    }
    /*-----------------------------------------
     * 编辑文章
     */
    function edit(){
        $id = input_get('id');

        $article = array();
        if( !empty($id) ){
            $article = M('ji_article')->find("id = {$id}",'*');
            if( empty($article) ){
                show_info('','没有找到该记录');
            }
        }

        $this->assign(array(
            'id' => $id,

            'article' => $article,
        ));
        $this->display('article/edit');
    }
    /*-----------------------------------------
     * 保存文章
     */
    function save(){
        $id = input_post('id');

        p($_POST);
        p($_FILES, 1);
        $data['title'] = $_POST['title'];
        if( empty($data['title']) ){
            return_json(0,'请输入标题','');
        }

        if( !empty($_FILES['picture']['name']) ){
            $result_arr = upload_img($_FILES['picture']);
            $data['picture'] = $result_arr['path'];
        }

        $data['keywords'] = $_POST['keywords'];
        $data['description'] = $_POST['description'];
        $data['content'] = $_POST['content'];
        $data['utime'] = time();

        if( !empty($id) ){
            $rs = D('article')->update("id = {$id}",$data);
        }else{
            $data['ctime'] = time();

            $rs = D('article')->insert($data);
        }

        if($rs){
            return_json(1,'操作成功','');
        }else{
            return_json(0,'操作失败','');
        }
    }
    /*-----------------------------------------
     * 删除文章
     */
    function delete(){
        echo '参数错误';
    }
    //-----------------------------------------
}