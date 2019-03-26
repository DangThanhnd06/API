<script type="text/javascript">
	function checkform() {
		if(document.frm.diem.value=="") {
			alert("Bạn chưa nhập điểm !");
			document.frm.diem.focus();
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
    $id = $_REQUEST['id'];
    $s = $h->query("select * from h_bangdiem where id=$id");
    $r = $h->fetch_array($s);
    $id_hs = $r['id_hs'];
    $id_gv = $r['id_gv'];
    $diem = $r['diem'];
    $nhanxetgv = $r['nhanxetgv'];
    $hanhvienht = $r['hanhviht'];
    $lieuphap = $r['lieuphap'];
    $hanhvimoi = $r['hanhvimoi'];
    $ht = $r['hienthi'];
    $sx = $r['sapxep'];
    $sh = $h->query("select hoten from h_hocsinh where id=$id_hs");
    $rh = $h->fetch_array($sh);
    $sg = $h->query("select hoten from h_giaovien where id=$id_gv");
    $rg = $h->fetch_array($sg);
	$quanly = 'Xem điểm học sinh '.$rh['hoten'].' do GV '.$rg['hoten'].' phụ trách - tuần '.$sx;
	$tcong = "";
	/*
	if(isset($_POST['luu'])) {
	    $data['id_gv'] = $_POST['id_gv'];
        $data['hoten'] = str_replace("'","\'",$_POST['hoten']);
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
	}*/
?>
<div class="lienhe">
	<p class="title"><?php echo $quanly?></p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
    
		<div>
			<label for="hoten">Điểm:</label>
			<input type="text" name="diem" value="<?=$diem?>" size="67" disabled="" />
		</div>
        <div>
			<label for="hoten">Hành vi hiện tại:</label><br /><br />
			<textarea disabled="" rows="8" cols="60" name="hanhviht"><?=$hanhvienht?></textarea>
		</div>
        <div>
			<label for="hoten">Liệu pháp:</label><br /><br />
			<textarea disabled="" rows="8" cols="60" name="lieuphap"><?=$lieuphap?></textarea>
		</div>
        <div>
			<label for="hoten">Hành vi mới:</label><br /><br />
			<textarea disabled="" rows="8" cols="60" name="hanhvimoi"><?=$hanhvimoi?></textarea>
		</div>
        <div>
			<label for="hoten">Nhận xét GV:</label><br /><br />
			<textarea disabled="" rows="8" cols="60" name="nhanxetgv"><?=$nhanxetgv?></textarea>
		</div>
	</form>
</div>