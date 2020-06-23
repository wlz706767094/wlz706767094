<?php
namespace app\common\model;
use think\Model;
class UserModel extends Model
{
	protected $table='user';
	protected $pk='id';
	protected $autoWriteTimestamp=true;
	protected $createTime='create_time';
	protected $updateTime='update_time';
	protected $dateFormat='Y年m月d日 H:i:s';
	public function getStatusAttr($value){
		$status=['1'=>'启用','0'=>'禁用'];
		return $status[$value];
	}
	public function getIsAdminAttr($value){
		$is_admin=['1'=>'管理员','0'=>'注册用户'];
		return $is_admin[$value];
	}
	public function setPasswordAttr($value){
		return sha1($value);
	}
}