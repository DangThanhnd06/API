<?php
	$tt_id = $_REQUEST['tt_id'];
    
    switch($tt_id){
        case "2":
            $tdd = 'service';
            $kt = "(Size 550px x 365px) (If not replace, please leave blank)";
            $titd_vn = 'Title (VN)';
            $titd_en = 'Title (EN)';
            $titd_cn = 'Title (CN)';
            break;
        case "3":
            $tdd = 'event';
            $kt = "(Size width 1200px, height auto) (If not replace, please leave blank)";
            $titd_vn = 'Title (VN)';
            $titd_en = 'Title (EN)';
            $titd_cn = 'Title (CN)';
            break;
        case "4":
            $tdd = 'promotion';
            $kt = "(Size width 1200px, height auto) (If not replace, please leave blank)";
            $titd_vn = 'Title (VN)';
            $titd_en = 'Title (EN)';
            $titd_cn = 'Title (CN)';
            break;
        case "5":
            $tdd = 'Cultural Tea';
            $kt = "(Size circle with radius equal or great than 270px) (If not replace, please leave blank)";
            $titd_vn = 'Title (VN)';
            $titd_en = 'Title (EN)';
            $titd_cn = 'Title (CN)';
            break;
        case "6":
            $tdd = 'Agencies';
            $titd_vn = 'Name of Agency (VN)';
            $titd_en = 'Name of Agency (EN)';
            $titd_cn = 'Name of Agency (CN)';
            break;
    }
    $quanly = "Add new information to ".$tdd;
    $s = $h->query("select max(sapxep) as sxs from h_thongtin where tt_id=$tt_id");
	$r = $h->fetch_array($s);
    $sx = $r['sxs'] + 1;
    
    if($tt_id!=6) { 
        if(isset($_FILES['video']['name']))	{

    		//if ((($_FILES["video"]["type"] == "image/gif") || ($_FILES["video"]["type"] == "image/jpeg") || ($_FILES["video"]["type"] == "image/pjpeg"))&& ($_FILES["video"]["size"] < 512000)) {
    			if($_FILES["video"]["error"]>0)	{
    				echo "";
    			}
    	
    			else
    	
    			{
    	
    				$path = "../upload/thongtin";
    	
    				$file_tmp = isset($_FILES['video']['tmp_name']) ? $_FILES['video']['tmp_name'] : "";
    	
    				$file_name = isset($_FILES['video']['name']) ? $_FILES['video']['name'] : "";
    	
    				$file_type = isset($_FILES['video']['type']) ? $_FILES['video']['type'] : "";
    	
    				$file_size = isset($_FILES['video']['size']) ? $_FILES['video']['size'] : "";
    	
    				$file_error = isset($_FILES['video']['error']) ? $_FILES['video']['error'] : "";
    	
    				move_uploaded_file($_FILES['video']['tmp_name'],$path."/".$_FILES['video']['name']);
    	
    			}
    		//}
    
    	}    
    }
    
	if(isset($_POST['luu']))
	{
        $data['tt_id'] = $tt_id;
	    $data['tieude_vn'] = str_replace("'","\'",$_POST['tieude_vn']);
        $data['tieude_en'] = str_replace("'","\'",$_POST['tieude_en']);
        $data['tieude_cn'] = str_replace("'","\'",$_POST['tieude_cn']);
        if($tt_id!=6) {
            $data['hinhanh'] = $_FILES['video']['name'];
            $data['title_vn'] = str_replace("'","\'",$_POST['title_vn']);
            $data['title_en'] = str_replace("'","\'",$_POST['title_en']);
            $data['title_cn'] = str_replace("'","\'",$_POST['title_cn']);
       		$data['mota_vn'] = str_replace("'","\'",$_POST['mota_vn']);
            $data['mota_en'] = str_replace("'","\'",$_POST['mota_en']);
            $data['mota_cn'] = str_replace("'","\'",$_POST['mota_cn']);
            $data['tukhoa_vn'] = str_replace("'","\'",$_POST['tukhoa_vn']);
            $data['tukhoa_en'] = str_replace("'","\'",$_POST['tukhoa_en']);
            $data['tukhoa_cn'] = str_replace("'","\'",$_POST['tukhoa_cn']);    
        } else {
            $data['mota_vn'] = str_replace("'","\'",$_POST['map']);
        }
	   	$data['noidung_vn'] = str_replace("'","\'",$_POST['noidung_vn']);
        $data['noidung_en'] = str_replace("'","\'",$_POST['noidung_en']);
        $data['noidung_cn'] = str_replace("'","\'",$_POST['noidung_cn']);
        
   		if($_POST['sapxep']==0 || $_POST['sapxep']=='') 
            $data['sapxep'] = $sx;
        else
            $data['sapxep'] = $_POST['sapxep'];
            
        if($_POST['hienthi']==1) $data['hienthi'] = 1;
		if($_POST['hienthi']==2) $data['hienthi'] = 0;
		$query = $h->insert($data,"h_thongtin");
		if($query) {
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Add successfully</p>";
			$s = $h->query("select max(sapxep) as sxs from h_thongtin where tt_id=$tt_id");
        	$r = $h->fetch_array($s);
            $sx = $r['sxs'] + 1;
		}
		else
			$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Error </p>".mysql_error();
	}
