<script type="text/javascript">
	function checkform() {
		if(document.frm.tieude.value=="") {
			alert("Bạn chưa nhập tiêu đề.!");
			document.frm.tieude.focus();
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
	$act = $_REQUEST['act'];
	$tcong = "";
	$s = $h->query("select max(sapxep) as maxsx from h_banggia");
	$rs = $h->fetch_array($s);
	$sx = $rs['maxsx']+1;
	if(isset($_FILES['video']['name']))	{

		//if ((($_FILES["video"]["type"] == "image/gif") || ($_FILES["video"]["type"] == "image/jpeg") || ($_FILES["video"]["type"] == "image/pjpeg"))&& ($_FILES["video"]["size"] < 512000)) {
			if($_FILES["video"]["error"]>0)	{
				echo "";
			}
	
			else
	
			{
	
				$path = "../upload/banggia";
	
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
	    $data['tieude'] = $_POST['tieude'];
		$data['hinhanh'] = $_FILES['video']['name'];
		$data['noidung'] = $_POST['noidung'];
		
		$data['title'] = $_POST['title'];
		$data['mota'] = $_POST['mota'];
		$data['tukhoa'] = $_POST['tukhoa'];
		
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $data['sapxep']=$sx;
		else $data['sapxep'] = $sapxep;		
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		
		
		$query = $h->insert($data,"h_banggia");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Thêm thành công</p>";
			$s = $h->query("select max(sapxep) as maxsx from h_banggia");
			$rs = $h->fetch_array($s);
			$sx = $rs['maxsx']+1;
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title">Thêm bảng giá mới</p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
    
		<div>
			<label for="hoten">Tiêu đề bảng giá:</label>
			<input type="text" name="tieude" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
			<label for="hoten">Hình ảnh:</label>
			<input type="file" name="video" /> (Kích thước hình ảnh lớn hơn hoặc bằng tỷ lệ 400px x 250px)
		</div>
        <div>
			<label for="hoten">Nội dung:</label><br /><br />
            <textarea id="noidung" name="noidung" rows=4 cols=30></textarea>
		</div>
		<div>
			<label for="hoten">Hiển thị / ẩn:</label>
			<span class="font13">Hiển thị: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Ẩn: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
			</span>
		</div>
        <div>
        	<label for="de">&nbsp;</label><span class="font13"><font color="#FF0000"><b>Thông tin cho SEO Website</b></font></span>
        </div>
        <div>
        	<label for="ti_w">Title Wesite:</label>
            <input type="text" name="title" value="" size="60" />
        </div>
        <div>
        	<label for="des">Description:</label>
            <textarea name="mota" id="mota" rows="4" cols="67"></textarea>
        </div>
        <div>
        	<label for="key">Keywords:</label>
            <textarea name="tukhoa" rows="4" cols="67"></textarea>
        </div>
		<div>
			<input type="submit" name="luu" value="Lưu" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>