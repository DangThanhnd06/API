<?php
	$update = 'update_thongtin';
	$act = $_REQUEST['act'];
	$hit = '<tr>
				<td align="center" nowrap class="title" width="4%">STT.</td>
				<td align="center" nowrap class="title" width="82%"><b>Tiêu đề</b></td>
				<td nowrap class="title" align="center" width="5%">Sửa</td>
			  </tr>';
	
?>
<p class="title">Quản lý thông tin form đăng ký, đặt lịch</p>
			
			<table class="trangquanli" width="100%">
              
			
              <?php echo $hit;
			  		$result = $h->query("select id,tieude from h_thongtin where id IN (14,15,16) order by id");
					$i=0;
					while($row=$h->fetch_array($result))
					{
						
						if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
						++$i;
			  ?>
              
			  <tr>
				<td width="30" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><?php echo $i; ?></td>
				<td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="82%" valign="middle"><a href="../ctrl_panel/?act=<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><?php echo $row['tieude']; ?></a></td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a href="../ctrl_panel/?act=<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><img src="icons/icon_edit.gif" width="16" height="16" border="0" /></a></td>
			  </tr>
              
			  <?php
					}
			  ?>
			</table>
			<input type="hidden" name="act" value="thongtin">
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