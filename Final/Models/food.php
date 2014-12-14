<?php
	include_once __DIR__ . '/../inc/_all.php';
/**
 * 
 */
class Food {
	
	public static function Blank()
	{
		return array('id'=>null,'Name'=>null,'Calories'=>null,'Protein'=>null,'Meal'=>null,'Time'=>date(strtotime('tomorrow')));
	}
	
	public static function Get($id=null)
	{
		$sql = "	SELECT * FROM 2014Fall_Food_Eaten
						
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
		$sql = "	SELECT * FROM 2014Fall_Food_Eaten
		
		";
		return FetchAll($sql);			
	}
	
		static public function Save(&$row)
		{
			$conn = GetConnection();
			
			$row2 = escape_all($row, $conn);
			$row2['Time'] = date( 'Y-m-d H:i:s', strtotime( $row2['Time'] ) );
			if (!empty($row['id'])) {
				$sql = "Update 2014Fall_Food_Eaten
							Set Name='$row2[Name]',  Calories='$row2[Calories]',
								Protein='$row2[Protein]', Meal='$row2[Meal]'
						WHERE id = $row2[id]
						";
			}else{
				$sql = "INSERT INTO 2014Fall_Food_Eaten
						(Name, Calories, Protein, Meal, Time, created)
						VALUES ('$row2[Name]',  '$row2[Calories]', '$row2[Protein]', '$row2[Meal]', Now(), Now()) ";				
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
			$sql = "DELETE FROM 2014Fall_Food_Eaten WHERE id = $id";
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
			if(empty($row['Calories'])) $errors['Calories'] = "is required";
			
			
			return count($errors) > 0 ? $errors : false ;
		}
}
?>
	