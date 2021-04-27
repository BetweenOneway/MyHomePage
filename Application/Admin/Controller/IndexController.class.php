<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends BaseController
{
    public function index()
    {
        $this->display("Index:index");
    }

    public function changePassword()
    {
        if(IS_POST)
        {
            $old_password=I('old_password','','md5');
            $new_password=I('new_password','','md5');
            $map['id']=session('admin_id');
            $admin=M('admin')->where($map)->find();
            
            if(false != $admin && NULL != $admin)
            {
                if($old_password == $admin['password'])
                {
                    $result=M('admin')->where($map)->setField('password',$new_password);
                    if(false == $result)
                    {
                        $res['status']=-1;
                        $res['message']="更改失败";
                        $this->ajaxReturn($res);
                    }
                    else
                    {
                        $res['status']=0;
                        $res['message']="更改成功";
                        $this->ajaxReturn($res);
                    }
                }
            }
        }
        else
        {
            $this->display("Index:changePassword");
        }
    }
}

?>