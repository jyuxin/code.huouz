<!-- 公共头部 -->
<?php $this->display('public/header'); ?>
<script>
$(function(){
    $("#aaa").prop("indeterminate",true);
});
</script>
<div class="main">
    <div class="container-fluid">
        <label><input id="aaa" type="checkbox" value="1"  />复选框</label>
    </div>
</div>

<!-- 公共底部 -->
<?php $this->display('public/footer'); ?>