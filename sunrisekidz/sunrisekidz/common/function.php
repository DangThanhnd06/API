<?php
function GetFileExtention($filename) 
{  
    return strrchr($filename, ".");
}  

function CheckUpload($f,$ext="",$maxsize=0,$req=0)
{
	$fname=strtolower(basename($f['name']));
	$ftemp=$f["tmp_name"];
	$fsize=$f["size"];
	$fext=GetFileExtention($fname);
	if($fsize==0) 
	{
		if ($req!=0) return "B&#7841;n ch&#432;a ch&#7885;n file";
		return "";
	} 
	else
	{
		if ($ext!="") if (strpos($ext, $fext)===false) return "T&#7853;p tin không &#273;úng &#273;&#7883;nh d&#7841;ng : $fname";
		//if(($f["type"] != "image/gif" ) && ($f["type"] != "image/pjpeg")) return "&#272;&#7883;nh d&#7841;ng file không h&#7907;p l&#7879;";
		if ($maxsize>0) if ($fsize > $maxsize) return "Kích th&#432;&#7899;c hình ph&#7843;i nh&#7887; h&#417;n ".$maxsize." byte";
	}
	return "";
}

function MakeUpload($f,$newfile)
{
  if (move_uploaded_file($f["tmp_name"], $newfile))	return $newfile;
  return false;
}

function checkemail($email)
{
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) 
		return false;
	return true;
}
// check domain email exists
function checkemail_exist($email)
{
	list($userName, $mailDomain) = split("@", $email);
	if (checkdnsrr($mailDomain, "MX")) 
		return true;
	else 
		return false;
}
/*function sendmail($from,$to,$subject,$body)
{
	//return mail_smtp($from,$to,$subject,$body,1);
	
		$mailheaders = "MIME-Version: 1.0\r\n";
		$mailheaders .= "Content-type: text/html; charset=utf-8\r\n";
		$mailheaders .= "From: <".$from."> \n";
		$mailheaders .= "Reply-To: ".$from;
		return mail($to, $subject, $body, $mailheaders);
	
}*/

function mail_smtp($from,$to,$subject,$body,$html=0)
{
	require_once("smtp.php");

	/* Uncomment when using SASL authentication mechanisms */
	/*
	require("sasl.php");
	*/

	//$from=""; /* Change this to your address like "me@mydomain.com"; */
	//$to="";                        /* Change this to your test recipient address */

	$smtp=new smtp_class;

	$smtp->host_name="webhosting-vn.com";       /* Change this variable to the address of the SMTP server to relay, like "smtp.myisp.com" */
	$smtp->localhost="localhost";       /* Your computer address */
	$smtp->direct_delivery=0;           /* Set to 1 to deliver directly to the recepient SMTP server */
	$smtp->timeout=10;                  /* Set to the number of seconds wait for a successful connection to the SMTP server */
	$smtp->data_timeout=0;              /* Set to the number seconds wait for sending or retrieving data from the SMTP server.
	                                       Set to 0 to use the same defined in the timeout variable */
	$smtp->debug=1;                     /* Set to 1 to output the communication with the SMTP server */
	$smtp->html_debug=1;                /* Set to 1 to format the debug output as HTML */
	$smtp->pop3_auth_host="webhosting-vn.com";           /* Set to the POP3 authentication host if your SMTP server requires prior POP3 authentication */
	$smtp->user="client@webhosting-vn.com";                     /* Set to the user name if the server requires authetication */
	$smtp->realm="";                    /* Set to the authetication realm, usually the authentication user e-mail domain */
	$smtp->password="degoimail";                 /* Set to the authetication password */
	$smtp->workstation="";              /* Workstation name for NTLM authentication */
	$smtp->authentication_mechanism=""; /* Specify a SASL authentication method like LOGIN, PLAIN, CRAM-MD5, NTLM, etc..
	                                       Leave it empty to make the class negotiate if necessary */

	/*
	 * If you need to use the direct delivery mode and this is running under
	 * Windows or any other platform that does not have enabled the MX
	 * resolution function GetMXRR() , you need to include code that emulates
	 * that function so the class knows which SMTP server it should connect
	 * to deliver the message directly to the recipient SMTP server.
	 */
	if($smtp->direct_delivery)
	{
		if(!function_exists("GetMXRR"))
		{
			/*
			* If possible specify in this array the address of at least on local
			* DNS that may be queried from your network.
			*/
			$_NAMESERVERS=array();
			include("getmxrr.php");
		}
		/*
		* If GetMXRR function is available but it is not functional, to use
		* the direct delivery mode, you may use a replacement function.
		*/
		/*
		else
		{
			$_NAMESERVERS=array();
			if(count($_NAMESERVERS)==0)
				Unset($_NAMESERVERS);
			include("rrcompat.php");
			$smtp->getmxrr="_getmxrr";
		}
		*/
	}

	$header="";
	if ($html==0)
		$header=array(
			"From: $from",
			"To: $to",
			"Subject: $subject",
			"Date: ".strftime("%a, %d %b %Y %H:%M:%S %Z"));
	else
		$header=array(
			"MIME-Version: 1.0",
			"Content-type: text/html; charset=iso-8859-1",
			"From: $from",
			"To: $to",
			"Subject: $subject",
			"Date: ".strftime("%a, %d %b %Y %H:%M:%S %Z"));
	$ret=$smtp->SendMessage($from,array($to),$header,$body);
	return $ret;
}

