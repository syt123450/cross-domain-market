<?php

	if(!empty($_GET["productID"])){
		if ($_GET["productID"] === "" || $_GET["productID"] === null){
			print("<h3>Empty Parameter.</h3>");
		}
		else {
			if (!ctype_digit($_GET["productID"])){
				print("<h3>Invalid Parameter.</h3>");
			}
			else {
				if(!empty($_GET["endID"])){
					if (!ctype_digit($_GET["endID"])){
						print("<h3>Invalid Parameter.</h3>");
					}
					else {
						echo json_encode(getProductsData($_GET["productID"], $_GET["endID"]));
					}
				}
				else {
					echo json_encode(getProductData($_GET["productID"]));
				}
			}
		}
	}
	else {
		echo json_encode(getAllProductData());
	}
	


	function getAllProductData(){
		$query = "SELECT productID, productName, description, priceOrig, priceNew, quantity, smallPicUrl, largePicUrl FROM Product";

		try {
			$con = new PDO ("mysql:host=localhost;dbname=nebula", "nebula", "nebulapw");
			$con->setAttribute( PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );

			$stmt = $con->prepare($query);
			$stmt->execute();
			$data = $stmt->fetchAll( PDO::FETCH_ASSOC );

			return $data;

		} catch (PDOException $ex){
			echo $ex->getMessage();
		}
	}
	
	function getProductData($productID){
		$query = "SELECT productID, productName, description, priceOrig, priceNew, quantity, smallPicUrl, largePicUrl FROM Product WHERE productID = ?";

		try {
            $con = new PDO ("mysql:host=localhost;dbname=nebula", "nebula", "nebulapw");
			$con->setAttribute( PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );

			$stmt = $con->prepare($query);
			$stmt->execute(array($productID));
			$data = $stmt->fetchAll( PDO::FETCH_ASSOC );

			return $data;

		} catch (PDOException $ex){
			echo $ex->getMessage();
		}
	}
	
	function getProductsData($productID, $endID){
		$query = "SELECT productID, productName, description, priceOrig, priceNew, quantity, smallPicUrl, largePicUrl FROM Product WHERE productID >= ? AND productID <= ?";

		try {
            $con = new PDO ("mysql:host=localhost;dbname=nebula", "nebula", "nebulapw");
			$con->setAttribute( PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION );

			$stmt = $con->prepare($query);
			$stmt->execute(array($productID, $endID));
			$data = $stmt->fetchAll( PDO::FETCH_ASSOC );

			return $data;

		} catch (PDOException $ex){
			echo $ex->getMessage();
		}
	}
?>