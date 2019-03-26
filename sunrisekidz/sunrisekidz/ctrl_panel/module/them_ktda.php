<script type="text/javascript">
	function checkform() {
		if(document.frm.tieude.value=="") {
			alert("Bạn chưa nhập tiêu đề.!");
			document.frm.tieude.focus();
			return false;
		}
		if(!isNaN(document.frm.sapxep)) {
			alert("Dữ liệu sắp xếp là số. Vui lòng nhập chính xác!");
			document.frm.sapxep.focus();
			return false;
		}
	}
</script>
<?php
	$act = $_REQUEST['act'];
	$tcong = "";
	$mdvtran = array('Nhạy cảm và dễ bị kích ứng','Rất nhờn','Hơi nhờn','Bình thường','Khô','Mụn','Mụn cám, đầu đen','Mụn tấy đỏ','Mụn viêm','Nhiều nếp nhăn','Tối sạm','Nám, đồi mồi');
    $mdvmat = array('Sưng húp và nhạy cảm','Quầng thâm','Bình thường','Khô','Nhiều nếp nhăn','Đốm nám','Khô nhăn','Sụp mí');
    $mdvma = array('Nhạy cảm và dễ bị kích ứng','Rất nhờn','Hơi nhờn','Bình thường','Khô','Mụn','Mụn cám, đầu đen','Mụn tấy đỏ','Mụn viêm','Nhiều nếp nhăn','Tối sạm','Nám, đồi mồi, tàn nhang','Chảy sệ');
    $mdvmui = array('Nhạy cảm và dễ bị kích ứng','Rất nhờn','Hơi nhờn','Bình thường','Khô','Mụn','Mụn cám, đầu đen','Mụn tấy đỏ','Tàn nhang','Tối sạm');
    $mdvcam = array('Nhạy cảm và dễ bị kích ứng','Rất nhờn','Hơi nhờn','Bình thường','Khô','Mụn','Mụn cám, đầu đen','Mụn tấy đỏ','Mụn viêm','Nhiều nếp nhăn','Tối sạm','Nám, đồi mồi, tàn nhang','Chảy sệ, lão hóa');
?>
<link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.8.13.custom.css" />
                        <!-- Include the basic JQuery support (core and ui) -->
                        <script type="text/javascript" src="../../js/jquery-1.6.1.min.js"></script>
                        <script type="text/javascript" src="../../js/jquery-ui-1.8.13.custom.min.js"></script>
                        
                        <!-- Include the DropDownCheckList supoprt -->
                        <script type="text/javascript" src="../../js/ui.dropdownchecklist-1.4-min.js"></script>
<div class="lienhe">
	<p class="title">Thêm kết quả ứng dụng kiểm tra làn da</p>
	<p class="tcc" style="display: none;"></p>
	<form>
    
		<div>
			<label for="hoten">TTDV Trán:</label>
            <select id="ttdvtran" multiple="multiple">
                                    <?php
                                        foreach($mdvtran as $vtran){
                                            echo '<option value="'.$vtran.'">'.$vtran.'</option>';
                                        }
                                    ?>
                                    </select>
		</div>
        <div>
            <label for="">TTDV mắt:</label>
            <select id="ttdvmat" multiple="multiple">
                                    <?php
                                        foreach($mdvmat as $vmat){
                                            echo '<option value="'.$vmat.'">'.$vmat.'</option>';
                                        }
                                    ?>
                                    </select>
        </div>
        <div>
            <label for="">TTDV má:</label>
            <select id="ttdvma" multiple="multiple">
                                    <?php
                                        foreach($mdvma as $vma){
                                            echo '<option value="'.$vma.'">'.$vma.'</option>';
                                        }
                                    ?>
                                    </select>
        </div>
        <div>
            <label for="">TTDV mũi:</label>
            <select id="ttdvmui" multiple="multiple">
                                    <?php
                                        foreach($mdvmui as $vmui){
                                            echo '<option value="'.$vmui.'">'.$vmui.'</option>';
                                        }
                                    ?>
                                    </select>
        </div>
        <div>
            <label for="">TTDV cằm:</label>
            <select id="ttdvcam" multiple="multiple">
                                    <?php
                                        foreach($mdvcam as $vcam){
                                            echo '<option value="'.$vcam.'">'.$vcam.'</option>';
                                        }
                                    ?>
                                    </select>
        </div>
        <div>
			<label for="hoten">Tình trạng da:</label><br /><br />
			<textarea id="noidung" name="noidung" rows="4" cols="60"></textarea>
		</div>
        <div>
			<label for="hoten">Hướng điều trị:</label><br /><br />
			<textarea id="noidungx" name="noidungx" rows="4" cols="60"></textarea>
		</div>
		<div>
			<input type="button" id="luu" value="Lưu" class="gui" />
			<input type="reset" name="reset" value="Làm lại" class="reset" />
		</div>
	</form>
