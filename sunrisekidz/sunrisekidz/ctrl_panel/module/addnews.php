<script type="text/javascript">
	function checkform() {
		if(document.frm.tieude_vn.value=="") {
			alert("Bạn chưa nhập tiêu đề bài viết.!");
			document.frm.tieude_vn.focus();
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
    $tt_id = $_REQUEST['tt_id'];
    switch($tt_id){
        case 1:
            $ql = ' dịch vụ';
            $sz = '291px x 234px';
            break;
        case 2: 
            $ql = ' hoạt động - tin hoạt động trung tâm';
            $sz = '291px x 234px';
            break;
        case 3: 
            $ql = ' câu chuyện';
            $sz = '185px x 185px - hình vuông';
            break;
        case 4: 
            $ql = ' góc chuyên gia';
            $sz = '291px x 234px';
            break;
        case 5: 
            $ql = ' qui định - chính sách';
            $sz = '291px x 234px';
            break;
        case 6: 
            $ql = ' ưu đãi';
            $sz = '291px x 234px';
            break;
        case 7: 
            $ql = ' cam kết';
            $sz = '291px x 234px';
            break;
        case 8: 
            $ql = ' hoạt động - chương trình học';
            $sz = '291px x 234px';
            break;
        case 9: 
            $ql = ' hoạt động - hình ảnh';
            $sz = '322px x 249px';
            break;
        case 10: 
            $ql = ' hoạt động - clip liên kết youtube';
            $sz = '180px x 100px';
            break;
        case 11: 
            $ql = ' thông tin tư vấn';
            $sz = '291px x 234px';
            break;
        case 12: 
            $ql = ' chia sẻ kinh nghiệm';
            $sz = '291px x 234px';
            break;
        case 13: 
            $ql = ' câu hỏi của cha mẹ';
            $sz = '291px x 234px';
            break;
    }
	$quanly = 'Thêm '.$ql.' mới';
	$tcong = "";
	$s = $h->query("select max(sapxep) as maxsx from h_tintuc where tt_id=$tt_id");
	$rs = $h->fetch_array($s);
	$sx = $rs['maxsx']+1;
	if(isset($_FILES['video']['name']))	{

		//if ((($_FILES["video"]["type"] == "image/gif") || ($_FILES["video"]["type"] == "image/jpeg") || ($_FILES["video"]["type"] == "image/pjpeg"))&& ($_FILES["video"]["size"] < 512000)) {
			if($_FILES["video"]["error"]>0)	{
				echo "";
			}
	
			else
	
			{
	
				$path = "../upload/news";
	
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
	    $data['tt_id'] = $tt_id;
	    $data['tieude'] = str_replace("'","\'",$_POST['tieude_vn']);
        $data['hinhanh'] = $_FILES['video']['name'];
   		$data['ngaydang'] = $_POST['ngaydang'];
        $data['xnd'] = str_replace("'","\'",$_POST['xnd_vnn']);
		$data['noidung'] = str_replace("'","\'",$_POST['noidung_vn']);        
        if($tt_id==10){
            $data['video'] = str_replace("'","\'",$_POST['videoo']);
            $data['dangboi'] = str_replace("'","\'",$_POST['dangboi']);
        }
        	
		$data['title'] = str_replace("'","\'",$_POST['title_vn']);        
   		$data['mota'] = str_replace("'","\'",$_POST['mota_vn']);        
        $data['tukhoa'] = str_replace("'","\'",$_POST['tukhoa_vn']);		
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $data['sapxep']=$sx;
		else $data['sapxep'] = $sapxep;		
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		
		
		$query = $h->insert($data,"h_tintuc");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Thêm thành công</p>";
			$s = $h->query("select max(sapxep) as maxsx from h_tintuc where tt_id=$tt_id");
			$rs = $h->fetch_array($s);
			$sx = $rs['maxsx']+1;
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
			<label for="hoten">Tiêu đề:</label>
			<input type="text" name="tieude_vn" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
			<label for="hoten">Ngày đăng</label>
			<input type="text" id="ngaydang" name="ngaydang" maxlength="25" size="25" value="<?php echo date('d/m/Y'); ?>" />
		</div>
        <div>
			<label for="hoten">Hình ảnh:</label>
			<input type="file" name="video" /> (Kích thước hình ảnh lớn hơn hoặc bằng tỷ lệ <?=$sz?>)
		</div>
        <div>
			<label for="hoten">Nội dung ngắn:</label>
            <textarea id="xnd_vnn" name="xnd_vnn" rows="4" cols="67"></textarea>
		</div>
        <div>
			<label for="hoten">Nội dung:</label><br /><br />
            <textarea id="noidung_vn" name="noidung_vn" rows="4" cols="30"></textarea>
		</div>
        <?php if($tt_id == 10) { ?>
        <div>
			<label for="hoten">Video:</label>
			<input type="text" name="videoo" value="" size="30" />
            <p class="cachtrai">Lưu ý: chỉ lấy ID của link youtube. Ví dụ link youtube là: https://www.youtube.com/watch?v=<span style="color: red;font-weight:bold;">ATp5ABB23Fs</span> thì chỉ lấy <span style="color: red;font-weight:bold;">ATp5ABB23Fs</span></p>
		</div>
        <div>
			<label for="hoten">Đăng bởi:</label>
			<input type="text" name="dangboi" value="" size="30" /> (Người đăng trên youtube)
		</div>
        <?php } ?>
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
            <input type="text" name="title_vn" value="" size="60" />
        </div>
        <div>
        	<label for="des">Description:</label>
            <textarea name="mota_vn" id="mota_vn" rows="4" cols="67"></textarea>
        </div>
        <div>
        	<label for="key">Keywords:</label>
            <textarea name="tukhoa_vn" rows="4" cols="67"></textarea>
        </div>
		<div>
			<input type="submit" name="luu" value="Lưu" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>
<script type="text/javascript">
    jQuery('#ngaydang').datetimepicker({
         lang:'vn',
         i18n:{
          vn:{
           months:[
            'Tháng 1','Tháng 2','Tháng 3','Tháng 4',
            'Tháng 5','Tháng 6','Tháng 7','Tháng 8',
            'Tháng 9','Tháng 10','Tháng 11','Tháng 12',
           ],
           dayOfWeek:[
            "CN", "T2", "T3", "T4", 
            "T5", "T6", "T7",
           ]
          }
         },
         timepicker:false,
         format:'d/m/Y'
        });
</script>