<?php
namespace app\home\controller;
use think\facade\Request;
use think\Controller;
use app\home\model\CltNewTutor;
// 六位一体导师控制器
class TutorController extends Common{
	

    public function initialize()
    {
        parent::initialize();
      
    }


    /**
     * 服务团队首页
     * @Author    XZJ
     * @DateTime  2020-04-10
     * @copyright [copyright]
     * @version   [version]
     * @param     [param]
     * @return    [type]      [description]
     */
    public function index(){
      
    }

   
    /**
     * 导师详情
     * @Author    XZJ
     * @DateTime  2020-04-10
     * @copyright [copyright]
     * @version   [version]
     * @param     [param]
     * @return    [type]      [description]
     */
    public function tutor_detail(){
        echo "导师见详情";
    	
    }

    // 更多
   public function more_tutor(){
   	    $request = input('param.');
    	 $name = trim($request["name"]);
    	 $school = trim($request["school"]);
    	 $major = trim($request["major"]);
    	 $type = trim($request["type"]);
    	  if(!empty($name)){
    	 	 $where[] =  array("name|title",'like',"%".$name."%");
    	 }
    	  if(!empty($school)){
    	 	 $where[] =  array("school",'like',"%".$school."%");
    	 }
    	  if(!empty($major)){
    	 	 $where[] =  array("major",'like',"%".$major."%");
    	 }
    	 //  if(!empty($type)){
    	 // 	 $where[] =  array("type",'=',$type);
    	 // }

     	 $where[] =  array("country_id",'like',"%".$this->state."%");
		   $where[] = array("phase",'like',"%".$this->_degree."%");
		   $where[] = array("open",'=',"1");
       $where[] = array("type",'=',3);

       $page = $request['page'] ? $request['page'] : 1;
       $pageSize = $request['limit'] ? $request['limit'] : 10;
       $data = CltNewTutor::field("id,name,title,school,major,adept_field,type,personal_experience,standard_grade") 
              ->where($where)
              ->paginate(array('list_rows' => $pageSize, 'page' => $page))
              ->toArray();
      $tutorType =  array(1=>'全程咨询导师',2=>'主申请导师',3=>'海外名校导师',4=>'资深流程导师',5=>'外籍文笔导师',6=>'专家督导导师');
      foreach ($data['data'] as $key => $value) {
        $data["data"][$key]['type'] = $tutorType[$value["type"]];
      }

       $data["tutorType"] =  array(array("id"=>1,"name"=>'全程咨询导师'),array("id"=>2,"name"=>'主申请导师'),array("id"=>3,"name"=>'海外名校导师'),array("id"=>4,"name"=>'资深流程导师'),array("id"=>5,"name"=>'外籍文笔导师'),array("id"=>6,"name"=>'专家督导导师'));

       $this->returnJson(1,'',$data);
   }

}