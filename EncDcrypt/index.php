<?php /* ?>
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
<?php */ ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Encrypt/Decrypt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<h2>Encrypt Data</h2>
	  <form method="POST" action="index.php">
		<div class="form-group">
		  <label for="email">Username</label>
		  <input type="text" name="encyname" class="form-control input_user" value="" placeholder="username">
		</div>
		<div class="form-group">
		  <label for="email">Password</label>
		 <input type="text" name="encypass" class="form-control input_pass" value="" placeholder="password">
		</div>
		<input type="submit" name="submit" value="Encrypt" class="btn login_btn">
		
	  </form>
</div>
<div class="container">
	<h2>Decrypt Data</h2>
	  <form method="POST" action="index.php">
		<div class="form-group">
		  <label for="email">Username</label>
		  <input type="text" name="uname" class="form-control input_user" value="" placeholder="username">
		</div>
		<div class="form-group">
		  <label for="email">Password</label>
		 <input type="text" name="upass" class="form-control input_pass" value="" placeholder="password">
		</div>
		<input type="submit" name="submit" value="Decrypt" class="btn login_btn">
	  </form>
</div>

</body>
</html>
<br>
<br>
<?php
error_reporting(0);
if($_POST != null)
{
	
	if($_POST['submit']== "Encrypt"){
		
		// echo"----Encrypt----<br>";
		if ( ! function_exists('App_string_decrypt')){
		
			function App_string_encrypt($string)
			{
				$cipher = "aes-256-gcm";
				$message = 'opensesame';
				// Salt to add entropy to users' supplied passwords
				// Make sure to add complexity/length requirements to users passwords!
				// Note: This does not need to be kept secret
				$salt = "033ebc1f7e02174e4b386ee7981de53fa6adea5f";//sha1(mt_rand());
				// Initialization Vector, randomly generated and saved each time
				// Note: This does not need to be kept secret
				$iv = "906dc483564123d3";//substr(sha1(mt_rand()), 0, 16);

				// echo "\n Password: $string \n Salt: $salt \n IV: $iv\n";

				$encrypted = openssl_encrypt(
				  "$string", 'aes-256-cbc', "$salt:$message", null, $iv
				);

				$msg_bundle = "$salt:$iv:$encrypted";
				
				return $msg_bundle;
			}	
			echo'<div class="container"><div class="form-group p-5"><label for="email">Encrypted username is :</label>:<input type="text" name="encyname" class="form-control input_user" value="'.App_string_encrypt($_POST["encyname"]).'" placeholder="username"></div><br>';
			echo'<div class="form-group p-5"><label for="email">Encrypted password is :</label><input type="text" name="encypass" class="form-control input_user" value="'.App_string_encrypt($_POST["encypass"]).'" placeholder="encypass"></div></div>';
			
			/* echo "Encrypted username is : ".App_string_encrypt($_POST["encyname"])."<br>";
			echo " Encrypted password is : ".App_string_encrypt($_POST["encypass"]); */
		}
	}
	if($_POST['submit'] == "Decrypt"){
		
		// echo"----Decrypt----<br>";
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
			
			
			/* echo "Decrypted username is : ".App_string_decrypt($_POST["uname"])."<br>";
			echo " Decrypted password is : ".App_string_decrypt($_POST["upass"]); */
			
			
			echo'<div class="container"><div class="form-group p-5"><label for="email">Decrypted username is</label>:<input type="text" name="uname" class="form-control input_user" value="'.App_string_decrypt($_POST["uname"]).'" placeholder="username"></div><br>';
			echo'<div class="form-group p-5"><label for="email">Decrypted password is :</label><input type="text" name="upass" class="form-control input_user" value="'.App_string_decrypt($_POST["upass"]).'" placeholder="encypass"></div></div>';
		
		}
	}
		
}
?>

<br>
<br>
<br>
<br>
<br>
</body>
</html>