<?php	
	$act = $_REQUEST['act'];
	$quanly = "Quản lý hỗ trợ trực tuyến";
	$them = "them_hotro";
	$update = "update_hotro";
	$key = $_POST['txtSearch'];
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			@$result = $h->delete("h_hotro"," where id=".$id);
			if ($result) $loixoa = "<p align=center class='err'>Xóa thành công</p>";
			else $loixoa = "<p align=center class='err'>Không thể xóa dữ liệu</p>";
			break;
	}
?>

<?php
	if(isset($_POST['action']) && $_POST['action']=='Xóa chọn') {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = $h->delete("h_hotro"," where id=".$id);
			if ($result) $cnt++;
		}
		$loixoa = "<p align=center class='err'>Đã xóa ".$cnt." phần tử</p>";
	}
		$hit = '<tr>
				<td align="center" nowrap class="title" width="4%">STT.</td>
                <td align="center" nowrap class="title" width="10%"><b>Email</b></td>
				<td align="center" nowrap class="title" width="10%"><b>SDT</b></td>
				<td align="center" nowrap class="title" width="10%"><b>Nick Skype</b></td>
				<td align="center" nowrap class="title" width="10%"><b>Hiển thị / Ẩn</b></td>
                <td align="center" nowrap class="title" width="8%"><b>Sắp xếp</b></td>
                <td align=center nowrap class="title" width="5%"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></td>
				<td nowrap class="title" align="center" width="5%">Xóa</td>
			  </tr>';
			  
	if(isset($_POST['action']) && $_POST['action']=='Cập nhật') {
		$s = $h->query("select id from h_hotro");
		$nums = $h->num_rows($s);
		//echo $nums;
		$i=0;
		while($i<$nums){
			++$i;
			$id = $_POST['idd'][$i];
			//echo $id."<br />";
			$hoten = $_POST['hoten'][$i];
            $email = $_POST['email'][$i];
			$sdt = $_POST['sdt'][$i];
			$yahoo = $_POST['yahoo'][$i];
			$skype = $_POST['skype'][$i];
			if(isset($_POST['hienthi'][$i])) $hienthi = 1;
			else $hienthi = 0;
			$sapxep = $_POST['sapxep'][$i];
			//echo $hienthi."&nbsp;&raquo;&nbsp;".$sapxep."<br />";
			$query = "update h_hotro set hoten='$hoten',email='$email',sdt='$sdt',yahoo='$yahoo',skype='$skype',sapxep='$sapxep',hienthi='$hienthi' where id=".$id;
			mysql_query($query);
			
		}
	}

	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
?>

<?php
		$pageindex=taotrang("select count(id) from h_hotro","../ctrl_panel/?act=$act&page=",20,$page);
	
	$sn = $h->query("select id from h_hotro");
	$n = $h->num_rows($sn);
?>
<input type=hidden name="page" value="<? echo $page; ?>">
<p class="title"><?php echo $quanly?></p>
			<div class="tmcn">
                <p class="themmoi">&nbsp;</p>
                <p class="tm"><a href="../ctrl_panel/?act=<?php echo $them?>">Thêm mới</a></p>               
                <p class="icon"><img src="images/icon_add.png" width="21" height="21" /></p>
                 <form action="" method="post" enctype="multipart/form-data" name="frmList">
                    <p class="tm"><input type="submit" value="Cập nhật" name="action" class="cn" /></a></p>
                    <p class="icon"><img src="images/icon_capnhat.png" width="21" height="21" /></p>
                    <p class="clr"></p>
            </div>
			<table class="trangquanli" cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            	<td colspan="2" align="left">Tổng số : <span style="color:red; font-weight:bold;"><?php echo $n?></span> | mỗi trang <span style="color:red; font-weight:bold;">20</span></td>
            </tr>
			<tr>
					<td align="justify" colspan="2" width="100%" class="smallfont ko" style="margin:0 70% 0 0;">Trang: <? echo $pageindex; ?></td>
				</tr>
				
             </table>
            <table class="trangquanli" width="772">
		
              <?php echo $hit;
			  		$result = $h->query("select id,hoten,sdt,yahoo,skype,sapxep,hienthi,email from h_hotro order by id desc limit ".($p*20).",20" );
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
				<td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="15%" valign="middle"><input type="text" name="email[<?php echo $i?>]" value="<?php echo $row['email']?>" size="30" style="text-align:center;" /></td>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="15%" valign="middle"><input type="text" name="sdt[<?php echo $i?>]" value="<?php echo $row['sdt']?>" size="15" style="text-align:center;" /></td>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="15%" valign="middle"><input type="text" name="skype[<?php echo $i?>]" value="<?php echo $row['skype']?>" size="20" style="text-align:center;" /></td>
                <td align="center" bgcolor="<?php echo $color?>" class="smallfont" width="10%" valign="middle"><input type="checkbox" <?php echo $show?> name="hienthi[<?php echo $i?>]" value="<?php echo $row['hienthi']?>" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><input type="text" name="sapxep[<?php echo $i?>]" value="<?php echo $row['sapxep']?>" size="3" style="text-align:center;" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<input type="checkbox" name="chk[]" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="idd[<?php echo $i?>]" value="<?php echo $row['id']?>" />
                </td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a onClick="return confirm('Bạn chắc chắn muốn xóa?');" href="../ctrl_panel/?act=<?php echo $act?>&action=del&id=<?php echo $row['id']; ?>" title="Xóa sản phẩm này"><img src="icons/icon_delete.gif" width="16" height="16" border="0" /></a></td>
			  </tr>
			  <?php
					}
			  ?>
			</table>
			<table class="trangquanli" border="0" width="100%" cellspacing="0" cellpadding="0">
				<tr align="left">
					<td colspan="15"><input type="submit" value="Xóa chọn" name="action" onClick="return confirm('Bạn chắc chắn muốn xóa ?');" class="button" style="padding: 0">
					</td>
				</tr>
			</table>
			<input type="hidden" name="act" value="<?php echo $act?>">
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