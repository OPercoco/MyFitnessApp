<?php
	include_once __DIR__ . '/../inc/_all.php';
/**
 * 
 */
class Exercise {
	
	public static function Blank()
	{
		return array('id'=>null,'Name'=>null,'Area'=>null,'Intensity'=>null,'Duration'=>null,'Time'=>date(strtotime('tomorrow')));
	}
	
	public static function Get($id=null)
	{
		$sql = "	SELECT * FROM 2014Fall_Exercise
						
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
		$sql = "	SELECT * FROM 2014Fall_Exercise
		
		";
		return FetchAll($sql);			
	}
	
		static public function Save(&$row)
		{
			$conn = GetConnection();
			
			$row2 = escape_all($row, $conn);
			$row2['Time'] = date( 'Y-m-d H:i:s', strtotime( $row2['Time'] ) );
			if (!empty($row['id'])) {
				$sql = "Update 2014Fall_Exercise
							Set Name='$row2[Name]',  Area='$row2[Area]',
								Intensity='$row2[Intensity]', Duration='$row2[Duration]'
						WHERE id = $row2[id]
						";
			}else{
				$sql = "INSERT INTO 2014Fall_Exercise
						(Name, Area, Intensity, Duration, Time, created)
						VALUES ('$row2[Name]',  '$row2[Area]', '$row2[Intensity]', '$row2[Duration]', Now(), Now()) ";				
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
			$sql = "DELETE FROM 2014Fall_Exercise WHERE id = $id";
			//echo $sql;
			$results = $conn->query($sql);
			$error = $conn->error;
			$conn->close();
			
			return $error ? array ('sql error' => $error) : false;
		}
		
		static public function Validate($row)
		{
			$errors = array();
			if(empty($row['Name'])) $errors['Name'] = "is required";
			if(empty($row['Area'])) $errors['Area'] = "is required";
			
			
			return count($errors) > 0 ? $errors : false ;
		}
}
?>
	