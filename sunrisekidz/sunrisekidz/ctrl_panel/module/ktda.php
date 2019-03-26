<?php	
	$act = $_REQUEST['act'];
	$quanly = 'Quản lý nội dung ứng dụng kiểm tra làn da';
	$actt = "act=$act";
	$them = "act=them_ktda";
	$update = "act=update_ktda";
	switch ($_GET['action'])
	{
		case 'del' :
			$id = $_GET['id'];
			@$result = $h->delete("h_ttrangda"," where id=".$id);
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
			@$result = $h->delete("h_ttrangda"," where id=".$id);
			if ($result) $cnt++;
		}
		$loixoa = "<p align=center class='err'>Đã xóa ".$cnt." phần tử</p>";
	}
	$ac = $_REQUEST['act'];
	$hit = '<tr>
				<td align="center" nowrap class="title" width="4%">STT.</td>
				<td align="center" nowrap class="title" width="16%"><b>TTDV Trán</b></td>
				<td align="center" nowrap class="title" width="16%"><b>TTDV Mắt</b></td>
				<td align="center" nowrap class="title" width="16%"><b>TTDV Má</b></td>
                <td align="center" nowrap class="title" width="16%"><b>TTDV Mũi</b></td>
                <td align="center" nowrap class="title" width="16%"><b>TTDV Cằm</b></td>
                <td align=center nowrap class="title" width="5%"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></td>
				<td nowrap class="title" align="center" width="5%">Sửa</td>
				<td nowrap class="title" align="center" width="5%">Xóa</td>
			  </tr>';

	$page = $_GET["page"];
	$p=0;
	if ($page!='') $p=$page;
?>

<?php
		$pageindex=taotrang("select count(id) from h_ttrangda","../ctrl_panel/?$actt&page=",40,$page);
	
	$sn = $h->query("select id from h_ttrangda");
	$n = $h->num_rows($sn);
