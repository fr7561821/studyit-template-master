// 如果没有cookie信息就跳转到login

if(!$.cookie("PHPSESSID") && location.pathname != "/login"){
	console.log(123);
	location.href = '/login';
} 