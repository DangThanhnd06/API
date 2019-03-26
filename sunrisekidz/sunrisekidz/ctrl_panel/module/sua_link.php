<script type="text/javascript">
	function checkform() {
		if(!isNaN(document.frm.sapxep)) {
			alert("Dữ liệu sắp xếp là số. Vui lòng điền chính xác!");
			document.frm.sapxep.focus();
			return false;
		}
	}
</script>
<?php
	$id = $_REQUEST['id'];
	$qc_id = $_REQUEST['qc_id'];
	switch($qc_id){
		case 1:
			$quanly = 'Cập nhật quảng cáo 2 bên';
			$size = '(Kích thước 135px x 489px)';
			break;
		case 2:
			$quanly = 'Cập nhật link youtube';
			$size = '(Kích thước 205px x 136px)';
			break;
	}
	$s = mysql_query("select * from h_link where id=$id");
	$r = mysql_fetch_array($s);
	$u = $r['url'];
	$ha = $r['hinhanh'];
	
	$ht = $r['hienthi'];
	$tcong = "";
	if(isset($_FILES['img']['name']))
	{
		/*if ((($_FILES["img"]["type"] == "image/gif") || ($_FILES["img"]["type"] == "image/jpeg") || ($_FILES["img"]["type"] == "image/pjpeg"))&& ($_FILES["img"]["size"] < 307200))
		{
			*/if($_FILES["img"]["error"]>0)
			{
				echo "";
			}
			{
				$path = "../upload/link";
				$file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : "";
				$file_name = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : "";
				$file_type = isset($_FILES['img']['type']) ? $_FILES['img']['type'] : "";
				$file_size = isset($_FILES['img']['size']) ? $_FILES['img']['size'] : "";
				$file_error = isset($_FILES['img']['error']) ? $_FILES['img']['error'] : "";
				move_uploaded_file($_FILES['img']['tmp_name'],$path."/".$_FILES['img']['name']);
			}
		//}
	}
	if(isset($_POST['luu']))
	{
		$data['qc_id'] = 1;
		$data['url'] = $_POST['url'];
		if($_FILES['img']['name']=='') $data['hinhanh'] = $ha;
		else $data['hinhanh'] = $_FILES['img']['name'];
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		$query = $h->update($data,"h_link"," where id=$id");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Thêm thành công</p>";
			$s = mysql_query("select * from h_link where id=$id");
			$r = mysql_fetch_array($s);
			$u = $r['url'];
			$ha = $r['hinhanh'];
			
			$ht = $r['hienthi'];
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title"><?=$quanly?></p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
    	<div>
        	<label for="alt">URL</label>
            <input type="text" name="url" value="<?=$u?>" size="60" />
        </div>
        <div>
			<label for="hoten">Hình ảnh:</label>
            <?php
				if($ha!='') {
			?>
            <p class="cachtrai"><img src="<?='../upload/link/'.$ha?>" width="120" /></p>
            <?php } ?>
			<p class="cachtrai"><input type="file" name="img" /> <?=$size?></p>
            <p class="cachtrai">(Nếu không thay hình khác, hãy để trống)
		</div>
        <div>
			<label for="hoten">Hiển thị / Ẩn:</label>
			<span class="font13">Hiển thị: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Ẩn: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
			</span>
		</div>
		<div>
			<input type="submit" name="luu" value="Lưu" class="gui" />
			<input type="reset" name="reset" value="Nhập lại" class="reset" />
		</div>
	</form>
</div>