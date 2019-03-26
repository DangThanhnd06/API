<?php
        $sb = $h->query("select noidung from h_html where id=22");
        $rb = $h->fetch_array($sb);
    ?>
 <div id="chame">
	<div class="banner"><img src="upload/<?=$rb['noidung']?>"  alt="Banner cha mẹ"></div>
    <div class="boxl">
        <h1>Đăng nhập</h1>
        <div class="child">
            <form>
                <p>
                    <label for="user">Tên đăng nhập: </label>
                    <input class="input" id="user" name="user" placeholder="Tên đăng nhập" type="text" />
                    <span style="display: block;margin-left:120px;font-size:12px;" id="userinfo"></span>
                </p>
                <p>
                    <label for="user">Mật khẩu: </label>
                    <input class="input" id="matkhau" name="matkhau" placeholder="Mật khẩu" type="password" />
                    <span style="display: block;margin-left:120px;font-size:12px;" id="matkhauinfo"></span>
                </p>
                <p>
                    <input class="sent" id="dangnhap" value="Đăng nhập" type="button" />
                    <img src="img/loading.gif" id="loadd" style="display: none;margin:5px 0 0 10px;" alt="Loading" />
                </p>
            </form>
        </div>  
    </div><!--boxl-->
    <script type="text/javascript">
        jQuery(document).ready(function($){
           $('#dangnhap').click(function(){
                if($('#user').val()==''){
                    $('#userinfo').html('Bạn chưa điền tên đăng nhập. Vui lòng điền vào !');
                    $('#userinfo').css('color','red');
                    $('#user').focus();
                    $('#user').css('border','1px solid red');
                    $('#user').css('color','red');
                    return false;
                } else {
                    $('#userinfo').html('');
                    $('#user').css('border','1px solid #cecece');
                    $('#user').css('color','#333');
                    var user = $('#user').val();
                }
                if($('#matkhau').val()==''){
                    $('#matkhauinfo').html('Bạn chưa điền mật khẩu. Vui lòng điền vào !');
                    $('#matkhauinfo').css('color','red');
                    $('#matkhau').focus();
                    $('#matkhau').css('border','1px solid red');
                    $('#matkhau').css('color','red');
                    return false;
                } else {
                    $('#matkhauinfo').html('');
                    $('#matkhau').css('border','1px solid #cecece');
                    $('#matkhau').css('color','#333');
                    var matkhau = $('#matkhau').val();
                }
                //$('#matkhauinfo').html(user+' '+matkhau);
                $('#loadd').show();
                $.post("module/process_dangnhap.php", {
				    user: user,
                    matkhau: matkhau
				},  function(data){
		            if(data == 1){
		                $('#loadd').hide();
                        $('#userinfo').html('Tên đăng nhập không tồn tại. Vui lòng nhập tên đăng nhập khác!');
                        $('#userinfo').css('color','red');
                        $('#user').focus();
                        $('#user').css('border','1px solid red');
                        $('#user').css('color','red');
                        return false;
		            } else {
		                if(data == 2){
		                    $('#loadd').hide();
                            $('#matkhauinfo').html('Mật khẩu chưa chính xác. Vui lòng điền lại ! \nNếu bạn quên mật khẩu, vui lòng liên hệ với quản trị để lấy lại.');
                            $('#matkhauinfo').css('color','red');
                            $('#matkhau').focus();
                            $('#matkhau').css('border','1px solid red');
                            $('#matkhau').css('color','red');
                            $('#matkhau').val('');
                            return false;  
		                } else {
		                  location.assign('cha-me/');
		                }    
		            }  	
                });
           }); 
        });
    </script>
    <?php include("right.php"); ?>
    <div class="clr"></div>
 </div><!-- end #chame -->