<?php
echo $_SESSION["session_message"];
$_SESSION["session_message"] = "";
$key = $_POST['txtSearch'];
?>
<table height="28" cellSpacing="0" cellPadding="0" width="100%" border="0">
      <tr align=center>
        <td class="title" width="100%">Quản lý đơn hàng</td>
      </tr>
</table>
<?php
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			$sql = "delete from h_orders where id='".$id."'";
			@$result = mysql_query($sql);
			$sql = "delete from h_orderdetail where order_id='".$id."'";
			@$result = mysql_query($sql);
			if ($result) echo "<p align=center class='err'>Xóa thành công !</p>";
			else echo "<p align=center class='err'>Không thể xóa dữ liệu!</p>";
			break;
	}
?>

<?php
	if (isset($_POST['ButDel'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = mysql_query("delete from h_orders where id='".$id."'");
			@$result = mysql_query("delete from h_orderdetail where order_id='".$id."'");
			if ($result) $cnt++;
		}
		echo "<p align=center class='err'>Đã xóa ".$cnt." phần tử !</p>";
	}
?>
<?php
	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
?>
<input type=hidden name="page" value="<? echo $page; ?>">
<?php
	if($key=="")
		$pageindex=taotrang("select count(*) from h_orders ","./?act=donhang&page=",20,$page);
	else
		$pageindex=taotrang("select count(*) from  h_orders where hoten like '%$key%' ","./?&act=donhang&page=",20,$page);
	
	$s = $h->query("select id from h_orders");
	$n = $h->num_rows($s);
?>

<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
            	<td colspan="2" align="left">Tổng đơn hàng: <span style="color:red; font-weight:bold;"><?=$n?></span> | mỗi trang <span style="color:red; font-weight:bold;">20</span></td>
            </tr>
	<tr>
		<td class="smallfont" colspan="2">Trang: <? echo $pageindex; ?></td>
	</tr>
	<tr>
		<td class="smallfont">&nbsp;&nbsp;Nhập từ khóa tìm kiếm (họ tên khách hàng):</td>
	  <td ><input type="text" name="txtSearch" id="txtSearch" value="<?php echo $key;?>" size="40" /><input type="image" name="Header1:butSeacrh" id="Header1_butSeacrh" src="search_but.gif" style="vertical-align:middle; width:20px; height:20px; padding:2px 0px 6px 5px;" /></td>
	</tr>
</table>
<table width="100%">
<?php
	if($key!="")
	{
?>
	<tr>
		<td colspan="9" class="smallfont">
			Kết quả tìm kiếm với từ khóa: <?php echo $key; ?>
		</td>
	</tr>
  <tr>
  	<td align="center" nowrap class="title">STT.</td>
    <td align=center nowrap class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
	<td nowrap class="title" align="center">Xóa</td>
    <td nowrap class="title" align="center">Mã đơn hàng</td>
	<td align="center" nowrap class="title">Tên khách hàng</td>
	<td align="center" nowrap class="title">Tổng cộng</td>
	<td align="center" nowrap class="title">Ngày đặt hàng</td>
	<td align="center" nowrap class="title">Status</td>
  </tr>
 <?php } else { ?>
  <tr>
  	<td align="center" nowrap class="title">STT.</td>
    <td align=center nowrap class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></td>
	<td nowrap class="title" align="center">Xóa</td>
    <td nowrap class="title" align="center">Mã đơn hàng</td>
	<td align="center" nowrap class="title">Tên khách hàng</td>
	<td align="center" nowrap class="title">Tổng cộng</td>
	<td align="center" nowrap class="title">Ngày đặt hàng</td>
	<td align="center" nowrap class="title">Status</td>
  </tr>
  <?php
  		}
		if($key!="")
		{
			$result = $h->query("select id,hoten,ngaydat,status from h_orders where hoten like '%$key%' order by id desc limit ".($p*20).",20");
			if($h->num_rows($result) == 0)
				echo "<tr><td colspan='8' class='smallfont'>Không tìm thấy $key !!! </td></tr>";
		}
		else
			$result = $h->query("select id,hoten,ngaydat,status from h_orders order by id desc limit ".($p*20).",20");
		$i=0;
		$tongcong = 0;
		while($row=$h->fetch_array($result))
		{
			$ss = $h->query("select idsp,soluong from h_orderdetail where order_id='".$row['id']."'");
			while($rs = $h->fetch_array($ss)) {
				$idsp = $rs['idsp'];
				$soluong = $rs['soluong'];
				$s = $h->query("select giaban from h_sanpham where id='".$idsp."'");
				$r = $h->fetch_array($s);
				$gia = $r['giaban'];
				$tongcong += $soluong*$gia;
			}
			$tongtien = number_format($tongcong,0,',','.').'đ';
			$i++; 
			if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";			
  ?>
  <tr>
  	<td align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top"><?php echo $i; ?></td>
    <td align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top">
    <input type="checkbox" name="chk[]" value="<?php echo $row['id']; ?>"></td>
	<td align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top">
    <a onclick="return confirm('Bạn chắc chắn muốn xóa ?');" href="./?act=donhang&action=del&page=<?php echo $_REQUEST['page']; ?>&id=<?php echo $row['id']; ?>" title="Xóa đơn đặt hàng này"><img src="icons/icon_delete.gif" width="16" height="16" border="0" /></a></td>
	<td align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top">
    <a href="./?act=updateorder&page=<?php echo $_REQUEST['page']; ?>&id=<?php echo $row['id']; ?>" title="Xem và cập nhật đơn đặt hàng này">Số #<?php echo $row['id']; ?></a></td>
	<td align="center" bgcolor="<?=$color?>" class="smallfont" valign="top"><?php echo $row['hoten']; ?></td>
	<td align="center" bgcolor="<?=$color?>" class="smallfont" valign="top"><?php echo $tongtien; ?></td>
	<td align="center" bgcolor="<?=$color?>" class="smallfont" valign="top"><?php echo $row['ngaydat']; ?></td>
	<td align="center" bgcolor="<?=$color?>" class="smallfont" valign="top">
	<?php
				if ($row['status']==1) echo 'Đã trả tiền';
				elseif ($row['status']==2) echo 'Đã giao hàng';
				elseif ($row['status']==3) echo 'Tạm dừng';
				else echo 'Mới đặt hàng';
	?>
	</td>
  </tr>
  <?php
            } 
  ?>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="8" align="left"><input type="submit" value="Xóa chọn" name="ButDel" onclick="return confirm('Are you sure want to delete ?');" class="button" style="padding: 0" />
		</td>
	</tr>
</table>
<input type="hidden" name="act" value="donhang">
</form>
<script language="JavaScript">
function chkallClick(o) {
  	var form = document.frmList;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
			form.elements[i].checked = document.frmList.chkall.checked;
		}
	}
}
</script>