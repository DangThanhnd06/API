<script type="text/javascript">
	function checkform() {
		if(!isNaN(document.frm.sapxep)) {
			alert("Dữ liệu sắp xếp là số. Vui lòng điền chính xác!");
			document.frm.sapxep.focus();
			return false;
		}
		if(document.frm.img.value=="") {
			alert("Bạn chưa chọn hình");
			document.frm.img.focus();
			return false;
		}
	}
</script>
<?php
	$s = mysql_query("select max(sapxep) as maxsx from h_hinhchay");
	$rs = mysql_fetch_array($s);
	$sx = $rs['maxsx']+1;
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
				$path = "../upload/slide";
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
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $data['sapxep']=$sx;
		else $data['sapxep'] = $sapxep;
		$data['hinhanh'] = $_FILES['img']['name'];
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		$query = $h->insert($data,"h_hinhchay");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Thêm thành công</p>";
			$s = mysql_query("select max(sapxep) as maxsx from h_hinhchay");
			$rs = mysql_fetch_array($s);
			$sx = $rs['maxsx']+1;
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title">Thêm hình ảnh slider <?=$tren?> mới</p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
    	<div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
        	<label for="hoten">Hình ảnh:</label>
			<input type="file" name="img" /> <?=$kt?>
		</div>
        <div>
			<label for="hoten">Link:</label>
			<input type="text" name="url" value="" size="67" placeholder="Ví dụ: http://abc.com" />
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