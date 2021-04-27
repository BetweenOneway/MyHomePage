<?php
namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller
{
    public function _initialize()
    {
        $admin_id = session('admin_id');
        $admin_username = session('admin_username');
        if(!isset($admin_id) || !isset($admin_username))
        {
            $this->direct("{:U('Public/login')}");
        }
    }
}
?>