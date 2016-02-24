<!DOCTYPE html>
<?php
ini_set( 'display_errors', true );
error_reporting( E_ALL );
$pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$pc = $pagina;
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>King of Eletro - Oficial</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">king of eletro</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="musicas.php">Músicas</a></li>
						<li><a href="contato.php">Contato</a></li>
						<li><a href="radio.php" class="button special">Rádio</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2>Bem vindo a King of Eletro.</h2>
				<p>Music for your life</p>
				<ul class="actions">
					<!--<li>
						<a href="#" class="button big">Lorem ipsum dolor</a>
					</li>-->
				</ul>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Novas Músicas ou mais tocadas</h2>
						<p>Faça download das melhores músicas do momento</p>
					<!--	<p>Lorem ipsum dolor sit amet, delectus consequatur, similique quia!</p>-->
					</header>

			</section>

			<section id="main" class="wrapper">
			<div class="container">


<?
					include "config.php";
					$total_reg = "5";


					$inicio = $pc - 1;
  				$inicio = $inicio * $total_reg;

					$sql = mysql_query("SELECT * FROM musicas_home order by guid desc LIMIT $inicio,$total_reg");
					$tr = mysql_num_rows($sql); // verifica o número total de registros
					$tp = $tr / $total_reg; // verifica o número total de páginas


					while($linha = mysql_fetch_array($sql)){
						$titulo= $linha["titulo"];
						$texto= $linha["texto"];
						$downloadlink = $linha["downloadlink"];
						$nomearquivo= $linha["nomearquivo"];
						$musicalink= $linha["musicalink"];



		echo	"<header>";
		echo	"<h3>$titulo</h3>";
		echo	"<p>$texto</p>";
		echo	"<ul class='actions'>";
		echo  "<li><a href='$downloadlink' class='button icon fa-download'>Download</a></li>";
		echo	"<li><audio controls='controls' preload='preload' title='Abaçaiado - O Teatro Mágico'> <source type='audio/ogg' src='$musicalink' /> <source type='audio/mpeg' src='$musicalink' /> <a href='$musicalink'>ue</a> </audio></li>";
		echo	"</ul>";
		echo	"<hr />";
		echo	"</header>";

	}
	$anterior = $pc -1;
	$proximo = $pc +1;

	echo  "<ul class='actions'>";

	if ($pc>1) {
		echo "<li><a href='?pagina=$anterior' class='button alt small'>Anterior</a></li> ";
	}


	if ($pc<$tp) {
		echo "<li><a href='?pagina=$proximo'class='button alt small'>Próxima</a></li> ";

	}

	if ($pc=$tp) {
		echo "<li><a href='?pagina=$proximo'class='button alt small'>Próxima</a></li> ";
		echo "</ul>";
 }

mysql_close($conexao);
?>
		</div>
	</section>
					<footer>
						<div>
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- wordpress -->
							<ins class="adsbygoogle"
							     style="display:block"
							     data-ad-client="ca-pub-3917397657053754"
							     data-ad-slot="4746746424"
							     data-ad-format="auto"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
						</div>
					</footer>


		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>King of Eletro</h3>
								<ul class="unstyled">
									<li><a href="#">Rádio Online</a></li>
									<li><a href="#">Pedir uma música</a></li>
									<li><a href="#">Músicas</a></li>
									<li><a href="#">Download</a></li>
									<li><a href="#">Sobre</a></li>
								</ul>
							</section>

						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; King of Eletro. All rights reserved.</li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>