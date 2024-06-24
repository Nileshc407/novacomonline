<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RestoApp</title>
  <base href="/">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<!--The content below is only a placeholder and can be replaced.-->
<div class="container-fluid h-100">
  <div class="d-flex justify-content-center h-100">
    <div class="user_card">
      <div class="d-flex justify-content-center">
		<h3>Decrypt data</h3>
      </div>
      <div class="d-flex justify-content-center form_container">
        <form method="POST" action="https://ehpdemo.online/EncDcrypt/index.php">
          <div class="input-group mb-3">
		
            <input type="text" name="uname" class="form-control input_user" value="" placeholder="username">
          </div>
          <div class="input-group mb-2">
			<br>
            <input type="password" name="upass" class="form-control input_pass" value="" placeholder="password">
          </div>
			<br>
            <div class="d-flex justify-content-center mt-3 login_container">
			<button type="submit" name="button" class="btn login_btn">Decrypt</button>
         </div>
        </form>
      </div>
  
    </div>
  </div>
</div>

<?php
if($_POST != null)
{
	if ( ! function_exists('App_string_decrypt'))
	{
		function App_string_decrypt($saved_bundle)
		{
			$cipher = "aes-256-gcm";
			$message = 'opensesame';
			
			//echo "strlen--".strlen($msg_bundle);
			// Parse iv and encrypted string segments
			$components = explode( ':', $saved_bundle );

			//var_dump($components);

			$salt          = $components[0];
			$iv            = $components[1];
			$encrypted_msg = $components[2];

			$decrypted_msg = openssl_decrypt(
			  "$encrypted_msg", 'aes-256-cbc', "$salt:$message", null, $iv
			);

			if ( $decrypted_msg === false ) 
			{
			  // die("Unable to decrypt message! (check password) \n");
			  // echo "Unable to decrypt info.!";
			}
			else
			{
				$msg = substr( $decrypted_msg, 41 );
				return $decrypted_msg;
			}
		}
		/*************************** user info encryption 20-01-2020 *************************/
	}
	
	echo "Decrypted username is : ".App_string_decrypt($_POST["uname"])."<br>";
	echo " Decrypted password is : ".App_string_decrypt($_POST["upass"]);
}
?>
</body>
</html>