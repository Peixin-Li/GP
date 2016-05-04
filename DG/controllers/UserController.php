<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Team;
use app\models\Task;
use app\models\Project;
use app\models\Apply;
use app\models\UserTeam;
use app\models\TeamProject;
use app\models\ProjectTask;
use app\models\UserTask;
use app\models\Test;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

class UserController extends Controller
{
    //默认action
    public $defaultAction = 'index';
    // 关闭csrf
    public $enableCsrfValidation = false;
    
    public function behaviors()
    {
        return [
        ];
    }

    //主页
    public function actionIndex()
    {
        //关闭模板
        $this->layout = false;
        // 打开session
        $session = Yii::$app->session;
        $session->open();
        //将数组转换为字符串函数
        function arrayToString($arr)
        {
            if(is_array($arr)){
                foreach($arr as $key => $value){
                    if(is_array($value)){
                        $arr[$key] = implode(",",$value);
                    }
                }
                return implode(",", $arr);
            }
        }
        // 根据不同情况渲染不同页面
        if(!$session['user_id']){
            // 如果用户未登录，跳转至登录页面
            return $this->render('login');
        }else if(!$session['team_id']){
            //如果用户已经登录但是未选择团队
            //找到当前用户的数据
            $user = User::find()->where(['id' => $session['user_id']])->one();
            //根据用户数据里的团队id，获取团队数据
            if($user){
                //获取用户加入团队的数据
                $team = Team::findBySql('SELECT * FROM user_team JOIN team ON(user_team.`team_id` =  team.`id`) WHERE user_team.`user_id` = '.$session['user_id'].'; ')->asArray()->all();
            }else{
                $team = [];
            }
            // 获取所有团队的数据
            $teamAll = Team::findBySql('SELECT team.*,user.`user_name` FROM team,USER WHERE user.`id`=team.`leader_id`;')->asArray()->all();

            // 渲染选择团队界面
            return $this->render('findTeam',array('team'=>json_encode($team),'teamAll'=>json_encode($teamAll)));
        }else{
            // 如果用户已经登录且选择了团队
            //找到当前用户的数据
            $user = User::find()->where(['id' => $session['user_id']])->asArray()->one();
            // 获取当前团队的数据
            $team = Team::find()->where(['id' => $session['team_id']])->one();
            //获取当前团队的项目数据
            $project_of_team = Project::findBySql('SELECT * FROM project join team_project ON(project.`id` = team_project.`proj_id`) where team_project.`team_id` = '.$session['team_id'].';')->asArray()->all();
            //获取当前用户在该团队的项目数据
            $project = Project::findBySql('SELECT * FROM project t1,user_project t2,team_project t3 WHERE t1.id=t2.proj_id AND t1.id=t3.proj_id AND t3.`team_id`='.$session['team_id'].' AND t2.`user_id`='.$session['user_id'].';')->asArray()->all();
            //获取当前团队的任务数据
            $task_of_team = Task::findBySql('SELECT * FROM task t1,project_task t2,team_project t3 WHERE t1.`id`=t2.`task_id` AND t2.`proj_id`=t3.`proj_id` AND t3.`team_id`='.$session['team_id'].';')->asArray()->all();
            //获取当前用户的任务数据
            $task = Task::findBySql('SELECT * FROM user_task t1,task t2,project_task t3,team_project t4 WHERE t1.`task_id`=t2.`id` AND t1.`user_id`='.$session['user_id'].' AND t2.`id`=t3.`task_id` AND t3.`proj_id`=t4.`proj_id` AND t4.`team_id`='.$session['team_id'].';')->asArray()->all();
            //获取任务的用户头像信息
            $user_image = User::findBySql('SELECT t2.user_id,t1.imagePath,t3.`id` FROM USER t1,user_task t2,task t3,project_task t4,team_project t5 WHERE t1.`id`=t2.`user_id` AND t2.`task_id`=t3.`id` AND t3.`id`=t4.`task_id` AND t4.`proj_id`=t5.`proj_id` AND t5.`team_id`='.$session['team_id'].';')->asArray()->all();;

            //找到当前用户的任务
            // $task = Task::findBySql('SELECT * FROM task where find_in_set('.$session['user_id'].', member_id)')->all();
            // $task = Task::findBySql('SELECT * FROM task where id in ('.$user->task_id.')')->asArray()->all();
            //获取当前用户的项目
            // $project = Project::findBySql('SELECT * FROM project where find_in_set('.$session['user_id'].', member_id)')->asArray()->all();
            

            // 获取当期团队的用户数据
            $users_of_team = User::findBySql('SELECT * FROM user join user_team ON(user.`id` = user_team.`user_id`) where user_team.`team_id` = '.$session['team_id'].';')->asArray()->all();
            //获取申请加入团队的用户信息
            $applyUser_id = Apply::findBySql('SELECT user_id FROM apply where team_id = '.$session['team_id'])->asArray()->all();
            if($applyUser_id){
                $userApply = User::findBySql('SELECT * FROM user where id in ('.arrayToString($applyUser_id).')')->asArray()->all();
            }else{
                $userApply = "";
            }
            
            // echo date('Y-m-d H:i');
            // 渲染主页
            return $this->render('index',array(
                'user'=>$user,
                'team'=>$team,
                'users_of_team'=>$users_of_team,
                'task'=>$task,
                'project'=>$project,
                'userApply'=>$userApply,
                'userImage'=>$user_image,
                'project_of_team'=>$project_of_team
            ));
        }
    }

