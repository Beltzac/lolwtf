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
							<INPUT TYPE='RADIO' NAME='OP' VALUE='credito' >Cartao de Credito<br/>
							<INPUT TYPE='RADIO' NAME='OP' VALUE='boleto' > Boleto Bancario<br/>
							<input type='submit' value='Continuar'>
						</form>
						<?php }
					?>
					
					
					
					<?php
						if(!empty($_POST['OP'])){
						$form=$_POST['OP'];
						if($form=="credito"){ ?>
							<form action='statusPedido.php' method='post'>
								<select name='sel'> <option value='visa'>Visa</option> 
								<option value='master'>Mastercard</option> 
								<option value='hiper'>Hipercard</option> 
								<option value='diners'>Diners</option> </select> 
								<input type='submit' value='Continuar'> 
							</form>
						<?php }
						else { ?>
							<form action='statusPedido.php' method='post'>
								<select name='sel'> 
									<option value='hsbc'>HSBC</option> 
									<option value='itau'>Itau</option> 
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