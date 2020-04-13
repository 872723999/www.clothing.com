<?php
namespace app\home\controller;
use think\facade\Request;
use think\Controller;
use app\home\model\CltNewTutor;
use app\home\model\MajorType;
use app\home\model\ServiceProcess;
use app\home\model\ProductProducts;
// 首页控制器
class Index extends Common{

     public function initialize()
    {
        parent::initialize();
    }

    /**
     * @Author    XZJ
     * @DateTime  2020-04-10
     * @copyright [copyright]
     * @version   [version]
     * @param     [param]
     * @return    [type]      [description]
     */
    public  function index(){
    		echo "首页213";

	 }


	


}