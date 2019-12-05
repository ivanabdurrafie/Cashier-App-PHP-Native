<?php
include "connection.php";
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "select * from user where username = '$username' and password='$password'";
$res = $conn->query($sql);
$row = mysqli_fetch_assoc($res);

if ($row['Level'] == 'Admin') {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';
    echo "anda berhasil login. Silahkan menuju  <a href='dashboardadmin.php'>Halaman Home</a>";
} else if($row['Level']== 'Kasir') {
    echo "anda berhasil login. Silahkan menuju  <a href='homeguest.html'>Halaman Home</a>";
}else {
    echo "anda gagal login. Silahkan <a href='loginform.html'>Login kembali </a>\n";
    echo $conn->error;
}

$conn->close();
?>