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
						if(empty($_POST['pagamento'])&&empty($_POST['pagamento2'])){?>
						<form method='post' action='formapag.php'>
							<INPUT TYPE='RADIO' NAME='pagamento' VALUE='credito' >Cartao de Credito<br/>
							<INPUT TYPE='RADIO' NAME='pagamento' VALUE='boleto' > Boleto Bancario<br/>
							<input type='submit' value='Continuar'>
						</form>
						<?php }
					?>
					
					
					
					<?php
						if(!empty($_POST['pagamento'])&&empty($_POST['pagamento2'])){
						$form=$_POST['pagamento'];
						if($form=="credito"){ ?>
							<form action='formapag.php' method='post'>
								<select name='pagamento2'> <option value='visa'>Visa</option> 
								<option value='master'>Mastercard</option> 
								<option value='hiper'>Hipercard</option> 
								<option value='diners'>Diners</option> </select> 
								<input type='submit' value='Continuar'> 
							</form>
						<?php }
						else { ?>
							<form action='formapag.php' method='post'>
								<select name='pagamento2'> 
									<option value='hsbc'>HSBC</option> 
									<option value='itau'>Itau</option> 
								</select> 
								<input type='submit' value='Continuar'>
							</form>
						<?php }	}					
					?>
                                    
                                    <?php 
                                    //scsa
                                        if(!empty($_POST['pagamento2'])){
                                            $forma=$_POST['pagamento2'];
                                            ?>
                                    <form action='dao/pedidoAction.php' method='post'>
                                        <input type='hidden' name='pagamento' value='<?php echo $forma; ?>'>
                                        <select name='envio'>
                                            <option value='pac'>PAC</option>
                                            <option value='sedex'>Sedex</option>
                                            <option value='freteiro'>Cometa Express</option>
                                        </select>
                                        <input type='submit' value='Finalizar'>
                                    </form>
                                            
                                       <?php }
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