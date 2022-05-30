<?php
require_once('database/db_config.php');

class DataOperation extends Database {

  public function insert_record($tbl, $fields) {
    // INSERT INTO Tablename ('','') VALUES ('','');
    $query='';
    $query .="INSERT INTO ".$tbl;
    $query .=" (".implode(",",array_keys($fields)).") VALUES ('".implode("','",array_values($fields))."')";
    // echo $query;
     //die();
    $sql=mysqli_query($this->con,$query);
    if($sql) {
      return true;
    }
  }

// Fetch All Record
public function fetch_record($tbl) {
$query="select * from ".$tbl;
$array=array();
$sql=mysqli_query($this->con,$query);
while($row=mysqli_fetch_assoc($sql)) {
if(isset($row['category_id']) && $row['category_id'] != "" && $row['category_id'] != "0" ) {
  $category=mysqli_fetch_assoc(mysqli_query($this->con,"select title from categories where id=".$row['category_id']));
$row['category'] = $category['title'];
}
if(isset($row['subcategory_id']) && $row['subcategory_id'] != "" && $row['subcategory_id'] != "0" ) {
  $subcategory=mysqli_fetch_assoc(mysqli_query($this->con,"select title from subcategories where id=".$row['subcategory_id']));
$row['subcategory'] = $subcategory['title'];
}
  $array[] = $row;
  }
  return $array;
}

// Fetch All Records By Condition
public function fetch_all_record($tbl,$where) {
  $query='';
  $condition="";
  $array=array();
  foreach($where as $key => $value) {
    $condition .= $key. "='".$value."' AND ";
  }
  $condition = substr($condition, 0 , -5);
  // echo $condition;
   $query .= "select * from ".$tbl." where ".$condition;
  $sql = mysqli_query($this->con,$query);
  while($row=mysqli_fetch_assoc($sql)) {
    $array[] = $row;
    }
    return $array;
}

// Fetch Record By Condition
public function select_record($tbl,$where) {
  $query='';
  $condition="";
  foreach($where as $key => $value) {
    $condition .= $key. "='".$value."' AND ";
  }
  $condition = substr($condition, 0 , -5);
  // echo $condition;
   $query .= "select * from ".$tbl." where ".$condition;
  $sql = mysqli_query($this->con,$query);
  $row=mysqli_fetch_assoc($sql);
// $array[] = $row;
  return $row;
}
// Update Record
public function update_record($tbl,$where,$fields) {
$query='';
$condition='';
foreach($where as $key => $value) {
  $condition .= $key. "='".$value."' AND ";
}
$condition = substr($condition, 0 , -5);
foreach($fields as $key => $value) {
  $query .= $key ."='".$value. "', ";
}
$query=substr($query, 0, -2);
 $query ="update ".$tbl. " set ".$query." where ".$condition;
if(mysqli_query($this->con,$query)) {
  return true;
}
}

// Delete Records
public function delete_record($tbl,$where) {
  $query='';
  $condition='';
  foreach($where as $key => $value) {
    $condition .= $key. "='".$value."' AND ";
  }
  $condition = substr($condition, 0 , -5);
  $query = "delete from ".$tbl." where ".$condition;
  if(mysqli_query($this->con,$query)) {
    return true;
  }
}

// Get Counts
public function getCount($tbl,$where) {
  $query='';
  $condition="";
  foreach($where as $key => $value) {
    $condition .= $key. "='".$value."' AND ";
  }
  $condition = substr($condition, 0 , -5);
  // echo $condition;
   $query .= "select COUNT(*) as 'records' from ".$tbl." where ".$condition;
  $sql = mysqli_query($this->con,$query);
  $row=mysqli_fetch_assoc($sql);
// $array[] = $row;
  return $row;
}


// Fetch All Records By Condition and limit
public function fetch_all_record_by_limit($tbl,$where) {
  $query='';
  $condition="";
  $array=array();
  foreach($where as $key => $value) {
    $condition .= $key. "='".$value."' AND ";
  }
  $condition = substr($condition, 0 , -5);
  // echo $condition;
   $query .= "select * from ".$tbl." where ".$condition." ORDER BY ID DESC LIMIT 10";
  $sql = mysqli_query($this->con,$query);
  while($row=mysqli_fetch_assoc($sql)) {
    $array[] = $row;
    }
    return $array;
}



}

?>
