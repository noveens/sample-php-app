<!DOCTYPE html>
<html>
	<?php include '../resources/templates/header-basic-light.php';?>
	<?php include 'call_api.php';?>
	<?php session_start() ?>

	<script type="text/javascript" src="js/index.js"></script>
	
	<body>
		<div class="main_body">
			<p id="heading">
				Add some text in the following box and click on the button to see the summary of the text you entered.
			</p>

			<form method="post">
				<textarea name="txtarea" id = "inp" class = "inp" rows = "7"><?php echo $data['inp']; ?></textarea>
				<input type="submit" value="Summarize !" id = "sub" />
			</form>

			<?php
				if($_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$data['inp'] = $_POST['txtarea'];
					
					$data['ans'] = CallAPI( 
						'https://cotomax-summarizer-text-v1.p.mashape.com/summarizer' , 
						$_POST['txtarea']
					);
				}
			?>

			<textarea name="txtarea" id = "inp2" class = "inp" rows = "7"><?php echo $data['ans']; ?></textarea>

		</div>
	</body>
</html>