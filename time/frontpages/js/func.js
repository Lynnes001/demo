function show_cur_times(){
	var date_time = new Date();//获取当前日期
	var week; //定义星期

	switch (date_time.getDay()){
		case 1: week="星期一"; break;
		case 2: week="星期二"; break;
		case 3: week="星期三"; break;
		case 4: week="星期四"; break;
		case 5: week="星期五"; break;
		case 6: week="星期六"; break;
		default:week="星期天"; break;
 	}
 
	var year = date_time.getFullYear(); //年
    	if(year<1000){
		year="0"+year;
	}

	var month = date_time.getMonth()+1; //月
    	if(month<10){
		month="0"+month;
	}

	var day = date_time.getDate(); //日
    	if(day<10){
 		day="0"+day;
	}

	var hours = date_time.getHours(); //时
 
	var minutes =date_time.getMinutes(); //分
	    if(minutes<10){
	 	minutes="0"+minutes;
	}

	var seconds=date_time.getSeconds(); //秒
	    if(seconds<10){
	 	seconds="0"+seconds;
	}
	var welcome;
	if (hours<=5&&hours>0)
		{welcome='凌晨,'}
	else if (hours>5&&hours<=8)
		{welcome='早安,'}
	else if (hours>8&&hours<=10)
		{welcome='上午好,'}
	else if (hours>10&&hours<=13)
		{welcome='中午好,'}
	else if (hours>13&&hours<=18)
		{welcome='下午好,'}
	else if (hours>18&&hours<=21)
		{welcome='晚上好,'}
	else if (hours>21&&hours<=24)
		{welcome='夜深了,'}


	var date_str = year+"年"+month+"月"+day+"日 "+hours+":"+minutes+":"+seconds+" "+week;
	var time_str = hours+":"+minutes;
	document.getElementById("showtimes").innerHTML = time_str;
	document.getElementById("welcome").innerHTML = welcome;
	}


