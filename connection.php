<?php
///beberapa variable yang penting di connection
$hostname = 'localhost';
$user = 'root';
$password = '';
$db_name = 'db_warga';

//global variable connection
$connection = mysqli_connect($hostname, $user, $password, $db_name);

//var_dump($connection);
// mengambil data (fetching)
// mysqli_fetch_row() ini yg biasa dipakai, dipelajari
// mysqli_fetch_assoc()

//mysqli_fetch_array() kemungkinan data double

//mysqli_fetch_object() ini yg biasa dipakai


function myquery($query){
    global $connection;
    $res = mysqli_query($connection, $query);
    
    $returns = [];

    while( $data = mysqli_fetch_assoc($res) ){
        $returns[] = $data;
    }

    return $returns;
}
?>