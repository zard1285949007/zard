<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Check
{
    public function index()
    {
      return $this->fetch();
    }
    public function mv(){
        $search=request()->get('search');
        if($search!==""){
            if(is_numeric($search)){
                $data=model('mv')->where(['type'=>intval($search)])->order('id')->paginate(20,false,['query'=>request()->get()]);
            }else{
                $data=model('mv')->where(['japanese_name|chinese_name'=>['like',"%{$search}%"]])->order('id')->paginate(20,false,['query'=>request()->get()]);
            }
            $this->assign('search',$search);
        }else{
            $data=model('mv')->order('id')->paginate(20,false,['query'=>request()->get()]);
            $this->assign('search',"");
        }
        
        $this->assign('data',$data);
        return $this->fetch(); 	     
    }
    public function music(){
        $judge=array();
        $select=trim(request()->get('select'));
        if(!empty($select)){
            $judge['japanese_name|chinese_name']=["like","%{$select}%"];
        }
    	$data=model('music')->where($judge)->order('issue_time asc')->paginate();
        $this->assign('select',$select);
    	$this->assign('data',$data);
    	return $this->fetch();
    }
    public function picture(){
        $get=request()->get();
        $first=0;
        if(array_key_exists('first',$get)){
            $first=$get['first'];
        }

        $picture_first=config('picture_first');
        $picture_second=config('picture_second')[$first];
        
        $this->assign('first',$first);
        $this->assign('picture_first',$picture_first);
        $this->assign('picture_second',$picture_second);
    	return $this->fetch();
    }
    
    public function system_email(){
    	return $this->fetch();
    }
    public function system_message(){
    	return $this->fetch();
    }
    public function blank(){
    	return $this->fetch();
    }

} 