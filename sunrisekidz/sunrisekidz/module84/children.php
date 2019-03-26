<div id="content">
                <div class="leftcr">
                    <div class="search">
                        <input class="se" type="text" id="keyword" />
                        <input class="bse" type="button" value="" id="bsearch" />
                    </div>
                    <div class="scrollbar-macosx">
                        <ul class="headteacher">
                        <?php
                            $sc = $h->query("select id,fname,mname from children order by fname asc");
                            $i = 0;
                            while($rc = $h->fetch_array($sc)){
                                if($i%2==0) $cl = 'class="even"';
                                else $cl = 'class="odd"';
                                ++$i;
                                if($lang == 'vn') $fullname = $rc['fname'].' '.$rc['mname'];
                                else $fullname = change($rc['fname'].' '.$rc['mname']);
                                echo '<li '.$cl.'><a class="xemhs" rel="'.$rc['id'].'"><span class="numb">'.$i.'</span>'.$fullname.'</a></li>';
                            }
                        ?>  
                        </ul>
                    </div>
                    <div class="addnew">
                        <a class="addcr">Add new</a>
                    </div>
                </div>
                <div class="rightcr">
                                       
                    
                </div>
                <p class="clr"></p>
            </div>
            
        <!-- add teacher -->
        <div id="popup17" class="ghpopup">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_addnewchild?></h2>
            <div class="form scrollbar-macosx">
                <form method="post" action="module/addchild.php" id="formadtc" enctype="multipart/form-data">
                    <!--
                    <div>
                        <label for="school"><?=_school?></label>
                        <div class="select-style">
                            <select name="cs" id="cs">
                                <option value="0"><?=_chooseschool?></option>
                                <option value="1"><?=_school." Hàng Than"?></option>
                                <option value="2"><?=_school." Nguyễn Ngọc Vũ"?></option>
                                <option value="2"><?=_school." IPH"?></option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="teacherid"><?=_childrenid?></label>
                        <input type="text" name="children_id" id="children_id" class="in" />
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
                        <label for="onumber"><?=_dob?></label>
                        <input type="text" name="dob" id="dob" class="in" />
                    </div>
                    <div>
                        <label for="mnumber"><?=_currentage?></label>
                        <div class="select-style">
                            <select id="cage" name="cage">
                                <option value="0"><?=_chooseage?></option>
                                <option value="1">18 - 24 <?=_month?></option>
                                <option value="2">24 - 36 <?=_month?></option>
                                <option value="3">3 - 4 <?=_yearold?></option>
                                <option value="4">4 - 5 <?=_yearold?></option>
                                <option value="5">5 - 6 <?=_yearold?></option>
                            </select>
                        </div>
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
                    <div>
                        <label for="img"><?=_image?></label>
                        <div class="upload">
                            <input type="file" name="img" id="file-1" class="inputfile inputfile-1" />
    				        <label for="file-1" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    <?php
                            if($lang == 'vn') $tenc = _name.' '._fathers;
                            else $tenc = _fathers.' '._name;
                            if($lang == 'vn') $sdtc = _contactnm.' '._fathers;
                            else $sdtc = _fathers.' '._contactnm;
                            if($lang == 'vn') $emc = 'Email '._fathers;
                            else $emc = _fathers.' email';
                            if($lang == 'vn') $addc = _address.' '._fathers;
                            else $addc = _fathers.' '._address;
                            if($lang == 'vn') $imgc = _image.' '._fathers;
                            else $imgc = _fathers.' '._image;
                            
                            if($lang == 'vn') $tenm = _name.' '._mothers;
                            else $tenm = _mothers.' '._name;
                            if($lang == 'vn') $sdtm = _contactnm.' '._mothers;
                            else $sdtm = _mothers.' '._contactnm;
                            if($lang == 'vn') $emm = 'Email '._mothers;
                            else $emm = _mothers.' email';
                            if($lang == 'vn') $addm = _address.' '._mothers;
                            else $addm = _mothers.' '._address;
                            if($lang == 'vn') $imgm = _image.' '._mothers;
                            else $imgm = _mothers.' '._image;
                        ?>
                    <div>
                        <label for="email"><?=$tenc?></label>
                        <input type="text" name="father_name" id="father_name" class="in" />
                    </div>
                    <div>
                        <label for="cfemail"><?=$sdtc?></label>
                        <input type="text" name="father_number" id="father_number" class="in" />
                    </div>
                    <div>
                        <label for="email"><?=$emc?></label>
                        <input type="text" name="father_email" id="father_email" class="in" />
                    </div>
                    <div>
                        <label for="address"><?=$addc?></label>
                        <input type="text" name="father_address" id="father_address" class="in" />
                    </div>
                    <div>
                        <label for="img"><?=$imgc?></label>
                        <div class="upload">
                            <input type="file" name="imgc" id="file-2" class="inputfile inputfile-1" />
    				        <label for="file-2" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    <div>
                        <label for="email"><?=$tenm?></label>
                        <input type="text" name="mother_name" id="mother_name" class="in" />
                    </div>
                    <div>
                        <label for="cfemail"><?=$sdtm?></label>
                        <input type="text" name="mother_number" id="mother_number" class="in" />
                    </div>
                    <div>
                        <label for="email"><?=$emm?></label>
                        <input type="text" name="mother_email" id="mother_email" class="in" />
                    </div>
                    <div>
                        <label for="address"><?=$addm.' '._ifdif?></label>
                        <input type="text" name="mother_address" id="mother_address" class="in" />
                    </div>
                    <div>
                        <label for="img"><?=$imgm?></label>
                        <div class="upload">
                            <input type="file" name="imgm" id="file-3" class="inputfile inputfile-1" />
    				        <label for="file-3" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
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
        <!-- edit img child -->
        <div id="popup2">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_changeimage?></h2>
            <div class="form scrollbar-macosx">
                <form method="post" action="module/editimgcr.php" id="formeimg" enctype="multipart/form-data">
                    <div>
                        <input name="idc" id="idimg" type="hidden" value="" />
                        <label for="img"><?=_image?></label>
                        <div class="upload">
                            <input type="file" name="img1" id="file-4" class="inputfile inputfile-1" />
    				        <label for="file-4" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    <div>
                        <input type="submit" class="gui" id="editimg" value="<?=_update?>" />
                    </div>
                </form>
            </div>
        </div>
        <!-- edit img father -->
        <div id="popup7">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_changeimage.' '._father?></h2>
            <div class="form scrollbar-macosx">
                <form method="post" action="module/editimgf.php" id="formeimgf" enctype="multipart/form-data">
                    <div>
                        <input name="idf" id="idimgf" type="hidden" value="" />
                        <label for="img"><?=_image?></label>
                        <div class="upload">
                            <input type="file" name="img2" id="file-5" class="inputfile inputfile-1" />
    				        <label for="file-5" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    <div>
                        <input type="submit" class="gui" id="editimgf" value="<?=_update?>" />
                    </div>
                </form>
            </div>
        </div>
        <!-- edit img mother -->
        <div id="popup8">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_changeimage.' '._mother?></h2>
            <div class="form scrollbar-macosx">
                <form method="post" action="module/editimgm.php" id="formeimgm" enctype="multipart/form-data">
                    <div>
                        <input name="idm" id="idimgm" type="hidden" value="" />
                        <label for="img"><?=_image?></label>
                        <div class="upload">
                            <input type="file" name="img3" id="file-6" class="inputfile inputfile-1" />
    				        <label for="file-6" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    <div>
                        <input type="submit" class="gui" id="editimgm" value="<?=_update?>" />
                    </div>
                </form>
            </div>
        </div>
        <!-- edit child information -->
        <div id="popup4" class="ghpopup">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_changechild?></h2>
            <div class="form scrollbar-macosx">
                <form method="post" action="module/editchild.php" id="edit_cr" enctype="multipart/form-data">
                
                </form>
            </div>
        </div>
        <!-- edit father information -->
        <div id="popup9" class="ghpopup">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_changefather?></h2>
            <div class="form scrollbar-macosx">
                <form method="post" action="module/children/editfather.php" id="edit_fa" enctype="multipart/form-data">
                
                </form>
            </div>
        </div>
        <!-- edit mother information -->
        <div id="popup10" class="ghpopup">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <h2 class="tieudepop"><?=_changemother?></h2>
            <div class="form scrollbar-macosx">
                <form method="post" action="module/children/editmother.php" id="edit_mo" enctype="multipart/form-data">
                
                </form>
            </div>
        </div>
        <div id="popup5">
            <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
            <p class="thongbao"></p>
        </div>
    <link rel="stylesheet" href="js/jquery.datetimepicker.css" />
    <script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
    <script type="text/javascript">
        jQuery('#dob').datetimepicker({
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
            // search
            $('input.se').keydown(function(e) {
           	    if (e.keyCode == 13) {
              		moduleSearch();
               	}
            });
            $('#bsearch').click(function(e){
                e.preventDefault();
                moduleSearch();
            });
            function moduleSearch() {
           	    var filter_keyword = $.trim($('#keyword').attr('value'))
                $.post("module/search_child.php", {keyw: filter_keyword}, function(data){
                    $("ul.headteacher").fadeIn('slow').html(data);        
                });
                
                	
            }
            $('a.cr').live("click",function(){
               var idd = $(this).attr('rel');
               $('a.cr').parent().addClass('act');
               $('a.fath').parent().removeClass('act');
               $('a.moth').parent().removeClass('act');
               $.post("module/show_child.php",{
                    id: idd
                }, function(data){
                    $('.noimage').fadeIn('slow').html(data);
                
               });
            });
            $('a.fath').live("click",function(){
               var idd = $(this).attr('rel');
               $('a.fath').parent().addClass('act');
               $('a.cr').parent().removeClass('act');
               $('a.moth').parent().removeClass('act');
               $.post("module/show_father.php",{
                    id: idd
                }, function(data){
                    $('.noimage').fadeIn('slow').html(data);
                
               });
            });
            $('a.moth').live("click",function(){
               var idd = $(this).attr('rel');
               $('a.moth').parent().addClass('act');
               $('a.fath').parent().removeClass('act');
               $('a.cr').parent().removeClass('act');
               $.post("module/show_mother.php",{
                    id: idd
                }, function(data){
                    $('.noimage').fadeIn('slow').html(data);
                
               });
            });
            $('.xemhs').live('click',function(){
               var id = $(this).attr('rel');
               $.post("module/view_children.php",{id: id},function(data){
                $('a.xemhs').parent().removeClass('act');
                $('a.xemhs[rel="'+id+'"]').parent().addClass('act');
                $('.rightcr').fadeIn('slow').html(data);
               }); 
            });
            // change img child
            $('.editicr').live("click",function(){
                var idim = $(this).attr('rel');
                $('#idimg').val(idim);
                $('#popup2').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
            });
            $('#editimg').live("click",function(){
               if($('#file-4').val()==""){
                    $('p.thongbao').html('<?=_noimage?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#file-4').focus();
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
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#editimg').removeAttr('disabled');
       	                bclose2();
           				$('p.thongbao').html('<?=_changimgsucc?>');
                        $('#popup5').bPopup({
                            autoClose: 1000
                        });
                        $('#file-4').val(''); 
                        $('#file-4 span').html("<?=_chooseimg?> &hellip;");
                        $('#childimg img').attr('src','upload/children/'+xhr.responseText);
           	        }
                }); 
            });
            // change img father
            
            $('.editicrf').live("click",function(){
                var idim = $(this).attr('rel');
                $('#idimgf').val(idim);
                $('#popup7').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
            });
            $('#editimgf').live("click",function(){
               if($('#file-5').val()==""){
                    $('p.thongbao').html('<?=_noimage?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#file-5').focus();
                    return false;
                }
                $('#formeimgf').ajaxForm({
                    beforeSend: function() {
                        $('#editimgf').attr("disabled",true);
                        $('#loading').show();
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                                
                    },
                    success: function() {
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#editimgf').removeAttr('disabled');
       	                bclose7();
           				$('p.thongbao').html('<?=_changimgsucc?>');
                        $('#popup5').bPopup({
                            autoClose: 1000
                        });
                        $('#file-5').val(''); 
                        $('#file-5 span').html("<?=_chooseimg?> &hellip;");
                        $('#fathimg img').attr('src','upload/children/'+xhr.responseText);
           	        }
                }); 
            });
            
            // change img mother
            $('.editicrm').live("click",function(){
                var idim = $(this).attr('rel');
                $('#idimgm').val(idim);
                $('#popup8').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
            });
            $('#editimgm').live("click",function(){
               if($('#file-6').val()==""){
                    $('p.thongbao').html('<?=_noimage?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#file-6').focus();
                    return false;
                }
                $('#formeimgm').ajaxForm({
                    beforeSend: function() {
                        $('#editimgm').attr("disabled",true);
                        $('#loading').show();
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                                
                    },
                    success: function() {
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#editimgm').removeAttr('disabled');
       	                bclose8();
           				$('p.thongbao').html('<?=_changimgsucc?>');
                        $('#popup5').bPopup({
                            autoClose: 1000
                        });
                        $('#file-6').val(''); 
                        $('#file-6 span').html("<?=_chooseimg?> &hellip;");
                        $('#mothimg img').attr('src','upload/children/'+xhr.responseText);
           	        }
                }); 
            });
            jQuery('.addcr').live("click",function(){
                $('#popup17').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
                
            });
            
            
            jQuery('.scrollbar-macosx').scrollbar();
            
            $('#gui').live("click",function(){
                /*if($('#cs').val()==0){
                    $('p.thongbao').html('<?=_nocs?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#cs').focus();
                    return false;
                }
                if($('#children_id').val()==""){
                    $('p.thongbao').html('<?=_nocid?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#children_id').focus();
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
                if($('#nationality').val()==""){
                    $('p.thongbao').html('<?=_nonationality?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#nationality').focus();
                    return false;
                }
                if($('#dob').val()==""){
                    $('p.thongbao').html('<?=_nodob?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#dob').focus();
                    return false;
                }
                if($('#cage').val()=="0"){
                    $('p.thongbao').html('<?=_noage?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#cage').focus();
                    return false;
                }
                if($('#class_gr').val()=="0"){
				    $('p.thongbao').html('<?=_nocg?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#class_gr').focus();
				    return false;
				} 
                if($('#file-1').val()==""){
                    $('p.thongbao').html('<?=_noimage?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#file-1').focus();
                    return false;
                }
                
                
                
                
                
                
                if($('#father_name').val()==""){
                    $('p.thongbao').html("<?=_nofathername?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#father_name').focus();
                    return false;
                }
                if($('#father_number').val()==""){
                    $('p.thongbao').html("<?=_nofathernumber?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#father_number').focus();
                    return false;
                }
                if($('#father_email').val()==""){
				    $('p.thongbao').html("<?=_noemail?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#father_email').focus();
				    return false;
				} else {
				    var emmvv = $('#father_email').val();
				    var filterr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				    if (!filterr.test(emmvv)) {
				        $('p.thongbao').html("<?=_emailinvalid?>");
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
				        $('#father_email').focus();
						return false;
					}
                }
                if($('#father_address').val()==""){
                    $('p.thongbao').html("<?=_noimage?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#father_address').focus();
                    return false;
                }
                
                if($('#mother_name').val()==""){
                    $('p.thongbao').html("<?=_nomothername?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mother_name').focus();
                    return false;
                }
                if($('#mother_number').val()==""){
                    $('p.thongbao').html("<?=_nomothernumber?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mother_number').focus();
                    return false;
                }
                if($('#mother_email').val()==""){
				    $('p.thongbao').html("<?=_noemail?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#mother_email').focus();
				    return false;
				} else {
				    var emmv = $('#mother_email').val();
				    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				    if (!filter.test(emmv)) {
				        $('p.thongbao').html("<?=_emailinvalid?>");
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
				        $('#mother_email').focus();
						return false;
					}
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
                        /*var mn = xhr.responseText;
                        var m = mn.split(";;;");
                       	if(m[0] == '1'){*/
                       	        bclose17();
                 				$('p.thongbao').html('<?=_addcrsucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 1500
                                });
                                $('ul.headteacher').fadeIn().html(xhr.responseText);
                                //$('#cs').val('0');
                                //$('#children_id').val('');
                                $('#fname').val('');
                                $('#mname').val('');
                                /*$('#lname').val('');
                                $('#gender').val('1');
                                $('#nationality').val('');
                                $('#dob').val('');
                                $('#cage').val('0');
                                $('#class_gr').val('0');
                                $('#file-1').val('');
                                $('#file-1 span').html("<?=_chooseimg?> &hellip;");
                                $('#father_name').val('');
                                $('#father_number').val('');
                                $('#father_email').val('');
                                $('#father_address').val('');
                                $('#file-2').val('');
                                $('#file-2 span').html("<?=_chooseimg?> &hellip;");
                                
                                $('#mother_name').val('');
                                $('#mother_number').val('');
                                $('#mother_email').val('');
                                $('#mother_address').val('');
                                $('#file-3').val(''); 
                                $('#file-3 span').html("<?=_chooseimg?> &hellip;");
                                */
                    			/*}else {           
                    			     if(xhr.responseText == '2'){
                        				$('p.thongbao').html('<?=_existcid?>');
                                        $('#popup5').bPopup({
                                            autoClose: 1500
                                        });
                                        $('#children_id').focus();
                                        return false;
                        			}
                    			}*/
                        	}
                        });
            });
            
            // edit children
            $('.edit_child').live("click",function(){
                var id = $(this).attr('rel');
                $('#loadingg').show();
                $.post("module/child_edit.php",{id:id},function(data){
                    $('#loadingg').hide();
                    $('#edit_cr').fadeIn().html(data);
                    $('#popup4').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                    });
                });
            });
            $('#guiedit').live("click",function(){
                if($('#cse').val()==0){
                    $('p.thongbao').html('<?=_nocs?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#cse').focus();
                    return false;
                }
                if($('#children_ide').val()==""){
                    $('p.thongbao').html('<?=_nocid?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#children_ide').focus();
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
                if($('#nationalitye').val()==""){
                    $('p.thongbao').html('<?=_nonationality?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#nationalitye').focus();
                    return false;
                }
                if($('#dobe').val()==""){
                    $('p.thongbao').html('<?=_nodob?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#dobe').focus();
                    return false;
                }
                if($('#cagee').val()=="0"){
                    $('p.thongbao').html('<?=_noage?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#cagee').focus();
                    return false;
                }
                if($('#class_gre').val()=="0"){
				    $('p.thongbao').html('<?=_nocg?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#class_gre').focus();
				    return false;
				} 
                
                $('#edit_cr').ajaxForm({
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
                 				$('p.thongbao').html('<?=_updateinfosucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 1500
                                });
                                $('ul.headteacher').fadeIn().html(m[1]);
                                $('.noimage').fadeIn().html(m[2]);
                        } else {           
                    			     if(xhr.responseText == '2'){
                        				$('p.thongbao').html('<?=_existcid?>');
                                        $('#popup5').bPopup({
                                            autoClose: 1500
                                        });
                                        $('#children_ide').focus();
                                        return false;
                        			}
                    			}
                        	}
                        });
            });           
            // edit father
            $('.edit_father').live("click",function(){
                var id = $(this).attr('rel');
                $('#loadingg').show();
                $.post("module/father_edit.php",{id:id},function(data){
                    $('#loadingg').hide();
                    $('#edit_fa').fadeIn().html(data);
                    $('#popup9').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                    });
                });
            });
            $('#father_namee').live("keyup",function(){
                var ft = $(this).val();
                if(ft != ''){
                    $.post("module/children/suggest_father.php",{ft: ft}, function(data){
                        if(data != "") {
                            $('#suggestfather').fadeIn().html(data);
                            $('#suggestfather').show('slow');
                        }
                    })
                } else {
                    $('#suggestfather').fadeIn().html('');
                    $('#suggestfather').hide('slow');    
                }
            }); 
           $('.choosefather').live("click",function(){
            var id = $(this).attr('rel');
            $.post("module/children/choose_father.php",{id: id}, function(data){
                var m = data.split(";;;");
                $('#father_namee').val(m[0]);
                $('#father_numbere').val(m[1]);
                $('#father_emaile').val(m[2]);
                $('#father_addresse').val(m[3]);
                if(m[4]!="") $('.upload img').attr('src','upload/children/'+m[4]);
                else $('.upload img').attr('src','img/noimg.png');
                $('#suggestfather').fadeIn().html('');
                $('#suggestfather').hide(); 
            });
           });
            $('#guieditf').live("click",function(){
                if($('#father_namee').val()==""){
                    $('p.thongbao').html("<?=_nofathername?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#father_namee').focus();
                    return false;
                }
                if($('#father_numbere').val()==""){
                    $('p.thongbao').html("<?=_nofathernumber?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#father_numbere').focus();
                    return false;
                }
                if($('#father_emaile').val()==""){
				    $('p.thongbao').html("<?=_noemail?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#father_emaile').focus();
				    return false;
				} else {
				    var emmv = $('#father_emaile').val();
				    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				    if (!filter.test(emmv)) {
				        $('p.thongbao').html("<?=_emailinvalid?>");
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
				        $('#father_emaile').focus();
						return false;
					}
                }
                if($('#father_addresse').val()==""){
                    $('p.thongbao').html("<?=_noimage?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#father_addresse').focus();
                    return false;
                }
                $('#edit_fa').ajaxForm({
                    beforeSend: function() {
                        $('#guieditf').attr("disabled",true);
                        $('#loading').show();
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                                
                    },
                    success: function() {
                        
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#guieditf').removeAttr('disabled');
               	        bclose9();
 				        $('p.thongbao').html("<?=_updateinfosucc?>");
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('.noimage').fadeIn('slow').html(xhr.responseText);
                }
               });
             });
             
             // edit mother
            $('.edit_mother').live("click",function(){
                var id = $(this).attr('rel');
                $('#loadingg').show();
                $.post("module/mother_edit.php",{id:id},function(data){
                    $('#loadingg').hide();
                    $('#edit_mo').fadeIn().html(data);
                    $('#popup10').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                    });
                });
            });
            $('#mother_namee').live("keyup",function(){
                var ft = $(this).val();
                if(ft != ''){
                    $.post("module/children/suggest_mother.php",{ft: ft}, function(data){
                        if(data != "") {
                            $('#suggestmother').fadeIn().html(data);
                            $('#suggestmother').show('slow');
                        }
                    })
                } else {
                    $('#suggestmother').fadeIn().html('');
                    $('#suggestmother').hide('slow');    
                }
            }); 
           $('.choosemother').live("click",function(){
            var id = $(this).attr('rel');
            $.post("module/children/choose_mother.php",{id: id}, function(data){
                var m = data.split(";;;");
                $('#mother_namee').val(m[0]);
                $('#mother_numbere').val(m[1]);
                $('#mother_emaile').val(m[2]);
                $('#mother_addresse').val(m[3]);
                if(m[4]!="") $('.upload img').attr('src','upload/children/'+m[4]);
                else $('.upload img').attr('src','img/noimg.png');
                $('#suggestmother').fadeIn().html('');
                $('#suggestmother').hide(); 
            });
           });
            $('#guieditm').live("click",function(){
                if($('#mother_namee').val()==""){
                    $('p.thongbao').html("<?=_nomothername?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mother_namee').focus();
                    return false;
                }
                if($('#mother_numbere').val()==""){
                    $('p.thongbao').html("<?=_nomothernumber?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mother_numbere').focus();
                    return false;
                }
                if($('#mother_emaile').val()==""){
				    $('p.thongbao').html("<?=_noemail?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#mother_emaile').focus();
				    return false;
				} else {
				    var emmv = $('#mother_emaile').val();
				    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				    if (!filter.test(emmv)) {
				        $('p.thongbao').html("<?=_emailinvalid?>");
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
				        $('#mother_emaile').focus();
						return false;
					}
                }
                if($('#mother_addresse').val()==""){
                    $('p.thongbao').html("<?=_noimage?>");
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mother_addresse').focus();
                    return false;
                }
                $('#edit_mo').ajaxForm({
                    beforeSend: function() {
                        $('#guieditm').attr("disabled",true);
                        $('#loading').show();
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                                
                    },
                    success: function() {
                        
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#guiedit10').removeAttr('disabled');
               	        bclose10();
 				        $('p.thongbao').html("<?=_updateinfosucc?>");
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('.noimage').fadeIn('slow').html(xhr.responseText);
                }
               });
             });
        });
    </script>