<?php
error_reporting(error_reporting() & ~E_NOTICE);

function onlyText($string){
return ltrim($string,'/');
}

function array2Json($array_data){
$json = mb_convert_encoding($array_data, "UTF-8");

  return json_encode($json);
}
function readAll($table_name,$limit)
{
$table_name = onlyText($table_name);
if($limit >= 1 )
{
  
  echo array2Json(DB::query("SELECT * FROM $table_name limit %i",$limit));

}
else 
{
  
  echo array2Json(DB::query("SELECT * FROM $table_name"));

}
}


function readAllWithFilter($table_name,$limit,$filter)
{
$generatefilter ="";
foreach ($filter as $filtername => $filtervalue) {
  //print_r($filtervalue);
  foreach ($filtervalue as $lastvalue => $lastvalue2)
  {
    $lastvalue = htmlentities($lastvalue);
    $lastvalue2 = htmlentities($lastvalue2);

  $generatefilter .="$lastvalue = '$lastvalue2' and ";
  }
}
$generatefilter =  rtrim($generatefilter,"and ");  
$table_name = onlyText($table_name);
if($limit >= 1 )
{
  echo array2Json(DB::query("SELECT * FROM $table_name where $generatefilter limit %i",$limit));

}
else 
{
  
  echo array2Json(DB::query("SELECT * FROM $table_name where $generatefilter "));

}
}


function getTables($database_name)
{
$table_name = onlyText($database_name);

return DB::query("SELECT table_name FROM information_schema.tables WHERE table_schema = %s;",$database_name);

}
?>