$(document).ready(function () {
    $(".lightboxwrap .clsbt").click(function () {
        setCookieMobile( "todayCookie", "done" , 1);
        $(".lightboxwrap").hide();
    });
    });
    
 
    function setCookieMobile ( name, value, expiredays )    {
    var todayDate = new Date();
    todayDate.setDate( todayDate.getDate() + expiredays );
    document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}
    function getCookieMobile () {
    var cookiedata = document.cookie;
    if ( cookiedata.indexOf("todayCookie=done") < 0 ){
         $(".lightboxwrap").show();
    }
    else {
        $(".lightboxwrap").hide();
    }
};
    getCookieMobile();
   
    //--------
    var file = document.querySelector('#browse');
    file.onchange = function () { 
    var fileList = file.files ;
    // 읽기
    var reader = new FileReader();
    reader.readAsDataURL(fileList [0]);
      //로드 한 후
    reader.onload = function () {
        //로컬 이미지를 보여주기
      var imgelem = document.querySelector(".items");
      imgelem.innerHTML += '<div class="drag click"><div class="rotateable"><img src="'+reader.result+'"></div></div>';
      };
      file.value ="";
    };
   document.querySelector('.items').addEventListener('DOMSubtreeModified', function () {
     
     $( '.drag' ).draggable({
//       containment:'.papercontainer', 컨테이너 필요시
       scroll : false
     });
     
     
     //not이 안 먹힌다 왜쥐?
     
  }, false);
  
$(document).on("mousedown","canvas, .color, .filebox, .backgroundcolor", function(){
      $('.click img').removeClass('clickDrag');
       $('#rotate').remove();   
});
$(document).on("mousedown",".click img", function(){
  $('.rotateable').draggable({
  handle: '#rotate',
  opacity: 0.001,
  helper: 'clone',
  drag: function(event) {
    var // get center of div to rotate
      pw = this;
      pwBox = pw.getBoundingClientRect(),
      center_x = (pwBox.left + pwBox.right) / 2,
      center_y = (pwBox.top + pwBox.bottom) / 2,
      // get mouse position
      mouse_x = event.pageX,
      mouse_y = event.pageY,
      radians = Math.atan2(mouse_x - center_x, mouse_y - center_y),
      degree = Math.round((radians * (180 / Math.PI) * -1) + 100);

    var rotateCSS = 'rotate(' + (degree + 170) + 'deg)';
    $(this).css({
      '-moz-transform': rotateCSS,
      '-webkit-transform': rotateCSS
    });
  }
});
        $('.click img').removeClass('clickDrag');
       $('#rotate').remove();
      $(this).addClass('clickDrag');
       if($(this).parent('.rotateable').children('#rotate').length){}else{
       $(this).parent('.rotateable').prepend('<div id="rotate"></div>');};
       //한가지씩만 선택됨
    
//    $(document).on("mouseup",".drag",function(){
//      console.log($(this).position().left)
//      ;
//    });
//      데이터 저장용
    });
    
    $('.delete').click(function(){
      $('.clickDrag').remove();
      $('#rotate').remove();   
    });
    