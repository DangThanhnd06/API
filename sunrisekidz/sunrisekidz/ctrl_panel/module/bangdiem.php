<?php	
	$act = $_REQUEST['act'];
    $id_hs = $_REQUEST['id'];
    //$actt = "act=pdf";
    $quanly = 'Quản lý bảng điểm';
	$them = "act=them_bangdiem";
	$update = "act=update_bangdiem";
    if(isset($_REQUEST['idhs'])) {
        $idhs = $_REQUEST['idhs'];
        $where = " where id_hs=$idhs";
        $ac = "act=bangdiem&idhs=$idhs";
	}
	else {
        $idhs = 0;
        $where = " where id_hs=$id_hs";
        $ac = "act=bangdiem&id=$id_hs";
	}
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			@$result = $h->delete("h_bangdiem"," where id=".$id);
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
			@$result = $h->delete("h_bangdiem"," where id=".$id);
			if ($result) $cnt++;
		}
		$loixoa = "<p align=center class='err'>Đã xóa ".$cnt." phần tử</p>";
	}
	$ac = $_REQUEST['act'];
	$hit = '<tr>
				<td align="center" nowrap class="title" width="4%">Tuần</td>
				<td align="center" nowrap class="title" width="26%"><b>Họ tên học sinh</b></td>
                <td align="center" nowrap class="title" width="25%"><b>Giáo viên phụ trách</b></td>
                <td align="center" nowrap class="title" width="15%"><b>Điểm (Thang điểm 100)</b></td>
                <td align="center" nowrap class="title" width="15%"><b>Xem nhận xét GV</b></td>
                <td align="center" nowrap class="title" width="6%"><b>Hiển thị</b></td>
                <td align=center nowrap class="title" width="5%"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></td>
                <td align="center" nowrap class="title" width="4%"><b>Xóa</b></td>
			  </tr>';
     if(isset($_POST['action']) && $_POST['action']=='Cập nhật') {
		$s = $h->query("select id from h_bangdiem $where");
		$nums = $h->num_rows($s);
		//echo $nums;
		$i=0;
		while($i<$nums){
			++$i;
			$id = $_POST['idd'][$i];
			//echo $id."<br />";
			if(isset($_POST['hienthi'][$i])) $hienthi = 1;
			else $hienthi = 0;
			//echo $hienthi."&nbsp;&raquo;&nbsp;".$sapxep."<br />";
			$query = "update h_bangdiem set hienthi='$hienthi' where id=".$id;
			mysql_query($query);
			
		}
	}

	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
?>

<?php
    if($idhs!=0)
	   $pageindex=taotrang("select count(id) from h_bangdiem $where","../ctrl_panel/?act=bangdiem&id=$id_hs&page=",20,$page);
	else
        $pageindex=taotrang("select count(id) from h_bangdiem $where","../ctrl_panel/?act=bangdiem&idhs=$idhs&page=",20,$page);
	$sn = $h->query("select id from h_bangdiem $where");
	$n = $h->num_rows($sn);
