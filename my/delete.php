<?php
$id = $_GET['id'];
global $DB;
require_once('simplehtml_form.php');
$result=$DB->delete_records('trial', array("id"=>$id));
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$urltogo= $CFG->wwwroot.'/my/display.php';
redirect($urltogo);