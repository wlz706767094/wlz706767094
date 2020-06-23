<?php
namespace app\common\controller;

use think\Controller;
use think\facade\Session;
class Base extends Controller
{
	// 初始化方法，是在所有控制器方法前执行
    protected function initialize()
    {}
    protected function logined(){
    	if(Session::has('user_name')){
    		$this->error('您已经登录过了，请不要重复操作','index/index/index');
    	}
    }
}