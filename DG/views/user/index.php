<?php
/**
 * @Author: lpx
 * @Date:   2016-03-12 16:50:15
 * @Last Modified time: 2016-03-12 16:50:31
 */
?>

<!DOCTYPE html>
<html lang="en" class="h">
<head>
    <meta charset="UTF-8" />
    <title>多格</title>
    <!-- css -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/fullcalendar.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/base.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/common.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/page.css" />
    <!-- js -->
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/fullcalendar.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/Sortable.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/base.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/common.js"></script>
    <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/js/page.js"></script>
</head>

<body id="main-body">
<!-- 信息提示 -->
<div class="modal fade" id="tipsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
<!-- 创建任务模态框 -->
<div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新建任务</h4>
            </div>
            <div class="modal-body">
                <input id="inputTaskName" class="form form-control" placeholder="请输入任务名称"></input>
                <input id="inputTaskIntro" class="form form-control mt10" placeholder="请输入任务描述"></input>
                <select id="projectForSelect" class="model-select form-control w mt10"> 
                    <option value="" selected="true" class="hidden">选择所属项目</option> 
                </select>
                <select id="listForSelect" class="model-select form-control w mt10"> 
                    <option value="" selected="true" class="hidden">选择任务列表</option> 
                </select>
                <p class="mt10">添加任务成员：</p> 
                <div id="selectTaskMember" class="memberSelecter">
                    <!-- <img src="<?#php echo $user['imagePath'] ?>" alt=""> -->
                    <a tabindex="0" role="button" data-toggle="popover"><i class="fa fa-plus-circle"></i></a>
                </div>   
            </div>
            <div class="modal-footer tc">
                <button type="button" class="accept btn btn-success inlne-block">确定</button>
                <button type="button" class="cancel btn btn-default inline-block" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<!-- 创建项目模态框 -->
<div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">新建项目</h4>
            </div>
            <div class="modal-body">
                <input id="createProject-name" class="form form-control" placeholder="请输入项目名称"></input>
                <input id="createProject-intro" class="form form-control mt10" placeholder="请输入项目描述"></input>
                <select id="createProject-visible" class="model-select form-control w mt10"> 
                    <option value="" selected="true" class="hidden">对外是否可见</option> 
                    <option value="Y">是</option> 
                    <option value="N">否</option> 
                </select>  
            </div>
            <div class="modal-footer tc">
                <button type="button" class="accept btn btn-success inlne-block">确定</button>
                <button type="button" class="cancel btn btn-default inline-block" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<!-- 邀请成员模态框 -->
<div class="modal fade" id="inviteMemberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">邀请成员</h4>
            </div>
            <div class="modal-body">
                <input id="inviteMember-account" class="form form-control" placeholder="请输入成员账号"></input>
            </div>
            <div class="modal-footer tc">
                <button type="button" class="accept btn btn-success inlne-block">确定</button>
                <button type="button" class="cancel btn btn-default inline-block" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>


