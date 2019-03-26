<!-- start .left -->
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "90458801-9e60-4f55-bc53-4200c2de85ff", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
            <div class="left bg_left2">
                <div class="iconmm">&nbsp;</div>
                <div class="leftct">
                    <h2 class="titlec">Brand Story</h2>
                    <p class="ngancach">&nbsp;</p>
                    <div class="ctdetail">
                        <h1 class="tti">Mama Nature understands the power of nature</h1>
                        <p>Please join me congratulating the 1st TFS BIMAs (Best International Makeup Artist)!</p>
                        <p>What is 'BIMA'?</p>
                        <p>BIMA stands for Best International Makeup Artist and to work closely with HQ in introducing THEFACESHOP products as 
                            our Global Makeup Artist
                        </p>
                        <p>THEFACESHOP's HQ Makeup Instructor Course for our global makeup artist was held in Seoul for 4 days
                            with 60 participants (11 Countries and 12 Partners).
                        </p>
                        <p>
                            3 special individuals were selected as THEFACESHOP BIMAs for their excellent makeup skills. They
                            were chosen based strictly on writing and performance test given by Korean Makeup Association, their
                            skill & participation during the 4 day event, and was judged by the Korean Makeup Association, Makeup Instructor,
                            and THEFACESHOP HQ Train Team. 
                        </p>
                    </div>
                </div>
            </div>
            <!-- start .right -->
            <div class="right bg_right2">
                <h2 class="title2">
                    <a href="#">Home</a> > <a href="#">Mama nature</a> > Ad & Advertorials
                </h2>
                <div class="contentdetail">
                    <div class="noticeWrap_view">
                        <div id="scroll_noti_view">
                            <div class="customScrollBox">
                                <div class="container">
                                    <p>Please join me congratulating the 1st TFS BIMAs (Best International Makeup Artist)!</p>
                                    <p>What is 'BIMA'?</p>
                                    <p>BIMA stands for Best International Makeup Artist and to work closely with HQ in introducing THEFACESHOP products as 
                                        our Global Makeup Artist
                                    </p>
                                    <p>THEFACESHOP's HQ Makeup Instructor Course for our global makeup artist was held in Seoul for 4 days
                                            with 60 participants (11 Countries and 12 Partners).
                                    </p>
                                    <p>
                                            3 special individuals were selected as THEFACESHOP BIMAs for their excellent makeup skills. They
                                            were chosen based strictly on writing and performance test given by Korean Makeup Association, their
                                            skill & participation during the 4 day event, and was judged by the Korean Makeup Association, Makeup Instructor,
                                            and THEFACESHOP HQ Train Team. 
                                    </p>
                                    <p>Please join me congratulating the 1st TFS BIMAs (Best International Makeup Artist)!</p>
                                    <p>What is 'BIMA'?</p>
                                    <p>BIMA stands for Best International Makeup Artist and to work closely with HQ in introducing THEFACESHOP products as 
                                            our Global Makeup Artist
                                    </p>
                                    <p>THEFACESHOP's HQ Makeup Instructor Course for our global makeup artist was held in Seoul for 4 days
                                            with 60 participants (11 Countries and 12 Partners).
                                    </p>
                                    <p>
                                            3 special individuals were selected as THEFACESHOP BIMAs for their excellent makeup skills. They
                                            were chosen based strictly on writing and performance test given by Korean Makeup Association, their
                                            skill & participation during the 4 day event, and was judged by the Korean Makeup Association, Makeup Instructor,
                                            and THEFACESHOP HQ Train Team. 
                                    </p>
                                    <p>Please join me congratulating the 1st TFS BIMAs (Best International Makeup Artist)!</p>
                                    <p>What is 'BIMA'?</p>
                                    <p>BIMA stands for Best International Makeup Artist and to work closely with HQ in introducing THEFACESHOP products as 
                                            our Global Makeup Artist
                                    </p>
                                    <p>THEFACESHOP's HQ Makeup Instructor Course for our global makeup artist was held in Seoul for 4 days
                                            with 60 participants (11 Countries and 12 Partners).
                                    </p>
                                    <p>
                                            3 special individuals were selected as THEFACESHOP BIMAs for their excellent makeup skills. They
                                            were chosen based strictly on writing and performance test given by Korean Makeup Association, their
                                            skill & participation during the 4 day event, and was judged by the Korean Makeup Association, Makeup Instructor,
                                            and THEFACESHOP HQ Train Team. 
                                    </p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social">
                    <span class='st_facebook'></span>
                    <span class='st_twitter'></span>
                    <span class='st_linkedin'></span>
                    <span class='st_pinterest'></span>
                </div>
                <div class="buttonscroll">
                    <a href="javascript:void(0)" style="float:left;"><img id="scrollMoveTop" src="img/icon_up.png" alt="Scroll up" /></a>
				    <a href="javascript:void(0)" style="float:left;"><img id="scrollMoveDown" src="img/icon_down.png" alt="Scroll Down" /></a>
                </div>
                <p class="clr"></p>
            </div>
            <p class="clr"></p>
        </div>
    </div>
    <script type="text/javascript">