function insert($table,$fields_arr) {
  global $con;
  if (!$con) { return false; }
  $strfields="";
  $strvalues="";
  list($key, $val) = each($fields_arr);
  if(is_string($key))
	{
	$strfields = " ($key";
	$strvalues= $val;
	while(list($key, $val) = each($fields_arr))
		{
		$strfields.= ", $key";
		$strvalues.= ",". $val;
		}
	$strfields.=")";
	}
  else
	{
	$strvalues=$fields_arr[0];
    for($i=1;$i<count($fields_arr);$i++)
		{
	      $strvalues .= ", $fields_arr[$i]";
		}
  	}

  $query = "INSERT INTO $table $strfields VALUES ($strvalues)";
  //echo $query;exit(0);
  return mysql_query($query, $con);
}

function update($table,$fields_arr,$where=" 1=1 ",$ischangepassword = 0) {
  global $con;
  if (!$con) { return false; }
  list($key, $val) = each($fields_arr);
  $strset=" $key = $val";
  while(list($key, $val) = each($fields_arr)){
    $strset .= ", $key = $val";
  }
	//	echo $table."<br>";
	//	echo $strset."<br>";
	//	echo $where."<br>";exit();
  $query = "UPDATE $table SET
            $strset
           WHERE $where"; 
  //echo $query."<br>";exit();
  $result = mysql_query($query, $con);
  if (!$result) { return false; }
  else 
  	if($ischangepassword ==1 && mysql_affected_rows() == 0) return false;
	 else return true;
}

function delete_rows($table,$fields_arr,$where_ext="") {
  global $con;
  if (!$con) { return false; }
  if(count($fields_arr)>0){
     list($key, $val) = each($fields_arr);
     $strwhere=" $key = $val";
     while(list($key, $val) = each($fields_arr)){
       $strwhere .= "OR $key = $val";
     }
  }

  $query = "DELETE FROM $table
            WHERE $strwhere $where_ext";      
	#echo $query;#exit;
  $result = mysql_query($query, $con);
  if (!$result) {
    return false;
  }
  return true;
}

/*function CountRecord($table,$where_ext = ""){
  global $con;
  if (!$con) { return false; }
  $query = "SELECT count(*) FROM $table ";
  if($where_ext != "")
	  $query.= " WHERE " . $where_ext;
  //echo $query,"<br>"; 
  $result = mysql_query($query, $con);
  if ($result) {
    $rows = mysql_fetch_row($result);
    return $rows[0];
  } else {
    return false;
  }

}*/

