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

					<?php
					$form = $_POST['sel'];
					if ($form == 'v1') {
						echo "<table border='1'><tr><td>Pagamento</td><td>Visa</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr></table>";
					}
					if ($form == 'v2') {
						echo "<table border='1'><tr><td>Pagamento</td><td>Mastercard</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr></table>";
					}
					if ($form == 'v3') {
						echo "<table border='1'><tr><td>Pagamento</td><td>Hipercard</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr></table>";
					}
					if ($form == 'v4') {
						echo "<table border='1'><tr><td>Pagamento</td><td>Diners</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr></table>";
					}
					if ($form == 'v5') {
						echo "<table border='1'><tr><td>Pagamento</td><td>Boleto HSBC</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr></table>";
					}
					if ($form == 'v6') {
						echo "<table border='1'><tr><td>Pagamento</td><td>Boleto Itau</td></tr>";
						echo "<tr><td>Status</td><td>Aguardando pagamento</td></tr></table>";
					}
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