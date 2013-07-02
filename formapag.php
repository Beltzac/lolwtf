<?php
include 'session_start.php';
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title>Forma de pagamento - Lolwtf Mobile</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script type="text/javascript" src="js/boxOver.js"></script>
	</head>
	<body>

		<div id="main_container">

			<?php
			include ('header.php');
			?>

			<div id="main_content">

				<?php
				include ('menu.php');
				include ('menuEsquerda.php');
				?>

				<div class="center_content">
					
					<div class="center_title_bar">
						Forma de Pagamento:
					</div>
					
					<?php
						if(empty($_POST['OP'])){?>
						<form method='post' action='formapag.php'>
							<INPUT TYPE='RADIO' NAME='OP' VALUE='op1' >Cartao de Credito<br/>
							<INPUT TYPE='RADIO' NAME='OP' VALUE='op2' > Boleto Bancario<br/>
							<input type='submit' value='Continuar'>
						</form>
						<?php }
					?>
					
					
					
					<?php
						if(!empty($_POST['OP'])){
						$form=$_POST['OP'];
						if($form=="op1"){ ?>
							<form action='pedido.php' method='post'>
								<select name='sel'> <option value='v1'>Visa</option> 
								<option value='v2'>Mastercard</option> 
								<option value='v3'>Hipercard</option> 
								<option value='v4'>Diners</option> </select> 
								<input type='submit' value='Continuar'> 
							</form>
						<?php }
						else { ?>
							<form action='pedido.php' method='post'>
								<select name='sel'> 
									<option value='v5'>HSBC</option> 
									<option value='v6'>Itau</option> 
								</select> 
								<input type='submit' value='Continuar'>
							</form>
						<?php }	}					
					?>
					

					
					
					

					
				
					
					

				</div><!-- center -->

				<?php
				include ('menuDireita.php');
				?>
			</div><!-- main index -->

			<?php
			include ('footer.html');
			?>
		</div>
	</body>
</html>