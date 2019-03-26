<?php	
	$act = $_REQUEST['act'];
    $sp_id = $_REQUEST['sp_id'];
	$sm = $h->query("select tieude_vn from h_sanpham where id=".$sp_id);
	$rm = $h->fetch_array($sm);
    $quanly = 'Quản lý sản phẩm trong chuyên mục '.$rm['tieude_vn'];
	
	$page = 0;
	$them = "them_sanpham";
	$update = "update_sanpham";
	$key = $_POST['txtSearch'];
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			@$result = $h->delete("h_sanpham"," where id=".$id);
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
			@$result = $h->delete("h_sanpham"," where id=".$id);
			if ($result) $cnt++;
		}
		$loixoa = "<p align=center class='err'>Đã xóa ".$cnt." phần tử</p>";
	}
		$hit = '<tr>
				<td align="center" nowrap class="title" width="4%">STT.</td>
				<td align="center" nowrap class="title" width="30%"><b>Tiêu đề</b></td>
				<td align="center" nowrap class="title" width="16%"><b>Hình ảnh</b></td>
                <td align="center" nowrap class="title" width="10%"><b>SP nổi bật</b></td>
				<td align="center" nowrap class="title" width="10%"><b>Hiển thị / Ẩn</b></td>
                <td align="center" nowrap class="title" width="8%"><b>Sắp xếp</b></td>
                <td align=center nowrap class="title" width="5%"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></td>
				<td nowrap class="title" align="center" width="5%">Sửa</td>
				<td nowrap class="title" align="center" width="5%">Xóa</td>
			  </tr>';
			  
	if(isset($_POST['action']) && $_POST['action']=='Cập nhật') {
		$s = $h->query("select id from h_sanpham where sp_id=$sp_id");
		$nums = $h->num_rows($s);
		//echo $nums;
		$i=0;
		while($i<$nums){
			++$i;
			$id = $_POST['idd'][$i];
			//echo $id."<br />";
			if(isset($_POST['hienthi'][$i])) $hienthi = 1;
			else $hienthi = 0;
            if(isset($_POST['spnb'][$i])) $spnb = 1;
			else $spnb = 0;
			$sapxep = $_POST['sapxep'][$i];
			//echo $hienthi."&nbsp;&raquo;&nbsp;".$sapxep."<br />";
			$query = "update h_sanpham set sapxep='$sapxep',hienthi='$hienthi',spnb='$spnb' where id=".$id;
			mysql_query($query);// or die ("Error in query: $query");
			
		}
	}

	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
?>

<?php
	if($key=="")
		$pageindex=taotrang("select count(id) from h_sanpham where sp_id=$sp_id","../ctrl_panel/?act=$act&sp_id=$sp_id&page=",20,$page);
	else
		$pageindex=taotrang("select count(id) from h_sanpham where sp_id=$sp_id and tieude_vn like '%$key%'","../ctrl_panel/?act=$act&sp_id=$sp_id&key='".$key."'&page=",20,$page);
	
	$sn = $h->query("select id from h_sanpham where sp_id=$sp_id");
	$n = $h->num_rows($sn);
