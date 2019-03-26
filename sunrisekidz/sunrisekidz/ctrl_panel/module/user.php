<?php
	if(isset($_GET['action'])) {
		switch($_GET['action'])
		{
			case 'del' :
				$id = $_GET['id'];
				@$result = $h->xoa_user($id);
				if ($result) $loixoa = "<p align=center class='err'>Deleted successfully</p>";
				else $loixoa = "<p align=center class='err'>Can't delete data</p>";
				break;
		}
	}
?>

<?php
	if (isset($_POST['ButDel'])) {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = $h->xoa_user($id);
			if ($result) $cnt++;
		}
		$loixoa = "<p align=center class='err'>Deleted ".$cnt." items</p>";
	}
?>
<p class="title">Manage account admin</p>
        <?php
			if($_SESSION['nhomq']==1) {
		?>
		<div class="tmcn">
           	<p class="themmoi">&nbsp;</p>
			<p class="tm"><a href="../ctrl_panel/?act=them_user">Add</a></p>               
            <p class="icon"><img src="images/icon_add.png" width="21" height="21" /></p>
             <form action="" method="post" enctype="multipart/form-data" name="frmList">
                <p class="tm">&nbsp;</p>
                <p class="icon">&nbsp;</p>
                <p class="clr"></p>
        </div>
        <?php } ?>
			<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#009933" width="100%">
			  <?php
			  	if($_SESSION['nhomq']!=1) {
					$result = $h->query("select * from h_admin where user='".$_SESSION['islogin']."' order by id");
					$i=0;
					$n = $h->num_rows($result);
					if($n)
					{
			 ?>
             <tr>
              	<td nowrap class="title" align="center" width="9%">No.</td>
				<td nowrap class="title" align="center" width="10%">Edit</td>
				<td align="center" nowrap class="title" width="27%"><b>Fullname</b></td>
                <td align="center" nowrap class="title" width="27%"><b>Username</b></td>
                <td align="center" nowrap class="title" width="27%"><b>Last login</b></td>
			  </tr>
             <?php
			 		$row = $h->fetch_array($result);
					$color="#d5d5d5";
			  ?>
			   <tr>
               	<td width="9%" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><?=$i?></td>
				<td width="10%" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a href="../ctrl_panel/?act=update_user&id=<?php echo $row['id']; ?>" title="Update"><img src="icons/icon_edit.gif" width="16" height="16" border="0" /></a></td>
				<td align="center" bgcolor="<?=$color?>" class="smallfont" width="27%" valign="middle"><?php echo $row['tenuser']; ?></td>
                <td align="center" bgcolor="<?=$color?>" class="smallfont" width="27%" valign="middle"><?php echo $row['user']; ?></td>
                <td align="center" bgcolor="<?=$color?>" class="smallfont" width="27%" valign="middle"><?php echo $row['landangnhap']; ?></td>
			  </tr>
			  <?php
			  		} } else {
					$query = $h->query("select * from h_admin order by id");
					$i=0;
					$n = $h->num_rows($query);
					if($n)
					{
			  ?>
              	<td nowrap class="title" align="center">No.</td>
                <td align=center nowrap class="title"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></td>
				<td nowrap class="title" align="center">Edit</td>
                <td nowrap class="title" align="center">Delete</td>
				<td align="center" nowrap class="title" width="27%"><b>Fullname</b></td>
                <td align="center" nowrap class="title" width="27%"><b>Username</b></td>
                <td align="center" nowrap class="title" width="27%"><b>Last login</b></td>
			  <?php
			  
					while($row=$h->fetch_array($query))
					{
						++$i; 
						if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
			  ?>
			  <tr>
				<td width="30" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top"><?php echo $i; ?></td>
				<?php if($row['nhomqt']!=1) { ?>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top">
				<input type="checkbox" name="chk[]" value="<?php echo $row['id']; ?>"></td>
				<?php } else { ?>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top">
				<input type="checkbox" name="chk[]" value="<?php echo $row['id']; ?>" disabled></td>
				<?php } ?>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top">
				<a href="../ctrl_panel/?act=update_user&id=<?php echo $row['id']; ?>" title="Update"><img src="icons/icon_edit.gif" width="16" height="16" border="0" /></a></td>
				<?php if($row['nhomqt']!=1) { ?>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top">
				<a onClick="return confirm('Are you sure want to delete?');" href="../ctrl_panel/?&act=user&&action=del&id=<?php echo $row['id']; ?>" title="Delete"><img src="icons/icon_delete.gif" width="16" height="16" border="0" /></a></td>
				<?php } else { ?>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="top">
				<a href="#" title="Không thể xóa được"><img src="icons/icon_delete.gif" width="16" height="16" border="0" /></a></td>
				<?php } ?>
				<td align="center" bgcolor="<?=$color?>" class="smallfont" width="27%" valign="top"><?php echo $row['tenuser']; ?></td>
				<td align="center" bgcolor="<?=$color?>" class="smallfont" width="27%" valign="top"><?php echo $row['user']; ?></td>
                <td align="center" bgcolor="<?=$color?>" class="smallfont" width="27%" valign="top"><?php echo $row['landangnhap']; ?></td>
			  </tr>
			  <?php
						} } }
			  ?>
			</table>
            <?php if($_SESSION['nhomq']==1) { ?>
			<table border="0" width="100%" cellspacing="0" cellpadding="0">
				<tr align="left">
					<td colspan="8" align="left"><input type="submit" value="Delete Choose" name="ButDel" onClick="return confirm('Are you sure want to delete?');" style="margin-right: 630px">
					</td>
				</tr>
			</table>
            <?php } ?>
			<input type="hidden" name="act" value="user">
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