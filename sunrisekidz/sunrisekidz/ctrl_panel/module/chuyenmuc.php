<?php	
	$act = $_REQUEST['act'];
    
    $them = 'act=them_chuyenmuc';
    $update = 'act=update_chuyenmuc';
    $order = 'order by id';
    $quanly = 'Quản lý chuyên mục sản phẩm';
    
?>

<?php
	if(isset($_POST['action']) && $_POST['action']=='Xóa chọn') {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = $h->delete("h_sanpham"," where id=".$id);
			if ($result) $cnt++;
		}
		$loixoa = "<p align=center class='err'>Đã xóa ".$cnt." phần tử</p>";
	}
	$ac = $_REQUEST['act'];
		$hit = '<tr>
				<td align="center" nowrap class="title" width="4%">STT.</td>
				<td align="center" nowrap class="title" width="70%"><b>Tiêu đề</b></td>
                <td align="center" nowrap class="title" width="8%"><b>Hiển thị / Ẩn</b></td>
                <td align="center" nowrap class="title" width="6%"><b>Sắp xếp</b></td>
				<td nowrap class="title" align="center" width="5%">Sửa</td>
			  </tr>';
	if(isset($_POST['action']) && $_POST['action']=='Cập nhật') {
		$s = $h->query("select id from h_sanpham where sp_id=0");
		$nums = $h->num_rows($s);
		//echo $nums;
		$i=0;
		while($i<$nums){
			++$i;
			$id = $_POST['idd'][$i];
			//echo $id."<br />";
			if(isset($_POST['hienthi'][$i])) $hienthi = 1;
			else $hienthi = 0;
			$sapxep = $_POST['sapxep'][$i];
			//echo $hienthi."&nbsp;&raquo;&nbsp;".$sapxep."<br />";
			$query = "update h_sanpham set hienthi='$hienthi',sapxep='$sapxep' where id=".$id;
			mysql_query($query); // or die ("Error in query: $query");
			
		}
	}
?>

<?php
	//$pageindex=taotrang("select count(id) from h_sanpham where $where ","../ctrl_panel/?act=$act".$lk,20,$page);
	
	$sn = $h->query("select id from h_sanpham where sp_id=0");
	$n = $h->num_rows($sn);
?>
<input type=hidden name="page" value="<?php echo $page; ?>">
<p class="title"><?php echo $quanly?></p>
			<div class="tmcn">
                <p class="themmoi">&nbsp;</p>
                <p class="tm"><a href="../ctrl_panel/?<?php echo $them ?>">Thêm mới</a></p>               
                <p class="icon"><img src="images/icon_add.png" width="21" height="21" /></p>
                 <form action="" method="post" enctype="multipart/form-data" name="frmList">
                    <p class="tm"><input type="submit" value="Cập nhật" name="action" class="cn" /></a></p>
                    <p class="icon"><img src="images/icon_capnhat.png" width="21" height="21" /></p>
                    <p class="clr"></p>
            </div>
			<table class="trangquanli" cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            	<td colspan="2" align="left">Tổng số: <span style="color:red; font-weight:bold;"><?php echo $n ?></span></td>
            </tr>
			
             </table>
            <table class="trangquanli" width="100%">
            
			
              <?php echo $hit;
			  		$result = $h->query("select id,tieude_vn,sapxep,hienthi from h_sanpham where sp_id=0 $order" );
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
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="70%" valign="middle"><?php echo $row['tieude_vn']; ?></td>
                <td align="center" bgcolor="<?php echo $color?>" class="smallfont" width="8%" valign="middle"><input type="checkbox" <?php echo $show?> name="hienthi[<?php echo $i?>]" value="<?php echo $row['hienthi']?>" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><input type="text" name="sapxep[<?php echo $i?>]" value="<?php echo $row['sapxep']?>" size="3" style="text-align:center;" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a href="../ctrl_panel/?<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><img src="icons/icon_edit.gif" width="16" height="16" border="0" /></a></td>
				<input type="hidden" name="idd[<?php echo $i?>]" value="<?php echo $row['id']?>" />
			  </tr>
              
			  <?php
					} 
			  ?>
			</table>
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