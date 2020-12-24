<?php
header("content-type:text/html;charset=utf-8");
include_once ("../public/conn.php");
if (! session_id())
    session_start();
// var_dump($_POST);
if (isset($_POST['name'])) {
    $code = $_POST["code"];
    if (strtolower($code) != strtolower($_SESSION["code"])) {
        echo '<script type="text/javascript">alert("验证码不正确！");window.history.back();</script>';
        exit();
    }
    $username = $_POST['name'];
    $password = $_POST['password'];
    $sql = "select * from yun_admin where AdminName ='" . $username . "'";
    $result = mysqli_query($link, $sql);
    $rows = mysqli_fetch_array($result);
    if ($rows) {
        $temp_pwd = $rows['AdminPwd'];
        if (md5($password) == $temp_pwd) {
            $_SESSION['username'] = $username;
            $_SESSION['islogin'] = true;
            header('Location:index.php');
            exit();
        } else {
            echo '<script type="text/javascript">alert("密码错误！");window.history.back();</script>';
            exit();
        }
    } else {
        echo '<script type="text/javascript">alert("该用户不存在！");window.location.href = "login.php";</script>';
        exit();
    }
}
?>
