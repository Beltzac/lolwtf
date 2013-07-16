<?php
include 'session_start.php';
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Status do Pedido - Lolwtf Mobile</title>
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
						Status do Pedido
					</div>
                                
                                        <table border='1'>
					<?php
					$form = $_POST['sel'];
					if ($form == 'visa') { 
						echo "<tr><td>Pagamento</td><td>Visa</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr>";
					}
					if ($form == 'master') { 
						echo "<tr><td>Pagamento</td><td>Mastercard</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr>";
					}
					if ($form == 'hiper') { 
						echo "<tr><td>Pagamento</td><td>Hipercard</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr>";
					}
					if ($form == 'diners') { 
                                            echo "<tr><td>Pagamento</td><td>Diners</td></tr>";
                                            echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr>";
					}
					if ($form == 'hsbc') { 
						echo "<tr><td>Pagamento</td><td>Boleto HSBC</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr>";
					}
					if ($form == 'itau') { 
						echo "<tr><td>Pagamento</td><td>Boleto Itau</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr>";
					}
					?>
                                        </table>
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