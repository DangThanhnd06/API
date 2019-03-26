<?php
    include("../../require_inc.php");
    $_SESSION['chthang'] = date('n');
    $_SESSION['chonmcc'] = 'comunication';
?>
    <div class="searchcl">
    
        <div  class="search"><?=_search?></div>
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
                        if($ihs%2==0) $cls = ' class="odd"';
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
        <p class="mark"><?=_mark?></p>
        <!--<p class="comment"><?=_comment?></p>-->
        <p class="commu act"><?=_comcorner?></p>
        <p class="clr"></p>
        <div id="diem">
            <div class="title">
                <div class="namc">
                    <?php
                        $mthg = array('1'=>_thang1,'2'=>_thang2,'3'=>_thang3,'4'=>_thang4,'5'=>_thang5,'6'=>_thang6,'7'=>_thang7,'8'=>_thang8,'9'=>_thang9,'10'=>_thang10,'11'=>_thang11,'12'=>_thang12);
                        foreach($mthg as $kth=>$vth){
                            if($kth == $_SESSION['chthang'])
                                echo '<a class="chonthang actt" rel="'.$kth.'">'.$vth.'</a>';
                        }
                    ?>
                    <div class="thangcm">
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '1') ? ' actt':''; ?>" rel="1"><?=_thang1?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '2') ? ' actt':''; ?>" rel="2"><?=_thang2?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '3') ? ' actt':''; ?>" rel="3"><?=_thang3?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '4') ? ' actt':''; ?>" rel="4"><?=_thang4?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '5') ? ' actt':''; ?>" rel="5"><?=_thang5?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '6') ? ' actt':''; ?>" rel="6"><?=_thang6?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '7') ? ' actt':''; ?>" rel="7"><?=_thang7?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '8') ? ' actt':''; ?>" rel="8"><?=_thang8?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '9') ? ' actt':''; ?>" rel="9"><?=_thang9?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '10') ? ' actt':''; ?>" rel="10"><?=_thang10?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '11') ? ' actt':''; ?>" rel="11"><?=_thang11?></a>
                        <a class="moncm<?php echo ($_SESSION['chthang'] == '12') ? ' actt':''; ?>" rel="12"><?=_thang12?></a>
                    </div>
                </div>
                <div class="pracc">
                    <div class="prc">
                        <p class="<?=$lang?> act"><a class="monhocc act" rel="0"><?=_content?></a></p>
                    </div>
                </div>
                <p class="clr"></p>
            </div>
        </div>
                    <!-- content mark comment -->
                    <div class="markcomment">
                        <div class="week">
                            <?php 
                                $mthang = array("1"=>'1',"2"=>'2',"3"=>'3',"4"=>'4',"5"=>'5');
                                foreach($mthang as $k=>$v){
                                    echo '<a class="chontuann" rel="'.$k.'">'._lessweek.' '.$v.'</a>';
                                }
                            ?>
                        </div>
                        <div class="commentt">
                            <p class="gt1"><a class="addcom" rel="0">&nbsp;</a></p>
                            <p class="gt2"><a class="addcom" rel="0">&nbsp;</a></p>
                            <p class="gt3"><a class="addcom" rel="0">&nbsp;</a></p>
                            <p class="gt4"><a class="addcom" rel="0">&nbsp;</a></p>
                            <p class="gt5"><a class="addcom" rel="0">&nbsp;</a></p>
                        </div>
                        <p class="clr"></p>
                    </div>
                    <!-- end content mark comment -->
                </div>
                <!-- add com -->
        <div id="popup" class="ghpopup">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_themcom?></h2>
            <div class="form scrollbar-macosx">
                <form>
                    <input type="hidden" id="idsc" value="" />
                    <input type="hidden" id="idlop" value="" />
                    <input type="hidden" id="idhs" value="" />
                    <input type="hidden" id="tuanthem" value="" />
                    <div>
                        <label for="fname"><?=_tungay?></label>
                        <input type="text" name="tungay" id="tungay" class="in" />
                    </div>
                    <div>
                        <label for="mname"><?=_denngay?></label>
                        <input type="text" name="denngay" id="denngay" class="in" />
                    </div>
                    
                    <div>
                        <label for="lname"><?=_nhanxet?></label>
                        <textarea id="noidungnx" name="noidungnx"></textarea>
                    </div>
                    <div>
                        <input type="button" class="gui" id="addcommu" value="<?=_add?>" />
                    </div>
                </form>
            </div>
        </div>
        <!-- edit com -->
        <div id="popup18" class="ghpopup">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_suanhanxet?></h2>
            <div class="form scrollbar-macosx">
                <form>
                    <input type="hidden" id="idc" value="" />
                    <input type="hidden" id="tuann" value="" />
                    <div>
                        <label for="fname"><?=_tungay?></label>
                        <input type="text" name="tungayy" id="tungayy" class="in" />
                    </div>
                    <div>
                        <label for="mname"><?=_denngay?></label>
                        <input type="text" name="denngayy" id="denngayy" class="in" />
                    </div>
                    
                    <div>
                        <label for="lname"><?=_nhanxet?></label>
                        <textarea id="noidungnxx" name="noidungnxx"></textarea>
                    </div>
                    <div>
                        <input type="button" class="gui" id="editcommu" value="<?=_edit?>" />
                    </div>
                </form>
            </div>
        </div>
        
        <!-- xem noi dung nhan xet -->
        <div id="popup9" class="ghpopup">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_nhanxet?></h2>
            <div class="form scrollbar-macosx" id="viewnhanxet" style="padding: 10px;"></div>
        </div>
        <!-- xem noi dung phản hồi nhan xet -->
        <div id="popup10" class="ghpopup">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_phanhoi?></h2>
            <div class="form scrollbar-macosx" id="viewphanhoi" style="padding: 10px;"></div>
        </div>
        <div id="popup5">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <p class="thongbao"></p>
        </div>
        <div id="popup16">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <p class="thongbao"></p>
        </div>
        <p class="clr"></p>                
