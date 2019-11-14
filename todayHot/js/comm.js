//头部搜索框
$(function(){
	$('#loupe').click(function(){
		$('.hoTop_L .toplist').hide();
		$(this).hide();
		$('.comserach').fadeIn(300);
		$('.comserach input').focus();
		$('.hoTop .hoTop_M').css({'position':'absolute','width':'33%','left':'50%','margin-left':'-17%'})
	})
	$('#close').click(function(){
		$('.hoTop_L .toplist').fadeIn(300);
		$('.comserach').hide();
		$('#loupe').fadeIn(300);
		$('.hoTop .hoTop_M').removeAttr("style","");
	})
})
//回到顶部
$(function(){
window.onresize = window.onscroll = function (){
    var scroll_top = '';
    if (document.documentElement && document.documentElement.scrollTop) {
        scroll_top = document.documentElement.scrollTop;
    } else if (document.body) {
        scroll_top = document.body.scrollTop;
    }
    if (scroll_top > 10 ){
        $("#footup").fadeIn(300);
    } else if(scroll_top < 10){
        $("#footup").fadeOut(300);
    }
    $("#footup").click(function(){
    	document.body.scrollTop = document.documentElement.scrollTop = 0;
    })

};
})
