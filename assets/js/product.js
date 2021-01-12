$(document).ready(function(){
    var li = $('#dsjnjn').children('ul').children('li');
    var njss =  li.length;
    if(njss > 0 ){
        for(var i=0;i<njss;i++){
            var name = li.eq(i).text();
            $('#form_gfsgg').children('table').children('tbody').children('tr').eq(i).children('.value').children('select').val(name);
        }
    }
})

$(document).on("click",".add_cart_quitr_minus",function(){
    var num = $(this).next().val();
    if(num > 1){
        $(this).next().val(Number(num) - 1);
    }
})

$(document).on("click",".add_cart_quitr_plus",function(){
    var num = $(this).prev().val();
    $(this).prev().val(Number(num) + 1)
})

$(document).on("click",".add_cart_button",function(){
    var num = $(this).prev().children('input').val();
    var url = $(this).attr('data_item');
    var href = url+'&quantity='+num
    alert(href);
})

$(document).on("click",".add_cart_checkout",function(){
    var num = $(this).prev().prev().children('input').val();
    var url = $(this).prev().attr('data_item');
    var href = url+'&quantity='+num
    alert(href);
})



function only(){
    var iuy = $('.jas_progress').children('.uk-display-block').children('.blink').text();
    var num = iuy-1;
    if(iuy > 1){
        $('.jas_progress').children('.uk-display-block').children('.blink').text(num);
        $('#js-progressbar').attr('value',num);
    }
}
setTimeout(function(){
    setInterval("only()",45000);
},2000);

function cart_shhg(){
    var x = 99;
    var y = 1;
    var rand = parseInt(Math.random() * (x - y + 1) + y);
    $(".cart_shhg").children('.urgency__text').children('span').html("").append(rand);
}
setTimeout(function(){
    setInterval("cart_shhg()",3000);
},2000);

function viewing_shhg(){
    var x = 999;
    var y = 78;
    var rand = parseInt(Math.random() * (x - y + 1) + y);
    $(".viewing_shhg").children('.urgency__text').children('span').html("").append(rand);
}
setTimeout(function(){
    setInterval("viewing_shhg()",15000);
},15000);


$(document).ready(function(){
    var oFa = document.createElement('div');
    $(oFa).attr('id','parent');
    $(oFa).attr('class','uk-position-relative uk-visible-toggle uk-light zdy_fdjjd');
    $(oFa).attr('tabindex','-1');
    $(oFa).attr('uk-slider','');
    var acv = $('.flex-viewport').width();
    $(oFa).css('height',acv);
    $('.flex-control-nav').wrap('#parent');
    $('.flex-control-nav').wrap(oFa);
    $('.flex-control-nav').css('height',acv-60);
    $('.flex-control-nav').before('<span class="img_up_bk uk-margin-small-right uk-icon" uk-icon="chevron-up"></span>');
    $('.flex-control-nav').after('<span  class="img_below_bk uk-margin-small-right uk-icon" uk-icon="chevron-down"></span>');
    setTimeout(function(){
        $('.flex-active').parent().addClass('dw_xs');
        dw_xs();
    },1000);
})


$(document).on("click",".img_up_bk",function(){
    var mnh = $('.flex-control-nav').children('li').length;
    var hg = Number($('.flex-control-nav').attr('top_num'));
    var h = $('.flex-active').height();
    if(hg < mnh-4){
        for(var a=0;a<=hg;a++){
            $('.flex-control-nav').children('li').eq(a).css('margin-top',(h+10)*(hg-a+1)*(-1));
        }
        $('.flex-control-nav').attr('top_num',hg+1);
    }
})

$(document).on("click",".img_below_bk",function(){
    var mnh = $('.flex-control-nav').children('li').length;
    var hg = Number($('.flex-control-nav').attr('top_num'));
    var h = $('.flex-active').height();
    if(hg > 0){
        // for(var a=0;a<hg;a++){
        //     $('.flex-control-nav').children('li').eq(a).css('margin-top',(h+10)*(hg-2-a)*(-1));
        // }
        $('.flex-control-nav').children('li').eq(hg-1).css('margin-top','0');
        $('.flex-control-nav').attr('top_num',hg-1);
    }
})

$(document).on("click",".flex-control-nav li",function(){
    $('.dw_xs').removeClass('dw_xs');
    $(this).addClass('dw_xs');
})


$(document).ready(function(){
    setTimeout(function(){
        var s = $('.dw_xs').index();
        $('.flex-control-nav').children('li').css('margin-top','');  
        var h = $('.flex-active').height();
        for(var a=0;a<s;a++){
            $('.flex-control-nav').children('li').eq(a).css('margin-top',(h+10)*(s-a)*(-1));
        }
        $('.flex-control-nav').attr('top_num',s);
    },1000);

})

