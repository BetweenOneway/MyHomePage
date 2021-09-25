<?php
namespace Note\Controller;
use Think\Controller;

class IndexController extends Controller {
    //判断是否登录
    public function _initialize()
    {
        $admin_id = session('admin_id');
        $admin_username = session('admin_username');
        if(!isset($admin_id) || !isset($admin_username))
        {
            $this->redirect('Admin/Public/login', array(),1,'你尚未登录，即将跳转到登录页面。。。');
        }
    }

    public function index(){
        $this->display();
    }
    
    public function saveFile()
    {
        $fileName =I('fileName');
        $fileContent =I('fileContent');
        $modifyDate =I('modifyDate');

        $res['status']=0;
        $res['message']="收到存储文件内容";

        $this->ajaxReturn($res);
    }
    
    public function loadDirFle()
    {
        //以下两种方式都市可以的
        $data = [
            ['id' => 0,'parent' => '#','text' => '父级','state' => ['opened' => 'true']],
            ['id' => 1,'parent' => 0,'text' => '子级','state' => ['opened' => 'true']]
            ];
        $arr=array(array("id"=>1,"text"=>"Root node","children"=>array(array("id"=>2,"text"=>"Child node 1"),array("id"=>3,"text"=>"Child node 2"))));    
        //$arr=array("0"=>array("id"=>"0","parent"=>"#","text"=>"Root node"),"1"=>array("id"=>"2","parent"=>"0","text"=>"Child node 1"),"2"=>array("id"=>"3","parent"=>"0","text"=>"Child node 2"));
        //$this->ajaxReturn(json_encode($data));
        //$this->ajaxReturn(json_encode($data,JSON_FORCE_OBJECT));
        //如果ajaxreturn 里面的数组是二维的 返回的json是json数组，如果是一维的才是json
        $this->ajaxReturn($arr);
    }
}