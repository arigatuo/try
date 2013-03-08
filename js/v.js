$(function(){
	
	
$('.focus-pic').switchable({
    triggers: $('.focus-trigger li'),
    effect: 'fade',
    autoplay: true,
	interval:6
});	

var baby_products = jQuery('.J_Silder ul').switchable({
	triggers:false,
    panels: 'li',
    easing: 'ease-in-out',
    effect: 'scrollLeft',
    prev: '.baby-products .arrowleft',
    next: '.baby-products .arrowright',
    end2end: true,
    steps: 1,
    visible: 3,
    autoplay: true,
    api:true,
	interval:5
});

$('.baby-products .arrowleft').hover(function(){jiepai.pause()},function(){ baby_products.play()});
$('.baby-products .arrowright').hover(function(){jiepai.pause()},function(){ baby_products.play()});

$('.iask .tab-tbd-content').switchable({
	triggers:jQuery('.iask .tab-tbd-trigger li')
});

$('.baike .tab-tbd-content').switchable({
	triggers:jQuery('.baike .tab-tbd-trigger li')
});



$('.J_Sd').mouseenter(function(){
    $(this).addClass('hover');
	$(this).find('dd').show();
	}).mouseleave(function(){
	        $(this).removeClass('hover');
			$(this).find('dd').hide();
			})	


$(function(){
    /*隐藏右侧浮动块
	var $backToTopTxt = "返回顶部", $backToTopEle = $('<div class="backToTop"><a href="javascript:void(0)"></a></div>').appendTo($("body"))
.attr("title", $backToTopTxt).click(function() {
	$("html, body").animate({ scrollTop: 0 }, 400);
	}), $backToTopFun = function() {
	var st = $(document).scrollTop(), winh = $(window).height();
	(st > 0)? $backToTopEle.show(): $backToTopEle.hide();
	//IE6下的定位
	if (!window.XMLHttpRequest) {
	$backToTopEle.css("top", st + 282);
	}
	};
	$(window).bind("scroll", $backToTopFun);
	$(function() { $backToTopFun(); });
	*/
});

$('.J_GoTop').click(function(){
$("html, body").animate({ scrollTop: 0 }, 400);
})

	
})
