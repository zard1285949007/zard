<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
      $this->assign("audio",1);
      return $this->fetch();
    }
    public function call_to_us(){
    	return $this->fetch();	
    }
     public function suggestion(){
    	return $this->fetch();	
    }
    public function friendly_link(){
    	return $this->fetch();	
    }
    public function logout(){
      session(null);
      $this->success("退出成功",url('index/index'));
    }
	public function test()
	{
		//$test = file_get_contents($_SERVER['DOCUMENT_ROOT']."/test.txt");
		//print_r($test);
		//print_r($_SERVER['DOCUMENT_ROOT']);
		$receiveData = $_REQUEST;
		file_put_contents($_SERVER['DOCUMENT_ROOT']."/test.txt","[".date('Y-m-d H:i:s')."]".json_encode($receiveData)."\n",FILE_APPEND);
		exit;
		
		$curlobjUrl = $receiveData['callback_url']."&source=test&conv_time=1529487314000&event_type=0&signature=".$receiveData['sign'];
		$curlobj=curl_init();
		curl_setopt($curlobj,CURLOPT_URL,$curlobjUrl);
		curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curlobj, CURLOPT_HEADER, false);
		$output=curl_exec($curlobj);
		curl_close($curlobj);
		file_put_contents($_SERVER['DOCUMENT_ROOT']."/test.txt","[".date('Y-m-d H:i:s')."]".json_encode($output)."\n",FILE_APPEND);
	}
	
}
