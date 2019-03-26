<?php	
	if(isset($_GET['action'])) {
		switch ($_GET['action'])
		{
			case 'del' :
				$id = $_GET['id'];
				@$result = $h->delete("h_hinhchay"," where id=".$id);
				if ($result) $loixoa = "<p align=center class='err'>Xóa thành công</p>";
				else $loixoa = "<p align=center class='err'>Không thể xóa dữ liệu.</p>";
				break;
		}
	}

	if(isset($_POST['action']) && $_POST['action']=='Xóa chọn') {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = $h->delete("h_hinhchay"," where id=".$id);
			if ($result) $cnt++;
		}
		$loixoa = "<p align=center class='err'>Đã xóa ".$cnt." phần tử</p>";
	}
	if(isset($_POST['action']) && $_POST['action']=='Cập nhật') {
		$s = $h->query("select id from h_hinhchay");
		$nums = $h->num_rows($s);
		//echo $nums;
		$i=0;
		while($i<$nums){
			++$i;
			$id = $_POST['idd'][$i];
			
			if(isset($_POST['hienthi'][$i])) $hienthi = 1;
			else $hienthi = 0;
			
			$sapxep = $_POST['sapxep'][$i];
			//echo $hienthi."&nbsp;&raquo;&nbsp;".$sapxep."<br />";
			$query = "update h_hinhchay set sapxep='$sapxep',hienthi='$hienthi' where id=".$id;
			mysql_query($query) or die ("Error in query: $query");
			
		}
	}

	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
?>

<?php
	$pageindex=taotrang("select count(id) from h_hinhchay","../ctrl_panel/?act=hinhchay&page=",20,$page);
	
	$sn = $h->query("select id from h_hinhchay");
	$n = $h->num_rows($sn);
?>
<input type=hidden name="page" value="<?php echo $page; ?>">
<p class="title">Quản lý hình slider</p>
<div class="tmcn">
                <p class="themmoi">&nbsp;</p>
                <p class="tm"><a href="../ctrl_panel/?act=them_hinhchay">Thêm mới</a></p>               
                <p class="icon"><img src="images/icon_add.png" width="21" height="21" /></p>
                 <form action="" method="post" enctype="multipart/form-data" name="frmList">
                    <p class="tm"><input type="submit" value="Cập nhật" name="action" class="cn" /></a></p>
                    <p class="icon"><img src="images/icon_capnhat.png" width="21" height="21" /></p>
                    <p class="clr"></p>
            </div>
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            	<td colspan="2" align="left">Tổng : <span style="color:red; font-weight:bold;"><?php echo $n?></span> | mỗi trang <span style="color:red; font-weight:bold;">20</span></td>
            </tr>
			<tr>
					<td align="justify" colspan="2" width="100%" class="smallfont ko" style="margin:0 70% 0 0;">Trang: <?php echo $pageindex; ?></td>
				</tr>
             </table>
            <table width="100%" class="trangquanli">
              <tr>
				<td align="center" nowrap class="title" width="5%">STT</td>
                <td align="center" nowrap class="title" width="55%"><b>Hình ảnh</b></td>
				<td align="center" nowrap class="title" width="10%"><b>Hiển thị / Ẩn</b></td>
                <td align="center" nowrap class="title" width="10%"><b>Săp xếp</b></td>
                <td align=center nowrap class="title"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></td>
				<td nowrap class="title" align="center">Sửa</td>
				<td nowrap class="title" align="center">Xóa</td>
			  </tr>
			  <?php 
			  		$result = $h->query("select * from h_hinhchay order by id desc limit ".($p*20).",20" );
					$i=0;
					while($row=$h->fetch_array($result))
					{
						
						if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
						if($row['hienthi'] == 0) $show = '';
						else $show = 'checked';
												
						++$i;
						
			  ?>
			  <tr>
				<td width="30" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><?php echo $i; ?></td>
                <td align="center" bgcolor="<?php echo $color?>" class="smallfont" width="55%" valign="middle"><a href="../ctrl_panel/?act=update_hinhchay&id=<?php echo $row['id']?>" title="Cập nhật"><img src="<?php echo '../upload/slide/'.$row['hinhanh']?>" width="80" /></a></td>
                <td align="center" bgcolor="<?php echo $color?>" class="smallfont" width="10%" valign="middle"><input type="checkbox" <?php echo $show?> name="hienthi[<?php echo $i?>]" value="<?php echo $row['hienthi']?>" /></td>
                <td width="10%" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><input type="text" name="sapxep[<?php echo $i?>]" value="<?php echo $row['sapxep']?>" size="3" style="text-align:center;" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<input type="checkbox" name="chk[]" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="idd[<?php echo $i?>]" value="<?php echo $row['id']?>" />
                </td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a href="../ctrl_panel/?act=update_hinhchay&id=<?php echo $row['id']?>" title="Cập nhật"><img src="icons/icon_edit.gif" width="16" height="16" border="0" /></a></td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');" href="../ctrl_panel/?act=hinhchay&action=del&id=<?php echo $row['id']; ?>" title="Xóa"><img src="icons/icon_delete.gif" width="16" height="16" border="0" /></a></td>
			  </tr>
			  <?php
						} 
			  ?>
			</table>
			<table border="0" width="100%" cellspacing="0" cellpadding="0">
				<tr align="right">
					<td colspan="11"><input type="submit" value="Xóa chọn" name="action" onClick="return confirm('Bạn có chắc chắn muốn xóa ?');" class="button" style="padding: 0">
					</td>
				</tr>
			</table>
			<input type="hidden" name="act" value="hinhchay">
			</form>
			<script language="JavaScript">
			function chkallClick(o) {
				var form = document.frmList;
				for (var i = 0; i < form.elements.length; i++) {
					if (form.elements[i].name == "chk[]" && form.elements[i].name!="chkall") {
						form.elements[i].checked = document.frmList.chkall.checked;
					}
				}
			}
			</script>