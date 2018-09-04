<?php
namespace app\index\controller;
use think\Controller;
class Sign extends Controller
{
	public function index(){
		$request=request()->isPost();
		if($request){
			$is_sign=session('is_sign');
			if($is_sign==1){
				return 0;
			}elseif($is_sign==0){
				$data_user=array();
				$quanshui=session('quanshui')+2;
				session('quanshui',$quanshui);				
				$data_user['quanshui']=$quanshui;
				model('users')->where(['openid'=>session('openid')])->update($data_user);

				$data_sign=array();
				$data_sign['openid']=session('openid');
				$data_sign['add_time']=time();
				model('sign')->save($data_sign);
				session('is_sign',1);
				return 1;
			}
		}else{
			return 0;
		}
		
	}
	public function text(){
		$access_token = "";
    $now = time();

    if(session("baidu_tts")){
        $access_token=session("baidu_tts");
        print_r("session");
    }else {
        if (file_exists("./baidu_tts.txt")) {


            //先打开文件读取内容,如果文件不存在,读取内容为false
            $baidu_message = file_get_contents("./baidu_tts.txt");


            //获取文件中的修改时间,时间期限和access_token,如果文件不存在,将返回false

            $baidu_message = json_decode($baidu_message, true);
            $update_time = $baidu_message['update_time'];
            $expire_time = $baidu_message['expires_in'];
            $expire_judge = $expire_time + $update_time - $now - 24 * 60 * 60;
            $access_token = $baidu_message['access_token'];
            print_r("read");

            //如果距离上次修改日期超过过期时间的前一天,则重新将access_token写进文件.
            if ($expire_judge < 0) {
                //通过api_key和secret_key来获取access_token;(去百度申请应用返回的密钥)
                //  $api_key = "VLTtLyXa7dqpYSVHLDbEy5ea";
                //  $secret_key = "94ec74cae7f31ca27e8e0595421fcc4a";
                $api_key = "CQy5bMg4Vq9cWlAbfvRvpoht";
                $secret_key = "BkIYzUzK2wGuUmG5eGHv63tBZ6TBbEpa";


                //获取access_token
                $url_first = "https://openapi.baidu.com/oauth/2.0/token?grant_type=client_credentials&client_id=" . $api_key .
                    "&client_secret=" . $secret_key;
                $curlobj = curl_init();
                curl_setopt($curlobj, CURLOPT_URL, $url_first);
                curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);

                date_default_timezone_set('PRC');
                curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, 0);

                $output = curl_exec($curlobj);
                curl_close($curlobj);

                //将相关信息写进文件并且赋值给$access_token
                $output = json_decode($output, true);
                $output['update_time'] = $now;
                $output = json_encode($output);
                file_put_contents("./baidu_tts.txt",$output);

                $access_token = json_decode($output, true)['access_token'];
            }
            print_r("write");

        }else{
        	print_r("no_file");
            $api_key = "CQy5bMg4Vq9cWlAbfvRvpoht";
            $secret_key = "BkIYzUzK2wGuUmG5eGHv63tBZ6TBbEpa";


            //获取access_token
            $url_first = "https://openapi.baidu.com/oauth/2.0/token?grant_type=client_credentials&client_id=" . $api_key .
                "&client_secret=" . $secret_key;
            $curlobj = curl_init();
            curl_setopt($curlobj, CURLOPT_URL, $url_first);
            curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);

            date_default_timezone_set('PRC');
            curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, 0);

            $output = curl_exec($curlobj);
            curl_close($curlobj);

            //将相关信息写进文件并且赋值给$access_token
            $output = json_decode($output, true);
            $output['update_time'] = $now;
            $output = json_encode($output);
            file_put_contents("./baidu_tts.txt",$output);

            $access_token = json_decode($output, true)['access_token'];

        }
        session("baidu_tts", $access_token);
    }
    //拼接请求的地址及其内容
    $url_second="http://tsn.baidu.com/text2audio?lan=zh&ctp=1&cuid=abcdexx&tok=".$access_token."&vol=9&per=0&spd=3&pit=5&tex=";

    return $url_second;
	}
}