<?php
namespace app\index\controller;
use think\Controller;
class Music extends Controller
{
    public function index()
    {
      $nickname=trim(request()->get('nickname'));
      $map=array();//搜索条件
      $value=request()->get('value');
      $data=array();
     
      if($value){
        if($value==0){
          $data=model('music')->order('issue_time asc')->paginate(20,false,['query'=>request()->get()]);
        }elseif($value==1){
          $data=model('music')->order('chinese_name asc')->paginate(20,false,['query'=>request()->get()]);
          //将中文和日文名调换
          $between="";
          foreach($data as $k=>$v){
            $between=$v['japanese_name'];
            $data[$k]['japanese_name']=$data[$k]['chinese_name'];
            $data[$k]['chinese_name']=$between;
          }
        }elseif($value==2){
          $album=config('album');
          foreach($album as $k=>$v){
            $data[$k]=model('music')->where("find_in_set({$k},album)")->order('id asc')->select();
          }
          foreach($data as $k =>$v){
            foreach($v as $k_child => $v_child){
            $data[$k][$k_child]['sole_name']=$album[$k]['name'];
            $data[$k][$k_child]['sole_time']=$album[$k]['time'];
            $data[$k][$k_child]['src']="__STATIC__/music/".$v_child['id'].".mp3";
            }
          }

          $this->assign('data',$data);
          $this->assign('nickname','');
          $this->assign('value',$value);
          // echo '<pre>';
          // print_r($data);exit;
          return $this->fetch('index_sole');
        }elseif($value==3){
          $data=model('music')->order('quanshui desc')->paginate(20,false,['query'=>request()->get()]);
        }elseif($value==4){
          //单曲的显示 
          $sole_singer=config('sigle');
          foreach($sole_singer as $k=>$v){
            $now_num=$k+1;
            $map['is_sole']=$now_num;
             
            if($now_num==38){
              $whereor['id']=75;
              $data[$k]=model('music')->where($map)->whereOr($whereor)->order('id asc')->select();
            }
            elseif($now_num==43){
              $where['id']=['in',[136,143,152]];
              $data[$k]=model('music')->where($where)->order('id asc')->select();
            }
            elseif($now_num==44){
              $whereor['id']=2;
              $data[$k]=model('music')->where($map)->whereOr($whereor)->order('id asc')->select();
            }
            elseif($now_num==45){
              $where['id']=['in',[9,147]];
              $data[$k]=model('music')->where($where)->order('id asc')->select();
            }
            else{
              $data[$k]=model('music')->where($map)->order('id asc')->select();
            }
          }

          foreach($data as $k =>$v){
            foreach($v as $k_child => $v_child){
            $data[$k][$k_child]['sole_name']=$sole_singer[$k]['name'];
            $data[$k][$k_child]['sole_time']=$sole_singer[$k]['time'];
            $data[$k][$k_child]['src']="__STATIC__/music/".$v_child['id'].".mp3";
            }
          }

          $this->assign('data',$data);
          $this->assign('nickname','');
          $this->assign('value',$value);
          // echo '<pre>';
          // print_r($data);exit;
          return $this->fetch('index_sole');
        }else{
          $data=model('music')->order('issue_time asc')->paginate(20,false,['query'=>request()->get()]);
        }
        $this->assign('nickname','');
        $this->assign('value',$value);
      }else{  
        if(empty($nickname)){
          $data=model('music')->order('issue_time asc')->paginate(20,false,['query'=>request()->get()]);
          $this->assign('nickname','');
        }else{
          $map['japanese_name|chinese_name']=['like','%'.$nickname.'%'];
          $data=model('music')->where($map)->order('issue_time asc')->paginate(20,false,['query'=>request()->get()]);
          $this->assign('nickname',$nickname);
        }
        $this->assign('value',0);
      }       

      foreach($data as $k =>$v){
        // $v['src']="__STATIC__/background.mp3";
      	$v['src']="__STATIC__/music/".$v['id'].".mp3";
      }
      $this->assign('data',$data);
      return $this->fetch();
      
      
    }

    public function detail(){
      if(request()->isget()){
        $request=request()->get();
        if(!isset($request['id'])){exit;}

        if(!isset($request['type'])){
          $type=0;
        }else{
          $type=$request['type'];
        }
        
        $before=model('music')->where(['id'=>$request['id']])->find();

        if($type==1){
          $message=model('music')->where(['id'=>['lt',$request['id']],'issue_time'=>['elt',$before->issue_time]])->order('id desc')->find();
          if(empty($message)){
            $message=model('music')->order('issue_time desc')->find();
          }
        }elseif($type==2){
          $message=model('music')->where(['id'=>['gt',$request['id']],'issue_time'=>['egt',$before->issue_time]])->find();
          if(empty($message)){
            $message=model('music')->order('issue_time asc')->find();
          }
        }else{
          $message=$before;
        }


        $lyric_dir=ROOT_PATH.'public'.DS.'static'.DS.'lyric'.DS.$message->id.'.txt';
        $fopen=fopen($lyric_dir,'r') or die('not found');
        $lyric="";
        while(!feof($fopen)){
          $lyric.=fgets($fopen).'<br/>';
        }
        fclose($fopen);

        

        $music_src="__STATIC__/music/".$message->id.".mp3";
        // 获取专辑地址
        $album=$message->album;
        $album_src="";
        if($album!==""){
          $album=str_replace("，",",",$album);
          $album=intval(explode(",",$album)[0]);
          $album_src=config('album')[$album]['url'];
        }else{
          $album_src="__STATIC__/image/14.jpg";
        }

        $this->assign('music_src',$music_src);
        $this->assign('message',$message);
        $this->assign('album_src',$album_src);
        $this->assign('lyric',$lyric);
        return $this->fetch();
      }
      
    }
  
}
