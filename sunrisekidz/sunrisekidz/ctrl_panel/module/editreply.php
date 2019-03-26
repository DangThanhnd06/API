<?php
	$id = $_REQUEST['id'];
	$id_cmt = $_REQUEST['id_cmt'];
    $sm = $h->query("select idcmt from h_cmt where id=$id_cmt");
    $rm = $h->fetch_array($sm);
    $idbv = $rm['idcmt'];
    $sb = $h->query("select tieude_vn from h_sanpham where id=$idbv");
    $rb = $h->fetch_array($sb);
    $quanly = 'Duyệt trả lời bình luận sản phẩm cho sản phẩm ';
    $quanly .= $rb['tieude_vn'];
	$s = mysql_query("select * from h_reply where id=$id");
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
		$query = $h->update($data,"h_reply"," where id=".$id);
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Cập nhật thành công</p>";
			$s = mysql_query("select * from h_reply where id=$id");
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
			<label for="hoten">ND trả lời:</label>
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