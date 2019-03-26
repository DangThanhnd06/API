<script type="text/javascript">
	function checkform() {
		if(document.frm.tieude.value=="") {
			alert("Bạn chưa nhập tiêu đề tiếng việt.!");
			document.frm.tieude.focus();
			return false;
		}
		if(document.frm.tieude_en.value=="") {
			alert("Bạn chưa nhập tiêu đề tiếng anh!");
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
	$quanly = "Cập nhật sản phẩm";
	$kt = '(Kích thước lớn hơn hoặc bằng với tỷ lệ 162px x 82px)';
	$id = $_REQUEST['id'];
?>

<?php
	$s = $h->query("select * from h_sanpham where id=$id");
	$r = $h->fetch_array($s);
	$td = $r['tieude_vn'];
	$td_en = $r['tieude_en'];
	$ha = $r['hinhanh'];
	$nd = $r['noidung_vn'];
	$nd_en = $r['noidung_en'];
	$tit = $r['title_vn'];
	$tit_en = $r['title_en'];
	$mt = $r['mota'];
	$tk = $r['tukhoa'];
	$al = $r['alt_vn'];
	$al_en = $r['alt_en'];
	
	$sx = $r['sapxep'];
	$ht = $r['hienthi'];
	if(isset($_POST['luu']))
	{
		$tieude = $_POST['tieude'];
		$tieude_en = $_POST['tieude_en'];
		
		$hinhanh = $_FILES['img']['name'];
		if($hinhanh == "") $hinhanh = $ha;
		else {
			if($id == 1) upload_image(286,312);
			else upload_image(121,111);
			$hinhanh = time()."_".$_FILES['img']['name'];
		}
		
		$noidung = $_POST['noidung'];
		$noidung_en = $_POST['noidung_en'];
		
		$title = $_POST['title'];
		$title_en = $_POST['title_en'];
		$mota = $_POST['mota'];
		$tukhoa = $_POST['tukhoa'];
		$alt = $_POST['alt'];
		$alt_en = $_POST['alt_en'];		
		
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $sapxep=$sx;
		else $sapxep = $sapxep;		
		if($_POST['hienthi']==1) $hienthi = 1;
		if($_POST['hienthi']==2) $hienthi = 0;
		
		
		$query = $h->sua_sanpham($id,$tieude,$tieude_en,$hinhanh,$noidung,$noidung_en,$title,$title_en,$mota,$tukhoa,$alt,$alt_en,$sapxep,$hienthi);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = $h->query("select * from h_sanpham where id=$id");
			$r = $h->fetch_array($s);
			$td = $r['tieude_vn'];
			$td_en = $r['tieude_en'];
			$ha = $r['hinhanh'];
			$nd = $r['noidung_vn'];
			$nd_en = $r['noidung_en'];
			$tit = $r['title_vn'];
			$tit_en = $r['title_en'];
			$mt = $r['mota'];
			$tk = $r['tukhoa'];
			$al = $r['alt_vn'];
			$al_en = $r['alt_en'];
			
			$sx = $r['sapxep'];
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
			<label for="hoten">Tiêu đề (VN):</label>
			<input type="text" name="tieude" value="<?=$td?>" size="67" />
		</div>
        <div>
			<label for="hoten">Tiêu đề (EN):</label>
			<input type="text" name="tieude_en" value="<?=$td_en?>" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?=$sx?>" size="5" />
		</div>
        <div>
        	<p class="cachtrai"><img src="<?=THUMB.$ha?>" width="162" /></p>
			<label for="hoten">Hình đại diện:</label>
			<input type="file" name="img" /> <?=$kt?>
            <p class="cachtrai">(Nếu không thay hình khác hãy để trống)</p>
		</div>
        <div>
			<label for="hoten">Nội dung (VN):</label><br /><br />
			<textarea id="noidung" name="noidung"><?=$nd?></textarea>
		</div>
        <div>
			<label for="hoten">Nội dung (EN):</label><br /><br />
            <textarea id="noidung_en" name="noidung_en" rows=4 cols=30><?=$nd_en?></textarea>
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
        	<label for="ti_w">Title Wesite (VN):</label>
            <input type="text" name="title" value="<?=$tit?>" size="60" />
        </div>
        <div>
        	<label for="ti_w">Title Wesite (EN):</label>
            <input type="text" name="title_en" value="<?=$tit_en?>" size="60" />
        </div>
        <div>
        	<label for="des">Description:</label>
            <textarea name="mota" id="mota" rows="4" cols="67"><?=$mt?></textarea>
        </div>
        <div>
        	<label for="key">Keywords:</label>
            <textarea name="tukhoa" rows="4" cols="67"><?=$tk?></textarea>
        </div>
        <div>
        	<label for="alt">Alt (img) (VN):</label>
            <input type="text" name="alt" value="<?=$al?>" size="60" />
        </div>
        <div>
        	<label for="alt">Alt (img) (EN):</label>
            <input type="text" name="alt_en" value="<?=$al_en?>" size="60" />
        </div>
		<div>
			<input type="submit" name="luu" value="Cập nhật" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>