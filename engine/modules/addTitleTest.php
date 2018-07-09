<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/data/session.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/data/db.php';

if(isset($_POST[further])){
	if(R::count('testtitle', 'name = ?', array($_POST[name])) > 0){
		$_SESSION['error'] = 'тест с таким названием уже существует';
		header('location: /admin.php?mod=addtest');
	}else{
		$test = R::dispense('testtitle');
		$test->name = $_POST[name];
		$test->admin_email =$_SESSION['logged_user']['login'];
		R::store( $test );

		$id = R::getRow( 'SELECT id FROM `testtitle` WHERE `name` = ?', array($_POST[name]));
		$_SESSION['Title_Test']['name'] = $_POST[name];
		$_SESSION['Title_Test']['id'] = $id[id];
		
		header('location: /admin.php?mod=addtest');
	}
}
?>