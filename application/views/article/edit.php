<!-- 公共头部 -->
<?php $this->display('public/header'); ?>

<div class="main wrap">
    <div class="site_position">内容管理 > 文章管理</div>
    <div class="page_title">文章管理</div>

    <div class="container-fluid">
        <div class="row">
            <div class="edit_tab_wrap">
                <div class="title">
                    <?=!empty($id)?'编辑':'添加'?>
                    <a href="/article/edit">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>

                <form class="form-horizontal margin_top_20" action="/article/save" method="post" role="form" id="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title" class="col-sm-1 control-label">标题</label>
                        <div class="col-sm-3">
                            <input type="text" name="title" id="title" value="<?= !empty($article['title']) ? $article['title'] : '' ?>" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="picture" class="col-sm-1 control-label">封面</label>
                        <div class="col-sm-3">
                            <div class="image_container">
                                <img src="<?=!empty($article['picture'])?$article['picture']:'/public/images/ico/no_img.png'?>" id="preview" style="width:120px; height: 100px;padding: 1px; border: 1px solid #f5f5f5;">
                                <input type="file" name="picture" id="picture" class="hide" />
                            </div>

                            <input type="button" id="file_picture" value="浏览" class="btn btn-primary btn-sm margin_top_10"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keywords" class="col-sm-1 control-label">关键字</label>
                        <div class="col-sm-3">
                            <input type="text" name="keywords" id="keywords" value="<?= !empty($article['keywords']) ? $article['keywords'] : '' ?>" class="form-control input-sm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-1 control-label">描述</label>
                        <div class="col-sm-3">
                            <textarea name="description" id="description" class="form-control" rows="3"><?= !empty($article['description']) ? $article['description'] : '' ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-1 control-label">正文</label>
                        <div class="col-sm-11">
                            <?php get_content(!empty($article['content']) ? $article['content'] : ''); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-11">
                            <input type="hidden" value="<?= !empty($id) ? $id : '' ?>" name="id">

                            <input type="submit" id="" value="确定" class="btn btn-primary btn-sm"/>
                            <input type="button" id="submit" value="确定" class="btn btn-primary btn-sm"/>
                            <input type="button" onclick="history.back();" value="返回" class="btn btn-primary btn-sm" />
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
$(function(){
    $('#submit').click(function(){
        var data = $('#form').serializeArray();
        //var data = $('#form').ajaxForm();

        //var data = new FormData($("#form")[0]);

        $.post('/article/save',data,function(result){
            layer.msg(result.mes,{time:800},function(){
                window.history.back();
            });
        },"json");
    });


    $("#file_picture").click(function(){
        $("#picture").click();
    });
    $("#picture").change(function() {
        var $file = $(this);
        var fileObj = $file[0];
        var windowURL = window.URL || window.webkitURL;
        var dataURL;
        var $img = $("#preview");

        if(fileObj && fileObj.files && fileObj.files[0]){
            dataURL = windowURL.createObjectURL(fileObj.files[0]);
            $img.attr('src',dataURL);
            console.log($file.val());
        }else{
            dataURL = $file.val();
            var imgObj = document.getElementById("preview");
            // 两个坑:
            // 1、在设置filter属性时，元素必须已经存在在DOM树中，动态创建的Node，也需要在设置属性前加入到DOM中，先设置属性在加入，无效；
            // 2、src属性需要像下面的方式添加，上面的两种方式添加，无效；
            imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
            imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;

        }
    });

});
</script>
<!-- 公共底部 -->
<?php $this->display('public/footer'); ?>
