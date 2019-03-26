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
	$id = $_REQUEST['id'];
    if(isset($_FILES['img']['name']))
	{
		/*if ((($_FILES["img"]["type"] == "image/gif") || ($_FILES["img"]["type"] == "image/jpeg") || ($_FILES["img"]["type"] == "image/pjpeg"))&& ($_FILES["img"]["size"] < 307200))
		{
			*/if($_FILES["img"]["error"]>0)
			{
				echo "";
			}
			{
				$path = "../upload/news";
				$file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : "";
				$file_name = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : "";
				$file_type = isset($_FILES['img']['type']) ? $_FILES['img']['type'] : "";
				$file_size = isset($_FILES['img']['size']) ? $_FILES['img']['size'] : "";
				$file_error = isset($_FILES['img']['error']) ? $_FILES['img']['error'] : "";
				move_uploaded_file($_FILES['img']['tmp_name'],$path."/".$_FILES['img']['name']);
			}
		//}
	}
	$s = $h->query("select * from h_tintuc where id=$id");
	$r = $h->fetch_array($s);
    $tt_id = $r['tt_id'];
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
            $ql = ' thông tin  tư vấn';
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
	$quanly = "Cập nhật nội dung ".$ql;
	$td_vn = $r['tieude'];
	$ha = $r['hinhanh'];
    $ngaydang = $r['ngaydang'];
    $xnd_vn = $r['xnd'];
	$nd_vn = $r['noidung'];
    $vid = $r['video'];
    $dangboi = $r['dangboi'];
	$tit_vn = $r['title'];
	$mt_vn = $r['mota'];
	$tk_vn = $r['tukhoa'];
	$sx = $r['sapxep'];
	$ht = $r['hienthi'];
	$tcong = "";
	if(isset($_POST['luu']))
	{
        $data['tt_id'] = $_POST['tt_id'];
        $data['ngaydang'] = $_POST['ngaydang'];
        $data['tieude'] = str_replace("'","\'",$_POST['tieude_vn']);
     	if($_FILES['img']['name']=='') $data['hinhanh'] = $ha;
		else $data['hinhanh'] = $_FILES['img']['name'];
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
		
		$query = $h->update($data,"h_tintuc"," where id=".$id);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = $h->query("select * from h_tintuc where id=$id");
			$r = $h->fetch_array($s);
            $tt_id = $r['tt_id'];
			$td_vn = $r['tieude'];
        	$ha = $r['hinhanh'];
            $ngaydang = $r['ngaydang'];
            $xnd_vn = $r['xnd'];
        	$nd_vn = $r['noidung'];
            $vid = $r['video'];
            $dangboi = $r['dangboi'];
        	$tit_vn = $r['title'];
        	$mt_vn = $r['mota'];
        	$tk_vn = $r['tukhoa'];
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
        <?php if($tt_id!=1){ ?>
        <div>
			<label for="hoten">Chuyên mục:</label>
            <select name="tt_id">
        <?php 
            $arr = array('2'=>'Hoạt động - tin hoạt động trung tâm','8'=>'Hoạt động - chương trình học','9'=>'Hoạt động - hình ảnh','10'=>'Hoạt động - Clip liên kết Youtube','3'=>"Câu chuyện",'4'=>'Góc chuyên gia','5'=>'Qui định - chính sách','6'=>'Ưu đãi','7'=>'Cam kết','11'=>'Thông tin tư vấn');
            foreach($arr as $k=>$v){
                if($k==$tt_id)
                    echo '<option value="'.$k.'" selected>'.$v.'</option>';
                else
                    echo '<option value="'.$k.'" >'.$v.'</option>';
            }
                
        ?>
            </select>
        </div>
        <?php } ?>
		<div>
			<label for="hoten">Tiêu đề:</label>
			<input type="text" name="tieude_vn" value="<?php echo $td_vn?>" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
			<label for="hoten">Ngày đăng</label>
			<input type="text" id="ngaydang" name="ngaydang" maxlength="25" size="25" value="<?php echo $ngaydang; ?>" />
		</div>
        <div>
			<label for="hoten">Hình ảnh:</label>
            <?php if($ha != '') { ?>
            <p class="cachtrai"><img src="../upload/news/<?php echo $ha ?>" width="150" /></p>
            <?php } else { ?>
            <p class="cachtrai"><img src="../images/no-image.png" width="150" /></p>
            <?php } ?>
			<p class="cachtrai"><input type="file" name="img" /></p>
            <p class="cachtrai">(Kích thước hình ảnh lớn hơn hoặc bằng tỷ lệ <?=$sz?>, nếu không thay hình khác hãy để trống)</p>
		</div>
        <div>
			<label for="hoten">Nội dung ngắn:</label>
            <textarea id="xnd_vnn" name="xnd_vnn" rows="4" cols="67"><?=$xnd_vn?></textarea>
		</div>
        <div>
			<label for="hoten">Nội dung:</label><br /><br />
            <textarea id="noidung_vn" name="noidung_vn" rows=4 cols=30><?=$nd_vn?></textarea>
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
        	<label for="ti_w">Title Wesite:</label>
            <input type="text" name="title_vn" value="<?=$tit_vn?>" size="60" />
        </div>
        <div>
        	<label for="des">Description:</label>
            <textarea name="mota_vn" id="mota_vn" rows="4" cols="67"><?=$mt_vn?></textarea>
        </div>
        <div>
        	<label for="key">Keywords:</label>
            <textarea name="tukhoa_vn" rows="4" cols="67"><?=$tk_vn?></textarea>
        </div>
		<div>
			<input type="submit" name="luu" value="Cập nhật" class="gui" />
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