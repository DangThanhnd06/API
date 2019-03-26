    <?php if($_SESSION['quyenper'] == 1) { ?>
    <div id="popup26" class="ghpopup">
        <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
        <h2 class="tieudepop"><?=_quanlyuser?></h2>
        <div class="form scrollbar-macosx">
            <div style="width: 100%;padding:5px 0;text-align:center;">
                <a class="adduser" style="background:#78be3a;height:30px;line-height:30px;border-radius: 7px;
    -moz-border-radius: 7px;-webkit-border-radius: 7px;text-align:center;color:#fff;font-size:15px;padding:5px 7px;"><?=_themuser?></a>
            </div>
            <table style="width: 1202px;height:auto;border:collapse;border:1px solid #ccc;padding: 0 10px;">
                <thead>
                    <tr style="border:1px solid #ccc;">
                        <td style="text-align: center;"><strong><?=_tenorcv?></strong></td>
                        <td style="text-align: center;"><strong><?=_tendangnhap?></strong></td>
                        <td style="text-align: center;"><strong><?=_quyen?></strong></td>
                        <td style="text-align: center;"><strong><?=_dnlancuoi?></strong></td>
                        <td style="text-align: center;"><strong><?=_kichhoat?></strong></td>
                        <td style="text-align: center;"><strong><?=_suathongtin?></strong></td>
                        <td style="text-align: center;"><strong><?=_doimatkhau?></strong></td>
                    </tr>
                </thead>
                <tbody id="banghienthi">
                <?php
                    $suh = $h->query("select * from admin where quyen!=1");
                    while($ruh = $h->fetch_array($suh)){
                        echo '<tr style="border:1px solid #ccc;margin:5px 0;" id="utdu'.$ruh['id'].'">';
                        echo '  <td style="text-align:center;">'.$ruh['hoten'].'</td>';
                        echo '  <td style="text-align:center;">'.$ruh['username'].'</td>';
                        if($ruh['quyen'] == '2') $qu = 'QLCS';
                        else $qu = 'QLCM';
                        echo '  <td style="text-align:center;">'.$qu.'</td>';
                        echo '  <td style="text-align:center;">'.$ruh['tgdangnhap'].'</td>';
                        if($ruh['kichhoat'] == 1) $khoat = '<a class="kichhoat" rel="'.$ruh['id'].'" style="cursor:pointer;"><img src="img/check.png" alt="Active" /></a>';
                        else $khoat = '<a class="chuakichhoat" rel="'.$ruh['id'].'" style="cursor:pointer;"><img src="img/notcheck.png" alt="Unactive" /></a>';
                        echo '<td style="text-align:center;" id="khota'.$ruh['id'].'">'.$khoat.'</td>'; 
                        echo '<td style="text-align:center;"><a class="suauser" style="cursor:pointer;" rel="'.$ruh['id'].'"><img src="img/edit.png" alt="Edit" /></a></td>';
                        echo '<td style="text-align:center;"><a class="changepass" style="cursor:pointer;" rel="'.$ruh['id'].'">'._thaydoi.'</a></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="popup27" class="ghpopup">
        <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
        <h2 class="tieudepop"><?=_themuser?></h2>
        <div class="form scrollbar-macosx">
            <form>
                    <div>
                        <label for="password"><?=_tenorcv?></label>
                        <input type="text" name="tenorcvu" id="tenorcvu" class="in" />
                    </div>
                    <div>
                        <label for="cfpassword"><?=_tendangnhap?></label>
                        <input type="text" name="tendangnhap" id="tendangnhap" class="in" />
                    </div>
                    <div>
                        <label for="password"><?=_password?></label>
                        <input type="password" name="passwordu" id="passwordu" class="in" />
                    </div>
                    <div>
                        <label for="cfpassword"><?=_cfpassword?></label>
                        <input type="password" name="cfpasswordu" id="cfpasswordu" class="in" />
                    </div>
                    <div>
                        <label for="school"><?=_quyen?></label>
                        <div class="select-style">
                            <select name="quyenu" id="quyenu">
                                <option value="2">QLCS</option>
                                <option value="3">QLCM</option>
                            </select>
                        </div>
                    </div>
                    <div style="display: none;" id="hienthischoolu">
                        <label for="school"><?=_school?></label>
                        <div class="select-style">
                            <select name="schoolu" id="schoolu">
                            <?php
                                $scuu = $h->query("select id,tieude from school_brand where hide=1");
                                while($rcuu = $h->fetch_array($scuu)){
                            ?>
                                <option value="<?=$rcuu['id']?>"><?=$rcuu['tieude']?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="cfpassword"><?=_kichhoat?></label>
                        <input type="checkbox" id="kichhoatu" name="kichhoatu" checked />
                    </div>
                    <div>
                        <input type="button" class="gui" id="addurrr" value="<?=_add?>" />
                    </div>
                </form>
        </div>
    </div>
    <div id="popup28" class="ghpopup">
        <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
        <h2 class="tieudepop"><?=_suathongtinuser?></h2>
        <div class="form scrollbar-macosx">
            <form id="edituseru">
            
            </form>
        </div>
    </div>
    <div id="popup29" class="ghpopup">
        <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
        <h2 class="tieudepop"><?=_doimatkhau?></h2>
        <div class="form scrollbar-macosx">
            <form>
                    <input type="hidden" name="idus" id="idus" />
                    <div>
                        <label for="password"><?=_newpassword?></label>
                        <input type="password" name="newpasswordu" id="newpasswordu" class="in" />
                    </div>
                    <div>
                        <label for="cfpassword"><?=_cfpassword?></label>
                        <input type="password" name="cfnpasswordu" id="cfnpasswordu" class="in" />
                    </div>
                    <div>
                        <input type="button" class="gui" id="cpwu" value="<?=_update?>" />
                    </div>
                </form>
        </div>
    </div>
    <div id="popup5">
        <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
        <p class="thongbao"></p>
    </div>
    <script type="text/javascript">
        $('.quanlytaikhoan').live("click",function(){
            $('#popup26').bPopup({
        	   speed: 650,
               transition: 'slideIn',
               transitionClose: 'easeOutCubic'
            });
        });
        $('.adduser').live('click',function(){
            bclose26();
            bclose28();
            bclose29();
            $('#popup27').bPopup({
        	   speed: 650,
               transition: 'slideIn',
               transitionClose: 'easeOutCubic'
            });
        });
        $('#quyenu').change(function(){
            var qu = $(this).val();
            if(qu == 2){
                $('#hienthischoolu').show();
            } else $('#hienthischoolu').hide(); 
        }).change();
        $('#addurrr').live('click', function(){
            var tenorcvu = $('#tenorcvu').val();
            var tendangnhap = $('#tendangnhap').val();
            var passwordu = $('#passwordu').val();
            var cfpasswordu = $('#cfpasswordu').val();
            var quyenu = $('#quyenu').val();
            var schoolu = $('#schoolu').val();
            if($('#kichhoatu').is(":checked")) var kichhoatu = 1;
            else kichhoatu = 0;
            if(tenorcvu == ''){
                $('p.thongbao').html('<?=_notenorcv?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#tenorcv').focus();
                return false; 
            }
            if(tendangnhap == ''){
                $('p.thongbao').html('<?=_nousername?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#tendangnhap').focus();
                return false; 
            }
            if(passwordu == ''){
                $('p.thongbao').html('<?=_nopassword?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#passwordu').focus();
                return false; 
            }
            if(cfpasswordu == ''){
                $('p.thongbao').html('<?=_nocfpass?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#cfpasswordu').focus();
                return false; 
            }
            if(cfpasswordu !== passwordu){
                $('p.thongbao').html('<?=_passnotmatch?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#cfpasswordu').focus();
                return false; 
            }
            $.post("module/u_themuser.php",{
               hoten: tenorcvu,
               username: tendangnhap,
               password: passwordu,
               quyen: quyenu,
               sc: schoolu,
               kichhoat: kichhoatu 
            }, function(data){
                var n = data.split(";;;");
               if(n[0] == 1){
                    $('p.thongbao').html('<?=_themusersucc?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    bclose27();
                    $('#tenorcvu').val('');
                    $('#tendangnhap').val('');
                    $('#passwordu').val('');
                    $('#cfpasswordu').val('');
                    $('tbody#banghienthi').append(n[1]);
                    $('#popup26').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                    }); 
               } 
            });
        });
        $('#quyenue').live('change',function(){
            var qu = $(this).val();
            if(qu == 2){
                $('#hienthischoolue').show();
            } else $('#hienthischoolue').hide(); 
        }).change();
        $('.suauser').live('click',function(){
            bclose26();
            bclose27();
            bclose29();
            var id = $(this).attr("rel");
            $.post("module/u_suauser.php",{id: id}, function(data){
               $('#edituseru').html(data); 
            });
            $('#popup28').bPopup({
        	   speed: 650,
               transition: 'slideIn',
               transitionClose: 'easeOutCubic'
            });
        });
        $('#editurrr').live('click', function(){

            var id = $('#iduse').val();
            var tenorcvu = $('#tenorcvue').val();
            var tendangnhap = $('#tendangnhape').val();
            var quyenu = $('#quyenue').val();
            var schoolu = $('#schoolue').val();
            if($('#kichhoatue').is(":checked")) var kichhoatu = 1;
            else kichhoatu = 0;
            if(tenorcvu == ''){
                $('p.thongbao').html('<?=_notenorcv?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#tenorcve').focus();
                return false; 
            }
            if(tendangnhap == ''){
                $('p.thongbao').html('<?=_nousername?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#tendangnhape').focus();
                return false; 
            }
            
            $.post("module/u_edituser.php",{
                id: id,
               hoten: tenorcvu,
               username: tendangnhap,
               quyen: quyenu,
               sc: schoolu,
               kichhoat: kichhoatu 
            }, function(data){
                var n = data.split(";;;");
               if(n[0] == 1){
                    $('p.thongbao').html('<?=_capnhatusersucc?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    bclose28();
                    $('tr#utdu'+id).html(n[1]);
                    $('#popup26').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                    }); 
               } 
            });

        });
        $('.changepass').live('click',function(){
            bclose26();
            bclose28();
            bclose27();
            var id = $(this).attr('rel');
            $('#idus').val(id);
            $('#popup29').bPopup({
        	   speed: 650,
               transition: 'slideIn',
               transitionClose: 'easeOutCubic'
            });
        });
        $('#cpwu').live('click', function(){
           var id = $('#idus').val(); 
           var pwu = $('#newpasswordu').val();
           var cpwu = $('#cfnpasswordu').val();
           if(pwu == ''){
                $('p.thongbao').html('<?=_nopass?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#newpasswordu').focus();
                return false; 
           } 
           if(cpwu == ''){
                $('p.thongbao').html('<?=_nocfpass?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#cfnpasswordu').focus();
                return false; 
           }
           if(cpwu !== pwu){
                $('p.thongbao').html('<?=_passnotmatch?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#cfnpasswordu').focus();
                return false;
           }
           $.post("module/u_changpass.php",{
                id: id,
                pwu: pwu
           }, function(data){
                if(data == 1){
                    $('p.thongbao').html('<?=_changepsucc?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    bclose29();
                    $('#newpasswordu').val('');
                    $('#cfnpasswordu').val('');
                    $('#popup26').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                    });
                }
           });
        });
        $('.kichhoat').live('click', function(){
           var id = $(this).attr('rel');
           $.post("module/u_bokichhoat.php", {id: id}, function(data){
                $('#khota'+id).html(data);
           }); 
        });
        $('.chuakichhoat').live('click', function(){
           var id = $(this).attr('rel');
           $.post("module/u_kichhoat.php", {id: id}, function(data){
                $('#khota'+id).html(data);
           }); 
        });
    </script>
    <?php } if($_SESSION['quyenper'] == 2 || $_SESSION['quyenper'] == 3) { ?> 
    <div id="popup29" class="ghpopup">
        <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
        <h2 class="tieudepop"><?=_doimatkhau?></h2>
        <div class="form scrollbar-macosx">
            <form>
                    <input type="hidden" name="idus" id="idus" />
                    <div>
                        <label for="password"><?=_newpassword?></label>
                        <input type="password" name="newpasswordu" id="newpasswordu" class="in" />
                    </div>
                    <div>
                        <label for="cfpassword"><?=_cfpassword?></label>
                        <input type="password" name="cfnpasswordu" id="cfnpasswordu" class="in" />
                    </div>
                    <div>
                        <input type="button" class="gui" id="cpwu" value="<?=_update?>" />
                    </div>
                </form>
        </div>
    </div>
    <div id="popup5">
        <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
        <p class="thongbao"></p>
    </div>
    <script type="text/javascript">
        $('.changepass').live('click',function(){
            bclose26();
            bclose28();
            bclose27();
            var id = $(this).attr('rel');
            $('#idus').val(id);
            $('#popup29').bPopup({
        	   speed: 650,
               transition: 'slideIn',
               transitionClose: 'easeOutCubic'
            });
        });
        $('#cpwu').live('click', function(){
           var id = $('#idus').val(); 
           var pwu = $('#newpasswordu').val();
           var cpwu = $('#cfnpasswordu').val();
           if(pwu == ''){
                $('p.thongbao').html('<?=_nopass?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#newpasswordu').focus();
                return false; 
           } 
           if(cpwu == ''){
                $('p.thongbao').html('<?=_nocfpass?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#cfnpasswordu').focus();
                return false; 
           }
           if(cpwu !== pwu){
                $('p.thongbao').html('<?=_passnotmatch?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#cfnpasswordu').focus();
                return false;
           }
           $.post("module/u_changpass.php",{
                id: id,
                pwu: pwu
           }, function(data){
                if(data == 1){
                    $('p.thongbao').html('<?=_changepsucc?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    bclose29();
                    $('#newpasswordu').val('');
                    $('#cfnpasswordu').val('');
                }
           });
        });
    </script>
    <?php } if($_SESSION['quyenper'] == '4') { ?>
    <div id="popup29" class="ghpopup">
        <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
        <h2 class="tieudepop"><?=_doimatkhau?></h2>
        <div class="form scrollbar-macosx">
            <form>
                    <input type="hidden" name="idus" id="idus" />
                    <div>
                        <label for="password"><?=_newpassword?></label>
                        <input type="password" name="newpasswordu" id="newpasswordu" class="in" />
                    </div>
                    <div>
                        <label for="cfpassword"><?=_cfpassword?></label>
                        <input type="password" name="cfnpasswordu" id="cfnpasswordu" class="in" />
                    </div>
                    <div>
                        <input type="button" class="gui" id="cpwu" value="<?=_update?>" />
                    </div>
                </form>
        </div>
    </div>
    <div id="popup5">
        <p class="kidz"><img src="img/bg_baby.png" alt="Baby" width="100" /></p>
        <p class="thongbao"></p>
    </div>
    <script type="text/javascript">
        $('.changpassteach').live('click',function(){
            var id = $(this).attr('rel');
            $('#idus').val(id);
            $('#popup29').bPopup({
        	   speed: 650,
               transition: 'slideIn',
               transitionClose: 'easeOutCubic'
            });
        });
        $('#cpwu').live('click', function(){
           var id = $('#idus').val(); 
           var pwu = $('#newpasswordu').val();
           var cpwu = $('#cfnpasswordu').val();
           if(pwu == ''){
                $('p.thongbao').html('<?=_nopass?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#newpasswordu').focus();
                return false; 
           } 
           if(cpwu == ''){
                $('p.thongbao').html('<?=_nocfpass?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#cfnpasswordu').focus();
                return false; 
           }
           if(cpwu !== pwu){
                $('p.thongbao').html('<?=_passnotmatch?>');
                $('#popup5').bPopup({
                    autoClose: 1500
                });
                $('#cfnpasswordu').focus();
                return false;
           }
           $.post("module/u_changpassteach.php",{
                id: id,
                pwu: pwu
           }, function(data){
                if(data == 1){
                    $('p.thongbao').html('<?=_changepsucc?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#newpasswordu').val('');
                    $('#cfnpasswordu').val('');
                    bclose29();
                }
           });
        });
    </script>
    <?php } ?>
    <script src="js/custom-file-input.js"></script>
    <div id="loading">&nbsp;</div>
    </div>
    <footer>
            &copy; 2016 All rights reserved. Sunrise Kidz System Administration, developed by a great team of disabled programmers in Vietnam
    </footer>
</body>
</html>