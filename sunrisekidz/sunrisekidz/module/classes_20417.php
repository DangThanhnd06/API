<div id="content">
<?php if(!isset($_SESSION['chonmarkcomment']) || $_SESSION['chonmarkcomment']=='markkk') { ?>
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
                    <!--
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
                    -->
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
           var detail_id = 0;
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
<?php } else { ?>
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
                <?php
                        $mnnn = date("m");
                        $_SESSION['mnnnn'] = (int)date("m");
                        switch($mnnn){
                            case "1":
                                $_SESSION['thanghttt'] = _thang1;
                                break;
                            case "2":
                                $_SESSION['thanghttt'] = _thang2;
                                break;
                            case "3":
                                $_SESSION['thanghttt'] = _thang3;
                                break;
                            case "4":
                                $_SESSION['thanghttt'] = _thang4;
                                break;
                            case "5":
                                $_SESSION['thanghttt'] = _thang5;
                                break;
                            case "6":
                                $_SESSION['thanghttt'] = _thang6;
                                break;
                            case "7":
                                $_SESSION['thanghttt'] = _thang7;
                                break;
                            case "8":
                                $_SESSION['thanghttt'] = _thang8;
                                break;
                            case "9":
                                $_SESSION['thanghttt'] = _thang9;
                                break;
                            case "10":
                                $_SESSION['thanghttt'] = _thang10;
                                break;
                            case "11":
                                $_SESSION['thanghttt'] = _thang11;
                                break;
                            case "12":
                                $_SESSION['thanghttt'] = _thang12;
                                break;
                            
                        }
                    ?>
                <div class="rightcl">
                    <p class="mark"><?=_mark?></p>
                    <p class="comment act"><?=_comment?></p>
                    <p class="clr"></p>
                    <div id="diem">
                    <!--
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
                    -->
                        <div class="title">
                            <div class="namc"><?=date("Y")?><!--<a class="month"><?=date("Y")?></a>--></div>
                            <div class="pracc">
                                <div class="prc">
                                    <p class="<?=$lang?> act"><a class="monhocc act" rel="0"><?=_blc?></a></p>
                                <?php
                                    /*$spr = $h->query("select id,name_vn,name_en from practise where clg='Blude Cylinder' and hide=1 order by sort asc,id asc");
                                    while($rpr = $h->fetch_array($spr)){
                                        echo '<p class="'.$lang.'"><a class="monhocc" rel="'.$rpr['id'].'">'.$rpr["name_$lang"].'</a></p>';
                                    }*/
                                ?>                                
                                </div>
                            </div>
                            <p class="clr"></p>
                        </div>
                    </div>
                    <!-- content mark comment -->
                    <div class="markcomment">
                        <div class="week">
                            <?php 
                                $mthang = array("1"=>_thang1,"2"=>_thang2,"3"=>_thang3,"4"=>_thang4,"5"=>_thang5,"6"=>_thang6,"7"=>_thang7,"8"=>_thang8,"9"=>_thang9,"10"=>_thang10,"11"=>_thang11,"12"=>_thang12);
                                foreach($mthang as $k=>$v){
                                    if($k == $_SESSION['mnnnn'])
                                        echo '<a class="chonthag act" rel="'.$k.'">'.$v.'</a>';
                                    else
                                        echo '<a class="chonthag" rel="'.$k.'">'.$v.'</a>';
                                }
                            ?>
                        </div>
                        <div class="commentt">
                            <p class="wcmt1"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt2"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt3"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt4"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt5"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt6"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt7"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt8"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt9"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt10"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt11"><a class="cmtt" rel="0">&nbsp;</a></p>
                            <p class="wcmt12"><a class="cmtt" rel="0">&nbsp;</a></p>
                        </div>
                        <p class="clr"></p>
                    </div>
                    <!-- end content mark comment -->
                </div>
                <div id="popup5">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <p class="thongbao"></p>
                </div>
                <p class="clr"></p>  
    <script type="text/javascript">
        jQuery(document).ready(function(){
           $('.mark').live("click",function(){
                $.post("module/class/chondiem.php", function(data){
                   $('#content').html(data); 
                });
           }); 
           jQuery('.scrollbar-macosx').scrollbar();
           // chon truong
           
        $('select#sc').live("change",function(){
                var sci = $('#sc').val();
                var cl = $('#cl').val();
                if($('.hss').hasClass('act'))
                    var child_id = $('.hss.act').attr('rel');
                else
                    var child_id = 0;
                if($('.monhocc').hasClass('act'))
                    var practise = $('.monhocc.act').attr('rel');
                else
                    var practise = 0;
                if(practise == 0){
                    $('.namc').html('<a class="month"><?=date("Y")?></a>');
                } else {
                    $('.namc').html('<?=date("Y")?>');
                }
                if(practise == 0) var sbll = "show_binhluan.php";
                else var sbll = "show_binhluanthang.php";
                if(sci==0) {
                    $('#lisths').html('');
                } else {
                    if(cl != "") {
                        /*$.post("module/class/show_blmonhoc.php", {
							cl: cl,
                            practise: practise
						},  function(data){
						    $('.prc').html(data);
    					});*/
                        $.post("module/class/show_hs.php", {
                            cl: cl,
                            sci: sci
                        }, function(data){
                            $('#lisths').html(data);
                        });
                        $.post("module/class/"+sbll,{
                            sci: sci,
                            cl: cl,
                            child_id: child_id,
                            practise: practise
                        }, function(data){
                            $('.commentt').html(data);
                        });
                    } else {
                        $('#lisths').fadeIn('slow').html('');
                        //$('.commentt').html('');
                    }
                }
                
        }).change(); 
        // chon lop
        $('select#cl').live("change",function(){
                var sci = $('#sc').val();
                var cl = $('#cl').val();
                if($('.hss').hasClass('act'))
                    var child_id = $('.hss.act').attr('rel');
                else
                    var child_id = 0;
                if($('.monhocc').hasClass('act'))
                    var practise = $('.monhocc.act').attr('rel');
                else
                    var practise = 0;
                if(practise == 0) var sbll = "show_binhluan.php";
                else var sbll = "show_binhluanthang.php";
                if(sci==0) {
                    $('#lisths').html('');
                } else {
                    if(cl != "") {
                        $('.namc').html('<a class="month"><?=date("Y")?></a>');
                        $.post("module/class/show_blmonhoc.php", {
							cl: cl,
                            practise: practise
						},  function(data){
						    $('.prc').html(data);
    					});
                        $.post("module/class/show_hs.php", {
                            cl: cl,
                            sci: sci
                        }, function(data){
                            $('#lisths').html(data);
                        });
                        $.post("<?=URL?>module/class/show_binhluan.php",{
                            sci: sci,
                            cl: cl,
                            child_id: child_id,
                            practise: practise
                        }, function(data){
                            $('.commentt').html(data);
                        });
                    } else {
                        $('#lisths').fadeIn('slow').html('');
                        //$('.commentt').html('');
                    }
                }
                
        }).change(); 
        // chon hoc sinh
        $('.hss').live("click",function(){
           var child_id = $(this).attr('rel'); 
           var sci = $('#sc').val();
           var cl = $('#cl').val();
           if($('.monhocc').hasClass('act'))
            var practise = $('.monhocc.act').attr('rel');
           else
            var practise = 0;
           if(practise == 0) var sbll = "show_binhluan.php";
           else var sbll = "show_binhluanthang.php";
           $.post("<?=URL?>module/class/show_binhluan.php",{
            sci: sci,
            cl: cl,
            child_id: child_id,
            practise: practise
           }, function(data){
            $('.hss').removeClass('act');
            $('.hss[rel="'+child_id+'"]').addClass('act');
            $('.commentt').html(data);
           }); 
        });
        // chon mon hoc
        $('.monhocc').live("click",function(){
           var practise = $(this).attr('rel'); 
           if(practise !=0 )
                var thang = <?php echo $_SESSION["mnnnn"]; ?>;
            else
                var thang = 0;
           var sci = $('#sc').val();
           var cl = $('#cl').val();
           if($('.hss').hasClass('act'))
            var child_id = $('.hss.act').attr('rel');
           else
            var child_id = 0;
           if(thang == 0){
                $('.namc').html('<a class="month"><?=date("Y")?></a>');
            } else {
                $('.namc').html('<?=date("Y")?>');
            }
           if(practise == 0) var sbll = "show_binhluan.php";
           else var sbll = "show_binhluanthang.php";
           $.post("<?=URL?>module/class/"+sbll,{
            sci: sci,
            cl: cl,
            child_id: child_id,
            practise: practise,
            thang: thang
           }, function(data){
            var chame = $('.monhocc').parent();
            chame.removeClass('act');
            $('.monhocc[rel="'+practise+'"]').parent().addClass('act');
            $('.monhocc').removeClass('act');
            $('.monhocc[rel="'+practise+'"]').addClass('act');
            $('.commentt').html(data);
           }); 
        });
        // danh gia chung
        $('.cmtt').live("click",function(){
           var ree = $(this).attr('rel');
           var m = ree.split(";");
                var w = m[0];
                var sci = m[1];
                var cl = m[2];
                var child_id = m[3];
                var pr = m[4];
                var mon = m[5];
                var ww = sci+';'+cl+';'+child_id+';'+pr;
                if(sci !=0 && cl!='' && child_id!=0){
                    if(mon == 1) var t = '<input type="text" class="inn cmtmm" id="1">';
                    if(mon == 2) var t = '<input type="text" class="inn cmtmm" id="2">';
                    if(mon == 3) var t = '<input type="text" class="inn cmtmm" id="3">';
                    if(mon == 4) var t = '<input type="text" class="inn cmtmm" id="4">';
                    if(mon == 5) var t = '<input type="text" class="inn cmtmm" id="5">';
                    if(mon == 6) var t = '<input type="text" class="inn cmtmm" id="6">';
                    if(mon == 7) var t = '<input type="text" class="inn cmtmm" id="7">';
                    if(mon == 8) var t = '<input type="text" class="inn cmtmm" id="8">';
                    if(mon == 9) var t = '<input type="text" class="inn cmtmm" id="9">';
                    if(mon == 10) var t = '<input type="text" class="inn cmtmm" id="10">';
                    if(mon == 11) var t = '<input type="text" class="inn cmtmm" id="11">';
                    if(mon == 12) var t = '<input type="text" class="inn cmtmm" id="12">';
                    // get text
                    // month 1
                    var t1 = $('.wcmt1').html();
                    var t11 = $('.wcmt1').text();
                    if(t1=='<a class="cmtt" rel="1;'+ww+';1">&nbsp;</a>' || t1=='<input type="text" class="inn cmtmm" id="1">')
                        var tt1 = '<a class="cmtt" rel="1;'+ww+';1">&nbsp;</a>';
                    else 
                        var tt1 = '<a class="ecmtt" rel="1;'+ww+';1">'+t11+'</a>';
                    // month 2
                    var t2 = $('.wcmt2').html();
                    var t22 = $('.wcmt2').text();
                    if(t2=='<a class="cmtt" rel="2;'+ww+';2">&nbsp;</a>' || t2=='<input type="text" class="inn cmtmm" id="2">')
                        var tt2 = '<a class="cmtt" rel="2;'+ww+';2">&nbsp;</a>';
                    else 
                        var tt2 = '<a class="ecmtt" rel="2;'+ww+';2">'+t22+'</a>';
                    // month 3
                    var t3 = $('.wcmt3').html();
                    var t33 = $('.wcmt3').text();
                    if(t3=='<a class="cmtt" rel="3;'+ww+';3">&nbsp;</a>' || t3=='<input type="text" class="inn cmtmm" id="3">')
                        var tt3 = '<a class="cmtt" rel="3;'+ww+';3">&nbsp;</a>';
                    else
                        var tt3 = '<a class="ecmtt" rel="3;'+ww+';3">'+t33+'</a>';
                    // month 4
                    var t4 = $('.wcmt4').html();
                    var t44 = $('.wcmt4').text();
                    if(t4=='<a class="cmtt" rel="4;'+ww+';4">&nbsp;</a>' || t4=='<input type="text" class="inn cmtmm" id="4">') 
                        var tt4 = '<a class="cmtt" rel="4;'+ww+';4">&nbsp;</a>';
                    else 
                        var tt4 = '<a class="ecmtt" rel="4;'+ww+';4">'+t44+'</a>';
                    // month 5
                    var t5 = $('.wcmt5').html();
                    var t55 = $('.wcmt5').text();
                    if(t5=='<a class="cmtt" rel="5;'+ww+';5">&nbsp;</a>' || t5=='<input type="text" class="inn cmtmm" id="5">') 
                        var tt5 = '<a class="cmtt" rel="5;'+ww+';5">&nbsp;</a>';
                    else 
                        var tt5 = '<a class="ecmtt" rel="5;'+ww+';5">'+t55+'</a>';
                    // month 6                        
                    var t6 = $('.wcmt6').html();
                    var t66 = $('.wcmt6').text();
                    if(t6=='<a class="cmtt" rel="6;'+ww+';6">&nbsp;</a>' || t6=='<input type="text" class="inn cmtmm" id="6">') 
                        var tt6 = '<a class="cmtt" rel="6;'+ww+';6">&nbsp;</a>';
                    else 
                        var tt6 = '<a class="ecmtt" rel="6;'+ww+';6">'+t66+'</a>';
                    // month 7
                    var t7 = $('.wcmt7').html();
                    var t77 = $('.wcmt7').text();
                    if(t7=='<a class="cmtt" rel="7;'+ww+';7">&nbsp;</a>' || t7=='<input type="text" class="inn cmtmm" id="7">') 
                        var tt7 = '<a class="cmtt" rel="7;'+ww+';7">&nbsp;</a>';
                    else 
                        var tt7 = '<a class="ecmtt" rel="7;'+ww+';7">'+t77+'</a>';
                    // month 8
                    var t8 = $('.wcmt8').html();
                    var t88 = $('.wcmt8').text();
                    if(t8=='<a class="cmtt" rel="8;'+ww+';8">&nbsp;</a>' || t8=='<input type="text" class="inn cmtmm" id="8">') 
                        var tt8 = '<a class="cmtt" rel="8;'+ww+';8">&nbsp;</a>';
                    else 
                        var tt8 = '<a class="ecmtt" rel="8;'+ww+';8">'+t88+'</a>';
                    // month 9
                    var t9 = $('.wcmt9').html();
                    var t99 = $('.wcmt9').text();
                    if(t9=='<a class="cmtt" rel="9;'+ww+';9">&nbsp;</a>' || t9=='<input type="text" class="inn cmtmm" id="9">') 
                        var tt9 = '<a class="cmtt" rel="9;'+ww+';9">&nbsp;</a>';
                    else 
                        var tt9 = '<a class="ecmtt" rel="9;'+ww+';9">'+t99+'</a>';
                    // month 10 
                    var t10 = $('.wcmt10').html();
                    var t100 = $('.wcmt10').text();
                    if(t10=='<a class="cmtt" rel="10;'+ww+';10">&nbsp;</a>' || t10=='<input type="text" class="inn cmtmm" id="10">') 
                        var tt10 = '<a class="cmtt" rel="10;'+ww+';10">&nbsp;</a>';
                    else 
                        var tt10 = '<a class="ecmtt" rel="10;'+ww+';10">'+t100+'</a>';
                    // month 11
                    var t111 = $('.wcmt11').html();
                    var t1111 = $('.wcmt11').text();
                    if(t111=='<a class="cmtt" rel="11;'+ww+';11">&nbsp;</a>' || t111=='<input type="text" class="inn cmtmm" id="11">') 
                        var tt11 = '<a class="cmtt" rel="11;'+ww+';11">&nbsp;</a>';
                    else 
                        var tt11 = '<a class="ecmtt" rel="11;'+ww+';11">'+t1111+'</a>';
                    // month 12
                    var t12 = $('.wcmt12').html();
                    var t122 = $('.wcmt12').text();
                    if(t12=='<a class="cmtt" rel="12;'+ww+';12">&nbsp;</a>' || t12=='<input type="text" class="inn cmtmm" id="12">') 
                        var tt12 = '<a class="cmtt" rel="12;'+ww+';12">&nbsp;</a>';
                    else 
                        var tt12 = '<a class="ecmtt" rel="12;'+ww+';12">'+t122+'</a>';
                        
                    if(mon==1){
                        $('.wcmt1').html(t);
                        $('.wcmt2').html(tt2);
                        $('.wcmt3').html(tt3);
                        $('.wcmt4').html(tt4);
                        $('.wcmt5').html(tt5);
                        $('.wcmt6').html(tt6);
                        $('.wcmt7').html(tt7);
                        $('.wcmt8').html(tt8);
                        $('.wcmt9').html(tt9);
                        $('.wcmt10').html(tt10);
                        $('.wcmt11').html(tt11);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    } 
                    if(mon==2){
                        $('.wcmt2').html(t);
                        $('.wcmt1').html(tt1);
                        $('.wcmt3').html(tt3);
                        $('.wcmt4').html(tt4);
                        $('.wcmt5').html(tt5);
                        $('.wcmt6').html(tt6);
                        $('.wcmt7').html(tt7);
                        $('.wcmt8').html(tt8);
                        $('.wcmt9').html(tt9);
                        $('.wcmt10').html(tt10);
                        $('.wcmt11').html(tt11);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    } 
                    if(mon==3){
                        $('.wcmt3').html(t);
                        $('.wcmt2').html(tt2);
                        $('.wcmt1').html(tt1);
                        $('.wcmt4').html(tt4);
                        $('.wcmt5').html(tt5);
                        $('.wcmt6').html(tt6);
                        $('.wcmt7').html(tt7);
                        $('.wcmt8').html(tt8);
                        $('.wcmt9').html(tt9);
                        $('.wcmt10').html(tt10);
                        $('.wcmt11').html(tt11);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    } 
                    if(mon==4){
                        $('.wcmt4').html(t);
                        $('.wcmt2').html(tt2);
                        $('.wcmt3').html(tt3);
                        $('.wcmt1').html(tt1);
                        $('.wcmt5').html(tt5);
                        $('.wcmt6').html(tt6);
                        $('.wcmt7').html(tt7);
                        $('.wcmt8').html(tt8);
                        $('.wcmt9').html(tt9);
                        $('.wcmt10').html(tt10);
                        $('.wcmt11').html(tt11);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    } 
                    if(mon==5){
                        $('.wcmt5').html(t);
                        $('.wcmt2').html(tt2);
                        $('.wcmt3').html(tt3);
                        $('.wcmt4').html(tt4);
                        $('.wcmt1').html(tt1);
                        $('.wcmt6').html(tt6);
                        $('.wcmt7').html(tt7);
                        $('.wcmt8').html(tt8);
                        $('.wcmt9').html(tt9);
                        $('.wcmt10').html(tt10);
                        $('.wcmt11').html(tt11);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    } 
                    if(mon==6) {
                        $('.wcmt6').html(t);
                        $('.wcmt2').html(tt2);
                        $('.wcmt3').html(tt3);
                        $('.wcmt4').html(tt4);
                        $('.wcmt5').html(tt5);
                        $('.wcmt1').html(tt1);
                        $('.wcmt7').html(tt7);
                        $('.wcmt8').html(tt8);
                        $('.wcmt9').html(tt9);
                        $('.wcmt10').html(tt10);
                        $('.wcmt11').html(tt11);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    }
                    
                    if(mon==7){
                        $('.wcmt7').html(t);
                        $('.wcmt2').html(tt2);
                        $('.wcmt3').html(tt3);
                        $('.wcmt4').html(tt4);
                        $('.wcmt5').html(tt5);
                        $('.wcmt6').html(tt6);
                        $('.wcmt1').html(tt1);
                        $('.wcmt8').html(tt8);
                        $('.wcmt9').html(tt9);
                        $('.wcmt10').html(tt10);
                        $('.wcmt11').html(tt11);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    } 
                    if(mon==8){
                        $('.wcmt8').html(t);
                        $('.wcmt1').html(tt1);
                        $('.wcmt3').html(tt3);
                        $('.wcmt4').html(tt4);
                        $('.wcmt5').html(tt5);
                        $('.wcmt6').html(tt6);
                        $('.wcmt7').html(tt7);
                        $('.wcmt2').html(tt2);
                        $('.wcmt9').html(tt9);
                        $('.wcmt10').html(tt10);
                        $('.wcmt11').html(tt11);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    } 
                    if(mon==9){
                        $('.wcmt9').html(t);
                        $('.wcmt2').html(tt2);
                        $('.wcmt1').html(tt1);
                        $('.wcmt4').html(tt4);
                        $('.wcmt5').html(tt5);
                        $('.wcmt6').html(tt6);
                        $('.wcmt7').html(tt7);
                        $('.wcmt8').html(tt8);
                        $('.wcmt3').html(tt3);
                        $('.wcmt10').html(tt10);
                        $('.wcmt11').html(tt11);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    } 
                    if(mon==10){
                        $('.wcmt10').html(t);
                        $('.wcmt2').html(tt2);
                        $('.wcmt3').html(tt3);
                        $('.wcmt1').html(tt1);
                        $('.wcmt5').html(tt5);
                        $('.wcmt6').html(tt6);
                        $('.wcmt7').html(tt7);
                        $('.wcmt8').html(tt8);
                        $('.wcmt9').html(tt9);
                        $('.wcmt4').html(tt4);
                        $('.wcmt11').html(tt11);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    } 
                    if(mon==11){
                        $('.wcmt11').html(t);
                        $('.wcmt2').html(tt2);
                        $('.wcmt3').html(tt3);
                        $('.wcmt4').html(tt4);
                        $('.wcmt1').html(tt1);
                        $('.wcmt6').html(tt6);
                        $('.wcmt7').html(tt7);
                        $('.wcmt8').html(tt8);
                        $('.wcmt9').html(tt9);
                        $('.wcmt10').html(tt10);
                        $('.wcmt5').html(tt5);
                        $('.wcmt12').html(tt12);
                        $('.cmtmm').focus();
                    } 
                    if(mon==12) {
                        $('.wcmt12').html(t);
                        $('.wcmt2').html(tt2);
                        $('.wcmt3').html(tt3);
                        $('.wcmt4').html(tt4);
                        $('.wcmt5').html(tt5);
                        $('.wcmt1').html(tt1);
                        $('.wcmt7').html(tt7);
                        $('.wcmt8').html(tt8);
                        $('.wcmt9').html(tt9);
                        $('.wcmt10').html(tt10);
                        $('.wcmt11').html(tt11);
                        $('.wcmt6').html(tt6);
                        $('.cmtmm').focus();
                    }
                    $('.cmtmm').live("keyup",function(e){
                        e.preventDefault();
                        var id = $(this).attr('id');
                        var cmtt = $(this).val();
                        if(e.keyCode == 13){
                            $.post("module/class/comment.php",{
                                w: w,
                                sci: sci,
                                cl: cl,
                                child_id: child_id,
                                pr: pr,
                                mon: id,
                                cmtt: cmtt
                            }, function(data){
                                    $('.wcmt'+data).html('<a class="ecmtt" rel="'+data+';'+ww+';'+data+'">'+cmtt+'</a></p>');
                            });
                        }
                        
                    });
                } else {
                    if(sci == 0){
                        $('p.thongbao').html('<?=_chuachontruong?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#sc').focus();
                        return false;
                    }
                    if(cl == ''){
                        $('p.thongbao').html('<?=_chuachonlop?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#cl').focus();
                        return false;
                    }
                    if(child_id == 0){
                        $('p.thongbao').html('<?=_chuachonhs?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                    }
                    if(child_id == 0 && sci == 0 && cl == ''){
                        $('p.thongbao').html('<?=_chuachongi?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                    }
                }
           
           
        });
        
        // danh gia tung mon
        $('.mcmtt').live("click",function(){
           var ree = $(this).attr('rel');
           var m = ree.split(";");
           if(m[0]=='meditcmt') {
                var mon = m[1];
                var sci = m[2];
                var cl = m[3];
                var child_id = m[4];
                var pr = m[5];
           } else {
                var mon = m[0];
                var sci = m[1];
                var cl = m[2];
                var child_id = m[3];
                var pr = m[4];
                var ww = sci+';'+cl+';'+child_id+';'+pr;
                if(sci !=0 && cl!='' && child_id!=0){
                    if(mon == 1) var t = '<input type="text" class="inn mcmtmm" id="1" />';
                    if(mon == 2) var t = '<input type="text" class="inn mcmtmm" id="2" />';
                    if(mon == 3) var t = '<input type="text" class="inn mcmtmm" id="3" />';
                    if(mon == 4) var t = '<input type="text" class="inn mcmtmm" id="4" />';
                    if(mon == 5) var t = '<input type="text" class="inn mcmtmm" id="5" />';
                    if(mon == 6) var t = '<input type="text" class="inn mcmtmm" id="6" />';
                    if(mon == 7) var t = '<input type="text" class="inn mcmtmm" id="7" />';
                    if(mon == 8) var t = '<input type="text" class="inn mcmtmm" id="8" />';
                    if(mon == 9) var t = '<input type="text" class="inn mcmtmm" id="9" />';
                    if(mon == 10) var t = '<input type="text" class="inn mcmtmm" id="10" />';
                    if(mon == 11) var t = '<input type="text" class="inn mcmtmm" id="11" />';
                    if(mon == 12) var t = '<input type="text" class="inn mcmtmm" id="12" />';
                    // get text
                    
                    var t1 = $('.mcmt1').html();
                    var t11 = $('.mcmt1').text();
                    if(t1=='<a class="mcmtt" rel="1;'+ww+'">&nbsp;</a>' || t1=='<input type="text" class="inn mcmtmm" id="1">') 
                        var tt1 = '<a class="mcmtt" rel="1;'+ww+'">&nbsp;</a>';
                    else 
                        var tt1 = '<a class="mcmtt" rel="meditcmt;1;'+ww+'">'+t11+'</a>';
                    var t2 = $('.mcmt2').html();
                    var t22 = $('.mcmt2').text();
                    if(t2=='<a class="mcmtt" rel="2;'+ww+'">&nbsp;</a>' || t2=='<input type="text" class="inn mcmtmm" id="2">') 
                        var tt2 = '<a class="mcmtt" rel="2;'+ww+'">&nbsp;</a>';
                    else 
                        var tt2 = '<a class="mcmtt" rel="meditcmt;2;'+ww+'">'+t22+'</a>';
                    var t3 = $('.mcmt3').html();
                    var t33 = $('.mcmt3').text();
                    if(t3=='<a class="mcmtt" rel="3;'+ww+'">&nbsp;</a>' || t3=='<input type="text" class="inn mcmtmm" id="3">') 
                        var tt3 = '<a class="mcmtt" rel="3;'+ww+'">&nbsp;</a>';
                    else 
                        var tt3 = '<a class="mcmtt" rel="meditcmt;3;'+ww+'">'+t33+'</a>';
                    var t4 = $('.mcmt4').html();
                    var t44 = $('.mcmt4').text();
                    if(t4=='<a class="mcmtt" rel="4;'+ww+'">&nbsp;</a>' || t4=='<input type="text" class="inn mcmtmm" id="4">') 
                        var tt4 = '<a class="mcmtt" rel="4;'+ww+'">&nbsp;</a>';
                    else 
                        var tt4 = '<a class="mcmtt" rel="meditcmt;4;'+ww+'">'+t44+'</a>';
                    var t5 = $('.mcmt5').html();
                    var t55 = $('.mcmt5').text();
                    if(t5=='<a class="mcmtt" rel="5;'+ww+'">&nbsp;</a>' || t5=='<input type="text" class="inn mcmtmm" id="5">') 
                        var tt5 = '<a class="mcmtt" rel="5;'+ww+'">&nbsp;</a>';
                    else 
                        var tt5 = '<a class="mcmtt" rel="meditcmt;5;'+ww+'">'+t55+'</a>';
                    var t6 = $('.mcmt6').html();
                    var t66 = $('.mcmt6').text();
                    if(t6=='<a class="mcmtt" rel="6;'+ww+'">&nbsp;</a>' || t6=='<input type="text" class="inn mcmtmm" id="6">') 
                        var tt6 = '<a class="mcmtt" rel="6;'+ww+'">&nbsp;</a>';
                    else 
                        var tt6 = '<a class="mcmtt" rel="meditcmt;6;'+ww+'">'+t66+'</a>';
                        
                    var t7 = $('.mcmt7').html();
                    var t77 = $('.mcmt7').text();
                    if(t7=='<a class="mcmtt" rel="7;'+ww+'">&nbsp;</a>' || t7=='<input type="text" class="inn mcmtmm" id="7">') 
                        var tt7 = '<a class="mcmtt" rel="7;'+ww+'">&nbsp;</a>';
                    else 
                        var tt7 = '<a class="mcmtt" rel="meditcmt;7;'+ww+'">'+t77+'</a>';
                    var t8 = $('.mcmt8').html();
                    var t88 = $('.mcmt8').text();
                    if(t8=='<a class="mcmtt" rel="8;'+ww+'">&nbsp;</a>' || t8=='<input type="text" class="inn mcmtmm" id="8">') 
                        var tt8 = '<a class="mcmtt" rel="8;'+ww+'">&nbsp;</a>';
                    else 
                        var tt8 = '<a class="mcmtt" rel="meditcmt;8;'+ww+'">'+t88+'</a>';
                    var t9 = $('.mcmt9').html();
                    var t99 = $('.mcmt9').text();
                    if(t9=='<a class="mcmtt" rel="9;'+ww+'">&nbsp;</a>' || t9=='<input type="text" class="inn mcmtmm" id="9">') 
                        var tt9 = '<a class="mcmtt" rel="9;'+ww+'">&nbsp;</a>';
                    else 
                        var tt9 = '<a class="mcmtt" rel="meditcmt;9;'+ww+'">'+t99+'</a>';
                    var t10 = $('.mcmt10').html();
                    var t100 = $('.mcmt10').text();
                    if(t10=='<a class="mcmtt" rel="10;'+ww+'">&nbsp;</a>' || t10=='<input type="text" class="inn mcmtmm" id="10">') 
                        var tt10 = '<a class="mcmtt" rel="10;'+ww+'">&nbsp;</a>';
                    else 
                        var tt10 = '<a class="mcmtt" rel="meditcmt;10;'+ww+'">'+t100+'</a>';
                    var t011 = $('.mcmt11').html();
                    var t111 = $('.mcmt11').text();
                    if(t011=='<a class="mcmtt" rel="11;'+ww+'">&nbsp;</a>' || t011=='<input type="text" class="inn mcmtmm" id="11">') 
                        var tt11 = '<a class="mcmtt" rel="11;'+ww+'">&nbsp;</a>';
                    else 
                        var tt11 = '<a class="mcmtt" rel="meditcmt;11;'+ww+'">'+t111+'</a>';
                    var t12 = $('.mcmt12').html();
                    var t122 = $('.mcmt12').text();
                    if(t12=='<a class="mcmtt" rel="12;'+ww+'">&nbsp;</a>' || t12=='<input type="text" class="inn mcmtmm" id="12">') 
                        var tt12 = '<a class="mcmtt" rel="12;'+ww+'">&nbsp;</a>';
                    else 
                        var tt12 = '<a class="mcmtt" rel="meditcmt;12;'+ww+'">'+t122+'</a>';
                    
                    if(mon==1){
                        $('.mcmt1').html(t);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    } 
                    if(mon==2){
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(t);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    } 
                    if(mon==3){
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(t);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    } 
                    if(mon==4){
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(t);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    } 
                    if(mon==5){
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(t);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    } 
                    if(mon==6) {
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(t);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    }
                    if(mon==7){
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(t);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    }
                    if(mon==8){
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(t);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    }
                    if(mon==9){
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(t);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    }
                    if(mon==10){
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(t);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    }
                    if(mon==11){
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(t);
                        $('.mcmt12').html(tt12);
                        $('.mcmtmm').focus();
                    }
                    if(mon==12){
                        $('.mcmt1').html(tt1);
                        $('.mcmt2').html(tt2);
                        $('.mcmt3').html(tt3);
                        $('.mcmt4').html(tt4);
                        $('.mcmt5').html(tt5);
                        $('.mcmt6').html(tt6);
                        $('.mcmt7').html(tt7);
                        $('.mcmt8').html(tt8);
                        $('.mcmt9').html(tt9);
                        $('.mcmt10').html(tt10);
                        $('.mcmt11').html(tt11);
                        $('.mcmt12').html(t);
                        $('.mcmtmm').focus();
                    }
                    $('.mcmtmm').live("keyup",function(e){
                        e.preventDefault();
                        var id = $(this).attr('id');
                        var cmtt = $(this).val();
                        if(e.keyCode == 13){
                            $.post("module/class/comment_thang.php",{
                                mon: id,
                                sci: sci,
                                cl: cl,
                                child_id: child_id,
                                pr: pr,
                                cmtt: cmtt
                            }, function(data){
                                
                                    if(id==1){
                                        $('.mcmt1').html('<a class="mcmtt" rel="meditcmt;1;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==2){
                                        $('.mcmt2').html('<a class="mcmtt" rel="meditcmt;2;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==3){
                                        $('.mcmt3').html('<a class="mcmtt" rel="meditcmt;3;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==4){
                                        $('.mcmt4').html('<a class="mcmtt" rel="meditcmt;4;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==5){
                                        $('.mcmt5').html('<a class="mcmtt" rel="meditcmt;5;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==6){
                                        $('.mcmt6').html('<a class="mcmtt" rel="meditcmt;6;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==7){
                                        $('.mcmt7').html('<a class="mcmtt" rel="meditcmt;7;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==8){
                                        $('.mcmt8').html('<a class="mcmtt" rel="meditcmt;8;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==9){
                                        $('.mcmt9').html('<a class="mcmtt" rel="meditcmt;9;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==10){
                                        $('.mcmt10').html('<a class="mcmtt" rel="meditcmt;10;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==11){
                                        $('.mcmt11').html('<a class="mcmtt" rel="meditcmt;11;'+ww+'">'+cmtt+'</a></p>');
                                    }
                                    if(id==12){
                                        $('.mcmt12').html('<a class="mcmtt" rel="meditcmt;12;'+ww+'">'+cmtt+'</a></p>');
                                    }
                            });
                        }
                        
                    });
                } else {
                    if(sci == 0){
                        $('p.thongbao').html('<?=_chuachontruong?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#sc').focus();
                        return false;
                    }
                    if(cl == ''){
                        $('p.thongbao').html('<?=_chuachonlop?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#cl').focus();
                        return false;
                    }
                    if(child_id == 0){
                        $('p.thongbao').html('<?=_chuachonhs?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                    }
                }
                
           }
           
           
        });
        
        // chon thang
        /*
        $('.month').live("click",function(){
           $('.chthang').toggle(); 
        });
        $('.chonthang').live("click",function(){
           var thang = $(this).attr('rel');
           var school_id = $('#sc').val();
           var class_id = $('#cl').val();
           if($('.hss').hasClass('act')){
            var child_id = $('.hss.act').attr('rel');
           } else var child_id = 0;
           if($('.monhocc').hasClass('act'))
            var practise = $('.monhocc.act').attr('rel');
           else
            var practise = 0;
           
           $.post("module/class/show_thangbl.php", {
                thang: thang,
                sci: school_id,
                cl: class_id,
                child_id: child_id,
                practise: practise
           }, function(data){
                $('.chthang').hide();
                var m = data.split('mnm;mnm');
                $('.commentt').html(m[0]);
                $('.th').html(m[1]);
           });           
           
           
        });
        */
        });
    </script>                          
<?php }  ?>           
     
            </div>
