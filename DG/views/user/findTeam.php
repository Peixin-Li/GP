<?php
/**
 * @Author: lpx
 * @Date:   2016-03-02 14:33:46
 * @Last Modified time: 2016-03-16 14:37:04
 */
use yii\web\Session;
?>

<!-- css -->
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/base.css" />
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/common.css" />
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/page.css" />

<!-- js -->
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/base.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/page.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/util.js"></script>


<head>
    <meta charset="utf-8">
    <title>多格</title>
</head>

<body id="findTeam-body">

    <div id="findTeam-wrapper" class="h bc">
        <!-- 头部 -->
        <div id="findTeam-header" class="h85">
            <div class="container h85 bc">
                <div>
                    <div class="nav-main-title">
                        <i class="fa fa-users"></i>
                        <h3>团队</h3>
                    </div>    
                </div>
                <div class="navbar-sub">
                    <ul class="navbar-sub-modnav">
                        <li class="active">选择团队</li>
                        <li>搜索团队</li>
                        <li>搜索用户</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- 内容区 -->
        <div id="moduleContainer" class="container pr">

            <!-- 选择团队 -->
            <div id="findTeam-select" class="container pa">
                <!-- 已加入团队 -->
                <p class="findTeam-title mt30 mb20 f20">你已加入的团队</p>
                <div id="findTeam-content" class="findTeam-content row mb30">
                </div>
                <!-- 申请加入的团队 -->
                <p class="findTeam-title mb20 f20">申请加入的团队</p>
                <div id="applyTeam-content" class="row mb30">
                </div>
                <!-- 邀请加入的团队 -->
                <p class="findTeam-title mb20 f20">邀请加入的团队</p>
                <div id="inviteTeam-content" class="row mb30">
                </div>
            </div>

            <!-- 查找个人 -->
            <div id="findUser-find" class="container pa hidden">
                <div>
                    <p class="findUser-title mt30 mb20 f20">搜索用户</p>
                </div>
                <div id="findUser-search" class="h85 cb">
                    <select class="form-control w125 inline-block"> 
                        <option value="1">按账号查找</option> 
                        <option value="2">按标签查找</option> 
                    </select>
                    <input class="form-control inline-block w190" type="text" />
                    <button id="findUser-findUserBtn" class="btn btn-default inline-block mt-4">查找</button>
                </div>
                <div id="findUser-find-content" class="findUser-content row mb50 mt20">
                </div>
            </div>

            <!-- 查找团队 -->
            <div id="findTeam-find" class="container pa hidden">
                <div>
                    <p class="findTeam-title mt30 mb20 f20">搜索团队</p>
                </div>
                <div id="findTeam-search" class="h85 cb">
                    <select class="form-control w125 inline-block"> 
                        <option value="1">按队名查找</option> 
                        <option value="2">按标签查找</option> 
                    </select>
                    <input class="form-control inline-block w190" type="text" />
                    <button id="findTeam-findTeamBtn" class="btn btn-default inline-block mt-4">查找</button>
                    <a href="javascript:;" class="cb">
                        <button id="findTeam-createTeamBtn" class="btn btn-success fr mb20 mr30" data-toggle="modal" data-target="#findTeam-createTeamModel">创建新的团队</button>
                    </a> 
                </div>
                <div id="findTeam-find-content" class="findTeam-content row mb50 mt20">
                </div>
            </div>

        </div>
    </div>

    <!-- 模态框 -->
    <!-- <div class="modal fade" id="findTeam-createTeamModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">团队名</h4>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- 创建团队模态框 -->
    <div class="modal fade" id="findTeam-createTeamModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">新建团队</h4>
                </div>
                <div class="modal-body">
                    <div class="model-mainContent tc">
                        <p class="model-intro mb20">创建一个团队，邀请成员加入，通过项目一起高效协作。</p>
                        <input class="form form-control" placeholder="输入团队名称"></input> 
                        <input class="form form-control mt10" placeholder="输入团队介绍"></input> 
                        <select class="model-select form-control w mt10" placeholder="123"> 
                            <option value="" selected="true" class="hidden">选择团队标签</option> 
                            <option value="体育兴趣">体育兴趣</option> 
                            <option value="公共关系">公共关系</option> 
                            <option value="社会服务">社会服务</option> 
                            <option value="科技创新">科技创新</option> 
                            <option value="理论研究">理论研究</option> 
                            <option value="社会实践">社会实践</option> 
                            <option value="文学艺术">文学艺术</option> 
                            <option value="校级组织">校级组织</option> 
                            <option value="院级组织">院级组织</option> 
                            <option value="其他">其他</option> 
                        </select>
                        
                    </div>
                </div>
                <div class="modal-footer tc">
                    <button type="button" class="accept btn btn-success inlne-block">确定</button>
                    <button type="button" class="cancel btn btn-default inline-block" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 信息提示 -->
    <div class="modal fade" id="findTeam-tipsModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">系统信息</h4>
                </div>
                <div class="modal-body">
                    <div class="model-mainContent tc">
                        <p class="model-intro mb20"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 团队信息模态框 -->
    <div class="modal fade" id="findTeam-joinTeamModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">团队信息</h4>
                </div>
                <div class="modal-body">
                    <div class="model-mainContent tc">
                        <div id="joinTeamModel-leftContent" class="w100 h150 fl mr46 pt15">
                            <img id="joinTeamModel-teamImage" src="" class="w100 h100" alt="">
                            <p id="joinTeamModel-teamName" class="mt10">团队名</p>
                        </div>
                        <div id="joinTeamModel-rightContent" class="h150 fl tl">
                            <p>团队负责人：</p>
                            <p>团队人数：</p>
                            <p>团队标签：</p>
                            <p>团队简介：</p>
                            <p>联系方式：</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer tc">
                    <button type="button" class="accept btn btn-success inlne-block">申请加入</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 查看邀请加入的团队信息模态框 -->
    <div class="modal fade" id="findTeam-inviteTeamModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="inviteTeamModel-label">团队信息</h4>
                </div>
                <div class="modal-body">
                    <div class="model-mainContent tc">
                        <div id="inviteTeamModel-leftContent" class="w100 h150 fl mr46 pt15">
                            <img id="inviteTeamModel-teamImage" src="" class="w100 h100" alt="">
                            <p id="inviteTeamModel-teamName" class="mt10">团队名</p>
                        </div>
                        <div id="inviteTeamModel-rightContent" class="h150 fl tl">
                            <p>团队负责人：</p>
                            <p>团队人数：</p>
                            <p>团队标签：</p>
                            <p>团队简介：</p>
                            <p>联系方式：</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer tc">
                    <button type="button" class="accept btn btn-success inlne-block mr10">接受</button>
                    <button type="button" class="cancel btn btn-default inlne-block" data-dismiss="modal">拒绝</button>
                </div>
            </div>
        </div>
    </div>


    
