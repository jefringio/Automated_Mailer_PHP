<?php

include "config.php";

$id=$_POST["ID"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$country=$_POST["country"];
$sex=$_POST["sex"];
$adult=$_POST["adult"];
$ship=$_POST["ship"];
$team=$_POST["team"];
$relation=$_POST["relation"];
$interest=$_POST["interest"];
$learn=$_POST["learn"];
$status=$_POST["status"];


$sql="UPDATE formtable set firstname='$firstname', lastname='$lastname', email='$email', nationality='$country', gender='$sex', year18='$adult', ship='$ship', team='$team', relation='$relation', interest='$interest', learn='$learn', Status='$status'  where id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>