<?php
header("content-type:text/html;charset=utf-8");
if (! session_id())
    session_start();
if (@$_SESSION['username'] == "" || @$_SESSION['islogin'] == FALSE) {
    echo '<script type="text/javascript">window.location.href="tip_error.php";</script>';
}
?>
