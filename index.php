<?php
require_once 'config.php';
if(!empty(onlyText($_GET["table"]))){

$allkeys = "";

foreach($_REQUEST as $key => $val) {
 $allkeys .= $key; 


}
if($allkeys=="table" || $allkeys=="tableapi_query_limit")
{
  readAll($_GET["table"],$_GET["api_query_limit"]);

}

else {
$generatefilter =array();
foreach($_REQUEST as $comingKey => $comingVal)
{
if($comingKey == "table" || $comingKey == "api_query_limit")
{ }
else {
  array_push($generatefilter,array($comingKey => $_GET[$comingKey]));
}



}
readAllWithFilter($_GET["table"],$_GET["api_query_limit"],$generatefilter);
//print_r($generatefilter);


}

}
else {
	

?>

  <title>PHP Rest Api Generator</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
  
<style>
body {
  font-family: "Helvetica Neue", Helvetica, Arial;
  font-size: 14px;
  line-height: 20px;
  font-weight: 400;
  color: #3b3b3b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  background: #2b2b2b;
}
@media screen and (max-width: 580px) {
  body {
    font-size: 16px;
    line-height: 22px;
  }
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 800px;
}

.table {
  margin: 0 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
}
@media screen and (max-width: 580px) {
  .table {
    display: block;
  }
}

.row {
  display: table-row;
  background: #f6f6f6;
}
.row:nth-of-type(odd) {
  background: #e9e9e9;
}
.row.header {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}
.row.green {
  background: #27ae60;
}
.row.blue {
  background: #2980b9;
}
@media screen and (max-width: 580px) {
  .row {
    padding: 14px 0 7px;
    display: block;
  }
  .row.header {
    padding: 0;
    height: 6px;
  }
  .row.header .cell {
    display: none;
  }
  .row .cell {
    margin-bottom: 10px;
  }
  .row .cell:before {
    margin-bottom: 3px;
    content: attr(data-title);
    min-width: 98px;
    font-size: 10px;
    line-height: 10px;
    font-weight: bold;
    text-transform: uppercase;
    color: #969696;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 16px;
    display: block;
  }
}
</style>

<body translate="no" >
  <div class="wrapper">
  
 <h1 ><font color="white">PHP Rest Api Generator</font></h1>

<?php $tableList = getTables(DB::$dbName);
foreach ($tableList as $table) {
	
?>

  <div class="table">
    <h2 ><font color="white"><?php echo $table['table_name']; ?></font></h2>
    <div class="row header">
      <div class="cell">
        Action
      </div>
      <div class="cell">
        Request Type
      </div>
      <div class="cell">
        Url
      </div>
      <div class="cell">
        Desc
      </div>
    </div>
    
    <div class="row">
      <div class="cell" data-title="Action">
        Read
      </div>
      <div class="cell" data-title="Request Type">
        GET
      </div>
      <div class="cell" data-title="Url">
        /<?php echo $table['table_name']; ?>
      </div>
      <div class="cell" data-title="Desc">
       Read all items in table.
      </div>
    </div>

    <div class="row">
      <div class="cell" data-title="Action">
        Read with filter column
      </div>
      <div class="cell" data-title="Request Type">
        GET
      </div>
      <div class="cell" data-title="Url">
        /<?php echo $table['table_name']; ?>&column=value
      </div>
      <div class="cell" data-title="Desc">
       Read all items in table, with filter.
      </div>
    </div>

    <div class="row">
      <div class="cell" data-title="Action">
        Read with limit column
      </div>
      <div class="cell" data-title="Request Type">
        GET
      </div>
      <div class="cell" data-title="Url">
        /<?php echo $table['table_name']; ?>&api_query_limit=10
      </div>
      <div class="cell" data-title="Desc">
       Read all items in table, with limit.
      </div>
    </div>


    <div class="row">
      <div class="cell" data-title="Action">
        Create
      </div>
      <div class="cell" data-title="Request Type">
        POST
      </div>
      <div class="cell" data-title="Url">
        /<?php echo $table['table_name']; ?>
      </div>
      <div class="cell" data-title="Desc">
       Create item in table.
      </div>
    </div>

    <div class="row">
      <div class="cell" data-title="Action">
        Update
      </div>
      <div class="cell" data-title="Request Type">
        POST
      </div>
      <div class="cell" data-title="Url">
        /<?php echo $table['table_name']; ?>
      </div>
      <div class="cell" data-title="Desc">
       Update item in table.
      </div>
    </div>

    <div class="row">
      <div class="cell" data-title="Action">
        Delete
      </div>
      <div class="cell" data-title="Request Type">
        POST
      </div>
      <div class="cell" data-title="Url">
        /<?php echo $table['table_name']; ?>
      </div>
      <div class="cell" data-title="Desc">
       Delete item in table.
      </div>
    </div>
    
    
 
  
</div>

<?php } ?>



  
</div>

</body>

</html>
<?php } ?>