var actionTop 	= true;
var ifOnlyTop 	= false;
var actionDown 	= true;
var ifOnlyDown 	= false;

$("#scrollMoveTop").bind({
	click : function(event){
		event.preventDefault();
		actionTop = false;
		scrollMoveTop();
	},
	mousedown : function(){
		actionTop = true;
		scrollMoveTopRun();
	},
	mouseup : function(){
		actionTop = false;
		ifOnlyTop = false;
	}
});

$("#scrollMoveDown").bind({
	click : function(event){
		event.preventDefault();
		actionDown = false;
		scrollMoveDown();
	},
	mousedown : function(){
		actionDown = true;
		scrollMoveDownRun();
	},
	mouseup : function(){
		actionDown = false;
		ifOnlyDown = false;
	}
});


var scrollMoveTop = function(){

	var $container  = $('.container');
	var getNowpx 	= $container.css("top");
	var nowpx 		= (getNowpx.replace("px","")*1);
	var movepx = 0;
	if( nowpx >= 0 ){
		return false;
	} else{
		movepx = nowpx + 100;
		if(movepx > 0) movepx = 0;
	}
	$container.stop().animate({
		top : movepx + "px"
	},500);

};

var scrollMoveTopRun = function(){

	var $container  = $('.container');
	var getNowpx 	= $container.css("top");
	var nowpx		= (getNowpx.replace("px","")*1);
	if(ifOnlyTop){
		if( nowpx >= 0 ){
			return false;
		}
		movepx = nowpx + 25;
		if(movepx > 0) movepx = 0;
		$container.stop().animate({
			top : movepx + "px"
		},50);
	}
	getNowpx = $container.css("top");
	nowpx	 = (getNowpx.replace("px","")*1);
	if( !(nowpx >= 0) && actionTop ){
		ifOnlyTop = true;
		setTimeout("scrollMoveTopRun()",50);
	}

};

var scrollMoveDown = function(){

	var $container  = $('.container');
	var hei 		= $container.outerHeight();
	var maxDown 	= (hei - 370) * -1;
	var getNowpx 	= $container.css("top");
	var nowpx 		= (getNowpx.replace("px","")*1);
	var movepx 		= 0;
	if( nowpx <= maxDown ){
		return false;
	}else{
		movepx = nowpx - 100;
		if(movepx < maxDown) movepx = maxDown;
	}
	$container.stop().animate({
		top : movepx + "px"
	},500);

};


var scrollMoveDownRun = function(){

	var $container  = $('.container');
	var hei 		= $container.outerHeight();
	var maxDown 	= (hei - 370) * -1;
	var getNowpx 	= $container.css("top");
	var nowpx 		= (getNowpx.replace("px","")*1);
	var movepx 		= 0;
	if(ifOnlyDown){
		if( nowpx <= maxDown ){
			return false;
		}else{
			movepx = nowpx - 25;
			if(movepx < maxDown) movepx = maxDown;
		}
		$container.stop().animate({
			top : movepx + "px"
		},50);
	}
 	getNowpx 	= $container.css("top");
	nowpx 		= (getNowpx.replace("px","")*1);
	if( !(nowpx <= maxDown) && actionDown ){
		ifOnlyDown = true;
		setTimeout("scrollMoveDownRun()",50);
	}
};

// END
// ###############################################################

function mCustomScrollbars(){
	$("#scroll_noti_view").mCustomScrollbar("vertical",200,"easeOutCirc",1.25,"fixed","yes","no",0);
}
/* function to load new content dynamically */
function LoadNewContent(id,file){
	$("#"+id+" .customScrollBox .content").load(file,function(){
		mCustomScrollbars();
	});
}


$(window).load(function() {
		mCustomScrollbars();
});

function f_page(pageno){
	$("#pageno").val(pageno);
	$("#idx").val(0);
	$("#f").submit();
}

function goView(idx){
	$("#idx").val(idx);
	$("#f").submit();
}
</script>


</body>
</html>