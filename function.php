<?php
require 'connection.php';
//jika terdapat 'action' dan 'id' maka melakukan sesuatu
    if(isset($GET['action']) && isset($_GET['id'])){
        $action = $_GET['action'];
        $id = $_GET['id'];

        switch($action){
            case 'delete';
            delete_data($id);
                break;
            case'edit';
            echo "";
            
                
        }
    }else{
        echo "Aksi dan ID tidak di definisikam!";
    
    }

    // function delete_data($id){
    //     echo "Fungsi ini akan menghapus ID :". $id;
    // }

    function delete_data($id){
        global $connection;
        $res = mysqli_query($connection, "DELETE FROM tb_person WHERE id = " . $id);

        if($res){
            //jika
            header("Location: index.php?messages=Berhasil dihapus");
            exit ();

        }else{
            //jika false
            header("Location: index.php?messages=Gagal dihapus");
            exit ();
        }
    }

    function update($data){
        global $connection;

        $nama = $connection->real_escape_string ($data['txt_nama']);
        $ktp = $data['txt_ktp'];
        $alamat = $data['txt_alamat'];
        $tanggal = $data['txt_tanggal'];

         //menformat tanggal
        $tanggal_baru = new DateTime($tanggal);
        $formatted_tanggal = $tanggal_baru->format('Y-m-d');

        $query = "UPDATE tb_person SET nama = '$nama', ktp = '$ktp', alamat = '$alamat', tgl_daftar='$tanggal_baru' WHERE id = $id";

        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }
?> 
