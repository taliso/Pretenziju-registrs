<?php
/**
 * Created by PhpStorm.
 * User: talivaldis.olekss
 * Date: 29.04.2017
 * Time: 12:59
 */
include 'konekcija.php';
$sql="DELETE FROM `faili`";
$q = $db->query($sql);
$sql="DELETE FROM `notikumi`";
$q = $db->query($sql);
$sql="DELETE FROM `personas_notikums`";
$q = $db->query($sql);
$sql="DELETE FROM `pretenzijas`";
$q = $db->query($sql);
$sql="DELETE FROM `teksts_notikums`";
$q = $db->query($sql);
$sql="DELETE FROM `uzdevumi`";
$q = $db->query($sql);
$sql="DELETE FROM `tmp_files`";
$q = $db->query($sql);
$sql="DELETE FROM `tmp_personas_notikums`";
$q = $db->query($sql);
$sql="DELETE FROM `tmp_teksts_notikums`";
$q = $db->query($sql);