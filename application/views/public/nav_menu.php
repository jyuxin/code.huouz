<div class="container-fluid">
    <div class="row nav_bg">
        <div class="navbar-header" style="width: 10%;">
            <div class="navbar-brand color_fff">后台管理</div>
        </div>
        <ul class="nav navbar-nav" style="width: 90%;">
            <?php if( !empty($public_top_menu) ){ ?>
                <?php foreach($public_top_menu as $key => $top_menu){ ?>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle nav_text_color"
                           id="top_nav_<?=$top_menu['id']?>" data-toggle="dropdown">
                            <?=$top_menu['name']?> <b class="caret"></b>
                        </a>
                        <?php if( !empty($top_menu['son']) ){ ?>
                            <ul class="dropdown-menu" style="border-top: none; border-radius: 0; box-shadow: none;">
                                <?php foreach($top_menu['son'] as $son_key => $son_menu){ ?>
                                    <li>
                                        <a href="/<?=$son_menu['controller']?>/<?=$son_menu['method']?><?=$son_menu['param']?>">
                                            <?=$son_menu['name']?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>

<div class="menu_left" id="menu_left">
    <ul class="list-unstyled">
        <?php if( !empty($public_left_menu) ){ ?>
            <?php foreach($public_left_menu as $key => $left_menu){ ?>
                <li>
                    <h4 class="panel-title">
                        <a href="javascript:;" class="display_block one_layer" data-toggle="collapse"
                           data-target="#<?=$left_menu['controller']?>_<?=$left_menu['id']?>">
                            <?=$left_menu['name']?>
                        </a>
                    </h4>
                    <?php if( !empty($left_menu['son']) ){ ?>
                        <div id="<?=$left_menu['controller']?>_<?=$left_menu['id']?>" class="collapse in two_layer">
                            <?php foreach($left_menu['son'] as $son_key => $son_menu){ ?>
                                <a href="/<?=$son_menu['controller']?>/<?=$son_menu['method']?><?=$son_menu['param']?>"
                                    id="left_menu_<?=$son_menu['id']?>">
                                    <?=$son_menu['name']?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</div>