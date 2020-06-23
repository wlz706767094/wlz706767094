<?php
namespace app\index\controller;

use app\common\controller\Base;
class Index extends Base
{
    public function index()
    {
    	$this->assign('title','科技热点');
    	return $this->view->fetch();
    }
}
