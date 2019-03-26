<?php
	$id = $_REQUEST['id'];
	$q = $h->query("select * from h_html where id=$id");
	$r = $h->fetch_array($q);
	$td = $r['tieude'];
	$nd_vn = $r['noidung'];
	$tcong = "";
    if($id==1) $kichthuoc = '(Kích thước 58px x 58px)';
    else $kichthuoc = '(Kích thước 1171px x 283px)';
	if(isset($_FILES['video']['name']))	{

		//if ((($_FILES["video"]["type"] == "image/gif") || ($_FILES["video"]["type"] == "image/jpeg") || ($_FILES["video"]["type"] == "image/pjpeg"))&& ($_FILES["video"]["size"] < 512000)) {
			if($_FILES["video"]["error"]>0)	{
				echo "";
			}
	
			else
	
			{
	
				$path = "../upload";
	
				$file_tmp = isset($_FILES['video']['tmp_name']) ? $_FILES['video']['tmp_name'] : "";
	
				$file_name = isset($_FILES['video']['name']) ? $_FILES['video']['name'] : "";
	
				$file_type = isset($_FILES['video']['type']) ? $_FILES['video']['type'] : "";
	
				$file_size = isset($_FILES['video']['size']) ? $_FILES['video']['size'] : "";
	
				$file_error = isset($_FILES['video']['error']) ? $_FILES['video']['error'] : "";
	
				move_uploaded_file($_FILES['video']['tmp_name'],$path."/".$_FILES['video']['name']);
	
			}
		//}

	}	
	if(isset($_POST['luu']))
	{
		if($id==1 || $id==13 || $id==14 || $id==15 || $id==15 || $id==16 || $id==17 || $id==18 || $id==19 || $id==20 || $id==21 || $id==22 || $id==23 || $id==24 || $id==25) {
			if($_FILES['video']['name']=="") $data['noidung'] = $nd_vn;
			else $data['noidung'] = $_FILES['video']['name'];
		} else {
	       $data['noidung'] = str_replace("'","\'",$_POST['nd_vn']);
	   }
		
		$query = $h->update($data,"h_html"," where id=$id");
		if($query)  {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$q = $h->query("select * from h_html where id=$id");
			$r = $h->fetch_array($q);
			$nd_vn = $r['noidung'];
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title">Cập nhật nội dung html &raquo; <?php echo $td; ?></p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" >
    <?php
		if($id==1 || $id==13 || $id==14 || $id==15 || $id==15 || $id==16 || $id==17 || $id==18 || $id==19 || $id==20 || $id==21 || $id==22 || $id==23 || $id==24 || $id==25) {
	?>
    	<div>
			<label for="hoten"><?php echo $td?>:</label>
            <?php if($nd_vn!='') { ?>
            <p class="cachtrai"><img src="../upload/<?=$nd_vn?>" width="200" /></p>
            <p class="cachtrai"><input type="file" name="video"/> <?=$kichthuoc?></p>
            <?php } else { ?>
			<input type="file" name="video"/> <?=$kichthuoc?>
            <?php } ?>
		</div>
       <?php  } else { ?>
        <div>
			<label for="hoten">Nội dung:</label>
            <textarea name="nd_vn" cols="67" rows="4"><?=$nd_vn?></textarea>
		</div>
       <?php } ?>
        <div>
			<input type="submit" name="luu" value="Cập nhật" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>