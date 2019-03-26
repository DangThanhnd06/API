<!--<div id="right">-->
	<?php
		$act = $_REQUEST['act'];
		switch($act)
		{
			// cau hinh
			case "configuration":
				include("module/cauhinh.php");
				break;
			
			// html
			case "html":
				include("module/html.php");
				break;
			case "update_html":
				include("module/sua_html.php");
				break;
            
            // thongtin
			case "thongtin":
				include("module/thongtin.php");
				break;
            case "them_thongtin":
				include("module/them_thongtin.php");
				break;
			case "update_thongtin":
				include("module/sua_thongtin.php");
				break;
			
            // chuyenmuc
			case "cmsanpham":
				include("module/chuyenmuc.php");
				break;
			case "them_chuyenmuc":
				include("module/them_chuyenmuc.php");
				break;
			case "update_chuyenmuc":
				include("module/sua_chuyenmuc.php");
				break;
            
			// tintuc
			case "tintuc":
				include("module/news.php");
				break;
			case "them_tintuc":
				include("module/addnews.php");
				break;
			case "update_tintuc":
				include("module/editnews.php");
				break;
			
            // doitac
			case "doitac":
				include("module/doitac.php");
				break;
			case "them_doitac":
				include("module/them_doitac.php");
				break;
			case "update_doitac":
				include("module/sua_doitac.php");
				break;
            
            // pdf
			case "pdf":
				include("module/pdf.php");
				break;
			case "them_pdf":
				include("module/addpdf.php");
				break;
			case "update_pdf":
				include("module/editpdf.php");
				break;
            
            // user
			case "user":
				include("module/user.php");
				break;
			case "them_user":
				include("module/themuser.php");
				break;
			case "update_user":
				include("module/suauser.php");
				break;
				
			// ho tro
			case "hotro":
				include("module/hotro.php");
				break;
			case "them_hotro":
				include("module/themhotro.php");
				break;
				
			// lop day
			case "hinhchay":
				include("module/hinhchay.php");
				break;
			case "them_hinhchay":
				include("module/themhinhchay.php");
				break;
			case "update_hinhchay":
				include("module/sua_hinhchay.php");
				break;
                
            // cmt
            case "cmt":
				include("module/cmt.php");
				break;
			case "them_cmt":
				include("module/themcmt.php");
				break;
			case "update_cmt":
				include("module/editcmt.php");
				break;
                
            // reply
            case "reply":
				include("module/reply.php");
				break;
			case "them_reply":
				include("module/them_reply.php");
				break;
			case "update_reply":
				include("module/editreply.php");
				break;
    
            // don hang
			case "donhang":
				include("module/dondh.php");
				break;
			case "updateorder":
				include("module/suadondh.php");
				break;
            // hoc sinh
            case "hocsinh":
				include("module/hocsinh.php");
				break;
			case "them_hocsinh":
				include("module/them_hocsinh.php");
				break;
			case "update_hocsinh":
				include("module/sua_hocsinh.php");
				break;
            case "doiumhs":
				include("module/doimkhs.php");
				break;
                
            // ktda
            case "bangdiem":
				include("module/bangdiem.php");
				break;
			case "them_bangdiem":
				include("module/them_bangdiem.php");
				break;
			case "update_bangdiem":
				include("module/sua_bangdiem.php");
				break;
                
            // giao vien
            case "giaovien":
				include("module/giaovien.php");
				break;
			case "them_giaovien":
				include("module/them_giaovien.php");
				break;
			case "update_giaovien":
				include("module/sua_giaovien.php");
				break;
			case "doiumgv":
				include("module/doimkgv.php");
				break;
			
			
		}
	?>
<!--</div>-->