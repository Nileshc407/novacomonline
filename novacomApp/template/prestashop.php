  <?php
	/*******************Company Credentials******************/
	$Company_UserName = "lipitaloyalty";
	$Company_Password = "kvnZ92GNc6fPM+yzhzkfnar6TKu2UNNBm2ReynPF9dw=";	
	// $Company_UserName = "JoyCoinsLoyalty";
	// $Company_Password = "zdb2avAOI3wsHnOmV9q70UtSsEjOEfzDm/wZdaY//XU=";
	/*******************Company Credentials******************/			
	/*************************API Url************************/
	// $url = "http://localhost/CI_IGAINSPARK_LIVE/index.php/Api/Merchant_api/iGainSpark_api";	
	// $url = "https://joy1.igainapp.in/index.php/Api/Merchant_api/iGainSpark_api";
	$url = "http://demo1.igainspark.com/index.php/Api/Merchant_api/iGainSpark_api";
	/*************************API Url************************/
		
	$API_flag = $_REQUEST['API_flag'];
	if($API_flag=="SokuXcQVdgusyblJuNpQhDRoq+F6FcVE3kxgLfhfFtM=")
	{
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$Phno = $_REQUEST['phno'];
		$userEmailId = $_REQUEST['userEmailId'];
		/*************************API Url************************/
		// $url = "http://localhost/CI_IGAINSPARK_LIVE/index.php/Api/Merchant_api/iGainSpark_api";
		/*************************API Url************************/
			$fields = array(
					'API_flag' => $API_flag,
					'Company_username' => $Company_UserName,
					'Company_password' => $Company_Password,					
					'fname' => $fname,
					'lname' => $lname,
					'phno' => $Phno,
					'userEmailId' => $userEmailId
			);
			
			$field_string = $fields;
			$ch = curl_init();
			$timeout = 0;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($field_string));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$result = curl_exec($ch);
			echo $result;
			curl_close($ch);
			// $response = json_decode($result, true);
			// echo json_encode($response);
	}
	if($API_flag==15)
	{
		$API_flag = "jbV+3fVKuj0bdnwoSggDp4uocPlUYrxa5d4qN6HvQVM=";
		$userEmailId = $_REQUEST['Customer_email'];
		/*************************API Url************************/
		// $url = "http://localhost/CI_IGAINSPARK_LIVE/index.php/Api/Merchant_api/iGainSpark_api";
		/*************************API Url************************/
			$fields = array(
					'API_flag' => $API_flag,
					'Company_username' => $Company_UserName,
					'Company_password' => $Company_Password,					
					'Customer_email' => $userEmailId
			);
			
			$field_string = $fields;
			$ch = curl_init();
			$timeout = 0;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($field_string));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$result = curl_exec($ch);
			echo $result;
			curl_close($ch);
			// $response = json_decode($result, true);
			// echo json_encode($response);
	}
	else if($API_flag == 9) // Fetch customer current balance
	{
		session_start();
		$API_flag1 ="C/b3/5ojf7ntS4tzOZJuVRyANLn2lOT+R6CanV+kGXc="; // 9 point valuation
		
		$CurrentBalance = $_REQUEST['Current_balance'];   
		$RedeemPoint = $_REQUEST['Redeem_points'];
		$PurchaseAmt = $_REQUEST['Purchase_amount'];
		$_SESSION["Redeem_pointsPrestashop"]=$RedeemPoint;
		// var_dump($CurrentBalance);
		// var_dump($RedeemPoint);
		// var_dump($PurchaseAmt); die;
		/*************************API Url************************/
		// $url = "http://localhost/CI_IGAINSPARK_LIVE/index.php/Api/Merchant_api/iGainSpark_api";
		/*************************API Url************************/
			$fields = array(
					'API_flag' => $API_flag1,
					'Company_username' => $Company_UserName,
					'Company_password' => $Company_Password,
					'Current_balance' => $CurrentBalance,
					'Redeem_points' => $RedeemPoint,
					'Purchase_amount' => $PurchaseAmt
			);
			
			$field_string = $fields;
			$ch = curl_init();
			$timeout = 0;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($field_string));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$result = curl_exec($ch);
			// echo $result;
			curl_close($ch);
			$response = json_decode($result, true);
			echo json_encode($response);
			
			if($response !=3101 && $response !=6 && $response !=2066)
			{
				$_SESSION["RedeemAmtPrestashop"]=number_format($response, 2, '.', '');
			}
			else
			{
				$_SESSION["Redeem_pointsPrestashop"]=0;
				$_SESSION["RedeemAmtPrestashop"]=0;
			}
	}
  ?>