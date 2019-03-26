<?php
	$id = $_REQUEST['id'];
	$id_cmt = $_REQUEST['id_cmt'];
    $sm = $h->query("select idcmt from h_cmt where id=$id_cmt");
    $rm = $h->fetch_array($sm);
    $idbv = $rm['idcmt'];
    $sb = $h->query("select tieude_vn from h_sanpham where id=$idbv");
    $rb = $h->fetch_array($sb);
    $quanly = 'Thêm trả lời bình luận sản phẩm cho sản phẩm ';
    $quanly .= $rb['tieude_vn'];
	if(isset($_POST['luu']))
	{
	   $data['id_cmt'] = $id_cmt;
       $data['hoten'] = $_POST['hoten'];
        if($_POST['ngaythang']!='')
            $data['ngaythang'] = $_POST['ngaythang'];
        else {
            $timezoneVN = time() - date("Z") + 7*60*60;
        	$time = gmdate("H:i:s", time()+7*3600); 
        	$data['ngaythang'] = date("$time d/m/Y",$timezoneVN);
        }
        $data['noidung'] = $_POST['noidungg'];
        if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		$query = $h->insert($data,"h_reply");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Thêm thành công</p>";
			
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
			<input type="text" name="hoten" value="" size="60" />
		</div>
        <div>
			<label for="hoten">Ngày tháng:</label>
			<input type="text" name="ngaythang" value="" size="17" placeholder="format: d/m/Y h:m:s" /> (Nếu không muốn thay ngày tháng hệ thống hãy để trống)
		</div>
        <div>
			<label for="hoten">ND trả lời:</label>
			<textarea cols="60" rows="7" name="noidungg"></textarea>
		</div>
        <div>
			<label for="hoten">Duyệt:</label>
			<span class="font13">
            Có: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Không: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
            </span>
		</div>
		<div>
			<input type="submit" name="luu" value="Lưu" class="gui" />
			<input type="reset" name="reset" value="Nhập lại" class="reset" />
		</div>
	</form>
</div>