function click_text(self, timeid){
// 这里缺少一个按钮变色的功能
	document.getElementById("showTime").innerHTML=self.value;
	document.getElementById("time").value=self.value;
	document.getElementById("timeid").value=timeid;
}

//使按钮无效化函数并改变样式
function disabled_btn(week, day, num){
	// var ele = document.getElementById("time"+week+day+"_pick"+num);
	// ele.disabled=true;
	// ele.style.borderStyle="none";
	document.getElementById("time"+week+day+"_pick"+num).disabled=true;
	document.getElementById("time"+week+day+"_pick"+num).style.borderStyle="none";
}

function upper(i){
    var week = new Array()
    week[0] = "一"
    week[1] = "二"
    week[2] = "三"
    week[3] = "四"
    week[4] = "五"
    week[5] = "六"
    week[6] = "日"
	return week[i]
}
	
	//点击日期时触发的函数
function clicked(self){
	
	//点击日期后变色		
	for(var i=0;i<14;i++){
		document.getElementById("date"+i+"").style.backgroundColor='lightblue';
	}
	self.style.backgroundColor='lightcyan';
	
	//隐藏所有隐藏块
	document.getElementById('hidden1_case1').style.display='none';
	document.getElementById('hidden1_case2').style.display='none';
	document.getElementById('hidden1_case3').style.display='none';
	document.getElementById('hidden1_case4').style.display='none';
	document.getElementById('hidden1_case5').style.display='none';
	document.getElementById('hidden1_case6').style.display='none';
	document.getElementById('hidden1_case7').style.display='none';
	
	document.getElementById('hidden2_case1').style.display='none';
	document.getElementById('hidden2_case2').style.display='none';
	document.getElementById('hidden2_case3').style.display='none';
	document.getElementById('hidden2_case4').style.display='none';
	document.getElementById('hidden2_case5').style.display='none';
	document.getElementById('hidden2_case6').style.display='none';
	document.getElementById('hidden2_case7').style.display='none';
		

	
	//将点击到的日期和时间显示出来
	var month = moment().month()+1;
	var year = moment().year();
	var day = self.innerHTML;
	//用于跨月份和跨年情况判断
	if(day <= moment().date())
		month++;
	if(moment().add(14, "days").year()>moment().year())
		year++;
	
	document.getElementById("showDate").innerHTML=month+"月"+self.innerHTML+"日";
	//将日期信息提交到隐藏表单中
	document.getElementById("date_p").value=moment().year()+'-'+month+'-'+self.innerHTML;

	//计算点击的星期数 day of week
	// var judge1 = moment(moment().year()+'-'+month+'-'+self.innerHTML).day();
	var judge1 = new Date(moment().year()+'/'+month+'/'+self.innerHTML).getDay();
	//计算点击的时间 格式YYYY-MM-DD
	var clicked_time = year+"-"+month+"-"+day;
	
	//计算下一周的当前星期的日期
	var cut_time = moment().add(7, "days").format("YYYY-MM-DD");
	
	var c=new Date(clicked_time.replace(/-/g,"/"));
	var cutline=new Date(cut_time.replace(/-/g,"/"));
	
	if(c <= cutline){
		//第一周
		if(judge1==1)
			document.getElementById('hidden1_case1').style.display='block';
		if(judge1==2)
			document.getElementById('hidden1_case2').style.display='block';
		if(judge1==3)
			document.getElementById('hidden1_case3').style.display='block';
		if(judge1==4)
			document.getElementById('hidden1_case4').style.display='block';
		if(judge1==5)
			document.getElementById('hidden1_case5').style.display='block';
		if(judge1==6)
			document.getElementById('hidden1_case6').style.display='block';
		if(judge1==0)
			document.getElementById('hidden1_case7').style.display='block';			
	}else{
		//第二周
		if(judge1==1)
			document.getElementById('hidden2_case1').style.display='block';
		if(judge1==2)
				document.getElementById('hidden2_case2').style.display='block';
		if(judge1==3)
			document.getElementById('hidden2_case3').style.display='block';
		if(judge1==4)
			document.getElementById('hidden2_case4').style.display='block';
		if(judge1==5)
			document.getElementById('hidden2_case5').style.display='block';
		if(judge1==6)
			document.getElementById('hidden2_case6').style.display='block';
		if(judge1==0)
			document.getElementById('hidden2_case7').style.display='block';		
	}

}
	
