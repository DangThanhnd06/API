<?php
	$id = $_REQUEST['id'];
	$cmt_id = $_REQUEST['cmt_id'];
    switch($cmt_id){
        case 1:
            $quanly = 'Duyệt bình luận sản phẩm';
            $linkcm = 'chi-tiet-san-pham/';
            break;
        case 2:
            $quanly = 'Duyệt bình luận dịch vụ';
            $linkcm = 'dich-vu/';
            break;
        case 3:
            $quanly = 'Duyệt bình luận hành trình làm mẹ';
            $linkcm = 'hanh-trinh-lam-me/';
            break;
        case 4:
            $quanly = 'Duyệt bình luận sự kiện khuyến mãi';
            $linkcm = 'su-kien-khuyen-mai/';
            break;
        case 5:
            $quanly = 'Duyệt bình luận mẹ cần biết';
            $linkcm = 'me-can-biet/';
            break;
        case 6:
            $quanly = 'Duyệt bình luận hội mẹ bầu đẹp sau sinh';
            $linkcm = 'hoi-me-bau-dep-sau-sinh/';
            break;
        case 7:
            $quanly = 'Duyệt bình luận báo chí nói về green field spa';
            $linkcm = 'bao-chi-noi-ve-green-field-spa/';
            break;
        case 8:
            $quanly = 'Duyệt bình luận khách hàng nói về green field spa';
            $linkcm = 'khach-hang-noi-ve-green-field-spa/';
            break;
        case 9:
            $quanly = 'Duyệt bình luận chuyên gia tư vấn miễn phí';
            $linkcm = 'chuyen-gia-tu-van-mien-phi/';
            break;
        case 10:
            $quanly = 'Duyệt bình luận khóa học tiền sản';
            $linkcm = 'khoa-hoc-tien-san/';
            break;
        case 11:
            $quanly = 'Duyệt bình luận Video tư vấn';
            $linkcm = 'video-tu-van/';
            break;
    }
	$s = mysql_query("select * from h_cmt where id=$id");
	$r = mysql_fetch_array($s);
	$hoten = $r['hoten'];
    $noidung = $r['noidung'];
    $ngaythang = $r['ngaythang'];
	$ht = $r['hienthi'];
	if(isset($_POST['luu']))
	{
		$data['ngaythang'] = $_POST['ngaythang'];
        if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		$query = $h->update($data,"h_cmt"," where id=".$id);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = mysql_query("select * from h_cmt where id=$id");
			$r = mysql_fetch_array($s);
			$hoten = $r['hoten'];
            $noidung = $r['noidung'];
            $ngaythang = $r['ngaythang'];
        	$ht = $r['hienthi'];
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Lỗi </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title"><?=$quanly?></p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
    	<div>
			<label for="hoten">Họ tên:</label>
			<input type="text" name="sapxep" value="<?php echo $hoten?>" size="60" disabled="disabled" />
		</div>
        <div>
			<label for="hoten">Ngày tháng:</label>
			<input type="text" name="ngaythang" value="<?php echo $ngaythang?>" size="60" />
		</div>
        <div>
			<label for="hoten">ND Bình luận:</label>
			<textarea cols="60" rows="7" disabled="disabled"><?=$noidung?></textarea>
		</div>
        <div>
			<label for="hoten">Duyệt:</label>
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
			<input type="reset" name="reset" value="Nhập lại" class="reset" />
		</div>
	</form>
</div>