<script type="text/javascript">
	function checkform() {
		if(document.frm.user.value=="") {
			alert("Bạn chưa nhập tên đăng nhập cho giáo viên.!");
			document.frm.user.focus();
			return false;
		}
        if($('#mk').val()!='') {
            if($('#xnmk').val()==''){
                alert("Bạn chưa nhập mật khẩu xác nhận.!");
    			$('#xnmk').focus();
    			return false;
            }
            if($('#mk').val()!==$('#xnmk').val()){
                alert("Mật khẩu chưa trùng khớp!");
    			$('#xnmk').focus();
    			return false;
            }
		}
        
	}
</script>
<?php
	$id = $_REQUEST['id'];
    $sk = $h->query("select hoten from h_giaovien where id=$id");
    $rk = $h->fetch_array($sk);
	$quanly = 'Cập nhật tên đăng nhập, mật khẩu cho giáo viên '.$rk['hoten'];
	$tcong = "";
	$s = $h->query("select user from h_giaovien where id=$id");
    $r = $h->fetch_array($s);
    $user = $r['user'];
	if(isset($_POST['luu'])) {
        $data['user'] = str_replace("'","\'",trim($_POST['user']));
        if(trim($_POST['matkhau'])!='')
		  $data['matkhau'] = mahoa($_POST['matkhau']);	
		
		$query = $h->update($data,"h_giaovien"," where id=$id");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
            $s = $h->query("select user from h_giaovien where id=$id");
            $r = $h->fetch_array($s);
		    $user = $r['user'];	
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title"><?php echo $quanly?></p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
    
		<div>
			<label for="hoten">User:</label>
			<input type="text" name="user" value="<?=$user?>" size="40" /> (<span style="color: red;font-weight:bold;">Lưu ý:</span> Cần nhớ hoặc ghi lại để cấp cho giáo viên)
		</div>
        <div>
			<label for="hoten">Mật khẩu:</label>
			<input type="password" id="mk" name="matkhau" size="40" value="" /> (<span style="color: red;font-weight:bold;">Lưu ý:</span> Cần nhớ hoặc ghi lại để cấp cho giáo viên. Nếu không đổi mật khẩu hãy để trống)
		</div>
        <div>
			<label for="hoten">Xác nhận mật khẩu:</label>
			<input type="password" id="xnmk" name="xnmatkhau" size="40" value="" />
		</div>
		<div>
			<input type="submit" name="luu" value="Cập nhật" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>