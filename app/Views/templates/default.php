<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../Views/css/style.css">
  <script src="../Views/js/autobahn.js"></script>
  <script src="../Views/js/stats.js"></script>
  <script src="../Views/js/script.js"></script>
</head>
<body>
	<header>
		<h1><a class="color-txt" href="index.html">SpeedBouffe</a></h1>
		<nav>
			<ul>
				<li><a class="color-txt active" href="../Home/">Commandes</a></li>
				<li><a class="color-txt" href="../Stats/">Statistiques</a></li>
			</ul>
		</nav>
	</header>
        <?= $content; ?>
</body>
</html>
