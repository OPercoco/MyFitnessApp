<?php
   ini_set("display_errors", 1);
   
   include_once __DIR__ . '/../inc/_all.php';
   
   $model = food::Get();
  
   $view = "food/index.php";
   
   include __DIR__ . '/../Views/shared/template.php';
   
   ?>
