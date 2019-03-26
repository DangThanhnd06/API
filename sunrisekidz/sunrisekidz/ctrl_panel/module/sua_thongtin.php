<?php
	$id = $_REQUEST['id'];
	
    $s = $h->query("select * from h_thongtin where id=$id");
	$r = $h->fetch_array($s);
	$td_vn = $r['tieude'];
    $hinhanh = $r['hinhanh'];
    $nd_vn = $r['noidung'];    
	$tit_vn = $r['title'];    
	$mt_vn = $r['mota'];    
    $tk_vn = $r['tukhoa'];    
    $sx = $r['sapxep'];
    $ht = $r['hienthi'];
    $quanly = "Cập nhật nội dung &raquo; ".$r['tieude'];

        if(isset($_FILES['video']['name']))	{

    		//if ((($_FILES["video"]["type"] == "image/gif") || ($_FILES["video"]["type"] == "image/jpeg") || ($_FILES["video"]["type"] == "image/pjpeg"))&& ($_FILES["video"]["size"] < 512000)) {
    			if($_FILES["video"]["error"]>0)	{
    				echo "";
    			}
    	
    			else
    	
    			{
    	
    				$path = "../upload/thongtin";
    	
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
	    $data['tieude'] = str_replace("'","\'",$_POST['tieude_vn']);
        if($_FILES['video']['name']=="") $data['hinhanh'] = $hinhanh;
	    else $data['hinhanh'] = $_FILES['video']['name'];    
        $data['title'] = str_replace("'","\'",$_POST['title_vn']);
       	$data['mota'] = str_replace("'","\'",$_POST['mota_vn']);
        $data['tukhoa'] = str_replace("'","\'",$_POST['tukhoa_vn']);
        $data['noidung'] = str_replace("'","\'",$_POST['noidung_vn']);        
        if($_POST['sapxep']==0 || $_POST['sapxep']=='') 
            $data['sapxep'] = $sx;
        else
            $data['sapxep'] = $_POST['sapxep'];
            
        if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		$query = $h->update($data,"h_thongtin"," where id=".$id);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Update successfully</p>";
			$s = $h->query("select * from h_thongtin where id=$id");
        	$r = $h->fetch_array($s);
        	$td_vn = $r['tieude'];
            $hinhanh = $r['hinhanh'];            
        	$nd_vn = $r['noidung'];            
        	$tit_vn = $r['title'];
        	$mt_vn = $r['mota'];
            $tk_vn = $r['tukhoa'];
            $sx = $r['sapxep'];
            $ht = $r['hienthi'];
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Error </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title"><?php echo $quanly?></p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
        <div>
			<label for="hoten">Tiêu đề:</label>
			<input type="text" name="tieude_vn" value="<?=$td_vn?>" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
            <label for="hinhanh">Hình ảnh: </label>
            <?php
                if($hinhanh!='') {
            ?>
            <p class="cachtrai"><img src="../upload/thongtin/<?=$hinhanh?>" width="200" /></p>
            <p class="cachtrai"><input type="file" name="video"/></p>
            <?php } else { ?>
			<input type="file" name="video"/>
            <?php } ?>
        </div>
        <div>
			<label for="hoten">Nội dung:</label>
			<textarea id="noidung_vn" name="noidung_vn" cols="67" rows="8"><?php echo $nd_vn?></textarea>
		</div>
        <div>
			<label for="hoten">Hiển thị / Ẩn:</label>
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
        	<label for="de">&nbsp;</label><span class="font13"><font color="#FF0000"><b>Information for SEO Website</b></font></span>
        </div>
        <div>
        	<label for="ti_w">Title Wesite:</label>
            <input type="text" name="title_vn" value="<?php echo $tit_vn?>" size="60" />
        </div>
        <div>
        	<label for="des">Description:</label>
            <textarea name="mota_vn" id="mota_vn" rows="4" cols="67"><?php echo $mt_vn?></textarea>
        </div>
        <div>
        	<label for="key">Keywords:</label>
            <textarea name="tukhoa_vn" rows="4" cols="67"><?php echo $tk_vn?></textarea>
        </div>
        <div>
			<input type="submit" name="luu" value="Cập nhật" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>