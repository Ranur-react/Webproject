<?php
include '/koneksi.php';
$data=[];
if(isset($_POST['Username'])){

    $user= $_POST['Username'];
    $password=$_POST['password'];

    $querymailcek = mysqli_query($conn, "SELECT * FROM USER WHERE username='admin';");
    $query = mysqli_query($conn, "select * from user  where username='$user' and `password`='$password' ;");
    $rc = mysqli_num_rows($querymailcek);
    $rcp = mysqli_num_rows($query);
    $data['data']= $rc;
    if ($rc < 0) {
        $data['rc'] = $rc;
        if ($rcp > 0) {
            $database = [];
            while ($d = mysqli_fetch_array($query)) {
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
        $data['rc'] = $rc;
        $data['pesan']= "User (" . $user . ") tidak Ditemukan, Tulis Username dengan benar";
        $data['status'] = false;
    }
    
}else{
    $data['rc'] = 404;
    $data['pesan']= "Data TIdak Boleh Kosong";
    $data['status'] = false;
}
echo json_encode($data);
?>