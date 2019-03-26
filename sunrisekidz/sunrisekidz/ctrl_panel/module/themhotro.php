<script type="text/javascript">
	function checkform() {
		if(document.frm.tieude.value=="") {
			alert("Bạn chưa nhập họ tên.!");
			document.frm.tieude.focus();
			return false;
		}
	}
</script>
<?php
	$quanly = "Thêm hỗ trợ mới";
		
	$s = $h->query("select max(sapxep) as maxsx from h_hotro");
	$rs = $h->fetch_array($s);
	$sx = $rs['maxsx']+1;
	if(isset($_POST['luu']))
	{
		$data['sdt'] = $_POST['sdt'];		
		$data['skype'] = $_POST['skype'];
		$data['email'] = $_POST['email'];
		$sapxep = $_POST['sapxep'];
		if($sapxep == '') $data['sapxep']=$sx;
		else $data['sapxep'] = $sapxep;		
		if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		
		
		$query = $h->insert($data,"h_hotro");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Thêm thành công</p>";
			$s = $h->query("select max(sapxep) as maxsx from h_hotro");
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
			<label for="hoten">Email:</label>
			<input type="text" name="email" value="" size="67" />
		</div>
        <div>
			<label for="hoten">SĐT:</label>
			<input type="text" name="sdt" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Sắp xếp:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <div>
			<label for="hoten">Nick skype:</label>
            <input type="text" name="skype" size="20" />
		</div>
		<div>
			<label for="hoten">Hiển thị / ẩn:</label>
			<span class="font13">Hiển thị: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Ẩn: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
			</span>
		</div>
		<div>
			<input type="submit" name="luu" value="Lưu" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>