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
	$quanly = 'Cập nhật tiêu đề danh mục sản phẩm ';
	$id = $_REQUEST['id'];
	$s = mysql_query("select * from h_sanpham where id=$id");
	$r = mysql_fetch_array($s);
	$td = $r['tieude'];
	$tit = $r['title'];
	$mt = $r['mota'];
	$tk = $r['tukhoa'];
	$sx = $r['sapxep'];
	$ht = $r['hienthi'];
	$tcong = "";
	if(isset($_POST['luu']))
	{
		$data['tieude'] = $_POST['tieude'];
		$data['title'] = $_POST['title'];
		$data['mota'] = $_POST['mota'];
		$data['tukhoa'] = $_POST['tukhoa'];
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $data['sapxep']=$sx;
		else $data['sapxep'] = $sapxep;
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		$query = $h->update($data,"h_sanpham"," where id=".$id);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = mysql_query("select * from h_sanpham where id=$id");
			$r = mysql_fetch_array($s);
			$td = $r['tieude'];
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
	<p class="title"><?php echo $quanly?></p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
    	<div>
        	<label for="alt">Tiêu đề</label>
            <input type="text" name="tieude" value="<?php echo $td?>" size="60" />
        </div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
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
			<input type="reset" name="reset" value="Nhập lại" class="reset" />
		</div>
	</form>
</div>