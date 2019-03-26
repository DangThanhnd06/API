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
	$act = $_REQUEST['act'];
	$quanly = 'Thêm giáo viên mới';
	$tcong = "";
	if(isset($_FILES['video']['name']))	{

		//if ((($_FILES["video"]["type"] == "image/gif") || ($_FILES["video"]["type"] == "image/jpeg") || ($_FILES["video"]["type"] == "image/pjpeg"))&& ($_FILES["video"]["size"] < 512000)) {
			if($_FILES["video"]["error"]>0)	{
				echo "";
			}
	
			else
	
			{
	
				$path = "../upload/doitac";
	
				$file_tmp = isset($_FILES['video']['tmp_name']) ? $_FILES['video']['tmp_name'] : "";
	
				$file_name = isset($_FILES['video']['name']) ? $_FILES['video']['name'] : "";
	
				$file_type = isset($_FILES['video']['type']) ? $_FILES['video']['type'] : "";
	
				$file_size = isset($_FILES['video']['size']) ? $_FILES['video']['size'] : "";
	
				$file_error = isset($_FILES['video']['error']) ? $_FILES['video']['error'] : "";
	
				move_uploaded_file($_FILES['video']['tmp_name'],$path."/".$_FILES['video']['name']);
	
			}
		//}

	}
	if(isset($_POST['luu'])) {
        $data['hoten'] = str_replace("'","\'",$_POST['hoten']);
     	$data['chuyenmon'] = str_replace("'","\'",$_POST['chuyenmon']);
        $data['user'] = trim($_POST['user']);
        $data['matkhau'] = mahoa(trim($_POST['matkhau']));
		$data['yahoo'] = $_POST['yahoo'];
        $data['skype'] = $_POST['skype'];		
		if($_POST['hienthi']==1) $data['kichhoat'] = 1;
		if($_POST['hienthi']==2) $data['kichhoat'] = 0;
		
		
		$query = $h->insert($data,"h_giaovien");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Thêm thành công</p>";
			
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
			<input type="text" name="hoten" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Tên đăng nhập:</label>
			<input type="text" name="user" value="" size="67" placeholder="Ví dụ: nguyenthib" /> (<span style="color: red;font-weight:bold;">Lưu ý:</span> Cần nhớ hoặc ghi lại để cấp cho giáo viên)
		</div>
        <div>
			<label for="hoten">Mật khẩu:</label>
			<input type="password" name="matkhau" size="67" value="" /> (<span style="color: red;font-weight:bold;">Lưu ý:</span> Cần nhớ hoặc ghi lại để cấp cho giáo viên)
		</div>
        <div>
			<label for="hoten">Chuyên môn:</label>
			<textarea name="chuyenmon" rows="6" cols="51"></textarea>
		</div>
        <div>
			<label for="hoten">Nick yahoo:</label>
			<input type="text" name="yahoo" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Nick skype:</label>
			<input type="text" name="skype" value="" size="67" />
		</div>
		<div>
			<label for="hoten">Kích hoạt:</label>
			<span class="font13">Có: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Không: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
			</span>
		</div>
		<div>
			<input type="submit" name="luu" value="Lưu" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>