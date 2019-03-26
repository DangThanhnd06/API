<div id="content">
                <div class="ageg">
                    <h3 class="ag"><?=_classgr?></h3>
                    <div class="ctag scrollbar-macosx">
                        <ul>
                        <?php
                            $sl = $h->query("select id,tenlop from lop order by id");
                            $il = 0;
                            while($rl = $h->fetch_array($sl)){
                                if($il == 0) $acl = ' class="act"';
                                else $acl = '';
                                echo '<li'.$acl.' id="'.$rl['id'].'"><a class="agea" rel="'.$rl['tenlop'].'">'.$rl['tenlop'].'</a><a class="editclass" rel="'.$rl['id'].';;,;;'.$rl['tenlop'].'">&nbsp</a><a class="delclass" rel="'.$rl['id'].'">&nbsp;</a></li>';
                                $il++;
                            }
                        ?>
                        </ul>
                    </div>
                    <div class="addn"><?=_addnewclass?></div>
                </div>
                <div class="rightage">
                    <?php
                        $idpp = 0;
                        $idll = 0;
                        $yr = date("Y");
                        $mn = date("m");
                        $_SESSION['mnn'] = (int)date("m");
                        switch($mn){
                            case "1":
                                $_SESSION['thanght'] = _thang1;
                                break;
                            case "2":
                                $_SESSION['thanght'] = _thang2;
                                break;
                            case "3":
                                $_SESSION['thanght'] = _thang3;
                                break;
                            case "4":
                                $_SESSION['thanght'] = _thang4;
                                break;
                            case "5":
                                $_SESSION['thanght'] = _thang5;
                                break;
                            case "6":
                                $_SESSION['thanght'] = _thang6;
                                break;
                            case "7":
                                $_SESSION['thanght'] = _thang7;
                                break;
                            case "8":
                                $_SESSION['thanght'] = _thang8;
                                break;
                            case "9":
                                $_SESSION['thanght'] = _thang9;
                                break;
                            case "10":
                                $_SESSION['thanght'] = _thang10;
                                break;
                            case "11":
                                $_SESSION['thanght'] = _thang11;
                                break;
                            case "12":
                                $_SESSION['thanght'] = _thang12;
                                break;
                            
                        }
                    ?>
                    <div class="title">
                        <p class="pr"><?=_lesspractice?></p>
                        <p class="less"><?=_lesson?></p>
                        <p class="thang"><?=_month?><!--<a class="cmon"><span class="mthn"><?=$_SESSION['thanght']?></span></a>--></p>
                        <p class="detail"><?=_lessdetail?></p>
                        
                        <!--
                        <p class="ngay"><?=_lessday?></p>
                        -->
                        <p class="clr"></p>
                    </div>
                    <div class="prr">
                        
                    <?php
                        $sp = $h->query("select id,name_vn,name_en from practise where clg='Blue Cylinder' and hide=1 order by sort asc,id asc");
                        $ip = 0;
                        
                        while($rp = $h->fetch_array($sp)){
                            $idp = $rp['id'];
                            $np = $rp["name_$lang"];
                            if($ip%2==0) $eo = ' even';
                            else $eo = ' odd';
                            if($ip == 0) $clp = ' act';
                            else $clp = '';
                    ?>
                        <div class="cten<?=$eo.$clp?>" id="cten<?=$idp?>"><a class="cp" rel="<?=$idp?>"><?=$np?></a><a class="editpr" rel="<?=$idp?>">&nbsp;</a><a class="delpr" rel="<?=$idp?>">&nbsp;</a></div>
                    <?php $ip++; } ?>
                        <a class="addp"><?=_addnew?></a>
                    </div>
                    <div class="lesss">
                        <div class="contl scrollbar-macosx">
                    <?php
                        $spp = $h->query("select id,name_vn,name_en from practise where clg='Blue Cylinder' and hide=1 order by sort asc,id asc");
                        $rpp = $h->fetch_array($spp);
                        $idpp = $rpp['id'];
                        if($idpp != 0){
                        $sl = $h->query("select id,name_vn,name_en from monhoc where pr_id=$idpp and hide=1 order by sort asc,id asc");
                        $il = 0;
                        while($rl = $h->fetch_array($sl)){
                            $idl = $rl['id'];
                            $nl = $rl["name_$lang"];
                            if($il%2==0) $eol = ' even';
                            else $eol = ' odd';
                            if($il == 0) $cll = ' act';
                            else $cll = '';
                    ?>
                        <p class="cten<?=$eol.$cll?>"><a class="cle" rel="<?=$idl?>" id="ctr<?=$il?>" title="<?=$nl?>"><?=$nl?></a><a class="editles" rel="<?=$idl?>">&nbsp;</a><a class="delles" rel="<?=$idl?>">&nbsp;</a></p>
                    <?php $il++; } } else $idpp = 0; ?>
                        </div>
                        <a class="add" rel="<?=$idpp?>"><?=_addnew?></a>
                    </div>
                    <div class="thangg">
                        <div class="baoth">
                            <p><a class="cmonth" rel="1"><?=_thang1?></a></p>
                            <p><a class="cmonth" rel="2"><?=_thang2?></a></p>
                            <p><a class="cmonth" rel="3"><?=_thang3?></a></p>
                            <p><a class="cmonth" rel="4"><?=_thang4?></a></p>
                            <p><a class="cmonth" rel="5"><?=_thang5?></a></p>
                            <p><a class="cmonth" rel="6"><?=_thang6?></a></p>
                            <p><a class="cmonth" rel="7"><?=_thang7?></a></p>
                            <p><a class="cmonth" rel="8"><?=_thang8?></a></p>
                            <p><a class="cmonth" rel="9"><?=_thang9?></a></p>
                            <p><a class="cmonth" rel="10"><?=_thang10?></a></p>
                            <p><a class="cmonth" rel="11"><?=_thang11?></a></p>
                            <p><a class="cmonth" rel="12"><?=_thang12?></a></p>
                        </div>
                        <div id="tuan">
                        <?php
                            $mw = array("1"=>_thang1,"2"=>_thang2,"3"=>_thang3,"4"=>_thang4,"5"=>_thang5,"6"=>_thang6,"7"=>_thang7,"8"=>_thang8,"9"=>_thang9,"10"=>_thang10,"11"=>_thang11,"12"=>_thang12);
                            foreach($mw as $kw=>$vw){
                                $clw = '';
                                if($kw%2==0) $cls = ' odd';
                                else $cls = ' even';
                        ?>
                            <p class="ctenn<?=$clw.$cls?>"><?=$vw?></p>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="detaill">
                    <?php
                        $we = 0;
                        $day = 0;
                        if($idpp!=0) {
                            $sll = $h->query("select id,name_vn,name_en from monhoc where pr_id=$idpp and hide=1 order by sort asc,id asc");
                            $rll = $h->fetch_array($sll);
                            $idll = $rll['id'];
                        } else $idll = 0;
                        if($idpp!=0 && $idll!=0){
                        $sd = $h->query("select id,detail_vn,detail_en,week,day,mota_vn,mota_en from lessons where lesson_id=$idll order by week asc,day asc,id asc"); //  and year=$yr and month=".$mn."
                        $id = 0;
                        while($rd = $h->fetch_array($sd)){
                            $idd = $rd['id'];
                            if($id==0) {
                                $dayy = $rd['day'];
                                $we = $rd['week'];
                                $cla = ' act';
                            } else $cla = '';
                            if($id%2==0) $cld = ' even';
                            else $cld = ' odd';
                            $dell = $rd["detail_$lang"];
                    ?>
                        <p class="cten<?=$cld.$cla?>"><a class="dell" rel="<?=$idd?>"><?=$dell?><?php if($rd["mota_$lang"] != '') echo '<br />'._desdetail.': '.$rd["mota_$lang"]; ?></a><a class="editde" rel="<?=$idd?>">&nbsp;</a><a class="delde" rel="<?=$idd?>">&nbsp;</a></p>
                    <?php $id++; } ?>
                        <a class="edit" rel="<?=$idll?>"><?=_addnew?></a>
                    <?php } ?>
                        
                    </div>
                    
                    
                    <!--
                    <div class="ngayy">
                        <?php
                            $md = array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5");
                            foreach($md as $kd=>$vd){
                                if($vd == $dayy) $cldd = ' act';
                                else $cldd = '';
                                if($vd%2==0) $clss = ' odd';
                                else $clss = ' even';
                                switch($vd){
                                    case 1: $thu = _thu2; break;
                                    case 2: $thu = _thu3; break;
                                    case 3: $thu = _thu4; break;
                                    case 4: $thu = _thu5; break;
                                    case 5: $thu = _thu6; break;
                                }
                        ?>
                        <p class="ctenn<?=$clss.$cldd?>"><?=$thu?></p>
                        <?php } ?>
                    </div>
                    -->
                    <p class="clr"></p>
                    </div>
                </div>
                <p class="clr"></p>
                <div id="popup5">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <p class="thongbao"></p>
                </div>
                <div id="popup2">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <div class="thongbao"></div>
                </div>
                <!-- add class -->
                <div id="popup20" class="ghpopup">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_addnewclass?></h2>
                    <div class="form scrollbar-macosx">
                        <form>
                            <div>
                                <label for="tenlop"><?=_lessname?> (VN)</label>
                                <input class="in" id="tenlop" name="tenlop" value="" />
                            </div>
                            <div>
                                <input type="submit" class="gui" id="sendadclass" value="<?=_add?>" />
                            </div>
                        </form>
                    </div>
                </div>
                <!-- edit class -->
                <div id="popup21" class="ghpopup">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_editclass?></h2>
                    <div class="form scrollbar-macosx">
                        <form id="eclass">
                            
                        </form>
                    </div>
                </div>
                <!-- add practise -->
                <div id="popup6" class="ghpopup">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_addpractise?></h2>
                    <div class="form scrollbar-macosx">
                        <form>
                            <div>
                                <input type="hidden" id="age" value="1" />
                                <label for="mnumber"><?=_classgr?></label>
                                <div class="select-style">
                                    <select id="cage" name="cage">
                                    <?php
                                        $scll = $h->query("select tenlop from lop");
                                        while($rcll = $h->fetch_array($scll)){
                                            echo '<option value="'.$rcll['tenlop'].'">'.$rcll['tenlop'].'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="class_gr"><?=_lessname?> (VN)</label>
                                <input class="in" id="name_vn" name="name_vn" value="" />
                            </div>
                            <div>
                                <label for="class_gr"><?=_lessname?> (EN)</label>
                                <input class="in" id="name_en" name="name_en" value="" />
                            </div>
                            <div>
                                <input type="submit" class="gui" id="sendadpr" value="<?=_add?>" />
                            </div>
                        </form>
                    </div>
                </div>
                <!-- edit practise -->
                <div id="popup11" class="ghpopup">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_editpractise?></h2>
                    <div class="form scrollbar-macosx">
                        <form id="eprac">
                            
                        </form>
                    </div>
                </div>
                <!-- add lesson -->
                <div id="popup12" class="ghpopup">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_addlesson?></h2>
                    <div class="form scrollbar-macosx">
                        <form>
                            <div>
                                <input type="hidden" id="pridle" value="" />
                                <label for="class_gr"><?=_lessname?> (VN)</label>
                                <input class="in" id="name_vnl" name="name_vnl" value="" />
                            </div>
                            <div>
                                <label for="class_gr"><?=_lessname?> (EN)</label>
                                <input class="in" id="name_enl" name="name_enl" value="" />
                            </div>
                            <div>
                                <label for="class_gr"><?=_month?></label>
                                <select id="lessthang" name="lessthang">
                                <?php
                                    $mthang = array("1"=>_thang1,"2"=>_thang2,"3"=>_thang3,"4"=>_thang4,"5"=>_thang5,"6"=>_thang6,"7"=>_thang7,"8"=>_thang8,"9"=>_thang9,"10"=>_thang10,"11"=>_thang11,"12"=>_thang12);
                                    foreach($mthang as $kth=>$vth){
                                        if($vth == $_SESSION['thanght'])
                                            echo '<option value="'.$kth.'" selected>'.$vth.'</option>';
                                        else
                                            echo '<option value="'.$kth.'">'.$vth.'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div>
                                <input type="submit" class="gui" id="sendadle" value="<?=_add?>" />
                            </div>
                        </form>
                    </div>
                </div>
                <!-- edit lesson -->
                <div id="popup13" class="ghpopup">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_editlesson?></h2>
                    <div class="form scrollbar-macosx">
                        <form id="eles">
                            
                        </form>
                    </div>
                </div>
                <!-- add detail -->
                <div id="popup18">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_adddetail?></h2>
                    <div class="form scrollbar-macosx">
                        <form>
                            <div>
                                <input type="hidden" id="lessid" value="" />
                                <label for="class_gr"><?=_lessdetail?> (VN)</label>
                                <textarea id="detail_vn"></textarea>
                            </div>
                            <div>
                                <label for="class_gr"><?=_lessdetail?> (EN)</label>
                                <textarea id="detail_en"></textarea>
                            </div>
                            <div>
                                <label for="class_gr"><?=_desdetail?> (VN)</label>
                                <textarea id="mota_vn"></textarea>
                            </div>
                            <div>
                                <label for="class_gr"><?=_desdetail?> (EN)</label>
                                <textarea id="mota_en"></textarea>
                            </div>
                            <!--
                            <div>
                                <label for="ngaythang"><?=_ngaythang?></label>
                                <input type="text" id="ngaynd" value="" placeholder="yyyy-mm-dd" class="in" />
                            </div>
                            -->
                            <div>
                                <input type="button" class="gui" id="sendadcont" value="<?=_add?>" />
                            </div>
                        </form>
                    </div>
                </div>
                <!-- edit detail -->
                <div id="popup19">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_editdetail?></h2>
                    <div class="form scrollbar-macosx">
                        <form id="eddetail">
                            
                        </form>
                    </div>
                </div>
<link rel="stylesheet" href="js/jquery.datetimepicker.css" />
<script type="text/javascript" src="js/jquery.datetimepicker.js"></script>                
<script type="text/javascript">
    jQuery('#ngaynd,#ngaynde').datetimepicker({
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
         format:'Y-m-d'
        });
        jQuery('.form').scrollbar();
    jQuery(document).ready(function(){
        
        // age
        $('.agea').live("click",function(){
           var id = $(this).attr('rel');
           //alert(id);
           $.post("module/lesson/show_agep.php",{age: id}, function(data){
                var m = data.split(";;;");
                $('.prr').fadeIn('slow').html(m[0]);
                $('.contl').fadeIn('slow').html(m[1]);
                $('.detaill').fadeIn('slow').html(m[2]);
                $('#tuan').fadeIn('slow').html(m[3]);
                $('.ngayy').fadeIn('slow').html(m[4]);
                $('.ctag li').removeClass('act');
                var chame = $('.agea[rel="'+id+'"]').parent();
                chame.addClass('act');
                
           }); 
        });
        $('.cp').live("click",function(){
            var id = $(this).attr('rel');
            $.post("module/lesson/show_ldl.php", {pr_id: id}, function(data){
               var m = data.split(";;;");
               $('.contl').fadeIn('slow').html(m[0]);
               $('.add').attr('rel',id);
               $('.detaill').fadeIn('slow').html(m[1]); 
               $('#tuan').fadeIn('slow').html(m[2]);
                $('.ngayy').fadeIn('slow').html(m[3]);
               $('.prr .cten').removeClass('act');
               var chame = $('.cp[rel="'+id+'"]').parent();
               chame.addClass('act');
            });
        });
        $('.cle').live("click",function(){
            var id = $(this).attr('rel');
            $.post("module/lesson/show_lde.php", {id: id}, function(data){
                var m = data.split(";;;");
               $('.detaill').fadeIn('slow').html(m[0]); 
               $('#tuan').fadeIn('slow').html(m[1]);
                $('.ngayy').fadeIn('slow').html(m[2]);
               //$('.thangg').fadeIn('slow').html()
               $('.lesss .cten').removeClass('act');
               var chame = $('.cle[rel="'+id+'"]').parent();
               chame.addClass('act');
            });
        });
        $('.dell').live("click",function(){
            var id = $(this).attr('rel');
            $.post("module/lesson/show_detail.php", {id: id}, function(data){
                var m = data.split(";;;");
               //$('#tuan').fadeIn('slow').html(m[0]);
                //$('.ngayy').fadeIn('slow').html(m[1]);
               //$('.thangg').fadeIn('slow').html()
               $('.detaill .cten').removeClass('act');
               var chame = $('.dell[rel="'+id+'"]').parent();
               chame.addClass('act');
            });
        });
        
        // add
       $('.addn').live("click",function(){
        $('#popup20').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
       }); 
       $('#sendadclass').live("click",function(){
                if($('#tenlop').val()==0){
                    $('p.thongbao').html('<?=_notenlop?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#tenlop').focus();
                    return false;
                } else {
                    var tenlop = $('#tenlop').val();
                }
                $('#sendadclass').attr("disabled",true);
                $('#loading').show();
                $.post("module/class/addclass.php",{
                    tenlop: tenlop
                    }, function(data){
                        $('#loading').hide();
                        $('#sendadclass').removeAttr('disabled');
                        if(data == '2'){
               	            $('p.thongbao').html('<?=_lessprex?>');
                            $('#popup5').bPopup({
                                autoClose: 1500
                            });
                            $('#tenlop').focus();
                            return false;
             			}else {           
             			    bclose20();
            				$('p.thongbao').html('<?=_addtenlopsucc?>');
                            $('#popup5').bPopup({
                                autoClose: 1500
                            });
                            $('#tenlop').val('');
                            $('.ctag ul').append(data);
                            
             			}
                });
            });
       // edit
        $('.editclass').live("click",function(){
           var id = $(this).attr('rel');
           $.post("module/class/class_edit.php",{id: id}, function(data){
            $('#eclass').html(data);
            $('#popup21').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
           }); 
        });
        $('#sendedclass').live("click",function(){
            var idtenlop = $('#idtenlop').val();
                if($('#etenlop').val()==0){
                    $('p.thongbao').html('<?=_notenlop?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#etenlop').focus();
                    return false;
                } else {
                    var etlop = $('#etenlop').val();
                }
                $('#sendedclass').attr("disabled",true);
                $('#loading').show();
                $.post("module/class/editclass.php",{
                    idtenlop: idtenlop,
                    etenlop: etlop
                    }, function(data){
                        $('#loading').hide();
                        $('#sendedclass').removeAttr('disabled');
                        if(data == 2){
                            $('p.thongbao').html('<?=_existtenlop?>');
                            $('#popup5').bPopup({
                                autoClose: 1500
                            });
                            $('#etenlop').focus();
                            return false;
                   	    } else {
                   	            bclose21();
                 				$('p.thongbao').html('<?=_edittenlopsucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 1500
                                });
                                $('.ctag ul li#'+idtenlop).html(data);
             			}
                });
            });
        // delete
        $('.delclass').live("click",function(){
           var id = $(this).attr('rel');
           $('.thongbao').html('<?=_condelclass?><p class="p"><a class="ok" rel="'+id+'" style="margin:0 10px 0 0;"><?=_ok?></a><a class="cancel"><?=_cancel?></a>');
           $('#popup2').bPopup();
           $('.ok').live("click",function(){
                var idd = $(this).attr('rel');
                var chame = $('a.delclass[rel="'+idd+'"]').parent();
                $.post("module/class/del_class.php",{id: idd}, function(data){
                    bclose2();
                    chame.fadeOut('slow');
                });
           });
           $('.cancel').live("click",function(){
                bclose2();
           });
        });
        
        // end class
        
        // practise
        // add
       $('.addp').live("click",function(){
        $('#popup6').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
       }); 
       $('#sendadpr').live("click",function(){
                var age = $('#age').val();
                var cage = $('#cage').val();
                if($('#name_vn').val()==0){
                    $('p.thongbao').html('<?=_noprtv?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#name_vn').focus();
                    return false;
                } else {
                    var name_vn = $('#name_vn').val();
                }
                if($('#name_en').val()==""){
                    $('p.thongbao').html('<?=_noprte?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#name_en').focus();
                    return false;
                } else {
                    var name_en = $('#name_en').val();
                }          
                $('#sendadpr').attr("disabled",true);
                $('#loading').show();
                $.post("module/lesson/addpractise.php",{
                    cage: cage,
                    name_vn: name_vn,
                    name_en: name_en
                    }, function(data){
                        $('#loading').hide();
                        $('#sendadpr').removeAttr('disabled');
                        var m = data.split(";;;");
                        if(m[0] == '1'){
                       	        bclose6();
                 				$('p.thongbao').html('<?=_addprsucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 1500
                                });
                                $('.prr').append(m[1]);
                                $('#cage').val(cage);
                                $('#name_vn').val('');
                                $('#name_en').val('');
                    			}else {           
                    			     if(data == '2'){
                        				$('p.thongbao').html('<?=_lessprex?>');
                                        $('#popup5').bPopup({
                                            autoClose: 1500
                                        });
                                        $('#name_vn').focus();
                                        return false;
                        			}
                    			}
                });
            });
       // edit
        $('.editpr').live("click",function(){
           var id = $(this).attr('rel');
           $.post("module/lesson/prac_edit.php",{id: id}, function(data){
            $('#eprac').html(data);
            $('#popup11').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
           }); 
        });
        $('#sendedpr').live("click",function(){
                var id = $('#idpe').val();
                var age = $('#agepe').val();
                var cage = $('#cagee').val();
                if($('#name_vnn').val()==0){
                    $('p.thongbao').html('<?=_noprtv?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#name_vnn').focus();
                    return false;
                } else {
                    var name_vn = $('#name_vnn').val();
                }
                if($('#name_enn').val()==""){
                    $('p.thongbao').html('<?=_noprte?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#name_enn').focus();
                    return false;
                } else {
                    var name_en = $('#name_enn').val();
                }          
                $('#sendedpr').attr("disabled",true);
                $('#loading').show();
                $.post("module/lesson/editpractise.php",{
                    id: id,
                    age: age,
                    cage: cage,
                    name_vn: name_vn,
                    name_en: name_en
                    }, function(data){
                        $('#loading').hide();
                        $('#sendedpr').removeAttr('disabled');
                        var m = data.split(";;;");
                        if(m[0] == '1'){
                       	        bclose11();
                 				$('p.thongbao').html('<?=_editprsucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 1500
                                });
                                $('.prr').html(m[1]);
                    			}else {           
                    			     if(data == '2'){
                        				$('p.thongbao').html('<?=_lessprex?>');
                                        $('#popup5').bPopup({
                                            autoClose: 1500
                                        });
                                        $('#name_vnn').focus();
                                        return false;
                        			}
                    			}
                });
            });
        // delete
        $('.delpr').live("click",function(){
           var id = $(this).attr('rel');
           $('.thongbao').html('<?=_condelpr?><p class="p"><a class="ok" rel="'+id+'" style="margin:0 10px 0 0;"><?=_ok?></a><a class="cancel"><?=_cancel?></a>');
           $('#popup2').bPopup();
           $('.ok').live("click",function(){
                var idd = $(this).attr('rel');
                var chame = $('a.delpr[rel="'+idd+'"]').parent();
                $.post("module/lesson/del_pr.php",{id: idd}, function(data){
                    bclose2();
                    chame.fadeOut('slow');
                });
           });
           $('.cancel').live("click",function(){
                bclose2();
           });
        });
        
        // lesson
        // add
        $('.add').live("click",function(){
            var idl = $(this).attr("rel");
            $('#pridle').val(idl);
            $('#popup12').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
            
       }); 
       /*
       $('select#cagel').live("change",function(){
                var idllv = $('#cagel').val();
                $.post("module/show_slpractise.php", {
				    id: idllv
				    },  function(data){
                    $('#prr_id').fadeIn('slow').html(data);
   				});
        }).change();
        */
       $('#sendadle').live("click",function(){
                //var age = $('#age').val();
                //var cage = $('#cagel').val();
                var pr_id = $('#pridle').val();
                if($('#name_vnl').val()==0){
                    $('p.thongbao').html('<?=_noprtv?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#name_vnl').focus();
                    return false;
                } else {
                    var name_vn = $('#name_vnl').val();
                }
                if($('#name_enl').val()==""){
                    $('p.thongbao').html('<?=_noprte?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#name_enl').focus();
                    return false;
                } else {
                    var name_en = $('#name_enl').val();
                }          
                var thangmm = $('#lessthang').val();
                $('#sendadle').attr("disabled",true);
                $('#loading').show();
                $.post("module/lesson/addlesson.php",{
                    pr_id: pr_id,
                    name_vn: name_vn,
                    name_en: name_en,
                    thang: thangmm
                    }, function(data){
                        $('#loading').hide();
                        $('#sendadle').removeAttr('disabled');
                        var m = data.split(";;;");
                        if(m[0] == '1'){
                       	        bclose12();
                 				$('p.thongbao').html('<?=_addlesssucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 1500
                                });
                                $('.contl').html(m[1]);
                                $('#name_vnl').val('');
                                $('#name_enl').val('');
                    			}else {           
                    			     if(data == '2'){
                        				$('p.thongbao').html('<?=_lesslex?>');
                                        $('#popup5').bPopup({
                                            autoClose: 1500
                                        });
                                        $('#name_vnl').focus();
                                        return false;
                        			}
                    			}
                });
            });
       // edit
       $('.editles').live("click",function(){
           var id = $(this).attr('rel');
           $.post("module/lesson/less_edit.php",{id: id}, function(data){
            $('#eles').html(data);
            $('#popup13').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
           }); 
        });
        /*
        $('select#cagele').live("change",function(){
                var idllv = $('#cagele').val();
                $.post("module/show_slpractise.php", {
				    id: idllv
				    },  function(data){
                    $('#prr_ide').fadeIn('slow').html(data);
   				});
        }).change();
        */
        $('#sendedle').live("click",function(){
                //var age = $('#age').val();
                //var cage = $('#cagel').val();
                var id = $('#idles').val();
                //var pridc = $('#pridc').val();
                //var pr_id = $('#prr_ide').val();
                if($('#name_vnle').val()==0){
                    $('p.thongbao').html('<?=_noprtv?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#name_vnle').focus();
                    return false;
                } else {
                    var name_vn = $('#name_vnle').val();
                }
                if($('#name_enle').val()==""){
                    $('p.thongbao').html('<?=_noprte?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#name_enle').focus();
                    return false;
                } else {
                    var name_en = $('#name_enle').val();
                }          
                var thange = $('#lessthange').val();
                $('#sendedle').attr("disabled",true);
                $('#loading').show();
                $.post("module/lesson/editlesson.php",{
                    id: id,
                    //pridc: pridc,
                    //pr_id: pr_id,
                    name_vn: name_vn,
                    name_en: name_en,
                    thang: thange
                    }, function(data){
                        $('#loading').hide();
                        $('#sendedle').removeAttr('disabled');
                        var m = data.split(";;;");
                        if(m[0] == '1'){
                       	        bclose13();
                 				$('p.thongbao').html('<?=_editlesssucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 1500
                                });
                                $('.lesss').html(m[1]);
                                $('#name_vnle').val('');
                                $('#name_enle').val('');
                    			}else {           
                    			     if(data == '2'){
                        				$('p.thongbao').html('<?=_lesslex?>');
                                        $('#popup5').bPopup({
                                            autoClose: 1500
                                        });
                                        $('#name_vnle').focus();
                                        return false;
                        			}
                    			}
                });
            });
            // delete
        $('.delles').live("click",function(){
           var id = $(this).attr('rel');
           $('.thongbao').html('<?=_condelless?><p class="p"><a class="ok" rel="'+id+'" style="margin:0 10px 0 0;"><?=_ok?></a><a class="cancel"><?=_cancel?></a>');
           $('#popup2').bPopup();
           $('.ok').live("click",function(){
                var idd = $(this).attr('rel');
                var chame = $('a.delles[rel="'+idd+'"]').parent();
                $.post("module/lesson/del_les.php",{id: idd}, function(data){
                    bclose2();
                    chame.fadeOut('slow');
                    $('.detaill').html('');
                });
           });
           $('.cancel').live("click",function(){
                bclose2();
           });
        });
        
        // chon thang
        $('.cmon').live("click",function(){
           $('.baoth').toggle('slow'); 
        });
        
        // content
        $('.edit').live("click",function(){
           var id = $(this).attr('rel');
           $('#lessid').val(id);
           $('#popup18').bPopup({
       	        speed: 650,
                transition: 'slideIn',
                transitionClose: 'easeOutCubic'
           }); 
        });
        //  add
        $('#sendadcont').live("click",function(){
            var id = $('#lessid').val();
            var mota_vn = $('#mota_vn').val();
            var mota_en = $('#mota_en').val();
            if($('#detail_vn').val()==""){
                $('p.thongbao').html('<?=_nocontdetailvn?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#detail_vn').focus();
                return false;
            } else {
                var detail_vn = $('#detail_vn').val();
            }
            if($('#detail_en').val()==""){
                $('p.thongbao').html('<?=_nocontdetailen?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#detail_en').focus();
                return false;
            } else {
                var detail_en = $('#detail_en').val();
            }
            /*
            if($('#ngaynd').val()==0){
                $('p.thongbao').html('<?=_nongaythang?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#ngaynd').focus();
                return false;
            } else {
                var ngaynd = $('#ngaynd').val();
            }
            */
            $('#loading').show();
            $('#sendadcont').attr("disabled",true);
            $.post("module/lesson/adddetail.php",{
                id: id,
                detail_vn: detail_vn,
                detail_en: detail_en,
                mota_vn: mota_vn,
                mota_en: mota_en
                //ngaynd: ngaynd
            },function(data){
                $('#loading').hide();
                $('#sendadcont').removeAttr("disabled");
                bclose18();
                $('p.thongbao').html('<?=_addcontsucc?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('.detaill').prepend(data);
                $('#detail_vn').val('');
                $('#detail_en').val('');
                $('#mota_vn').val('');
                $('#mota_en').val('');
                //$('#ngaynd').val('');
            });
        });
        
        // edit
        $('.editde').live("click",function(){
            var id = $(this).attr('rel');
            $.post("module/lesson/detail_edit.php",{id: id}, function(data){
                $('#eddetail').html(data);
                $('#popup19').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                });
           }); 
        });
        $('#sendedcont').live("click",function(){
            var id = $('#lesside').val();
            var mota_vn = $('#mota_vne').val();
            var mota_en = $('#mota_vne').val();
            if($('#detail_vne').val()==""){
                $('p.thongbao').html('<?=_nocontdetailvn?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#detail_vne').focus();
                return false;
            } else {
                var detail_vn = $('#detail_vne').val();
            }
            if($('#detail_ene').val()==""){
                $('p.thongbao').html('<?=_nocontdetailen?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#detail_ene').focus();
                return false;
            } else {
                var detail_en = $('#detail_ene').val();
            }
            /*
            if($('#ngaynde').val()==0){
                $('p.thongbao').html('<?=_nongaythang?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#ngaynde').focus();
                return false;
            } else {
                var ngaynd = $('#ngaynde').val();
            }
            */
            $('#loading').show();
            $('#sendedcont').attr("disabled",true);
            $.post("module/lesson/editdetail.php",{
                id: id,
                detail_vn: detail_vn,
                detail_en: detail_en,
                mota_vn: mota_vn,
                mota_en: mota_en
                //ngaynd: ngaynd
            },function(data){
                $('#loading').hide();
                $('#sendedcont').removeAttr("disabled");
                bclose19();
                $('p.thongbao').html('<?=_editcontsucc?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                var m = data.split(";;;");
                $('.detaill').html(m[0]);
                /*$('#tuan').html(m[1]);
                $('#ngayy').html(m[2]);*/
            });
        });
        // delete
        $('.delde').live("click",function(){
           var id = $(this).attr('rel');
           $('.thongbao').html('<?=_contdel?><p class="p"><a class="ok" rel="'+id+'" style="margin:0 10px 0 0;"><?=_ok?></a><a class="cancel"><?=_cancel?></a>');
           $('#popup2').bPopup();
           $('.ok').live("click",function(){
                var idd = $(this).attr('rel');
                var chame = $('a.delde[rel="'+idd+'"]').parent();
                $.post("module//lesson/del_de.php",{id: idd}, function(data){
                    bclose2();
                    chame.fadeOut('slow');
                });
           });
           $('.cancel').live("click",function(){
                bclose2();
           });
        });
        
        // choose month
        $('.cmonth').live("click",function(){
            var th = $(this).attr('rel');
            $.post("module/lesson/choosemonth.php", {th: th}, function(data){
                $('.baoth').hide('slow');
                var m = data.split(";;;");
                $('.mthn').html(m[0]);
                $('.detaill').html(m[1]);
                $('#tuan').html(m[2]);
                $('.ngayy').html(m[3]);
            });
        });
        
        // class
        $('.ctag').scrollbar();
        //$('.contl').scrollbar();
    });
</script>                