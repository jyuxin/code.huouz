<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>管理</title>
<!-- STYLE -->
<link href="/public/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" />
<link href="/public/css/huozu.css" type="text/css" rel="stylesheet" />
<!-- JS -->
<script src="/public/js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="/public/js/jquery.form.js" type="text/javascript" charset="utf-8"></script>
<script src="/public/bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
<script src="/public/js/plugins/layer/layer.js" type="text/javascript" charset="utf-8"></script>

<script>
$(function(){
    $("#menu_left").height($(document).height()-50);
    $("#top_nav_"+<?=$top_nav_id?>).addClass("nav_active_bg");
    $("#left_menu_"+<?=$left_menu_id?>).addClass("on");
});
</script>
</head>
<body>

<!-- 导航菜单 -->
<?php $this->display('public/nav_menu'); ?>