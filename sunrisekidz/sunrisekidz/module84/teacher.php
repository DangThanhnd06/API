            <div id="content">
                <div class="lefttc">
                <?php
                    $ssb1 = $h->query("select id,tieude_vn,tieude_en from school_brand order by id asc");
                    $rsb1 = $h->fetch_array($ssb1);
                ?>
                    <div class="school"><p style="display: block;" id="showsch"><?=_school?> <span id="tentruong"><?=$rsb1["tieude_$lang"]?></span></p>
                        <!--<div class="cschool"><p class="csc">&nbsp;</p></div>-->
                        <div class="schoolhide">
                        <?php
                            $ssb = $h->query("select id,tieude_vn,tieude_en from school_brand order by id asc");
                            while($rsb = $h->fetch_array($ssb)){
                                $truongbr = $rsb["tieude_$lang"];
                                $id = $rsb['id'];
                                echo '<p><a class="chontruong" rel="'.$id.'">'._school.' '.$truongbr.'</a><a class="editscb" rel="'.$id.'">&nbsp;</a><a class="delscb" rel="'.$id.'">&nbsp;</a></p>';
                            } 
                        ?>
                                <p><a class="addsb"><?=_addnew?></a></p>
                            </div>
                    </div>
                    <div class="scrollbar-macosx" id="scss">
                        <p class="principle"><?=_principle?></p>
                        <ul class="headteacher">
                        <?php
                            $sht = $h->query("select id,fname,mname,lname from teacher where level=1 and school_id=1 and hide=1 order by sort asc,id asc");
                            while($rht = $h->fetch_array($sht)){
                                $idht = $rht['id'];
                                if($lang == 'vn')
                                    $tengvht = $rht['fname'].' '.$rht['mname'];
                                else
                                    $tengvht = change($rht['fname'].' '.$rht['mname']);
                                echo '<li><a class="tree" rel="'.$rht['id'].'" type="0"><img src="img/right_ht.png" class="htt" /></a><a class="xemgv" rel="'.$rht['id'].'">'._ht.' - '.$tengvht.'</a>';
                                $sgv = $h->query("select id,fname,mname,lname from teacher where level=2 and school_id=1 and hide=1 and reportto=$idht order by sort,id");
                                $n = $h->num_rows($sgv);
                                if($n){
                                    echo '<ul id="'.$idht.'">';
                                    while($rgv = $h->fetch_array($sgv)){
                                        if($langg == 'vn')
                                            $tengv = $rgv['fname'].' '.$rgv['mname'];
                                        else
                                            $tengv = change($rgv['fname'].' '.$rgv['mname']);
                                        echo '<li><a class="xemgv" rel="'.$rgv['id'].'" >'.$tengv.'</a></li>';
                                    }
                                    echo '</ul>';
                                }
                                echo '</li>';
                            }
                        ?>
                        </ul>
                    </div>
                    <div class="addnew">
                        <a class="addteacher"><span class="small pop" data-bpopup='{"transition":"slideDown","speed":850,"easing":"easeOutBack"}'><a href="javascript:void(0)" class="addtc"><?=_addnew?></a></span></a>
                    </div>
                </div>
                <div class="righttc">
                    
                </div>
                <p class="clr"></p>
            </div>
            
        <!-- add practise -->
                <div id="popup14" class="ghpopup">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_addschool?></h2>
                    <div class="form scrollbar-macosx">
                        <form>
                            <div>
                                <label for="class_gr"><?=_tenchinhanh?> (VN)</label>
                                <input class="in" id="namesc_vn" name="namesc_vn" value="" />
                            </div>
                            <div>
                                <label for="class_gr"><?=_tenchinhanh?> (EN)</label>
                                <input class="in" id="namesc_en" name="namesc_en" value="" />
                            </div>
                            <div>
                                <input type="button" class="gui" id="sendadsc" value="<?=_add?>" />
                            </div>
                        </form>
                    </div>
                </div>
                <!-- edit school brand -->
                <div id="popup15" class="ghpopup">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_editschool?></h2>
                    <div class="form scrollbar-macosx">
                        <form id="esb">
                            
                        </form>
                    </div>
                </div>
        <!-- add teacher -->
        <div id="popup" class="ghpopup">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_addnewteacher?></h2>
            <div class="form scrollbar-macosx">
                <form method="post" action="module/addteacher.php" id="formadtc" enctype="multipart/form-data">
                    <div>
                        <label for="school"><?=_school?></label>
                        <div class="select-style">
                            <select name="cs" id="cs">
                                <option value="0"><?=_chooseschool?></option>
                            <?php
                                $sasc = $h->query("select id,tieude_vn,tieude_en from school_brand order by id asc");
                                while($rasc = $h->fetch_array($sasc)){
                                    echo '<option value="'.$rasc['id'].'">'._school.' '.$rasc["tieude_$lang"].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <!--
                    <div>
                        <label for="teacherid"><?=_teacherid?></label>
                        <input type="text" name="teacher_id" id="teacher_id" class="in" />
                    </div>
                    -->
                    <div>
                        <label for="fname"><?=_fname?></label>
                        <input type="text" name="fname" id="fname" class="in" />
                    </div>
                    <div>
                        <label for="mname"><?=_mname?></label>
                        <input type="text" name="mname" id="mname" class="in" />
                    </div>
                    <!--
                    <div>
                        <label for="lname"><?=_lname?></label>
                        <input type="text" name="lname" id="lname" class="in" />
                    </div>
                    
                    <div>
                        <label for="school"><?=_gender?></label>
                        <div class="select-style">
                            <select name="gender" id="gender">
                                <option value="1"><?=_male?></option>
                                <option value="2"><?=_female?></option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="nationality"><?=_nationality?></label>
                        <input type="text" name="nationality" id="nationality" class="in" />
                    </div>
                    <div>
                        <label for="onumber"><?=_onumber?></label>
                        <input type="text" name="onumber" id="onumber" class="in" />
                    </div>
                    <div>
                        <label for="mnumber"><?=_mnumber?></label>
                        <input type="text" name="mnumber" id="mnumber" class="in" />
                    </div>
                    -->
                    
                    <div>
                        <label for="email"><?=_emailaddress?></label>
                        <input type="text" name="email" id="email" class="in" />
                    </div>
                    <!--
                    <div>
                        <label for="cfemail"><?=_cfemail?></label>
                        <input type="text" name="cfemail" id="cfemail" class="in" />
                    </div>
                    <div>
                        <label for="password"><?=_password?></label>
                        <input type="password" name="password" id="password" class="in" />
                    </div>
                    <div>
                        <label for="cfpassword"><?=_cfpassword?></label>
                        <input type="password" name="cfpassword" id="cfpassword" class="in" />
                    </div>
                    <div>
                        <label for="fb"><?=_fbaccount?></label>
                        <input type="text" name="fb" id="fb" class="in" />
                    </div>
                    <div>
                        <label for="class_gr"><?=_classgr?></label>
                        <div class="select-style">
                            <select id="class_gr" name="class_gr">
                                <option value="0"><?=_choosecg?></option>
                            <?php
                                $mc = array("Blude Cylinder","Red rod","Trinomial 1","Trinomial 2","SOC","TAM","Cranberry","Juneberry");
                                foreach($mc as $kc=>$vc){
                                    echo '<option value="'.$vc.'">'.$vc.'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    -->
                    <div>
                        <label for="level"><?=_level?></label>
                        <div class="select-style">
                            <select name="level" id="level">
                                <option value="1"><?=_headteacher?></option>
                                <option value="2"><?=_teacher?></option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="reportto"><?=_reportto?></label>
                        <div class="select-style">
                            <select name="reportto" id="reportto">
                                
                            </select>
                        </div>
                    </div>
                    <!--
                    <div>
                        <label for="img"><?=_image?></label>
                        <div class="upload">
                            <input type="file" name="img" id="file-1" class="inputfile inputfile-1" />
    				        <label for="file-1" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    -->
                    <div>
                        <input type="submit" class="gui" id="gui" value="<?=_add?>" />
                    </div>
                </form>
            </div>
        </div>
        <div id="popup2">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_changeimage?></h2>
            <div class="form scrollbar-macosx">
                <form method="post" action="module/editimgtc.php" id="formeimg" enctype="multipart/form-data">
                    <div>
                        <input name="id" id="idimg" type="hidden" value="" />
                        <label for="img"><?=_image?></label>
                        <div class="upload">
                            <input type="file" name="img1" id="file-2" class="inputfile inputfile-1" />
    				        <label for="file-2" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    <div>
                        <input type="submit" class="gui" id="editimg" value="<?=_update?>" />
                    </div>
                </form>
            </div>
        </div>
        <div id="popup6">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_changepass?></h2>
            <div class="form scrollbar-macosx">
                <form>
                    <div>
                        <input type="hidden" name="idpp" id="idpp" value="" />
                        <label for="password"><?=_oldpassword?></label>
                        <input type="password" name="oldpassword" id="oldpassword" class="in" />
                    </div>
                    <div>
                        <label for="password"><?=_newpassword?></label>
                        <input type="password" name="newpassword" id="newpassword" class="in" />
                    </div>
                    <div>
                        <label for="cfpassword"><?=_cfpassword?></label>
                        <input type="password" name="cfnpassword" id="cfnpassword" class="in" />
                    </div>
                    <div>
                        <input type="button" class="gui" id="cpw" value="<?=_update?>" />
                    </div>
                </form>
            </div>
        </div>
        <div id="popup3">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_changelevel?></h2>
            <div class="form scrollbar-macosx">
                <form id="changelv">
                    
                </form>
            </div>
        </div>
        <!-- add teacher -->
        <div id="popup4" class="ghpopup">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_editteacher?></h2>
            <div class="form scrollbar-macosx">
                <form method="post" action="module/editteacher.php" id="edittccc" enctype="multipart/form-data">
                
                </form>
            </div>
        </div>
        <div id="popup5">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <p class="thongbao"></p>
        </div>
        <div id="popup16">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <p class="thongbao"></p>
        </div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.addtc').click(function(){
                $('#popup').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
                
            });
            
            $('.addsb').live("click",function(){
                $('#popup14').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });                
            });
            $('#sendadsc').live('click',function(){
               if($('#namesc_vn').val()==""){
                $('p.thongbao').html('<?=_nobrandvn?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#namesc_vn').focus();
                return false;
               } else {
                var namesc_vn = $('#namesc_vn').val();
               }
               if($('#namesc_en').val()==""){
                $('p.thongbao').html('<?=_nobranden?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#namesc_en').focus();
                return false;
               } else {
                var namesc_en = $('#namesc_en').val();
               }
               $('#loading').show();
               $('#sendadsc').attr('disabled','true');
               $.post("module/addschool.php",{
                namesc_vn: namesc_vn,
                namesc_en: namesc_en
               }, function(data){
                $('#loading').hide();
                $('#sendadsc').removeAttr('disabled');
                if(data == 2){
                    $('p.thongbao').html('<?=_brandexist?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#namesc_vn').focus();
                    return false;
                } else {
                    bclose14();
                    $('p.thongbao').html('<?=_addschoolsucc?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('.schoolhide').prepend(data);
                }
                
               });
            });
            $('.editscb').live("click",function(){
               var id = $(this).attr("rel");
               $.post("module/sc_edit.php",{id: id}, function(data){
                $('#esb').html(data);
                $('#popup15').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
               }); 
            });
            $('#sendedsc').live('click',function(){
               if($('#namesc_vne').val()==""){
                $('p.thongbao').html('<?=_nobrandvn?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#namesc_vne').focus();
                return false;
               } else {
                var namesc_vn = $('#namesc_vne').val();
               }
               if($('#namesc_ene').val()==""){
                $('p.thongbao').html('<?=_nobranden?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#namesc_ene').focus();
                return false;
               } else {
                var namesc_en = $('#namesc_ene').val();
               }
               var id = $('#escid').val();
               $('#loading').show();
               $('#sendedsc').attr('disabled','true');
               $.post("module/editschool.php",{
                id: id,
                namesc_vn: namesc_vn,
                namesc_en: namesc_en
               }, function(data){
                $('#loading').hide();
                $('#sendedsc').removeAttr('disabled');
                if(data == 2){
                    $('p.thongbao').html('<?=_brandexist?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#namesc_vne').focus();
                    return false;
                } else {
                    bclose15();
                    $('p.thongbao').html('<?=_editschoolsucc?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('.schoolhide').html(data);
                }
                
               });
            });
            $('.delscb').live("click",function(){
                var id = $(this).attr("rel");
                $('.thongbao').html('<?=_condelsc?><p class="p"><a class="ok" rel="'+id+'" style="margin:0 10px 0 0;"><?=_ok?></a><a class="cancel"><?=_cancel?></a>');
               $('#popup16').bPopup();
               $('.ok').live("click",function(){
                    var idd = $(this).attr('rel');
                    var chame = $('a.delpr[rel="'+idd+'"]').parent();
                    $.post("module/del_sc.php",{id: idd}, function(data){
                        if(data == 1){
                            bclose16();
                            $('p.thongbao').html('<?=_xoatc?>');
                            $('#popup5').bPopup({
                                autoClose: 1500
                            });
                            chame.fadeOut('slow');    
                        } else {
                            bclose16();
                            $('p.thongbao').html('<?=_stillteacher?>');
                            $('#popup16').bPopup({
                                autoClose: 2500
                            });
                        }
                        
                    });
               });
               $('.cancel').live("click",function(){
                    bclose16();
               });
            });
            $('.xemgv').live("click",function(){
               var id = $(this).attr('rel');
               $('#loadingg').show();
               $.post("module/view_teacher.php", {
							id: id
						},  function(data){
						    $('#loadingg').hide();
                            $('a.xemgv').parent().removeClass('act');
                            $('a.xemgv[rel="'+id+'"]').parent().addClass('act');
                            $('.righttc').fadeIn('slow').html(data);
					});
            });
            $('.edittcher').live("click",function(){
                var id = $(this).attr('rel');
                $('#loadingg').show();
                $.post("module/teacheredit.php",{id:id},function(data){
                    $('#loadingg').hide();
                    $('#edittccc').fadeIn().html(data);
                    $('#popup4').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                    });
                });
            });
            $('.changep').live("click",function(){
               var idp = $(this).attr('rel');
               $('#idpp').val(idp);
               $('#popup6').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                    }); 
            });
            $('.edititc').live("click",function(){
                var idim = $(this).attr('rel');
                $('#idimg').val(idim);
                $('#popup2').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
            });
            $('.elv').live("click",function(){
               var idlve = $(this).attr('rel');
               $.post("module/level.php", {
							idlve: idlve
						},  function(data){
                            $('#changelv').fadeIn('slow').html(data);
					});
               $('#popup3').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                }); 
            });
            $('select#clevel').live("change",function(){
                var idllv = $('#idlv').val();
                if($('select#clevel option:selected').val()==2) {
                    $.post("module/show_head.php", {
							id: idllv
						},  function(data){
							$('#report').show();
                            $('#report').fadeIn('slow').html(data);
					});
                }
                if($('select#clevel option:selected').val()==1) {
                    $('#report').hide();
                }
            }).change();
            
            $('#editlv').live("click",function(){
               var idlllv = $('#idlv').val();
               var lev = $('#clevel').val();
               if(lev == 2) {
                    if($('#creportto').val()==0){
                        $('p.thongbao').html('<?=_norep?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#reportto').focus();
                        return false;
                    } else {
                        var idrp = $('#creportto').val();
                    }
               } else var idrp = 0;
               $.post("module/editlv.php", {
							id: idlllv,
                            level: lev,
                            reportto: idrp
						},  function(data){
							bclose3();
                            var m = data.split("level;;level");
                            $('ul.headteacher').fadeIn('slow').html(m[0]);
                            $('#reportttt').fadeIn().html(m[1]);
                            $('#levell').fadeIn().html(m[2]);
					});
            });
            
            jQuery('.scrollbar-macosx').scrollbar();
            jQuery('.form').scrollbar();
            $('#showsch').live("click",function(){
                $('.schoolhide').toggle('slow');
            });
            $('.chontruong').live("click",function(){
               var id = $(this).attr('rel');
               $('.schoolhide').hide(); 
               $('#loading').show();
               $.post("module/xemgvtruong.php", {
                        idt: id
                    }, function(data){
                        $('#loading').hide();
                        var m = data.split(';;;');
                        $('#tentruong').html(m[0]);
                        $('.headteacher').fadeIn().html(m[1]);
                    }
               );
            });
            
            $('a.tree[type="0"]').live("click",function(){
               var idht = $(this).attr('rel');
               $('ul#'+idht).show('slow');
               $('a.tree').removeAttr('type');
               $('a.tree').attr('type','1');
               $('a.tree img').attr('src','img/down_ht.png');
            });
            $('a.tree[type="1"]').live("click",function(){
               var idht = $(this).attr('rel');
               $('ul#'+idht).hide('slow');
               $('a.tree').removeAttr('type');
               $('a.tree').attr('type','0');
               $('a.tree img').attr('src','img/right_ht.png');
            });
            $('select#cs').live("change",function(){
                    var idsc = $('#cs').val();
                    $.post("module/show_report.php", {
    					idsc: idsc
     				},  function(data){
                        $('select#reportto').html(data);
     				});
                }).change();
            $('#gui').live("click",function(){
                if($('#cs').val()==0){
                    $('p.thongbao').html('<?=_nocs?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#cs').focus();
                    return false;
                }
                /*
                if($('#teacher_id').val()==""){
                    $('p.thongbao').html('<?=_notcid?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#teacher_id').focus();
                    return false;
                }*/
                if($('#fname').val()==""){
                    $('p.thongbao').html('<?=_nofname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#fname').focus();
                    return false;
                }
                if($('#mname').val()==""){
                    $('p.thongbao').html('<?=_nomname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mname').focus();
                    return false;
                }
                /*
                if($('#lname').val()==""){
                    $('p.thongbao').html('<?=_nolname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#lname').focus();
                    return false;
                }
                if($('#nationality').val()==""){
                    $('p.thongbao').html('<?=_nonationality?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#nationality').focus();
                    return false;
                }
                if($('#onumber').val()==""){
                    $('p.thongbao').html('<?=_noonumber?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#onumber').focus();
                    return false;
                }
                if($('#mnumber').val()==""){
                    $('p.thongbao').html('<?=_nomnumber?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mnumber').focus();
                    return false;
                }
                */
                if($('#email').val()==""){
				    $('p.thongbao').html('<?=_noemail?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#email').focus();
				    return false;
				} else {
				    var emmvv = $('#email').val();
				    var filterr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				    if (!filterr.test(emmvv)) {
				        $('p.thongbao').html('<?=_emailinvalid?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
				        $('#email').focus();
						return false;
					}else{
					    var email = $('#email').val();
					}
                }
                /*
                if($('#cfemail').val()==""){
				    $('p.thongbao').html('<?=_nocfemail?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfemail').focus();
				    return false;
				} else {
				    var emmv = $('#cfemail').val();
				    var filterr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				    if (!filterr.test(emmv)) {
				        $('p.thongbao').html('<?=_emailinvalid?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
				        $('#cfemail').focus();
						return false;
					}else{
					    var cfemail = $('#cfemail').val();
					}
                }
                if(email !== cfemail){
                    $('p.thongbao').html('<?=_emailnotmatch?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfemail').focus();
				    return false;
                }
                */
                /*if($('#password').val()==""){
				    $('p.thongbao').html('<?=_nopass?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#password').focus();
				    return false;
				} else {
				    var pas = $('#password').val();
                }
                if($('#cfpassword').val()==""){
				    $('p.thongbao').html('<?=_nocfpass?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfpassword').focus();
				    return false;
				} else {
				    var cfp = $('#cfpassword').val();
                }
                if(pas !== cfp){
                    $('p.thongbao').html('<?=_passnotmatch?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfpassword').focus();
				    return false;
                }*/
                /*
                if($('#class_gr').val()==""){
                    $('p.thongbao').html('<?=_nocg?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#class_gr').focus();
                    return false;
                }
                */
                var lvel = $('#level').val();
                if(lvel == 2){
                    if($('#reportto').val()=="0"){
                        $('p.thongbao').html('<?=_norep?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#reportto').focus();
                        return false;
                    }
                }
                /*
                if($('#file-1').val()==""){
                    $('p.thongbao').html('<?=_noimage?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#file-1').focus();
                    return false;
                }
                */
                $('#formadtc').ajaxForm({
                    beforeSend: function() {
                        $('#gui').attr("disabled",true);
                        $('#loading').show();
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                                
                    },
                    success: function() {
                                /*var percentVal = '100%';
                                bar.width(percentVal)
                                percent.html(percentVal);*/
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#gui').removeAttr('disabled');
                        var mn = xhr.responseText;
                        var m = mn.split(";;;");
                       	if(m[0] == '1'){
                       	        bclose();
                 				$('p.thongbao').html('<?=_addtcsucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 5000
                                });
                                $('ul.headteacher').html(m[1]);
                                $('#cs').val('0');
                                //$('#teacher_id').val('');
                                $('#fname').val('');
                                $('#mname').val('');
                                //$('#lname').val('');
                                //$('#gender').val('1');
                                //$('#nationality').val('');
                                //$('#onumber').val('');
                                //$('#mnumber').val('');
                                $('#email').val('');
                                //$('#cfemail').val('');
                                //$('#password').val('');
                                //$('#cfpassword').val('');
                                //$('#fb').val('');
                                //$('#class_gr').val('');
                                $('#level').val('2');
                                $('#reportto').val('0');
                                //$('#file-1').val(''); 
                    			}else {
                    			     if(xhr.responseText == '3'){
                        				$('p.thongbao').html('<?=_tcidexist?>');
                                        $('#popup5').bPopup({
                                            autoClose: 1500
                                        });
                                        $('#teacher_id').focus();
                                        return false;
                        			} else {
                        			     if(xhr.responseText == '2'){
                            				$('p.thongbao').html('<?=_emailexist?>');
                                            $('#popup5').bPopup({
                                                autoClose: 1500
                                            });
                                            $('#email').focus();
                                            return false;
                            			} else {
                            			     $('#daxong').html(xhr.responseText);
                           				     $('#daxong').css('color','red');
                                             $('html, body').animate({scrollTop: $("#daxong").offset().top}, 2000);
                                         }
                        			}
                    			     
                    			}
                        	}
                        });
            });           
            $('#editimg').live("click",function(){
               if($('#file-2').val()==""){
                    $('p.thongbao').html('<?=_noimage?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#file-2').focus();
                    return false;
                }
                $('#formeimg').ajaxForm({
                    beforeSend: function() {
                        $('#editimg').attr("disabled",true);
                        $('#loading').show();
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                                
                    },
                    success: function() {
                                /*var percentVal = '100%';
                                bar.width(percentVal)
                                percent.html(percentVal);*/
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#editimg').removeAttr('disabled');
       	                bclose2();
           				$('p.thongbao').html('<?=_changimgsucc?>');
                        $('#popup5').bPopup({
                            autoClose: 1000
                        });
                        $('#file-2').val(''); 
                        $('.anh img').attr('src','upload/teacher/'+xhr.responseText);
           	        }
                }); 
            });
            
            // change pass
            $('#cpw').live("click",function(){
               if($('#oldpassword').val()==""){
				    $('p.thongbao').html('<?=_nooldpass?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#oldpassword').focus();
				    return false;
				} else {
				    var opas = $('#oldpassword').val();
                }
                if($('#newpassword').val()==""){
				    $('p.thongbao').html('<?=_nonewpass?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#newpassword').focus();
				    return false;
				} else {
				    var npas = $('#newpassword').val();
                }
                if($('#cfnpassword').val()==""){
				    $('p.thongbao').html('<?=_nocfpass?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfnpassword').focus();
				    return false;
				} else {
				    var cfnp = $('#cfnpassword').val();
                }
                if(npas !== cfnp){
                    $('p.thongbao').html('<?=_passnotmatch?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfnpassword').focus();
				    return false;
                } 
                var idpp = $('#idpp').val();
                $('#loading').show();
                $.post("module/cp_teacher.php",{
                    id: idpp,
                    mkcu: opas,
                    mk: npas
                    }, function(data){
                            $('#loading').hide();
                            if(data == 1){
                                bclose6();  
                                $('p.thongbao').html('<?=_changepsucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 1500
                                });
                                $('#oldpassword').val('');
                                $('#newpassword').val('');
            				    $('#cfnpassword').val('');
            				    return false;
                            } else {
                                if(data == 2){
                                    $('p.thongbao').html('<?=_oldpwrong?>');
                                    $('#popup5').bPopup({
                                        autoClose: 1500
                                    });
                				    $('#oldpassword').focus();
                				    return false;
                                }
                            }
                });
            });
            
            // edit teacher 
            $('select#cse').live("change",function(){
                    var idsc = $('#cse').val();
                    $.post("module/show_report.php", {
    					idsc: idsc
     				},  function(data){
                        $('select#reporttoe').html(data);
     				});
                }).change();
            $('#guiedit').live("click",function(){
                if($('#cse').val()==0){
                    $('p.thongbao').html('<?=_nocs?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#cse').focus();
                    return false;
                }
                
                if($('#teacher_ide').val()==""){
                    $('p.thongbao').html('<?=_notcid?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#teacher_ide').focus();
                    return false;
                }
                if($('#fnamee').val()==""){
                    $('p.thongbao').html('<?=_nofname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#fnamee').focus();
                    return false;
                }
                if($('#mnamee').val()==""){
                    $('p.thongbao').html('<?=_nomname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mnamee').focus();
                    return false;
                }
                /*
                if($('#lnamee').val()==""){
                    $('p.thongbao').html('<?=_nolname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#lnamee').focus();
                    return false;
                }*/
                if($('#nationalitye').val()==""){
                    $('p.thongbao').html('<?=_nonationality?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#nationalitye').focus();
                    return false;
                }
                if($('#onumbere').val()==""){
                    $('p.thongbao').html('<?=_noonumber?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#onumbere').focus();
                    return false;
                }
                if($('#mnumbere').val()==""){
                    $('p.thongbao').html('<?=_nomnumber?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mnumbere').focus();
                    return false;
                }
                if($('#emaile').val()==""){
				    $('p.thongbao').html('<?=_noemail?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#emaile').focus();
				    return false;
				} else {
				    var emmve = $('#emaile').val();
				    var filterr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				    if (!filterr.test(emmve)) {
				        $('p.thongbao').html('<?=_emailinvalid?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
				        $('#emaile').focus();
						return false;
					}else{
					    var email = $('#email').val();
					}
                }
                if($('#class_gre').val()==""){
                    $('p.thongbao').html('<?=_nocg?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#class_gre').focus();
                    return false;
                }
                var lvele = $('#levele').val();
                if(lvele == 2){
                    if($('#reporttoe').val()=="0"){
                        $('p.thongbao').html('<?=_norep?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#reporttoe').focus();
                        return false;
                    }
                }
                //alert($('#file-3').val());
                $('#edittccc').ajaxForm({
                    beforeSend: function() {
                        $('#guiedit').attr("disabled",true);
                        $('#loading').show();
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                                
                    },
                    success: function() {
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#guiedit').removeAttr('disabled');
                        var mn = xhr.responseText;
                        var m = mn.split(";;;");
                       	if(m[0] == '1'){
                       	        bclose4();
                 				$('p.thongbao').html('<?=_changetcsucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 5000
                                });
                                $('ul.headteacher').html(m[2]);
                                $('.righttc').html(m[1]);
                    			}else {
                    			     if(m[0] == '3'){
                        				$('p.thongbao').html('<?=_tcidexist?>');
                                        $('#popup5').bPopup({
                                            autoClose: 1500
                                        });
                                        $('#teacher_id').focus();
                                        return false;
                        			} else {
                        			     if(m[0] == '2'){
                            				$('p.thongbao').html('<?=_emailexist?>');
                                            $('#popup5').bPopup({
                                                autoClose: 1500
                                            });
                                            $('#email').focus();
                                            return false;
                            			}
                        			}
                    			     
                    			}
                        	}
                        });
            });
        });
    </script>