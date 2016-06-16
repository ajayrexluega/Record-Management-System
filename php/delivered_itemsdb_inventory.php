<?php
//database settings
$connect = mysqli_connect("localhost", "root", "", "rmsdb");

$result = mysqli_query($connect, "select * from delivered_items where available_quantity > 0");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
?>