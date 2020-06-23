<?php
namespace app\index\controller;
use app\common\controller\Base;
use app\common\model\UserModel;
use app\common\validate\User as UserValidate;
use think\facade\Request;
use think\facade\Session;
class User extends Base
{
	public function register(){
		$this->view->assign('title','用户注册');
		return $this->view->fetch();
	}
	public function insert(){
		if(Request::isAjax()){
			//获取数据
			$data=Request::post();
			//进行校验
			$rules=new UserValidate;
			$rs=$this->validate($data,$rules->rule_reg);
			if($rs===true){
				$data=Request::except('password-confirm');
				$res=UserModel::create($data);
				if($res){
					return ['status'=>1,'message'=>'注册成功'];
				}else{
					return ['status'=>-1,'message'=>'注册失败'];
				}
			}else{
				return ['status'=>0,'message'=>'验证失败，请检查：'.$rs];
			}
		}
	}
	public function login(){
		$this->logined();
		$this->assign('title','用户登录');
		return $this->view->fetch();
	}
	public function loginCheck(){
		if(Request::isAjax()){
			$data= Request::post();
			$rules=new UserValidate;
			$rs=$this->validate($data,$rules->rule_login);
			if($rs!==true){
				return ['status'=>0,'message'=>'登录失败,账号或者密码错误'.$rs];
			}else{
				$res=UserModel::get(function($query) use($data){
					$query->where('name',$data['name'])->where('password',sha1($data['password']));
				});
				if(null==$res){
					return ['status'=>-1,'message'=>'登录失败'];
				}else{
					Session::set('id',$res->id);
					Session::set('user_name',$res->name);
					return ['status'=>1,'message'=>'登录成功'];
				}
			}
		}
	}
	public function logout(){
		if(Session::has('user_name')){
			Session::delete('user_name');
			$this->success('退出成功','index/index/index');
		}
	}
}