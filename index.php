<?php 

	//极简模式的控制器

	//$_SERVER 可以用来获取服务器相关的所有的信息

	//$_SERVER 中有键 "PATH_INFO" 对应当前文件后敲的路径
	// var_dump($_SERVER);

		
	//PATH_INFO中的内容就是 下面的连接中的  /模块名/文件名
	//http://域名/index.php/模块名/文件名

	//当使用下面两种形式访问的时候因为没有了 /模块名/文件名
	//所以PATH_INFO就不存在了，我们就让他默认的去访问主页
	//http://域名/
	//http://域名/index.php
	

	$path = "";

	if(array_key_exists("PATH_INFO", $_SERVER)){
		$path = $_SERVER["PATH_INFO"];
	}

	//$arr 就是一个数组，数组中的第一个元素表示是模块名
	// 							 第二个元素表示文件名

	//t    teacher
	//l    list

	//如果$path（PATH_INFO）不存在 就是什么路径都没有传的情况，默认找到主页并返回
	if(!$path){
		//直接就让$path = 主页的路径
		$path = "views/dashboard/index.html";
	}else{
		$path = substr($path, 1);
		$arr = explode("/", $path);
		//当只传一个文件名，不传模块名的时候，做一个默认的目录的处理直接去dashboard下面找文件
		if(count($arr) >= 2){
			$path = "views/".$arr[0]."/".$arr[1].".html";
		}else{
			$path = "views/dashboard/".$arr[0].".html";
		}
		
	}

	include $path;

 ?>