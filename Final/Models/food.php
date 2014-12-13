<?php
	include_once __DIR__ . '/../inc/_all.php';
/**
 * 
 */
class Food {
	
	public static function Blank()
	{
		return array('id'=>null,'Name'=>null,'Calories'=>null,'Fat'=>null,'Carbs'=>null,'Fiber'=>null,'Time'=>date(strtotime('tomorrow')));
	}
	
	public static function Get($id=null)
	{
		$sql = "	SELECT E.*, T.Name as T_Name
					FROM 2014Fall_Food_Eaten E
						Join 2014Fall_Food_Types T ON E.Type_id = T.id 
		";
		if($id){
			$sql .= " WHERE E.id=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
	}
	public static function Search($q)
	{
		$sql = "	SELECT E.*, T.Name as T_Name
					FROM 2014Fall_Food_Eaten E
						Join 2014Fall_Food_Types T ON E.Type_id = T.id
					WHERE E.Name LIKE '%$q%'
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
							Set Name='$row2[Name]', Type_id='$row2[Type_id]', Calories='$row2[Calories]',
								Protein='$row2[Protein]', Meal='$row2[Meal]'
						WHERE id = $row2[id]
						";
			}else{
				$sql = "INSERT INTO 2014Fall_Food_Eaten
						(Name, Type_id, Calories, Fat, Carbs, Fiber, Time, created_at, UserId)
						VALUES ('$row2[Name]', '$row2[Type_id]', '$row2[Calories]', '$row2[Protein]', '$row2[Meals]', Now(), 3 ) ";				
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
			
			if($row['Carbs'] >= 20) $errors['Carbs'] = "must less than 20";
			if(empty($row['Carbs'])) $errors['Carbs'] = "is required";
			
			return count($errors) > 0 ? $errors : false ;
		}
}
?>
	