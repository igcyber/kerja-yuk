<?php

/** 
 * Get the base path
 * 
 * @param string $path
 * @return string
 */
 function basePath($path = ''){
    return __DIR__. '/' . $path;
 }


 /**
  * @param string $name
  * 
  * @return void
  */
 function loadView($name, $data = [])
 {
   $viewPath = basePath("views/{$name}.php");

   if(file_exists($viewPath))
   {
      extract($data);
      require $viewPath;
   }else{
      echo "View {$viewPath} not found";
   }
 }


 /**
  * @param string $name
  * 
  * @return void
  */
 function loadPartial($name)
 {
   $partialPath = basePath("views/partials/{$name}.php");

   if(file_exists($partialPath))
   {
      require $partialPath;
   }else{
      echo "View {$partialPath} not found";
   }
 }
 
 /**
  * @param mixed $value
  * 
  * @return void
  */
 function inspect($value)
 {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
 }

 /**
  * @param mixed $value
  * 
  * @return void
  */
 function inspectAndDie($value)
 {
    echo "<pre>";
    die(var_dump($value));
    echo "</pre>";
 }


 /**
  * @param int $value
  * 
  * @return string
  */
 function rupiahFormat($value){
   return 'Rp '. number_format($value,0,'','.');
 }