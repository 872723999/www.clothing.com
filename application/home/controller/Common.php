<?php
namespace app\home\controller;
use think\facade\Request;
use think\Controller;

class Common extends Controller{

    public static $name = '';
    /**
     * @Author    XZJ
     * @DateTime  2020-04-10
     * @param      int        userId   用户id
     * @return    [type]      code -1 未登录  2成功  3 
     */
    public function initialize()
    {
        $request = Request::param();
        if(empty($request["userId"])){
                self::returnJson(-1,'未登录，请先登陆！');
        }
        // 查询用户是否存在
    }

    /**
     * [json 统一返回格式]
     * @param  [type] $code    [  2 : 成功 ,-1 :  操作失败（申请，预约，咨询,评价，编辑,缺少参数......）]
     * @param  string $message [成功 ： success ,失败 :  （申请失败，预约失败,缺少参数......）]
     * @param  array  $data    [array()]
     * @return [type]          [json]
     */
    public static  function returnJson($code, $message = '', $data = array()) {
        if(!is_numeric($code)) {
            return '';
        }
        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );
        echo json_encode($result);
        exit;
    }

    /**
     * [is_judge 判断是否未为空 或假]
     * @param  [type]  $res [description]
     * @return boolean      [description]
     */
     public  static function is_judge($res){
        if (empty($res)) {
            return false;
        }else{
            return true;
        }
     }
     

   }
