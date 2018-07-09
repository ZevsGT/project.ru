<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/data/session.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/data/db.php';

if(isset($_POST[further])){
	
	foreach ($_POST as $key) {
		if($key != $_POST[name] && $key != $_POST[further] && $key !='') $ListQuestions[] = $key;
	}


	$test = R::load('testtitle', $_SESSION['Title_Test']['id']);
	$questions = R::dispense('questions');
	$questions->name = $_POST['name'];
	$questions->correct_answer = $_POST['true'];
	$questions->answers = serialize($ListQuestions);
	$test->ownQuestionsList[] = $questions;

	R::store( $test );

	header('location: /admin.php?mod=addtest');
	
}elseif($_POST[close]) {
	echo "12";
}
?>