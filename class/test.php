<?php 
include '../class/AdminDB.php';

$row =  AdminDB::GetAdminDB()->GetAdminData();
$string = "admin";
print password_hash($string , PASSWORD_DEFAULT) . '<br>';
foreach ($row as  $value) {
print $value['password'];

    //    var_dump(password_verify($string, $value['password']));
}


 
