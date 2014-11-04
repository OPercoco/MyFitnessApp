<?php
ini_set('display_errors', 1);


$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = isset($_REQUEST['HTTP_METHOD']) ? $_REQUEST['HTTP_METHOD'] : 'GET';
$view = null;
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';

switch ($action.'_'.$method) {
	case 'create_GET':
	    include __DIR__ . '/../Views/food/edit.php'; 	
		break;
	case 'create_POST':
		
		break;
	case 'update_GET':
		include __DIR__ . '/../Views/food/edit.php'; 	
		break;
	case 'update_POST':
		
		break;
	case 'delete_GET':
		
		break;
	case 'delete_POST':
		
		break;
	case 'index_GET':
	default:
		include __DIR__ . '/../Views/food/index.php'; 	
		break;
}
switch ($format) {
	case 'plain':
		include __DIR__ . '/../Views/' . $view; 
		break;
	case 'json':
		echo json_encode($model);
		break;
	case 'web';
	default:
		include __DIR__ . '/../Views/shared/_Template.php'; 	
		break;
}
  