<!-- 主页 -->
<div id="main" class="pa t0 l0 w h">
    <!-- 遮罩 -->
    <div class="mask w h pa hidden"></div>
	<!-- 主页左部 -->
    <div id="main-leftPanel" class="h w60">
    	<!-- 左边菜单 -->
        <div class="main-leftMenu w60 h">
            <!-- 一级菜单 -->
            <div class="leftMenu-MenuA w60 h">
                <!-- 头像 -->
                <div class="leftMenu-MenuA-avatar tc w60 h56 pt16 pb8">
                    <a href="javascript:;">
                        <img class="w40 h40" src="<?php echo $user['imagePath'] ?>" alt="" />
                    </a>
                </div>
                <!-- 导航 -->
                <div class="leftMenu-MenuA-nav w60 pa">
                	<!-- 个人相关导航 -->
                    <ul class="leftMenu-MenuA-nav-personal tc">
                        <li id="dashboardBtn" class="leftMenu-MenuA-nav-btn w60 h48 active" data-hash="dashboard"><i class="fa fa-dashboard"></i></li><!-- 工作台 -->
                        <li class="leftMenu-MenuA-nav-btn w60 h48"><i class="fa fa-commenting"></i></li><!-- 消息 -->
                        <li id="searchBtn" class="leftMenu-MenuA-nav-btn w60 h48"><i class="fa fa-search"></i></li><!-- 搜索 -->
                    </ul>
                    <!-- 团队相关导航 -->
                    <ul class="leftMenu-MenuA-nav-team pt21">
                        <li id="teamBtn" class="leftMenu-MenuA-nav-btn w60 h48"><i class="fa fa-users"></i></li><!-- 团队 -->
                        <li id="projectBtn" class="leftMenu-MenuA-nav-btn w60 h48"><i class="fa fa-folder"></i></li><!-- 项目 -->
                    </ul>
                </div>
                <!-- 快捷操作 -->
                <div id="fastCreateBtn" class="leftMenu-MenuA-footer w60 h60 tc">
                    <i class="leftMenu-MenuA-nav-btn fa fa-plus-circle"></i>
                </div>
            </div>
        </div>

        <!-- 二级菜单 -->
        <!-- 用户信息 -->
        <div id="MenuB-userInfo" class="leftMenu-MenuB w380 h pa">
            <div class="leftMenu-MenuB-head w380 h89 cb">
                <div class="leftMenu-MenuB-avatar w90 h89 fl">
                    <a href="javascript:;" title="">
                        <img class="w56 h56" src="<?php echo $user['imagePath'] ?>" alt="" />
                    </a>
                </div>
                <div class="leftMenu-MenuB-info w180 h89 fl">
                    <div class="leftMenu-MenuB-userName h22 mt20">
                        <p><?php echo $user['user_name'] ?></p>
                    </div>
                    <div class="leftMenu-MenuB-account h20 mt7">
                        <p data-userid='<?php echo $user['id'] ?>'><?php echo $user['account'] ?></p>
                    </div>
                </div>
                <div id="leftMenu-MenuB-operate">
                    <ul>
                        <li id="logout-team">退出团队<i class="fa fa-mail-reply"></i></li>
                        <li id="logout-account">退出账号<i class="fa fa-mail-reply-all"></i></li>
                    </ul>
                </div>
            </div>
            <div id="leftMenu-MenuB-body">
                <div id="team-labels">
                    <p>团队标签</p>
                </div>
                <div id="addTeamLabels" class="mt40 mb40">
                    <input class="form-control"></input><button>添加标签</button>
                </div>
                <div id="user-labels">
                    <p>个人标签</p>
                </div>
                <div id="addUserLabels" class="mt40">
                    <input class="form-control"></input><button>添加标签</button>
                </div>
            </div>
        </div>
        <!-- 项目列表 -->
        <div id="MenuB-projectList" class="leftMenu-MenuB w380 h pa">
            <div id="MenuB-projectList-header" class="leftMenu-MenuB-head w380 h89 cb">
                <p>项目</p>
            </div>
            <div id="MenuB-projectList-body">
                <ul>
                    <li class="project"><i class="fa fa-folder"></i>毕业设计</li>
                    <li><i class="fa fa-folder"></i>多格网</li>
                    <li><i class="fa fa-folder"></i>多格网123</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- 主页右部 -->
    <div id="main-rightPanel" class="h">

        <!-- 快速创建 -->
        <div id="fastCreateBox" class="hidden">
            <ul>
                <li id="fastCreateBox-tasks">
                    <i class="fa fa-tasks"></i>
                    <p class="inline-block">任务</p>
                </li>
                <li id="fastCreateBox-calendar">
                    <i class="fa fa-calendar"></i>
                    <p class="inline-block">日程</p>
                </li>
                <li id="fastCreateBox-project">
                    <i class="fa fa-folder"></i>
                    <p class="inline-block">项目</p>
                </li>
            </ul>
        </div>
        <!-- 任务详情 -->
        <div id="taskDetail">
            <div id="taskDetail-top">
                <ul>
                    <li><i class="fa fa-clock-o"></i><p>日期</p></li>
                    <li><i class="fa fa-tags"></i><p>标签</p></li>
                    <li><i class="fa fa-list-ul"></i><p>检查项</p></li>
                    <li id="deleteTaskBtn"><i class="fa fa-trash"></i><p>删除任务</p></li>
                </ul>
            </div>
            <div id="taskDetail-content">
                <p id="taskDetail-projectName">项目名</p>
                <h2 id="taskDetail-name">任务名</h2>
                <input id="taskDetail-name-input" class="hidden form-control mb10" placeholder="请输入任务名称"></input><!-- 任务名修改 -->
                <p id="taskDetail-describe">这是一段项目描述</p>
                <textarea id="taskDetail-intro-input" class="hidden form-control mb10" placeholder="请输入任务描述"></textarea><!-- 任务描述修改 -->
                <p class="taskDetail-text">分配任务给：</p>
                <div id="taskDetail-avatarContainer">
                    <img class="taskDetail-avatar" src="<?php echo $user['imagePath'] ?>" alt="">
                    <i id="taskDetail-addAvatar" class="fa fa-plus-circle"></i>
                </div>
                <div id="changeTaskMember" class="hidden memberSelecter">
                    <!-- <img src="<?#php echo $user['imagePath'] ?>" alt=""> -->
                    <a tabindex="0" role="button" data-toggle="popover"><i class="fa fa-plus-circle"></i></a>
                </div> 
                <div id="taskDetail-conformDiv" class="tc">
                    <button type="" class="accept hidden btn btn-success">保存</button>
                    <button type="" class="cancel hidden btn btn-default">取消</button>
                </div>
                <div id="taskDetail-createTime">
                    <!-- <p>lpx  02月01日 17:40，创建了任务</p> -->
                </div>
            </div>        
        </div>

    	<!-- 工作台界面************************************************************************************************************** -->
    	<div id="dashboard" class="main-content" data-index="1">

    		<!-- 导航栏 -->
    		<div class="navbar">
			    <!-- 模块名称 -->
			    <div class="navbar-main">
			        <div class="nav-main-title">
			            <i class="fa fa-dashboard"></i>
			            <h3>工作台</h3>
			        </div>    
			    </div>
			    <!-- 模块导航 -->
			    <div class="navbar-sub">
			        <ul class="navbar-sub-modnav">
			            <li class="active" data-modName="task">我的任务</li>
			            <li class=" showCalendar" data-modName="calendar">我的日程</li>
			            <!-- <li data-modName="news">最新动态</li> -->
			        </ul>
			    </div>
			</div>
			<!-- 内容 -->
			<div class="content">

			    <div class="content-wrap">
                         
			        <!-- 我的任务 -->
			        <div id="myTask" class="module m1" data-hash="task">
                        
			            <!-- 任务列表1 -->
			            <div class="taskList">
			                <!-- 标题区域 -->
			                <div class="taskList-title">
			                    <div class="taskList-name"><h2>收件箱</h2></div>
			                    <div class="taskList-num"><h2><?#php echo count($task) ?></h2></div>
			                </div>
			                <!-- 任务区域 -->
			                <div class="taskList-task">
                                <?#php foreach($task as $value): ?>
                                <!-- <div class="task">
                                    <div class="task-main">
                                        <a href="" class="task-check"><i class="fa fa-square-o"></i></a>
                                        <p class="task-name"><?#php echo $value['task_name'] ?></p>                                                
                                    </div>                                        
                                </div> -->
                                <?#php endforeach ?>
			                    <!-- <div class="task">
			                        <div class="task-main">
			                            <a href="" class="task-check"><i class="fa fa-square-o"></i></a>
			                            <p class="task-name">制作主界面</p>
			                        </div>
			                    </div>
			                    <div class="task"></div> -->
			                </div>
			            </div>
			            <div class="taskList">
			                <!-- 标题区域 -->
			                <div class="taskList-title">
			                    <div class="taskList-name"><h2>今天要做</h2></div>
			                    <div class="taskList-num"><h2>2</h2></div>
			                </div>
			                <!-- 任务区域 -->
			                <div class="taskList-task">
			                    <!-- <div class="task">
			                        <div class="task-main">
			                            <a href="" class="task-check"><i class="fa fa-square-o"></i></a>
			                            <p class="task-name">制作主界面</p>
			                        </div>
			                    </div>
			                    <div class="task"></div> -->
			                </div>
			            </div>
			            <div class="taskList">
			                <!-- 标题区域 -->
			                <div class="taskList-title">
			                    <div class="taskList-name"><h2>下一步要做</h2></div>
			                    <div class="taskList-num"><h2>2</h2></div>
			                </div>
			                <!-- 任务区域 -->
			                <div class="taskList-task">
			                    
			                </div>
			            </div>
			            <div class="taskList">
			                <!-- 标题区域 -->
			                <div class="taskList-title">
			                    <div class="taskList-name"><h2>以后要做</h2></div>
			                    <div class="taskList-num"><h2>2</h2></div>
			                </div>
			                <!-- 任务区域 -->
			                <div class="taskList-task">
			                
			                </div>
			            </div> 
			        </div>
			        <!-- 我的日程 -->
			        <div id="myCalendar" class="hidden module m2" data-hash="calendar">
                        <div id="calendar1" class="calendar"></div>   
                    </div>
			        <!-- 最新动态 -->
			        <div id="latestNews" class="hidden module m3" data-bg="1" data-hash="news" >
                        <div class="layout-left">
                            <div class="container-fluid">
                                <div>  
                                    <ul>
                                        <li class="row hiddenRow"></li>
                                        <li class="row infoRow li-first cb h100">
                                            <div class="infoRow-left h100 inline-block h100 lh100">
                                                <img class="avatar" src="<?php echo $user['imagePath'] ?>" alt="">
                                                <p class="inline-block">李培鑫</p>
                                            </div>
                                            <div class="infoRow-middle h100 inline-block lh100">
                                                <h4>消息类型</h4>
                                                <div class="h16 mb8">
                                                    <i class="fa fa-bold"></i>&nbsp;&nbsp;<p class="inline-block">消息详情</p>
                                                    <!-- <p class="inline-block">消息详情</p> -->
                                                </div>
                                                <p class="infoRow-projectName">项目名</p>
                                            </div>
                                            <div class="infoRow-right h100 inline-block lh100">
                                                <p>今天16:35</p>
                                            </div>        
                                        </li>
                                        <li class="row infoRow li-first cb h100">
                                            <div class="infoRow-left h100 inline-block h100 lh100">
                                                <img class="avatar" src="<?php echo $user['imagePath'] ?>" alt="">
                                                <p class="inline-block">李培鑫</p>
                                            </div>
                                            <div class="infoRow-middle h100 inline-block lh100">
                                                <h4>消息类型</h4>
                                                <div class="h16 mb8">
                                                    <i class="fa fa-bold"></i>&nbsp;&nbsp;<p class="inline-block">消息详情</p>
                                                    <!-- <p class="inline-block">消息详情</p> -->
                                                </div>
                                                <p class="infoRow-projectName">项目名</p>
                                            </div>
                                            <div class="infoRow-right h100 inline-block lh100">
                                                <p>今天16:35</p>
                                            </div>        
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="layout-right">
                            <div class="layout-right-menu">
                                <button class="btn btn-success">刷新动态</button>
                            </div>
                        </div>        
                    </div>
			    </div>
			</div>
    	</div>

    	<!-- 消息界面************************************************************************************************************** -->
    	<div id="message" class="main-content hidden" data-index="2">
   			<!-- 导航栏 -->
            <div class="navbar">
                <!-- 模块名称 -->
                <div class="navbar-main">
                    <div class="nav-main-title">
                        <i class="fa fa-commenting"></i>
                        <h3>消息中心</h3>
                    </div>    
                </div>
                <!-- 模块导航 -->
                <div class="navbar-sub">
                    <ul class="navbar-sub-modnav">
                        <li class="active" data-modName="unread">未读</li>
                        <li data-modName="wait">待处理</li>
                        <li data-modName="read">已读</li>
                    </ul>
                </div>
            </div>
            <!-- 内容 -->
            <div class="content">
                <div class="content-wrap" style="background-color: #ffffff;">
                    <!-- 未读 -->
                    <div id="message-unread" class="module m1" data-bg="1" data-hash="unread">
                        <div class="layout-left">
                            <div class="container-fluid">
                                <div>  
                                    <ul>
                                        <li class="row hiddenRow"></li>
                                        <li class="row infoRow li-first cb">
                                            <div class="infoRow-left h80 lh80 inline-block">
                                                <i class="infoRow-envelope fa fa-envelope mr20"></i>
                                                <i class="infoRow-flag fa fa-flag-o"></i>
                                                <img class="avatar" src="<?php echo $user['imagePath'] ?>" alt="">
                                                <p class="inline-block">李培鑫</p>
                                            </div>
                                            <div class="infoRow-middle h80 inline-block">
                                                <h4>消息类型</h4>
                                                <div class="h16 mb8">
                                                    <i class="fa fa-bold"></i>&nbsp;&nbsp;<p class="inline-block">消息详情</p>
                                                </div>
                                            </div>
                                            <div class="infoRow-right h80 inline-block lh80">
                                                <p>今天16:35</p>
                                            </div>        
                                        </li>
                                        <li class="row infoRow li-first cb">
                                            <div class="infoRow-left h80 lh80 inline-block">
                                                <i class="infoRow-envelope fa fa-envelope mr20"></i>
                                                <i class="infoRow-flag fa fa-flag-o"></i>
                                                <img class="avatar" src="<?php echo $user['imagePath'] ?>" alt="">
                                                <p class="inline-block">李培鑫</p>
                                            </div>
                                            <div class="infoRow-middle h80 inline-block">
                                                <h4>消息类型</h4>
                                                <div class="h16 mb8">
                                                    <i class="fa fa-bold"></i>&nbsp;&nbsp;<p class="inline-block">消息详情</p>
                                                </div>
                                            </div>
                                            <div class="infoRow-right h80 inline-block lh80">
                                                <p>今天16:35</p>
                                            </div>        
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="layout-right">
                            <div class="layout-right-menu">
                                <p class="pb15">按类型筛选：</p>
                                <ul>
                                    <li class="active">全部</li>
                                    <li>分配给我</li>
                                </ul>
                            </div>
                        </div>        
                    </div>
                    <!-- 待处理 -->
                    <div id="message-wait" class="hidden module m2" data-bg="1" data-hash="wait">
                        <div class="layout-left">
                            <div class="container-fluid">
                                <div>  
                                    <ul>
                                        <li class="row hiddenRow"></li>
                                        <li class="row infoRow li-first cb">
                                            <div class="infoRow-left h80 lh80 inline-block">
                                                <i class="infoRow-flag fa fa-flag"></i>
                                                <img class="avatar" src="<?php echo $user['imagePath'] ?>" alt="">
                                                <p class="inline-block">李培鑫</p>
                                            </div>
                                            <div class="infoRow-middle h80 inline-block">
                                                <h4>消息类型</h4>
                                                <div class="h16 mb8">
                                                    <i class="fa fa-bold"></i>&nbsp;&nbsp;<p class="inline-block">消息详情</p>
                                                </div>
                                            </div>
                                            <div class="infoRow-right h80 inline-block lh80">
                                                <p>今天16:35</p>
                                            </div>        
                                        </li>
                                        <li class="row infoRow li-first cb">
                                            <div class="infoRow-left h80 lh80 inline-block">
                                                <i class="infoRow-flag fa fa-flag"></i>
                                                <img class="avatar" src="<?php echo $user['imagePath'] ?>" alt="">
                                                <p class="inline-block">李培鑫</p>
                                            </div>
                                            <div class="infoRow-middle h80 inline-block">
                                                <h4>消息类型</h4>
                                                <div class="h16 mb8">
                                                    <i class="fa fa-bold"></i>&nbsp;&nbsp;<p class="inline-block">消息详情</p>
                                                </div>
                                            </div>
                                            <div class="infoRow-right h80 inline-block lh80">
                                                <p>今天16:35</p>
                                            </div>        
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="layout-right">
                            <div class="layout-right-menu">
                                <p class="pb15">按类型筛选：</p>
                                <ul>
                                    <li class="active">全部</li>
                                    <li>分配给我</li>
                                </ul>
                            </div>
                        </div>       
                    </div>
                    <!-- 已读 -->
                    <div id="message-read" class="hidden module m3" data-bg="1" data-hash="read">
                        <div class="layout-left">
                            <div class="container-fluid">
                                <div>  
                                    <ul>
                                        <li class="row hiddenRow"></li>
                                        <li class="row infoRow li-first cb">
                                            <div class="infoRow-left h80 lh80 inline-block">
                                                <i class="infoRow-flag fa fa-flag-o"></i>
                                                <img class="avatar" src="<?php echo $user['imagePath'] ?>" alt="">
                                                <p class="inline-block">李培鑫</p>
                                            </div>
                                            <div class="infoRow-middle h80 inline-block">
                                                <h4>消息类型</h4>
                                                <div class="h16 mb8">
                                                    <i class="fa fa-bold"></i>&nbsp;&nbsp;<p class="inline-block">消息详情</p>
                                                </div>
                                            </div>
                                            <div class="infoRow-right h80 inline-block lh80">
                                                <p>今天16:35</p>
                                            </div>        
                                        </li>
                                        <li class="row infoRow li-first cb">
                                            <div class="infoRow-left h80 lh80 inline-block">
                                                <i class="infoRow-flag fa fa-flag-o"></i>
                                                <img class="avatar" src="<?php echo $user['imagePath'] ?>" alt="">
                                                <p class="inline-block">李培鑫</p>
                                            </div>
                                            <div class="infoRow-middle h80 inline-block">
                                                <h4>消息类型</h4>
                                                <div class="h16 mb8">
                                                    <i class="fa fa-bold"></i>&nbsp;&nbsp;<p class="inline-block">消息详情</p>
                                                </div>
                                            </div>
                                            <div class="infoRow-right h80 inline-block lh80">
                                                <p>今天16:35</p>
                                            </div>        
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="layout-right">
                            <div class="layout-right-menu">
                                <p class="pb15">按类型筛选：</p>
                                <ul>
                                    <li class="active">全部</li>
                                    <li>分配给我</li>
                                </ul>
                            </div>
                        </div>        
                    </div>

                </div>
            </div>
    	</div>	

    	<!-- 搜索界面************************************************************************************************************** -->
    	<div id="search" class="main-content hidden" data-index="3">
    		<!-- 导航栏 -->
            <div class="navbar">
                <!-- 模块名称 -->
                <div class="navbar-main">
                    <div class="nav-main-title">
                        <i class="fa fa-search"></i>
                        <h3>搜索</h3>
                    </div>    
                </div>
                <!-- 模块导航 -->
                <div class="navbar-sub">
                    <ul class="navbar-sub-modnav">
                        <li class="active" data-modName="person">个人</li>
                        <li data-modName="team">团队</li>
                    </ul>
                </div>
            </div>
            <!-- 内容 -->
            <div class="content">
                <div class="content-wrap">

                    <!-- 个人 -->
                    <div class="module m1" data-hash="person">
                        <p>search1</p>
                    </div>
                    <!-- 团队 -->
                    <div class="hidden module m2" data-hash="team">
                        <p>search2</p>
                    </div>

                </div>
            </div>
    	</div>

    	<!-- 团队界面************************************************************************************************************** -->
    	<div id="team" class="main-content hidden" data-index="4">
    		<!-- 导航栏 -->
            <div class="navbar">
                <!-- 模块名称 -->
                <div class="navbar-main">
                    <div class="nav-main-title">
                        <i class="fa fa-users"></i>
                        <h3></h3>
                    </div>    
                </div>
                <!-- 模块导航 -->
                <div class="navbar-sub">
                    <ul class="navbar-sub-modnav">
                        <!-- <li class="active" data-modName="index">主页</li> -->
                        <li id="team-member-btn" data-modName="member">成员</li>
                        <li id="team-project-btn" data-modName="project">项目</li>
                        <!-- <li data-modName="task">任务</li> -->
                        <li class=" showCalendar" data-modName="calendar">日历</li>
                    </ul>
                </div>
            </div>
            <!-- 内容 -->
            <div id="team-content" class="content">
                <div class="content-wrap">
                    <!-- 主页 -->
                    <!-- <div class="module m1" data-hash="index">
                        team1
                    </div> -->
                    <!-- 成员 -->
                    <div id="team-member" class="hidden module m1" data-bg="1" data-hash="member">
                        <!-- <?#php foreach ($users_of_team as $value): ?>  
                            <p><?#php echo $value['user_name'] ?></p>
                        <?#php endforeach ?> -->
                        <!-- 查看成员 -->
                        <div class="layout-left">
                            <!-- 管理现有的成员 -->
                            <div id="memberNow" class="container-fluid">
                                <p class="layout-left-title">团队成员</p>
                                <div>  
                                    <ul>
                                        <!-- <li class="row li-first cb">
                                            <div class="member-info inline-block col-sm-3">
                                                <img class="member-avatar w42 h42" src="/DG/web/images/user/1.png" alt="" />
                                                <p class="inline-block">李培鑫</p>   
                                            </div>
                                            <div class="member-email inline-block col-sm-3">
                                                <p>1261203542@qq.com</p>
                                            </div>
                                            <div class="member-task inline-block col-sm-6 col-xs-6 tr">
                                                <span class="member-task-doing">1</span><span class="member-task-fail">2</span><span class="member-task-done mr20">3</span>
                                            </div>
                                        </li>
                                        <li class="row cb">
                                            <div class="member-info inline-block col-sm-4 col-xs-4">
                                                <img class="member-avatar w42 h42" src="/DG/web/images/user/1.png" alt="" />
                                                <p class="inline-block">李培鑫</p>   
                                            </div>
                                            <div class="member-email inline-block col-sm-4 col-xs-4">
                                                <p>1261203542@qq.com</p>
                                            </div>
                                            <div class="member-task inline-block col-sm-4 col-xs-4 tr">
                                                <span class="member-task-doing">1</span><span class="member-task-fail">2</span><span class="member-task-done mr20">3</span>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <!-- 查看申请加入的成员 -->
                            <div id="memberApply" class="container-fluid hidden">
                                <p class="layout-left-title">申请加入的用户</p>
                                <div>  
                                    <ul>
                                        <li class="row li-first cb">
                                            <div class="member-info inline-block col-sm-4">
                                                <img class="member-avatar w42 h42" src="/DG/web/images/user/1.png" alt="" />
                                                <p class="inline-block">李培鑫</p>   
                                            </div>
                                            <div class="member-email inline-block col-sm-4">
                                                <p>1261203542@qq.com</p>
                                            </div>
                                            <div class="member-task inline-block col-sm-4 col-xs-4 tr">
                                                <button class="btn btn-success btn1 mr10">允许</button>
                                                <button class="btn btn-default btn2">拒绝</button>
                                            </div>
                                        </li>
                                        <li class="row cb">
                                            <div class="member-info inline-block col-sm-4 col-xs-4">
                                                <img class="member-avatar w42 h42" src="/DG/web/images/user/1.png" alt="" />
                                                <p class="inline-block">李培鑫</p>   
                                            </div>
                                            <div class="member-email inline-block col-sm-4 col-xs-4">
                                                <p>1261203542@qq.com</p>
                                            </div>
                                            <div class="member-task inline-block col-sm-4 col-xs-4 tr">
                                                
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="layout-right">
                            <div class="layout-right-menu">
                                <button id="inviteMemberBtn" class="btn btn-success block">邀请成员</button>
                                <button id="showMemberApplyBtn" class="btn btn-success block">申请加入的成员</button>
                                <button id="showMemberNowBtn" class="btn btn-success hidden">已加入的成员</button>
                            </div>
                        </div>
                    </div>
                    <!-- 项目 -->
                    <div id="team-project" class="hidden module m2" data-bg="1" data-hash="project">
                        <div class="layout-left">
                            <div class="container-fluid">
                                <p class="layout-left-title">项目</p>
                                <div>  
                                    <ul id="team-project-list">
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="layout-right">
                            <div class="layout-right-menu">
                                <button id="createProjectBtn" class="btn btn-success">新建项目</button>
                            </div>
                        </div>
                    </div>
                    <!-- 任务 -->
                    <!-- <div id="team-task" class="hidden module m4" data-bg="1" data-hash="task">
                        <div class="layout-left">
                            <div class="container-fluid">
                                <p class="layout-left-title">任务</p>
                                <div>  
                                    <ul>
                                        <li class="row li-first cb">
                                            <div class="project-info inline-block col-sm-8">
                                                <div class="project-info-taskName h16 lh16 mt20">
                                                    <i class="fa fa-square-o mr26"></i>
                                                    <p class="inline-block">任务名</p>   
                                                </div>
                                                <div class="project-info-taskDetail h28 lh28 pl45 pt8">
                                                    <i class="fa fa-folder"></i>
                                                    <p class="inline-block">项目名</p>   
                                                </div>
                                            </div>
                                            <div class="list-task inline-block col-sm-4 tr">
                                                <img class="member-avatar w42 h42" src="/DG/web/images/user/1.png" alt="" />
                                                <img class="member-avatar w42 h42" src="/DG/web/images/user/2.png" alt="" />
                                                <img class="member-avatar w42 h42" src="/DG/web/images/user/3.png" alt="" />
                                            </div>
                                        </li>
                                        <li class="row li-first cb">
                                            <div class="project-info inline-block col-sm-8">
                                                <div class="project-info-taskName h16 lh16 mt20">
                                                    <i class="fa fa-square-o mr26"></i>
                                                    <p class="inline-block">任务名</p>   
                                                </div>
                                                <div class="project-info-taskDetail h28 lh28 pl45 pt8">
                                                    <i class="fa fa-folder"></i>
                                                    <p class="inline-block">项目名</p>   
                                                </div>
                                            </div>
                                            <div class="list-task inline-block col-sm-4 tr">
                                                <img class="member-avatar w42 h42" src="/DG/web/images/user/1.png" alt="" />
                                                <img class="member-avatar w42 h42" src="/DG/web/images/user/2.png" alt="" />
                                                <img class="member-avatar w42 h42" src="/DG/web/images/user/3.png" alt="" />
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="layout-right">
                            <div class="layout-right-menu">
                                <p class="pb15">按类型筛选：</p>
                                <ul>
                                    <li class="active">全部</li>
                                    <li>分配给我</li>
                                </ul>
                                <p class="pb15">按成员筛选：</p>
                                <ul>
                                    <li class="">
                                        <img class="w30 h30" src="<?#php echo $user['imagePath'] ?>" alt="" />
                                        <p class="inline-block">李培鑫</p>
                                    </li>
                                    <li class="">
                                        <img class="w30 h30" src="<?#php echo $user['imagePath'] ?>" alt="" />
                                        <p class="inline-block">李培鑫</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <!-- 日历 -->
                    <div id="teamCalendar" class="hidden module m3" data-hash="calendar">
                        <div id="calendar2" class="calendar"></div>
                    </div>
                </div>
            </div>
    	</div>
        
        <!-- 项目界面************************************************************************************************************** -->
        <div id="project" class="main-content hidden" data-index="5">
        	<!-- 导航栏 -->
            <div class="navbar">
                <!-- 模块名称 -->
                <div class="navbar-main">
                    <div class="nav-main-title">
                        <i class="fa fa-folder"></i>
                        <h3>项目名</h3>
                    </div>    
                </div>
                <!-- 模块导航 -->
                <div class="navbar-sub">
                    <ul class="navbar-sub-modnav">
                        <li class="active" data-modName="task">任务</li>
                        <li class=" showCalendar" data-modName="calendar">日历</li>
                        <!-- <li data-modName="topic">话题</li> -->
                    </ul>
                </div>
            </div>
            <!-- 内容 -->
            <div class="content">
                <div class="content-wrap">

                    <!-- 任务 -->
                    <div class="module m1" data-hash="task">
                        <!-- 任务列表1 -->
                        
                    </div>
                    <!-- 日历 -->
                    <div id="projectCalendar" class="hidden module m2" data-hash="calendar">
                        <div id="calendar3" class="calendar"></div>
                        
                    </div>
                    <!-- 话题 -->
                    <!-- <div class="hidden module m3" data-bg="1" data-hash="topic">
                        project3
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

    var main = {
        // 初始化
        init : function(){
            var _this = this;
            _this.changeByHash();
            //刚打开页面时，调整页面
            this.setContent();
            this.setLayout();
            // this.updateCalendarRatio();
            Data.judgeCalendar();
            // this.initCalendar();
            //当浏览器窗口大小发生改变时，调整页面
            window.onresize=function(){  
                _this.setContent();
                _this.setLayout();
                // _this.initCalendar();
                // _this.updateCalendarRatio();
                Data.judgeCalendar();
            };
            //当浏览器hash值改变时，切换模块
            window.onhashchange = function(){
                // debugger;
                _this.changeByHash();
            };
            //切换大模块
            for(var i=0; i<this.leftMenuBtn.length-2; i++){
                this.leftMenuBtn[i].index = i;
                this.module1 = $('.m1');
                this.leftMenuBtn.eq(i).click(function(){
                    _this.leftMenuBtn.removeClass('active');
                    $(this).addClass('active');
                    _this.mainContent.addClass('hidden');
                    $('.module').addClass('hidden');
                    $('.navbar-sub-modnav li').removeClass('active')
                    $('.navbar-sub-modnav').find('li:first').addClass('active');
                    _this.mainContent.eq(this.index).find('.m1').removeClass('hidden');
                    _this.mainContent.eq(this.index).removeClass('hidden');
                    location.hash = _this.hashArray[this.index] + "/" + _this.mainContent.eq(this.index).find('.m1')[0].dataset.hash;
                    if(getAttr(_this.mainContent.eq(this.index).find('.m1')[0],'bg') == 1){
                        _this.mainContent.eq(this.index).find('.m1').parent().css("background-color","#ffffff");
                    }else{
                        _this.mainContent.eq(this.index).find('.m1').parent().css("background-color","");
                    }
                });
            };
            $('#searchBtn').on('click',function(){
                <?php $session = Yii::$app->session;$session->open();$session['search'] = true; ?>
                location.href = "/DG/web/user/findteam";
            });
            //切换小模块
            this.switchMod(dashboard);
            this.switchMod(message);
            this.switchMod(search);
            this.switchMod(team);
            this.switchMod(project);
            //添加头像点击事件
            this.menuB.open = 0;
            this.avatar.click(function(){
                _this.clearDiv();
                if(_this.menuB.open == 0){
                    _this.mask.removeClass('hidden');
                    _this.menuB.addClass('leftMenu-MenuB-active');
                    _this.menuB.open = 1;
                }else{
                    _this.mask.addClass('hidden');
                    _this.menuB.removeClass('leftMenu-MenuB-active');
                    _this.menuB.open = 0;
                }
                // main.menuB.removeClass('hidden');
            });
            //点击遮罩关闭弹出的div
            this.mask.click(function(){
                if(_this.menuB.open == 1){
                    _this.mask.addClass('hidden');
                    _this.menuB.removeClass('leftMenu-MenuB-active');
                    _this.menuB.open = 0;
                }
            });

            // $('.calendar-change').on('click',function(){
            //     var angle = this;
            //     // _this.changeCalendar(angle);
            // });
            //点击快速创建按钮时，弹出div
            this.fastCreateBtn.on('click',function(event){
                _this.clearDiv();
                _this.fastCreateBox.removeClass('hidden');
                event.stopPropagation();
                $('.fc-day').popover('hide');
            });
            //点击快速创建div，不弹回
            this.fastCreateBox.on('click',function(event){
                event.stopPropagation();
            });
            //为我的日程添加数据
            // var date = new Date();
            // this.getCalendarData(date);
            //为快速创建按钮添加事件
            this.fastCreateTask.on('click',function(){
                Data.getProjectData();
                _this.fastCreateBox.addClass('hidden');
                $("#createTaskModal input").val("");
                _this.fastCreateTaskModal.modal('show');
                $('#selectTaskMember').children('img').remove();
                main.newTaskMemberArr = [];
            });
            this.fastCreateProject.on('click',function(){
                _this.fastCreateBox.addClass('hidden');
                _this.faskCreateProjectModal.modal('show');
            });
            // 控制fullCalendar何时显示
            // $('.showCalendar').on('click',function(){
            //     // _this.updateCalendarRatio();
            //     Data.judgeCalendar();
            // });
            //为新建项目按钮添加点击事件
            $('#createProjectModal .accept').on('click',function(){
                var projectName = $('#createProject-name').val(); 
                var projectIntro = $('#createProject-intro').val();
                var projectVisible = $('#createProject-visible').val();
                if(projectName && projectIntro && projectVisible){
                    _this.createProject(projectName,projectIntro,projectVisible);
                }
            });
            //为新建任务添加可选项目
            // this.showProjectForSelect();
            //为左边菜单项目按钮添加点击事件
            this.menuC[0].open = 0;
            this.projectBtn.on('click',function(e){
                _this.clearDiv();
                if(_this.menuC[0].open == 0){
                    $('.leftMenu-MenuA-nav-btn').removeClass('active');
                    _this.projectBtn.addClass('active');
                    _this.mask.removeClass('hidden');
                    _this.menuC.addClass('leftMenu-MenuB-active');
                    _this.menuC[0].open = 1;
                    e.stopPropagation();
                    Data.getProjectData();
                };
                $('.fc-day').popover('hide');
                // main.menuB.removeClass('hidden');
            });

            //为选择成员组件添加弹出框
            $('.memberSelecter a').on('click',function(e){ e.stopPropagation(); });
            $('.memberSelecter a').popover({
                html:true,
                // placement:'bottom',
                content:function(){
                    return "<div class='memberList'>\
                                <div class='memberTitle'>\
                                    <p>分配任务</p>\
                                </div>\
                                <div class='member'>\
                                    <ul>\
                                    </ul>\
                                </div>\
                            </div>";
                },
                placement:'auto right',
            });
            $('.memberSelecter a').on('shown.bs.popover',function(){
                // $('.popover .arrow').css('top','17%');
                main.memberListOpen = 1;
                var module;
                if($('.modal-backdrop').length){
                    module = 0;
                }else if($('#taskDetail').css("right")=="0px"){
                    module = 1;
                }
                $('.memberSelecter .memberList').on('click',function(e){ e.stopPropagation(); });
                //获取所有成员的数据并显示
                $.ajax({
                    type : 'post',
                    dataType : 'json',
                    url : '/DG/web/ajax/get_team_member',
                    success : function(data){
                        var memberStr = "";
                        // console.log(main.changeTaskMemberArr);
                        for(var n in data){
                            if(module==0){
                                if(main.newTaskMemberArr.indexOf(data[n]['id'])<0){
                                    memberStr += "<li data-id='"+data[n]['id']+"'><img src='"+data[n]['imagePath']+"' title='"+data[n]['user_name']+"'><p>"+data[n]['user_name']+"</p><i class='hidden fa fa-check'></i></li>";
                                }else{
                                    memberStr += "<li data-id='"+data[n]['id']+"'><img src='"+data[n]['imagePath']+"' title='"+data[n]['user_name']+"'><p>"+data[n]['user_name']+"</p><i class='fa fa-check'></i></li>";
                                }
                            }else if(module==1){
                                if(main.changeTaskMemberArr.indexOf(data[n]['id'])<0){
                                    memberStr += "<li data-id='"+data[n]['id']+"'><img src='"+data[n]['imagePath']+"' title='"+data[n]['user_name']+"'><p>"+data[n]['user_name']+"</p><i class='hidden fa fa-check'></i></li>";
                                }else{
                                    memberStr += "<li data-id='"+data[n]['id']+"'><img src='"+data[n]['imagePath']+"' title='"+data[n]['user_name']+"'><p>"+data[n]['user_name']+"</p><i class='fa fa-check'></i></li>";
                                }
                            }
                            
                        };
                        $('.memberList .member ul').html("");
                        $('.memberList .member ul').append(memberStr);
                         //为成员添加点击事件
                        $('.memberList .member ul li').on('click',function(){
                            if($(this).children('i').hasClass('hidden')){
                                $(this).children("i").removeClass('hidden');
                                //如果模态框出现，即正在新建任务
                                if(module==0){
                                    var id = this.dataset.id;
                                    var imgPath = $(this).children("img").attr("src");
                                    var name = $(this).children("p").text();
                                    var str = "<img data-id='"+id+"' src='"+imgPath+"' title='"+name+"'>";
                                    $('#selectTaskMember').append(str);
                                    main.newTaskMemberArr.push(id);
                                }else if(module==1){
                                    var id = this.dataset.id;
                                    var imgPath = $(this).children("img").attr("src");
                                    var name = $(this).children("p").text();
                                    var str = "<img class='taskDetail-avatar' data-id='"+id+"' src='"+imgPath+"' title='"+name+"'>";
                                    $('#changeTaskMember').append(str);
                                    main.changeTaskMemberArr.push(id);
                                }
                            }else{
                                if(module==0){
                                    $(this).children("i").addClass('hidden');
                                    var id = this.dataset.id;
                                    $('#selectTaskMember').children("img[data-id='"+id+"']").remove();
                                    for(var n in main.newTaskMemberArr){
                                        if(main.newTaskMemberArr[n]==id){
                                            main.newTaskMemberArr.splice(n,1);
                                        }
                                    }
                                }else if(module==1){
                                    $(this).children("i").addClass('hidden');
                                    var id = this.dataset.id;
                                    $('#changeTaskMember').children("img[data-id='"+id+"']").remove();
                                    for(var n in main.changeTaskMemberArr){
                                        if(main.changeTaskMemberArr[n]==id){
                                            main.changeTaskMemberArr.splice(n,1);
                                        }
                                    }
                                }
                                
                            }
                        });
                    },
                });
            });
            // 添加任务事件
            $('#createTaskModal .accept').on('click',function(){
                var task_name = $('#inputTaskName').val();
                var task_intro = $('#inputTaskIntro').val();
                var task_projectId = $('#projectForSelect').val();
                var task_listId = $('#listForSelect').val();

                console.log([task_name,task_intro,task_projectId,task_listId,main.newTaskMemberArr]);
                if(task_name!="" && task_projectId!="" && task_listId!=""){
                    $.ajax({
                        type : 'post',
                        dataType : 'json',
                        url : '/DG/web/ajax/create_task',
                        data : { 'task_name':task_name,'task_intro':task_intro,'task_projectId':task_projectId,'task_listId':task_listId,'user_arr':main.newTaskMemberArr },
                        success : function(data){
                            $('#createTaskModal').modal('hide');
                            main.showTipsModal("创建任务成功");
                            console.log(1112);
                            dashboard.getTask();
                            Data.addTask();
                        },
                        fail : function(){
                            main.showTipsModal("创建任务失败");
                        },
                    });
                };
                
            });

            this.addClickTologout();

            this.getTeamData();

            this.getUserData();
        },
        // 变量----------------------------------------------------------------------------------------------
        //获取所有最大的模块
        mainContent : $('.main-content'),
        //获取小模块的容器
        modulewrap : $('.content-wrap'),
        //获取小模块
        content : $('.content'),
        //获取左部按钮
        leftMenuBtn : $('.leftMenu-MenuA-nav-btn'),
        avatar : $('.leftMenu-MenuA-avatar'),
        menuB : $('#MenuB-userInfo'),
        menuC : $('#MenuB-projectList'),
        mask : $('.mask'),
        //获取当前用户信息
        userData : <?php echo json_encode($user) ?>,
        //获取当前团队信息
        teamData : <?php echo json_encode($team) ?>,
        //获取快速创建按钮
        fastCreateBtn : $('#fastCreateBtn'),
        //获取快速创建div
        fastCreateBox : $('#fastCreateBox'),
        //获取快速创建任务按钮
        fastCreateTask : $('#fastCreateBox-tasks'),
        //获取快速创建日程按钮
        fastCreateCalendar : $('#fastCreateBox-calendar'),
        //获取快速创建项目按钮
        fastCreateProject : $('#fastCreateBox-project'),
        //获取快速创建任务模态框
        fastCreateTaskModal : $('#createTaskModal'),
        //获取快速创建项目模态框
        faskCreateProjectModal : $('#createProjectModal'),
        //hash array
        hashArray : ['dashboard','message','search','team','project'],
        //获取信息提示框
        tipsModal : $('#tipsModal'),
        //获取团队项目数据
        projectData : <?php echo json_encode($project_of_team) ?>,
        //获取左边菜单项目按钮
        projectBtn : $('#projectBtn'),
        // 当前操作的项目
        projectNow : 0,
        //新建任务的成员数组
        newTaskMemberArr : [],
        // 改变任务的成员数组
        changeTaskMemberArr : [],
        
        // 方法-----------------------------------------------------------------------------------------------
        //当浏览器宽高发生变化时，调整内容区域的大小
        setContent : function(){
            var height = document.body.offsetHeight;
            var width = document.body.offsetWidth;
            this.mainContent.css('min-height',(height-84)+'px');
            // main.mainContent.css('min-width','1306px');
            // main.modulewrap.css('min-width','1278px');
            $('#main-rightPanel').css('width',(width-60)+'px');
            this.mainContent.css('width',(width-60)+'px');
            this.modulewrap.css('min-height',(height-112)+'px');
            this.modulewrap.css('width',(width-88)+'px');
            this.modulewrap.css('height',(height-85-28)+'px');
        },
        //切换小模块
        switchMod : function(object){
            object.modnav = $('#'+object.name+' .navbar-sub-modnav li');
            for(var i=0; i< object.modnav.length;i++){
                object.modnav[i].index = i+1;
                object.modnav.eq(i).click(function(){
                    object.modnav.removeClass('active');
                    $(this).addClass('active');
                    $('.module').addClass('hidden');
                    $('#'+object.name+' .m'+this.index).removeClass('hidden');
                    location.hash = object.hash + "/" + $('#'+object.name+' .m'+this.index)[0].dataset.hash;
                    if($('#'+object.name+' .m'+this.index)[0].dataset.bg=="1"){
                        $('#'+object.name+' .m'+this.index).parent().css("background-color","#ffffff");
                    }else{
                        $('#'+object.name+' .m'+this.index).parent().css("background-color","");
                    };
                });
            };
        },

        //改变布局宽度
        setLayout : function(){
            var layoutLeft = $('.layout-left');
            var row = $('.infoRow');
            var width = document.body.offsetWidth;
            layoutLeft.css('width',(width-60-28-40-230-20)+'px');
            row.css('width',(width-60-28-40-230-20)+'px');
            row.find('.infoRow-middle').css('width',(width-60-28-40-230-20-130-180)+'px');
        },
        
        //初始化、更新日历
        updateCalendarRatio : function(data,type){
            var height = document.body.offsetHeight;
            var width = document.body.offsetWidth;
            var ratio = (width-88)/(height-160);
            var object = "";
            if(type=="user"){ object="dashboard"; }
            else if(type=="team"){ object="team"; }
            else if(type=="project"){ object="project"; }
            console.log(data);
            $('.calendar').fullCalendar('destroy');
            $('.fc-day').popover('destroy');
            $('#'+object+' .calendar').fullCalendar({
                weekMode : 'liquid',
                aspectRatio : ratio,
                header: {
                left: 'title',
                center: 'prev,next today',
                right: ''
                },
                editable: true,//可以拖动
                dayNames:['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
                dayNamesShort:['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
                monthNames:['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
                titleFormat: {
                    month:'YYYY年MMMM月',
                },
                buttonText: {
                    today: '今天',
                },
                // events: '/DG/web/user/test',
                events: data,
                timeFormat:' ',
                eventClick:function(event,element,view){
                    // console.log(event);
                    $(this).attr("id",event.id);
                    // $(this).children('.fc-content').popover('destroy');
                    // $(this).children('.fc-content').popover({
                    //     container:'body',
                    //     html:true,
                    //     placement:'auto right',
                    //     content:function(){
                    //         return "<p>"+event.id+"</p>";
                    //     },
                    // });
                    // $(this).children('.fc-content').popover('show');
                },
                // eventMouseover: function(calEvent, jsEvent, view) {   
                    
                // },   
            }); 
            $('#'+object+' .fc-day').attr("data-toggle","popover").attr("data-trigger","focus");
            // $('#'+object+' .fc-content').attr("data-toggle","popover");
            // $('#'+object+' .fc-content').popover({
            //     container:'body',
            //     html:true,
            //     placement:'auto right',
            //     content:function(){
            //         return "<p>123</p>";
            //     },
            // });
            $('#'+object+' .fc-day').popover({
                html:true,
                placement:'bottom',
                content:function(){
                    return "<div class='dateSelect' date='"+$(this).attr('data-date')+"'>\
                                <div class='dateSelect-title'>\
                                    <p>新建日程</p>\
                                </div>\
                                <div class='dateSelect-body'>\
                                    <textarea placeholder='请输入日程内容'></textarea>\
                                    <p>开始:</p><input id='WdateStart' class='Wdate' onFocus=\"WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd'})\">\
                                    <p>结束:</p><input id='WdateEnd' class='Wdate' onFocus=\"WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd'})\">\
                                    <div id='colorSelect'>\
                                        <span id='color1' class='color mr18 active' color='#D61818'></span><span id='color2' class='color mr18' color='#F0C019'></span><span id='color3' class='color mr18' color='#5B96CF'></span><span id='color4' class='color' color='#4CB749'></span>\
                                    </div>\
                                    <div class='tc'>\
                                        <button class='accept btn btn-success inline-block mr10'>保存</button><button class='cancel btn btn-default inline-block'>取消</button>\
                                    </div>\
                                </div>\
                            </div>";
                },
                placement:'auto right',
                container:'body',
            });
            // $('#'+object+' .fc-event-container').popover({
            //     html:true,
            //     placement:'bottom',
            //     content:function(){
            //         return "<div>123</div>";
            //     },
            // });
            $('#'+object+' .fc-day').on('click',function(e){
                e.stopPropagation();
                $dp.hide();
                // main.clearDiv();
                var date = $(this).attr('data-date');
                $('#'+object+" .fc-day[data-date!='"+date+"']").popover('hide');
                $('#'+object+" .fc-day[data-date='"+date+"']").popover('show');
                $(".fc-day[data-date='"+date+"']").on('shown.bs.popover',function(){
                    $('#WdateStart').val(date);
                    $('#WdateEnd').val(date);
                });
                if(!$('#fastCreateBox').hasClass('hidden')){
                    $('#fastCreateBox').addClass('hidden');
                };
            });
            $('#'+object+' .fc-day').on('shown.bs.popover',function(){
                $('.popover-content').on('click',function(e){
                    e.stopPropagation();
                });
                $('.dateSelect .cancel').on('click',function(){
                    $('#'+object+' .fc-day').popover('hide');
                });
                $('.dateSelect .accept').on('click',function(){
                    var text = $('.dateSelect textarea').val();
                    var start = $('#WdateStart').val();
                    var end = $('#WdateEnd').val();
                    var color = $("#colorSelect .active").attr("id");
                    var type = "";
                    if(color=="color1"){ color="#D61818"; }
                    else if(color=="color2"){ color="#F0C019"; }
                    else if(color=="color3"){ color="#5B96CF"; }
                    else if(color=="color4"){ color="#4CB749"; }
                    if($("#myCalendar").css("display")=="block"){ type = "user"; }
                    else if($("#teamCalendar").css("display")=="block"){ type = "team"; }
                    else if($("#projectCalendar").css("display")=="block"){ type = "project"; }
                    console.log([text,start,end,color,type]);
                    if(text==""){ 
                        $('#WdateStart').css("border-color","#A9A9A9"); 
                        $('#WdateEnd').css("border-color","#A9A9A9"); 
                        $('.dateSelect textarea').css("border-color","red"); 
                    }else if(start>end){
                        $('#WdateStart').css("border-color","red"); 
                        $('#WdateEnd').css("border-color","red");
                        $('.dateSelect textarea').css("border-color","#A9A9A9");  
                    }else{
                        $('#WdateStart').css("border-color","#A9A9A9"); 
                        $('#WdateEnd').css("border-color","#A9A9A9"); 
                        $('.dateSelect textarea').css("border-color","#A9A9A9");
                        $.ajax({
                            type : 'post',
                            // dataType : 'json',
                            url : '/DG/web/ajax/add_calendar',
                            data : { 'title':text, 'start':start ,'end':end ,'color':color ,'type':type },
                            success : function(result){
                                if(result=="success"){
                                    Data.getUserCalender(type);
                                    $('#'+object+' .fc-day').popover('hide');
                                }
                            },
                        }); 
                    }
                });
                $('.color').on('click',function(){
                    $('.color').removeClass('active');
                    $(this).addClass('active');
                });
            });
        },
        //根据hash值切换模块
        changeByHash : function(){
            var result = 1;
            var firstModuleName = location.hash.substring(1).split('/')[0];
            var secondModuleName = location.hash.substring(1).split('/')[1];
            var firstIndex = this.hashArray.indexOf(firstModuleName);
            if(firstIndex >= 0 && secondModuleName != ""){
                if($("#" + firstModuleName + " .module[data-hash='"+ secondModuleName +"']")){
                    //获取要切换的大模块和小模块
                    var firstModule = this.mainContent.eq(firstIndex);
                    var secondModule = $("#" + firstModuleName + " .module[data-hash='"+ secondModuleName +"']");
                    //切换大模块和小模块
                    this.mainContent.addClass('hidden');
                    firstModule.find(".navbar-sub-modnav li").removeClass('active');
                    firstModule.find(".navbar-sub-modnav li[data-modName='"+secondModuleName+"']").addClass('active');
                    $(".leftMenu-MenuA-nav li").removeClass('active');
                    $(".leftMenu-MenuA-nav li").eq(firstIndex).addClass('active');
                    firstModule.removeClass('hidden');
                    $("#" + firstModuleName + " .module").addClass('hidden');
                    secondModule.removeClass('hidden');
                    //根据需要切换小模块背景颜色
                    if(secondModule[0].dataset.bg == 1){
                        secondModule.parent().css("background-color","#ffffff");
                    }else{
                        secondModule.parent().css("background-color","");
                    };
                    //如果小模块模板日历插件，则初始化日历
                    if(secondModuleName == "calendar"){
                        // this.updateCalendarRatio();
                        // Data.getUserCalender();
                        Data.judgeCalendar();
                    };
                }else{
                    result = -1;
                }
            }else{
                result = -1;
            }
        },
        //新建项目
        createProject : function(projectName,projectIntro,projectVisible){
            $.ajax({
                type : 'post',
                datatype : 'json',
                url : '/DG/web/ajax/create_project',
                data : { 'projectName':projectName , 'projectIntro':projectIntro , 'projectVisible':projectVisible },
                success : function(result){
                    var code = JSON.parse(result).code;
                    if(code == "1"){
                        main.faskCreateProjectModal.modal("hide");
                        main.showTipsModal("新建项目成功");
                    }else{
                        main.showTipsModal("新建项目失败");
                        console.log("新建项目失败，错误代码为："+code);
                    }
                },
            });
        },
        //显示系统提示框
        showTipsModal : function(text){
            this.tipsModal.find('.model-mainContent p').text(text);
            this.tipsModal.modal("show");
            setTimeout(function(){
                main.tipsModal.modal("hide");
                main.tipsModal.children('.model-mainContent').children('p').text("");
            },2200);
        },
        //为新建任务模态框添加可选项目
        showProjectForSelect : function(){
            $('#createTaskModal select').eq(0).html("");
            for(var n in this.projectData){
                $('#createTaskModal select').eq(0).append("<option value='"+this.projectData[n]['proj_name']+"'>"+this.projectData[n]['proj_name']+"</option>");
            }; 
        },
        //弹出窗口时，关闭所有其他需要关闭的弹出框
        clearDiv : function(){
            if(dashboard.ifTaskDetail == 1){
                dashboard.taskDetail.css('right','-700px');
                dashboard.ifTaskDetail = 0;
            };
            if(!$('#fastCreateBox').hasClass('hidden')){
                $('#fastCreateBox').addClass('hidden');
                // $('.fc-day').popover('hide');
            };
            if(main.menuC[0].open == 1){
                main.menuC.removeClass('leftMenu-MenuB-active');
                main.mask.addClass('hidden');
                main.menuC[0].open = 0;
            };
            if(main.menuB.open == 1){
                main.menuB.removeClass('leftMenu-MenuB-active');
                main.mask.addClass('hidden');
                main.menuB.open = 0;
                // $('.fc-day').popover('hide');
            };
            Data.recoverTaskDetail();
        }, 
        // 为退出按钮添加点击事件
        addClickTologout : function(){
            $('#logout-team').on('click',function(){
                $.ajax({
                     type : 'post',
                    // dataType : 'json',
                    url : '/DG/web/ajax/logout_team',
                    success : function(result){
                        if(result=="success"){
                            location.href = "/DG/web/user/findteam";
                        }
                    },
                });
            });
            $('#logout-account').on('click',function(){
                $.ajax({
                    type : 'post',
                    // dataType : 'json',
                    url : '/DG/web/ajax/logout_account',
                    success : function(result){
                        if(result=="success"){
                            location.href = "/DG/web/user/login";
                        }
                    },
                });
            });
        },
        // 获取团队数据 设置团队名以及团队标签
        getTeamData : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_teamnow_data',
                success : function(data){
                    // console.log(data);
                    main.teamNowId = data[0]['id'];
                    $("#team .nav-main-title h3").text(data[0]['team_name']);
                    if(data[0]['leader_id']==$('.leftMenu-MenuB-account p').attr("data-userid")){
                        var labels = data[0]['labels'];
                        var labelArr = labels.split(',');
                        var str = "";
                        for(var n in labelArr){
                            str += "<span>"+labelArr[n]+"</span>";
                        };
                        $("#team-labels").html("<p>团队标签</p>").append(str);
                        $("#team-labels span").on('mouseenter',function(){
                            $(this).append("<i class='fa fa-close'></i>");
                            $('#team-labels span i').on('click',function(){
                                $(this).parent().remove();
                                var labelsArr = [];
                                var labels = $('#team-labels span');
                                for(var i=0;i<labels.length;i++){
                                    labelsArr.push(labels.eq(i).text());
                                };
                                labelsStr = labelsArr.join(",");
                                $.ajax({
                                    type : 'post',
                                    // dataType : 'json',
                                    url : '/DG/web/ajax/change_label',
                                    data : { 'labelsStr':labelsStr },
                                    success : function(result){
                                        if(result=="success"){
                                            // main.getTeamData();
                                        }
                                    },
                                });
                            });
                        });
                        $("#team-labels span").on('mouseleave',function(){
                            $(this).find("i").remove();
                        });
                        $("#addTeamLabels button").on('click',function(){
                            var newLabel = $("#addTeamLabels input").val();
                            if(newLabel==""){
                                $("#addTeamLabels input").focus();
                            }else{
                                // $("#team-labels").append("<span>"+newLabel+"</span>");
                                var labelsArr = [];
                                var labels = $('#team-labels span');
                                for(var i=0;i<labels.length;i++){
                                    labelsArr.push(labels.eq(i).text());
                                };
                                var labelsStr = "";
                                labelsStr = labelsArr.join(",");
                                $.ajax({
                                    type : 'post',
                                    // dataType : 'json',
                                    url : '/DG/web/ajax/change_label',
                                    data : { 'labelsStr':labelsStr },
                                    success : function(result){
                                        if(result=="success"){
                                            $("#addTeamLabels input").val("");
                                            // main.getTeamData();
                                        }
                                    },
                                });
                            }
                        });
                    }else{
                        $("#team-labels").remove();
                        $("#addTeamLabels").remove();
                    }
                },
            });
        }, 
        // 获取用户数据并填充用户标签
        getUserData : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_user_data',
                success : function(data){
                    console.log(data['labels']);
                    if(data['labels']!=null&&data['labels']!=""){
                        var labels = data['labels'];
                        var labelArr = labels.split(',');
                        var str = "";
                        for(var n in labelArr){
                            str += "<span>"+labelArr[n]+"</span>";
                            $("#user-labels").html("<p>个人标签</p>").append(str);
                            $("#user-labels span").on('mouseenter',function(){
                                $(this).append("<i class='fa fa-close'></i>");
                                $('#user-labels span i').on('click',function(){
                                    $(this).parent().remove();
                                    var labelsArr = [];
                                    var labels = $('#user-labels span');
                                    for(var i=0;i<labels.length;i++){
                                        labelsArr.push(labels.eq(i).text());
                                    };
                                    var labelsStr = "";
                                    labelsStr = labelsArr.join(",");
                                    $.ajax({
                                        type : 'post',
                                        // dataType : 'json',
                                        url : '/DG/web/ajax/change_user_label',
                                        data : { 'labelsStr':labelsStr },
                                        success : function(result){
                                            if(result=="success"){
                                                // main.getUserData();
                                            }
                                        },
                                    });
                                });
                                $("#user-labels span").on('mouseleave',function(){
                                    $(this).find("i").remove();
                                });
                            });
                        };
                    }
                    
                    $("#addUserLabels button").on('click',function(){
                        debugger;
                        var newLabel = $("#addUserLabels input").val();
                        if(newLabel==""){
                            $("#addUserLabels input").focus();
                        }else{
                            $("#user-labels").append("<span>"+newLabel+"</span>");
                            var labelsArr = [];
                            var labels = $('#user-labels span');
                            for(var i=0;i<labels.length;i++){
                                labelsArr.push(labels.eq(i).text());
                            };
                            var labelsStr = "";
                            labelsStr = labelsArr.join(",");
                            console.log(labelsStr);
                            $.ajax({
                                type : 'post',
                                // dataType : 'json',
                                url : '/DG/web/ajax/change_user_label',
                                data : { 'labelsStr':labelsStr },
                                success : function(result){
                                    if(result=="success"){
                                        $("#addUserLabels input").val("");
                                        // main.getUserData();
                                    }
                                },
                            });
                        }
                    });
                },
            });
        },
    }; 

    // 工作台-----------------------------------------------------------------------------------------------------------------------------
    var dashboard = {
        // 初始化
        init : function(){
            var _this = this;
            //将任务显示到任务列表内
            // console.log(["这是团队的项目数据：",this.projectData]);
            // console.log(["这是用户的任务数据：",this.taskData]);
            for(var n in this.taskData){
                //获取项目名称
                var projectName;
                for(var m in this.projectData){
                    if(this.projectData[m]['id']==this.taskData[n]['proj_id']){
                        projectName = this.projectData[m]['proj_name'];
                    }
                };
                //获取任务成员头像
                // var imgStr = "";
                // for(var m in this.userImage){
                //     if(this.taskData[n]['task_id']==this.userImage[m]['id']){
                //         imgStr+="<img src="+this.userImage[m]['imagePath']+" />";
                //     }
                // };

                // var memberData = getData();
                // var str = "";
                // str += "<div class='task' data-index='"+this.taskData[n]['task_id']+"''>\
                //     <div class='task-main'>\
                //         <a href='javascript:;' class='task-check'><i class='fa fa-square-o'></i></a>\
                //         <p class='task-name'>"+this.taskData[n]['task_name']+"</p>\
                //     </div>\
                //     <div class='task-changing'>\
                //         <div class='task-projectName'><p>"+projectName+"</p></div>\
                //     </div>\
                //     <div class='task-avatar'>\
                //     "+imgStr+"\
                //     </div>\
                // </div>";
                // this.taskList.eq(0).append(str);
            };
            //为document添加点击事件隐藏任务详情提示框、快速创建div
            $(document).click(function(){
                if(_this.ifTaskDetail == 1){
                    _this.taskDetail.css('right','-700px');
                    _this.ifTaskDetail = 0;
                };
                if(!$('#fastCreateBox').hasClass('hidden')){
                    $('#fastCreateBox').addClass('hidden');
                };
                if(main.menuC[0].open == 1){
                    main.menuC.removeClass('leftMenu-MenuB-active');
                    main.mask.addClass('hidden');
                    main.menuC[0].open = 0;
                };
                if(main.memberListOpen == 1){
                    $('.memberSelecter a').click();
                    main.memberListOpen = 0;
                };
                $('.fc-day').popover('hide');
                $dp.hide();
            });
            // 111
            //为任务详情设置框添加点击事件，阻止弹回
            this.taskDetail.on('click',function(event){
                event.stopPropagation();
                if($("#taskDetail .popover").length){
                    $('#taskDetail .memberSelecter a').click();
                };
            });
            // 为项目列表设置点击事件时阻止弹回
            main.menuC.on('click',function(){
                event.stopPropagation();
            });
            //添加任务
            console.log(1414);
            if(location.hash == "#dashboard/task" || location.hash == "" || location.hash == "#dashboard/calendar" || location.hash == "#dashboard/news"){
                this.getTask();
            }
            // 当点击工作台按钮时，刷新任务栏
            $('#dashboardBtn').on('click',function(){
                console.log(1418);
                dashboard.getTask();
            });
        },
        // 变量-------------------------------------------
        name : 'dashboard',
        //获取各个任务列表
        taskList : $('.taskList-task'),
        //获取任务信息
        taskData : <?php echo json_encode($task) ?>,
        //获取项目信息
        projectData : <?php echo json_encode($project) ?>,
        //获取任务-用户-头像信息
        userImage : <?php echo json_encode($userImage) ?>,
        //获取任务详情设置框
        taskDetail : $('#taskDetail'),
        //记录任务详情设置框是否显示
        ifTaskDetail : 0,
        //hash
        hash : "dashboard",
        //方法------------------------------------------------
        //弹出任务详情框
        showTaskDetail : function(task){
            //获取点击任务的id
            // var index = getAttr(task,'index');
            // var index = task.dataset.index;
            //如果任务详情设置框为显示，则将其弹出
            if(this.ifTaskDetail == 0){
                this.taskDetail.css('right',0);
                this.ifTaskDetail = 1;
            }
        },
        //获取用户任务数据
        getTask : function(){
            console.log("为个人任务列表填充数据");
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_user_task',
                success : function(data){
                    var taskList = $('#dashboard .taskList');
                    // 请求用户头像
                    $.ajax({
                        type : 'post',
                        dataType : 'json',
                        url : '/DG/web/ajax/get_user_image',
                        data : { 'project_id':Data.projectNow },
                        success : function(imageList){
                            taskList.find(".taskList-task").html("");
                            var list = imageList;
                            var taskStr = "";
                            // console.log(data);
                            // console.log(list);
                            for(var n in data){
                                if(data[n]['status']=="未完成"){
                                    var imagePath = "";
                                    for(var m in list){
                                        if(data[n]['id']==list[m]['task_id']){
                                            imagePath+="<img src="+list[m]['imagePath']+" />";
                                        }
                                    };
                                    taskStr += "<div class='task' data-index='"+data[n]['id']+"' draggable='true'>\
                                                    <div class='task-main'>\
                                                        <a href='javascript:;' class='task-check'><i class='fa fa-square-o'></i></a>\
                                                        <p class='task-name'>"+data[n]['task_name']+"</p>\
                                                    </div>\
                                                    <div class='task-changing'>\
                                                        <div class='task-projectName'><p>"+data[n]['proj_name']+"</p></div>\
                                                    </div>\
                                                    <div class='task-avatar'>\
                                                    "+imagePath+"\
                                                    </div>\
                                                </div>";
                                    var order = data[n]['list_order'];
                                    taskList.eq(order).find('.taskList-task').append(taskStr);
                                    var taskStr = "";
                                };
                            };
                            console.log(1492);
                            Data.addClickToTask();
                            dashboard.addClickToCompleteTask();
                        },
                    });
                },
            });
        },
        addClickToCompleteTask : function(){
            // $('#dashboard .fa-square-o').off('click');
            $('#dashboard .fa-square-o').on('click',function(e){
                e.stopPropagation();
                if($(this).parent().parent().parent().attr("data-index")){
                    var task_id = $(this).parent().parent().parent().attr("data-index");
                    var thisTask = $(this);
                    $.ajax({
                        type : 'post',
                        // dataType : 'json',
                        url : '/DG/web/ajax/set_task_complete',
                        data : { 'task_id':task_id },
                        success : function(result){
                            if(result=="success"){
                                thisTask.removeClass('fa-square-o').addClass('fa-check-square-o');
                                thisTask.parent().parent().children("p").addClass('task-complete');
                                setTimeout(dashboard.getTask,800);
                                // dashboard.getTask();
                                main.clearDiv();
                            }else{
                                main.showTipsModal("完成任务失败");
                            }
                        },
                    });
                }
            });
        },
        //
    };

    //消息--------------------------------------------------------------------------------------------------------------------------------
    var message = {
        // 初始化
        init : function(){

        },
        // 变量-------------------------------------------
        name : 'message',
        hash : 'message',
    };

    //查找--------------------------------------------------------------------------------------------------------------------------------
    var search = {
        // 初始化
        init : function(){
        },
        // 变量-------------------------------------------
        name : 'search',
        hash : 'search',
    };

    //团队---------------------------------------------------------------------------------------------------------------------------------
    var team = {
        // 初始化
        init : function(){
            var _this = this;
            //为查看新增成员和查看当前成员按钮添加事件
            this.showMemberApplyBtn.click(function(){
                _this.showMemberApply();
            });
            this.showMemberNowBtn.click(function(){
                _this.showMemberNow();
            });
            //显示当前团队成员数据
            this.showMemberData();
            //显示申请加入的用户数据
            this.showMemberApplyData();
            //显示项目数据
            this.showProjectData();

            this.addClickToInviteMemberBtn();

            this.addClickToInviteMember();

            $('#createProjectBtn').on('click',function(){
                $('#createProjectModal').modal('show');
            });
            // 点击项目按钮时更新项目数据
            $('#team-project-btn').on('click',function(){
                team.showProjectData();
            });
            // 点击成员按钮时更新成员数据
            $('#team-member-btn').on('click',function(){
                team.showMemberData();
            });
            $('#teamBtn').on('click',function(){
                team.showMemberData();
            });
        },
        // 变量-------------------------------------------
        name : 'team',
        hash : 'team',
        //获取团队用户的数据
        userData : <?php echo json_encode($users_of_team) ?>,
        //获取申请加入团队的用户数据
        userApplyData : <?php echo json_encode($userApply) ?>,
        //查看新增成员按钮
        showMemberApplyBtn : $('#showMemberApplyBtn'),
        //查看已加入的成员按钮
        showMemberNowBtn : $('#showMemberNowBtn'),
        //获取团队项目数据
        projectData : <?php echo json_encode($project_of_team) ?>,
        // 方法-------------------------------------------
        //显示当前团队队员
        showMemberNow : function(){
            $('#memberApply').addClass('hidden');
            $('#memberNow').removeClass('hidden');
            this.showMemberNowBtn.addClass('hidden');
            this.showMemberApplyBtn.removeClass('hidden');
        },
        //显示申请加入团队的成员
        showMemberApply : function(){
            $('#memberNow').addClass('hidden');
            $('#memberApply').removeClass('hidden');
            this.showMemberApplyBtn.addClass('hidden');
            this.showMemberNowBtn.removeClass('hidden');
        },
        //显示申请加入团队的用户数据
        showMemberApplyData : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_applymember_data',
                success : function(data){
                    var str = "";
                    for(var n in data){
                        str += "<li class='row li-first cb' data-id="+data[n]['id']+">\
                            <div class='member-info inline-block col-sm-3'>\
                                <img class='member-avatar w42 h42' src='"+data[n]['imagePath']+"' alt='' />\
                                <p class='inline-block'>"+data[n]['user_name']+"</p>\
                            </div>\
                            <div class='member-email inline-block col-sm-3'>\
                                <p>"+data[n]['account']+"</p>\
                            </div>\
                            <div class='member-task inline-block col-sm-6 tr'>\
                                <button class='ok btn btn-success btn1 mr10'>允许</button>\
                                <button class='not_ok btn btn-default btn2'>拒绝</button>\
                            </div>\
                        </li>";
                    };
                    $('#memberApply ul').html("");
                    $('#memberApply ul').append(str);
                    team.addClickToApplyBtn();
                },
            });
        },
        //显示团队已有成员的数据
        showMemberData : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_member_data',
                success : function(data1){
                    $.ajax({
                        type : 'post',
                        dataType : 'json',
                        url : '/DG/web/ajax/get_user_progress',
                        success : function(data2){
                            var progress = {};
                            for(var m in data2){
                                var name = data2[m]['id'];
                                if(!progress[name]){
                                    progress[name] = {};
                                    progress[name].done = 0;
                                    progress[name].undo = 0;
                                }
                                if(data2[m]['status']=="未完成"){
                                    progress[name].undo++;
                                }else if(data2[m]['status']=="完成"){
                                    progress[name].done++;
                                }
                            };
                            var str = "";
                            for(var n in data1){
                                var name = data1[n]['id'];
                                if(!progress[name]){
                                    progress[name] = {};
                                    progress[name].done = 0;
                                    progress[name].undo = 0;
                                }
                                str += "<li class='row li-first cb'>\
                                    <div class='member-info inline-block col-sm-3'>\
                                        <img class='member-avatar w42 h42' src='"+data1[n]['imagePath']+"' alt='' />\
                                        <p class='inline-block'>"+data1[n]['user_name']+"</p>\
                                    </div>\
                                    <div class='member-email inline-block col-sm-3 tl'>\
                                        <p>"+data1[n]['account']+"</p>\
                                    </div>\
                                    <div class='member-task inline-block col-sm-6 tr'>\
                                        <span class='member-task-doing span1'>"+progress[name]['undo']+"</span><span class='member-task-fail'>0</span><span class='member-task-done mr20 span3'>"+progress[name]['done']+"</span>\
                                    </div>\
                                </li>";
                            };
                            $('#memberNow ul').html("");
                            $('#memberNow ul').append(str);
                            $('.member-task .span1').popover({
                                html : true,
                                placement : 'top',
                                content : "<div class='task-popover'>未完成</div>",
                                container : 'body',
                                trigger : 'hover',
                            });
                            $('.member-task .span3').popover({
                                html : true,
                                placement : 'top',
                                content : "<div class='task-popover'>已完成</div>",
                                container : 'body',
                                trigger : 'hover',
                            });
                        },
                    });
                },
            });
            // var str = "";
            // for(var n in this.userData){
            //     str += "<li class='row li-first cb'>\
            //                 <div class='member-info inline-block col-sm-3'>\
            //                     <img class='member-avatar w42 h42' src='"+this.userData[n]['imagePath']+"' alt='' />\
            //                     <p class='inline-block'>"+this.userData[n]['user_name']+"</p>\
            //                 </div>\
            //                 <div class='member-email inline-block col-sm-3 tl'>\
            //                     <p>"+this.userData[n]['account']+"</p>\
            //                 </div>\
            //                 <div class='member-task inline-block col-sm-6 tr'>\
            //                     <span class='member-task-doing'>1</span><span class='member-task-fail'>2</span><span class='member-task-done mr20'>3</span>\
            //                 </div>\
            //             </li>";
            // };
            // $('#memberNow ul').html("");
            // $('#memberNow ul').append(str);
        },
        // 获取团队的项目数据
        showProjectData : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_team_project',
                success : function(data1){
                    $.ajax({
                        type : 'post',
                        dataType : 'json',
                        url : '/DG/web/ajax/get_project_progress',
                        success : function(data2){
                            var progress = {};
                            for(var m in data2){
                                var name = data2[m]['id'];
                                if(!progress[name]){
                                    progress[name] = {};
                                    progress[name].done = 0;
                                    progress[name].undo = 0;
                                }
                                if(data2[m]['status']=="未完成"){
                                    progress[name].undo++;
                                }else if(data2[m]['status']=="完成"){
                                    progress[name].done++;
                                }
                            };
                            // console.log(progress['77']);
                            var str = "";
                            for(var n in data1){
                                var name = data1[n]['id'];
                                if(!progress[name]){
                                    progress[name] = {};
                                    progress[name].done = 0;
                                    progress[name].undo = 0;
                                }
                                str += "<li class='row li-first cb'>\
                                            <div class='project-info inline-block col-sm-4'>\
                                                <i class='fa fa-folder'></i>\
                                                <p class='inline-block'>"+data1[n]['proj_name']+"</p>\
                                            </div>\
                                            <div class='list-task inline-block col-sm-8 tr'>\
                                                <span class='span1 list-task-doing tc' data-toggle='popover'>"+progress[name]['undo']+"</span><span class='list-task-fail tc'>0</span><span class='span3 list-task-done tc mr20'>"+progress[name]['done']+"</span>\
                                            </div>\
                                        </li>";
                            };
                            $('#team-project-list').html("");
                            $('#team-project-list').append(str);
                            $('.list-task .span1').popover({
                                html : true,
                                placement : 'top',
                                content : "<div class='task-popover'>未完成</div>",
                                container : 'body',
                                trigger : 'hover',
                            });
                            $('.list-task .span3').popover({
                                html : true,
                                placement : 'top',
                                content : "<div class='task-popover'>已完成</div>",
                                container : 'body',
                                trigger : 'hover',
                            });
                        },
                    });
                },
            });
        },
        // 为邀请成员按钮添加点击事件
        addClickToInviteMemberBtn : function(){
            $('#inviteMemberBtn').on('click',function(){
                $('#inviteMemberModal').modal("show");
            });
        },
        // 通过邀请成员模态框邀请成员
        addClickToInviteMember : function(){
            $('#inviteMemberModal .accept').on('click',function(){
                var account = $('#inviteMember-account').val();
                if(!isEmail(account)){
                    $('#inviteMember-account').val("");
                    $('#inviteMember-account').css("border-color","red");
                }else{
                    $.ajax({
                        type : 'post',
                        dataType : 'json',
                        url : '/DG/web/ajax/get_team_member',
                        success : function(data){
                            var ifInTeam = 0;
                            for(var n in data){
                                if(data[n]['account']==account){
                                    $('#inviteMember-account').val("");
                                    $('#inviteMember-account').css("border-color","red");
                                    ifInTeam = 1;
                                }
                            }
                            if(ifInTeam == 0){
                                $('#inviteMember-account').css("border-color","");
                                $.ajax({
                                    type : 'post',
                                    dataType : 'json',
                                    url : '/DG/web/ajax/invite_member',
                                    data : { 'account':account },
                                    success : function(result){
                                        $('#inviteMember-account').val("");
                                        $('#inviteMemberModal').modal('hide');
                                        if(result.code==-1){
                                            main.showTipsModal("该用户不存在");
                                        }else if(result.code==-2){
                                            main.showTipsModal("已邀请过该用户");
                                        }else if(result.code==1){
                                            main.showTipsModal("邀请成功");
                                        }
                                    }
                                });
                            }
                        }   
                    });
                }
            });
        },
        // 允许/拒绝成员加入团队
        addClickToApplyBtn : function(){
            $('#memberApply .ok').on('click',function(){
                var user_id = $(this).parent().parent().attr("data-id");
                $.ajax({
                    type : 'post',
                    // dataType : 'json',
                    url : '/DG/web/ajax/accept_member',
                    data : { 'user_id':user_id },
                    success : function(result){
                        if(result=="success"){
                            team.showMemberData();
                            team.showMemberApplyData();
                            main.showTipsModal("操作成功");
                        }
                    },
                });
            });
            $('#memberApply .not_ok').on('click',function(){
                var user_id = $(this).parent().parent().attr("data-id");
                $.ajax({
                    type : 'post',
                    // dataType : 'json',
                    url : '/DG/web/ajax/refuse_member',
                    data : { 'user_id':user_id },
                    success : function(result){
                        if(result=="success"){
                            team.showMemberData();
                            team.showMemberApplyData();
                            main.showTipsModal("操作成功");
                        }
                    },
                });
            });
        },
    };

    //项目-----------------------------------------------------------------------------------------------------------------------------------
    var project = {
        // 初始化
        init : function(){
            var _project = this;
            // this.getAllProjectData();
            // 初始化项目任务数据
            // if(main.projectNow){
               
            // };
            //初始化新建任务模态框的可选项目

        },
        // 变量-------------------------------------------
        name : 'project',
        hash : 'project',
        // 函数
        // 获取所有项目的数据
        getAllProjectData : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_all_project_data',
                success : function(data){
                    // console.log(data);
                    var str = "";
                    for(var n in data){
                        str += "<li class='project' data-projectid='"+data[n]['id']+"'><i class='fa fa-folder'></i>"+data[n]['proj_name']+"</li>";
                    };
                    $('#MenuB-projectList-body ul').html("");
                    $('#MenuB-projectList-body ul').append(str);

                    $('.project').on('click',function(){
                        // 设置当前项目id并获取
                        main.projectNow = this.dataset.projectid;
                        for(var n in data){
                            if(data[n]['id'] == main.projectNow){
                                main.projectNowData = data[n];
                            };
                        };
                        //建立项目里列表
                        var listName = main.projectNowData['list_name'].split(',');
                        var listStr = "";
                        for(var n in listName){
                            listStr += "<div class='taskList' data-listid='"+(parseInt(n)+1)+"'>\
                                        <div class='taskList-title'>\
                                            <div class='taskList-name'><h2>"+listName[n]+"</h2></div>\
                                            <div class='taskList-num'><h2></h2></div>\
                                        </div>\
                                        <div class='taskList-task'>\
                                        </div>\
                                    </div>";
                        };
                        $('#project .m1').html("").append(listStr);
                        //获取该项目任务并填充
                        $.ajax({
                            type : 'post',
                            dataType : 'json',
                            url : '/DG/web/ajax/get_task_of_project',
                            data : { 'project_id':main.projectNow },
                            success : function(data){
                                var taskList = $('#project .taskList');
                                var taskStr = "";
                                // console.log(data);
                                for(var n in data){
                                    taskStr += "<div class='task' data-index='"+data[n]['id']+"' draggable='true'>\
                                                    <div class='task-main'>\
                                                        <a href='javascript:;' class='task-check'><i class='fa fa-square-o'></i></a>\
                                                        <p class='task-name'>"+data[n]['task_name']+"</p>\
                                                    </div>\
                                                    <div class='task-changing'>\
                                                        <div class='task-projectName'><p>"+"项目名"+"</p></div>\
                                                    </div>\
                                                    <div class='task-avatar'>\
                                                    "+"imgStr"+"\
                                                    </div>\
                                                </div>";
                                    var order = data[n]['list_order'];
                                    // console.log(order);
                                    taskList.eq(order).find('.taskList-task').append(taskStr);
                                    var taskStr = "";
                                };
                            },
                        });
                        // 隐藏项目菜单
                        main.mask.addClass('hidden');
                        main.menuC.removeClass('leftMenu-MenuB-active');
                        main.menuC[0].open = 0;
                        // 切换页面
                        $('.mainContent').addClass('hidden');
                        $('#project').removeClass('hidden');
                        $('.module').addClass('hidden');
                        $('#project .m1').removeClass('hidden');
                        $('.navbar-sub-modnav li').removeClass('active');
                        $('.navbar-sub-modnav').find('li:first').addClass('active');
                        location.hash = 'project' + "/" + 'task';
                    });
                },
            });
        },
        getProjectDataById : function(){

        },

    };




    var Data = {
        init : function(){
            var _data = this;
            this.getProjectData();
            //如果session中项目id存在，则渲染项目列表
            if(Data.projectNow && location.hash == "#project/task"){
                //获取项目数据
                $.ajax({
                    type : 'post',
                    dataType : 'json',
                    url : '/DG/web/ajax/get_project_data',
                    data : { 'project_id':Data.projectNow },
                    success : function(data){
                        Data.projectNowData = data[0];
                        // 建立项目里列表
                        Data.createTaskList();
                        // 显示项目名
                        $('#project .nav-main-title h3').text(Data.projectNowData['proj_name']);
                    },
                });
            };
            this.changeTask();
            this.deleteTask();
            // 获取个人的日程信息
            this.getUserCalender();
            // 为二级导航添加点击事件，用于查看时更新数据
            Data.addClickToSubnav();
            // 当新建项目模态框出现时清空内部数据
            $('#fastCreateBox-project').on('click',function(){
                Data.clearCreateProjectModal();
            });
            $('#createProjectBtn').on('click',function(){
                Data.clearCreateProjectModal();
            });
        },

        projectNow : '<?php $session = Yii::$app->session;$session->open();echo $session['project_id']; ?>',
        //获取项目数据
        getProjectData : function(){
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_all_project_data',
                success : function(data){
                    //更新新建任务列表
                    Data.updateProjectForNewTask(data);
                    //更新项目列表
                    Data.updateProjectList(data);
                    // 为项目添加点击事件
                    Data.addClickToProject(data);
                },
            });
        },
        //获取项目数据后-更新新建任务模态框中的可选项目
        updateProjectForNewTask : function(data){
            $('#projectForSelect').html("");
            $('#projectForSelect').append("<option value='' selected='true' class='hidden'>选择所属项目</option>");
            for(var n in data){
                $('#projectForSelect').append("<option data-name='"+data[n]['proj_name']+"' value='"+data[n]['id']+"'>"+data[n]['proj_name']+"</option>");
            }; 
            Data.addChangeToProjectSelect(data);
            $('#listForSelect').html("");
            $('#listForSelect').append("<option value='' selected='true' class='hidden'>选择任务列表</option>");

        },
        // 获取项目数据后-更新项目列表中的项目
        updateProjectList : function(data){
            var str = "";
            for(var n in data){
                str += "<li class='project' data-projectid='"+data[n]['id']+"'><i class='fa fa-folder'></i>"+data[n]['proj_name']+"</li>";
            };
            $('#MenuB-projectList-body ul').html("");
            $('#MenuB-projectList-body ul').append(str);
        },
        //为项目列表中的项目添加点击事件
        addClickToProject : function(data){
            $('.project').on('click',function(){
                //从请求的数据中获取选中的项目的数据
                Data.projectNow = this.dataset.projectid;
                //改变session['project_id']
                $.ajax({
                    type : 'post',
                    dataType : 'json',
                    url : '/DG/web/ajax/set_session_projectid',
                    data : { 'project_id':Data.projectNow },
                    success : function(result){
                        // console.log(result);
                    },
                });
                for(var n in data){
                    if(data[n]['id'] == Data.projectNow){
                        Data.projectNowData = data[n];
                    };
                };
                // 显示项目名
                $('#project .nav-main-title h3').text(Data.projectNowData['proj_name']);
                // 建立项目里列表
                Data.createTaskList();
                // 隐藏项目列表
                Data.hideProjectList();
                // 切换页面
                Data.goProjectModule();
            });
        },
        // 建立项目的任务列表
        createTaskList : function(){
            var listName = Data.projectNowData['list_name'].split(',');
            var listStr = "";
            for(var n in listName){
                listStr += "<div class='taskList' data-listid='"+(parseInt(n)+1)+"'>\
                            <div class='taskList-title'>\
                                <div class='taskList-name'><h2>"+listName[n]+"</h2></div>\
                                <div class='taskList-num'><h2></h2></div>\
                            </div>\
                            <div class='taskList-task'>\
                            </div>\
                        </div>";
            };
            $('#project .m1').html("").append(listStr);
            //填充任务
            Data.addTask();
        },
        // 隐藏项目列表
        hideProjectList : function(){
            main.mask.addClass('hidden');
            main.menuC.removeClass('leftMenu-MenuB-active');
            main.menuC[0].open = 0;
        },
        // 切换到项目模块-任务
        goProjectModule : function(){
            $('.mainContent').addClass('hidden');
            $('#project').removeClass('hidden');
            $('.module').addClass('hidden');
            $('#project .m1').removeClass('hidden');
            $('.navbar-sub-modnav li').removeClass('active');
            $('.navbar-sub-modnav').find('li:first').addClass('active');
            location.hash = 'project' + "/" + 'task';
        },
        //为项目列表填充任务
        addTask : function(){
            console.log("为项目任务列表填充数据");
            $('.taskList-task').html("");
            //请求项目的任务信息
            $.ajax({
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_task_of_project',
                data : { 'project_id':Data.projectNow },
                success : function(data){
                    var taskList = $('#project .taskList');
                    // 请求用户头像
                    $.ajax({
                        type : 'post',
                        dataType : 'json',
                        url : '/DG/web/ajax/get_project_image',
                        data : { 'project_id':Data.projectNow },
                        success : function(imageList){
                            var list = imageList;
                            var taskStr = "";
                            // console.log(data);
                            // console.log(list);
                            for(var n in data){
                                var imagePath = "";
                                for(var m in list){
                                    if(data[n]['id']==list[m]['task_id']){
                                        imagePath+="<img src="+list[m]['imagePath']+" />";
                                    }
                                };
                                if(data[n]['status']=="未完成"){
                                    taskStr += "<div class='task' data-index='"+data[n]['id']+"' draggable='true'>\
                                                    <div class='task-main'>\
                                                        <a href='javascript:;' class='task-check'><i class='fa fa-square-o'></i></a>\
                                                        <p class='task-name'>"+data[n]['task_name']+"</p>\
                                                    </div>\
                                                    <div class='task-changing'>\
                                                        <div class='task-projectName'><p>"+data[n]['proj_name']+"</p></div>\
                                                    </div>\
                                                    <div class='task-avatar'>\
                                                    "+imagePath+"\
                                                    </div>\
                                                </div>";
                                }else{
                                    taskStr += "<div class='task' data-index='"+data[n]['id']+"' draggable='true'>\
                                                    <div class='task-main'>\
                                                        <a href='javascript:;' class='task-check'><i class='fa fa-check-square-o'></i></a>\
                                                        <p class='task-name task-complete'>"+data[n]['task_name']+"</p>\
                                                    </div>\
                                                    <div class='task-changing'>\
                                                        <div class='task-projectName'><p>"+data[n]['proj_name']+"</p></div>\
                                                    </div>\
                                                    <div class='task-avatar'>\
                                                    "+imagePath+"\
                                                    </div>\
                                                </div>";
                                };
                                
                                var order = data[n]['list_order'];
                                taskList.eq(order).find('.taskList-task').append(taskStr);
                                var taskStr = "";
                            };
                            console.log(1951);
                            Data.addClickToTask();
                            Data.addCompleteToTask();
                        },
                    });
                },
            });
        },
        // 更新新建任务模态框
        updateNewTaskModal : function(){

        },
        //为任务添加点击事件
        addClickToTask : function(){
            // 为任务添加点击事件
            //获取所有任务
            // console.log($('.task'));
            console.log("为任务添加点击事件");
            Data.task = $('.task');
            //为所有任务添加点击事件，弹出右边任务详情设置框,并更新数据
            Data.task.on('click',function(event){
                main.clearDiv();
                // 获取任务id
                var task_id = this.dataset.index;
                // 更新任务详情框信息
                $.ajax({//任务相关
                    type : 'post',
                    dataType : 'json',
                    url : '/DG/web/ajax/gettaskdetail',
                    data : { 'task_id':task_id },
                    success : function(data){
                        var taskDetail = data;
                        $('#taskDetail #taskDetail-name').attr("data-id",task_id);
                        $('#taskDetail #taskDetail-name').text(taskDetail['task_name']);//更新任务名
                        $('#taskDetail #taskDetail-describe').text(taskDetail['remark']);//更新任务描述
                        Data.addClickToTaskName(data);
                    },
                });
                $.ajax({//任务项目相关
                    type : 'post',
                    datatype : 'json',
                    url : '/DG/web/ajax/get_task_project',
                    data : { 'task_id':task_id },
                    success : function(data){
                        var projectData = JSON.parse(data);
                        $('#taskDetail #taskDetail-projectName').text(projectData['proj_name']);
                    },
                });
                $.ajax({//任务成员相关
                    type : 'post',
                    datatype : 'json',
                    url : '/DG/web/ajax/get_task_member',
                    data : { 'task_id':task_id },
                    success : function(data){
                        // console.log(["data",data]);
                        main.changeTaskMemberArr = [];
                        var memberData = JSON.parse(data);
                        // console.log(memberData);
                        var str = "";
                        for(var n in memberData){
                            main.changeTaskMemberArr.push(memberData[n]['user_id']);
                            str+="<img class='taskDetail-avatar' data-id='"+memberData[n]['user_id']+"' src='"+memberData[n]['imagePath']+"' title='"+memberData[n]['user_name']+"'>";
                            // str+="<img class='taskDetail-avatar' src='/DG/web/images/user/1.png' alt=''>";
                        };
                        // str+="<i id='taskDetail-addAvatar' class='fa fa-plus-circle'></i>";
                        $('#taskDetail-avatarContainer').html("");
                        $('#taskDetail-avatarContainer').append(str);
                        $('#changeTaskMember .taskDetail-avatar').remove();
                        $('#changeTaskMember').append(str);
                    },
                });
                // 显示任务详情框
                dashboard.showTaskDetail(this);
                // 阻止事件冒泡
                event.stopPropagation();
            });
            // for(var i=0; i<$('.task').length; i++){
            //     $('.task')[i].ondragstart = function(e){
            //         console.log("start");
            //         main.dragTaskId = this.dataset.index;
            //         main.dargTaskHTML = this.outerHTML;
            //     };
            //     $('.task')[i].ondragenter = function(e){
            //         evt = window.event || e; 
            //         var obj = evt.toElement || evt.relatedTarget;
            //         var pa = this; 
            //         console.log([pa,obj]);
            //         if(pa.contains(obj) && pa!=obj) return false; 
            //         // $(this).hide();
            //         $(this).append(main.dargTaskHTML);
            //         // e.stopPropagation();
            //     };
            //     $('.task')[i].ondragleave = function(e){
            //         evt = window.event || e; 
            //         var obj = evt.toElement || evt.relatedTarget; 
            //         var pa = this; 
            //         if(pa.contains(obj) && pa!=obj) return false; 
            //         // $(this).hide(); 
            //         // console.log("leave");
            //         $(".task[data-index='"+main.dragTaskId+"']").remove();
            //         // e.stopPropagation();
            //     };
            //     $('.task')[i].ondrop = function(e){
            //         $(this).append(main.dargTaskHTML);
            //     }; 
            // };

            // $('.task-main i').off('click');
            // $('.task-main i').on('click',function(e){
                
            //     e.stopPropagation();
            // });
        },
        // 为可选项目的select标签添加change事件
        addChangeToProjectSelect : function(data){
            $('#projectForSelect').off('change');
            $('#projectForSelect').on('change',function(){
                $('#listForSelect').html("");
                var projectSelected = $('#projectForSelect').children("option[value='"+$('#projectForSelect').val()+"']").attr('data-name');
                for(var n in data){
                    if(projectSelected == data[n]['proj_name']){
                        var list = data[n]['list_name'].split(',');
                        var listStr = "";
                        for(var m in list){
                            listStr += "<option value='"+m+"'>"+list[m]+"</option>";
                            $('#listForSelect').append(listStr);
                            listStr = "";
                        };
                    };
                };
            });
        },
        // 为任务添加完成任务事件
        addCompleteToTask : function(){
            // 移除之前绑定的事件，防止多次触发
            $('#project .fa-square-o').off('click');
            $('#project .fa-check-square-o').off('click');
            // 当任务状态为未完成时，点击使其完成
            $('#project .fa-square-o').on('click',function(e){
                e.stopPropagation();
                if($(this).parent().parent().parent().attr("data-index")){
                    var task_id = $(this).parent().parent().parent().attr("data-index");
                    var thisTask = $(this);
                    $.ajax({
                        type : 'post',
                        // dataType : 'json',
                        url : '/DG/web/ajax/set_task_complete',
                        data : { 'task_id':task_id },
                        success : function(result){
                            if(result=="success"){
                                thisTask.removeClass('fa-square-o').addClass('fa-check-square-o');
                                thisTask.parent().parent().children("p").addClass('task-complete');
                                // dashboard.getTask();
                                Data.addCompleteToTask();
                            }else{
                                main.showTipsModal("完成任务失败");
                            }
                        },
                    });
                };
                
            });
            // 当任务状态为已完成时，再次点击使其未完成
            $('#project .fa-check-square-o').on('click',function(e){
                e.stopPropagation();
                if($(this).parent().parent().parent().attr("data-index")){
                    var task_id = $(this).parent().parent().parent().attr("data-index");
                    var thisTask = $(this);
                    $.ajax({
                        type : 'post',
                        // dataType : 'json',
                        url : '/DG/web/ajax/set_task_uncomplete',
                        data : { 'task_id':task_id },
                        success : function(result){
                            if(result=="success"){
                                thisTask.removeClass('fa-check-square-o').addClass('fa-square-o');
                                thisTask.parent().parent().children("p").removeClass('task-complete');
                                // dashboard.getTask();
                                Data.addCompleteToTask();
                            }else{
                                main.showTipsModal("完成任务失败");
                            }
                        },
                    });
                };
            });
        },
        // 初始化任务详情框中的事件
        addClickToTaskName : function(data){
            // console.log(data);
            $('#taskDetail-name').off('click');
            // 为任务名添加点击事件
            $('#taskDetail-name').on('click',function(){
                $('#taskDetail-name').addClass('hidden');
                $('#taskDetail-name-input').val(data['task_name']);
                $('#taskDetail-name-input').removeClass('hidden');

                $('#taskDetail-describe').addClass('hidden');
                $('#taskDetail-intro-input').val(data['remark']);
                $('#taskDetail-intro-input').removeClass('hidden');

                $('#taskDetail-conformDiv button').removeClass('hidden');

                $('#taskDetail-avatarContainer').addClass('hidden');

                $('#changeTaskMember').removeClass('hidden');

                // 为任务原持有者添加头像

            });
            // 为取消按钮添加点击事件
            $('#taskDetail-conformDiv .cancel').off('click');
            $('#taskDetail-conformDiv .cancel').on('click',function(){
                $('#taskDetail-name').removeClass('hidden');
                $('#taskDetail-name-input').val("");
                $('#taskDetail-name-input').addClass('hidden');

                $('#taskDetail-describe').removeClass('hidden');
                $('#taskDetail-intro-input').val("");
                $('#taskDetail-intro-input').addClass('hidden');

                $('#taskDetail-conformDiv button').addClass('hidden');

                $('#taskDetail-avatarContainer').removeClass('hidden');

                $('#changeTaskMember').addClass('hidden');
            });
        },
        // 将任务详情框恢复
        recoverTaskDetail : function(){
            $('#taskDetail-conformDiv .cancel').click();
            $('#changeTaskMember img').remove();
            if($("#taskDetail .popover").length){
                $('#taskDetail .memberSelecter a').click();
            };
            
        },
        // 修改任务信息
        changeTask : function(){
            $("#taskDetail-conformDiv .accept").on("click",function(){
                var task_id = $("#taskDetail-name").attr("data-id");//获取要修改的任务的id
                var task_name = $("#taskDetail-name-input").val();//获取任务的新名字
                var task_intro = $("#taskDetail-intro-input").val();//获取任务的新描述
                var task_memberArr = [];
                for(i=0;i<$("#changeTaskMember .taskDetail-avatar").length;i++){
                    task_memberArr.push($("#changeTaskMember .taskDetail-avatar").eq(i).attr("data-id"));
                };
                if(task_id && task_name && task_intro && task_memberArr){
                    if(task_memberArr.length==0){
                        task_memberArr = "none";
                    }
                    console.log([task_id,task_name,task_intro,task_memberArr]);
                    $.ajax({
                        type : 'post',
                        // dataType : 'json',
                        url : '/DG/web/ajax/change_task',
                        data : { 'task_id':task_id, 'task_name':task_name, 'task_intro':task_intro, 'task_memberArr':task_memberArr },
                        success : function(result){
                            $('#taskDetail-conformDiv .cancel').click();
                            if(location.hash == "#project/task"){
                                Data.addTask();
                            }else if(location.hash == "#dashboard/task" || location.hash == ""){
                                dashboard.getTask();
                            }
                            Data.updateTaskDetail(task_id);
                        },
                    });
                };
            });
        },
        // 删除任务按钮
        deleteTask : function(){
            $("#deleteTaskBtn").on("click",function(){
                var task_id = $("#taskDetail-name").attr("data-id");
                $.ajax({
                    type : 'post',
                    // dataType : 'json',
                    url : '/DG/web/ajax/delete_task',
                    data : { 'task_id':task_id },
                    success : function(result){
                        main.clearDiv();
                        if(location.hash == "#project/task"){
                            Data.addTask();
                        }else if(location.hash == "#dashboard/task" || location.hash == ""){
                            dashboard.getTask();
                        }
                    },
                });
            });
        },
        // 更新任务详情框
        updateTaskDetail : function(task_id){
            // main.clearDiv();
            
            // 更新任务详情框信息
            $.ajax({//任务相关
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/gettaskdetail',
                data : { 'task_id':task_id },
                success : function(data){
                    var taskDetail = data;
                    $('#taskDetail #taskDetail-name').attr("data-id",task_id);
                    $('#taskDetail #taskDetail-name').text(taskDetail['task_name']);//更新任务名
                    $('#taskDetail #taskDetail-describe').text(taskDetail['remark']);//更新任务描述
                    Data.addClickToTaskName(data);
                },
            });
            $.ajax({//任务项目相关
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_task_project',
                data : { 'task_id':task_id },
                success : function(data){
                    var projectData = data;
                    $('#taskDetail #taskDetail-projectName').text(projectData['proj_name']);
                },
            });
            $.ajax({//任务成员相关
                type : 'post',
                dataType : 'json',
                url : '/DG/web/ajax/get_task_member',
                data : { 'task_id':task_id },
                success : function(data){
                    // console.log(["data",data]);
                    main.changeTaskMemberArr = [];
                    var memberData = data;
                    // console.log(memberData);
                    var str = "";
                    for(var n in memberData){
                        main.changeTaskMemberArr.push(memberData[n]['user_id']);
                        str+="<img class='taskDetail-avatar' data-id='"+memberData[n]['user_id']+"' src='"+memberData[n]['imagePath']+"' title='"+memberData[n]['user_name']+"'>";
                        // str+="<img class='taskDetail-avatar' src='/DG/web/images/user/1.png' alt=''>";
                    };
                    // str+="<i id='taskDetail-addAvatar' class='fa fa-plus-circle'></i>";
                    $('#taskDetail-avatarContainer').html("");
                    $('#taskDetail-avatarContainer').append(str);
                    $('#changeTaskMember .taskDetail-avatar').remove();
                    $('#changeTaskMember').append(str);
                },
            });
            // 显示任务详情框
            dashboard.showTaskDetail(this);
            // 阻止事件冒泡
            event.stopPropagation();
        },
        // 获取个人日程数据
        getUserCalender : function(type){
            if(type == "user"){
                $.ajax({
                    type : 'post',
                    dataType : 'json',
                    url : '/DG/web/ajax/get_user_calendar',
                    data : {},
                    success : function(data){
                        console.log(data);
                        for(var n in data){
                            if(data[n]['allDay']==0){
                                data[n]['allDay']=false;
                            }else if(data[n]['allDay']==1){
                                data[n]['allDay']=true;
                            };
                            data[n]['id'] = parseInt(data[n]['id']);
                        };
                        main.updateCalendarRatio(data,type);
                        $("#myCalendar .fc-button").on('click',function(){
                            
                        });
                    },
                    error : function(){
                        console.log("fail");
                    },
                });
            }else if(type == "team"){
                $.ajax({
                    type : 'post',
                    dataType : 'json',
                    url : '/DG/web/ajax/get_team_calendar',
                    data : {},
                    success : function(data){
                        main.updateCalendarRatio(data,type);
                    },
                    error : function(){
                        console.log("fail");
                    },
                });
            }else if(type == "project"){
                $.ajax({
                    type : 'post',
                    dataType : 'json',
                    url : '/DG/web/ajax/get_project_calendar',
                    data : {},
                    success : function(data){
                        main.updateCalendarRatio(data,type);
                    },
                    error : function(){
                        console.log("fail");
                    },
                });
            };
            
        },
        // 为二级导航添加事件
        addClickToSubnav : function(){
            $("#dashboard .navbar-sub-modnav li[data-modname='calendar']").on("click",function(){
                Data.getUserCalender("user");
            });
            $("#team .navbar-sub-modnav li[data-modname='calendar']").on("click",function(){
                Data.getUserCalender("team");
            });
            $("#project .navbar-sub-modnav li[data-modname='calendar']").on("click",function(){
                Data.getUserCalender("project");
            });
        },
        // 根据hash值判断是否渲染日历
        judgeCalendar : function(){
            if(location.hash=="#dashboard/calendar"){
                Data.getUserCalender("user");
            }else if(location.hash=="#team/calendar"){
                Data.getUserCalender("team");
            }else if(location.hash=="#project/calendar"){
                Data.getUserCalender("project");
            }
        },
        // 当点击日历某一天时，显示弹出框
        showCalendarSet : function(){

        },
        // 清空新建项目模态框
        clearCreateProjectModal : function(){
            $('#createProjectModal input').val("");
            $('#createProjectModal select').val("Y");
        },
    };

    main.init();
    dashboard.init();
    team.init();
    project.init();
    Data.init();

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

</body>
</html>

