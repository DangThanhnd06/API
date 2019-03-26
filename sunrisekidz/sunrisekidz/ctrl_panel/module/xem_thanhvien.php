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
	$s = mysql_query("select * from h_thanhvien where id=$id");
	$r = mysql_fetch_array($s);
    $email = $r['email'];
    $hten = $r['hoten'];
    $gioitinh = $r['gioitinh'];
    $lop = $r['lop'];
    $truong = $r['truong'];
    $quan = $r['quan'];
    $tinh = $r['tinh'];
    $sotien = $r['sotien'];
	$ha = $r['hinhanh'];
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
				$path = "../upload/thanhvien";
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
		$data['hoten'] = $_POST['hoten'];
        $hinhanh = $_FILES['img']['name'];
		if($hinhanh == "") $data['hinhanh'] = $ha;
		else {
			$data['hinhanh'] = $_FILES['img']['name'];
		}
        $data['truongday'] = $_POST['truongday'];
        $data['diachi'] = $_POST['diachi'];
        $data['email'] = $_POST['email'];
        $data['monday'] = $_POST['monday'];
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $data['sapxep']=$sx;
		else $data['sapxep'] = $sapxep;
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		$query = $h->update($data,"h_thanhvien"," where id=".$id);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = mysql_query("select * from h_thanhvien where id=$id");
			$r = mysql_fetch_array($s);
			$gvcap = $r['gvcap'];
            $hten = $r['hoten'];
        	$ha = $r['hinhanh'];
            $td = $r['truongday'];
            $dc = $r['diachi'];
            $email = $r['email'];
            $md = $r['monday'];
        	$sx = $r['sapxep'];
        	$ht = $r['hienthi'];
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title">Xem thông tin thành viên</p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
    	<div>
			<label for="hoten">Email:</label>
			<input type="text" name="email" value="<?=$email?>" size="60" disabled />
		</div>
        <div>
			<label for="hoten">Họ tên:</label>
			<input type="text" name="hoten" value="<?=$hten?>" size="60" disabled />
		</div>
    	<div>
			<label for="hoten">Giới tính:</label>
			<input type="text" name="sapxep" value="<?=$gioitinh?>" size="10" disabled />
		</div>
        <div>
			<label for="hoten">Lớp:</label>
			<input type="text" name="hoten" value="<?=$lop?>" size="5" disabled />
		</div>
        <div>
			<label for="hoten">Trường:</label>
			<input type="text" name="hoten" value="<?=$truong?>" size="60" disabled />
		</div>
        
        <div>
			<label for="hoten">Hình ảnh:</label>
            <?php
				if($ha!='') {
			?>
            <p class="cachtrai"><img src="<?='../upload/giaovien/'.$ha?>" width="80" /></p>
            <?php } ?>
		</div>
        <div>
        	<label for="alt">Quận / Huyện:</label>
            <input type="text" name="truongday" value="<?=$quan?>" size="60" disabled />
        </div>
        <div>
        	<label for="alt">Tỉnh / Thành phố</label>
            <input type="text" name="diachi" value="<?=$thanhpho?>" size="60" disabled />
        </div>
        <div>
        	<label for="alt">Số tiền</label>
            <input type="text" name="email" value="<?=$sotien?>" size="20" disabled />
        </div>
        <div>
			<label for="hoten">Bị khóa?:</label>
			<span class="font13">
			<?php if($ht==1) { ?>
            Có: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Không: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
            <?php } else { ?>
            Có: 
			<input type="radio" name="hienthi" id="web1" value="1" />&nbsp;Không: 
			<input type="radio" name="hienthi" id="web2" value="2" checked /><br />
            <?php } ?>
			</span>
		</div>
		
	</form>
</div>