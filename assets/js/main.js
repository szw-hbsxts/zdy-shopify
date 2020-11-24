
function Scroll() {}
Scroll.prototype.upScroll = function(dom, _h, interval) {
    var dom = document.getElementById(dom);
    var timer = setTimeout(function() {
        var _field = dom.firstElementChild;
        _field.style.marginTop = _h;
        clearTimeout(timer);
    }, 3000)
    setInterval(function() {
        var _field = dom.firstElementChild;
        _field.style.marginTop = "0px";
        dom.appendChild(_field);
        var _field = dom.firstElementChild
        _field.style.marginTop = _h;
    }, interval)
}
var myScroll = new Scroll();

/*这是启动方式*/
/*
    * demo 父容器(ul)的id
    * -36px 子元素li的高度
    * 3000  滚动间隔时间
    * 每次滚动持续时间可到css文件中修改
    */


$(document).ready(function(){
    $('.attachment-gshdj').addClass('uk-transition-scale-up uk-transition-opaque uk-border-rounded');
    $('.attachment-gshdj').attr('width','');
    $('.attachment-gshdj').attr('height','');
})
$(document).on("click",".zdy_title",function(){
    var href = $(this).attr('href');
    window.location.href = href;
})

$(window).bind("load resize",function(){
    var ww = $(window).width();
    if(ww > 640){
        myScroll.upScroll("demo", "-2.8rem", 3000);
    }
    var s = $('.cp_imag_list').children('li').eq(0).children('div').children('div').children('div').width();
    $('.img_ygusg').css('height',s);
 });

 function fghsd(ds){
    $('#mini_cart').text(ds);
 }

 $(document).on("click","#butt_minus",function(){
    var num = $(this).next().val();
    if(num == 1){
        $(this).parent().parent().parent().prev().trigger("click");
    }else{
        $(this).next().val(Number(num) - 1);
    }
})
 
$(document).on("click","#butt_plus",function(){
    var num = $(this).prev().val();
    $(this).prev().val(Number(num) + 1)
    var url = $(this).parent().parent().children('.dsd_tit').attr('href');
    var uyt = $(this).prev().attr("post_type");
	var id = $(this).prev().attr("data_product_id");
	if(uyt == 'product_variation'){
		var f_id = $(this).prev().attr("data_variation_id");
		ajax_from_ady(url+"&add-to-cart="+id+"&variation_id="+f_id+"&quantity=1");
		//alert('可选'+);	
	}else{
		ajax_from_ady(url+"?add-to-cart="+id+"&quantity=1");
		//alert('不可选'+url);
	}
})

$(document).on("change","#ipu_num",function(){
    var num = $(this).attr('value');
    var nu = $(this).val();
    if(nu > 0){
        if(nu > num){
            var hm = Number(nu) - Number(num);
            var url = $(this).parent().parent().children('.dsd_tit').attr('href');
            var uyt = $(this).attr("post_type");
            var id = $(this).attr("data_product_id");
            if(uyt == 'product_variation'){
                var f_id = $(this).attr("data_variation_id");
                ajax_from_ady(url+"&add-to-cart="+id+"&variation_id="+f_id+"&quantity="+hm);
                //alert('可选'+);	
            }else{
                ajax_from_ady(url+"?add-to-cart="+id+"&quantity="+hm);
                //alert('不可选'+url);
            }
        }else{

        }
    }else{
        $(this).parent().parent().parent().prev().trigger("click");
    }
})



 $(document).on("click",".dj_button",function(){
    var url = $(this).attr('data_item');
    ajax_from_ady(url);
})




function ajax_from_ady(url){
	var host = window.location.host;
	
	//创建xmlHttp对象
	var xmlHttp;
	if(window.ActiveXObject){
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else if(window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}

	//获取表单值
	var datastr = "update_my_cart";
	var url = url;

	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			//alert(xmlHttp.responseText);
		}
	}
	
	//提交数据
	xmlHttp.open("POST",url,false);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send(datastr);

	$('body').append("<script src='/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js'></script>"); 
	
}
