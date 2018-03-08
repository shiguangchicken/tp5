<?php
/**
 * Created by PhpStorm.
 * User: fang
 * Date: 2018/3/6
 * Time: 7:58
 */

namespace app\index\controller;

use think\Request;
class User
{
    public function index(){
        return "User";
    }
    public function test(){
        $request=Request::instance();
        echo $request->domain()."<hr>";
    }
}