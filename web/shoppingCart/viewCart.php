<?php
session_start();
echo "We are here"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link href="css/shcar.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<main>
		<div id="shopping-cart">
			<div class="txt-heading">Shopping Cart <a id="btnView" href="index.php?action=browse">Browse</a><a id="btnEmpty" href="index.php?action=empty">Empty Cart </a></div>

			<?php
			echo "we are here again";
				if(isset($_SESSION["cart_item"])){
					$item_total = 0;
			?>	
			<table cellpadding="10" cellspacing="1">
				<tbody>
					<tr>
						<th style="text-align:left;"><strong>Name</strong></th>
						<th style="text-align:left;"><strong>Code</strong></th>
						<th style="text-align:right;"><strong>Quantity</strong></th>
						<th style="text-align:right;"><strong>Price</strong></th>
						<th style="text-align:center;"><strong>Action</strong></th>
					</tr>	