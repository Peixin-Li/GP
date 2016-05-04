<?php
/**
 * @Author: lpx
 * @Date:   2016-03-05 14:46:04
 * @Last Modified time: 2016-03-16 00:25:41
 */
?>

<!-- 工作台界面 -->
<!-- 导航栏 -->
<div class="main-navbar">
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
            <li class="active">我的任务</li>
            <li>我的日程</li>
            <li>最新动态</li>
        </ul>
    </div>
</div>
<!-- 工作台模块 -->
<div class="main-content">
    <div class="module-wrap m14">
        <!-- 我的任务 -->
        <div class="module m1">
            <!-- 任务列表1 -->
            <div class="taskList">
                <!-- 标题区域 -->
                <div class="taskList-title">
                    <div class="taskList-name"><h2>分配给我的任务</h2></div>
                    <div class="taskList-num"><h2>2</h2></div>
                </div>
                <!-- 任务区域 -->
                <div class="taskList-task">
                    <div class="task">
                        <div class="task-main">
                            <a href="" class="task-check"><i class="task-check fa fa-square-o"></i></a>
                            <p class="task-name">制作主界面</p>
                        </div>
                    </div>
                    <div class="task"></div>
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
                    <div class="task">
                        <div class="task-main">
                            <a href="" class="task-check"><i class="task-check fa fa-square-o"></i></a>
                            <p class="task-name">制作主界面</p>
                        </div>
                    </div>
                    <div class="task"></div>
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
        <div class="hidden module m2">div2</div>
        <!-- 最新动态 -->
        <div class="hidden module m3">div3</div>
    </div>
</div>

<script>
    
    var dashboard = {};
    dashboard.modnav = $('.navbar-sub-modnav li');
    for(var i=0; i< dashboard.modnav.length;i++){
        dashboard.modnav[i].index = i+1;
        dashboard.modnav.eq(i).click(function(){
            dashboard.modnav.removeClass('active');
            $(this).addClass('active');
            $('.module').addClass('hidden');
            $('.m'+this.index).removeClass('hidden');
        });
    };

    // var a = <?php $session = Yii::$app->session;echo $session['team_id']; ?>;
    // alert(a);

</script>