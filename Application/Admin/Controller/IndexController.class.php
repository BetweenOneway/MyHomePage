<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->display("Index:index");
    }

    public function changePassword()
    {
        if(IS_POST)
        {
            $res['status']=0;
            $res['message']="调用changePassword";
            $this->ajaxReturn($res);
        }
        else
        {
            $this->display();
        }
    }
}

?>