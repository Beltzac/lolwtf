<?php
include 'session_start.php';
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Minha conta - Lolwtf Mobile</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script type="text/javascript" src="js/boxOver.js"></script>

		<link rel="stylesheet" href="jquery-ui.min.css" />
		<script src="js/jquery-2.0.2.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>

		<script>
			$(function() {
				$("#accordion").accordion();

				$("#datepicker").datepicker({
					dateFormat : "dd/mm/yy",
					dayNames : ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
					dayNamesMin : ["D", "S", "T", "Q", "Q", "S", "S"],
					dayNamesShort : ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
					monthNames : ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
					monthNamesShort : ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
					nextText : "Próximo",
					prevText : "Anterior",
					weekHeader : "Semana",
					changeMonth : true,
					changeYear : true
				});

			});
		</script>

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

					<div id="accordion">

						<h3>Detalhes da minha conta</h3>

						<div>

							<div class="contact_form">

								<div class="form_row">
									<label class="contact"><strong>Nome completo:</strong></label>
									<input type="text" class="contact_input" />
								</div>

								<div class="form_row">
									<label class="contact"><strong>Email:</strong></label>
									<input type="text" class="contact_input" />
								</div>

								<div class="form_row">
									<label class="contact"><strong>Telefone:</strong></label>
									<input type="text" class="contact_input" />
								</div>

								<div class="form_row">
									<label class="contact"><strong>RG:</strong></label>
									<input type="text" class="contact_input" />
								</div>

								<div class="form_row">
									<label class="contact"><strong>CPF:</strong></label>
									<input type="text" class="contact_input" />
								</div>

								<div class="form_row">
									<label class="contact"><strong>Data de nascimento:</strong></label>
									<input type="text" class="contact_input" id="datepicker" />
								</div>
								
									<div class="form_row">
									<label class="contact"><strong>Senha antiga:</strong></label>
									<input type="password" class="contact_input" />
								</div>

	<div class="form_row">
									<label class="contact"><strong>Senha nova:</strong></label>
									<input type="password" class="contact_input" />
								</div>


								<div class="form_row">
									<a href="#" class="prod_details">Atualizar</a>
								</div>

							</div>

						</div>

						<h3> endereços</h3>

						<div>

							<div class="contact_form">

								<div class="form_row">
									<label class="contact"><strong>Rua:</strong></label>
									<input type="text" class="contact_input" />
								</div>

								<div class="form_row">
									<label class="contact"><strong>CEP:</strong></label>
									<input type="text" class="contact_input" />
								</div>

								<div class="form_row">
									<label class="contact"><strong>Número:</strong></label>
									<input type="text" class="contact_input" />
								</div>

								<div class="form_row">
									<label class="contact"><strong>Complemento:</strong></label>
									<input type="text" class="contact_input" />
								</div>

								<div class="form_row">
									<a href="#" class="prod_details">Atualizar</a><a href="#" class="prod_details">Excluir</a>
								</div>

							</div>

						</div>

					</div>

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