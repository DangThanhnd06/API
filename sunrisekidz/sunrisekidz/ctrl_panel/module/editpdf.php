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
	$id = $_REQUEST['id'];
    if(isset($_FILES['img']['name']))
	{
		/*if ((($_FILES["img"]["type"] == "image/gif") || ($_FILES["img"]["type"] == "image/jpeg") || ($_FILES["img"]["type"] == "image/pjpeg"))&& ($_FILES["img"]["size"] < 307200))
		{
			*/if($_FILES["img"]["error"]>0)
			{
				echo "";
			}
			{
				$path = "../upload/pdf";
				$file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : "";
				$file_name = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : "";
				$file_type = isset($_FILES['img']['type']) ? $_FILES['img']['type'] : "";
				$file_size = isset($_FILES['img']['size']) ? $_FILES['img']['size'] : "";
				$file_error = isset($_FILES['img']['error']) ? $_FILES['img']['error'] : "";
				move_uploaded_file($_FILES['img']['tmp_name'],$path."/".$_FILES['img']['name']);
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
	$s = $h->query("select * from h_pdf where id=$id");
	$r = $h->fetch_array($s);
	$quanly = "Cập nhật nội dung PDF";
	$td_vn = $r['tieude_vn'];
    $td_en = $r['tieude_en'];
	$ha = $r['hinhanh'];
    $fl = $r['file'];
    $xnd_vn = $r['xnd_vn'];
    $xnd_en = $r['xnd_en'];
    $url = $r['url'];
	$sx = $r['sapxep'];
	$ht = $r['hienthi'];
	$tcong = "";
	if(isset($_POST['luu']))
	{
	    $data['tieude_vn'] = str_replace("'","\'",$_POST['tieude_vn']);
        $data['tieude_en'] = str_replace("'","\'",$_POST['tieude_en']);
     	if($_FILES['img']['name']=='') $data['hinhanh'] = $ha;
		else $data['hinhanh'] = $_FILES['img']['name'];
        if($_FILES['filepdf']['name']=='') $data['filepdf'] = $fl;
		else $data['file'] = $_FILES['filepdf']['name'];
        $data['xnd_vn'] = str_replace("'","\'",$_POST['xnd_vnn']);
        $data['xnd_en'] = str_replace("'","\'",$_POST['xnd_enn']);
        $data['url'] = str_replace("'","\'",$_POST['url']);
	    
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $data['sapxep']=$sx;
		else $data['sapxep'] = $sapxep;		
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;		
		
		$query = $h->update($data,"h_pdf"," where id=".$id);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = $h->query("select * from h_pdf where id=$id");
			$r = $h->fetch_array($s);
            $td_vn = $r['tieude_vn'];
            $td_en = $r['tieude_en'];
        	$ha = $r['hinhanh'];
            $fl = $r['file'];
            $xnd_vn = $r['xnd_vn'];
            $xnd_en = $r['xnd_en'];
            $url = $r['url'];
        	$sx = $r['sapxep'];
        	$ht = $r['hienthi'];
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
			<input type="text" name="tieude_vn" value="<?php echo $td_vn?>" size="67" />
		</div>
        <div>
			<label for="hoten">Tiêu đề (EN):</label>
			<input type="text" name="tieude_en" value="<?php echo $td_en?>" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
			<label for="hoten">Hình ảnh:</label>
            <?php if($ha != '') { ?>
            <p class="cachtrai"><img src="../upload/pdf/<?php echo $ha ?>" width="150" /></p>
            <?php } else { ?>
            <p class="cachtrai"><img src="../img/no_image.gif" width="150" /></p>
            <?php } ?>
			<p class="cachtrai"><input type="file" name="img" /></p>
            <p class="cachtrai">(Kích thước hình ảnh lớn hơn hoặc bằng tỷ lệ 300px x 225px, nếu không thay hình khác hãy để trống)</p>
		</div>
        <div>
			<label for="hoten">File PDF:</label>
			<input type="file" name="filepdf" /> (Nếu không thay file PDF khác, hãy để trống)
		</div>
        <div>
			<label for="hoten">Link file PDF:</label>
			<input type="text" name="url" value="<?=$url?>" size="40" /> (Nếu có Link file PDF thì file PDF không cần nữa)
		</div>
        <div>
			<label for="hoten">Nội dung mô tả (VN):</label>
            <textarea id="xnd_vnn" name="xnd_vnn" rows="4" cols="67"><?=$xnd_vn?></textarea>
		</div>
        <div>
			<label for="hoten">Nội dung mô tả (EN):</label>
            <textarea id="xnd_enn" name="xnd_enn" rows="4" cols="67"><?=$xnd_en?></textarea>
		</div>
		<div>
			<label for="hoten">Hiển thị / ẩn:</label>
			<span class="font13">
			<?php if($ht==1) { ?>
            Hiển thị: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Ẩn: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
            <?php } else { ?>
            Hiển thị: 
			<input type="radio" name="hienthi" id="web1" value="1" />&nbsp;Ẩn: 
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