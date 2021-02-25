<html>
	<head>
		<style>
			.error{
				color: 169FD8;
				}
		</style>
	</head>
	<body>
		<?php
			$name_err="";
			$email_err="";
			$gender_err="";
			$name=$email=$gender="";
			//To check whether the data is here or not.
			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				if(empty($_POST["name"]))
				{
					$name_err = "Name is required!";
				}
				else
				{
					$name=$_POST["name"];
				}
				if(empty($_POST["email"]))
				{
					$name_err = "Email-ID is required!";
				}
				else
				{
					if(filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						$email_err = "Invalid E-mail ID!";
					}
					else
					{
						$email=$_POST["email"];
					}
				}
				if(empty($_POST["gender"]))
				{
					$name_err = "Gender is required!";
				}
				else
				{
					$gender = $_POST["gender"];
				}
				function test_input($data)
				{
					$data-trim($data);
					$data-stripslashes($data);
					$data-htmlspecialchars($data);
					return $data;
				}
			}
		?>
		
		<h2>Registration Form</h2>
		<p><span class="error">* required</p>
		<form method="POST" action="<?php $_SERVER["PHP_SELF"]?>">
			<table>
				<tr><td>Name: </td><td><input type="text" name='name'> <span class="error"> * <?php echo $name_err; ?></td></tr>
				<tr><td>Email ID: </td><td> <input type="text" name="email"> <span class="error"> * <?php echo $email_err; ?></td></tr>
				<tr> <td>Gender: </td><td><input type="radio" name="gender" value="Female">Female <input type="radio" name="gender" value="Male">Male <span class="error"> * <?php echo $gender_err; ?></td></tr>
				<tr><td> <input type="submit" name="submit" value="submit"></td></tr>
			</table>
		</form>
        <?php
            echo "Your Input values:";
            echo $name, " ", $email, " ", $gender;
        ?>
	</body>
</html>