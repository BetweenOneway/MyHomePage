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
            $this->redirect('Admin/Public/login', 5,'你尚未登录，跳转到登录页面。。。');
        }
    }

    public function index(){
        $this->display();
    }
}