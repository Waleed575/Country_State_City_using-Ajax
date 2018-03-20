<?php
error_reporting(5);
$connect = mysqli_connect("localhost", "root", "");
mysqli_select_db($connect, "db");

$country = $_GET['country'];
$state = $_GET['state'];


if($country != "")
{

$sql = mysqli_query($connect, "SELECT * FROM state WHERE country_id = $country");
echo '<select id="statedd" onchange="change_state()">';
echo "<option>";echo "Select";echo "</option>";
while ($row = mysqli_fetch_array($sql)) 
{
    echo "<option value = '$row[id]' selected>";
    echo $row["name"];
    echo "</option>";
}
echo '</select>';
}

if($state != "")
{

$sql = mysqli_query($connect, "SELECT * FROM cities WHERE state_id = $state");
echo '<select>';
echo "<option>";echo "Select";echo "</option>";
while ($row = mysqli_fetch_array($sql)) 
{
    echo "<option value = '$row[id]' selected>";
    echo $row["name"];
    echo "</option>";
}
echo '</select>';
}

?>