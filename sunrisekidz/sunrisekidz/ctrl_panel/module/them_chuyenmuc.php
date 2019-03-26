<script type="text/javascript">
	function checkform() {
		if(document.frm.tieude_vn.value=="") {
			alert("Bạn chưa điền tiêu đề chuyên mục sản phẩm tiếng Việt!");
			document.frm.tieude_vn.focus();
			return false;
		}
        if(document.frm.tieude_en.value=="") {
			alert("Bạn chưa điền tiêu đề chuyên mục sản phẩm tiếng Anh!");
			document.frm.tieude_en.focus();
			return false;
		}
		if(!isNaN(document.frm.sapxep)) {
			alert("Dữ liệu sắp xếp là số. Vui lòng điền lại!");
			document.frm.sapxep.focus();
			return false;
		}
	}
</script>
<?php
	$act = $_REQUEST['act'];
    $s = $h->query("select max(sapxep) as maxsx from h_sanpham where sp_id=0");
	$rs = $h->fetch_array($s);
	$sx = $rs['maxsx']+1;
	$tcong = "";
    if(isset($_FILES['video']['name']))	{

		//if ((($_FILES["video"]["type"] == "image/gif") || ($_FILES["video"]["type"] == "image/jpeg") || ($_FILES["video"]["type"] == "image/pjpeg"))&& ($_FILES["video"]["size"] < 512000)) {
			if($_FILES["video"]["error"]>0)	{
				echo "";
			}
	
			else
	
			{
	
				$path = "../upload/product";
	
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
		$data['sp_id'] = 0;
		$data['tieude_vn'] = str_replace("'","\'",$_POST['tieude_vn']);
        $data['tieude_en'] = str_replace("'","\'",$_POST['tieude_en']);
        $data['hinhanh'] = $_FILES['video']['name'];
		
        $data['title_vn'] = str_replace("'","\'",$_POST['title_vn']);
        $data['title_en'] = str_replace("'","\'",$_POST['title_en']);
   		$data['mota_vn'] = str_replace("'","\'",$_POST['mota_vn']);
        $data['mota_en'] = str_replace("'","\'",$_POST['mota_en']);
        $data['tukhoa_vn'] = str_replace("'","\'",$_POST['tukhoa_vn']);
        $data['tukhoa_en'] = str_replace("'","\'",$_POST['tukhoa_en']);
        
        if($_POST['sapxep']==0 || $_POST['sapxep']=='') 
            $data['sapxep'] = $sx;
        else
            $data['sapxep'] = $_POST['sapxep'];
            
        if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		
		
		$query = $h->insert($data,"h_sanpham");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Thêm thành công</p>";
			$s = $h->query("select max(sapxep) as maxsx from h_sanpham where sp_id=0");
			$rs = $h->fetch_array($s);
			$sx = $rs['maxsx']+1;
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title">Thêm chuyên mục sản phẩm mới</p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
		<div>
			<label for="hoten">Tiêu đề (VN):</label>
			<input type="text" name="tieude_vn" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Tiêu đề (EN):</label>
			<input type="text" name="tieude_en" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
			<label for="hoten">Hình ảnh:</label>
            <p class="cachtrai"><input type="file" name="video"/> (Kích thước lớn hơn hoặc bằng 980px × 380px)</p>
		</div>
		<div>
			<label for="hoten">Hiển thị / Ẩn:</label>
			<span class="font13">
            Hiển thị: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Ẩn: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
			</span>
		</div>
        <div>
        	<label for="de">&nbsp;</label><span class="font13"><font color="#FF0000"><b>Thông tin cho SEO Website</b></font></span>
        </div>
        <div>
        	<label for="ti_w">Title Wesite (VN):</label>
            <input type="text" name="title_vn" value="" size="60" />
        </div>
        <div>
        	<label for="ti_w">Title Wesite (EN):</label>
            <input type="text" name="title_en" value="" size="60" />
        </div>
        <div>
        	<label for="des">Description (VN):</label>
            <textarea name="mota_vn" id="mota_vn" rows="4" cols="67"></textarea>
        </div>
        <div>
        	<label for="des">Description (EN):</label>
            <textarea name="mota_en" id="mota_en" rows="4" cols="67"></textarea>
        </div>
        <div>
        	<label for="key">Keywords (VN):</label>
            <textarea name="tukhoa_vn" rows="4" cols="67"></textarea>
        </div>
        <div>
        	<label for="key">Keywords (EN):</label>
            <textarea name="tukhoa_en" rows="4" cols="67"></textarea>
        </div>
		<div>
			<input type="submit" name="luu" value="Lưu" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>