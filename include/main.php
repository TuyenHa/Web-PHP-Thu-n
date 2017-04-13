<?php 
if(isset($_GET['content']))
{
	$content=$_GET['content'];
	switch ($content) {
		case 'details':
		include('include/details.php');
		break;
		case 'categories':
		include('include/categories.php');
		break;
		case 'contacts':
		include('include/contacts.php');
		break;
		case 'login':
		include('include/login.php');
		break;
		case 'logout':
		include('include/logout.php');
		break;
		case 'registers':
		include('include/registers.php');
		break;
		case 'contacts':
		include('include/contacts.php');
		break;
		case 'carts':
		include('include/cartinfo.php');
		break;
		case 'paycart':
		include('include/paycart.php');
		break;
		case 'cartinfo':
		include('include/cartinfo.php');
		break;
		case 'search':
		include('include/search.php');
		break;
		 case 'accountinfo':
		include('include/accountinfo.php');
		break;
		  case 'changepass':
		include('include/changepass.php');
		break;

	}

}else{
	include ('include/content.php');
}

?>