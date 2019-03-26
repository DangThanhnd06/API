<?php
	$id = $_REQUEST['id'];
	$ss = $h->query("select * from h_gioithieu where id=$id");
	$rs = $h->fetch_array($ss);
    $td_vn = $rs['tieude_vn'];
    $td_en = $rs['tieude_en'];
    $nd_vn = $rs['noidung_vn'];
    $nd_en = $rs['noidung_en'];
    $tit_vn = $rs['title_vn'];
    $tit_en = $rs['title_en'];
    $mt_vn = $rs['mota_vn'];
    $mt_en = $rs['mota_en'];
    $tk_vn = $rs['tukhoa_vn'];
    $tk_en = $rs['tukhoa_en'];
    $ht = $rs['hienthi'];
    $quanly = "Cập nhật thông tin &raquo; ".$rs['tieude_vn'];
	if(isset($_POST['luu']))
	{
	    $data['title_vn'] = str_replace("'","\'",$_POST['title_vn']);
        $data['title_en'] = str_replace("'","\'",$_POST['title_en']);
   		$data['mota_vn'] = str_replace("'","\'",$_POST['mota_vn']);
        $data['mota_en'] = str_replace("'","\'",$_POST['mota_en']);
        $data['tukhoa_vn'] = str_replace("'","\'",$_POST['tukhoa_vn']);
        $data['tukhoa_en'] = str_replace("'","\'",$_POST['tukhoa_en']);
	   	$data['noidung_vn'] = str_replace("'","\'",$_POST['noidung_vn']);
        $data['noidung_en'] = str_replace("'","\'",$_POST['noidung_en']);
        if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		$query = $h->update($data,"h_gioithieu"," where id=".$id);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$ss = $h->query("select * from h_gioithieu where id=$id");
        	$rs = $h->fetch_array($ss);
            $td_vn = $rs['tieude_vn'];
            $td_en = $rs['tieude_en'];
            $nd_vn = $rs['noidung_vn'];
            $nd_en = $rs['noidung_en'];
            $tit_vn = $rs['title_vn'];
            $tit_en = $rs['title_en'];
            $mt_vn = $rs['mota_vn'];
            $mt_en = $rs['mota_en'];
            $tk_vn = $rs['tukhoa_vn'];
            $tk_en = $rs['tukhoa_en'];
            $ht = $rs['hienthi'];
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
			<input type="text" name="tieude_vn" value="<?=$td_vn?>" size="67" />
		</div>
        <div>
			<label for="hoten">Tiêu đề (EN):</label>
			<input type="text" name="tieude_en" value="<?=$td_en?>" size="67" />
		</div>
        <div>
			<label for="hoten">Nội dung (VN):</label>
			<textarea id="noidung_vn" name="noidung_vn" cols="67" rows="8"><?php echo $nd_vn?></textarea>
		</div>
        <div>
			<label for="hoten">Nội dung (EN):</label>
			<textarea id="noidung_en" name="noidung_en" cols="67" rows="8"><?php echo $nd_en?></textarea>
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
            <input type="text" name="title_vn" value="<?php echo $tit_vn?>" size="60" />
        </div>
        <div>
        	<label for="ti_w">Title Wesite (EN):</label>
            <input type="text" name="title_en" value="<?php echo $tit_en?>" size="60" />
        </div>
        <div>
        	<label for="des">Description (VN):</label>
            <textarea name="mota_vn" id="mota_vn" rows="4" cols="67"><?php echo $mt_vn?></textarea>
        </div>
        <div>
        	<label for="des">Description (EN):</label>
            <textarea name="mota_en" id="mota_en" rows="4" cols="67"><?php echo $mt_en?></textarea>
        </div>
        <div>
        	<label for="key">Keywords (VN):</label>
            <textarea name="tukhoa_vn" rows="4" cols="67"><?php echo $tk_vn?></textarea>
        </div>
        <div>
        	<label for="key">Keywords (EN):</label>
            <textarea name="tukhoa_en" rows="4" cols="67"><?php echo $tk_en?></textarea>
        </div>
        <div>
			<input type="submit" name="luu" value="Cập nhật" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>