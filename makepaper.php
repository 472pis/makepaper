<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="jquery.ui.touch-punch.min.js"></script>
<!-- <script src="https://unpkg.com/draggabilly@2/dist/draggabilly.pkgd.min.js"></script>-->
  <meta charset="UTF-8">
  <title>makeyourpaper</title>
</head>
<style>
  
@import url('makepaper.css');
  
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
  <script src="makepaper_setting.js"></script>
</body>
</html>