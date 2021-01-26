<?php
session_start();

$product_array = array( array( 'id' => "1", 'name' => "3D Camera", 'code' => "3DcAM01", 'image' => "images/camera-260nw.webp", 'price' => "1500.00", 'description' => "This camera features optimal image quality for both HD video and still images through Fujifilm's unrelenting supportive functions with Fujinon lens." ), array( 'id' => "3", 'name' => "Wrist Watch", 'code' => "wristWear03", 'image' => "images/luxury-watch.webp", 'price' => "300.00", 'description' => "Marine Corps C23 Analog/Digital Chronograph Watch features a 52mm wide and 16mm thick solid case. This stylish dual-time chronograph watch offers both analog and digital time keeping functions and features a sleek black dial with the Marine Corps logo, sharp white hour markers and white/silvertone hands. A black rubber strap with silver detailing adds style and comfort to this unique timepiece. Age Group: Adult" ));

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch($action) {
	case "add":
		if(!empty($_POST["quantity"])) {
			foreach($product_array as $key) {
				if($key["code"] == $_GET["code"]) { 
					$productByCode = $key;
				}
			}
			
			$itemArray = array($productByCode["code"]=>array('name'=>$productByCode["name"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"]));
		
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($product_array[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($product_array[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
		include 'browse.php';
	break;
	
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
		include 'browse.php';
	break;
	
	case "details":
		foreach($product_array as $key) {
			if($key["code"] == $_GET["code"]) { 
				$itemArray = $key;
			}
		}
		include 'details.php';
	break;
	case "view":
		include 'viewCart.php';
	break;

	case "checkout":
		include 'checkout.php';
	break;

	case "confirm":
		$clientName = filter_input(INPUT_POST, 'clientName', FILTER_SANITIZE_STRING);
		$clientEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$clientPhone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
		$clientAddress1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
		$clientAddress2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
		$clientCity = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
		$clientState = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
		$clientZipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
	

		include 'confirm.php';
	break;

	case "empty":
		unset($_SESSION["cart_item"]);
		include 'browse.php';
	break;	
	
	default:
		include 'browse.php';
		break;

}