?>
<input type=hidden name="page" value="<?php echo $page; ?>">
<p class="title"><?php echo $quanly?></p>
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            	<td colspan="2" align="left">Tổng số: <span style="color:red; font-weight:bold;"><?php echo $n ?></span> | mỗi trang <span style="color:red; font-weight:bold;">20</span></td>
            </tr>
			<tr>
					<td align="justify" colspan="2" width="100%" class="smallfont ko" style="margin:0 70% 0 0;">Trang: <?php echo $pageindex; ?></td>
				</tr>
                <tr class="ko">
					<td class="smallfont ko">&nbsp;&nbsp;Chọn học sinh:</td>
	  				<td width="60%" class="ko">
                      <select id="idhs">
                      <?php
                        $sh = $h->query("select id,hoten from h_hocsinh where kichhoat=1");
                        while($rh = $h->fetch_array($sh)){
                            if($rh['id']==$idhs || $rh['id']==$id_hs)
                                echo '<option value="'.$rh['id'].'" selected>'.$rh['hoten'].'</option>';
                            else
                                echo '<option value="'.$rh['id'].'">'.$rh['hoten'].'</option>';
                        }
                      ?>
                      </select>
                      <input type="image" name="Header1:butSeacrh" id="Header1_butSeacrh" src="search_but.gif" style="vertical-align:middle; width:20px; height:20px; padding:2px 0px 6px 5px;" /></td>
				</tr>
             </table>
            <table class="trangquanli" width="100%">
              <?php
				if($idhs!=0) {
				    $shs = $h->query("select hoten from h_hocsinh where id=$idhs");
                    $rhs = $h->fetch_array($shs);
			?>
			  <tr>
			  	<td colspan="15" class="smallfont">
				Kết quả tìm kiếm từ khóa: <?php echo $rhs['hoten']; ?>
				</td>
			  </tr>
			
              <?php echo $hit; } else echo $hit;
			  		if($gvpt!=0)
					{
						$result = $h->query("select id,id_hs,id_gv,diem,hienthi,sapxep from h_bangdiem $where order by id asc limit ".($p*20).",20");
						if($h->num_rows($result) == 0)
							echo "<tr><td colspan='15' class='smallfont' align='center' style='color:red; font-size:12px; text-align:center;'>Không tìm thấy !!! </td></tr>";
					}
					else
			  			$result = $h->query("select id,id_hs,id_gv,diem,hienthi,sapxep from h_bangdiem $where order by id asc limit ".($p*20).",20" );
					$i=0;
					while($row=$h->fetch_array($result))
					{
						
						if ($i%2) $color="#d5d5d5"; else $color="#e5e5e5";
						if($row['hienthi'] == 0) $show = '';
						else $show = 'checked';
                        $idgv = $row['id_gv'];
                        $sgv = $h->query("select hoten from h_giaovien where id=$idgv");
                        $rgv = $h->fetch_array($sgv);
                        $gv = $rgv['hoten'];
                        $ids = $row['id_hs'];
                        $ss = $h->query("select hoten from h_hocsinh where id=$ids");
                        $rs = $h->fetch_array($ss);
                        $hs = $rs['hoten'];
						
						++$i;
			  ?>
              
			  <tr>
				<td width="30" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><?php echo $row['sapxep']; ?></td>
				<td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="26%" valign="middle"><a href="../ctrl_panel/?<?php echo $update?>&id=<?php echo $row['id']?>" title="Cập nhật"><?php echo $hs; ?></a></td>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="25%" valign="middle"><?php echo $gv; ?></td>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="15%" valign="middle"><?php echo $row['diem']; ?></td>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="15%" valign="middle"><a href="../ctrl_panel/?<?=$update?>&id=<?php echo $row['id']?>" title="Xem và cập nhật điểm này cho học sinh">Xem</a></td>
                <td align="center" bgcolor="<?php echo $color?>" class="smallfont" width="8%" valign="middle"><input type="checkbox" <?php echo $show?> name="hienthi[<?php echo $i?>]" value="<?php echo $row['hienthi']?>" /></td>
                <td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<input type="checkbox" name="chk[]" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="idd[<?php echo $i?>]" value="<?php echo $row['id']?>" />
                </td>
				<td width="20" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle">
				<a onClick="return confirm('Bạn chắc chắn muốn xóa?');" href="../ctrl_panel/?<?=$ac?>&action=del&id=<?php echo $row['id']; ?>" title="Xóa học sinh này"><img src="icons/icon_delete.gif" width="16" height="16" border="0" /></a></td>
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
                $('#Header1_butSeacrh').click(function(e){
                    e.preventDefault();
                    moduleSearch();
                });
                function moduleSearch() {
                	//pathArray = location.pathname.split( '/' );
                
                    var idhs = $('#idhs').val();
                    url = '../ctrl_panel/?act=bangdiem';
                	if (filter_keyword) {
                		//url += encodeURIComponent(filter_keyword).replace(/%20/gi, "+").toLowerCase() + '/';
                        url += '&idhs='+idhs;
                        $('#idhs').val(idhs).attr('selected');
                        location.assign(url);
                	} else {
                	   alert("Bạn chưa chọn học sinh để xem bảng điểm. Vui lòng chọn !");
                	}
                	
                }
			</script>