<?php
	$id = $_REQUEST['id'];
	$sql = $h->query("select * from h_orders where id=$id");
	$r = $h->fetch_array($sql);
	if(isset($_POST['butSave']))
	{
		$status = $_POST['status'];
		$query = $h->query("update h_orders set status=".$status." where id=$id");
		if($query)
		{
			echo "<div align='center' style='color:#cc0000'>Cập nhật thành công</div>";
			$sql = $h->query("select * from h_orders where id=$id");
			$r = $h->fetch_array($sql);
		}
		else
			echo "<div align='center' style='color:#cc0000'>Lỗi</div>";
	}
?>
<br />
<?php $p=isset($_GET['page'])?$_GET['page']:1; ?>
<form method="POST" name="frmSubmit" enctype="multipart/form-data" action="./?act=updateorder&page=<?php echo $_REQUEST['page']; ?>&id=<?php echo $id; ?>" style="margin-top: 0; margin-bottom: 0" onsubmit="return check();">
<input type="hidden" name="act" value="<? echo $_REQUEST['act']; ?>">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#009933" width="100%" id="AutoNumber1">
  <tr>
    <td width="45%" class="title" align="center" height="20">Chi tiết đơn hàng</td>
  </tr>
 </table>
 <table cellpadding="4" cellspacing="0" width="98%" style="border:1px solid #b4b4b4;">
  <tr style="line-height:20px;">
		<td width="20%" class="smallfont"><strong>Mã đơn hàng:</strong> </td>
		<td width="80%" class="smallfont" style="text-align:left; padding-left:10px;"><?=$r['madh']?></td>
	</tr>
	<tr style="line-height:20px;">
		<td class="smallfont"><strong>Ngày đặt:</strong> </td>
		<td class="smallfont" style="text-align:left; padding-left:10px;"><?=$r['ngaydat']?></td>
	</tr>
	<tr style="line-height:20px;">
		<td class="smallfont"><strong>Trạng thái:</strong> </td>
		<td class="smallfont" style="text-align:left; padding-left:10px;">
		<select name="status">
			<option value="0" <?php if ($r['status']==0) echo "selected";?>>Mới đặt hàng</option>
			<option value="1" <?php if ($r['status']==1) echo "selected";?>>Đã trả tiền</option>
			<option value="2" <?php if ($r['status']==2) echo "selected";?>>Đã giao hàng</option>
			<option value="3" <?php if ($r['status']==3) echo "selected";?>>Tạm dừng</option>
		</select>
		</td>
	</tr>
 	<tr><td colspan="2" class="title">Thông tin khách hàng</td></tr>
	<tr style="line-height:20px;">
		<td class="smallfont"><strong>Họ và tên:</strong> </td>
		<td class="smallfont" style="text-align:left; padding-left:10px;"><?=$r['hoten']?></td>
	</tr>
	<tr style="line-height:20px;">
		<td class="smallfont"><strong>Địa chỉ:</strong> </td>
		<td class="smallfont" style="text-align:left; padding-left:10px;"><?=$r['dc']?></td>
	</tr>
	<tr style="line-height:20px;">
		<td class="smallfont"><strong>Số điện thoại:</strong> </td>
		<td class="smallfont" style="text-align:left; padding-left:10px;"><?=$r['dt']?></td>
	</tr>
	<tr style="line-height:20px;">
		<td class="smallfont"><strong>Email:</strong> </td>
		<td class="smallfont" style="text-align:left; padding-left:10px;"><?=$r['email']?></td>
	</tr>
  <tr><td colspan="2" class="title">Thông tin khác</td></tr>
	<tr style="line-height:20px;">
		<td class="smallfont"><strong>Ngày giao hàng:</strong> </td>
		<td class="smallfont" style="text-align:left; padding-left:10px;"><?=$r["ngaygiao"]?></td>
	</tr>
	<tr style="line-height:20px;">
		<td class="smallfont"><strong>Thời gian giao hàng:</strong> </td>
		<td class="smallfont" style="text-align:left; padding-left:10px;"><?=$r["thoigiangh"]?></td>
	</tr>
    <tr style="line-height:20px;">
		<td class="smallfont"><strong>Hình thức thanh toán:</strong> </td>
		<td class="smallfont" style="text-align:left; padding-left:10px;"><?=$r["hinhthuctt"]?></td>
	</tr>
	<tr style="line-height:20px;">
		<td class="smallfont" valign="top"><strong>Lời nhắn:</strong></td>
		<td style="text-align:left; padding-left:10px;"><?=$r["loinhan"]?></td>
	</tr>
  <tr><td colspan="2" class="title">Sản phẩm đã mua</td></tr>
  </table>
  <table width="98%" border="0" cellspacing="0" cellpadding="4">
	  <tr bgcolor="#E8E8E8">
			<td class="smallfont" width="35%"><b>Tên sản phẩm</b></td>
			<td class="smallfont" width="13%" align="right"><b>Số lượng</b></td>
			<td class="smallfont" width="22%" align="right"><b>Đơn giá</b></td>
			<td class="smallfont" width="30%" align="right"><b>Tổng tạm</b></td>
		</tr>
	<?php
		$tongm = 0;
		$g = $h->query("select * from h_orderdetail where order_id=$id");
		while($k = $h->fetch_array($g))
		{
			$idsp = $k['idsp'];
			$soluong = $k['soluong'];
			$s = $h->query("select tieude_vn,giaban,giacu from h_sanpham where id='".$idsp."'");
			$rs = $h->fetch_array($s);
			$masp = $rs['tieude_vn'];
			if($rs['giacu']!=0) $dongia = $rs['giacu'];
			else $dongia = $rs['giaban'];
			$thanhtien = $dongia*$soluong;
			$tongm += $thanhtien;
	?>
	  <tr>
			<td class="smallfont"><?=$masp?></td>
			<td class="smallfont" align="right"><?=$soluong?></td>
			<td class="smallfont" align="right"><?=number_format($dongia,0,',','.')?> VNĐ</td>
			<td class="smallfont" align="right"><?=number_format($thanhtien,0,',','.')?> VNĐ</td>
	  </tr>
	<?php } ?>
		<tr bgcolor="#E8E8E8"  style="line-height:20px;">
			<td class="smallfont" colspan="5" style="text-align:right;"><b>Tổng cộng: &nbsp;&nbsp;&nbsp; <?=number_format($tongm,0,',','.')?> VNĐ</b></td>
		</tr>	  
	</table>
	<table width="90%">
	<tr>
        <td width="15%" class="smallfont" align="center">
		<INPUT onClick="submitForm()" TYPE="submit" NAME="butSave" VALUE="Update" CLASS=button>&nbsp;</td>
      </tr>
    </table>
</form>