?>
<input type=hidden name="page" value="<?php echo $page; ?>">
<p class="title"><?php echo $quanly?></p>
			<div class="tmcn">
                <p class="themmoi">&nbsp;</p>
                <p class="tm"><a href="../ctrl_panel/?act=<?php echo $them?>&sp_id=<?php echo $sp_id; ?>">Thêm mới</a></p>               
                <p class="icon"><img src="images/icon_add.png" width="21" height="21" /></p>
                 <form action="" method="post" enctype="multipart/form-data" name="frmList">
                    <p class="tm"><input type="submit" value="Cập nhật" name="action" class="cn" /></a></p>
                    <p class="icon"><img src="images/icon_capnhat.png" width="21" height="21" /></p>
                    <p class="clr"></p>
            </div>
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            	<td colspan="2" align="left">Tổng số: <span style="color:red; font-weight:bold;"><?php echo $n?></span> | mỗi trang <span style="color:red; font-weight:bold;">20</span></td>
            </tr>
			<tr>
					<td align="justify" colspan="2" width="100%" class="smallfont ko" style="margin:0 70% 0 0;">Page: <?php echo $pageindex; ?></td>
				</tr>
				<tr class="ko">
					<td class="smallfont ko">&nbsp;&nbsp;Điền từ khóa tìm kiếm (Tiêu đề tiếng Việt):</td>
	  				<td width="60%" class="ko"><input type="text" name="txtSearch" id="txtSearch" value="<?php echo $key;?>" size="35" /><input type="image" name="Header1:butSeacrh" id="Header1_butSeacrh" src="search_but.gif" style="vertical-align:middle; width:20px; height:20px; padding:2px 0px 6px 5px;" /></td>
				</tr>
             </table>
            <table class="trangquanli" width="100%">
            <?php
				if($key!='') {
			?>
			  <tr>
			  	<td colspan="15" class="smallfont">
				Result search: <?php echo $key; ?>
				</td>
			  </tr>
			
              <?php echo $hit; } else echo $hit;
			  		if($key!="")
					{
						$result = $h->query("select id,sapxep,tieude_vn,hinhanh,hienthi,spnb from h_sanpham where sp_id=$sp_id and tieude_vn like '%".$key."%'  order by id desc limit ".($p*20).",20");
						if($h->num_rows($result) == 0)
							echo "<tr><td colspan='15' class='smallfont' align='center' style='color:red; font-size:12px; text-align:center;'>Không tìm thấy với từ khóa: $key !!! </td></tr>";
					}
					else
			  			$result = $h->query("select id,sapxep,tieude_vn,hinhanh,hienthi,spnb  from h_sanpham where  sp_id=$sp_id order by id desc limit ".($p*20).",20" );
					$i=0;
					while($row=$h->fetch_array($result))
					{
						
						if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
						if($row['hienthi'] == 0) $show = '';
						else $show = 'checked';
                        if($row['spnb'] == 0) $show1 = '';
						else $show1 = 'checked';
						++$i;

			  ?>
              
			  <tr>
				<td width="30" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><?php echo $i; ?></td>
				<td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="30%" valign="middle"><a href="../ctrl_panel/?act=<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><?php echo $row['tieude_vn']; ?></a></td>
                <?php if($row['hinhanh']!='') { 
					$hinh = $row['hinhanh'];                    
				?>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="16%" valign="middle"><a href="../ctrl_panel/?act=<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><img src="<?php echo '../upload/product/'.$hinh?>" width="45" /></a></td>
                <?php } else { ?>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="16%" valign="middle">No image</td>
                <?php } ?>
                <td align="center" bgcolor="<?php echo $color?>" class="smallfont" width="10%" valign="middle"><input type="checkbox" <?php echo $show1?> name="spnb[<?php echo $i?>]" value="<?php echo $row['spnb']?>" /></td>
				<td align="center" bgcolor="<?php echo $color?>" class="smallfont" width="10%" valign="middle"><input type="checkbox" <?php echo $show?> name="hienthi[<?php echo $i?>]" value="<?php echo $row['hienthi']?>" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><input type="text" name="sapxep[<?php echo $i?>]" value="<?php echo $row['sapxep']?>" size="3" style="text-align:center;" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<input type="checkbox" name="chk[]" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="idd[<?php echo $i?>]" value="<?php echo $row['id']?>" />
                </td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a href="../ctrl_panel/?act=<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><img src="icons/icon_edit.gif" width="16" height="16" border="0" /></a></td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a onClick="return confirm('Bạn có chắc chắn muốn xóa?');" href="../ctrl_panel/?act=<?php echo $act?>&sp_id=<?php echo $sp_id; ?>&action=del&id=<?php echo $row['id']; ?>" title="Delete this item"><img src="icons/icon_delete.gif" width="16" height="16" border="0" /></a></td>
			  </tr>
			  <?php
					}
			  ?>
			</table>
			<table class="trangquanli" border="0" width="100%" cellspacing="0" cellpadding="0">
				<tr align="left">
					<td colspan="15"><input type="submit" value="Xóa chọn" name="action" onClick="return confirm('Bạn có chắc chắn muốn xóa ?');" class="button" style="padding: 0">
					</td>
				</tr>
			</table>
			<input type="hidden" name="act" value="<?php echo $act?>">
			</form>
			<script type="text/javascript">
			function chkallClick(o) {
				var form = document.frmList;
				for (var i = 0; i < form.elements.length; i++) {
					if (form.elements[i].name == "chk[]" && form.elements[i].name!="chkall") {
						form.elements[i].checked = document.frmList.chkall.checked;
					}
				}
			}
			</script>