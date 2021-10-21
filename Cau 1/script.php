<?php
require_once "Main.php";
require_once "DbConnection.php";
require_once "./Collection/ExamResult.php";
require_once "./Collection/Staff.php";
require_once "DbConnection.php";
require_once "./Collection/AbstractCollection.php";
require_once "./Model/AbstractModel.php";
require_once "./Model/Staff.php";
require_once "./Model/ExamResult.php";
require_once "./Model/StringifyFormat.php";





$dbConnection = new DbConnection();
$staff = new \Collection\Staff($dbConnection);
$examResult = new \Collection\ExamResult($dbConnection);

$main = new Main($staff,$examResult);
$main->showOutStandingStaffs();