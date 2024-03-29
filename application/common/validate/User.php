<?php
namespace app\common\validate;
use think\Validate;
/*
user用户信息验证器
 */
class User extends Validate
{
	protected $rule_reg=[
		'name|用户名'=>'chsAlphaNum|length:5,12|require',
		'email|邮箱'=>'require|email|unique:user',
		'mobile|联系方式'=>'require|mobile|unique:user',
		'password|密码'=>'require|length:6,16|alphaNum|confirm'
	];
	protected $rule_login=[
		'name|用户名'=>'chsAlphaNum|length:5,12|require',
		'password|密码'=>'require|length:6,16|alphaNum',
    	'captcha|验证码'=>'require|captcha'
	];
	public function __get($value){
		if(isset($this->$value)){
			return $this->$value;
		}else{
			return null;
		}
		
	}
}