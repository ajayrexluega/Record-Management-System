<?php
//database settings
$connect = mysqli_connect("localhost", "root", "", "rmsdb");

$result = mysqli_query($connect, "select * from inventory where available_stocks < 1");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
?>