<div id="content">
                <div class="searchcl">
                    <div  class="search">
                        <?=_search?>
                    </div>
                    <div class="ctsearch">
                    <?php 
                        $_SESSION['thangmo'] = date('n');
                        $mo = date("n");
                        if($_SESSION['quyenper'] == 1) { 
                    ?>
                        <div class="select-style">
                            <select name="sc" id="sc">
                                <!--<option value="0"><?=_schoolbrand?></option>-->
                                <?php
                                    $_SESSION['truongsc'] = 0;
                                    $isc = 0;
                                    $scb = $h->query("select id,tieude from school_brand order by id");
                                    while($rcb = $h->fetch_array($scb)){
                                        if($lang == 'vn')
                                            $tr = $rcb['tieude'];
                                        else
                                            $tr = change($rcb['tieude']);
                                        if($isc == 0) $_SESSION['truongsc'] = $rcb['id'];
                                        echo '<option value="'.$rcb["id"].'">'.$tr.'</option>';
                                        $isc++;
                                    }
                                ?>
                            </select>
                        </div>
                        <?php } else { ?>
                        <input type="hidden" name="sc" id="sc" value="<?=$_SESSION['schd']?>" />
                        <?php } ?>
                        <div class="select-style">
                            <select name="cl" id="cl">
                                <!--<option value=""><?=_classgr?></option>-->
                                <?php
                                    $_SESSION['lopcl'] = '';
                                    $icl = 0;
                                            $scl = $h->query("select tenlop from lop");
                                            while($rcl = $h->fetch_array($scl)){
                                                if($icl == 0) $_SESSION['lopcl'] = $rcl['tenlop'];
                                                echo '<option value="'.$rcl['tenlop'].'">'.$rcl['tenlop'].'</option>';
                                                $icl++;
                                            }
                                        ?>
                            </select>
                        </div>
                        <div class="select-style">
                            <select name="month" id="month">
                                <!--<option value=""><?=_month?></option>-->
                                <option value="1"<?php echo ($mo == 1) ? ' selected':''; ?>><?=_thang1?></option>
                                <option value="2"<?php echo ($mo == 2) ? ' selected':''; ?>><?=_thang2?></option>
                                <option value="3"<?php echo ($mo == 3) ? ' selected':''; ?>><?=_thang3?></option>
                                <option value="4"<?php echo ($mo == 4) ? ' selected':''; ?>><?=_thang4?></option>
                                <option value="5"<?php echo ($mo == 5) ? ' selected':''; ?>><?=_thang5?></option>
                                <option value="6"<?php echo ($mo == 6) ? ' selected':''; ?>><?=_thang6?></option>
                                <option value="7"<?php echo ($mo == 7) ? ' selected':''; ?>><?=_thang7?></option>
                                <option value="8"<?php echo ($mo == 8) ? ' selected':''; ?>><?=_thang8?></option>
                                <option value="9"<?php echo ($mo == 9) ? ' selected':''; ?>><?=_thang9?></option>
                                <option value="10"<?php echo ($mo == 10) ? ' selected':''; ?>><?=_thang10?></option>
                                <option value="11"<?php echo ($mo == 11) ? ' selected':''; ?>><?=_thang11?></option>
                                <option value="12"<?php echo ($mo == 12) ? ' selected':''; ?>><?=_thang12?></option>
                            </select>
                        </div>
                    </div>
                    <div class="addanl"><?=_attachfile?></div>
                    <div class="addnl"><?=_addnewsletter?></div>
                </div>
                <div class="rightagee">
                    <div class="title">
                        <p class="tdd"><?=_title?></p>
                        <p class="tddf"><?=_filethongbao?>: 
                        <?php
                                $sat = $h->query("select id,fileat from newsletter where thang=".$_SESSION['thangmo']." and nam=".date('Y')." and fileat!='' order by id desc");
                                $nat = $h->num_rows($sat);
                                if($nat){
                                    $rat = $h->fetch_array($sat);
                            ?>
                                <a href="upload/<?=$rat['fileat']?>" target="_blank" style="text-transform: capitalize;color:#fff;width:90%;"><?=$rat['fileat']?></a>
                                
                            <?php } else echo _chuaco;  ?>
                        </p>
                        <p class="clr"></p>
                    </div>
                    <div class="detail scrollbar-macosx">
                    <?php
                        $nam = date("Y");
                        $sd = $h->query("select id,tieude_vn,tieude_en,noidung_vn,noidung_en from newsletter where thang='".$_SESSION['thangmo']."' and nam='$nam' and sb_id=".$_SESSION['schd']." and lop_id='".$_SESSION['lopcl']."' and tieude_vn!='' order by ngaydang desc");
                        $id = 0;
                        while($rd = $h->fetch_array($sd)){
                            $idd = $rd['id'];
                            if($id==0) {
                                $cla = ' act';
                            } else $cla = '';
                            if($id%2==0) $cld = ' even';
                            else $cld = ' odd';
                            $dell = $rd["tieude_$lang"];
                    ?>
                        <div class="eachnews">
                            <p class="cten<?=$cld.$cla?>"><a class="view" rel="<?=$idd?>"><?=$dell?></a><a class="editde" rel="<?=$idd?>">&nbsp;</a><a class="dellde" rel="<?=$idd?>">&nbsp;</a></p>
                            <div class="ndd" id="nda<?=$idd?>"><?=$rd["noidung_$lang"]?></div>
                        </div>
                    <?php $id++; } ?>                        
                    </div>
                    
                </div>
                <div class="rightageee" id="themnewsletter">
                    <div id="popup24" class="ghpopup">
                    <h2 class="title" style="text-align: center;"><?=_addnewsletter?><img class="backthem" src="img/iconback.png" style="float: right;margin-right:10px;cursor:pointer;" alt="<?=_back?>" title="<?=_back?>" /></h2>
                    <div class="form scrollbar-macosx">
                    <form>
                            <?php if($_SESSION['quyenper'] == 1){ ?>
                            <div>
                                <label for="mnumber"><?=_schoolbrand?></label>
                                <div class="select-style">
                                    <select id="sb_id" name="sb_id">
                                    <?php
                                        $scbb = $h->query("select id,tieude from school_brand order by id");
                                        while($rcbb = $h->fetch_array($scbb)){
                                            if($lang == 'vn')
                                                $tr = $rcbb['tieude'];
                                            else
                                                $tr = change($rcbb['tieude']);
                                            echo '<option value="'.$rcbb["id"].'">'.$tr.'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <?php } else { ?>
                            <input type="hidden" name="sb_id" id="sb_id" value="<?=$_SESSION['schd']?>" />
                            <?php } ?>
                            <div>
                                <label for="mnumber"><?=_classgr?></label>
                                <div class="select-style">
                                    <select id="lop_id" name="lop_id">
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
                                <label for="tenlop"><?=_month?></label>
                                <div class="select-style">
                                    <select id="thang" name="thang">
                                    <?php
                                        $mthang = array("1"=>_thang1,"2"=>_thang2,"3"=>_thang3,"4"=>_thang4,"5"=>_thang5,"6"=>_thang6,"7"=>_thang7,"8"=>_thang8,"9"=>_thang9,"10"=>_thang10,"11"=>_thang11,"12"=>_thang12);
                                        foreach($mthang as $kt=>$vt){
                                            echo '<option value="'.$kt.'">'.$vt.'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label><?=_title?> (VN)</label>
                                <input name="tieude_vn" id="tieude_vn" type="text" class="in" />
                            </div>
                            <div>
                                <label><?=_title?> (EN)</label>
                                <input name="tieude_en" id="tieude_en" type="text" class="in" />
                            </div>
                            <div>
                                <label><?=_content?> (VN)</label><br /><br />
                                <textarea name="noidung_vn" id="noidung_vn" rows="4" cols="30"></textarea>
                            </div>
                            <div>
                                <label><?=_content?> (EN)</label><br /><br />
                                <textarea name="noidung_en" id="noidung_en"></textarea>
                            </div>
                            <div>
                                <input type="button" class="gui" id="sendadnl" value="<?=_add?>" />
                            </div>
                        </form>
                    </div></div>
                </div>
                <div class="rightageee" id="suanewsletter">
                    <div id="popup24" class="ghpopup">
                    <h2 class="title" style="text-align: center;"><?=_editnewsletter?><img class="backsua" src="img/iconback.png" style="float: right;margin-right:10px;cursor:pointer;" alt="<?=_back?>" title="<?=_back?>" /></h2>
                    <div class="form scrollbar-macosx">
                        <form id="editnews">
                            <input type="hidden" id="id" value="" />
                            <?php if($_SESSION['quyenper'] == 1) { ?>
                            <div>
                                <label for="mnumber"><?=_schoolbrand?></label>
                                <div class="select-style">
                                    <select id="sbb_id" name="sbb_id"></select>
                                </div>
                            </div>
                            <?php } else { ?>
                            <input type="hidden" name="sbb_id" id="sbb_id" value="<?=$_SESSION['schd']?>" />
                            <?php } ?>
                            <div>
                                <label for="mnumber"><?=_classgr?></label>
                                <div class="select-style">
                                    <select id="lopp_id" name="lopp_id"></select>
                                </div>
                            </div>
                            <div>
                                <label for="tenlop"><?=_month?></label>
                                <div class="select-style">
                                    <select id="thangg" name="thangg"></select>
                                </div>
                            </div>
                            <div>
                                <label><?=_title?> (VN)</label>
                                <input name="tieude_vnn" id="tieude_vnn" type="text" class="in" value="" />
                            </div>
                            <div>
                                <label><?=_title?> (EN)</label>
                                <input name="tieude_enn" id="tieude_enn" type="text" class="in" value="" />
                            </div>
                            <div>
                                <label><?=_content?> (VN)</label><br /><br />
                                <textarea name="noidung_vnn" id="noidung_vnn" rows="4" cols="30"></textarea>
                            </div>
                            <div>
                                <label><?=_content?> (EN)</label><br /><br />
                                <textarea name="noidung_enn" id="noidung_enn"></textarea>
                            </div>
                            <div>
                                <input type="button" class="gui" id="sendednl" value="<?=_edit?>" />
                            </div>    
                        </form>
                    </div></div>
                </div>
                <p class="clr"></p>
        </div>
                
                <div id="popup5">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <p class="thongbao"></p>
                </div>
                <div id="popup16">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <p class="thongbao"></p>
                </div>
                <div id="popup2">
                    <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
                    <h2 class="tieudepop"><?=_attachfile?></h2>
                    <div class="form scrollbar-macosx">
                        <form method="post" action="module/attachfile.php" id="formeimg" enctype="multipart/form-data">
                            <div>
                                <input name="idc" id="idimg" type="hidden" value="" />
                                <label for="img"><?=_file?></label>
                                <div class="upload">
                                    <input type="file" name="fileat" id="file-4" class="inputfile inputfile-1" />
            				        <label for="file-4" class="fll"><span><?=_choosefile?> &hellip;</span></label>
                                </div>
                            </div>
                            <?php
                                $sat = $h->query("select fileat from newsletter where thang=".$_SESSION['thangmo']." and nam=".date('Y')." order by id desc");
                                $nat = $h->num_rows($sat);
                                if($nat){
                                    $rat = $h->fetch_array($sat);
                            ?>
                         
                                <label>&nbsp;</label>
                                <p id="filethongbaothem">
                                    <a href="upload/<?=$rat['fileat']?>" target="_blank"><?=$rat['fileat']?></a>
                                </p>
                            <?php } ?>
                            <p class="clr"></p>
                            <div>
                                <input type="submit" class="gui" id="editimg" value="<?=_add?>" />
                            </div>
                        </form>
                    </div>
                </div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $('.rightageee').hide();
        // view
        $('a.view').live('click', function(){
           var id = $(this).attr('rel');
           $('.ndd').hide();
           $('#nda'+id).slideDown('slow');
        });
        // add
       $('.addnl').live("click",function(){
        /*$('#popup24').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });*/
            $('#themnewsletter').show();
            $('.rightagee').hide(); 
       }); 
        // addanl
       $('.addanl').live("click",function(){
        $('#popup2').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                }); 
       });
       // backthem
       $('.backthem').live("click", function(){
            $('#themnewsletter').hide();
            $('.rightagee').show();
       });
       // backsua
       $('.backsua').live("click", function(){
            $('#suanewsletter').hide();
            $('.rightagee').show();
       });
       $('.form').scrollbar();
       $('#sendadnl').live("click",function(){
                if($('#tieude_vn').val()==""){
                    $('p.thongbao').html('<?=_notitlevn?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#tieude_vn').focus();
                    return false;
                } else {
                    var tieude_vn = $('#tieude_vn').val();
                }
                if($('#tieude_en').val()==""){
                    $('p.thongbao').html('<?=_notitleen?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#tieude_en').focus();
                    return false;
                } else {
                    var tieude_en = $('#tieude_en').val();
                }
                var sb_id = $('#sb_id').val();
                var lop_id = $('#lop_id').val();
                var thang = $('#thang').val();
                //alert($('#noidung_vn').tinymce().getContent());
                var noidung_vn = window.parent.tinymce.get('noidung_vn').getContent();
                var noidung_en = window.parent.tinymce.get('noidung_en').getContent();
                if(noidung_vn == '' && noidung_en == '') {
                    $('p.thongbao').html('<?=_nocontent?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#noidung_vn').focus();
                    return false;
                }
                $('#sendadnl').attr("disabled",true);
                $('#loading').show();
                $.post("module/add_newsletter.php",{
                    sb_id: sb_id,
                    lop_id: lop_id,
                    thang: thang,
                    tieude_vn: tieude_vn,
                    tieude_en: tieude_en,
                    noidung_vn: noidung_vn,
                    noidung_en: noidung_en
                }, function(data){
                    $('#loading').hide();
                    $('#sendadnl').removeAttr('disabled');
                    var n = data.split(";");
                    if(n[0] == '1') {
                        bclose24();
                        $('p.thongbao').html('<?=_themthongbaotc?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#tieude_vn').val('');
                        $('#tieude_en').val('');
                        tinymce.get("noidung_vn").setContent('');
                        tinymce.get("noidung_en").setContent('');
                        $('.detail').html(n[1]);
                        $('#themnewsletter').hide();
                        $('.rightagee').show();
                    } else {           
    			            $('p.thongbao').html("Error");
                            $('#popup5').bPopup({
                                autoClose: 1500
                            }); 
                            return false;
             			}
                });
            });
        // editde
        $('.editde').live("click", function(){
           var id = $(this).attr('rel');
           $('#loading').show();
           $.post("module/edit_newsletter.php",{ id: id}, function(data){
            $('#loading').hide();
            $('.rightagee').hide();
            $('#suanewsletter').show();
            var m = data.split(";;;cach;;;");
            $('#id').val(id);
            $('#sbb_id').html(m[0]);
            $('#lopp_id').html(m[1]);
            $('#thangg').html(m[2]);
            $('#tieude_vnn').val(m[3]);
            $('#tieude_enn').val(m[4]);
            tinymce.get('noidung_vnn').setContent(m[5]);
            tinymce.get('noidung_enn').setContent(m[6]);
           }); 
        });
        // sendednl
        $('#sendednl').live("click",function(){
                if($('#tieude_vnn').val()==""){
                    $('p.thongbao').html('<?=_notitlevn?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#tieude_vnn').focus();
                    return false;
                } else {
                    var tieude_vn = $('#tieude_vnn').val();
                }
                if($('#tieude_enn').val()==""){
                    $('p.thongbao').html('<?=_notitleen?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#tieude_enn').focus();
                    return false;
                } else {
                    var tieude_en = $('#tieude_enn').val();
                }
                var sb_id = $('#sbb_id').val();
                var lop_id = $('#lopp_id').val();
                var thang = $('#thangg').val();
                //alert($('#noidung_vn').tinymce().getContent());
                var noidung_vn = window.parent.tinymce.get('noidung_vnn').getContent();
                var noidung_en = window.parent.tinymce.get('noidung_enn').getContent();
                if(noidung_vn == '' && noidung_en == '') {
                    $('p.thongbao').html('<?=_nocontent?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#noidung_vnn').focus();
                    return false;
                }
                var id = $('#id').val();
                $('#sendednl').attr("disabled",true);
                $('#loading').show();
                $.post("module/editt_newsletter.php",{
                    id: id,
                    sb_id: sb_id,
                    lop_id: lop_id,
                    thang: thang,
                    tieude_vn: tieude_vn,
                    tieude_en: tieude_en,
                    noidung_vn: noidung_vn,
                    noidung_en: noidung_en
                }, function(data){
                    $('#loading').hide();
                    $('#sendadnl').removeAttr('disabled');
                    var n = data.split(";");
                    if(n[0] == '1') {
                        $('p.thongbao').html('<?=_suathongbaotc?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                    } else {           
    			            $('p.thongbao').html("Error");
                            $('#popup5').bPopup({
                                autoClose: 1500
                            }); 
                            return false;
             			}
                });
            });
        // sc change
        $('#sc').change(function(){
            var sc = $(this).val();
            $.post("module/changenews_sc.php",{sc: sc}, function(data){
               var m = data.split('cach;;;cach');
               $('.detail').html(m[0]);
               $('.tddf').html(m[1]); 
               $('#filethongbaothem').html(m[2]);
            });
        }).change();
        // cl change
        $('#cl').change(function(){
            var cl = $(this).val();
            $.post("module/changenews_cl.php",{cl: cl}, function(data){
               var m = data.split('cach;;;cach');
               $('.detail').html(m[0]);
               $('.tddf').html(m[1]);
               $('#filethongbaothem').html(m[2]);
            });
        }).change();
        // month change
        $('#month').change(function(){
            var month = $(this).val();
            $.post("module/changenews_mo.php",{month: month}, function(data){
               var m = data.split('cach;;;cach');
               $('.detail').html(m[0]);
               $('.tddf').html(m[1]);
               $('#filethongbaothem').html(m[2]);
            });
        }).change();
        // dellde
        $('.dellde').live("click",function(){
                var id = $(this).attr("rel");
                $('.thongbao').html('<?=_condelnewsletter?><p class="p"><a class="ok" rel="'+id+'" style="margin:0 10px 0 0;"><?=_ok?></a><a class="cancel"><?=_cancel?></a>');
               $('#popup16').bPopup();
               $('.ok').live("click",function(){
                    var idd = $(this).attr('rel');
                    var chame = $('a.dellde[rel="'+idd+'"]').parent().parent();
                    $.post("module/del_newsletter.php",{id: idd}, function(data){
                        if(data == 1){
                            bclose16();
                            $('p.thongbao').html('<?=_xoatc?>');
                            $('#popup5').bPopup({
                                autoClose: 1500
                            });
                            chame.fadeOut('slow');    
                        }
                        
                    });
               });
               $('.cancel').live("click",function(){
                    bclose16();
               });
            });
        // editimg
        $('#editimg').live("click",function(){
               if($('#file-4').val()==""){
                    $('p.thongbao').html('<?=_nochoosefile?>');
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
           				$('p.thongbao').html('<?=_attachfiletc?>');
                        $('#popup5').bPopup({
                            autoClose: 1000
                        });
                        $('#file-4').val(''); 
                        $('#file-4 span').html("<?=_choosefile?> &hellip;");
           	        }
                }); 
            });
    });
</script>                