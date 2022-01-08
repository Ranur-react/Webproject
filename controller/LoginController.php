<?php
include 'koneksi.php';
$data=[];

if(!empty($_POST['Username'])){

  $user= $_POST['Username'];
    $password=$_POST['password'];

    $querymailcek = mysqli_query($conn, "SELECT * FROM USER WHERE username='$user';");
    $query = mysqli_query($conn, "select * from user  where username='$user' and `password`=md5($password) ;");
    $rc = mysqli_num_rows($querymailcek);
    $rcp = mysqli_num_rows($query);
    $data['check'] = $rc;
    if ($rc > 0) {
        $data['check'] = $rc;
        $data['rc'] = 200;
        if ($rcp > 0) {
            $database = [];
            while ($d = mysqli_fetch_assoc($query)) {
                $database[] = $d;
            }
            $data['data'] = $database;

            $data['pesan']= "Berhasil Login";
            $data['status'] = true;
        } else {
            $data['pesan'] = "Password (" . $password . ") salah, perhatikan penulisan dengan benar";
            $data['status'] = false;
        }
    } else {
        $data['rc'] = 404;
        $data['pesan']= "User (" . $user . ") tidak Ditemukan, Tulis Username dengan benar";
        $data['status'] = false;
    }
    
}else{
    $data['rc'] = 404;
    $data['pesan']= "username TIdak Boleh Kosong";
    $data['status'] = false;
}
echo json_encode($data);
?>