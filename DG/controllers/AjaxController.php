<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Team;
use app\models\Task;
use app\models\Project;
use app\models\Apply;
use app\models\TeamProject;
use app\models\ProjectTask;
use app\models\UserTask;
use app\models\UserTeam;
use app\models\Calendar;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

class AjaxController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    //登录时验证用户名和密码
    public function actionLogin()
    {
        //获取账户和密码
        $account = $_POST['account'];
        $pw = $_POST['pw'];
        //初始化返回值
        $response = array('code'=>'-1' , 'msg'=>'登录失败');

        if($account!="" && $pw!=""){
            // 查找用户是否存在
            $data =  User::find()->where(['account' => $account])->one();
            //如果用户存在且密码正确，则返回值为1，否则为-1
            if($data && $data->pw == $pw){

                $session = Yii::$app->session;
                $session->open();
                $user = User::find()->where(['account' => $account])->one();
                $session['user_id'] = $user->id;
                $session['team_id'] = "";

                $response['code'] = '1';
                $response['msg'] = '登录成功';
            }else{
                $response['code'] = '-1';
                $response['msg'] = '登录失败';
            }
        }
        echo JSON_encode($response);
    }

    //用户注册
    public function actionRegist()
    {
        $account = $_POST['account'];
        $name = $_POST['name'];
        $pw = $_POST['pw'];
        
        $response = array('code'=>'-1' , 'msg'=>'注册失败');

        if($account!="" && $name!="" && $pw!=""){
            $arr = new User();
            $arr->account = $account;
            $arr->pw = $pw;
            $arr->user_name = $name;
            $arr->save();
            $response['code'] = 1;
            $response['msg'] = '注册成功';
            $session = Yii::$app->session;
            $session->open();
            $user = User::find()->where(['account' => $account])->one();
            $session['user_id'] = $user->id;
            $session['team_id'] = "";
        }else{
            $response['code'] = -1;
            $response['msg'] = '注册失败';
            
        }

        echo JSON_encode($response);
    }
    //用于选择（即点击）团队时获取团队id，保存到session，之后进入主页后会根据拿到的id获取团队数据
    public function actionSelectteam(){
        $response = array('code'=>'-1' , 'msg'=>'选择团队失败！');
        if($_POST['team_id']){
            $session = Yii::$app->session;
            $session->open();
            $session['team_id'] = $_POST['team_id'];
            $response['code'] = 1;
            $response['msg'] = '获得team_id';
            $response['team_id'] = $session['team_id'];
        }

        echo JSON_encode($response);
    }

    //用于查找团队
    public function actionFindteam(){
        $response = array('code'=>'-1' , 'msg'=>'查找团队失败！');
        $type = $_POST['type'];
        $text = $_POST['text'];
        if($type == "1"){
            $teamAll = Team::findBySql('SELECT * FROM team where team_name like "%'.$text.'%"')->asArray()->all();
        }else if($type == "2"){
            $teamAll = Team::findBySql("SELECT * FROM team WHERE labels like '%".$text."%'")->asArray()->all();
        }else{
            $response = array('code'=>'-2' , 'msg'=>'查找团队失败！');
        }
        return json_encode($teamAll);
    }

    public function actionConformaccount(){
        $response = array('code'=>'-1' , 'msg'=>'该账号不存在！');
        if($_POST['account'] && $_POST['account'] != ""){
            $account = User::find()->where(['account' => $_POST['account']])->one();
            if($account){
                $response['code'] = '1';
                $response['msg'] = '该账号存在！';
            }else{
                $response['code'] = '-2';
                $response['msg'] = '该账号不存在！';
            }
        }

        echo JSON_encode($response);
    }

    public function actionCreateteam(){
        $response = array('code'=>'-1' , 'msg'=>' 新建团队失败！');
        $session = Yii::$app->session;
        $session->open();

        if($_POST['teamName']!="" && $_POST['teamIntro']!="" && $_POST['teamLabels']!="" ){
            $arr = new Team();
            $arr->team_name = $_POST['teamName'];
            $arr->leader_id = $session['user_id'];
            $arr->built_day = date('y-m-d h:i:s',time());
            $arr->team_intro = $_POST['teamIntro'];
            $arr->member_id = ",".$session['user_id']."";
            $arr->labels = $_POST['teamLabels'];
            $arr->save();
            $response['code'] = 1;
            $response['msg'] = "创建团队成功！";
        };

        echo JSON_encode($response);

        // $response = array('code'=>'-1' , 'msg'=>'选择团队失败！');
        // if($_POST['team_id']){
        //     $session = Yii::$app->session;
        //     $session->open();
        //     $session['team_id'] = $_POST['team_id'];
        //     $response['code'] = 1;
        //     $response['msg'] = '获得team_id';
        //     $response['team_id'] = $session['team_id'];
        // }

        // echo JSON_encode($response);
    }
    
    public function actionGetdata(){
            $table = $_POST['table'];
            $id = $_POST['id'];
            if($table == "user"){
                $data = User::findBySql('SELECT * FROM '.$table.' where id = '.$id.'')->asArray()->all();
            }

            echo JSON_encode($data);
    }

    public function actionJointeam(){
        // $_post = filter($_POST)
        $user_id = $_POST['user_id'];
        $team_id = (int)$_POST['team_id'];
        $type = $_POST['type'];
        $response = array('code'=>'-1' , 'msg'=>' 申请加入团队失败！');
        if( $user_id!="" && $team_id!="" && $type!="" ){
            
            //如果是用户申请加入团队
            if($type == 1){
                $ifSame = Apply::find()->where(['user_id'=>$user_id,'team_id'=>$team_id,'type'=>$type])->one();
                if(!$ifSame){
                    $arr = new Apply;
                    $arr->user_id = $user_id;
                    $arr->team_id = $team_id;
                    $arr->type = 1;
                    $arr->save();
                    $response = array('code'=>'1' , 'msg'=>' 申请加入团队成功！');
                }else{
                    $response = array('code'=>'-4' , 'msg'=>' 你已申请加入该团队！');
                }
            //如果是团队邀请用户加入
            }else if($type == 2){
                $arr = new Apply;
                $arr->user_id = $user_id;
                $arr->team_id = $team_id;
                $arr->type = 2;
                $arr->save();
                $response = array('code'=>'2' , 'msg'=>' 团队邀请成功！');
            //如果type不是指定的值
            }else{
                $response = array('code'=>'-3' , 'msg'=>' 申请加入团队失败，type指定错误！');
            }
        }else{
            $response = array('code'=>'-2' , 'msg'=>' 申请加入团队失败,数据不完整！');
        }
        echo JSON_encode($response);
    }

    public function actionGettaskdata(){
        $response = array('code'=>'-1' , 'msg'=>' 获取用户任务数据失败！');
        $session = Yii::$app->session;
        $session->open();
        $user_id = $_POST['id'];
        if($user_id && $session['team_id']){
            //获取团队项目id(字符串格式)
            // $project_id = Team::find()->where(['id' => $session['team_id']])->one()->proj_id;
            //根据项目id获取用户的任务数据
            // $taskData = Task::findBySql('SELECT * FROM task where ')->asArray()->all();
        }
        
    }
    //根据任务id返回任务的详细信息
    public function actionGettaskdetail(){
        $task_id = $_POST['task_id'];
        $task_detail = Task::findBySql('SELECT * FROM task t1, project_task t2, project t3 WHERE t1.`id` = t2.`task_id` AND t2.`proj_id` = t3.`id` AND t1.`id` = '.$task_id.';')->asArray()->all();
        echo json_encode($task_detail[0]);
    }
    //根据团队id返回团队的人数
    public function actionGetcountteam(){
        $team_id = $_POST['team_id'];
        $count_team = team::findBySql('SELECT COUNT(*) FROM user_team WHERE team_id = '.$team_id.';')->asArray()->all();
        echo json_encode($count_team[0]['COUNT(*)']);
    }
    //根据任务id返回任务的项目信息
    public function actionGet_task_project(){
        $task_id = $_POST['task_id'];
        $project_data = Project::findBySql('SELECT * FROM project_task JOIN project ON(project_task.`proj_id` = project.`id`) WHERE project_task.`task_id` = '.$task_id.';')->asArray()->all();
        echo json_encode($project_data[0]);
    }
    //根据任务id返回任务的成员信息
    public function actionGet_task_member(){
        $task_id = $_POST['task_id'];
        $member_data = User::findBySql('SELECT * FROM USER JOIN user_task ON(user.`id` = user_task.`user_id`) WHERE user_task.`task_id` = '.$task_id.';')->asArray()->all();
        echo json_encode($member_data);
    }
    //创建项目
    public function actionCreate_project(){
        $session = Yii::$app->session;
        $session->open();
        $response = array('code'=>'-1');
        //获取数据
        $projectName = $_POST['projectName'];
        $projectIntro = $_POST['projectIntro'];
        $projectVisible = $_POST['projectVisible'];
        $built_time = date('y-m-d h:i:s',time());

        if( $projectName && $projectIntro && $projectVisible && $built_time ){
            // 新建项目
            $arr = new Project;
            $arr->proj_name = $projectName;
            $arr->proj_intro = $projectIntro;
            $arr->proj_visible = $projectVisible;
            $arr->built_time = $built_time;
            $arr->save();

            $arr2 = new TeamProject;
            $arr2->team_id = $session['team_id'];
            $arr2->proj_id = $arr->id;
            $arr2->save();
            $response['code'] = "1";
        }else{
            $response['code'] = "2";
        }
        return json_encode($response);
    }
    // 获取所有项目的数据
    public function actionGet_all_project_data(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];

        $allProjectData = Project::findBySql('SELECT project.`id`,project.`proj_name`,project.`list_name` FROM`project` project JOIN team_project ON(project.`id` = team_project.`proj_id`) WHERE team_project.`team_id` = '.$session['team_id'].';')->asArray()->all();

        echo json_encode($allProjectData);
    }
    // 获取单个项目的数据
    public function actionGet_project_data(){
        $projectId = $_POST['project_id'];
        $projectData = Project::findBySql('SELECT * FROM project WHERE project.`id` = '.$projectId.';')->asArray()->all();
        echo json_encode($projectData);
    }
    // 获取单个项目的任务数据
    public function actionGet_task_of_project(){
        $projectId = $_POST['project_id'];
        $taskData = Task::findBySql('SELECT t1.`id`,t1.`task_name`,t1.`list_order`,t1.`status`,t3.`proj_name` FROM task t1,project_task t2,project t3 WHERE t2.`proj_id` = '.$projectId.' AND t1.`id` = t2.`task_id` AND t2.`proj_id` = t3.`id`;')->asArray()->all();
        echo json_encode($taskData);
    }
    // 设置session中project_id值
    public function actionSet_session_projectid(){
        $session = Yii::$app->session;
        $session->open();
        $project_id = $_POST['project_id'];
        $session['project_id'] = $project_id;
        echo $session['project_id'];
    }
    // 根据项目id获取项目中任务和用户头像的关系
    public function actionGet_project_image(){
        $project_id = $_POST['project_id'];
        $imageList = User::findBySql('SELECT t1.`id` AS task_id,t4.`id` AS user_id,t4.`imagePath` FROM task t1,project_task t2,project t3,USER t4,user_task t5 WHERE t2.`proj_id` = '.$project_id.' AND t1.`id` = t2.`task_id` AND t2.`proj_id` = t3.`id` AND t5.`task_id` = t1.`id` AND t4.`id` = t5.`user_id`;')->asArray()->all();
        echo json_encode($imageList);
    }
    // 获取用户的任务数据
    public function actionGet_user_task(){
        $session = Yii::$app->session;
        $session->open();
        $task = Task::findBySql('SELECT t2.`id`,t2.`task_name`,t5.`proj_name`,t1.`list_order`,t2.`status` FROM user_task t1,task t2,project_task t3,team_project t4,project t5 WHERE t1.`task_id`=t2.`id` AND t1.`user_id`='.$session['user_id'].' AND t2.`id`=t3.`task_id` AND t3.`proj_id`=t4.`proj_id` AND t4.`team_id`='.$session['team_id'].' AND t4.`proj_id`=t5.`id` AND t3.`proj_id`=t5.`id`;')->asArray()->all();
        echo json_encode($task);
    }
    // 根据团队id获取项目中任务和用户头像的关系
    public function actionGet_user_image(){
        $session = Yii::$app->session;
        $session->open();
        $user_id = $session['user_id'];
        $imageList = User::findBySql('SELECT t1.`id` AS task_id,t4.`id` AS user_id,t4.`imagePath` FROM task t1,project_task t2,project t3,USER t4,user_task t5,team_project t6 WHERE t1.`id` = t2.`task_id` AND t2.`proj_id` = t3.`id` AND t5.`task_id` = t1.`id` AND t4.`id` = t5.`user_id` AND t6.`proj_id`=t3.`id` AND t6.`team_id`='.$session['team_id'].';')->asArray()->all();
        echo json_encode($imageList);
    }
    // 获取团队所有成员的数据
    public function actionGet_team_member(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $memberData = User::findBySql('SELECT t1.`id`,t1.`user_name`,t1.`imagePath`,t1.`account` FROM USER t1,user_team t2,team t3 WHERE t1.`id`=t2.`user_id` AND t2.`team_id`=t3.`id` AND t3.`id`='.$team_id.';')->asArray()->all();
        echo json_encode($memberData);
    }
    // 创建任务
    public function actionCreate_task(){
        $session = Yii::$app->session;
        $session->open();

        $task_name = $_POST['task_name'];
        $task_intro = $_POST['task_intro'];
        $task_projectId = $_POST['task_projectId'];
        $task_listId = $_POST['task_listId'];
        $user_arr = $_POST['user_arr'];

        // $task_name = "任务1";
        // $task_intro = "任务1描述";
        // $task_projectId = 1;
        // $task_listId = "1";
        // $user_arr = [1,2];

        $task = new Task();
        $task->task_name = $task_name;
        $task->remark = $task_intro;
        $task->list_order = $task_listId;
        $task->issuer_id = $session['user_id'];
        $task->save();

        if($task->id){
            $project_task = new  ProjectTask();
            $project_task->proj_id = $task_projectId;
            $project_task->task_id = $task->id;
            $project_task->save();

            foreach($user_arr as $key => $value){
                $user_task = new UserTask();
                $user_task->user_id = $value;
                $user_task->task_id = $task->id;
                $user_task->save();
            };

        };
        echo $task->id;
    }
    // 将任务状态设置为已完成
    public function actionSet_task_complete(){
        $task_id = $_POST['task_id'];
        $arr = Task::find()->where(['id' => $task_id])->one();
        if($arr->status){
            $arr->status = "完成";
            $arr->save();
            echo "success";
        }else{
            echo "fail";
        }
    }
    // 将任务状态设置为未完成
    public function actionSet_task_uncomplete(){
        $task_id = $_POST['task_id'];
        $arr = Task::find()->where(['id' => $task_id])->one();
        if($arr->status){
            $arr->status = "未完成";
            $arr->save();
            echo "success";
        }else{
            echo "fail";
        }
    }
    // 修改任务信息
    public function actionChange_task(){
        $task_id = $_POST['task_id'];
        $task_name = $_POST['task_name'];
        $task_intro = $_POST['task_intro'];
        $user_arr = $_POST['task_memberArr'];
        if($user_arr == "none"){
            $user_arr = [];
        }

        $task = Task::find()->where(['id' => $task_id])->one();
        if($task->id){
            $task->task_name = $task_name;
            $task->remark = $task_intro;
            $task->save();

            // $user_task_old = UserTask::find()->where(['task_id' => $task_id])->all();
            // UserTask::findByPk($user_task_old->id)->delete();
            UserTask::deleteAll('task_id = :task_id', ['task_id' => $task->id]);
            foreach($user_arr as $key => $value){
                $user_task = new UserTask();
                $user_task->user_id = $value;
                $user_task->task_id = $task->id;
                $user_task->save();
            };
            echo "success";
        }else{
            echo "fail";
        }
    }
    // 删除任务
    public function actionDelete_task(){
        $task_id = $_POST['task_id'];
        if($task_id){
            Task::deleteAll('id = :id', [':id' => $task_id]);
            echo "删除任务成功";
        }else{
            echo "删除任务失败";
        }
    }
    // 获取个人日程数据
    public function actionGet_user_calendar(){
        $session = Yii::$app->session;
        $session->open();
        $user_id = $session['user_id'];
        $calendar = Calendar::findBySql("SELECT id,title,start,end,color,allDay FROM calendar WHERE TYPE='user' AND own_id=".$user_id.";")->asArray()->all();
        echo json_encode($calendar);
    }
    // 获取团队日程数据
    public function actionGet_team_calendar(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $calendar = Calendar::findBySql("SELECT id,title,start,end,color,allDay FROM calendar WHERE TYPE='team' AND own_id=".$team_id.";")->asArray()->all();
        echo json_encode($calendar);
    }
    // 获取项目日程数据
    public function actionGet_project_calendar(){
        $session = Yii::$app->session;
        $session->open();
        $project_id = $session['project_id'];
        $calendar = Calendar::findBySql("SELECT id,title,start,end,color,allDay FROM calendar WHERE TYPE='project' AND own_id=".$project_id.";")->asArray()->all();
        echo json_encode($calendar);
    }
    // 添加日程
    public function actionAdd_calendar(){
        $session = Yii::$app->session;
        $session->open();
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $color = $_POST['color'];
        $type = $_POST['type'];
        if($type=="user"){
            $own_id = $session['user_id'];
        }else if($type=="team"){
            $own_id = $session['team_id'];
        }else if($type=="project"){
            $own_id = $session['project_id'];
        };
        $calendar = new Calendar();
        $calendar->title = $title;
        $calendar->start = $start;
        $calendar->end = $end;
        $calendar->color = $color;
        $calendar->type = $type;
        $calendar->own_id = $own_id;
        $calendar->save();
        if($calendar->id){
            return "success";
        }else{
            return "fail";
        }
    }
    // 获取用户申请加入的团队
    public function actionGet_apply_team(){
        $session = Yii::$app->session;
        $session->open();
        $user_id = $session['user_id'];
        $team = Team::findBySql('SELECT t2.* FROM apply t1,team t2 WHERE t1.`type`=1 AND t1.`user_id`='.$user_id.' AND t1.`team_id`=t2.`id`;')->asArray()->all();
        echo json_encode($team);
    }
    // 判断用户是否在团队中、用户是否申请过加入团队
    public function actionUser_in_team(){
        $session = Yii::$app->session;
        $session->open();
        $user_id = $session['user_id'];
        $team_id = $_POST['team_id']; 
        $response = array('result'=>'0');
        // $userTeam = UserTeam::findBySql('SELECT * FROM user_team WHERE user_id='.$user_id.' AND team_id='.$team_id.';')->one();
        $userTeam = UserTeam::find()->where(['user_id'=>$user_id,'team_id'=>$team_id])->one();//用于判断用户是否在团队中
        $userApply = Apply::find()->where(['user_id'=>$user_id,'team_id'=>$team_id,'type'=>1])->one();//用于判断用户是否已申请加入团队
        if($userTeam==null){
            if($userApply==null){
                $response['result'] = "1";
            }else{
                $response['result'] = "-2";
            }
        }else{
            $response['result'] = "-1";
        }
        // if($userApply==null){
        //     $response['result'] = "1";
        // }else{
        //     $response['result'] = "-2";
        // }
        echo json_encode($response);
    }
    // 获取邀请用户加入的团队
    public function actionGet_invite_team(){
        $session = Yii::$app->session;
        $session->open();
        $user_id = $session['user_id'];
        $team = Team::findBySql('SELECT t2.* FROM apply t1,team t2 WHERE t1.`type`=2 AND t1.`user_id`='.$user_id.' AND t1.`team_id`=t2.`id`;')->asArray()->all();
        echo json_encode($team);
    }
    // 获取团队数据
    public function actionGet_team_data(){
        $team_id = $_POST['team_id'];
        $teamData = Team::findBySql('SELECT team.*,user.`user_name` FROM team,USER WHERE team.id='.$team_id.' AND user.`id`=team.`leader_id`;')->asArray()->all();
        echo json_encode($teamData);
    }
    // 成员加入团队
    public function actionJoin_team(){
        $session = Yii::$app->session;
        $session->open();
        $user_id = $session['user_id'];
        $team_id = $_POST['team_id'];
        $type = $_POST['type'];
        Apply::deleteAll('user_id=:user_id AND team_id=:team_id AND type=:type', [':user_id'=>$user_id ,':team_id'=>$team_id, ':type'=>$type]);
        $arr = new UserTeam();
        $arr->user_id = $user_id;
        $arr->team_id = $team_id;
        $arr->save();
        echo "success";
    }
    // 获取用户已加入的团队
    public function actionGet_user_team(){
        $session = Yii::$app->session;
        $session->open();
        $user_id = $session['user_id'];
        $teamData = Team::findBySql('SELECT team.* FROM team,user_team WHERE user_team.`team_id`=team.`id` AND user_team.`user_id`='.$user_id.';')->asArray()->all();
        echo json_encode($teamData);
    }
    // 邀请成员
    public function actionInvite_member(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $account = $_POST['account'];
        $response = array('code'=>'0');
        $user = User::find()->where(['account'=>$account])->one();
        if($user!=null){
            $ifInvited = Apply::find()->where(['user_id'=>$user->id])->one();
            if($ifInvited==null){
                $arr = new Apply();
                $arr->user_id = $user->id;
                $arr->team_id = $team_id;
                $arr->type = 2;
                $arr->save();
                $response['code'] = 1;
            }else{
                $response['code'] = -2;
            }
        }else{
            $response['code'] = -1;
        }
        echo json_encode($response);   
    }
    // 获取团队的成员数据
    public function actionGet_member_data(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $memberData = User::findBySql('SELECT user.* FROM USER,user_team WHERE user_team.`team_id`='.$team_id.' AND user_team.`user_id`=user.`id`;')->asArray()->all();
        echo json_encode($memberData);
    }
    // 获取申请加入团队的成员数据
    public function actionGet_applymember_data(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $applyMemberData = User::findBySql('SELECT t1.* FROM USER t1,apply t2,team t3 WHERE t2.`type`=1 AND t2.`user_id`=t1.`id` AND t2.`team_id`=t3.`id` AND t3.`id`='.$team_id.';')->asArray()->all();
        echo json_encode($applyMemberData);
    }
    // 同意成员加入团队
    public function actionAccept_member(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $user_id = $_POST['user_id'];
        Apply::deleteAll('user_id=:user_id AND team_id=:team_id', [':user_id'=>$user_id ,':team_id'=>$team_id]);
        $arr = new UserTeam();
        $arr->user_id = $user_id;
        $arr->team_id = $team_id;
        $arr->save();
        echo "success";
    }
    // 拒绝成员加入团队
    public function actionRefuse_member(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $user_id = $_POST['user_id'];
        Apply::deleteAll('user_id=:user_id AND team_id=:team_id', [':user_id'=>$user_id ,':team_id'=>$team_id]);
        echo "success";
    }
    // 获取团队项目任务的完成情况
    public function actionGet_project_progress(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $progress = Task::findBySql('SELECT t1.status,t2.`id` FROM task t1,project t2,project_task t3,team_project t4 WHERE t1.`id`=t3.`task_id` AND t2.`id`=t3.`proj_id` AND t2.`id`=t4.`proj_id` AND t4.`team_id`='.$team_id.';')->asArray()->all();
        echo json_encode($progress);
    }
    // 获取团队的项目数据
    public function actionGet_team_project(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $project = Project::findBySql('SELECT * FROM project t1,team_project t2 WHERE t1.`id`=t2.`proj_id` AND t2.`team_id`='.$team_id.';')->asArray()->all();
        echo json_encode($project);
    }
    // 获取团队项目任务的完成情况
    public function actionGet_user_progress(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $progress = Task::findBySql('SELECT t3.`status`,t5.`id` FROM team_project t1,project_task t2,task t3,user_task t4,USER t5 WHERE t1.`team_id`='.$team_id.' AND t1.`proj_id`=t2.`proj_id` AND t2.`task_id`=t3.`id` AND t3.`id`=t4.`task_id` AND t4.`user_id`=t5.`id`;')->asArray()->all();
        echo json_encode($progress);
    }
    // 退出当前团队
    public function actionLogout_team(){
        $session = Yii::$app->session;
        $session->open();
        $session['team_id'] = "";
        echo "success";
    }
    // 退出账户
    public function actionLogout_account(){
        $session = Yii::$app->session;
        $session->open();
        $session['user_id'] = "";
        $session['team_id'] = "";
        echo "success";
    }
    // 获取当前团队的信息
    public function actionGet_teamnow_data(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $teamData = Team::findBySql('SELECT team.*,user.`user_name` FROM team,USER WHERE team.id='.$team_id.' AND user.`id`=team.`leader_id`;')->asArray()->all();
        echo json_encode($teamData);
    }
    // 修改团队标签
    public function actionChange_label(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $labelsStr = $_POST['labelsStr'];
        $teamNow = Team::find()->where(['id'=>$team_id])->one();
        $teamNow->labels = $labelsStr;
        $teamNow->save();
        echo "success";
    }
    // 获取用户数据
    public function actionGet_user_data(){
        $session = Yii::$app->session;
        $session->open();
        $user_id = $session['user_id'];
        $userData = User::find()->where(['id'=>$user_id])->asArray()->one();
        echo json_encode($userData);
    }
    // 修改用户标签
    public function actionChange_user_label(){
        $session = Yii::$app->session;
        $session->open();
        $user_id = $session['user_id'];
        $labelsStr = $_POST['labelsStr'];
        $userNow = User::find()->where(['id'=>$user_id])->one();
        $userNow->labels = $labelsStr;
        $userNow->save();
        echo "success";
    }
    // 获取搜索用户界面显示的默认用户数据
    public function actionGet_default_users(){
        $defaultUsers = User::findBySql('SELECT * FROM USER ORDER BY interest DESC LIMIT 10;')->asArray()->all();
        echo json_encode($defaultUsers);
    }
    // 根据条件搜索用户
    public function actionFind_users(){
        $text = $_POST['text'];
        $type = $_POST['type'];
        if($type==1){
            $users = User::findBySql("SELECT * FROM USER WHERE account = '".$text."';")->asArray()->all();
        }else if($type==2){
            $users = User::findBySql("SELECT * FROM USER WHERE labels like '%".$text."%'")->asArray()->all();
        }
        echo json_encode($users);
    }
}
