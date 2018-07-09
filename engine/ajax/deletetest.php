<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/data/db.php';


R::exec( 'DELETE FROM `questions` WHERE `testtitle_id` = ?', array($_POST[id]));
$test = R::load('testtitle', $_POST[id]);
R::trash($test);

?>
