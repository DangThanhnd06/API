<?php	
	if(isset($_GET['action'])) {
		switch ($_GET['action'])
		{
			case 'del' :
				$id = $_GET['id'];
				@$result = $h->delete("h_thanhvien"," where id=".$id);
				if ($result) $loixoa = "<p align=center class='err'>Xóa thành công</p>";
				else $loixoa = "<p align=center class='err'>Không thể xóa dữ liệu.</p>";
				break;
		}
	}

	if(isset($_POST['action']) && $_POST['action']=='Xóa chọn') {
		$cnt=0;
		foreach ($_POST['chk'] as $id)
		{
			@$result = $h->delete("h_thanhvien"," where id=".$id);
			if ($result) $cnt++;
		}
		$loixoa = "<p align=center class='err'>Đã xóa ".$cnt." phần tử</p>";
	}
	if(isset($_POST['action']) && $_POST['action']=='Cập nhật') {
		$s = $h->query("select id from h_thanhvien");
		$nums = $h->num_rows($s);
		//echo $nums;
		$i=0;
		while($i<$nums){
			++$i;
			$id = $_POST['idd'][$i];
			
			if(isset($_POST['hienthi'][$i])) $hienthi = 1;
			else $hienthi = 0;
			//echo $hienthi."&nbsp;&raquo;&nbsp;".$sapxep."<br />";
			$query = $h->query("update h_thanhvien set hienthi='$hienthi' where id=".$id);
		}
	}
    if(isset($_POST['action']) && $_POST['action']=='Tìm kiếm'){
        $tukhoa = $_POST['tieude'];
        if($tukhoa != '') { 
            $wh = "where hoten like '%$tukhoa%' ";
            $pageindex=taotrang("select count(id) from h_thanhvien where hoten like '%$tukhoa%'","../ctrl_panel/?act=$act&tukhoa=$tukhoa&page=",20,$page);
            
        }
        else { 
            $wh = "";
            $pageindex=taotrang("select count(id) from h_thanhvien","../ctrl_panel/?act=$act&page=",20,$page);
        }
     } elseif(isset($_REQUEST['tukhoa'])){
        $tukhoa = $_REQUEST['tukhoa'];
        $wh = "where hoten like '%$tukhoa%' ";
        $pageindex=taotrang("select count(id) from h_thanhvien where hoten like '%$tukhoa%'","../ctrl_panel/?act=$act&tukhoa=$tukhoa&page=",20,$page);
     } else {
        $wh = '';
        $pageindex=taotrang("select count(id) from h_thanhvien","../ctrl_panel/?act=$act&page=",20,$page);
     }
     
     $hit = '<tr>
				<td align="center" nowrap class="title" width="5%">STT</td>
                <td align="center" nowrap class="title" width="30%"><b>Họ tên</b></td>
                <td align="center" nowrap class="title" width="18%"><b>Hình ảnh</b></td>
                <td align="center" nowrap class="title" width="10%"><b>Giới tính</b></td>
				<td align="center" nowrap class="title" width="15%"><b>Số tiền</b></td>
                <td align="center" nowrap class="title" width="7%"><b>Khóa ?</b></td>
                <td align=center nowrap class="title"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></td>
				<td nowrap class="title" align="center">Xem</td>
				<td nowrap class="title" align="center">Xóa</td>
			  </tr>';
	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
?>

<?php
	$pageindex=taotrang("select count(id) from h_thanhvien","../ctrl_panel/?act=thanhvien&page=",20,$page);
	
	$sn = $h->query("select id from h_thanhvien $wh");
	$n = $h->num_rows($sn);
