$(function(){
	 
  var smallImgLi = $('.wrapSmallImg ul li');
  var smallImgLiLength = smallImgLi.length;
  var smallImgLiWidth = smallImgLi.outerWidth(true);
  var smallImgUl = $('.wrapSmallImg ul');
  var leftBtn = $('span.left');
  var rightBtn = $('span.right');
  var now = 0;
  var zoomMiddleDiv = $('.zoomMiddle');
    
  smallImgLi.mouseover(function(){
    $(this).addClass('current').siblings().removeClass('current');
    var thisSrc = $(this).children('img').attr('src');
    $('.zoomMiddle img').attr('src',thisSrc);
    $('.zoomLarge img').attr('src',thisSrc);
  });
  rightBtn.click(function(){
    //褰搉ow=2鐨勬椂鍊欙紝鎴戜滑涓嶅笇鏈涘啀璁╀粬婊氬姩浜�
    leftBtn.removeClass('disable');
    if(now>=smallImgLiLength-4){
      $(this).addClass('disable');
      now = smallImgLiLength-4;
    }else{
      now++;
      smallImgUl.animate({'left':-now*smallImgLiWidth},300);
    }
  });
  leftBtn.click(function(){
    if(now==0){
      now=0;
    }else{
      now--;
      smallImgUl.animate({'left':'+='+smallImgLiWidth},300);
    }
  });
  zoomMiddleDiv.mousemove(function(e){
	
    $('.mask').show();
    $('.zoomLarge').show();
    zoomMiddleDivOffset = zoomMiddleDiv.offset();
    var x = e.pageX - zoomMiddleDivOffset.left - $('.mask').width()/2;
    var y = e.pageY - zoomMiddleDivOffset.top - $('.mask').height()/2;
    if(x<=0){
      x=0;
    }else if(x>=zoomMiddleDiv.width()-$('.mask').width()){
      x = zoomMiddleDiv.width()-$('.mask').width();
    }
    if(y<=0){
      y=0;
    }else if(y>=zoomMiddleDiv.height()-$('.mask').height()){
      y = zoomMiddleDiv.height()-$('.mask').height();
    }
    var percentageX = x/(zoomMiddleDiv.width()-$('.mask').width());
    var percentageY = y/(zoomMiddleDiv.height()-$('.mask').height());
    $('.zoomLarge img').css({
      left:-percentageX*(600-$('.zoomLarge').width()),
      top:-percentageY*(600-$('.zoomLarge').height())
    });
    
    $('.mask').css({
      'left':x+'px',
      'top':y+'px'
    });
  });
  zoomMiddleDiv.mouseout(function(){
    $('.mask').hide();
    $('.zoomLarge').hide();
  });
});