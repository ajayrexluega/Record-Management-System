<?php
//database settings
$connect = mysqli_connect("localhost", "root", "", "rmsdb");

$today = date("Y-m-d H:i:s");
$newtoday = date('Y-m-d', strtotime($today . ' +7 hours'));

$result = mysqli_query($connect, "select * from walkin_member ");//where datestamp='$newtoday' and time_out !='' ");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
?>