    //登录界面
    public function actionLogin()
    {
        $this->layout = false;
        return $this->render('login');
    }

    // 此方法用于测试
    public function actionTest()
    {
        $this->layout = false;
        // $user_id = 1;
        // $user = User::find()->where(['id' => $user_id])->one();
        // $team_id = $user->team_id;
        // echo $team_id;

        // $response = array('code'=>'-1' , 'msg'=>'登录失败');
        // echo json_encode($response);

        // $text = $_POST['text'];
    
        // 删除
        // $arr = User::findOne($id);
        // $arr->delete();
        // 新增
        // $arr = new User();
        // $arr->userName = $text;
        // $arr->save();
        // 更新
        // $arr = User::findOne($id);
        // $arr->userName = "test2";
        // $arr->save();
        // $code = "100";
        // return $code;
        return $this->render('test');
    }
    //此方法用于测试
    public function actionTest2(){
        $this->layout = false;
        return $this->render('test2');
    }

    //搜索团队
    public function actionFindteam()
    {
        //关闭默认模板
        $this->layout = false;
        //打开session
        $session = Yii::$app->session;
        $session->open();
        //如果用户id存在
        if($session['user_id']){
            //找到当前用户的数据
            $user = User::find()->where(['id' => $session['user_id']])->one();
            //根据用户id，获取团队数据
            if($user){
                //获取用户加入团队的数据
                $team = Team::findBySql('SELECT * FROM user_team JOIN team ON(user_team.`team_id` =  team.`id`) WHERE user_team.`user_id` = '.$session['user_id'].'; ')->asArray()->all();
            }else{
                $team = [];
            }
            // 获取所有团队的数据
            $teamAll = Team::findBySql('SELECT team.*,user.`user_name` FROM team,USER WHERE user.`id`=team.`leader_id`;')->asArray()->all();
            // 渲染选择团队界面
            return $this->render('findTeam',array('team'=>json_encode($team),'teamAll'=>json_encode($teamAll)));
        }else{
            //如果用户id不存在，跳转到登录界面
            $this->layout = false;
            return $this->render('login');
        }
        
    }

    //查看主页模板
    public function actionMain()
    {
        // echo $this->userLogin;
        // if( $this->userLogin ){
        //     echo 123;
        //     $this->layout = 'main';
        // }
        return $this->render('main');
    }

    //工作台
    public function actionDashboard()
    {
        $session = Yii::$app->session;
        $session->open();
        if(!$session['user_id']){
            return $this->render('login');
        }else if(!$session['team_id']){
            return $this->render('findTeam');
        }else{
            return $this->render('dashboard');
        }
    }

    public function actionTeam()
    {
        return $this->render('team');
    }

    public function actionCreateteam(){
        $this->layout = false;
        return $this->render('createTeam');
    }

    public function actionAdddata(){
        $arr = new Test();
        $arr->account = "12";
        $arr->save();
    }

    // 邀请成员加入团队
    public function actionSet_invite_user(){
        $session = Yii::$app->session;
        $session->open();
        $team_id = $session['team_id'];
        $user_accout = $_POST('user_accout');
        $user_id = User::findBySql("SELECT * FROM USER WHERE account = '".$user_accout."';")->one();//结果是一个Object类型，也可以理解为是一行数据

        $arr = new Apply();
        $arr->user_id = $user_id->id;
        $arr->team_id = $team_id;
        $arr->type = 2;
        $arr->save();  
    }

}



