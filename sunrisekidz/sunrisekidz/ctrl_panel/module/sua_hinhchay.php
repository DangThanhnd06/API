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
	$s = mysql_query("select * from h_hinhchay where id=$id");
	$r = mysql_fetch_array($s);
	$ha = $r['hinhanh'];
    $url = $r['url'];
	$sx = $r['sapxep'];
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
		$hinhanh = $_FILES['img']['name'];
		if($hinhanh == "") $data['hinhanh'] = $ha;
		else {
			$data['hinhanh'] = $_FILES['img']['name'];
		}
        $data['url'] = $_POST['url'];
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		$query = $h->update($data,"h_hinhchay"," where id=".$id);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = mysql_query("select * from h_hinhchay where id=$id");
			$r = mysql_fetch_array($s);
			$ha = $r['hinhanh'];
            $url = $r['url'];
			$sx = $r['sapxep'];
			$ht = $r['hienthi'];
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title">Cập nhật hình ảnh slider</p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
    	<div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
			<label for="hoten">Hình ảnh:</label>
            <?php
				if($ha!='') {
			?>
            <p class="cachtrai"><img src="<?php echo '../upload/slide/'.$ha?>" width="600" /></p>
            <?php } ?>
			<p class="cachtrai"><input type="file" name="img" /> (Kích thước 1170px x 450px)</p>
            <p class="cachtrai">(Nếu không thay hình khác, hãy để trống)
		</div>
        <div>
			<label for="hoten">Link:</label>
			<input type="text" name="url" value="<?=$url?>" size="67" placeholder="Ví dụ: http://abc.com" />
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
			<input type="reset" name="reset" value="Nhập lại" class="reset" />
		</div>
	</form>
</div>