</div>
<script type="text/javascript">
                                jQuery(document).ready(function($){
                                    $("#ttdvtran").dropdownchecklist( { emptyText: "- Chọn tình trạng da vùng trán", explicitClose: 'X  Đóng danh mục',width:260,
                        				textFormatFunction: function(options) {
                        					var selectedOptions = options.filter(":selected");
                        					var countOfSelected = selectedOptions.size();
                        					switch(countOfSelected) {
                        						case 0: return "- Chọn tình trạng da vùng trán";
                        						case 1: return selectedOptions.text();
                        						case options.size(): return "Chọn tất cả tình trạng";
                        						default: return "Đã chọn "+countOfSelected + " tình trạng da vùng trán";
                        					}
                        				}
                        			} );
                                    $("#ttdvmat").dropdownchecklist( { emptyText: "- Chọn tình trạng da vùng mắt", explicitClose: 'X  Đóng danh mục',width:260,
                        				textFormatFunction: function(options) {
                        					var selectedOptions = options.filter(":selected");
                        					var countOfSelected = selectedOptions.size();
                        					switch(countOfSelected) {
                        						case 0: return "- Chọn tình trạng da vùng mắt";
                        						case 1: return selectedOptions.text();
                        						case options.size(): return "Chọn tất cả tình trạng";
                        						default: return "Đã chọn "+countOfSelected + " tình trạng da vùng mắt";
                        					}
                        				}
                        			} );
                                    $("#ttdvma").dropdownchecklist( { emptyText: "- Chọn tình trạng da vùng má", explicitClose: 'X  Đóng danh mục',width:260,
                        				textFormatFunction: function(options) {
                        					var selectedOptions = options.filter(":selected");
                        					var countOfSelected = selectedOptions.size();
                        					switch(countOfSelected) {
                        						case 0: return "- Chọn tình trạng da vùng má";
                        						case 1: return selectedOptions.text();
                        						case options.size(): return "Chọn tất cả tình trạng";
                        						default: return "Đã chọn "+countOfSelected + " tình trạng da vùng má";
                        					}
                        				}
                        			} );
                                    $("#ttdvmui").dropdownchecklist( { emptyText: "- Chọn tình trạng da vùng mũi", explicitClose: 'X  Đóng danh mục',width:260,
                        				textFormatFunction: function(options) {
                        					var selectedOptions = options.filter(":selected");
                        					var countOfSelected = selectedOptions.size();
                        					switch(countOfSelected) {
                        						case 0: return "- Chọn tình trạng da vùng mũi";
                        						case 1: return selectedOptions.text();
                        						case options.size(): return "Chọn tất cả tình trạng";
                        						default: return "Đã chọn "+countOfSelected + " tình trạng da vùng mũi";
                        					}
                        				}
                        			} );
                                    $("#ttdvcam").dropdownchecklist( { emptyText: "- Chọn tình trạng da vùng cằm", explicitClose: 'X  Đóng danh mục',width:260,
                        				textFormatFunction: function(options) {
                        					var selectedOptions = options.filter(":selected");
                        					var countOfSelected = selectedOptions.size();
                        					switch(countOfSelected) {
                        						case 0: return "- Chọn tình trạng da vùng cằm";
                        						case 1: return selectedOptions.text();
                        						case options.size(): return "Chọn tất cả tình trạng";
                        						default: return "Đã chọn "+countOfSelected + " tình trạng da vùng cằm";
                        					}
                        				}
                        			} );
                                    tinyMCE.triggerSave();
                                    $('#luu').click(function(){
                                        
                                        var ttdvtran = $( "#ttdvtran" ).val() || [];
                                        if(ttdvtran == ''){
                                            alert("Bạn chưa chọn tình trạng da vùng trán.");
                                            $( "#ttdvtran" ).focus();
                                            return false;
                                        } else {
                                            ttdvtran = ttdvtran.join(";");
                                        }
                                        var ttdvmat = $( "#ttdvmat" ).val() || [];
                                        if(ttdvmat == ''){
                                            alert("Bạn chưa chọn tình trạng da vùng mắt.");
                                            $( "#ttdvmat" ).focus();
                                            return false;
                                        } else {
                                            ttdvmat = ttdvmat.join(";");
                                        }
                                        var ttdvma = $( "#ttdvma" ).val() || [];
                                        if(ttdvma == ''){
                                            alert("Bạn chưa chọn tình trạng da vùng má.");
                                            $( "#ttdvma" ).focus();
                                            return false;
                                        } else {
                                            ttdvma = ttdvma.join(";");
                                        }
                                        var ttdvmui = $( "#ttdvmui" ).val() || [];
                                        if(ttdvmui == ''){
                                            alert("Bạn chưa chọn tình trạng da vùng mũi.");
                                            $( "#ttdvmui" ).focus();
                                            return false;
                                        } else {
                                            ttdvmui = ttdvmui.join(";");
                                        }
                                        var ttdvcam = $( "#ttdvcam" ).val() || [];
                                        if(ttdvcam == ''){
                                            alert("Bạn chưa chọn tình trạng da vùng cằm.");
                                            $( "#ttdvcam" ).focus();
                                            return false;
                                        } else {
                                            ttdvcam = ttdvcam.join(";");
                                        }
                                        var ttda = tinyMCE.get('noidung').getContent();
                                        if(ttda == ''){
                                            alert("Bạn chưa điền tình trạng da. Vui lòng điền vào !");
                                            $('#noidung').focus();
                                            return false;
                                        }
                                        var hdt = tinyMCE.get('noidungx').getContent();
                                        if(hdt == ''){
                                            alert("Bạn chưa điền hướng điều trị. Vui lòng điền vào !");
                                            $('#noidungx').focus();
                                            return false;
                                        }
                                        $.post("module/process_themktld.php", {
                                            ttda: ttda,
                                            hdt: hdt,
                                            ttdvtran: ttdvtran,
                                            ttdvmat: ttdvmat,
                                            ttdvma: ttdvma,
                                            ttdvmui: ttdvmui,
                                            ttdvcam: ttdvcam
                                		},  function(data, textStatus){
          		                                if(data==1){
          		                                    alert("Thêm kết quả kiểm tra ứng dụng làn da thành công !!! ");
                                                    location.reload();
                                                    /*
                                                    $( "#ttdvtran" ).val('');
                                                    $( "#ttdvtran" ).val('');
                                                    $( "#ttdvtran" ).val('');
                                                    $( "#ttdvtran" ).val('');
                                                    $( "#ttdvtran" ).val('');
                                                    tinyMCE.get('noidung').getContent('');
                                                    tinyMCE.get('noidung').getContent('');
                                                    */
          		                                }
                                            
                                		});
                                    });
                                });
                            </script>