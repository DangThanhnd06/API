<script type="text/javascript">
	function checkform() {
		if(document.frm.hoten.value=="") {
			alert("Bạn chưa nhập họ tên giáo viên.!");
			document.frm.hoten.focus();
			return false;
		}
		if(document.frm.user.value=="") {
			alert("Bạn chưa nhập tên đăng nhập cho giáo viên.!");
			document.frm.user.focus();
			return false;
		}
        if(document.frm.matkhau.value=="") {
			alert("Bạn chưa nhập mật khẩu.!");
			document.frm.matkhau.focus();
			return false;
		}
	}
</script>
<?php
	$id = $_REQUEST['id'];
	$quanly = 'Cập nhật thông tin giáo viên';
	$tcong = "";
	$s = $h->query("select * from h_giaovien where id=$id");
    $r = $h->fetch_array($s);
    $hoten = $r['hoten'];
    $chuyenmon = $r['chuyenmon'];
    $yahoo = $r['yahoo'];
    $skype = $r['skype'];
    $ht = $r['kichhoat'];
	if(isset($_POST['luu'])) {
        $data['hoten'] = str_replace("'","\'",$_POST['hoten']);
     	$data['chuyenmon'] = str_replace("'","\'",$_POST['chuyenmon']);
		$data['yahoo'] = $_POST['yahoo'];
        $data['skype'] = $_POST['skype'];		
		if($_POST['hienthi']==1) $data['kichhoat'] = 1;
		if($_POST['hienthi']==2) $data['kichhoat'] = 0;
		
		
		$query = $h->update($data,"h_giaovien"," where id=$id");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
            $s = $h->query("select * from h_giaovien where id=$id");
            $r = $h->fetch_array($s);
		    $hoten = $r['hoten'];
            $chuyenmon = $r['chuyenmon'];
            $yahoo = $r['yahoo'];
            $skype = $r['skype'];
            $ht = $r['kichhoat'];	
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
			<label for="hoten">Họ tên:</label>
			<input type="text" name="hoten" value="<?=$hoten?>" size="67" />
		</div>
        <div>
			<label for="hoten">Chuyên môn:</label>
			<textarea name="chuyenmon" rows="6" cols="51"><?=$chuyenmon?></textarea>
		</div>
        <div>
			<label for="hoten">Nick yahoo:</label>
			<input type="text" name="yahoo" value="<?=$yahoo?>" size="67" />
		</div>
        <div>
			<label for="hoten">Nick skype:</label>
			<input type="text" name="skype" value="<?=$skype?>" size="67" />
		</div>
		<div>
			<label for="hoten">Kích hoạt:</label>
			<span class="font13">
			<?php if($ht==1) { ?>
            Có: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Không: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
            <?php } else { ?>
            Có: 
			<input type="radio" name="hienthi" id="web1" value="1" />&nbsp;Không: 
			<input type="radio" name="hienthi" id="web2" value="2" checked /><br />
            <?php } ?>
			</span>
		</div>
		<div>
			<input type="submit" name="luu" value="Cập nhật" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>