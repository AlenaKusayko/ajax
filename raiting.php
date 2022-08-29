<?php
$filmname = $_GET['movie'];
$rate = $_GET['rate'];

include('settings/config.php');

$addRate = $mysqli->query("INSERT INTO raiting (filmname, rate) VALUES ('$filmname', '$rate')");

$askRate = $mysqli->query("SELECT AVG(rate) AS rateAvg FROM raiting WHERE filmname='$filmname'");
$avgRate = $askRate->fetch_object();
echo $avgRate->rateAvg;
json_encode(array(
    'data'=>$avgRate->rateAvg
));
?>