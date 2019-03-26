<script type="text/javascript">
	function checkform() {
		if(document.frm.tieude_vn.value=="") {
			alert("Bạn chưa điền tiêu đề tiếng Việt !");
			document.frm.tieude_vn.focus();
			return false;
		}
        if(document.frm.tieude_en.value=="") {
			alert("Bạn chưa điền tiêu đề tiếng Anh !");
			document.frm.tieude_en.focus();
			return false;
		}
		if(!isNaN(document.frm.sapxep)) {
			alert("Dữ liệu sắp xếp là số!");
			document.frm.sapxep.focus();
			return false;
		}
	}
</script>
<?php
	$id = $_REQUEST['id'];
	$quanly = 'Cập nhật thông tin sản phẩm';
	
	if(isset($_FILES['img']['name']))
	{
		/*if ((($_FILES["img"]["type"] == "image/gif") || ($_FILES["img"]["type"] == "image/jpeg") || ($_FILES["img"]["type"] == "image/pjpeg"))&& ($_FILES["img"]["size"] < 307200))
		{
			*/if($_FILES["img"]["error"]>0)
			{
				echo "";
			}
			{
				$path = "../upload/product";
				$file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : "";
				$file_name = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : "";
				$file_type = isset($_FILES['img']['type']) ? $_FILES['img']['type'] : "";
				$file_size = isset($_FILES['img']['size']) ? $_FILES['img']['size'] : "";
				$file_error = isset($_FILES['img']['error']) ? $_FILES['img']['error'] : "";
				move_uploaded_file($_FILES['img']['tmp_name'],$path."/".$_FILES['img']['name']);
			}
		//}
	}
    if(isset($_FILES['img1']['name']))
	{
		/*if ((($_FILES["img"]["type"] == "image/gif") || ($_FILES["img"]["type"] == "image/jpeg") || ($_FILES["img"]["type"] == "image/pjpeg"))&& ($_FILES["img"]["size"] < 307200))
		{
			*/if($_FILES["img1"]["error"]>0)
			{
				echo "";
			}
			{
				$path = "../upload/product";
				$file_tmp = isset($_FILES['img1']['tmp_name']) ? $_FILES['img1']['tmp_name'] : "";
				$file_name = isset($_FILES['img1']['name']) ? $_FILES['img1']['name'] : "";
				$file_type = isset($_FILES['img1']['type']) ? $_FILES['img1']['type'] : "";
				$file_size = isset($_FILES['img1']['size']) ? $_FILES['img1']['size'] : "";
				$file_error = isset($_FILES['img1']['error']) ? $_FILES['img1']['error'] : "";
				move_uploaded_file($_FILES['img1']['tmp_name'],$path."/".$_FILES['img1']['name']);
			}
		//}
	}
    if(isset($_FILES['img2']['name']))
	{
		/*if ((($_FILES["img"]["type"] == "image/gif") || ($_FILES["img"]["type"] == "image/jpeg") || ($_FILES["img"]["type"] == "image/pjpeg"))&& ($_FILES["img"]["size"] < 307200))
		{
			*/if($_FILES["img2"]["error"]>0)
			{
				echo "";
			}
			{
				$path = "../upload/product";
				$file_tmp = isset($_FILES['img2']['tmp_name']) ? $_FILES['img2']['tmp_name'] : "";
				$file_name = isset($_FILES['img2']['name']) ? $_FILES['img2']['name'] : "";
				$file_type = isset($_FILES['img2']['type']) ? $_FILES['img2']['type'] : "";
				$file_size = isset($_FILES['img2']['size']) ? $_FILES['img2']['size'] : "";
				$file_error = isset($_FILES['img2']['error']) ? $_FILES['img2']['error'] : "";
				move_uploaded_file($_FILES['img2']['tmp_name'],$path."/".$_FILES['img2']['name']);
			}
		//}
	}
    if(isset($_FILES['img3']['name']))
	{
		/*if ((($_FILES["img"]["type"] == "image/gif") || ($_FILES["img"]["type"] == "image/jpeg") || ($_FILES["img"]["type"] == "image/pjpeg"))&& ($_FILES["img"]["size"] < 307200))
		{
			*/if($_FILES["img3"]["error"]>0)
			{
				echo "";
			}
			{
				$path = "../upload/product";
				$file_tmp = isset($_FILES['img3']['tmp_name']) ? $_FILES['img3']['tmp_name'] : "";
				$file_name = isset($_FILES['img3']['name']) ? $_FILES['img3']['name'] : "";
				$file_type = isset($_FILES['img3']['type']) ? $_FILES['img3']['type'] : "";
				$file_size = isset($_FILES['img3']['size']) ? $_FILES['img3']['size'] : "";
				$file_error = isset($_FILES['img3']['error']) ? $_FILES['img3']['error'] : "";
				move_uploaded_file($_FILES['img3']['tmp_name'],$path."/".$_FILES['img3']['name']);
			}
		//}
	}
	$tcong = "";
	$s = $h->query("select * from h_sanpham where id=$id");
	$r = $h->fetch_array($s);
    $sp_id = $r['sp_id'];

    $hinhanh = $r['hinhanh'];
    $hinhanh2 = $r['hinhanh2'];
    $hinhanh3 = $r['hinhanh3'];
    $hinhanh4 = $r['hinhanh4'];
    #$masp = $r['masp'];
    #$giacu = $r['giacu'];
    $giaban = $r['giaban'];
    $spnb = $r['spnb'];
    $xnd_vn = $r['xnd_vn'];
    $xnd_en = $r['xnd_en'];
    
    $nd_vn = $r['noidung_vn'];
    $nd_en = $r['noidung_en'];
        
    $td_vn = $r['tieude_vn'];
    $td_en = $r['tieude_en'];
    
	$tit_vn = $r['title_vn'];
    $tit_en = $r['title_en'];
    
	$mt_vn = $r['mota_vn'];
    $mt_en = $r['mota_en'];
    
    $tk_vn = $r['tukhoa_vn'];
    $tk_en = $r['tukhoa_en'];
    
    $sx = $r['sapxep'];
    $ht = $r['hienthi'];
	if(isset($_POST['luu']))
	{
		
		$data['sp_id'] = $_POST['sp_id'];
		
		$data['tieude_vn'] = str_replace("'","\'",$_POST['tieude_vn']);
        $data['tieude_en'] = str_replace("'","\'",$_POST['tieude_en']);
        
        if($_FILES['img']['name']!='') $data['hinhanh'] = $_FILES['img']['name'];
        else $data['hinhanh'] = $hinhanh;
        if($_FILES['img1']['name']!='') $data['hinhanh2'] = $_FILES['img1']['name'];
        else $data['hinhanh2'] = $hinhanh2;
        if($_FILES['img2']['name']!='') $data['hinhanh3'] = $_FILES['img2']['name'];
        else $data['hinhanh3'] = $hinhanh3;
        if($_FILES['img3']['name']!='') $data['hinhanh4'] = $_FILES['img3']['name'];
        else $data['hinhanh4'] = $hinhanh4;
        #$data['masp'] = $_POST['masp'];
        #if($_POST['giacu']==1) $data['giacu'] = 1;
		#if($_POST['giacu']==2) $data['giacu'] = 0;
        $data['giaban'] = $_POST['giaban'];
		
        $data['xnd_vn'] = str_replace("'","\'",$_POST['xnd_vnn']);
        $data['xnd_en'] = str_replace("'","\'",$_POST['xnd_enn']);
        
		$data['noidung_vn'] = str_replace("'","\'",$_POST['noidung_vn']);
        $data['noidung_en'] = str_replace("'","\'",$_POST['noidung_en']);
		
		
		$data['title_vn'] = str_replace("'","\'",$_POST['title_vn']);
        $data['title_en'] = str_replace("'","\'",$_POST['title_en']);
        
   		$data['mota_vn'] = str_replace("'","\'",$_POST['mota_vn']);
        $data['mota_en'] = str_replace("'","\'",$_POST['mota_en']);
        
        $data['tukhoa_vn'] = str_replace("'","\'",$_POST['tukhoa_vn']);
        $data['tukhoa_en'] = str_replace("'","\'",$_POST['tukhoa_en']);
		
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $data['sapxep']=$sx;
		else $data['sapxep'] = $sapxep;		
        if($_POST['spnb']==1) $data['spnb'] = 1;
		if($_POST['spnb']==2) $data['spnb'] = 0;
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		#if($_POST['spbc']==1) $data['spbc'] = 1;
		#if($_POST['spbc']==2) $data['spbc'] = 0;
		$query = $h->update($data,"h_sanpham"," where id=$id");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = $h->query("select * from h_sanpham where id=$id");
			$r = $h->fetch_array($s);
			$sp_id = $r['sp_id'];

            $hinhanh = $r['hinhanh'];
            $hinhanh2 = $r['hinhanh2'];
            $hinhanh3 = $r['hinhanh3'];
            $hinhanh4 = $r['hinhanh4'];
            #$masp = $r['masp'];
            #$giacu = $r['giacu'];
            $giaban = $r['giaban'];
            $spnb = $r['spnb'];
            $xnd_vn = $r['xnd_vn'];
            $xnd_en = $r['xnd_en'];
            
            $nd_vn = $r['noidung_vn'];
            $nd_en = $r['noidung_en'];
                
            $td_vn = $r['tieude_vn'];
            $td_en = $r['tieude_en'];
            
        	$tit_vn = $r['title_vn'];
            $tit_en = $r['title_en'];
            
        	$mt_vn = $r['mota_vn'];
            $mt_en = $r['mota_en'];
            
            $tk_vn = $r['tukhoa_vn'];
            $tk_en = $r['tukhoa_en'];
            
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
			<label for="hoten">Chuyên mục sản phẩm:</label>
			<select name="sp_id">
            <?php
                $ss = $h->query("select id,tieude_vn from h_sanpham where sp_id=0 order by id");
                while($rs = $h->fetch_array($ss)){
                    if($rs['id']==$sp_id)
                        echo '<option value="'.$rs['id'].'" selected>'.$rs['tieude_vn'].'</option>';
                    else
                        echo '<option value="'.$rs['id'].'">'.$rs['tieude_vn'].'</option>';
                }
            ?>
            </select>
		</div>
        <div>
			<label for="hoten">Tiêu đề (VN):</label>
			<input type="text" name="tieude_vn" value="<?=$td_vn?>" size="67" />
		</div>
        <div>
			<label for="hoten">Tiêu đề (EN):</label>
			<input type="text" name="tieude_en" value="<?=$td_en?>" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
            <?php if($hinhanh!=''){ ?>
        	<p class="cachtrai">
			<?php  
				
					echo '<img src="../upload/product/'.$hinhanh.'" width="60" style="margin-right:5px;">';	
				
			?>
            </p>
            <?php } ?>
			<label for="hoten">Hình ảnh 1:</label>
			<input type="file" name="img" /> (Kích thước lớn hơn hoặc bằng 800px x 1000px)
            <p class="cachtrai">(Nếu không thay ảnh khác, hãy để trống)</p>
		</div>
        <div>
            <?php if($hinhanh2!=''){ ?>
        	<p class="cachtrai">
			<?php  
				
					echo '<img src="../upload/product/'.$hinhanh2.'" width="60" style="margin-right:5px;">';	
				
			?>
            </p>
            <?php } ?>
			<label for="hoten">Hình ảnh 2:</label>
			<input type="file" name="img1" /> (Kích thước lớn hơn hoặc bằng 800px x 1000px)
            <p class="cachtrai">(Nếu không thay ảnh khác, hãy để trống)</p>
		</div>
        <div>
            <?php if($hinhanh3!=''){ ?>
        	<p class="cachtrai">
			<?php  
				
					echo '<img src="../upload/product/'.$hinhanh3.'" width="60" style="margin-right:5px;">';	
				
			?>
            </p>
            <?php } ?>
			<label for="hoten">Hình ảnh 3:</label>
			<input type="file" name="img2" /> (Kích thước lớn hơn hoặc bằng 800px x 1000px)
            <p class="cachtrai">(Nếu không thay ảnh khác, hãy để trống)</p>
		</div>
        <div>
            <?php if($hinhanh4!=''){ ?>
        	<p class="cachtrai">
			<?php  
				
					echo '<img src="../upload/product/'.$hinhanh4.'" width="60" style="margin-right:5px;">';	
				
			?>
            </p>
            <?php } ?>
			<label for="hoten">Hình ảnh 4:</label>
			<input type="file" name="img3" /> (Kích thước lớn hơn hoặc bằng 800px x 1000px)
            <p class="cachtrai">(Nếu không thay ảnh khác, hãy để trống)</p>
		</div>
        <div>
			<label for="hoten">Giá bán:</label>
			<input type="text" name="giaban" value="<?php echo $giaban?>" size="40" /> (Chỉ nhập số)
		</div>
        <div>
			<label for="hoten">Nước sản xuất (VN):</label>
            <input type="text" name="xnd_vnn" size="67" value="<?=$xnd_vn?>" />
		</div>
        <div>
			<label for="hoten">Nước sản xuất (EN):</label>
            <input type="text" name="xnd_enn" size="67" value="<?=$xnd_en?>" />
		</div>
        <div>
			<label for="hoten">Mô tả sản phẩm (VN):</label>
			<textarea id="noidung_vn" name="noidung_vn" cols="67" rows="8"><?=$nd_vn?></textarea>
		</div>
        <div>
			<label for="hoten">Mô tả sản phẩm (EN):</label>
			<textarea id="noidung_en" name="noidung_en" cols="67" rows="8"><?=$nd_en?></textarea>
		</div>
        <div>
			<label for="hoten">Sản phẩm nổi bật:</label>
			<span class="font13">
			<?php if($spnb==1) { ?>
            Có: 
			<input type="radio" name="spnb" id="spnb1" value="1" checked />&nbsp;Không: 
			<input type="radio" name="spnb" id="spnb2" value="2" /><br />
            <?php } else { ?>
            Có: 
			<input type="radio" name="spnb" id="spnb1" value="1" />&nbsp;Không: 
			<input type="radio" name="spnb" id="spnb2" value="2" checked /><br />
            <?php } ?>
			</span>
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