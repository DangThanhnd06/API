<script type="text/javascript">
	function checkform() {
		if(document.frm.tieude.value=="") {
			alert("Bạn chưa nhập tiêu đề.!");
			document.frm.tieude.focus();
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
				$path = "../upload/banggia";
				$file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : "";
				$file_name = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : "";
				$file_type = isset($_FILES['img']['type']) ? $_FILES['img']['type'] : "";
				$file_size = isset($_FILES['img']['size']) ? $_FILES['img']['size'] : "";
				$file_error = isset($_FILES['img']['error']) ? $_FILES['img']['error'] : "";
				move_uploaded_file($_FILES['img']['tmp_name'],$path."/".$_FILES['img']['name']);
			}
		//}
	}
	$s = $h->query("select * from h_banggia where id=$id");
	$r = $h->fetch_array($s);
	$td = $r['tieude'];
	$ha = $r['hinhanh'];
	$nd = $r['noidung'];
	$tit = $r['title'];
	$mt = $r['mota'];
	$tk = $r['tukhoa'];
	$sx = $r['sapxep'];
	$ht = $r['hienthi'];
	$tcong = "";
	if(isset($_POST['luu']))
	{
		$data['tieude'] = $_POST['tieude'];
		if($_FILES['img']['name']=='') $data['hinhanh'] = $ha;
		else $data['hinhanh'] = $_FILES['img']['name'];
		$data['noidung'] = $_POST['noidung'];
		
		$data['title'] = $_POST['title'];
		$data['mota'] = $_POST['mota'];
		$data['tukhoa'] = $_POST['tukhoa'];
		
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $data['sapxep']=$sx;
		else $data['sapxep'] = $sapxep;		
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		
		
		$query = $h->update($data,"h_banggia"," where id=".$id);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = $h->query("select * from h_banggia where id=$id");
			$r = $h->fetch_array($s);
			$td = $r['tieude'];
			$ha = $r['hinhanh'];
			$nd = $r['noidung'];
			$tit = $r['title'];
			$mt = $r['mota'];
			$tk = $r['tukhoa'];
			$sx = $r['sapxep'];
			$ht = $r['hienthi'];
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title">Cập nhật nội dung bảng giá</p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
		<div>
			<label for="hoten">Tên bảng giá:</label>
			<input type="text" name="tieude" value="<?php echo $td?>" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
			<label for="hoten">Hình ảnh:</label>
            <?php if($ha != '') { ?>
            <p class="cachtrai"><img src="../upload/banggia/<?php echo $ha ?>" width="150" /></p>
            <?php } else { ?>
            <p class="cachtrai"><img src="../images/no-image.png" width="150" /></p>
            <?php } ?>
			<p class="cachtrai"><input type="file" name="img" /></p>
            <p class="cachtrai">(Kích thước hình ảnh lớn hơn hoặc bằng tỷ lệ 400px x 250px, nếu không thay hình khác hãy để trống)</p>
		</div>
        <div>
			<label for="hoten">Nội dung:</label><br /><br />
            <textarea id="noidung" name="noidung" rows=4 cols=30><?=$nd?></textarea>
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
        	<label for="de">&nbsp;</label><span class="font13"><font color="#FF0000"><b>Thông tin cho SEO Website</b></font></span>
        </div>
        <div>
        	<label for="ti_w">Title Wesite:</label>
            <input type="text" name="title" value="<?php echo $tit?>" size="60" />
        </div>
        <div>
        	<label for="des">Description:</label>
            <textarea name="mota" id="mota" rows="4" cols="67"><?php echo $mt?></textarea>
        </div>
        <div>
        	<label for="key">Keywords:</label>
            <textarea name="tukhoa" rows="4" cols="67"><?php echo $tk?></textarea>
        </div>
		<div>
			<input type="submit" name="luu" value="Cập nhật" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>