<?php
	include_once __DIR__ . '/../inc/_all.php';
/**
 * 
 */
class Food {
	
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
}