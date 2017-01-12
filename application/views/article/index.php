<!-- 公共头部 -->
<?php $this->display('public/header'); ?>

<div class="main wrap">
    <div class="site_position">内容管理 > 文章管理</div>
    <div class="page_title">文章</div>

    <div class="container-fluid">
        <div class="row">
            <div class="tab_wrap">
                <div class="title">
                    列表
                    <a href="/article/edit">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>

                <table class="table table-bordered margin_bottom_0">
                    <thead>
                    <tr>
                        <th align="center" width="50">ID</th>
                        <th width="60">封面</th>
                        <th align="left">标题</th>
                        <th width="140">更新时间</th>
                        <th width="80">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if( !empty($articles) ): ?>
                        <?php foreach ( $articles as $key => $article ){ ?>
                            <tr>
                                <td align="center"><?= $article['id'] ?></td>
                                <td></td>
                                <td><?= $article['title'] ?></td>
                                <td align="center"><?= date('Y-m-d H:i',$article['utime']) ?></td>
                                <td align="center">
                                    <a href="/article/edit?id=<?= $article['id'] ?>" >修改</a>
                                    <a href="/article/delete?id=<?= $article['id'] ?>" >删除</a>
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