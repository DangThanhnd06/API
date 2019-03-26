<?php
    include("../../require_inc.php");
    $_SESSION['chonmcc'] = 'markkk';
?>
<div class="searchcl">
                    <div  class="search">
                        <?=_search?>
                    </div>
                    <div class="ctsearch">
                        <?php if($_SESSION['quyenper'] == 1 || $_SESSION['quyenper'] == 3) { ?>
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
                                        if(isset($_SESSION['schoolsci']) && $_SESSION['schoolsci']==$rcb['id']) $seld = ' selected';
                                        else $seld = '';
                                        echo '<option value="'.$rcb["id"].'"'.$seld.'>'.$tr.'</option>';
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
                                                if(isset($_SESSION['classcl']) && $_SESSION['classcl'] == $rcl['tenlop']) $seldcl = ' selected';
                                                else $seldcl = '';
                                                echo '<option value="'.$rcl['tenlop'].'"'.$seldcl.'>'.$rcl['tenlop'].'</option>';
                                            }
                                        ?>
                            </select>
                        </div>
                        <div class="child scrollbar-macosx">
                            <ul id="lisths">
                            <?php
                                if(isset($_SESSION['schoolsci']) && isset($_SESSION['classcl'])){
                                    $shss = $h->query("select id,fname,mname from children where school_id=".$_SESSION["schoolsci"]." and class_gr='".$_SESSION['classcl']."' and hide=1 order by fname asc,id asc");
                                    $ihss = 1;
                                    $msghss = "";
                                    while($rhss = $h->fetch_array($shss)){
                                        if($ihss%2==0) $clshss = ' class="odd"';
                                        else $clshss = ' class="even"';
                                        if($lang == 'vn') $namehss = $rhss['fname'].' '.$rhss['mname'];
                                        else $namehss = change($rhss['fname'].' '.$rhss['mname']);
                                        $msghss .= '<li'.$clshss.'><a class="hss" rel="'.$rhss['id'].'">'.$ihss.'. '.$namehss.'</a></li>';
                                        $ihss++;
                                    }
                                    echo $msghss;
                                }
                            ?>                
                            </ul>
                        </div>
                    <?php } else { ?>
                        <div class="child scrollbar-macosx">
                            <ul id="lisths">
                            <?php
                                $shs = $h->query("select id,fname,mname from children where teacher_id=".$_SESSION['idadmin']." and hide=1 order by fname asc,id asc");
                                $ihs = 1;
                                $msgh = "";
                                while($rhs = $h->fetch_array($shs)){
                                    if($i%2==0) $cls = ' class="odd"';
                                    else $cls = ' class="even"';
                                    if($lang == 'vn') $name = $rhs['fname'].' '.$rhs['mname'];
                                    else $name = change($rhs['fname'].' '.$rhs['mname']);
                                    $msgh .= '<li'.$cls.'><a class="hss" rel="'.$rhs['id'].'">'.$ihs.'. '.$name.'</a></li>';
                                    $ihs++;
                                }
                                echo $msgh;
                            ?>
                            </ul>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="rightcl">
                    <p class="mark act"><?=_mark?></p>
                    <!--<p class="comment"><?=_comment?></p>-->
                    <p class="commu"><?=_comcorner?></p>
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
                                    if($_SESSION['quyenper'] == 1)
                                        $smh = $h->query("select id,name_vn,name_en from practise where clg='Blude Cylinder' and hide=1 order by sort asc,id asc");
                                    else
                                        $smh = $h->query("select id,name_vn,name_en from practise where clg='".$_SESSION['classgvcn']."' and hide=1 order by sort asc,id asc");
                                    $imh = 0;
                                    $nmh = $h->num_rows($smh);
                                    if($nmh){
                                        while($rmh = $h->fetch_array($smh)){
                                            if($imh==0) $cls = ' class="act"';
                                            else $cls = '';
                                            $msgg .= '<p'.$cls.'><a class="monhoc" rel="'.$rmh['id'].'">'.$rmh["name_$lang"].'</a></p>';
                                            $imh++;
                                        }
                                        echo $msgg;
                                    }
                                    
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
                        <!--
                        <div class="week">
                            <?php 
                                /*$mthang = array("1"=>_thang1,"2"=>_thang2,"3"=>_thang3,"4"=>_thang4,"5"=>_thang5,"6"=>_thang6,"7"=>_thang7,"8"=>_thang8,"9"=>_thang9,"10"=>_thang10,"11"=>_thang11,"12"=>_thang12);
                                foreach($mthang as $k=>$v){
                                    if($k == $_SESSION['mnnn'])
                                        echo '<a class="chonthg act" rel="'.$k.'">'.$v.'</a>';
                                    else
                                        echo '<a class="chonthg" rel="'.$k.'">'.$v.'</a>';
                                }*/
                            ?>
                        </div>
                        -->
                        <div class="mhocnd">
                            <div class="ndmh">
                                <div class="monh">
                                <?php
                                    if($_SESSION['quyenper'] == 4){
                                        $smhh = $h->query("select id,name_vn,name_en from practise where clg='".$_SESSION['classgvcn']."' and hide=1 order by sort asc,id asc");
                                        $nmhh = $h->num_rows($smhh);
                                        if($nmhh){
                                            $rmhh = $h->fetch_array($smhh);
                                            $idpp = $rmhh['id'];
                                            $sh = $h->query("select id,name_vn,name_en from monhoc where pr_id=$idpp order by sort asc,id asc");
                                            $nh = $h->num_rows($sh);
                                            if($nh){
                                                $ii = 0;
                                                while($rh = $h->fetch_array($sh)){
                                                    if($ii==0){
                                                        $idh = $rh['id'];
                                                        $acth = ' act';
                                                    } else $acth = '';
                                                    $mh .= '<a class="chonbh'.$acth.'" rel="'.$rh['id'].'">'.$rh["name_$lang"].'</a>';
                                                    $ii++;
                                                }
                                                $sn = $h->query("select id,detail_vn,detail_en from lessons where lesson_id=$idh order by id asc"); //  and year=$yr and month=".$_SESSION['mnnn']."
                                                $iii = 0;
                                                $nd = $h->num_rows($sn);
                                                if($nd){
                                                    while($rn = $h->fetch_array($sn)){
                                                        if($iii == 0) {
                                                            $cln = ' act';
                                                        } else $cln = '';
                                                        $mn .= '<a class="chonnd'.$cln.'" rel="'.$rn['id'].'">'.$rn["detail_$lang"].'</a>';
                                                        $iii++; 
                                                    }
                                                }
                                                echo $mh;
                                            }   
                                         } 
                                    } else {
                                        if(isset($_SESSION['classcl']) && $_SESSION['classcl'] != '') {
                                            $smhh = $h->query("select id,name_vn,name_en from practise where clg='".$_SESSION['classcl']."' and hide=1 order by sort asc,id asc");
                                            $rmhh = $h->fetch_array($smhh);
                                            $idpp = $rmhh['id'];
                                            $sh = $h->query("select id,name_vn,name_en from monhoc where pr_id=$idpp order by sort asc,id asc");
                                            $nh = $h->num_rows($sh);
                                            if($nh){
                                                $ii = 0;
                                                while($rh = $h->fetch_array($sh)){
                                                    if($ii==0){
                                                        $idh = $rh['id'];
                                                        $acth = ' act';
                                                    } else $acth = '';
                                                    $mh .= '<a class="chonbh'.$acth.'" rel="'.$rh['id'].'">'.$rh["name_$lang"].'</a>';
                                                    $ii++;
                                                }
                                                $sn = $h->query("select id,detail_vn,detail_en from lessons where lesson_id=$idh order by id asc"); //  and year=$yr and month=".$_SESSION['mnnn']."
                                                $iii = 0;
                                                $nd = $h->num_rows($sn);
                                                if($nd){
                                                    while($rn = $h->fetch_array($sn)){
                                                        if($iii == 0) {
                                                            $cln = ' act';
                                                        } else $cln = '';
                                                        $mn .= '<a class="chonnd'.$cln.'" rel="'.$rn['id'].'">'.$rn["detail_$lang"].'</a>';
                                                        $iii++; 
                                                    }
                                                }
                                                echo $mh;
                                            }
                                        }
                                    }
                                ?>    
                                </div>
                                <div class="ndung">
                                <?php
                                        //if($_SESSION['quyenper'] == 4){
                                            echo $mn;   
                                        //}
                                    ?>    
                                </div>
                                <p class="clr"></p>
                            </div>
                            <!--<div class="average"><?=_averagemark?></div>-->
                        </div>
                        <div class="mdiem">
                            <div class="diemmnt">
                                <p class="ttl"><img src="img/star_on.png" width="20" alt="1 star" /></p>
                                <p class="ngaycham" id="ncos"></p>
                            </div>
                            <div class="diemmnt">
                                <p class="ttl"><img src="img/star_on.png" width="20" alt="1 star" /><img src="img/star_on.png" width="20" alt="2 star" /></p>
                                <p class="ngaycham" id="nctos"></p>
                            </div>
                            <div class="diemmnt" style="border-right:0;">
                                <p class="ttl"><img src="img/star_on.png" width="20" alt="1 star" /><img src="img/star_on.png" width="20" alt="1 star" /><img src="img/star_on.png" width="20" alt="1 star" /></p>
                                <p class="ngaycham" id="ncts"></p>
                            </div>
                            <p class="clr"></p>
                        </div>
                        <p class="clr"></p>
                    </div>
                    <!-- end content mark comment -->
                </div>
                <!-- add date star -->
                <div id="popup2" class="ghpopup">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"></h2>
                    <div class="form scrollbar-macosx">
                        <form>
                            <input type="hidden" id="sosao" value="" />
                            <input type="hidden" id="idsc" value="" />
                            <input type="hidden" id="tenlop" value="" />
                            <input type="hidden" id="idhss" value="" />
                            <input type="hidden" id="idprac" value="" />
                            <input type="hidden" id="lessonid" value="" />
                            <input type="hidden" id="iddetail" value="" />
                            <div>
                                <label for="fname"><?=_ngaythang?></label>
                                <input type="text" name="ngaythang" id="ngaythang" class="in" />
                            </div>
                            <div>
                                <input type="button" class="gui" id="adds" value="<?=_add?>" />
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- edit date star -->
                <div id="popup7" class="ghpopup">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"></h2>
                    <div class="form scrollbar-macosx">
                        <form>
                            <input type="hidden" id="sos" value="" />
                            <input type="hidden" id="ids" value="" />
                            <div>
                                <label for="fname"><?=_ngaythang?></label>
                                <input type="text" name="ngaythang11" id="ngaythang11" class="in" />
                            </div>
                            <div>
                                <input type="button" class="gui" id="edds" value="<?=_edit?>" />
                            </div>
                        </form>
                    </div>
                </div>
                <div id="popup5">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <p class="thongbao"></p>
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
        $('.commu').live("click",function(){
                $.post("<?=URL?>module/class/choncom.php", function(data){
                    $('#content').html(data);
                });
        });
        jQuery('#ngaythang').datetimepicker({
         lang:'vn',
         i18n:{
          vn:{
           months:[
            'Jan','Feb','Mar','Apr',
            'May','Jun','Jul','Aug',
            'Sep','Oct','Nov','Dec',
           ],
           dayOfWeek:[
            "Su", "Mo", "Tu", "We", 
            "Th", "Fr", "Sa",
           ]
          }
         },
         timepicker:false,
         format:'d/m'
        });
        jQuery('#ngaythang11').datetimepicker({
         lang:'vn',
         i18n:{
          vn:{
           months:[
            'Jan','Feb','Mar','Apr',
            'May','Jun','Jul','Aug',
            'Sep','Oct','Nov','Dec',
           ],
           dayOfWeek:[
            "Su", "Mo", "Tu", "We", 
            "Th", "Fr", "Sa",
           ]
          }
         },
         timepicker:false,
         format:'d/m'
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
                            $('#ncos').html('');
                            $('#nctos').html('');
                            $('#ncts').html('');
                            //$('.week').html(m[3]);
    					});
                    } else {
                        //$('#monhocmark').fadeIn('slow').html('');
                        $('.monh').html('');
                        $('.ndung').html('');
                        $('#ncos').html('');
                        $('#nctos').html('');
                        $('#ncts').html('');
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
                            $('#ncos').html('');
                            $('#nctos').html('');
                            $('#ncts').html('');
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
           
           // 1
           $('#idsc').val(school_id);
           $('#tenlop').val(class_id);
           $('#idhss').val(child_id);
           $('#idprac').val(practice);
           $('#lessonid').val(lesson);
           $('#iddetail').val(detail_id);
           
                                  
           $.post("module/class/show_ngaydiem.php",{
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
            $('#ncos').html(m[0]);
            $('#nctos').html(m[1]);
            $('#ncts').html(m[2]);
           });
           
        });
        // .themngay
        $('.themngay').live('click', function(){
           var so = $(this).attr('rel');
           $('#sosao').val(so); 
           if(so == 1) $('.tieudepop').html("<?=_themngay1sao?>");
           if(so == 2) $('.tieudepop').html("<?=_themngay2sao?>");
           if(so == 3) $('.tieudepop').html("<?=_themngay3sao?>");
           $('#popup2').bPopup({
       	    speed: 650,
            transition: 'slideIn',
            transitionClose: 'easeOutCubic'
           });
        });
        // .suangay
        $('.suangay').live('click', function(){
            var rell = $(this).attr('rel');
            var ml = rell.split(';');
            var so = ml[0];
            var id = ml[1];
            $('#ids').val(id);
            $('#sos').val(so);
            if(so == 1) $('.tieudepop').html("<?=_suangay1sao?>");
            if(so == 2) $('.tieudepop').html("<?=_suangay2sao?>");
            if(so == 3) $('.tieudepop').html("<?=_suangay3sao?>");
            $.post("module/class/ndsua_ngaydiem.php",{so: so, id: id}, function(data){
                $('#ngaythang11').val(data);
                $('#popup7').bPopup({
           	    speed: 650,
                transition: 'slideIn',
                transitionClose: 'easeOutCubic'
               });
            });
        });
        // #edds
        $('#edds').live('click', function(){
           var id = $('#ids').val();
           var ngaythang = $('#ngaythang11').val();
           var so = $('#sos').val();
           $('#loading').show();
           $('#edds').attr('disabled','true');
           $.post("module/class/edit_ngaydiem.php",{id: id, ngaythang: ngaythang, so: so}, function(data){
            bclose7();
            $('#loading').hide();
            $('#edds').removeAttr('disabled');
            $('p.thongbao').html('<?=_suangaythanhcong?>');
            $('#popup5').bPopup({
                autoClose: 1500
            });
            if(so == 1) $('#ncos').html(data);
            if(so == 2) $('#nctos').html(data);
            if(so == 3) $('#ncts').html(data);
           }); 
        });
        // #adds
        $('#adds').live('click', function(){
            var so = $('#sosao').val();
            var idsc = $('#idsc').val();
            var tenlop = $('#tenlop').val();
            var idhs = $('#idhss').val();
            var idprac = $('#idprac').val();
            var lessonid = $('#lessonid').val();
            var iddetail = $('#iddetail').val();
            var ngaythang = $('#ngaythang').val();
            if(ngaythang == ''){
                $('p.thongbao').html('<?=_chuachonngay?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#ngaythang').focus();
                return false;
            }
            $('#loading').show();
            $('#adds').attr('disabled','true');
            $.post("module/class/addngaydiem.php",{
               so: so,
               idsc: idsc,
               tenlop: tenlop,
               idhs: idhs,
               idprac: idprac,
               lessonid: lessonid,
               iddetail: iddetail,
               ngaythang: ngaythang 
            }, function(data){
                bclose2();
                $('#loading').hide();
                $('#adds').removeAttr('disabled');
                $('p.thongbao').html('<?=_themngaytc?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                if(so == 1) $('#ncos').html(data);
                if(so == 2) $('#nctos').html(data);
                if(so == 3) $('#ncts').html(data);
                $('#ngaythang').val('');
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
           $('#idprac').val(practice);
           $.post("module/class/show_pracdiem.php",{
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
            $('.monh').html(m[0]);
            $('.ndung').html(m[1]);
            $('#ncos').html(m[2]);
            $('#nctos').html(m[3]);
            $('#ncts').html(m[4]);
            $('#lessonid').val(m[5]);
            $('#iddetail').val(m[6]);
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
           $('#lessonid').val(lesson);
           $.post("module/class/show_detaildiem.php",{
            school_id: school_id,
            class_id: class_id,
            child_id: child_id,
            practice: practice,
            lesson: lesson
           }, function(data){
            $('.chonbh').removeClass('act');
            $('.chonbh[rel="'+lesson+'"]').addClass('act');
            var m = data.split(';;;');
            $('.ndung').html(m[0]);
            $('#ncos').html(m[1]);
            $('#nctos').html(m[2]);
            $('#ncts').html(m[3]);
            $('#iddetail').val(m[4]);
           });
           
        });
        
        // cho diem
        $('.chonnd').live("click",function(){
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
           }
           else lesson = 0;
           var detail_id = $(this).attr('rel');
           $('#iddetail').val(detail_id);
           $.post("module/class/show_diem.php",{
            school_id: school_id,
            class_id: class_id,
            child_id: child_id,
            practice: practice,
            lesson: lesson,
            detail_id: detail_id
           }, function(data){
            $('.chonnd').removeClass('act');
            $('.chonnd[rel="'+detail_id+'"]').addClass('act');
            var m = data.split(';;;');
            $('#ncos').html(m[0]);
            $('#nctos').html(m[1]);
            $('#ncts').html(m[2]);
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