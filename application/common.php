<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function rank($data){
	$rank=config('rank');
	if($data<20){
		return $rank[0];
	}
	elseif(20<=$data && $data<50){
		return $rank[1];
	}elseif(50<=$data && $data<100){
		return $rank[2];
	}elseif(100<=$data && $data<200){
		return $rank[3];
	}elseif(200<=$data && $data<500){
		return $rank[4];
	}elseif(500<=$data){
		return $rank[5];
	}
}