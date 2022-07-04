<?php 
include 'NewsDB.php';

$row = NewsDB::GetnewsDB()->GetlastData(1);

var_dump($row);


 
