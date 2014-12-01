<?php
	include_once __DIR__ . '/../inc/_all.php';
/**
 * 
 */
class Food_Types {
	
	public static function Blank()
	{
		return array('id'=>null,'Name'=>null);
	}
	
	public static function Get($id=null)
	{
		$sql = "	SELECT * FROM 2014Fall_Food_Types
		";
		if($id){
			$sql .= " WHERE id=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
	}
	
		static public function Save(&$row)
		{
			$conn = GetConnection();
			
			$row2 = escape_all($row, $conn);
			if (!empty($row['id'])) {
				$sql = "Update 2014Fall_Food_Types
							Set Name='$row2[Name]'
						WHERE id = $row2[id]
						";
			}else{
				$sql = "INSERT INTO 2014Fall_Food_Types
						(Name, created_at)
						VALUES ('$row2[Name]', Now() ) ";				
			}
			
			
			//my_print( $sql );
			
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
			$sql = "DELETE FROM 2014Fall_Food_Types WHERE id = $id";
			//echo $sql;
			$results = $conn->query($sql);
			$error = $conn->error;
			$conn->close();
			
			return $error ? array ('sql error' => $error) : false;
		}
		
		static public function Validate($row)
		{
			$errors = array();
			if(strlen($row['Name']) > 40) $errors['Name'] = "must be less than 40 charecters";
			if(empty($row['Name'])) $errors['Name'] = "is required";
			
			return count($errors) > 0 ? $errors : false ;
		}
}

	