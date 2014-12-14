<?php
	include_once __DIR__ . '/../inc/_all.php';
/**
 * 
 */
class exercise {
	
	public static function Blank()
	{
		return array('id'=>null,'Name'=>null,'Intensity'=>null,'Duration' =>null,'Area' =>null, 'Time'=>date(strtotime('tomorrow')));
	}
	
	public static function Get($id=null)
	{
		$sql = "	SELECT * FROM Exercise
	
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
		$sql = "	SELECT * FROM Exercise
		
		";
		return FetchAll($sql);			
	}
	
		static public function Save(&$row)
		{
			$conn = GetConnection();
			
			$row2 = escape_all($row, $conn);
			$row2['Time'] = date( 'Y-m-d H:i:s', strtotime( $row2['Time'] ) );
			if (!empty($row['id'])) {
				$sql = "Update Exercise
							Set Name='$row2[Name]','Intensity='$row2[Intensity] , Duration='$row2[Duration]',
								 Area = '$row2[Area]', Time='$row2[Time]'
						WHERE id = $row2[id]
						";
			}else{
				$sql = "INSERT INTO Exercise
						 (`created`, `updated`, `Name`, `Intensity`, `Duration`, `Area`, `Time`)
						VALUES (Now(), Now(),'$row2[Name]', '$row2[Intensity]', '$row2[Duration]', '$row2[Area]', '$row2[Time]') ";				
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
			$sql = "DELETE FROM Exercise WHERE id = $id";
			//echo $sql;
			$results = $conn->query($sql);
			$error = $conn->error;
			$conn->close();
			
			return $error ? array ('sql error' => $error) : false;
		}
		
		static public function Validate($row)
		{
			$errors = array();
			
			
			return count($errors) > 0 ? $errors : false ;
		}
}

	