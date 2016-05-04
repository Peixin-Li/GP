<?php
/**
 * @Author: lpx
 * @Date:   2016-02-14 14:04:52
 * @Last Modified time: 2016-03-24 19:02:15
 */
?>

<!-- css -->
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/base.css" />
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/common.css" />
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/page.css" />

<!-- js -->
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/base.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/common.js"></script>
<!-- <script type="text/javascript" src="<?#php echo Yii::$app->request->baseUrl; ?>/js/page.js"></script> -->

<head>
    <meta charset="utf-8">
    <title>多格</title>
</head>
<!-- html -->
<body id="login-body">
    <!-- login-wrapper -->
    <div id="login-wrapper" class="w h550 pa">
            <!-- login-content -->
            <div id="login-content" class="w960 h450 mb40 bc">

                <!-- login-logo -->
                <div id="login-logo" class="w960 h56 mb50">
                    <h1>
                        <a href="javascript:;" class="block w292 h56 bc"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/duoge/logo.png" alt=""></a>
                    </h1>                    
                </div>

                <!-- login-form -->
                <div id="login-form" class="w380 h344 bc">

                    <!-- 切换登陆、注册 -->
                    <div class="tc mb30">
                        <a id="toLoginBtn" href="javascript:;">账号登录</a>
                        <span class="ml10 mr10">或</span> 
                        <a id="toRegistBtn" href="javascript:;">立即注册</a>
                    </div>

                    <!-- 登录 -->
                    <div id="loginDiv" class="">
                        <div class="login-content-form pt36 pb36 pl30 pr30 bcwhite pr">
                            <span class="glyphicon glyphicon-triangle-top login-icon-top-shadow pa" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-triangle-top login-icon-top pa" aria-hidden="true"></span>
                            <form action="javascript:;" method="post" class="tc">
                                <input type="text" id="login-account" class="form-control inline-block mb20 h45 inline-block" placeholder="登录邮箱" name="account" data-toggle="popover" />
                                <input type="passWord" id="login-passWord" class="form-control h45 mb20" placeholder="密码" name="pw" data-toggle="popover"/>
                                <p id="loginTips" class="mb15 red inline-block h20"></p>
                                <button id="login" class="btn btn-success btn-block h45">登录</button>                                
                            </form>
                        </div>
                    </div>

                    <!-- 注册 -->
                    <div id="registDiv" class="hidden">
                        <div class="login-content-form pt36 pb36 pl30 bcwhite pr">
                            <span class="glyphicon glyphicon-triangle-top login-regist-icon-top-shadow pa" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-triangle-top login-regist-icon-top pa" aria-hidden="true"></span>
                            <form action="javascript:;" method="post" class="pr">
                                <input type="text" id="regist-account" class="form-control w320 mb20 h45 inline-block" placeholder="登录邮箱" name="account" data-toggle="popover" />
                                <input type="text" id="regist-name" class="form-control w320 mb20 h45 inline-block" placeholder="你的名字" name="name" data-toggle="popover" />
                                <input type="passWord" id="regist-pw" class="form-control w320 h45 mb20 inline-block" placeholder="密码" name="pw" data-toggle="popover" />
                                <!-- <img class="hidden regist-icon pa mt12" src="<?#php echo Yii::$app->request->baseUrl; ?>/images/icon/right.png" alt="" />  -->
                                <input type="passWord" id="regist-pw2" class="form-control w320 h45 mb20 inline-block" placeholder="再次输入密码" name="pw2" data-toggle="popover" />
                                <div class="tc"> 
                                    <p id="registTips" class="mb15 red inline-block h20"></p>
                                </div>
                                <button id="regist" class="btn btn-success btn-block h45 w320">注册</button>
                            </form>
                        </div>
                    </div>

                </div>
                

            </div>
            <div class="login-main-foot w960 h60 bc"></div>

    </div>
</body>

