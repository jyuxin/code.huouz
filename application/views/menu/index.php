<!-- 公共头部 -->
<?php $this->display('public/header'); ?>

<div class="main wrap">
    <div class="site_position">菜单管理 > 菜单</div>
    <div class="page_title">菜单</div>

    <div class="container-fluid">
        <div class="row">
            <div class="tab_wrap">
                <div class="title">
                    菜单
                    <a href="/menu/edit">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>

                <table class="table table-bordered margin_bottom_0">
                    <thead>
                        <tr>
                            <th width="50">ID</th>
                            <th width="200">名称</th>
                            <th align="left">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if( !empty($menu) ): ?>
                            <?php foreach ( $menu as $k => $val ){ ?>
                                <tr>
                                    <td align="center"><?= $val['id'] ?></td>
                                    <td <?php echo $val['layer']>1 ? 'style="padding-left:'. ($val['layer']-1)*20 .'px;"':'' ?> >
                                        <?= $val['name'] ?>
                                    </td>
                                    <td>
                                        <a href="/menu/edit?id=<?=$val['id']?>" >
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="/menu/edit?parent_id=<?=$val['id']?>" >
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                        <a href="/menu/delete?id=<?=$val['id']?>" >
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- 公共底部 -->
<?php $this->display('public/footer'); ?>