<script type="text/javascript">
    jQuery('#tungay').datetimepicker({
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
         format:'d/m/Y'
        });
    jQuery('#denngay').datetimepicker({
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
         format:'d/m/Y'
        });
    jQuery('#tungayy').datetimepicker({
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
         format:'d/m/Y'
        });
    jQuery('#denngayy').datetimepicker({
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
         format:'d/m/Y'
        });
    jQuery(document).ready(function(){
       jQuery('.scrollbar-macosx').scrollbar();
        $('.comment').live("click",function(){
            $.post("<?=URL?>module/class/choncmt.php", function(data){
                $('#content').html(data);
            });
        });
        $('.mark').live("click",function(){
                $.post("<?=URL?>module/class/chondiem.php", function(data){
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
                        if($('.hss').hasClass('act'))
                            var idhs = $('.hss.act').attr('rel');
                        else var idhs = 0;
                        $('#idsc').val(sci);
                        $('#idlop').val(cl);
                        $('#idhs').val(idhs);
                        $.post("module/class/show_com.php", {
							cl: cl,
                            sci: sci,
                            idhs: idhs
						},  function(data){
                            $('.commentt').fadeIn('slow').html(data);
    					});
                    } else {
                        var html  = '<p class="gt1"><a class="addcom" rel="0">&nbsp;</a></p>';
                            html += '<p class="gt2"><a class="addcom" rel="0">&nbsp;</a></p>';
                            html += '<p class="gt3"><a class="addcom" rel="0">&nbsp;</a></p>';
                            html += '<p class="gt4"><a class="addcom" rel="0">&nbsp;</a></p>';
                            html += '<p class="gt5"><a class="addcom" rel="0">&nbsp;</a></p>';
                            $('.commentt').fadeIn('slow').html(html);
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
                    $('#lisths').html('');
                    var html  = '<p class="gt1"><a class="addcom" rel="0">&nbsp;</a></p>';
                        html += '<p class="gt2"><a class="addcom" rel="0">&nbsp;</a></p>';
                        html += '<p class="gt3"><a class="addcom" rel="0">&nbsp;</a></p>';
                        html += '<p class="gt4"><a class="addcom" rel="0">&nbsp;</a></p>';
                        html += '<p class="gt5"><a class="addcom" rel="0">&nbsp;</a></p>';
                        $('.commentt').fadeIn('slow').html(html);
                } else {
                        if($('.hss').hasClass('act'))
                            var idhs = $('.hss.act').attr('rel');
                        else var idhs = 0;
                        $('#idsc').val(sci);
                        $('#idlop').val(cl);
                        $('#idhs').val(idhs);
                        $.post("module/class/show_com.php", {
							cl: cl,
                            sci: sci,
                            idhs: idhs
						},  function(data){
                            $('.commentt').fadeIn('slow').html(data);
    					});
                        $.post("module/class/show_hs.php",{
                           cl: cl,
                           sci: sci 
                        }, function(dta){
                            $('#lisths').html(dta);
                        });
                }
                
        }).change(); 
        <?php if($_SESSION['quyenper'] == 1 || $_SESSION['quyenper'] == 3) { ?>
        // chon hoc sinh
        $('.hss').live("click", function(){
           var child_id = $(this).attr('rel');
           var school_id = $('#sc').val();
           var class_id = $('#cl').val();
           $('#idsc').val(school_id);
           $('#idlop').val(class_id);
           $('#idhs').val(child_id);                                  
           $.post("module/class/show_com.php",{
            sci: school_id,
            cl: class_id,
            idhs: child_id
           }, function(data){
            $('.hss').removeClass('act');
            $('.hss[rel="'+child_id+'"]').addClass('act');
            $('.commentt').fadeIn('slow').html(data);
           });
           
        }); 
        $('.moncm').live('click', function(){
            var chame = $(this).parent();
            chame.hide('slow');
            var thang = $(this).attr('rel');
            var sc = $('#sc').val();
            var cl = $('#sc').val();
            $('.chonthang').attr('rel',thang);
            if(thang == '1') $('.chonthang').text("<?=_thang1?>");
            if(thang == '2') $('.chonthang').text("<?=_thang2?>");
            if(thang == '3') $('.chonthang').text("<?=_thang3?>");
            if(thang == '4') $('.chonthang').text("<?=_thang4?>");
            if(thang == '5') $('.chonthang').text("<?=_thang5?>");
            if(thang == '6') $('.chonthang').text("<?=_thang6?>");
            if(thang == '7') $('.chonthang').text("<?=_thang7?>");
            if(thang == '8') $('.chonthang').text("<?=_thang8?>");
            if(thang == '9') $('.chonthang').text("<?=_thang9?>");
            if(thang == '10') $('.chonthang').text("<?=_thang10?>");
            if(thang == '11') $('.chonthang').text("<?=_thang11?>");
            if(thang == '12') $('.chonthang').text("<?=_thang12?>");
            if($('.hss').hasClass('act'))
                var idhs = $('.hss.act').attr('rel');
            else var idhs = 0;
            $('#idsc').val(sc);
            $('#idlop').val(cl);
            $('#idhs').val(idhs);
            if(sc != 0 && cl != '' && idhs != 0){
                $.post("module/class/show_comthang.php",{
                   sci: sc,
                   cl: cl,
                   idhs: idhs,
                   thang: thang 
                }, function(data){
                    $('.commentt').fadeIn('slow').html(data);
                });
            } else {
                $.post("module/class/comthang.php",{thang: thang}, function(data){
                    
                });
                var html  = '<p class="gt1"><a class="addcom" rel="0">&nbsp;</a></p>';
                    html += '<p class="gt2"><a class="addcom" rel="0">&nbsp;</a></p>';
                    html += '<p class="gt3"><a class="addcom" rel="0">&nbsp;</a></p>';
                    html += '<p class="gt4"><a class="addcom" rel="0">&nbsp;</a></p>';
                    html += '<p class="gt5"><a class="addcom" rel="0">&nbsp;</a></p>';
                    $('.commentt').fadeIn('slow').html(html);
            }
        });
        <?php } else { ?> 
        // chon hoc sinh
        $('.hss').live("click", function(){
           var child_id = $(this).attr('rel');
           $('#idhs').val(child_id);                                  
           $.post("module/class/show_comgv.php",{
            idhs: child_id
           }, function(data){
            $('.hss').removeClass('act');
            $('.hss[rel="'+child_id+'"]').addClass('act');
            var m = data.split(";;;cach;;;");
            $('.commentt').fadeIn('slow').html(m[2]);
            $('#idsc').val(m[0]);
            $('#idlop').val(m[1]);
           });
           
        }); 
        // cm
        $('.moncm').live('click', function(){
            var chame = $(this).parent();
            chame.hide('slow');
            var thang = $(this).attr('rel');
            $('.chonthang').attr('rel',thang);
            if(thang == '1') $('.chonthang').text("<?=_thang1?>");
            if(thang == '2') $('.chonthang').text("<?=_thang2?>");
            if(thang == '3') $('.chonthang').text("<?=_thang3?>");
            if(thang == '4') $('.chonthang').text("<?=_thang4?>");
            if(thang == '5') $('.chonthang').text("<?=_thang5?>");
            if(thang == '6') $('.chonthang').text("<?=_thang6?>");
            if(thang == '7') $('.chonthang').text("<?=_thang7?>");
            if(thang == '8') $('.chonthang').text("<?=_thang8?>");
            if(thang == '9') $('.chonthang').text("<?=_thang9?>");
            if(thang == '10') $('.chonthang').text("<?=_thang10?>");
            if(thang == '11') $('.chonthang').text("<?=_thang11?>");
            if(thang == '12') $('.chonthang').text("<?=_thang12?>");
            if($('.hss').hasClass('act'))
                var idhs = $('.hss.act').attr('rel');
            else var idhs = 0;
            $('#idhs').val(idhs);  
            if(idhs != 0){
                $.post("module/class/show_comthanggv.php",{
                   idhs: idhs,
                   thang: thang 
                }, function(data){
                    var m = data.split(";;;cach;;;");
                    $('.commentt').fadeIn('slow').html(m[2]);
                    $('#idsc').val(m[0]);
                    $('#idlop').val(m[1]);
                });
            } else {
                $.post("module/class/comthang.php",{thang: thang}, function(data){
                    
                });
                var html  = '<p class="gt1"><a class="addcom" rel="0">&nbsp;</a></p>';
                    html += '<p class="gt2"><a class="addcom" rel="0">&nbsp;</a></p>';
                    html += '<p class="gt3"><a class="addcom" rel="0">&nbsp;</a></p>';
                    html += '<p class="gt4"><a class="addcom" rel="0">&nbsp;</a></p>';
                    html += '<p class="gt5"><a class="addcom" rel="0">&nbsp;</a></p>';
                    $('.commentt').fadeIn('slow').html(html);
            }
        });
        <?php } ?>
        // them communication
        $('.addcom').live('click',function(){
            var tuan = $(this).attr('rel');
            $('#tuanthem').val(tuan);
           $('#popup').bPopup({
       	    speed: 650,
            transition: 'slideIn',
            transitionClose: 'easeOutCubic'
           }); 

        });
        
        $('#addcommu').live('click', function(){
           var tuan = $('#tuanthem').val();
           var sc_id = $('#idsc').val();
           var cl = $('#idlop').val();
           var idhs = $('#idhs').val();
           var tungay = $('#tungay').val();
           var denngay = $('#denngay').val();
           var noidungnx = $('#noidungnx').val();
           if(tungay == ''){
            $('p.thongbao').html('<?=_notungay?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
            $('#tungay').focus();
            return false;
           }
           if(denngay == ''){
            $('p.thongbao').html('<?=_nodenngay?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
            $('#denngay').focus();
            return false;
           }
           if(noidungnx == ''){
            $('p.thongbao').html('<?=_nonhanxet?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
            $('#noidungnx').focus();
            return false;
           }
           $.post("module/class/addcom.php",{
                tuan: tuan,
                sc_id: sc_id,
                cl: cl,
                idhs: idhs,
                tungay: tungay,
                denngay: denngay,
                noidungnx: noidungnx 
           }, function(data){
                bclose();
                if(data == '2'){
                   $('p.thongbao').html('<?=_nhanxet250tu?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    }); 
                } else {
                    $('p.thongbao').html('<?=_themcomtc?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#tungay').val('');
                    $('#denngay').val('');
                    $('#noidungnx').val('');
                    $('.gt'+tuan).html(data);
                }
           }); 
        });
        
        // .view
        $('.view').live('click', function(){
           var id = $(this).attr('rel');
           $.post("module/class/view_com.php",{id: id}, function(data){
            $('#viewnhanxet').html(data);
            $('#popup9').bPopup({
           	    speed: 650,
                transition: 'slideIn',
                transitionClose: 'easeOutCubic'
            }); 
           }); 
        });
        // .viewrep
        $('.viewrep').live('click', function(){
           var id = $(this).attr('rel');
           $.post("module/class/viewrep_com.php",{id: id}, function(data){
            $('#viewphanhoi').html(data);
            $('#popup10').bPopup({
           	    speed: 650,
                transition: 'slideIn',
                transitionClose: 'easeOutCubic'
            }); 
           }); 
        });
        
        // editcm
        $('.editcm').live('click', function(){
           var id = $(this).attr('rel');
           $.post('module/class/ndcom_edit.php',{id: id}, function(data){
            var m = data.split(";;;cach;;;");
            $('#idc').val(id);
            $('#tungayy').val(m[0]);
            $('#denngayy').val(m[1]);
            $('#noidungnxx').val(m[2]);
            $('#tuann').val(m[3]);
           }); 
           $('#popup18').bPopup({
           	    speed: 650,
                transition: 'slideIn',
                transitionClose: 'easeOutCubic'
            });
        });
        
        // editcommu
        $('#editcommu').live('click', function(){
           var id = $('#idc').val(); 
           var tuan = $('#tuann').val();
           var tungay = $('#tungayy').val();
           var denngay = $('#denngayy').val();
           var noidungnx = $('#noidungnxx').val();
           if(tungay == ''){
            $('p.thongbao').html('<?=_notungay?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
            $('#tungayy').focus();
            return false;
           }
           if(denngay == ''){
            $('p.thongbao').html('<?=_nodenngay?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
            $('#denngayy').focus();
            return false;
           }
           if(noidungnx == ''){
            $('p.thongbao').html('<?=_nonhanxet?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
            $('#noidungnxx').focus();
            return false;
           }
           $.post("module/class/editcom.php",{
                id: id,
                tungay: tungay,
                denngay: denngay,
                noidungnx: noidungnx 
           }, function(data){
                bclose18();
                if(data == '2'){
                   $('p.thongbao').html('<?=_nhanxet250tu?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    }); 
                } else {
                    $('p.thongbao').html('<?=_suacomtc?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('.gt'+tuan).html(data);
                }
           }); 
        });
        
        // delcm
        $('.delcm').live("click",function(){
               var id = $(this).attr('rel');
               $('.thongbao').html('<?=_delconcom?><p class="p"><a class="ok" rel="'+id+'" style="margin:0 10px 0 0;"><?=_ok?></a><a class="cancel"><?=_cancel?></a>');
               $('#popup16').bPopup();
               $('.ok').live("click",function(){
                    var idd = $(this).attr('rel');
                    $.post("module/class/del_com.php",{id: idd}, function(data){
                            bclose16();
                            $('p.thongbao').html('<?=_xoathanhcong?>');
                            $('#popup5').bPopup({
                                autoClose: 1500
                            });
                            var m = data.split(";;;cach;;;");
                            $('.gt'+m[0]).html(m[1]);    
                    });
               });
               $('.cancel').live("click",function(){
                    bclose16();
               }); 
            });
        $('.namc').live('click', function(){
            $('.thangcm').show();
        });
        
    });
</script>