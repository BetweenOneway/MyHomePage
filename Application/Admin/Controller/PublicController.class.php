<?php

namespace Admin\Controller;
use Think\Controller;

//避免界面乱码
header('Content-Type: text/html; charset=utf-8');

class PublicController extends Controller
{
    public function login()
    {
        $this->display();
    }

    public function checkLogin()
    {
        $code =I('code');
        $verify=$this->checkCode($code);
        if(!$verify)
        {
            $res['status']=0;
            $res['message']="验证码错误！";
        }
        else
        {
            //校验用户名密码
            $username=I("username"," ","trim");
            $password=I("password"," ","md5");
            $return = $this->checkPassword($username,$password);
            if(!$return)
            {
                $res['status']=0;
                $res['message']="用户名或密码错误！";
            }
            else
            {
                //get_client_ip();
                $data = array(
                    "loginip" =>get_client_ip(),
                    "logintime" =>date("Y-m-d H:i:s"),
                );
                M('admin')->save($data);
                session('admin_id',$return["id"]);
                session('admin_username',$return["username"]);
                $res['status']=1;
                $res['message']="登录成功！";
            }
        }
        $this->ajaxReturn($res);
    }
    
    //校验验证码
    public function checkCode($code)
    {
        $verify = new \Think\Verify();
        return $verify->check($code);
    }

    public function checkPassword($username,$password)
    {
        $map['username']=$username;
        $admin = M('admin')->where($map)->find();
        if($admin['password']==$password)
        {
            return $admin;
        }
        else
        {
            return false;
        }
    }

    public function logout()
    {
        session('admin_id',null);
        session('admin_username',null);
        $this->redirect("login");
    }
    //生成验证码
    public function verify()
    {
        $config = array(
            'fontSize'=>15,
            'length'=>4,
            'useNoise'=>false,
            'imageW'=>108,
            'imageH'=>42,
            'codeSet'=>'0123456789',
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
}

?>