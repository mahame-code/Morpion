<?php
session_start();
session_unset();
session_destroy();
header("location:Se_Connecter.php");
exit();



?>