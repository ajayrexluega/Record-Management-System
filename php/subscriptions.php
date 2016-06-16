<?php
//database settings
$connect = mysqli_connect("localhost", "root", "", "rmsdb");

$result = mysqli_query($connect, "select * from subscription");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
?>