?>
<input type=hidden name="page" value="<?php echo $page; ?>">
<p class="title"><?php echo $quanly?></p>
			<div class="tmcn">
                <p class="themmoi">&nbsp;</p>
                <p class="tm"><a href="../ctrl_panel/?<?php echo $them ?>">Thêm mới</a></p>               
                <p class="icon"><img src="images/icon_add.png" width="21" height="21" /></p>
                 <form action="" method="post" enctype="multipart/form-data" name="frmList">
            </div>
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
            	<td colspan="2" align="left">Tổng số tin: <span style="color:red; font-weight:bold;"><?php echo $n ?></span> | mỗi trang <span style="color:red; font-weight:bold;">20</span></td>
            </tr>
			<tr>
					<td align="justify" colspan="2" width="100%" class="smallfont ko" style="margin:0 70% 0 0;">Trang: <?php echo $pageindex; ?></td>
				</tr>
			</table>
            
                        <link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.8.13.custom.css" />
                        <!-- Include the basic JQuery support (core and ui) -->
                        <script type="text/javascript" src="../../js/jquery-1.6.1.min.js"></script>
                        <script type="text/javascript" src="../../js/jquery-ui-1.8.13.custom.min.js"></script>
                        
                        <!-- Include the DropDownCheckList supoprt -->
                        <script type="text/javascript" src="../../js/ui.dropdownchecklist-1.4-min.js"></script>
            <table class="trangquanli" width="100%">
              <?php echo $hit;

                                    $mdvtran = array('Nhạy cảm và dễ bị kích ứng','Rất nhờn','Hơi nhờn','Bình thường','Khô','Mụn','Mụn cám, đầu đen','Mụn tấy đỏ','Mụn viêm','Nhiều nếp nhăn','Tối sạm','Nám, đồi mồi');
                                    $mdvmat = array('Sưng húp và nhạy cảm','Quầng thâm','Bình thường','Khô','Nhiều nếp nhăn','Đốm nám','Khô nhăn','Sụp mí');
                                    $mdvma = array('Nhạy cảm và dễ bị kích ứng','Rất nhờn','Hơi nhờn','Bình thường','Khô','Mụn','Mụn cám, đầu đen','Mụn tấy đỏ','Mụn viêm','Nhiều nếp nhăn','Tối sạm','Nám, đồi mồi, tàn nhang','Chảy sệ');
                                    $mdvmui = array('Nhạy cảm và dễ bị kích ứng','Rất nhờn','Hơi nhờn','Bình thường','Khô','Mụn','Mụn cám, đầu đen','Mụn tấy đỏ','Tàn nhang','Tối sạm');
                                    $mdvcam = array('Nhạy cảm và dễ bị kích ứng','Rất nhờn','Hơi nhờn','Bình thường','Khô','Mụn','Mụn cám, đầu đen','Mụn tấy đỏ','Mụn viêm','Nhiều nếp nhăn','Tối sạm','Nám, đồi mồi, tàn nhang','Chảy sệ, lão hóa');

			  		$result = $h->query("select id,ttdvtran,ttdvmat,ttdvma,ttdvmui,ttdvcam from h_ttrangda order by id desc limit ".($p*40).",40" );
					$i=0;
					while($row=$h->fetch_array($result))
					{
						$ttdvtran = explode(";",$row['ttdvtran']);
                        $ttdvmat = explode(";",$row['ttdvmat']);
                        $ttdvma = explode(";",$row['ttdvma']);
                        $ttdvmui = explode(";",$row['ttdvmui']);
                        $ttdvcam = explode(";",$row['ttdvcam']);
                        
						
						++$i;
			  ?>
              
			  <tr>
				<td width="30" align="center" bgcolor="<?php echo $color; ?>" class="smallfont" valign="middle"><?php echo $i; ?></td>
				<td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="16%" valign="middle" style="text-align: left !important;">
                    <select class="ttdvtran" multiple="multiple">
                                    <?php
                                        foreach($mdvtran as $vtran){
                                            if(in_array($vtran,$ttdvtran))
                                                echo '<option value="'.$vtran.'" selected>'.$vtran.'</option>';
                                            else 
                                                echo '<option value="'.$vtran.'">'.$vtran.'</option>';
                                        }
                                    ?>
                                    </select>
                </td>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="16%" valign="middle" style="text-align: left !important;">
                    <select class="ttdvmat" multiple="multiple">
                                    <?php
                                        foreach($mdvmat as $vmat){
                                            if(in_array($vmat,$ttdvmat))
                                                echo '<option value="'.$vmat.'" selected>'.$vmat.'</option>';
                                            else
                                                echo '<option value="'.$vmat.'">'.$vmat.'</option>';
                                        }
                                    ?>
                                    </select>
                </td>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="16%" valign="middle" style="text-align: left !important;">
                    <select class="ttdvma" multiple="multiple">
                                    <?php
                                        foreach($mdvma as $vma){
                                            if(in_array($vma,$ttdvma))
                                                echo '<option value="'.$vma.'" selected>'.$vma.'</option>';
                                            else
                                                echo '<option value="'.$vma.'">'.$vma.'</option>';
                                        }
                                    ?>
                                    </select>
                </td>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="16%" valign="middle" style="text-align: left !important;">
                    <select class="ttdvmui" multiple="multiple">
                                    <?php
                                        foreach($mdvmui as $vmui){
                                            if(in_array($vmui,$ttdvmui))
                                                echo '<option value="'.$vmui.'" selected>'.$vmui.'</option>';
                                            else
                                                echo '<option value="'.$vmui.'">'.$vmui.'</option>';
                                        }
                                    ?>
                                    </select>
                </td>
                <td align="left" bgcolor="<?php echo $color?>" class="smallfont" width="16%" valign="middle" style="text-align: left !important;">
                    <select class="ttdvcam" multiple="multiple">
                                    <?php
                                        foreach($mdvcam as $vcam){
                                            if(in_array($vcam,$ttdvcam))
                                                echo '<option value="'.$vcam.'" selected>'.$vcam.'</option>';
                                            else
                                                echo '<option value="'.$vcam.'">'.$vcam.'</option>';
                                        }
                                    ?>
                                    </select>
                </td>
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
            <script type="text/javascript">
                                jQuery(document).ready(function($){
                                    $(".ttdvtran").dropdownchecklist( { emptyText: "- TTDV Trán", explicitClose: 'X  Đóng danh mục',width:120,
                        				textFormatFunction: function(options) {
                        					var selectedOptions = options.filter(":selected");
                        					var countOfSelected = selectedOptions.size();
                        					switch(countOfSelected) {
                        						case 0: return "- TTDV Trán";
                        						case 1: return selectedOptions.text();
                        						case options.size(): return "Chọn tất cả";
                        						default: return "Đã chọn "+countOfSelected + " TTDV Trán";
                        					}
                        				}
                        			} );
                                    $(".ttdvmat").dropdownchecklist( { emptyText: "- TTDV mắt", explicitClose: 'X  Đóng danh mục',width:120,
                        				textFormatFunction: function(options) {
                        					var selectedOptions = options.filter(":selected");
                        					var countOfSelected = selectedOptions.size();
                        					switch(countOfSelected) {
                        						case 0: return "- TTDV mắt";
                        						case 1: return selectedOptions.text();
                        						case options.size(): return "Chọn tất cả";
                        						default: return "Đã chọn "+countOfSelected + " TTDV mắt";
                        					}
                        				}
                        			} );
                                    $(".ttdvma").dropdownchecklist( { emptyText: "- TTDV má", explicitClose: 'X  Đóng danh mục',width:120,
                        				textFormatFunction: function(options) {
                        					var selectedOptions = options.filter(":selected");
                        					var countOfSelected = selectedOptions.size();
                        					switch(countOfSelected) {
                        						case 0: return "- TTDV má";
                        						case 1: return selectedOptions.text();
                        						case options.size(): return "Chọn tất cả";
                        						default: return "Đã chọn "+countOfSelected + " TTDV má";
                        					}
                        				}
                        			} );
                                    $(".ttdvmui").dropdownchecklist( { emptyText: "- TTDV mũi", explicitClose: 'X  Đóng danh mục',width:120,
                        				textFormatFunction: function(options) {
                        					var selectedOptions = options.filter(":selected");
                        					var countOfSelected = selectedOptions.size();
                        					switch(countOfSelected) {
                        						case 0: return "- TTDV mũi";
                        						case 1: return selectedOptions.text();
                        						case options.size(): return "Chọn tất cả";
                        						default: return "Đã chọn "+countOfSelected + " TTDV mũi";
                        					}
                        				}
                        			} );
                                    $(".ttdvcam").dropdownchecklist( { emptyText: "- TTDV cằm", explicitClose: 'X  Đóng danh mục',width:120,
                        				textFormatFunction: function(options) {
                        					var selectedOptions = options.filter(":selected");
                        					var countOfSelected = selectedOptions.size();
                        					switch(countOfSelected) {
                        						case 0: return "- TTDV cằm";
                        						case 1: return selectedOptions.text();
                        						case options.size(): return "Chọn tất cả";
                        						default: return "Đã chọn "+countOfSelected + " TTDV cằm";
                        					}
                        				}
                        			} );
                                    
                                });
                            </script>