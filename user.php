<?php
		
	include 'insert.php';

	$obj = new user_model();

	switch ($_GET['operation']) {

		case 'insert':
			$obj->add_user();
			break;

		case 'list':
			$obj->add_user();
			break;

		// case 'login':
		// 	$obj->login();
		// 	break;

		// case 'check_username':
		// 	$obj->check_username($_GET['puname']);
		// 	break;
		
		default:
			echo 'Chal bhag yaha se!';
			break;
	}


?>