<script>
$(document).ready(function(){

    // 创建命名空间
    var login = {};
    // 获取账号登录、立即注册按钮
    login.toLogin = $('#toLoginBtn');
    login.toRegist = $('#toRegistBtn');
    // 获取账号登录、立即注册按钮对应的div
    login.loginDiv = $('#loginDiv');
    login.registDiv = $('#registDiv');
    //获取登录、注册按钮
    login.login = $('#login');
    login.regist= $('#regist');
    //获取登录界面的登录邮箱、密码输入框
    login.loginAccount = $('#login-account');
    login.loginPw = $('#login-passWord');
    //获取注册界面的登录邮箱、名字和密码输入框
    login.registAccount = $('#regist-account');
    login.registName = $('#regist-name');
    login.registPw = $('#regist-pw');
    login.registPw2 = $('#regist-pw2');
    //获取提示文字:用于用户登录、注册失败时给出原因
    login.loginTips = $('#loginTips')[0];
    login.registTips = $('#registTips')[0];

    // 为账号登录、立即注册按钮添加切换div的方法
    login.toRegist.click(function(ev){
        showDiv('loginDiv','registDiv');
        ev.preventDefault();
    }); 

    login.toLogin.click(function(ev){
        showDiv('registDiv','loginDiv');
        ev.preventDefault();
    });



    //初始化弹出框
    //初始化提示
    login.loginTip = "";
    login.registTip = "";
    //初始化弹出框信息
    login.loginAccount.popover({
        html:true,
        trigger:'manual',
        content:function(){
            return login.loginTip;
        },
        placement:'right',
    });
    login.loginPw.popover({
        html:true,
        trigger:'manual',
        content:function(){
            return login.loginTip;
        },
        placement:'right',
    });
    login.registAccount.popover({
        html:true,
        trigger:'manual',
        content:function(){
            return login.registTip;
        },
        placement:'right',
    });
    login.registName.popover({
        html:true,
        trigger:'manual',
        content:function(){
            return login.registTip;
        },
        placement:'right',
    });
    login.registPw.popover({
        html:true,
        trigger:'manual',
        content:function(){
            return login.registTip;
        },
        placement:'right',
    });
    login.registPw2.popover({
        html:true,
        trigger:'manual',
        content:function(){
            return login.registTip;
        },
        placement:'right',
    });
    //当输入框被点击时隐藏提示
    login.loginAccount.focus(function(){
        login.loginAccount.popover('hide');
    });
    login.loginPw.focus(function(){
        login.loginPw.popover('hide');
    });
    login.registAccount.focus(function(){
        login.registAccount.popover('hide');
    });
    login.registName.focus(function(){
        login.registName.popover('hide');
    });
    login.registPw.focus(function(){
        login.registPw.popover('hide');
    });
    login.registPw2.focus(function(){
        login.registPw2.popover('hide');
    });

    //为登录按钮添加登录事件
    login.login.click(function(){
        // 获取输入框内的账户和密码值
        var account = login.loginAccount.val();
        var pw = login.loginPw.val();

        if( account == ""){ 
            login.loginTip = "请输入登录邮箱！";
            login.loginAccount.popover('show');
        }else if( !isEmail(account) ){
            login.loginTip = "登录邮箱格式错误！";
            login.loginAccount.popover('show');
        }else if( pw == "" ){
            login.loginTip = "请输入密码！";
            login.loginPw.popover('show');
        }else{
            $.ajax({
            type:'post',
            dataType:'json',
            url: '/DG/web/ajax/login',
            data:{'account': account,'pw': pw },
            success:function(result){
                if(result.code==-1){
                    login.loginTips.innerHTML = "账号或密码不正确！";
                    clearHTML('loginTips',5000);
                }else if(result.code==1){
                    location.href = '/DG/web/user/findteam';
                }
            },
            error:function(result){
                console.log("fail");
                console.log(result);
            },
            }); 

        }
    });

    //为注册按钮添加点击事件
    login.regist.click(function(){
        // 获取输入框内的账户、名字和密码值
        var account = login.registAccount.val();
        var name = login.registName.val();
        var pw = login.registPw.val();
        var pw2 = login.registPw2.val();

        if( account == ""){ 
            login.registTip = "请输入登录邮箱！";
            login.registAccount.popover('show');
        }else if( !isEmail(account) ){
            login.registTip = "登录邮箱格式错误！";
            login.registAccount.popover('show');
        }else if( name == "" ){
            login.registTip = "请输入名字！";
            login.registName.popover('show');
        }else if( pw == "" ){
            login.registTip = "请输入密码！";
            login.registPw.popover('show');
        }else if( pw2 == "" ){
            login.registTip = "请输入密码！";
            login.registPw2.popover('show');
        }else if( pw != pw2 ){
            login.registTip = "两次密码不一致！";
            login.registPw2.popover('show');
        }else{
            $.ajax({
            type:'post',
            dataType:'json',
            url: '/DG/web/ajax/regist',
            data:{'account': account,'name': name,'pw': pw },
            success:function(result){
                if(result.code==-1){
                    login.registTips.innerHTML = "注册失败！";
                    clearHTML('loginTips',5000);
                }else if(result.code==1){
                    location.href = '/DG/web/user/findteam';
                }
            },
            }); 
        }
    });
    

    //当输入框失去焦点时检查数据是否填写正确
    login.loginAccount.blur(function(){
        var account = login.loginAccount.val();
        if( account == "" ){
            login.loginTip = "请输入登录邮箱！";
            login.loginAccount.popover('show');
        }else if( !isEmail(account) ){
            login.loginTip = "登录邮箱格式错误！";
            login.loginAccount.popover('show');
        }else{
            $.ajax({
            type:'post',
            dataType:'json',
            url:'/DG/web/ajax/conformaccount',
            data:{ 'account':account },
            success:function(result){
                if(result.code==-2){
                    login.loginTip = "该账号不存在！";
                    login.loginAccount.popover('show');
                }else if(result.code==1){
                }
            },
            });
        }
    });

    login.registAccount.blur(function(){
        var account = login.registAccount.val();
        if( account == "" ){
            login.registTip = "请输入登录邮箱！";
            login.registAccount.popover('show');
        }else if( !isEmail(account) ){
            login.registTip = "登录邮箱格式错误！";
            login.registAccount.popover('show');
        }else{
            $.ajax({
            type:'post',
            dataType:'json',
            url:'/DG/web/ajax/conformaccount',
            data:{ 'account':account },
            success:function(result){
                if(result.code==-2){

                }else if(result.code==1){
                    login.registTip = "该账号已被注册！";
                    login.registAccount.popover('show');
                }
            },
            });
        }
    });

    
});

</script>