</body>

<script>
    
$(document).ready(function(){


// -----------------------------------------准备-----------------------------------------------------------
    //定义命名空间
    var FT = {
        //初始化--------------------------------------------------------------------------------------
        init : function(){
            var _this =  this;

            // console.log(this.teamAllData);

            //显示（加载）数据
            // this.showTeam(FT.teamData,"findTeam-select");
            // this.showTeam(FT.teamAllData,"findTeam-find");//查找团队的数据在切换模块时才加载
            //获取所有可以选择的团队
            this.teamForSelect = $('.findTeam-userTeam');//加载后再获取
            //获取所有查找出来的团队
            this.teamForFind = $('.findTeam-findTeam');//加载后再获取
            //为导航添加点击事件
            this.nav.eq(0).on('click',function(){
                FT.nav.removeClass('active');
                $(this).addClass('active');
                FT.findTeamDiv.fadeOut();
                $("#findUser-find").fadeOut();
                FT.selectTeamDiv.fadeIn();
            });
            this.nav.eq(1).on('click',function(){
                FT.teamAllData = <?php echo $teamAll ?>;
                FT.findTeamContent.html("");
                FT.findText.val("");
                FT.showTeam(FT.teamAllData,"findTeam-find");
                FT.setTeamForFind();
                FT.nav.removeClass('active');
                $(this).addClass('active');
                FT.selectTeamDiv.fadeOut();
                $("#findUser-find").fadeOut();
                FT.findTeamDiv.fadeIn();
            });
            this.nav.eq(2).on('click',function(){
                FT.nav.removeClass('active');
                $(this).addClass('active');
                FT.findTeamDiv.fadeOut();
                FT.selectTeamDiv.fadeOut();
                $("#findUser-find").fadeIn();
            });
            //当选择一个团队时，进入主页
            // this.teamForSelect.on('click',function(e){
            //     var team_id = this.dataset.teamid;
            //     //向服务器请求团队协作主页数据，成功后跳转至团队协作主页
            //     $.ajax({
            //         type:'post',
            //         dataType:'json',
            //         url: '/DG/web/ajax/selectteam',
            //         data:{ 'team_id': team_id },
            //         success:function(result){
            //             if(result.code==-1){
            //                 alert("ajax/selectteam方法出错！");
            //             }else if(result.code==1){
            //                 location.href = '/DG/web/user/index';
            //             }
            //         },
            //         //若请求失败，则提示并且不跳转
            //         error:function(result){
            //             alert("ajax/selectteam请求失败！");
            //         },
            //         }); 
            // });
            //为查找按钮点击事件
            this.findBtn.on('click',function(){
                //获取输入框的值
                var text = FT.findText.val();
                //获取下拉列表的值（1为按队名查找，2为按标签查找）
                var type = FT.findType.val();
                //新建字符串用于保存在div中显示的内容
                var str = "";
                //如果输入框不为空则进行查找
                if( text == ""){
                    FT.findText.focus();
                }else if( type != "" ){
                    $.ajax({
                        type:'post',
                        // dataType:'json',
                        url:'/DG/web/ajax/findteam',
                        data:{ 'type':type , 'text':text },
                        success:function(data){
                            // 拿到新的数据后，先清空原来的内容
                            FT.findTeamContent.html("");
                            //将拿到的json数据转换为对象数组
                            FT.teamAllData = JSON.parse(data);
                            //如果查找结果部位空，则显示在界面里，如果为空，则给出提示
                            FT.showTeam(FT.teamAllData,"findTeam-find");
                            FT.setTeamForFind();
                        },
                    });
                }
            });
            //当用户按回车时，进行查找
            document.onkeydown = function(e){
                var theEvent = e || window.event;    
                var code = theEvent.keyCode || theEvent.which || theEvent.charCode;   
                if(code == 13 && FT.findTeamDiv.css('display') != 'none' ){
                    FT.findBtn.click();
                }
            };
            //点击新建团队按钮时，清除模态框里的信息
            this.createBtn.on('click',function(){
                FT.createTeamModel_maincontent.children('input').val("");
                FT.createTeamModel_maincontent.children('select').val("");
            });
            //当点击确定按钮时，新建团队
            this.createTeamModel_acceptBtn.on('click',function(){
                //获取元素
                var teamNameInput = FT.createTeamModel_maincontent.children('input').eq(0);
                var teamIntroInput = FT.createTeamModel_maincontent.children('input').eq(1);
                var teamAreaSelect = FT.createTeamModel_maincontent.children('select');
                //获取团队名、团队介绍、团队所属行业
                var teamName = teamNameInput.val();
                var teamIntro = teamIntroInput.val();
                var teamLabels = teamAreaSelect.val();
                console.log([teamName,teamIntro,teamLabels]);
                //判断获取到的信息是否满足要求
                if(teamName == ""){
                    teamNameInput.focus();
                }else if(teamIntro == ""){
                    teamIntroInput.focus();
                }else if(teamLabels == ""){

                }else{
                    $.ajax({
                        type:'post',
                        dataType:'json',
                        url:'/DG/web/ajax/createteam',
                        data:{ 'teamName':teamName , 'teamIntro':teamIntro , 'teamLabels':teamLabels },
                        success:function(result){
                            if(result.code == 1){
                                FT.createTeamModel.modal("hide");
                                FT.showTipsModal("新建团队成功!");
                            }
                        },
                    });
                }
            });
            //为搜索出来的团队添加点击事件
            FT.setTeamForFind();
             //点击申请加入按钮时，发送加入团队申请
            this.joinTeamModel_joinBtn.on('click',function(){
                console.log([_this.userId,_this.teamId,1]);
                $.ajax({
                    type:'post',
                    dataType:'json',
                    url:'/DG/web/ajax/jointeam',
                    data:{ 'user_id':FT.userId , 'team_id':FT.teamId ,'type': 1 },
                    success:function(result){
                        FT.joinTeamModel.modal("hide");
                        if(result.code == 1){
                            FT.showTipsModal("申请成功!");
                            FT.addApplyTeam();
                        }else if(result.code == -4){
                            FT.showTipsModal("你已申请加入该团队!");
                        }
                    },
                });
                
            });

            this.addUserTeam();
            this.addApplyTeam();
            this.addInviteTeam();
            this.getDefaultUsers();
            this.findUsers();

            // if(this.ifSearch==true){
            //     $('.navbar-sub-modnav li').eq(1).click();
            // }
        },

        //变量-----------------------------------------------------------------------------------------------------------
        //用户id
        userId : <?php $session = Yii::$app->session; $session->open(); echo $session['user_id'] ?>,
        ifSearch : '<?php $session = Yii::$app->session; $session->open(); echo $session['search']  ?>',
        //用户已加入的团队数据
        teamData : <?php echo $team ?>,
        //搜索后显示的团队数据
        teamAllData : <?php echo $teamAll ?>,
        //系统提示模态框
        tipsModal : $('#findTeam-tipsModel'),
        //上方导航按钮
        nav : $('#findTeam-header .navbar-sub-modnav li'),
        //选择团队模块
        selectTeamDiv : $('#findTeam-select'),
        //搜索团队模块
        findTeamDiv : $('#findTeam-find'),
        //搜索团队结果显示区域
        findTeamContent : $('#findTeam-find-content'),
        //查找栏下拉列表
        findType : $('#findTeam-search select'),
        //查找栏输入框
        findText : $('#findTeam-search input'),
        //查找栏查找按钮
        findBtn : $('#findTeam-search #findTeam-findTeamBtn'),
        //新建团队按钮
        createBtn : $('#findTeam-search #findTeam-createTeamBtn'),
        //新建团队模态框
        createTeamModel : $('#findTeam-createTeamModel'),
        //新建团队模态框内容区域
        createTeamModel_maincontent : $('#findTeam-createTeamModel .model-mainContent'),
        //新建团队模态框确定按钮
        createTeamModel_acceptBtn : $('#findTeam-createTeamModel .accept'), 
        //团队信息模态框
        joinTeamModel : $('#findTeam-joinTeamModel'),
        //团队信息模态框申请加入按钮
        joinTeamModel_joinBtn : $('#findTeam-joinTeamModel .accept'),

        // 方法-------------------------------------------------------------------------------------------------------------
        //显示系统提示框
        showTipsModal : function(text){
            this.tipsModal.find('.model-mainContent p').text(text);
            this.tipsModal.modal("show");
            setTimeout(function(){
                FT.tipsModal.modal("hide");
                FT.tipsModal.children('.model-mainContent').children('p').text("");
            },3000);
        },
        //显示用户已加入的团队
        showTeam : function(arr,divId){
            if(arr != ""){
                var str = "";
                if(divId == "findTeam-select"){
                    for(var n in arr){
                        str += "<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6 tc mb20'>\
                        <div class='findTeam-userTeam inline-block w120 h150 pt10' data-toggle='popover' data-index='"+parseInt(n)+"' data-teamId='"+arr[n]['id']+"'>\
                        <img class='teamLogo mb10' src='"+arr[n]['imagePath']+"' alt='' />\
                        <p class='teamName'>"+arr[n]['team_name']+"</p>\
                        </div>\
                        </div>";
                    };
                }else if(divId == "findTeam-find"){
                    for(var n in arr){
                        str += "<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6 tc mb20'>\
                        <div class='findTeam-findTeam inline-block w120 h150 pt10' data-toggle='popover' data-index='"+parseInt(n)+"' data-teamId='"+arr[n]['id']+"'>\
                        <img class='teamLogo mb10' src='"+arr[n]['imagePath']+"' alt='' />\
                        <p class='teamName'>"+arr[n]['team_name']+"</p>\
                        </div>\
                        </div>";
                    };
                }
                
                $('#'+divId+" .findTeam-content").append(str);
                $('.findTeam-userTeam').popover({
                    html:true,
                    trigger:'hover',
                    content:function(){
                        return "<div class='findTeam-teamInfo'>\
                        <p class='findTeam-teamInfo-teamName'>"+arr[this.dataset.index]['team_name']+"</p>\
                        <p>创建时间 ："+arr[this.dataset.index]['built_time']+" </p>\
                        <p>标签 ："+arr[this.dataset.index]['labels']+" </p>\
                        <p>团队介绍 ："+arr[this.dataset.index]['team_intro']+" </p>\
                        </div>";
                    },
                    placement:'auto right',
                });

                $('.findTeam-findTeam').popover({
                    html:true,
                    trigger:'hover',
                    content:function(){
                        return "<div class='findTeam-teamInfo'>\
                        <p class='findTeam-teamInfo-teamName'>"+arr[this.dataset.index]['team_name']+"</p>\
                        <p>创建时间 ："+arr[this.dataset.index]['built_time']+" </p>\
                        <p>标签 ："+arr[this.dataset.index]['labels']+" </p>\
                        <p>团队介绍 ："+arr[this.dataset.index]['team_intro']+" </p>\
                        </div>";
                    },
                    placement:'auto right',
                });
            }
        },
        //点击一个团队时，显示团队信息模态框
        setTeamForFind : function(){
            FT.teamForFind = $('.findTeam-findTeam');
            FT.teamForFind.on('click',function(){
                var index = this.dataset.index;
                console.log(FT.teamAllData[index]);
                var team_id = this.dataset.teamid;
                var teamName = FT.teamAllData[index]['team_name'];
                // var teamMemberNum = FT.teamAllData[index]['member_id'].split(",").length;
                $.ajax({
                    'type' : 'post',
                    'datatype' : 'json',
                    'url' : '/DG/web/ajax/getcountteam',
                    'data' : { 'team_id' : team_id },
                    success : function(data){
                        $('#joinTeamModel-rightContent').children('p').eq(1).text("团队人数："+parseInt(JSON.parse(data)));
                    },
                });
                var teamLeaderName = FT.teamAllData[index]['user_name'];
                var teamImage = FT.teamAllData[index]['imagePath'];
                var teamRemark = FT.teamAllData[index]['labels'];
                var teamIntro = FT.teamAllData[index]['team_intro'];
                var teamEmail = FT.teamAllData[index]['email'];
                FT.teamId = FT.teamAllData[index]['id'];
                $('#findTeam-joinTeamModel #joinTeamModel-teamName').text(teamName);
                $('#findTeam-joinTeamModel #joinTeamModel-teamImage').attr('src',teamImage);
                // $.when(getDataById("user",FT.teamAllData[index]['leader_id'])).done(function(data){
                //     $('#joinTeamModel-rightContent').children('p').eq(0).text("团队负责人："+data[0]['user_name']);
                // });
                $('#joinTeamModel-rightContent').children('p').eq(0).text("团队负责人："+teamLeaderName);
                $('#joinTeamModel-rightContent').children('p').eq(2).text("团队标签："+teamRemark);
                $('#joinTeamModel-rightContent').children('p').eq(3).text("团队简介："+teamIntro);
                if(teamEmail==null){
                    teamEmail = "未提供";
                };
                $('#joinTeamModel-rightContent').children('p').eq(4).text("联系方式："+teamEmail);
                // 判断用户是否在团队中
                $.ajax({
                    'type' : 'post',
                    'dataType' : 'json',
                    'url' : '/DG/web/ajax/user_in_team',
                    'data' : { 'team_id' : team_id },
                    success : function(result){
                        if(result.result=="-1"){
                            $("#findTeam-joinTeamModel .accept").text("你已加入");
                            $("#findTeam-joinTeamModel .accept").attr("disabled","disabled");
                        }else if(result.result=="1"){
                            $("#findTeam-joinTeamModel .accept").text("申请加入");
                            $("#findTeam-joinTeamModel .accept").removeAttr("disabled");
                        }else if(result.result=="-2"){
                            $("#findTeam-joinTeamModel .accept").text("你已申请");
                            $("#findTeam-joinTeamModel .accept").attr("disabled","disabled");
                        }
                    },
                });

                $('#findTeam-joinTeamModel').modal("show");
            });
        },

        //填充申请加入的团队
        addApplyTeam : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_apply_team',
                success : function(data){
                    var applyTeamStr = "";
                    for(var n in data){
                        applyTeamStr += "<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6 tc mb20'>\
                        <div class='findTeam-applyTeam inline-block w120 h150 pt10' data-toggle='popover' data-index='"+parseInt(n)+"' data-teamId='"+data[n]['id']+"'>\
                        <img class='teamLogo mb10' src='"+data[n]['imagePath']+"' alt='' />\
                        <p class='teamName'>"+data[n]['team_name']+"</p>\
                        </div>\
                        </div>";
                    };
                    $('#applyTeam-content').html("").append(applyTeamStr);
                    $('.findTeam-applyTeam').popover({
                        html:true,
                        trigger:'hover',
                        content:function(){
                            return "<div class='findTeam-teamInfo'>\
                            <p class='findTeam-teamInfo-teamName'>"+data[this.dataset.index]['team_name']+"</p>\
                            <p>创建时间 ："+data[this.dataset.index]['built_time']+" </p>\
                            <p>标签 ："+data[this.dataset.index]['labels']+" </p>\
                            <p>团队介绍 ："+data[this.dataset.index]['team_intro']+" </p>\
                            </div>";
                        },
                        placement:'auto right',
                    });
                },
            });
        }, 
        // 填充邀请用户加入的团队
        addInviteTeam : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_invite_team',
                success : function(data){
                    // console.log(data);
                    var inviteTeamStr = "";
                    for(var n in data){
                        inviteTeamStr += "<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6 tc mb20'>\
                        <div class='findTeam-inviteTeam inline-block w120 h150 pt10' data-toggle='popover' data-index='"+parseInt(n)+"' data-teamId='"+data[n]['id']+"'>\
                        <img class='teamLogo mb10' src='"+data[n]['imagePath']+"' alt='' />\
                        <p class='teamName'>"+data[n]['team_name']+"</p>\
                        </div>\
                        </div>";
                    };
                    $('#inviteTeam-content').html("").append(inviteTeamStr);
                    $('.findTeam-inviteTeam').popover({
                        html:true,
                        trigger:'hover',
                        content:function(){
                            return "<div class='findTeam-teamInfo'>\
                            <p class='findTeam-teamInfo-teamName'>"+data[this.dataset.index]['team_name']+"</p>\
                            <p>创建时间 ："+data[this.dataset.index]['built_time']+" </p>\
                            <p>标签 ："+data[this.dataset.index]['labels']+" </p>\
                            <p>团队介绍 ："+data[this.dataset.index]['team_intro']+" </p>\
                            </div>";
                        },
                        placement:'auto right',
                    });
                    FT.addClickToInvite();
                },
            });
        },
        //点击一个邀请团队时，显示团队信息模态框
        addClickToInvite : function(){
            $('.findTeam-inviteTeam').on('click',function(){
                var index = this.dataset.index;
                var team_id = this.dataset.teamid;
                $.ajax({
                    'type' : 'post',
                    'dataType' : 'json',
                    'url' : '/DG/web/ajax/get_team_data',
                    'data' : { 'team_id' : team_id },
                    success : function(data){
                        var teamName = data[0]['team_name'];
                        var teamImage = data[0]['imagePath'];
                        var teamRemark = data[0]['labels'];
                        var teamIntro = data[0]['team_intro'];
                        var teamEmail = data[0]['email'];
                        var teamId = data[0]['id'];
                        $('#findTeam-inviteTeamModel #inviteTeamModel-teamName').text(teamName);
                        $('#findTeam-inviteTeamModel #inviteTeamModel-teamImage').attr('src',teamImage);
                        $('#inviteTeamModel-rightContent').children('p').eq(0).text("团队负责人："+data[0]['user_name']);
                        $('#inviteTeamModel-rightContent').children('p').eq(2).text("团队标签："+teamRemark);
                        $('#inviteTeamModel-rightContent').children('p').eq(3).text("团队简介："+teamIntro);
                        $('#inviteTeamModel-rightContent').children('p').eq(4).text("联系方式："+teamEmail);
                    },
                });
                $.ajax({
                    'type' : 'post',
                    'dataType' : 'json',
                    'url' : '/DG/web/ajax/getcountteam',
                    'data' : { 'team_id' : team_id },
                    success : function(data){
                        $('#inviteTeamModel-rightContent').children('p').eq(1).text("团队人数："+parseInt(data));
                        $('#findTeam-inviteTeamModel .accept').on('click',function(){
                            $.ajax({
                                type : 'post',
                                // dataType : 'json',
                                url : '/DG/web/ajax/join_team',
                                data : { 'team_id':team_id, 'type':2 },
                                success : function(result){
                                    // alert("success"+result);
                                    $('#findTeam-inviteTeamModel').modal("hide");
                                    FT.showTipsModal("加入团队成功");
                                    FT.addInviteTeam();
                                    FT.addUserTeam();
                                },
                                error : function(result){
                                    alert("error"+result);
                                }
                            });
                        });
                    },
                });
                $('#findTeam-inviteTeamModel').modal("show");
            });
        },
        // 填充用户已加入的团队
        addUserTeam : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_user_team',
                success : function(data){
                    // console.log(data);
                    var userTeamStr = "";
                    for(var n in data){
                        userTeamStr += "<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6 tc mb20'>\
                        <div class='findTeam-userTeam inline-block w120 h150 pt10' data-toggle='popover' data-index='"+parseInt(n)+"' data-teamId='"+data[n]['id']+"'>\
                        <img class='teamLogo mb10' src='"+data[n]['imagePath']+"' alt='' />\
                        <p class='teamName'>"+data[n]['team_name']+"</p>\
                        </div>\
                        </div>";
                    };
                    $('#findTeam-content').html("").append(userTeamStr);

                    $('.findTeam-userTeam').on('click',function(e){
                        var team_id = this.dataset.teamid;
                        //向服务器请求团队协作主页数据，成功后跳转至团队协作主页
                        $.ajax({
                            type:'post',
                            dataType:'json',
                            url: '/DG/web/ajax/selectteam',
                            data:{ 'team_id': team_id },
                            success:function(result){
                                if(result.code==-1){
                                    alert("ajax/selectteam方法出错！");
                                }else if(result.code==1){
                                    location.href = '/DG/web/user/index';
                                }
                            },
                            //若请求失败，则提示并且不跳转
                            error:function(result){
                                alert("ajax/selectteam请求失败！");
                            },
                            }); 
                    });

                    $('.findTeam-userTeam').popover({
                        html:true,
                        trigger:'hover',
                        content:function(){
                            return "<div class='findTeam-teamInfo'>\
                            <p class='findTeam-teamInfo-teamName'>"+data[this.dataset.index]['team_name']+"</p>\
                            <p>创建时间 ："+data[this.dataset.index]['built_time']+" </p>\
                            <p>标签 ："+data[this.dataset.index]['labels']+" </p>\
                            <p>团队介绍 ："+data[this.dataset.index]['team_intro']+" </p>\
                            </div>";
                        },
                        placement:'auto right',
                    });
                },
            });
        },
        // 获取并填充搜索用户界面的默认用户
        getDefaultUsers : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_default_users',
                success : function(data){
                    var str = "";
                    for(var n in data){
                        str += "<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6 tc mb20'>\
                        <div class='findUser-user inline-block w120 h150 pt10' data-toggle='popover' data-index='"+parseInt(n)+"' data-teamId='"+data[n]['id']+"'>\
                        <img class='teamLogo mb10' src='"+data[n]['imagePath']+"' alt='' />\
                        <p class='teamName'>"+data[n]['user_name']+"</p>\
                        </div>\
                        </div>";
                    };
                    $('#findUser-find-content').html("").append(str);
                },
            });
        },
        // 点击查找按钮，显示符合条件的用户
        findUsers : function(){
            $('#findUser-findUserBtn').on('click',function(){
                if($('#findUser-search input').val()==""){
                    $('#findUser-search input').focus();
                }else{
                    var text = $('#findUser-search input').val();
                    var type = $('#findUser-search select').val();
                    $.ajax({
                        type : 'post',
                        dataType : 'json',
                        url : '/DG/web/ajax/find_users',
                        data : { 'text':text , 'type':type },
                        success : function(data){
                            var str = "";
                            for(var n in data){
                                str += "<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6 tc mb20'>\
                                <div class='findUser-user inline-block w120 h150 pt10' data-toggle='popover' data-index='"+parseInt(n)+"' data-teamId='"+data[n]['id']+"'>\
                                <img class='teamLogo mb10' src='"+data[n]['imagePath']+"' alt='' />\
                                <p class='teamName'>"+data[n]['user_name']+"</p>\
                                </div>\
                                </div>";
                            };
                            $('#findUser-find-content').html("").append(str); 
                        },
                    
                    });
                }
            });
        },
    };
    //执行初始化
    FT.init();
    // $.ajax({
    //     type : 'post',
    //     dataType : 'json',
    //     url : '/DG/web/ajax/',
    //     data : {},
    //     success : function(){
            
    //     },
    // });
});

</script>

