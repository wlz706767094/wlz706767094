<?php
namespace app\index\controller;
use app\common\controller\Base;
use app\common\model\UserModel;
use think\facade\Validate;
// use app\common\validate\User;
class Test extends Base
{
	public function info(){
		$this->assign('title','thinkphp');
		return $this->view->fetch();
	}
	public function get(){
		return UserModel::all();
	}
	public function savetime(){
		$data=[
			'name'=>'frank',
			'email'=>'frank@126.com',
			'mobile'=>'13698754612',
			'password'=>sha1('123456')
		];
		$res=UserModel::create($data);
		dump($res);
	}
	public function validate1(){
		$rules='app\common\validate\User';
		$data=[
			'name'=>'frank',
			'email'=>'fank@126.com',
			'mobile'=>'13256487596',
			'password'=>'123456',
			'password_confirm'=>'123456'
		];
		 $rs=$this->validate($data,$rules);
		 dump($rs);

	}
	public function pass(){
		$data=[
			'name'=>'fnk',
			'email'=>'fnk@126.com',
			'mobile'=>'13289487596',
			'password'=>'123456',
			'password_confirm'=>'123456'
		];
		$res=UserModel::create($data);
		dump($res);
	}
}