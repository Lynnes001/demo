function showImg(outdiv,indiv,bigimg,thiselement){  
    var winW = $(window).width();  
    var winH = $(window).height();  
    var src = $(thiselement).attr('src');  
    $(bigimg).attr("src",src);  
    $("<img/>").attr("src",src).load(function(){  
        var imgW = this.width;   
        var imgH = this.height;  
        var scale= imgW/imgH;  
        if( imgW > winW ){  
            $(bigimg).css("width","100%").css("height","auto");  
            imgH = winW/scale;  
            var h=(winH-imgH)/2;              
            $(indiv).css({"left":0,"top":h});  
        }else{          
            $(bigimg).css("width",imgW+'px').css("height",imgH+'px');  
            var w=(winW-imgW)/2;  
            var h=(winH-imgH)/2;        
            $(indiv).css({"left":w,"top":h});  
        }  
                
        $(outdiv).fadeIn("fast");  
        $(outdiv).click(function(){  
            $(this).fadeOut("fast");  
        });                               
    });  
}  