<?php
class Database {
  public $con;
  public function __construct() {
    $this -> con =mysqli_connect('localhost','root','','oga_db');
    // if($this->con) {
    //   echo 'Connected';
    // } else {
    //   echo "Not Connected";
    // }
  }

}
// $se;
?>