function query_get($query) {
  global $con;
  if (!$con) { return false; }
  $result = mysql_query($query, $con);
  if ($result) {
    while ($rows = mysql_fetch_array($result)) {
      $return[] = $rows;
    }
    return $return;
  } else {
    return false;
  }
}

function query_get_list($query, $begin, $limit,$where_ext="",$orderby="") {
  global $con;
  if (!$con) { return false; }
  $return=array();
  $query1 = $query;
  if($where_ext<>"")
	$query1 .= " WHERE " .$where_ext;
  
  $query1.= $orderby;

  if($begin >=0 && $limit > 0)
	 $query1 .=" LIMIT $begin, $limit ";
echo $quety1;
  $result = mysql_query($query1, $con);
  if ($result) {
    while ($rows = mysql_fetch_array($result)) {
      $return[] = $rows;
    }

    return $return;
  } else {
    return false;
  }
}

// chuyen chuoi ki tu co dau sang chuoi ki tu khong dau
function change($text) {
   
    $chars = array("a","a","e","e","o","o","u","u","i","i","d","d","y","y","","-","-","","","","","","","","","","","","","","","","","","","","","-","","-",""," "," ");
   
    $uni[0] = array("á","à","ạ","ả","ã","â","ấ","ầ", "ậ","ẩ","ẫ","ă","ắ","ằ","ặ","ẳ","ẵ");
    $uni[1] = array("Á","À","Ạ","Ả","Ã","Â","Ấ","Ầ", "Ậ","Ẩ","Ẫ","Ă","Ắ","Ằ","Ặ","Ẳ","Ẵ");
    $uni[2] = array("é","è","ẹ","ẻ","ẽ","ê","ế","ề" ,"ệ","ể","ễ");
    $uni[3] = array("É","È","Ẹ","Ẻ","Ẽ","Ê","Ế","Ề" ,"Ệ","Ể","Ễ");
    $uni[4] = array("ó","ò","ọ","ỏ","õ","ô","ố","ồ", "ộ","ổ","ỗ","ơ","ớ","ờ","ợ","ở","ỡ");
    $uni[5] = array("Ó","Ò","Ọ","Ỏ","Õ","Ô","Ố","Ồ", "Ộ","Ổ","Ỗ","Ơ","Ớ","Ờ","Ợ","Ở","Ỡ");
    $uni[6] = array("ú","ù","ụ","ủ","ũ","ư","ứ","ừ", "ự","ử","ữ");
    $uni[7] = array("Ú","Ù","Ụ","Ủ","Ũ","Ư","Ứ","Ừ", "Ự","Ử","Ữ");
    $uni[8] = array("í","ì","ị","ỉ","ĩ");
    $uni[9] = array("Í","Ì","Ị","Ỉ","Ĩ");
    $uni[10] = array("đ");
    $uni[11] = array("Đ");
    $uni[12] = array("ý","ỳ","ỵ","ỷ","ỹ");
    $uni[13] = array("Ý","Ỳ","Ỵ","Ỷ","Ỹ");
	$uni[14] = array("%");
	$uni[15] = array("+");
	$uni[16] = array(",");
	$uni[17] = array(";");
	$uni[18] = array("'");
   	$uni[19] = array('"');
	$uni[20] = array("!");
	$uni[21] = array("@");
	$uni[22] = array("#");
	$uni[23] = array("$");
	$uni[24] = array("^");
	$uni[25] = array("&");
	$uni[26] = array("*");
	$uni[27] = array("(");
	$uni[28] = array(")");
	$uni[29] = array("_");
	$uni[30] = array("-");
	$uni[31] = array("=");
	$uni[32] = array("|");
	$uni[33] = array("[");
	$uni[34] = array("]");
	$uni[35] = array("{");
	$uni[36] = array("}");
	$uni[37] = array(":");
	$uni[38] = array("<");
	$uni[39] = array(">");
	$uni[40] = array(".");
	$uni[41] = array("?");
	$uni[42] = array("  ");
    for($i=0; $i<=43; $i++) {
        $text = str_replace($uni[$i],$chars[$i],$text);
    }

    return $text;
}
function thaykitu($tu,$kituthay)
{
	//
	for($i=0;$i<strlen($tu);$i++)
	{
		if($tu[$i]==$kituthay)
		{
			if($i>0 && $i<strlen($tu)-1)
			{
				$tu1 = explode($kituthay,$tu[$i]);
				$roi .= $tu1[0]."-".$tu1[1];
			}
			else
				$roi .= "";
		}
		else
			$roi .= $tu[$i];
	}
	return $roi;
}
function chuoilink($text) 
{
	$text_chane = addslashes(change(trim($text)));
	$mang = explode(" ",$text_chane);
	$title = "";
	for($i=0;$i<count($mang);$i++)
	{
		if(!strpos($mang[$i],"/") && !strrchr($mang[$i],"/"))
		{
			if($i<count($mang)-1)
					$title .= $mang[$i]."-";
			else
					$title .= $mang[$i];
		}
		else
		{
			if($i<count($mang)-1)
				$title .= thaykitu($mang[$i],"/")."-";
			else
				$title .= thaykitu($mang[$i],"/");
		}
	}
	$title = strtolower($title);
	return $title;
}
// chuoi anh
function change2($text) {
   
    $chars = array("a","a","e","e","o","o","u","u","i","i","d","d","y","y","","-","-","","","","","","","","","","","","","","","","","","","","","-","","-"," "," ");
   
    $uni[0] = array("á","à","ạ","ả","ã","â","ấ","ầ", "ậ","ẩ","ẫ","ă","ắ","ằ","ặ","ẳ","ẵ");
    $uni[1] = array("Á","À","Ạ","Ả","Ã","Â","Ấ","Ầ", "Ậ","Ẩ","Ẫ","Ă","Ắ","Ằ","Ặ","Ẳ","Ẵ");
    $uni[2] = array("é","è","ẹ","ẻ","ẽ","ê","ế","ề" ,"ệ","ể","ễ");
    $uni[3] = array("É","È","Ẹ","Ẻ","Ẽ","Ê","Ế","Ề" ,"Ệ","Ể","Ễ");
    $uni[4] = array("ó","ò","ọ","ỏ","õ","ô","ố","ồ", "ộ","ổ","ỗ","ơ","ớ","ờ","ợ","ở","ỡ");
    $uni[5] = array("Ó","Ò","Ọ","Ỏ","Õ","Ô","Ố","Ồ", "Ộ","Ổ","Ỗ","Ơ","Ớ","Ờ","Ợ","Ở","Ỡ");
    $uni[6] = array("ú","ù","ụ","ủ","ũ","ư","ứ","ừ", "ự","ử","ữ");
    $uni[7] = array("Ú","Ù","Ụ","Ủ","Ũ","Ư","Ứ","Ừ", "Ự","Ử","Ữ");
    $uni[8] = array("í","ì","ị","ỉ","ĩ");
    $uni[9] = array("Í","Ì","Ị","Ỉ","Ĩ");
    $uni[10] = array("đ");
    $uni[11] = array("Đ");
    $uni[12] = array("ý","ỳ","ỵ","ỷ","ỹ");
    $uni[13] = array("Ý","Ỳ","Ỵ","Ỷ","Ỹ");
	$uni[14] = array("%");
	$uni[15] = array("+");
	$uni[16] = array(",");
	$uni[17] = array(";");
	$uni[18] = array("'");
   	$uni[19] = array('"');
	$uni[20] = array("!");
	$uni[21] = array("@");
	$uni[22] = array("#");
	$uni[23] = array("$");
	$uni[24] = array("^");
	$uni[25] = array("&");
	$uni[26] = array("*");
	$uni[27] = array("(");
	$uni[28] = array(")");
	$uni[29] = array("_");
	$uni[30] = array("-");
	$uni[31] = array("=");
	$uni[32] = array("|");
	$uni[33] = array("[");
	$uni[34] = array("]");
	$uni[35] = array("{");
	$uni[36] = array("}");
	$uni[37] = array(":");
	$uni[38] = array("<");
	$uni[39] = array(">");
	$uni[40] = array("?");
	$uni[41] = array("  ");
    for($i=0; $i<=42; $i++) {
        $text = str_replace($uni[$i],$chars[$i],$text);
    }

    return $text;
}
function chuoianh($text) 
{
	$text_chane = addslashes(change2(trim($text)));
	$mang = explode(" ",$text_chane);
	$title = "";
	for($i=0;$i<count($mang);$i++)
	{
		if(!strpos($mang[$i],"/") && !strrchr($mang[$i],"/"))
		{
			if($i<count($mang)-1)
					$title .= $mang[$i]."-";
			else
					$title .= $mang[$i];
		}
		else
		{
			if($i<count($mang)-1)
				$title .= thaykitu($mang[$i],"/")."-";
			else
				$title .= thaykitu($mang[$i],"/");
		}
	}
	$title = strtolower($title);
	return $title;
}
// --- end chuoi anh
function catchuoi($chuoi,$gioihan)
	{
    // nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
    // thì không thay đổi chuỗi ban đầu
		if(strlen($chuoi)<=$gioihan)
		{
			return $chuoi;
		}
		else{
			/* 
			so sánh vị trí cắt 
			với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
			nếu vị trí khoảng trắng lớn hơn
			thì cắt chuỗi tại vị trí khoảng trắng đó
			*/
			if(strpos($chuoi," ",$gioihan) > $gioihan){
				$new_gioihan=strpos($chuoi," ",$gioihan);
				$new_chuoi = substr($chuoi,0,$new_gioihan)." ...";
				return $new_chuoi;
			}
			// trường hợp còn lại không ảnh hưởng tới kết quả
			$new_chuoi = substr($chuoi,0,$gioihan)."...";
			return strip_tags($new_chuoi);
		}
	}
