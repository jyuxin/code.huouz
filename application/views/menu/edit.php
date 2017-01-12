<!-- 公共头部 -->
<?php $this->display('public/header'); ?>

<div class="main wrap">
    <div class="site_position">菜单管理 > 菜单</div>
    <div class="page_title">菜单</div>

    <div class="container-fluid">
        <div class="row">
            <div class="tab_wrap">
                <div class="title">
                    <?=!empty($id)?'编辑':'添加'?>
                    <a href="/menu/edit">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>
                <form action="/menu/save" method="post" class="form-horizontal" role="form">
                    <table class="table table-bordered margin_bottom_0">
                        <tbody>
                            <tr>
                                <td width="100" class="v_align_m text-right">名称</td>
                                <td>
                                    <div class="row col-sm-3">
                                        <input type="text" value="<?= !empty($menu['name']) ? $menu['name'] : '' ?>" name="name" class="form-control  input-sm" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="v_align_m text-right">模块</td>
                                <td>
                                    <div class="row col-sm-3">
                                        <input type="text" value="<?= !empty($menu['controller']) ? $menu['controller'] : '' ?>" name="controller" class="form-control  input-sm">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="v_align_m text-right">方法</td>
                                <td>
                                    <div class="row col-sm-3">
                                        <input type="text" value="<?=!empty($menu['method']) ? $menu['method'] : '' ?>" name="method" class="form-control  input-sm">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="v_align_m text-right">参数</td>
                                <td>
                                    <div class="row col-sm-3">
                                        <input type="text" value="<?= !empty($menu['param']) ? $menu['param'] : '' ?>" name="param" class="form-control  input-sm" />
                                        <small>格式：?xx=xx&xx=xx……</small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" value="<?= !empty($id) ? $id : '' ?>" name="id">
                                    <input type="hidden" value="<?= !empty($parent_id) ? $parent_id : '' ?>" name="parent_id">
                                </td>
                                <td>
                                    <input type="submit" value="确定" class="btn btn-primary btn-sm"/>
                                    <input type="button" onclick="history.back();" value="返回" class="btn btn-primary btn-sm" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>
    </div>

</div>

<!-- 公共底部 -->
<?php $this->display('public/footer'); ?>
