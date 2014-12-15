<?php
	include_once __DIR__ . '/../inc/_all.php';
/**
 * 
 */
class Register {
	
	public static function Blank()
	{
		return array('id'=>null,'First_Name'=>null,'Last_Name'=>null,'Age'=>null,'Weight'=>null,'Time'=>date(strtotime('tomorrow')));
	}
	
	public static function Get($id=null)
	{
		$sql = "	SELECT * FROM 2014Fall_Users
						
		";
		if($id){
			$sql .= " WHERE id=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
	}
	public static function Search($q)
	{
		$sql = "	SELECT * FROM 2014Fall_Users
		
		";
		return FetchAll($sql);			
	}
	
		static public function Save(&$row)
		{
			$conn = GetConnection();
			
			$row2 = escape_all($row, $conn);
			$row2['Time'] = date( 'Y-m-d H:i:s', strtotime( $row2['Time'] ) );
			if (!empty($row['id'])) {
				$sql = "Update 2014Fall_Users
							Set First_Name='$row2[First_Name]',  Last_Name='$row2[Last_Name]',
								Age='$row2[Age]', Weight='$row2[Weight]', Weight='$row2[Experience]'
						WHERE id = $row2[id]
						";
			}else{
				$sql = "INSERT INTO 2014Fall_Users
						(First_Name, Last_Name, Age, Weight, Time, Experience)
						VALUES ('$row2[First_Name]',  '$row2[Last_Name]', '$row2[Age]', '$row2[Weight]', '$row2[Experience]') ";				
			}
			
			
			my_print( $sql );
			
			$results = $conn->query($sql);
			$error = $conn->error;
			
			if(!$error && empty($row['id'])){
				$row['id'] = $conn->insert_id;
			}
			
			$conn->close();
			
			return $error ? array ('sql error' => $error) : false;
		}
		
		static public function Delete($id)
		{
			$conn = GetConnection();
			$sql = "DELETE FROM 2014Fall_Users WHERE id = $id";
			//echo $sql;
			$results = $conn->query($sql);
			$error = $conn->error;
			$conn->close();
			
			return $error ? array ('sql error' => $error) : false;
		}
		
		static public function Validate($row)
		{
			$errors = array();
			if(empty($row['First_Name'])) $errors['First_Name'] = "is required";
			if(empty($row['Last_Name'])) $errors['Last_Name'] = "is required";
			
			
			return count($errors) > 0 ? $errors : false ;
		}
}
?>
	