//removes string from the end of other
function removeFromEnd($string, $stringToRemove) 
{
    $stringToRemoveLen = strlen($stringToRemove);
    $stringLen = strlen($string);
    
    $pos = $stringLen - $stringToRemoveLen;

    $out = substr($string, 0, $pos);

    return $out;
}
function redirect($url,$second)
{
	if ($url)
		echo '<meta http-equiv="REFRESH" content="'.$second.';url='.$url.'" />';
}
function location($url) {
?>
<script type="text/javascript">
window.location = "<?=$url?>";
</script>
<?php }
///////////////////////////////////////////////////////////////////////////
// SHOW MESSAGE
///////////////////////////////////////////////////////////////////////////

function message($msg,$type)
{
	global $lang;

	switch ($type)
	{
		case "info":
		default:
			$message = '<div class="msg_info">'.$msg.'</div>';
		break;
		case "error":
			$message = '<div class="msg_error">'.$msg.'</div>';
		break;
	}
	return $message;
}
///////////////////////////////////////////////////////////////////////////
// UPLOAD FILES
// Return: upload_process (true/false), upload_file_name (text)
///////////////////////////////////////////////////////////////////////////
function upload_file($file_rsc,$upload_folder,$allow_type,$allow_size)
{
	global $upload_file_name;
	$upload_process = true;
	$file_name = $file_rsc["name"];
	if($file_name)
	{
		$file_size = $file_rsc["size"];
		$name = substr(strtolower($file_name),0,strlen($file_name)-4);
		$ext = substr(strtolower($file_name),-3);
		// Check file type 
		if(!eregi(strtolower($ext),$allow_type))
		{
			echo  message(sprintf("Bạn chỉ được upload file ",$allow_type),'error');
			$upload_process = false;
		}
		// Check file size 
		elseif($file_size > $allow_size*1024)
		{
			echo  message(sprintf("Bạn upload file size: ",$allow_size),'error');
			$upload_process = false;
		}
		else
		{
			$upload_file_name = $name.'_'.time().".".$ext;
			// Upload
			if (!copy($file_rsc['tmp_name'],$upload_folder.$upload_file_name)) 
			{
				echo message("Lỗi upload: ",'error');
				$upload_process = false;
			}
		}
	}
	return $upload_process;
}
function mahoa($p) {
	$mk = "#*@".$p."#@*";
	$pass = md5($mk);
	$p1 = substr($pass,2,17);
	$pass1 = md5($p1);
	$p2 = substr($pass1,4,13);
	$pass2 = md5($p2);
	$p3 = substr($pass2,8,19)."!@#$";
	$pass3 = md5($p3);
	$p4 = substr($pass3,5,16);
	$pass4 = md5($p4);
	$password = $pass4.":".substr($pass3,3,20)."#$*@!";
	return $password;
}
function taotrang($sql,$link,$nitem,$itemcurrent)
{	
	$ret="";
	$result = mysql_query($sql) or die('Error' . mysql_error());
	$value = mysql_fetch_array($result);
	//$plus = (($value['cnt'] % $nitem)>0);
	for ($i=0;$i<($value[0] / $nitem);$i++)
	{
		if ($i<>$itemcurrent) $ret .= "<a href=\"".$link.$i."\" class=\"lslink\">".($i+1)."</a> ";
		else $ret .= ($i+1)." ";
	}
	return $ret;
}
function getExt($filename){
		return $ext = strtolower(substr(strrchr($filename,'.'),1));
}
// upload_image_slide
function upload_image_no_thumb($path){
		//for($i=0; $i<5; $i++){
			$fileupload = time().'_'.$_FILES['img']['name'];
			$path_image = $path.$fileupload;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif','mp3');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'],$path_image);
				}
				else{
					echo 'File khong hop le';
				}
			}
		//}
	}