?>
<div class="lienhe">
	<p class="title"><?php echo $quanly?></p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return checkform();">
        <div>
			<label for="hoten"><?=$titd_vn?>:</label>
			<input type="text" name="tieude_vn" value="" size="67" />
		</div>
        <div>
			<label for="hoten"><?=$titd_en?>:</label>
			<input type="text" name="tieude_en" value="" size="67" />
		</div>
        <div>
			<label for="hoten"><?=$titd_cn?>:</label>
			<input type="text" name="tieude_cn" value="" size="67" />
		</div>
        <div>
			<label for="hoten">Order:</label>
			<input type="text" name="sapxep" value="<?php echo $sx?>" size="5" />
		</div>
        <?php
            if($tt_id!=6) {
        ?>
        <div>
            <label for="hinhanh">Image: </label>
            <input type="file" name="video"/>
            <p class="cachtrai"><?=$kt?></p>
        </div>
        <?php
            } else {
        ?>
        <div>
			<label for="hoten">Code Map:</label>
			<textarea id="map" name="map" cols="103" rows="8"></textarea>
		</div>
        <?php } ?>
        <div>
			<label for="hoten">Content (VN):</label>
			<textarea id="noidung_vn" name="noidung_vn" cols="67" rows="8"></textarea>
		</div>
        <div>
			<label for="hoten">Content (EN):</label>
			<textarea id="noidung_en" name="noidung_en" cols="67" rows="8"></textarea>
		</div>
        <div>
			<label for="hoten">Content (CN):</label>
			<textarea id="noidung_cn" name="noidung_cn" cols="67" rows="8"></textarea>
		</div>
        <div>
			<label for="hoten">Show / hide:</label>
			<span class="font13">
            Show: 
			<input type="radio" name="hienthi" id="web1" value="1" checked />&nbsp;Hide: 
			<input type="radio" name="hienthi" id="web2" value="2" /><br />
			</span>
		</div>
        <?php if($tt_id!=6){ ?>
        <div>
        	<label for="de">&nbsp;</label><span class="font13"><font color="#FF0000"><b>Information for SEO Website</b></font></span>
        </div>
        <div>
        	<label for="ti_w">Title Wesite (VN):</label>
            <input type="text" name="title_vn" value="" size="60" />
        </div>
        <div>
        	<label for="ti_w">Title Wesite (EN):</label>
            <input type="text" name="title_en" value="" size="60" />
        </div>
        <div>
        	<label for="ti_w">Title Wesite (CN):</label>
            <input type="text" name="title_cn" value="" size="60" />
        </div>
        <div>
        	<label for="des">Description (VN):</label>
            <textarea name="mota_vn" id="mota_vn" rows="4" cols="67"></textarea>
        </div>
        <div>
        	<label for="des">Description (EN):</label>
            <textarea name="mota_en" id="mota_en" rows="4" cols="67"></textarea>
        </div>
        <div>
        	<label for="des">Description (CN):</label>
            <textarea name="mota_cn" id="mota_cn" rows="4" cols="67"></textarea>
        </div>
        <div>
        	<label for="key">Keywords (VN):</label>
            <textarea name="tukhoa_vn" rows="4" cols="67"></textarea>
        </div>
        <div>
        	<label for="key">Keywords (EN):</label>
            <textarea name="tukhoa_en" rows="4" cols="67"></textarea>
        </div>
        <div>
        	<label for="key">Keywords (CN):</label>
            <textarea name="tukhoa_cn" rows="4" cols="67"></textarea>
        </div>
        <?php } ?>
        <div>
			<input type="submit" name="luu" value="Save" class="gui" />
			<input type="reset" name="reset" value="Reset" class="reset" />
		</div>
	</form>
</div>