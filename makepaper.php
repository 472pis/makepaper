<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- <script src="https://unpkg.com/draggabilly@2/dist/draggabilly.pkgd.min.js"></script>-->
  <meta charset="UTF-8">
  <title>makeyourpaper</title>
</head>
<style>
  
/*  <!--nodrag-->*/
  .bgcolor, .size, .colorclick, .delete{
  -ms-user-select: none; -moz-user-select: -moz-none; -webkit-user-select: none; -khtml-user-select: none; user-select:none;
  }
  /* pointer */
  
  .bgcolor, .size, .colorclick, .delete{
    cursor: pointer;
  }
  * {
    
	margin: 0;
	padding: 0;
}
  
  
  body, html{
    height: 100%;
    width: 100%;
  }
  
  .drag{
      display: block;
      position: absolute; 
  }
  .drag img{
      filter: drop-shadow(1px 1px 1px rgba(0,0,0,0.3));
      width: 100px;
      height: 100px; 
  }
  
  .clickDrag{
    border: 1px solid black;
  }
  .rotatable{
    position: absolute;
  }
  #rotate {
    display: inline-block;
    position: absolute;
    width:10px;
    height: 10px;
    background-color: black;
    border-radius: 50%;
    top:45px;
    left: -10px;
  }
  
  .bgcolorwrap{
    width: 100vw;
    height: 100vh;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .backgroundwrap{
    background-image: url('./img/paper.png');
    background-repeat: repeat-x;
    background-position: center;
    background-size: 400px;
    width: 100%;
    height: 100%;
    position: relative;
    text-align: center;
    
  }
  
  .papercontainer{
    display: inline-block;
    position: relative;
    border: 2px dashed #d7d7d7;
    width:50%;
    height:80vh;
  }
  
  .items{
    position: absolute;
  }
  
  #myCanvas{
    position: fixed;
    border: 1px solid #d7d7d7;
    top: 0;
    left: 0;
    filter: opacity(90%);
    mix-blend-mode: multiply;
  }
  
  .colorclick{
    filter: drop-shadow(1px 1px 2px rgba(0, 0, 0, 0.5));
    position: relative;
    top:0;
    right:0;
    font-weight: bold;
    float: right;
    display:block;
  }
  
  .colorclick img{
    width: 400px;
    height: auto;
    
  }
  #colorErase {
    width: 400px;
    text-align: right;
  }
  #colorErase img{
    width: 200px;
    height: auto;
    transform: translateX(-15px);
  }
  
  .color{
    text-align: center;
    position: fixed;
    top: 60px;
    left: 0;
    width: 18%;
    height: 100vh;
  }
  
  .backgroundcolor{
    text-align: left;
    overflow: hidden;
    position: fixed;
/*    border: 1px solid;*/
    top: 60px;
    right: 0;
    width: 18%;
    height: 100vh;
  }
  
  .bgcolor{
    margin: 10px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: inline-block;
    background-size: contain;
  }
  
  
  .size{
    margin-left: 10px;
    vertical-align: middle;
    display:inline-block;
    position: relative;
    filter: drop-shadow(0px 2px 0px white);
    top:-25px;
  }
  
  .filebox{
    position: relative;
    display: inline-block;
    z-index: 100;
    top:0;
  }
  
  .filebox label {
    display: inline-block;
    overflow: hidden;
    width: 80px;
    height: 60px;
    
  }
  
  .filebox label:hover, .delete:hover img {
  filter: brightness(120%);
    }
  
    .filebox label:active, .delete:active img {
  filter: brightness(50%);
    }
  
  .filebox input[type="file"]{
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    border: 0;
  }
  .filebox img{
    padding: 10px;
    width: 50px;
    height: auto;
  }
    .delete{
      z-index: 100;
      overflow: hidden;
    display: inline-block;
      position: relative;
      width: 80px;
    height: 60px;
  }
  
  .delete img{
    padding: 10px;
    width: 50px;
    height: auto;
  }
  
  .clear{
    display: inline-block;
    position: relative;
    top:-10px;
    background-color: black;
    color: white;
    border: 1px solid white;
    border-radius: 10px;
    width: 100px;
    height: 30px;
    
  }
  .clear p{
    position: relative;
    top: 50%;
    transform: translateY(-50%);
  }
  .lightboxwrap{
    z-index: 101;
    width: 100%;
    height: 100%;
    position: fixed;
    display: none;
    text-align: center;
    
  }
  
  .lightbox{
    -ms-overflow-style: none;
      z-index: 102;
      display: inline-block;
      position: relative;
      top: 25%;
      width: 500px;
      height: 300px;
      background-color: white;
      filter: drop-shadow(0px 0px 3px gray);
      box-sizing:border-box;
      padding-top: 25px;
      font-size: 0.8rem;
      color: gray;
      line-height: 1.8;
      overflow: scroll;
      
  }
  
  ::-webkit-scrollbar { 
      display: none !important;}
  
  .clsbt{
    background-color: lightgray;
    border: 1px gray;
    display: inline-block;
    width: 150px;
    height: 25px;
  }
  .clsbt p{
    color: white;
    font-weight: bold;
    display: inline-block;
    position: relative;
    top:50%;
    transform: translateY(-50%);
    vertical-align: middle;
  }

  </style>
<body>
<div class="lightboxwrap"><div class="lightbox">
 <i> ↑ 아이템 추가 / 아이템 삭제 ↑<br>
  ← 브러시 색상, 크기 / 배경 테마 변경 →</i><br><br>
  <b>- 주의사항 - </b><br>
  그림을 그릴 수 있는 캔버스 크기는 새로고침 했을 때의 창 크기로 설정됩니다. <br>
  창 크기보다 크게 창 비율을 바꿀 경우 커진 부분에는 그림이 그려지지 않습니다.<br>
  다른 비율의 캔버스로 사용하고 싶다면, 창 비율을 바꾼 뒤 새로고침 한 후 작업해 주세요.<br>
  이 페이지는 PC 크롬 브라우저에 최적화 되어 있습니다.<br>
  모바일 및 그 외의 브라우저에서는 정상 작동이 되지 않을 수 있습니다.<br><br>
  <div class="clsbt"><p>닫기</p></div>
</div></div>
<div class="bgcolorwrap">
 <div class="backgroundwrap">
 
  <div class="filebox">
  <label for="browse"><img src="./img/item.png" alt=""></label>
   <input id="browse" type="file" name="file" accept=".jpg, .jpeg, .gif, .png" >
   </div><div class="delete"><img src="./img/trash.png" alt=""></div><br>
  
    <div class="papercontainer">
       <canvas id="myCanvas">
		브라우저 버전이 너무 낮으면 사용할 수 없습니다.
	</canvas>
      <div class="color">
      </div>
      <div class="backgroundcolor">
      </div>
       <div class="items"></div>
     
    </div> 
    
  </div></div>        
  
  <script src="./draw.js"></script>
  <script>
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
    });
    
        

  </script>
</body>
</html>