// upload_image_slide
function upload_image_slide($w,$h){
		//for($i=0; $i<5; $i++){
			$fileupload = time().'_'.$_FILES['img']['name'];
			$path_thub = '../media/thumbs/slide/';
			$path_image = '../media/images/slide/'.$fileupload;
			$max_width = $w;
			$max_height = $h;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = time().'_'.$_FILES['img']['name'];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		//}
	}

// upload_image_album
function upload_image_album($w,$h){
		//for($i=0; $i<5; $i++){
			$fileupload = time().'_'.$_FILES['img']['name'];
			$path_thub = '../media/thumbs/album/';
			$path_image = '../media/images/album/'.$fileupload;
			$max_width = $w;
			$max_height = $h;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = time().'_'.$_FILES['img']['name'];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		//}
	}
// upload_image_news
function upload_image_news($w,$h){
		//for($i=0; $i<5; $i++){
			$fileupload = time().'_'.$_FILES['img']['name'];
			$path_thub = '../media/thumbs/news/';
			$path_image = '../media/images/news/'.$fileupload;
			$max_width = $w;
			$max_height = $h;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = time().'_'.$_FILES['img']['name'];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		//}
	}
function upload_image1($w,$h){
		//for($i=0; $i<5; $i++){
			$$fileupload = time().'_'.$_FILES['img']['name'];
			$path_thub = '../upload/thumbs/';
			$path_image = '../upload/images/'.$fileupload;
			$max_width = $w;
			$max_height = $h;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = 'thumb_'.time().'_'.$_FILES['img']['name'];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		//}
	}
