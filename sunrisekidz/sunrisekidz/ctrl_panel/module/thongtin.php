<?php
	$update = 'update_thongtin';
	$act = $_REQUEST['act'];
    $tt_id = $_REQUEST['tt_id'];
    switch($tt_id){
        case "2":
            $tdd = "Manage Services";
            break;
        case "3":
            $tdd = "Manage Events";
            break;
        case "4":
            $tdd = "Manage Promotions";
            break;
        case "5":
            $tdd = "Manage Cultural Tea";
            break;
        case "6":
            $tdd = "Manage Agencies";
            break;
    }
    switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			@$result = $h->delete("h_thongtin"," where id=".$id);
			if ($result) $loixoa = "<p align=center class='err'>Deleted successfully</p>";
			else $loixoa = "<p align=center class='err'>Can't delete data</p>";
			break;
	}
	if(isset($_POST['action']) && $_POST['action']=='Delete choose') {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = $h->delete("h_thongtin"," where id=".$id);
			if ($result) $cnt++;
		}
		$loixoa = "<p align=center class='err'>Deleted ".$cnt." items</p>";
	}
		$hit = '<tr>
				<td align="center" nowrap class="title" width="4%">No.</td>
                <td align="center" nowrap class="title" width="60%"><b>Title</b></td>
				<td align="center" nowrap class="title" width="10%"><b>Show / hide</b></td>
                <td align="center" nowrap class="title" width="8%"><b>Order</b></td>
                <td align=center nowrap class="title" width="5%"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></td>
				<td nowrap class="title" align="center" width="5%">Edit</td>
                <td nowrap class="title" align="center" width="5%">Delete</td>
			  </tr>';
			  
	if(isset($_POST['action']) && $_POST['action']=='Update') {
		$s = $h->query("select id from h_thongtin where tt_id=$tt_id");
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
			$query = "update h_thongtin set hienthi='$hienthi',sapxep='$sapxep' where id=".$id;
			mysql_query($query);
			
		}
	}

	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
?>

<?php
		$pageindex=taotrang("select count(id) from h_thongtin where tt_id=$tt_id","../ctrl_panel/?act=$act&tt_id=$tt_id&page=",20,$page);
	
	$sn = $h->query("select id from h_thongtin where tt_id=$tt_id");
	$n = $h->num_rows($sn);
?>
<input type=hidden name="page" value="<? echo $page; ?>">
<p class="title"><?php echo $tdd?></p>
			<div class="tmcn">
                <p class="themmoi">&nbsp;</p>
                <p class="tm"><a href="../ctrl_panel/?act=them_thongtin&tt_id=<?=$tt_id?>">Add</a></p>               
                <p class="icon"><img src="images/icon_add.png" width="21" height="21" /></p>
                 <form action="" method="post" enctype="multipart/form-data" name="frmList">
                    <p class="tm"><input type="submit" value="Update" name="action" class="cn" /></a></p>
                    <p class="icon"><img src="images/icon_capnhat.png" width="21" height="21" /></p>
                    <p class="clr"></p>
            </div>
			<table class="trangquanli" cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            	<td colspan="2" align="left">Total : <span style="color:red; font-weight:bold;"><?php echo $n?></span> | per page <span style="color:red; font-weight:bold;">20</span></td>
            </tr>
			<tr>
					<td align="justify" colspan="2" width="100%" class="smallfont ko" style="margin:0 70% 0 0;">Page: <? echo $pageindex; ?></td>
				</tr>
				
             </table>
			<table class="trangquanli" width="100%">
              
			
              <?php echo $hit;
			  		$result = $h->query("select id,tieude_en,hienthi,sapxep from h_thongtin where tt_id=$tt_id order by id desc");
					$i=0;
					while($row=$h->fetch_array($result))
					{
						if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
						++$i;
                        if($row['hienthi'] == 0) $show = '';
						else $show = 'checked';
			  ?>
              
			  <tr>
				<td width="30" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><?php echo $i; ?></td>
				<td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="60%" valign="middle"><a href="../ctrl_panel/?act=<?php echo $update?>&id=<?php echo $row['id']?>" title="Update"><?php echo $row['tieude_en']; ?></a></td>
                <td align="center" bgcolor="<?php echo $color?>" class="smallfont" width="10%" valign="middle"><input type="checkbox" <?php echo $show?> name="hienthi[<?php echo $i?>]" value="<?php echo $row['hienthi']?>" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><input type="text" name="sapxep[<?php echo $i?>]" value="<?php echo $row['sapxep']?>" size="3" style="text-align:center;" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
    				<input type="checkbox" name="chk[]" value="<?php echo $row['id']; ?>" />
                    <input type="hidden" name="idd[<?php echo $i?>]" value="<?php echo $row['id']?>" />
                </td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a href="../ctrl_panel/?act=<?php echo $update?>&id=<?php echo $row['id']?>" title="Update"><img src="icons/icon_edit.gif" width="16" height="16" border="0" /></a></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a onClick="return confirm('Are you sure want to delete?');" href="../ctrl_panel/?act=thongtin&action=del&id=<?php echo $row['id']; ?>" title="Delete this item"><img src="icons/icon_delete.gif" width="16" height="16" border="0" /></a></td>
			  </tr>
              
			  <?php
					}
			  ?>
			</table>
            <table class="trangquanli" border="0" width="100%" cellspacing="0" cellpadding="0">
				<tr align="left">
					<td colspan="15"><input type="submit" value="Delete choose" name="action" onClick="return confirm('Are you sure want to delete?');" class="button" style="padding: 0">
					</td>
				</tr>
			</table>
			<input type="hidden" name="act" value="thongtin" />
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