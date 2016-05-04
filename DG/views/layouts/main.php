<!DOCTYPE html>
<html lang="en" class="h">
<head>
    <meta charset="UTF-8" />
    <title>多格</title>
    <!-- css -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/base.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/common.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/page.css" />
    <!-- js -->
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/base.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/common.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/page.js"></script>
</head>

<body id="main-body">
<div id="main" class="pa t0 l0 w h">
    <!-- 主页左部 -->
    <div id="main-leftPanel" class="h w60">
        <!-- 左边菜单 -->
        <div class="main-leftMenu h w60">
            <!-- 左边菜单-切换 -->
            <div class="leftMenu-tab">
                <!-- 头像 -->
                <div class="leftMenu-tab-avatar tc w60 h56 pt8 pb8">
                    <a href="">
                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user/1/1.jpg" alt="" />
                    </a>
                </div>
                <!-- 导航 -->
                <div class="leftMenu-wrap w60">
                    <ul class="leftMenu-current">
                        <a href="<?php echo Yii::$app->request->baseUrl. '/user/dashboard' ?>">
                            <li class="leftMenu-btn w60 h48 active"><i class="fa fa-dashboard"></i></li>
                        </a>
                        <li class="leftMenu-btn w60 h48"><i class="fa fa-commenting"></i></li>
                        <li class="leftMenu-btn w60 h48"><i class="fa fa-search"></i></li>
                    </ul>
                    <ul class="leftMenu-module">
                        <a href="<?php echo Yii::$app->request->baseUrl. '/user/team' ?>">
                            <li class="leftMenu-btn w60 h48"><i class="fa fa-users"></i></li>
                        </a>
                        <li class="leftMenu-btn w60 h48"><i class="fa fa-folder"></i></li>
                    </ul>
                </div>
                <!-- 快捷操作 -->
                <div class="leftMenu-footer w60 h60 tc">
                    <i class="leftMenu-btn fa fa-plus-circle"></i>
                </div>
            </div>
            <!-- 二级菜单 -->
            <div class="leftMenu-content hidden"></div>
        </div>
    </div>

    <!-- 右边右部 -->
    <div id="main-rightPanel" class="h">
        <!-- <div class="main-navbar">
            <div class="navbar-main"></div>
            <div class="navbar-sub"></div>
        </div>
    
        <div class="main-content">
            <div class="module m14">
                <div id="testDiv">
                    
                </div>
            </div>
        </div> -->
        
        <?php echo empty($content) ? "" : $content; ?>
    </div>
</div>

<script>
    
    var main = {};
    main.mainContent = $('.main-content');
    main.modulewrap = $('.module-wrap');

    var setContent = function(){
        var height = document.body.offsetHeight;
        var width = document.body.offsetWidth;
        main.mainContent.css('min-height',(height-84)+'px');
        // main.mainContent.css('min-width','1306px');
        // main.modulewrap.css('min-width','1278px');
        main.mainContent.css('width',(width-60)+'px');
        main.modulewrap.css('min-height',(height-112)+'px');
        main.modulewrap.css('width',(width-88)+'px');
    }  

    setContent();

    window.onresize=function(){  
        setContent();
    }

    main.leftMenuBtn = $('.leftMenu-btn');
    for(var i=0; i< main.leftMenuBtn.length-1;i++){
        main.leftMenuBtn.eq(i).click(function(){
            main.leftMenuBtn.removeClass('active');
            $(this).addClass('active');
        });
    }

</script>

</body>
</html>

<?#php echo empty($content) ? "" : $content; ?>