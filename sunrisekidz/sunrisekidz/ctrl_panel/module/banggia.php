<?php	
	$act = $_REQUEST['act'];
	$quanly = 'Quản lý bảng giá';
	$actt = "act=$act";
	$them = "act=them_banggia";
	$update = "act=update_banggia";
    $thumuc = 'banggia';
	if(isset($_REQUEST['tukhoa'])) { 
		$key = $_REQUEST['tukhoa'];
        $where = " where tieude like '%$key%'";
	}
	else {
		$key = '';
        $where = " ";
	}
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			@$result = $h->delete("h_banggia"," where id=".$id);
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
			@$result = $h->delete("h_banggia"," where id=".$id);
			if ($result) $cnt++;
		}
		$loixoa = "<p align=center class='err'>Đã xóa ".$cnt." phần tử</p>";
	}
	$ac = $_REQUEST['act'];
	$hit = '<tr>
				<td align="center" nowrap class="title" width="4%">STT.</td>
				<td align="center" nowrap class="title" width="42%"><b>Tiêu đề</b></td>
				<td align="center" nowrap class="title" width="20%"><b>Hình ảnh</b></td>
				<td align="center" nowrap class="title" width="8%"><b>Hiển thị / Ẩn</b></td>
                <td align="center" nowrap class="title" width="6%"><b>Sắp xếp</b></td>
                <td align=center nowrap class="title" width="5%"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></td>
				<td nowrap class="title" align="center" width="5%">Sửa</td>
				<td nowrap class="title" align="center" width="5%">Xóa</td>
			  </tr>';

	if(isset($_POST['action']) && $_POST['action']=='Cập nhật') {
		$s = $h->query("select id from h_banggia $where");
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
			$query = "update h_banggia set sapxep='$sapxep',hienthi='$hienthi' where id=".$id;
			mysql_query($query) or die ("Error in query: $query");
			
		}
	}

	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
?>

<?php
	if($key=="")
		$pageindex=taotrang("select count(id) from h_banggia $where","../ctrl_panel/?$actt&page=",20,$page);
	else
		$pageindex=taotrang("select count(id) from h_banggia $where","../ctrl_panel/?$actt&tukhoa='".$key."'&page=",20,$page);
	
	$sn = $h->query("select id from h_banggia $where");
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
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            	<td colspan="2" align="left">Tổng số tin: <span style="color:red; font-weight:bold;"><?php echo $n ?></span> | mỗi trang <span style="color:red; font-weight:bold;">20</span></td>
            </tr>
			<tr>
					<td align="justify" colspan="2" width="100%" class="smallfont ko" style="margin:0 70% 0 0;">Trang: <?php echo $pageindex; ?></td>
				</tr>
				<tr class="ko">
					<td class="smallfont ko">&nbsp;&nbsp;Nhập từ khóa tìm kiếm (<?=$tde?>):</td>
	  				<td width="60%" class="ko"><input type="text" name="txtSearch" id="txtSearch" value="<?php echo $key;?>" size="35" /><input type="image" name="Header1:butSeacrh" id="Header1_butSeacrh" src="search_but.gif" onclick="return searchtk()" style="vertical-align:middle; width:20px; height:20px; padding:2px 0px 6px 5px;" /></td>
				</tr>
             </table>
            <table class="trangquanli" width="100%">
            <?php
				if($key!='') {
			?>
			  <tr>
			  	<td colspan="15" class="smallfont">
				Kết quả tìm kiếm từ khóa: <?php echo $key; ?>
				</td>
			  </tr>
			
              <?php echo $hit; } else echo $hit;
			  		if($key!="")
					{
						$result = $h->query("select id,sapxep,tieude,hinhanh,hienthi from h_banggia $where order by id desc limit ".($p*20).",20");
						if($h->num_rows($result) == 0)
							echo "<tr><td colspan='15' class='smallfont' align='center' style='color:red; font-size:12px; text-align:center;'>Không tìm thấy từ khóa: $key !!! </td></tr>";
					}
					else
			  			$result = $h->query("select id,sapxep,tieude,hinhanh,hienthi from h_banggia $where order by id desc limit ".($p*20).",20" );
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
				<td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="42%" valign="middle"><a href="../ctrl_panel/?<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><?php echo $row['tieude']; ?></a></td>
                <?php if($row['hinhanh'] != '') { ?>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="20%" valign="middle"><a href="../ctrl_panel/?<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><img src="../upload/<?=$thumuc?>/<?php echo $row['hinhanh']; ?>" width="100" /></a></td>
                <?php } else { ?>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="20%" valign="middle"><a href="../ctrl_panel/?<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><img src="../images/no-image.png" width="100" /></a></td>
                <?php } ?>
				<td align="center" bgcolor="<?php echo $color?>" class="smallfont" width="8%" valign="middle"><input type="checkbox" <?php echo $show?> name="hienthi[<?php echo $i?>]" value="<?php echo $row['hienthi']?>" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><input type="text" name="sapxep[<?php echo $i?>]" value="<?php echo $row['sapxep']?>" size="3" style="text-align:center;" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<input type="checkbox" name="chk[]" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="idd[<?php echo $i?>]" value="<?php echo $row['id']?>" />
                </td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a href="../ctrl_panel/?<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><img src="icons/icon_edit.gif" width="16" height="16" border="0" /></a></td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a onClick="return confirm('Bạn chắc chắn muốn xóa?');" href="../ctrl_panel/?<?php echo $actt?>&action=del&id=<?php echo $row['id']; ?>" title="Xóa tin này"><img src="icons/icon_delete.gif" width="16" height="16" border="0" /></a></td>
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
			function searchtk(){
				var tukhoa = $('#txtSearch').val();
				if(tukhoa==''){
				 alert("Bạn chưa nhập từ khóa tìm kiếm. Vui lòng nhập vào !");
				 return false;
				}
				else {
					location.assign("../ctrl_panel/?<?php echo $actt ?>&tukhoa"+tukhoa);	
				}
			}
			</script>