function upload_image2($w,$h){
		//for($i=0; $i<5; $i++){
			$fileupload = time().'_'.$_FILES['img']['name'];
			$path_thub = '../upload/slide/thumb/';
			$path_image = '../upload/slide/'.$fileupload;			
			$max_width = $w;
			$max_height = $h;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = time().'_'.$_FILES['img']['name'];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		//}
	}
function upload_image4(){
		//for($i=0; $i<5; $i++){
			$fileupload = $_FILES['img']['name'];
			$path_thub = '../thumb_image/';
			$path_image = '../upload/'.$fileupload;
			$max_width = 150;
			$max_height = 113;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = $_FILES['img']['name'];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		//}
	}
function upload_image5($n){
		for($i=0; $i<$n; $i++){
			$fileupload = $_FILES['img']['name'][$i];
			$path_thub = '../upload/slide/thumb/';
			$path_image = '../upload/slide/'.$fileupload;
			$max_width = 261;
			$max_height = 235;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'][$i],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = $_FILES['img']['name'][$i];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		}
	}
function upload_image6($n){
		for($i=0; $i<$n; $i++){
			$fileupload = $_FILES['img']['name'][$i];
			$path_thub = '../thumb_image/';
			$path_image = '../upload/'.$fileupload;
			$max_width = 150;
			$max_height = 113;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'][$i],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = $_FILES['img']['name'][$i];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		}
	}
function upload_image12($w,$h){
		//for($i=0; $i<5; $i++){
			$fileupload = $_FILES['imgtc']['name'];
			$path_thub = '../upload/thumbs/';
			$path_image = '../upload/images/'.$fileupload;
			$max_width = $w;
			$max_height = $h;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['imgtc']['tmp_name'],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = $_FILES['imgtc']['name'];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		//}
	}
function upload_image13($w,$h){
		//for($i=0; $i<5; $i++){
			$fileupload = $_FILES['imgsp']['name'];
			$path_thub = '../upload/thumbs/';
			$path_image = '../upload/images/'.$fileupload;
			$max_width = $w;
			$max_height = $h;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['imgsp']['tmp_name'],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = $_FILES['imgsp']['name'];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		//}
	}
function upload_image11($n,$max_width,$max_height,$ttb){
		for($i=0; $i<$n; $i++){
			$fileupload = $_FILES['img']['name'][$i];
			$path_thub = '../thumb_image/';
			$path_image = '../upload/'.$fileupload;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'][$i],$path_image);
					list($width,$height) = getimagesize($path_image);
									//ki?m tra n?u file upload nh? hon kích thu?c quy d?nh thì l?y kích thu?c cu.
					if($width < $max_width && $height < $max_height){
						$new_width = $width;
						$new_height = $height;
					}else{
						$sx = $width/$max_width;
						$sy = $height/$max_height;
											//resize theo t? l?.
						if ($width > $height) {
							$new_height = round($height/$sx, 0);
							$new_width = $max_width;
						} else {
							$new_width = round($width/$sy, 0);
							$new_height = $max_height;
						}
					}
					$image_thub = imagecreatetruecolor($new_width,$new_height);
					switch($ext){
						case 'jpg':
						case 'jpeg':
							$image = imagecreatefromjpeg($path_image);
						break;	
						case 'png':
							$image = imagecreatefrompng($path_image);
						break;
						case 'gif':
							$image = imagecreatefromgif($path_image);
						break;
						default:
							$image = imagecreatefromjpeg($path_image);
						break;
					}
					imagecopyresampled($image_thub,$image,0,0,0,0,$new_width,$new_height,$width,$height);
					$thumb_file = $ttb.$_FILES['img']['name'][$i];
					$tmp_content = imagejpeg($image_thub, $path_thub.$thumb_file, 100);
				}
				else{
					echo 'File khong hop le';
				}
			}
		}
	}
function upload_image3(){
		//for($i=0; $i<5; $i++){
			$fileupload = $_FILES['img']['name'];
			$path_thub = '../thumb_image/';
			$path_image = '../upload/'.$fileupload;
			$max_width = 150;
			$max_height = 113;
			if(trim($fileupload) != '' ){
				$ext = getExt($fileupload);
				$ext_upload = array('jpg','jpeg','png','bmp','gif');
				if(in_array($ext,$ext_upload)){
					move_uploaded_file($_FILES['img']['tmp_name'],$path_image);
				}
				else{
					echo 'File khong hop le';
				}
			}
		//}
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

//HAM NAY LOAI BO CAC LENH INJECTION
function killInjection($str){
	$bad = array("'","\\","=",":");
	$good = str_replace($bad,"", $str);
	return $good;
}
?>