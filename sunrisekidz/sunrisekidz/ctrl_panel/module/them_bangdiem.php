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
		if(document.frm.user.value=="") {
			alert("Bạn chưa nhập tên đăng nhập cho cha mẹ học sinh!");
			document.frm.user.focus();
			return false;
		}
        if(document.frm.matkhau.value=="") {
			alert("Bạn chưa nhập mật khẩu.!");
			document.frm.matkhau.focus();
			return false;
		}
        if($('#xnmk').val()==''){
            alert("Bạn chưa nhập mật khẩu xác nhận !");
            $('#xnmk').focus();
            return false;
        }
        if($('#mk').val() !== $('#xnmk').val()){
            alert("Mật khẩu chưa khớp. Vui lòng nhập lại !");
            $('#xnmk').focus();
            return false;
        }
	}
</script>
<?php
	$act = $_REQUEST['act'];
	$quanly = 'Thêm học sinh mới';
	$tcong = "";
	if(isset($_FILES['video']['name']))	{

		//if ((($_FILES["video"]["type"] == "image/gif") || ($_FILES["video"]["type"] == "image/jpeg") || ($_FILES["video"]["type"] == "image/pjpeg"))&& ($_FILES["video"]["size"] < 512000)) {
			if($_FILES["video"]["error"]>0)	{
				echo "";
			}
	
			else
	
			{
	
				$path = "../upload/doitac";
	
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
     	$data['hotencha'] = str_replace("'","\'",$_POST['hotencha']);
        $data['hotenme'] = str_replace("'","\'",$_POST['hotenme']);
        $data['ngaysinh'] = str_replace("'","\'",$_POST['ngaysinh']);
        $data['tinhtrang'] = str_replace("'","\'",$_POST['tinhtrang']);
        $data['diachi'] = str_replace("'","\'",$_POST['diachi']);
        $data['sdt'] = str_replace("'","\'",$_POST['sdt']);
        $data['user'] = trim($_POST['user']);
        $data['matkhau'] = mahoa(trim($_POST['matkhau']));	
		if($_POST['hienthi']==1) $data['kichhoat'] = 1;
		if($_POST['hienthi']==2) $data['kichhoat'] = 0;
		
		
		$query = $h->insert($data,"h_hocsinh");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Thêm thành công</p>";
			
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
			<input type="text" name="hoten" value="" size="67" placeholder="Ví dụ: Nguyễn Văn A" />
		</div>
        <div>
			<label for="hoten">Giáo viên phụ trách:</label>
			<select name="id_gv">
            <?php 
                $sg = $h->query("select id,hoten from h_giaovien where kichhoat=1");
                while($rg = $h->fetch_array($sg)){
                    echo '<option value="'.$rg['id'].'">'.$rg['hoten'].'</option>';
                }
            ?>
            </select>
		</div>
        <div>
			<label for="hoten">Họ tên cha:</label>
			<input type="text" name="hotencha" id="hotencha" value="" size="67" placeholder="Ví dụ: Nguyễn Văn B" />
		</div>
        <div>
			<label for="hoten">Họ tên mẹ:</label>
			<input type="text" name="hotenme" id="hotenme" value="" size="67" placeholder="Ví dụ: Trần Thị C" />
		</div>
        <div>
			<label for="hoten">Ngày sinh:</label>
			<input type="text" name="ngaysinh" id="ngaysinh" value="" size="27" placeholder="Ví dụ: 20/02/2000" /> (Định dạng: dd/mm/yyyy)
		</div>
        <div>
			<label for="hoten">Tên đăng nhập:</label>
			<input type="text" name="user" value="" size="67" placeholder="Ví dụ: nguyenthib" /> (<span style="color: red;font-weight:bold;">Lưu ý:</span> Cần nhớ hoặc ghi lại để cấp cho phụ huynh học sinh)
		</div>
        <div>
			<label for="hoten">Mật khẩu:</label>
			<input type="password" name="matkhau" id="mk" size="67" value="" /> (<span style="color: red;font-weight:bold;">Lưu ý:</span> Cần nhớ hoặc ghi lại để cấp cho phụ huynh học sinh)
		</div>
        <div>
			<label for="hoten">Xác nhận mật khẩu:</label>
			<input type="password" name="xnmatkhau" id="xnmk" size="67" value="" />
		</div>
        <div>
			<label for="hoten">Tình trạng của bé:</label>
			<textarea name="tinhtrang" rows="6" cols="51"></textarea>
		</div>
        <div>
			<label for="hoten">Địa chỉ:</label>
			<input type="text" name="diachi" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Số điện thoại:</label>
			<input type="text" name="sdt" value="" size="67" />
		</div>
		<div>
			<label for="hoten">Kích hoạt:</label>
			<span class="font13">Có: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Không: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
			</span>
		</div>
		<div>
			<input type="submit" name="luu" value="Lưu" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>