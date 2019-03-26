<?php
	$q = $h->query("select * from h_cauhinh");
	$r = $h->fetch_array($q);
	$td_vn = $r['tieude'];
	$mt_vn = $r['mota'];
	$tk_vn = $r['tukhoa'];
	$ga = $r["ga"];
    $px = $r['pixelfb'];
    $ad = $r['adwordgg'];
	$tcong = "";
	if(isset($_POST['luu']))
	{
		$data['tieude'] = str_replace("'","\'",$_POST['tieude_vn']);
		$data['mota'] = str_replace("'","\'",$_POST['mota_vn']);
		$data['tukhoa'] = str_replace("'","\'",$_POST['tukhoa_vn']);
		$data['ga'] = str_replace("'","\'",$_POST['ga']);
        $data['pixelfb'] = str_replace("'","\'",$_POST['pixelfb']);
		$data['adwordgg'] = str_replace("'","\'",$_POST['adwordgg']);
		$query = $h->update($data,"h_cauhinh");
		if($query)  {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$q = $h->query("select * from h_cauhinh");
			$r = $h->fetch_array($q);
			$td_vn = $r['tieude'];
        	$mt_vn = $r['mota'];
        	$tk_vn = $r['tukhoa'];
        	$ga = $r["ga"];
            $px = $r['pixelfb'];
            $ad = $r['adwordgg'];
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title">Cập nhật nội dung cấu hình ban đầu cho website</p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" >
		<div>
			<label for="hoten">Title:</label>
			<input type="text" name="tieude_vn" value="<?php echo $td_vn?>" size="67" />
		</div>
		<div>
			<label for="hoten">Description:</label>
			<textarea name="mota_vn" id="mota_vn" rows="4" cols="67"><?php echo $mt_vn?></textarea>
		</div>
        <div>
			<label for="hoten">Keywords:</label>
			<textarea name="tukhoa_vn" id="tukhoa_vn" rows="4" cols="67"><?php echo $tk_vn?></textarea>
		</div>
		<div>
			<label>Code Google Analytics</label>
			<textarea rows="4" cols="67" name="ga"><?php echo $ga; ?></textarea>
		</div>
        <div>
			<label>Code Pixel Facebook</label>
			<textarea rows="4" cols="67" name="pixelfb"><?php echo $px; ?></textarea>
		</div>
        <div>
			<label>Code Adwords Google</label>
			<textarea rows="4" cols="67" name="adwordgg"><?php echo $ad; ?></textarea>
		</div>
        <div>
			<input type="submit" name="luu" value="Cập nhật" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>