    var colorBlack = "#2b2b2b";
    var colorGreen = "#70dd3f";
    var colorYellow = "#ffdc38";
    var colorRed = "#d93434";
    var colorPurple = "#8249e1";
    var colorOrange = "#fb7235";
    var colorBlue = "#3a86f8";
    var colorMint = "#27e9ab";
    var colorBrown = "#78322d";
    var colorErase = "white";
    var pointSize = 5;
    var curColor = colorBlack;
    var str = "Black Brown Red Orange Yellow Green Mint Blue Purple Erase";
    var siz = "3 6 9 12 20";
    var bgcolor = "sand water picnic floor meat coffee noise white";//이 이름대로 파일명 등록할 것, 백그라운드 지정.
 
    var items = str.split(' ');
    var sizes = siz.split(' ');
    var cols = bgcolor.split(' ');
    var i = 0;
    var o = 0;
    var b = 0;
    var tags = '';
    var tags2 = '';
    var tags3 = '';
    while(i<items.length){
      var item = items[i];
      var tag = '<div class="colorclick" id="color'+item+'"><img src="./img/'+item+'.png" alt="'+item+'"></div><br>';
      tags = tags + tag;
      i = i + 1;
    }
    while(o<sizes.length){
      var size= sizes[o];
      var tag2 = '<div class="size" id="'+size+'" style="font-size: calc('+size+'px + 10px)">○</div>';
      tags2 = tags2 + tag2;
      o = o + 1;
    }
    while(b<cols.length){
      var col = cols[b];
      if (b%2 == 1){
      var tag3 = '<div class="bgcolor" id="'+col+'" style="background-image:url(./img/'+col+'.jpeg);"></div><br>';}else{
      var tag3 = '<div class="bgcolor" id="'+col+'" style="background-image:url(./img/'+col+'.jpeg);"></div>';
      };
      tags3 = tags3 + tag3;
      b = b + 1;
    }
    
    
  document.querySelector('.color').innerHTML = tags+tags2+'<div class="clear"><p>CLEAR </p></div>';
  document.querySelector('.backgroundcolor').innerHTML = tags3;
  
    //색깔 바꾸는 버튼 만들기
    //사이즈 바꾸는 버튼 만들기 
  window.onload = function() {
    $(".colorclick").click(function(){
      var color = $(this).attr('id')
      curColor = eval(color);
      $(".colorclick").css("filter","");
      $(".colorclick").css("left","0");
      $(this).css("left","20px");
      $(this).css("filter","drop-shadow(0px 0px 5px "+curColor+")");
      
});
     $(".size").click(function(){
      var psize = $(this).attr('id');
      pointSize = eval(psize);
       $(".size").css("filter","");
       $(".size").css("top","");
       $(this).css("top","-15px");
      $(this).css("filter","drop-shadow(0px 0px 1px gray)");
});
    
    $(".bgcolor").click(function(){
      var bgcolor = $(this).attr('id');
      $(".bgcolorwrap").css("background-image","url('./img/"+bgcolor+".jpeg')");
       $(".bgcolor").css("filter","");
      $(this).css("filter","drop-shadow(0px 0px 3px white)");
      
});
    
    
	var myCanvas = document.getElementById("myCanvas");
	var ctx = myCanvas.getContext("2d");
    myCanvas.width = window.innerWidth;
    myCanvas.height = window.innerHeight;
    // Fill Window Width and Height
    $(document).on('click','.clear', function(){
   redraw();
 });

function redraw(){
  ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height); // Clears the canvas
  
  ctx.strokeStyle = curColor;
  ctx.lineJoin = "round";
  ctx.lineWidth = pointSize;
			
}
	
	// Set Background Color
//    ctx.fillStyle="#fff";
//    ctx.fillRect(0,0,myCanvas.width,myCanvas.height);
      // Mouse Event Handlers
	if(myCanvas){
        
        
		var isDown = false;
		var canvasX, canvasY;
		ctx.lineWidth = pointSize;
        ctx.lineCap = "round";
        ctx.lineJoin = "round";
        

		$(myCanvas)
		.mousedown(function(e){
			isDown = true; 
			ctx.beginPath();
            ctx.fillStyle = curColor;
			canvasX = e.pageX - myCanvas.offsetLeft;
			canvasY = e.pageY - myCanvas.offsetTop;
            ctx.arc(canvasX, canvasY, pointSize/2, 0, Math.PI * 2, true);
            ctx.fill();
            ctx.moveTo(canvasX, canvasY);
            ctx.closePath();
            ctx.beginPath();
            
		})
		.mousemove(function(e){
          if(isDown !== false){
              canvasX = e.pageX - myCanvas.offsetLeft;
				canvasY = e.pageY - myCanvas.offsetTop;
                ctx.strokeStyle = curColor;
                ctx.lineWidth = pointSize;
				ctx.lineTo(canvasX, canvasY);
				ctx.stroke();
            }else{}
		})
		.mouseup(function(e){
			isDown = false;
			ctx.closePath();
		})
      .mouseleave(function(e){
        isDown=false;
         ctx.closePath();
      });
       
	};
    
      
	
	// Touch Events Handlers
	draw = {
		started: false,
		start: function(evt) {

			ctx.beginPath();
			ctx.moveTo(
				evt.touches[0].pageX,
				evt.touches[0].pageY
			);

			this.started = true;

		},
		move: function(evt) {

			if (this.started) {
				ctx.lineTo(
					evt.touches[0].pageX,
					evt.touches[0].pageY
				);

				ctx.strokeStyle = curColor;
				ctx.lineWidth = pointSize;
				ctx.stroke();
			}

		},
		end: function(evt) {
			this.started = false;
		}
	};
	
	// Touch Events
	myCanvas.addEventListener('touchstart', draw.start, false);
	myCanvas.addEventListener('touchend', draw.end, false);
	myCanvas.addEventListener('touchmove', draw.move, false);
	
	// Disable Page Move
	document.body.addEventListener('touchmove',function(evt){
		evt.preventDefault();
	},false);
    }
  
 