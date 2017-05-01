<?php
/**
 * Created by PhpStorm.
 * User: talivaldis.olekss
 * Date: 30.04.2017
 * Time: 00:26
 */ ?>

<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";
include "funkcijas.php";
include "konekcija.php";
include "\\phpmailer\\mailset.php";
if (!isset($_SESSION['USER']['STATUS'])){
    include 'sesion_list.php';
}
$datums=datums();
define("MAX_FILE_SIZE",5000000);
$target_dir = 'uploads'; ?>

<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	 <link rel="stylesheet" type="text/css" href="pretenz.css" />
	 <link rel="stylesheet" type="text/css" href="teksti.css" />
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
	 <link rel="stylesheet" href="jquery/jquery-ui.structure.min.css">
	 <link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
	 <script src="jquery/jquery-3.1.1.min.js"></script>
	 <script src="jquery/jquery-ui.min.js"></script>

  <title>Pretenzijas (administrēšana)</title>
</head>

<body>
<form action="#" method="post" enctype="multipart/form-data">
    <?php
    include "admin_general.php"; ?>
</form>
</body>
</html>