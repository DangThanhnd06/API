<script type="text/javascript">
	function checkform() {
		if(document.frm.tieude_vn.value=="") {
			alert("Bạn chưa nhập tiêu đề tiếng Việt.!");
			document.frm.tieude_vn.focus();
			return false;
		}
        if(document.frm.tieude_en.value=="") {
			alert("Bạn chưa nhập tiêu đề tiếng Anh.!");
			document.frm.tieude_en.focus();
			return false;
		}
		if(!isNaN(document.frm.sapxep)) {
			alert("Dữ liệu sắp xếp là số. Vui lòng nhập chính xác!");
			document.frm.sapxep.focus();
			return false;
		}
	}
</script>
<?php
	$act = $_REQUEST['act'];
	$quanly = 'Thêm PDF mới vào PDF Category';
	$tcong = "";
	$s = $h->query("select max(sapxep) as maxsx from h_pdf");
	$rs = $h->fetch_array($s);
	$sx = $rs['maxsx']+1;
	if(isset($_FILES['video']['name']))	{

		//if ((($_FILES["video"]["type"] == "image/gif") || ($_FILES["video"]["type"] == "image/jpeg") || ($_FILES["video"]["type"] == "image/pjpeg"))&& ($_FILES["video"]["size"] < 512000)) {
			if($_FILES["video"]["error"]>0)	{
				echo "";
			}
	
			else
	
			{
	
				$path = "../upload/pdf";
	
				$file_tmp = isset($_FILES['video']['tmp_name']) ? $_FILES['video']['tmp_name'] : "";
	
				$file_name = isset($_FILES['video']['name']) ? $_FILES['video']['name'] : "";
	
				$file_type = isset($_FILES['video']['type']) ? $_FILES['video']['type'] : "";
	
				$file_size = isset($_FILES['video']['size']) ? $_FILES['video']['size'] : "";
	
				$file_error = isset($_FILES['video']['error']) ? $_FILES['video']['error'] : "";
	
				move_uploaded_file($_FILES['video']['tmp_name'],$path."/".$_FILES['video']['name']);
	
			}
		//}

	}
    if(isset($_FILES['filepdf']['name']))	{

		//if ((($_FILES["filepdf"]["type"] == "image/gif") || ($_FILES["filepdf"]["type"] == "image/jpeg") || ($_FILES["filepdf"]["type"] == "image/pjpeg"))&& ($_FILES["filepdf"]["size"] < 512000)) {
			if($_FILES["filepdf"]["error"]>0)	{
				echo "";
			}
	
			else
	
			{
	
				$path = "../upload/pdf";
	
				$file_tmp = isset($_FILES['filepdf']['tmp_name']) ? $_FILES['filepdf']['tmp_name'] : "";
	
				$file_name = isset($_FILES['filepdf']['name']) ? $_FILES['filepdf']['name'] : "";
	
				$file_type = isset($_FILES['filepdf']['type']) ? $_FILES['filepdf']['type'] : "";
	
				$file_size = isset($_FILES['filepdf']['size']) ? $_FILES['filepdf']['size'] : "";
	
				$file_error = isset($_FILES['filepdf']['error']) ? $_FILES['filepdf']['error'] : "";
	
				move_uploaded_file($_FILES['filepdf']['tmp_name'],$path."/".$_FILES['filepdf']['name']);
	
			}
		//}

	}
	if(isset($_POST['luu'])) {
	   $data['tieude_vn'] = str_replace("'","\'",$_POST['tieude_vn']);
        $data['tieude_en'] = str_replace("'","\'",$_POST['tieude_en']);
     	$data['hinhanh'] = $_FILES['video']['name'];
        $data['file'] = $_FILES['filepdf']['name'];
        $data['url'] = $_POST['url'];
        $data['xnd_vn'] = str_replace("'","\'",$_POST['xnd_vnn']);
        $data['xnd_en'] = str_replace("'","\'",$_POST['xnd_enn']);
        
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $data['sapxep']=$sx;
		else $data['sapxep'] = $sapxep;		
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		
		
		$query = $h->insert($data,"h_pdf");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Thêm thành công</p>";
			$s = $h->query("select max(sapxep) as maxsx from h_pdf");
			$rs = $h->fetch_array($s);
			$sx = $rs['maxsx']+1;
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
			<label for="hoten">Tiêu đề (VN):</label>
			<input type="text" name="tieude_vn" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Tiêu đề (EN):</label>
			<input type="text" name="tieude_en" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
			<label for="hoten">Hình ảnh:</label>
			<input type="file" name="video" /> (Kích thước hình ảnh lớn hơn hoặc bằng tỷ lệ 300px x 225px)
		</div>
        <div>
			<label for="hoten">File PDF:</label>
			<input type="file" name="filepdf" />
		</div>
        <div>
			<label for="hoten">Link file PDF:</label>
			<input type="text" name="url" value="" size="40" /> (Nếu có Link file PDF thì file PDF không cần nữa)
		</div>
        <div>
			<label for="hoten">Nội dung mô tả (VN):</label>
            <textarea id="xnd_vnn" name="xnd_vnn" rows="4" cols="67"></textarea>
		</div>
        <div>
			<label for="hoten">Nội dung mô tả (EN):</label>
            <textarea id="xnd_enn" name="xnd_enn" rows="4" cols="67"></textarea>
		</div>
		<div>
			<label for="hoten">Hiển thị / ẩn:</label>
			<span class="font13">Hiển thị: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Ẩn: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
			</span>
		</div>
		<div>
			<input type="submit" name="luu" value="Lưu" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>