<?php
/**
 * Created by PhpStorm.
 * User: fang
 * Date: 2018/3/7
 * Time: 8:41
 */

namespace app\admin\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index(){
        return view();
    }

    //注册界面
    public function register_admin(){
        return view('register_admin');
    }
    //注册信息写入数据库
    public function register(){
        if (input('admin_password1')==input('admin_password2')){
            $admin_password=input('admin_password2');
            $admin_name=input('admin_name');
            $phone=input('phone');
            $data=['admin_name'=>$admin_name,'admin_password'=>$admin_password,'phone'=>$phone];
            if(Db::table('admin')->insert($data)){
                echo '注册成功';
            }
        }
        else return'密码不一致';
        //dump(input());
    }
    //登录成功 并跳转首页内容
    public function login(){
        $res=Db::table('admin')->where('admin_name','=',input('admin_name'))->select();
        if (!empty($res)){
            if (input('admin_password')==$res[0]['admin_password']){
                $this->success('登录成功','Index/home');
            }
            else
                $this->error('登录失败','Index/index');
        }
        else
            $this->error('登录失败','Index/index');
    }
    //主页
    public function home(){
        return view();
    }
    //添加商品页面
    public function addgoods(){
        return view();
    }
    //上传商品图片
    public function uplaod_imge(){
        return view();
    }
}