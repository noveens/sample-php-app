<!DOCTYPE html>
<html>
	<?php include '../resources/templates/header-basic-light.php';?>
	<?php include 'call_api.php';?>
	
	<body>
		<div class="main_body">
			<p id="heading">
				Add some text in the following box and click on the button to see the summary of the text you entered.
			</p>

			<form method="post" action="index.php">
				<textarea name="txtarea" id = "inp" rows = "7"> </textarea>
				<div id = "pad">
					<input type="submit" id = "sub" />
				</div>
			</form>

			<?php
	           if($_SERVER['REQUEST_METHOD']=='POST') {
	               $data = CallAPI( 
					'https://cotomax-summarizer-text-v1.p.mashape.com/summarizer' , 
					$_POST['txtarea']);

					$output = "<script>console.log( 'Debug Objects: " . gettype($data) . "' );</script>";
					echo $output;

					echo $data;
	           } 
	        ?>

		</div>
	</body>
</html>