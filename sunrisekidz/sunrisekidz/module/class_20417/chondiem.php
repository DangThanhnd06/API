<?php
    include("../../require_inc.php");
    $_SESSION['chonmarkcomment'] = 'markkk';
?>
<div class="searchcl">
                    <div  class="search">
                        <?=_search?>
                    </div>
                    <div class="ctsearch">
                        <div class="select-style">
                            <select name="sc" id="sc">
                                <option value="0"><?=_schoolbrand?></option>
                                <?php
                                    $scb = $h->query("select id,tieude from school_brand order by id");
                                    while($rcb = $h->fetch_array($scb)){
                                        if($lang == 'vn')
                                            $tr = $rcb['tieude'];
                                        else
                                            $tr = change($rcb['tieude']);
                                        echo '<option value="'.$rcb["id"].'">'.$tr.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="select-style">
                            <select name="cl" id="cl">
                                <option value=""><?=_classgr?></option>
                                <?php
                                            $scl = $h->query("select tenlop from lop");
                                            while($rcl = $h->fetch_array($scl)){
                                                echo '<option value="'.$rcl['tenlop'].'">'.$rcl['tenlop'].'</option>';
                                            }
                                        ?>
                            </select>
                        </div>
                        <div class="child scrollbar-macosx">
                            <ul id="lisths">
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="rightcl">
                    <p class="mark act"><?=_mark?></p>
                    <p class="comment"><?=_comment?></p>
                    <p class="clr"></p>
                    <div id="diem">
                        <div class="chthang">
                            <a class="chonthang" rel="1"><?=_thang1?></a>
                            <a class="chonthang" rel="2"><?=_thang2?></a>
                            <a class="chonthang" rel="3"><?=_thang3?></a>
                            <a class="chonthang" rel="4"><?=_thang4?></a>
                            <a class="chonthang" rel="5"><?=_thang5?></a>
                            <a class="chonthang" rel="6"><?=_thang6?></a>
                            <a class="chonthang" rel="7"><?=_thang7?></a>
                            <a class="chonthang" rel="8"><?=_thang8?></a>
                            <a class="chonthang" rel="9"><?=_thang9?></a>
                            <a class="chonthang" rel="10"><?=_thang10?></a>
                            <a class="chonthang" rel="11"><?=_thang11?></a>
                            <a class="chonthang" rel="12"><?=_thang12?></a>
                        </div>
                        <div class="title">
                            <div class="namm"><?=date("Y")?><!--<a class="month"><?=date("Y")?></a>--></div>
                            <div class="pracm">
                                <div class="prc" id="monhocmark">
                                <?php
                                    $smh = $h->query("select id,name_vn,name_en from practise where clg='Blude Cylinder' and hide=1 order by sort asc,id asc");
                                    $imh = 0;
                                    while($rmh = $h->fetch_array($smh)){
                                        if($imh==0) $cls = ' class="act"';
                                        else $cls = '';
                                        $msgg .= '<p'.$cls.'><a class="monhoc" rel="'.$rmh['id'].'">'.$rmh["name_$lang"].'</a></p>';
                                        $imh++;
                                    }
                                    echo $msgg;
                                ?>                                    
                                </div>
                            </div>
                            <!--<div class="markkm"><?=_mark?></div>-->
                            <p class="clr"></p>
                        </div>
                    </div>
                    <!-- content mark comment -->
                    <?php
                        $mnn = date("m");
                        $_SESSION['mnnn'] = (int)date("m");
                        switch($mnn){
                            case "1":
                                $_SESSION['thanghtt'] = _thang1;
                                break;
                            case "2":
                                $_SESSION['thanghtt'] = _thang2;
                                break;
                            case "3":
                                $_SESSION['thanghtt'] = _thang3;
                                break;
                            case "4":
                                $_SESSION['thanghtt'] = _thang4;
                                break;
                            case "5":
                                $_SESSION['thanghtt'] = _thang5;
                                break;
                            case "6":
                                $_SESSION['thanghtt'] = _thang6;
                                break;
                            case "7":
                                $_SESSION['thanghtt'] = _thang7;
                                break;
                            case "8":
                                $_SESSION['thanghtt'] = _thang8;
                                break;
                            case "9":
                                $_SESSION['thanghtt'] = _thang9;
                                break;
                            case "10":
                                $_SESSION['thanghtt'] = _thang10;
                                break;
                            case "11":
                                $_SESSION['thanghtt'] = _thang11;
                                break;
                            case "12":
                                $_SESSION['thanghtt'] = _thang12;
                                break;
                            
                        }
                    ?>
                    <div class="markcomment" id="dmark">
                        <div class="week">
                            <?php 
                                $mthang = array("1"=>_thang1,"2"=>_thang2,"3"=>_thang3,"4"=>_thang4,"5"=>_thang5,"6"=>_thang6,"7"=>_thang7,"8"=>_thang8,"9"=>_thang9,"10"=>_thang10,"11"=>_thang11,"12"=>_thang12);
                                foreach($mthang as $k=>$v){
                                    if($k == $_SESSION['mnnn'])
                                        echo '<a class="chonthg act" rel="'.$k.'">'.$v.'</a>';
                                    else
                                        echo '<a class="chonthg" rel="'.$k.'">'.$v.'</a>';
                                }
                            ?>
                        </div>
                        <div class="mhocnd">
                            <div class="ndmh">
                                <div class="monh">
                                    
                                </div>
                                <div class="ndung">
                                    
                                </div>
                                <p class="clr"></p>
                            </div>
                            <!--<div class="average"><?=_averagemark?></div>-->
                        </div>
                        <div class="mdiem">
                            <div class="diemm">
                                
                            </div>
                            <!--<div class="dtb">
                                
                            </div>-->
                        </div>
                        <p class="clr"></p>
                    </div>
                    <!-- end content mark comment -->
                </div>
                <p class="clr"></p>
                <script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.scrollbar-macosx').scrollbar();
        $('.comment').live("click",function(){
                $.post("<?=URL?>module/class/choncmt.php", function(data){
                    $('#content').html(data);
                });
        });
        // chon truong
        $('select#sc').live("change",function(){
                var sci = $('#sc').val();
                var cl = $('#cl').val();
                if(sci==0) {
                    $('#lisths').html('');
                } else {
                    if(cl != "") {
                        $.post("module/class/show_monhoc.php", {
							cl: cl,
                            sci: sci
						},  function(data){
						    var m = data.split(';;;');  
                            $('#monhocmark').fadeIn('slow').html(m[0]);
                            $('.monh').html(m[1]);
                            $('.ndung').html(m[2]);
                            //$('.week').html(m[3]);
    					});
                    } else {
                        //$('#monhocmark').fadeIn('slow').html('');
                        $('.monh').html('');
                        $('.ndung').html('');
                        /*var mm = '<a class="chontuan act" rel="1"><?=_lessweek?> 1</a>';
                            mm += '<a class="chontuan" rel="2"><?=_lessweek?> 2</a>';
                            mm += '<a class="chontuan" rel="3"><?=_lessweek?> 3</a>';
                            mm += '<a class="chontuan" rel="4"><?=_lessweek?> 4</a>';
                            mm += '<a class="chontuan" rel="5"><?=_lessweek?> 5</a>';
                            mm += '<p class="th"><?=_cuoithang.$_SESSION['thanghtt']?></p>';
                        $('.week').html(mm);*/
                    }
                        $.post("module/class/show_hs.php",{
                           cl: cl,
                           sci: sci 
                        }, function(dta){
                            $('#lisths').html(dta);
                        });
                }
                
        }).change(); 
        // chon lop
       $('select#cl').live("change",function(){
                var sci = $('#sc').val();
                var cl = $('#cl').val();
                if(cl=="") {
                    //$('#monhocmark').fadeIn('slow').html('');
                    $('#lisths').html('');
                } else {
                        $.post("module/class/show_monhoc.php", {
							cl: cl,
                            sci: sci
						},  function(data){
						    var m = data.split(';;;');  
                            $('#monhocmark').fadeIn('slow').html(m[0]);
                            $('.monh').html(m[1]);
                            $('.ndung').html(m[2]);
                            //$('.week').html(m[3]);
                            $('.diemm').html('');
    					});
                        $.post("module/class/show_hs.php",{
                           cl: cl,
                           sci: sci 
                        }, function(dta){
                            $('#lisths').html(dta);
                        });
                }
                
        }).change(); 
        // chon hoc sinh
        $('.hss').live("click", function(){
           var child_id = $(this).attr('rel');
           var school_id = $('#sc').val();
           var class_id = $('#cl').val();
           if($('#monhocmark p').hasClass('act')){
            var practice = $('#monhocmark p.act a.monhoc').attr('rel');
           } else var practice = 0;
           if($('.chonbh').hasClass('act')) {
            var lesson = $('.chonbh.act').attr('rel');
           } else var lesson = 0;
           if($('.chonnd').hasClass('act')) {
            var detail_id = $('.chonnd.act').attr('rel');
           } else var detail_id = 0;
                      
           $.post("module/class/show_tths.php",{
            school_id: school_id,
            class_id: class_id,
            child_id: child_id,
            practice: practice,
            lesson: lesson,
            detail_id: detail_id
           }, function(data){
            $('.hss').removeClass('act');
            $('.hss[rel="'+child_id+'"]').addClass('act');
            var m = data.split(';;;');
            $('.diemm').html(m[0]);
            $('.dtb').html(m[1]);
           });
           
        });
        // chon mon hoc
        $('.monhoc').live("click",function(){
           var practice = $(this).attr('rel'); 
           var school_id = $('#sc').val();
           var class_id = $('#cl').val();
           if($('.hss').hasClass('act')){
            var child_id = $('.hss.act').attr('rel');
           } else var child_id = 0;
           
           $.post("module/class/show_prac.php",{
            school_id: school_id,
            class_id: class_id,
            child_id: child_id,
            practice: practice
           }, function(data){
            var me = $('.monhoc').parent();
            me.removeClass('act');
            var cha = $('.monhoc[rel="'+practice+'"]').parent();
            cha.addClass('act');
            var m = data.split(';;;');
            $('.diemm').html(m[0]);
            $('.dtb').html(m[1]);
            $('.monh').html(m[2]);
            $('.ndung').html(m[3]);
           });
           $.post("module/class/show_tths.php",{
            school_id: school_id,
            class_id: class_id,
            child_id: child_id,
            thg: thg,
            practice: practice,
            lesson: lesson,
            detail_id: detail_id
           }, function(data){
            $('.hss').removeClass('act');
            $('.hss[rel="'+child_id+'"]').addClass('act');
            var m = data.split(';;;');
            $('.diemm').html(m[0]);
            $('.dtb').html(m[1]);
           });
           
        });
        // chon bai hoc
        $('.chonbh').live("click",function(){
           if($('#monhocmark p').hasClass('act')){
            var practice = $('#monhocmark p.act a.monhoc').attr('rel');
           } else var practice = 0; 
           var lesson = $(this).attr('rel'); 
           var school_id = $('#sc').val();
           var class_id = $('#cl').val();
           if($('.hss').hasClass('act')){
            var child_id = $('.hss.act').attr('rel');
           } else var child_id = 0;
           
           $.post("module/class/show_detail.php",{
            school_id: school_id,
            class_id: class_id,
            child_id: child_id,
            practice: practice,
            lesson: lesson
           }, function(data){
            $('.chonbh').removeClass('act');
            $('.chonbh[rel="'+lesson+'"]').addClass('act');
            var m = data.split(';;;');
            $('.diemm').html(m[0]);
            $('.dtb').html(m[1]);
            $('.ndung').html(m[2]);
           });
           $.post("module/class/show_tths.php",{
            school_id: school_id,
            class_id: class_id,
            child_id: child_id,
            practice: practice,
            lesson: lesson,
            detail_id: detail_id
           }, function(data2){
            var mm = data2.split(';;;');
            $('.diemm').html(mm[0]);
            $('.dtb').html(mm[1]);
           });
           
        });
        
        // cho diem
        $('.chond').live("click",function(){
           var dd = $(this).attr('rel');
           var chame = $('.chond[rel="'+dd+'"]').parent('.dd');
           var m = dd.split(";");
           var idd = m[6];
           $.post("module/class/chodiem.php",{dd: dd}, function(data){
                var mm = data.split(";;;");
                $('.dd[lang="'+idd+'"]').html(mm[0]);
                $('.dtb').html(mm[1]);
           });
            
        });
        
        // chon thang
        $('.month').live("click",function(){
           $('.chthang').toggle(); 
        });
        $('.chonthg').live("click",function(){
           var thang = $(this).attr('rel');
           var school_id = $('#sc').val();
           var class_id = $('#cl').val();
           if($('.hss').hasClass('act')){
            var child_id = $('.hss.act').attr('rel');
           } else var child_id = 0;
           if($('#monhocmark p').hasClass('act')){
            var practice = $('#monhocmark p.act a.monhoc').attr('rel');
           } else var practice = 0;
           if($('.chonbh').hasClass('act')) {
            var lesson = $('.chonbh.act').attr('rel');
           } else var lesson = 0;
           
           $.post("module/class/show_thang.php", {
                thang: thang,
                school_id: school_id,
                class_id: class_id,
                child_id: child_id,
                practice: practice,
                lesson: lesson
           }, function(data){
                //$('.chthang').hide();
                $('.chonthg').removeClass('act');
                $('.chonthg[rel="'+thang+'"]').addClass('act');                
                var m = data.split(';;;');
                $('.diemm').html(m[0]);
                $('.dtb').html(m[1]);
                $('.ndung').html(m[2]);
                $('.th').html(m[3]);
           });           
           
           
        });
    });
</script>