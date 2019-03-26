<script type="text/javascript">
	function checkform() {
		if(document.frm.hoten.value=="") {
			alert("Bạn chưa nhập họ tên học sinh !");
			document.frm.hoten.focus();
			return false;
		}
        if($('#hotencha').val()==''){
            alert("Bạn chưa nhập họ tên cha của học sinh !");
            $('#hotencha').focus();
            return false;
        }
        if($('#hotenme').val()==''){
            alert("Bạn chưa nhập họ tên mẹ của học sinh !");
            $('#hotenmẹ').focus();
            return false;
        }
        if($('#ngaysinh').val()==''){
            alert("Bạn chưa nhập ngày sinh của học sinh !");
            $('#ngaysinh').focus();
            return false;
        }
	}
</script>
<?php
	$act = $_REQUEST['act'];
    $id = $_REQUEST['id'];
    $s = $h->query("select * from h_hocsinh where id=$id");
    $r = $h->fetch_array($s);
    $hoten = $r['hoten'];
    $ha = $r['hinhanh'];
    $id_gv = $r['id_gv'];
    $hotencha = $r['hotencha'];
    $hotenme = $r['hotenme'];
    $ngaysinh = $r['ngaysinh'];
    $tinhtrang = $r['tinhtrang'];
    $diachi = $r['diachi'];
    $sdt = $r['sdt'];
    $ht = $r['kichhoat'];
	$quanly = 'Cập nhật thông tin học sinh '.$hoten.' - '.$ngaysinh;
	$tcong = "";
	if(isset($_FILES['video']['name']))	{

		//if ((($_FILES["video"]["type"] == "image/gif") || ($_FILES["video"]["type"] == "image/jpeg") || ($_FILES["video"]["type"] == "image/pjpeg"))&& ($_FILES["video"]["size"] < 512000)) {
			if($_FILES["video"]["error"]>0)	{
				echo "";
			}
	
			else
	
			{
	
				$path = "../upload/hocsinh";
	
				$file_tmp = isset($_FILES['video']['tmp_name']) ? $_FILES['video']['tmp_name'] : "";
	
				$file_name = isset($_FILES['video']['name']) ? $_FILES['video']['name'] : "";
	
				$file_type = isset($_FILES['video']['type']) ? $_FILES['video']['type'] : "";
	
				$file_size = isset($_FILES['video']['size']) ? $_FILES['video']['size'] : "";
	
				$file_error = isset($_FILES['video']['error']) ? $_FILES['video']['error'] : "";
	
				move_uploaded_file($_FILES['video']['tmp_name'],$path."/".$_FILES['video']['name']);
	
			}
		//}

	}
	if(isset($_POST['luu'])) {
	    $data['id_gv'] = $_POST['id_gv'];
        $data['hoten'] = str_replace("'","\'",$_POST['hoten']);
        if($_FILES['video']['name']=='') $data['hinhanh'] = $ha;
		else $data['hinhanh'] = $_FILES['video']['name'];
     	$data['hotencha'] = str_replace("'","\'",$_POST['hotencha']);
        $data['hotenme'] = str_replace("'","\'",$_POST['hotenme']);
        $data['ngaysinh'] = str_replace("'","\'",$_POST['ngaysinh']);
        $data['tinhtrang'] = str_replace("'","\'",$_POST['tinhtrang']);
        $data['diachi'] = str_replace("'","\'",$_POST['diachi']);
        $data['sdt'] = str_replace("'","\'",$_POST['sdt']);	
		if($_POST['hienthi']==1) $data['kichhoat'] = 1;
		if($_POST['hienthi']==2) $data['kichhoat'] = 0;
		
		
		$query = $h->update($data,"h_hocsinh"," where id=$id");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = $h->query("select * from h_hocsinh where id=$id");
            $r = $h->fetch_array($s);
            $hoten = $r['hoten'];
            $ha = $r['hinhanh'];
            $id_gv = $r['id_gv'];
            $hotencha = $r['hotencha'];
            $hotenme = $r['hotenme'];
            $ngaysinh = $r['ngaysinh'];
            $tinhtrang = $r['tinhtrang'];
            $diachi = $r['diachi'];
            $sdt = $r['sdt'];
            $ht = $r['kichhoat'];
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
			<label for="hoten">Họ tên bé:</label>
			<input type="text" name="hoten" value="<?=$hoten?>" size="67" placeholder="Ví dụ: Nguyễn Văn A" />
		</div>
        <div>
			<label for="hoten">Hình ảnh bé:</label>
            <?php if($ha != '') { ?>
            <p class="cachtrai"><img src="../upload/hocsinh/<?php echo $ha ?>" width="150" /></p>
            <?php } ?>
			<p class="cachtrai"><input type="file" name="video" /> (Kích thước ảnh lớn hơn hoặc bằng 127px x 124px)</p>
            <p class="cachtrai">Lưu ý: cách lưu tên hình<br />- Không được để dấu tiếng việt.<br />- Không chứa khoảng trắng, nếu có khoảng trắng thì thay bằng dấu - hoặc _
            <br />- Tên hình không được trùng nhau vì nếu trùng sẽ lấy hình trước đó.
            </p>
		</div>
        <div>
			<label for="hoten">Giáo viên phụ trách:</label>
			<select name="id_gv">
            <?php 
                $sg = $h->query("select id,hoten from h_giaovien where kichhoat=1");
                while($rg = $h->fetch_array($sg)){
                    if($rg['id']==$id_gv)
                        echo '<option value="'.$rg['id'].'" selected>'.$rg['hoten'].'</option>';
                    else
                        echo '<option value="'.$rg['id'].'">'.$rg['hoten'].'</option>';
                }
            ?>
            </select>
		</div>
        <div>
			<label for="hoten">Họ tên cha:</label>
			<input type="text" name="hotencha" id="hotencha" value="<?=$hotencha?>" size="67" placeholder="Ví dụ: Nguyễn Văn B" />
		</div>
        <div>
			<label for="hoten">Họ tên mẹ:</label>
			<input type="text" name="hotenme" id="hotenme" value="<?=$hotenme?>" size="67" placeholder="Ví dụ: Trần Thị C" />
		</div>
        <div>
			<label for="hoten">Ngày sinh:</label>
			<input type="text" name="ngaysinh" id="ngaysinh" value="<?=$ngaysinh?>" size="27" placeholder="Ví dụ: 20/02/2000" /> (Định dạng: dd/mm/yyyy)
		</div>
        <div>
			<label for="hoten">Tình trạng của bé:</label>
			<textarea name="tinhtrang" rows="6" cols="51"><?=$tinhtrang?></textarea>
		</div>
        <div>
			<label for="hoten">Địa chỉ:</label>
			<input type="text" name="diachi" value="<?=$diachi?>" size="67" />
		</div>
        <div>
			<label for="hoten">Số điện thoại:</label>
			<input type="text" name="sdt" value="<?=$sdt?>" size="67" />
		</div>
		<div>
			<label for="hoten">Kích hoạt:</label>
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
		<div>
			<input type="submit" name="luu" value="Cập nhật" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>