?>
<input type=hidden name="page" value="<?php echo $page; ?>">
<p class="title">Quản lý Thành Viên</p>
<div class="tmcn">
                <p class="themmoi">&nbsp;</p>
                
                 <form action="" method="post" enctype="multipart/form-data" name="frmList">
                    <p class="tm"><input type="submit" value="Cập nhật" name="action" class="cn" /></a></p>
                    <p class="icon"><img src="images/icon_capnhat.png" width="21" height="21" /></p>
                    <p class="clr"></p>
            </div>
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            	<td colspan="2" align="left">Tổng : <span style="color:red; font-weight:bold;"><?=$n?></span> | mỗi trang <span style="color:red; font-weight:bold;">20</span></td>
            </tr>
			<tr>
					<td align="justify" colspan="2" width="100%" class="smallfont ko" style="margin:0 70% 0 0;">Trang: <?php echo $pageindex; ?></td>
				</tr>
                <tr width="100%">
                <td colspan="2">
                    <p style="width: 14% !important;float:left;">Tìm kiếm</p>
                    <p style="width: 20%;float:left;">
                        <input type="text" name="tieude" value="" size="30" />
                    </p>
                    <p style="width: 10%;float:left;margin-left:50px;">
                        <input type="submit" name="action" value="Tìm kiếm" />
                    </p>
                    <p style="clear: both;"></p>
                </td>
                
             </tr>
             </table>
            <table width="100%">
              <?php
				if(isset($_POST['action']) && $_POST['action']=='Tìm kiếm') {
			?>
			  <tr>
			  	<td colspan="15" class="smallfont">
				Kết quả tìm kiếm
				</td>
			  </tr>
			
              <?php echo $hit; } else echo $hit; 
			  		if((isset($_POST['action']) && $_POST['action']=='Tìm kiếm')){
			  		 $result = $h->query("select * from h_thanhvien $wh order by id desc limit ".($p*20).",20" );
                     if($h->num_rows($result) == 0)
							echo "<tr><td colspan='15' class='smallfont' align='center' style='color:red; font-size:12px; text-align:center;'>Không tìm thấy !!! </td></tr>";
                    }
                    else 
                        $result = $h->query("select * from h_thanhvien order by id desc limit ".($p*20).",20" );
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
                <td align="center" bgcolor="<?=$color?>" class="smallfont" width="30%" valign="middle"><a href="../ctrl_panel/?act=update_thanhvien&id=<?=$row['id']?>" title="Cập nhật"><?=$row['hoten']?></a></td>
                <?php if($row['hinhanh']!='') { ?>
                <td align="center" bgcolor="<?=$color?>" class="smallfont" width="18%" valign="middle"><a href="../ctrl_panel/?act=update_thanhvien&id=<?=$row['id']?>" title="Cập nhật"><img src="<?='../upload/thanhvien/'.$row['hinhanh']?>" width="80" /></a></td>
                <?php } else { ?>
                <td align="center" bgcolor="<?=$color?>" class="smallfont" width="18%" valign="middle">Chưa có ảnh</td>
                <?php } ?>
                <td align="center" bgcolor="<?=$color?>" class="smallfont" width="10%" valign="middle"><?=$row['gioitinh']?></td>
                <td align="center" bgcolor="<?=$color?>" class="smallfont" width="15%" valign="middle"><?=$row['sotien']?></td>
                <td align="center" bgcolor="<?=$color?>" class="smallfont" width="7%" valign="middle"><input type="checkbox" <?=$show?> name="hienthi[<?=$i?>]" value="<?=$row['hienthi']?>" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<input type="checkbox" name="chk[]" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="idd[<?=$i?>]" value="<?=$row['id']?>" />
                </td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a href="../ctrl_panel/?act=update_thanhvien&id=<?=$row['id']?>" title="Cập nhật"><img src="icons/icon_edit.gif" width="16" height="16" border="0" /></a></td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');" href="../ctrl_panel/?act=thanhvien&action=del&id=<?php echo $row['id']; ?>" title="Xóa"><img src="icons/icon_delete.gif" width="16" height="16" border="0" /></a></td>
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
			<input type="hidden" name="act" value="thanhvien">
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