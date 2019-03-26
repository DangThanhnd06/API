<?php
#function included every pages
class mysql 
{
	// Define Variables
	var $errno;
	var $error;
	var $error_msg;
	var $link;
	var $sql;
	var $query;
	/*==========================*\
	|| Error Handling Functions ||
	\*==========================*/
	// Get Errors
	function getError()
	{
		if(empty($this->error))
		{
			$this->errno = mysql_errno();
			$this->error = mysql_error();
		}
		return $this->error.' (code:'.$this->errno.')';
	}
	// Print Error Message
	function printError($msg1,$msg2)
	{
		printf("<b>ERROR! </b> %s<br/><i>%s</i>", $msg1,$msg2);
		exit;
	}

 	// PHP Equivalent: mysql_connect
	function connect($host, $user, $pass, $db)
	{
		$this->link = @mysql_connect($host, $user, $pass);
		if(!$this->link)
		{
			$this->errno = 0;
			$this->error = "Connection failed to " . $host . ".";
			$this->error_msg = $this->errno . ": " . $this->error;
			return $this->printError($this->error_msg,0);
		}
		elseif(!@mysql_select_db($db, $this->link))
		{
			$this->errno = mysql_errno();
			$this->error = mysql_error();
			$this->error_msg = $this->printError($this->getError(),0);
			return $this->error_msg;
		}
		else
		{
			return $this->link;
		}
	}
	
	function close()
	{
		mysql_close($this->link);
	}
	function query($sql)
	{
		$query = @mysql_query($sql);
		if(!$query)
		{
			$this->error_msg = $this->printError($this->getError(),$sql);
			return $this->error_msg;
		}
		else
		{
			return $query;
		}
	}
	function affected_rows()
	{
		return mysql_affected_rows($this->link);
	}
	
	function escape_string($string)
	{
		return mysql_escape_string($string);
	}
	function fetch_array($query)
	{
		return mysql_fetch_array($query);
	}
	function fetch_field($query, $offset)
	{
		$query = mysql_fetch_field($query, $offset);
		if(!$query)
		{
			$this->errno = 0;
			$this->error = "No information available!";
			$this->error_msg = $this->errno . ": " . $this->error;
			return $this->printError($this->error_msg,0);
		}
		else
		{
			return $query;
		}
	}
	
	function fetch_row($query)
	{
		return mysql_fetch_row($query);
	}
	
	function fetch_assoc($query)
	{
		return mysql_fetch_assoc($query);
	}
	
	function field_name($query, $offset)
	{
		return mysql_field_name($query, $offset);
	}
	
	function free_result($query)
	{
		mysql_free_result($query);
	}
	
	function list_fields($db_name,$table_name)
	{
		mysql_list_fields($db_name,$table_name);
	}

	function insert_id()
	{
		return mysql_insert_id();
	}

	function num_fields($query)
	{
		return mysql_num_fields($query);
	}
	
	function num_rows($query)
	{
		return mysql_num_rows($query);
	}

	function real_escape_string($string)
	{
		return mysql_real_escape_string($string, $this->link);
	}

	function result($query,$x,$field)
	{
		return @mysql_result($query,$x, $field);
	}

	function result_array($query,$x,$string_field)
	{
		$string_array = explode(",",$string_field);
		foreach ($string_array as $string_id=>$string_value)
		{
			$result[$string_value] = $this->result($query,$x,$string_value);
		}
		return $result;
	}
	
	function insert($data = array(),$table){
		$key = "";
		$value = "";
		foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . str_replace("'","\'",trim($v))  ."'";
		}
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$sql = "insert into ".$table.$key." values ".$value;
		$query = $this->query($sql);
		return $query;
	}
	
	function update($data = array(),$table,$where=""){
		$values = "";
		foreach($data as $k => $v){
			$values .= ", " . $k . " = '" . str_replace("'","\'",trim($v))  ."' ";
		}
		if($values{0} == ",") $values{0} = " ";
		$sql = "update " . $table . " set " . $values.$where;
		$query = $this->query($sql);
		return $query;
	}
	
	function delete($table,$where){
		$sql = "delete from " . $table . $where;
		$query = $this->query($sql);
		return $query;
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
		
	// user
	function them_user($user,$tenuser,$p,$nhomqt,$kichhoat) {
		$pass = mahoa($p);
		$query = @mysql_query("insert into h_admin values('NULL','$user','$tenuser','$pass','$nhomqt','',$kichhoat)");
		return $query;
	}
	function sua_user($id,$user,$tenuser,$p,$nhomqt,$kichhoat) {
		$pass = mahoa($p);
		$query = @mysql_query("update h_admin set user='$user',tenuser='$tenuser',pass='$pass',nhomqt='$nhomqt',kichhoat='$kichhoat' where id=$id");
		return $query;
	}
	function xoa_user($id) {
		$query = @mysql_query("delete from h_admin where id=$id");
		return $query;
	}
	
	// cau hinh
	function sua_cauhinh($tieude,$mota,$tukhoa) {
		$query = @mysql_query("update h_cauhinh set tieude='$tieude',mota='$mota',tukhoa='$tukhoa'");
		return $query;
	}
	
	// sua html 
	function sua_html($id,$hinhanh,$hinhgia,$tieude,$noidung,$alt) {
		$query = @mysql_query("update h_html set hinhanh='$hinhanh',hinhgia='$hinhgia',tieude='$tieude',noidung='$noidung',alt='$alt' where id='$id' ");
		return $query;
	}
	
	
}
?>