<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<title>Serveur de discussion - Nouvelle Clé</title>
</head>

<body>
	<div class="content">
		<?php
			//echo sqlite_libversion();
			//echo "<br>";
			//echo phpversion();
			//include 'manage_db_auto_clean.php';
		?>

		<h1>Serveur de discussion RetroShare</h1>

			<p>Cet outil vous est proposé pour faciliter l'échange de clés RetroShare. Il vous permettra de vous connecter à des salons de chat pour vous faire des amis.</p>

		<h2>Mode de fonctionnement</h2>

			<ol>
				<li> Vous entrez votre clé RetroShare.</li>
				<li> Sur la page suivante, vous aurez accès à la clé du serveur de chat qui vous permettra d'être mis en contact avec d'autres membres de la communauté.</li>
				<li> Discutez avec les autres utilisateurs et échangez votre clé ! </li>
			</ol>

		<h2>Enregistrement d'une nouvelle clé</h2>

		<form class="contact_form" action="#" method="post" name="contact_form">
			<ul>
				<li>
					 <span class="required_notification">* champs obligatoire</span>
				</li>
				<li>
					<label for="message">Clé RetroShare :</label>
					<textarea name="message" placeholder="Collez votre clé ici" cols="85" rows="10" required ></textarea>
				</li>
				<li>
					<img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image"></img><a class="tip" href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>
					<input name="captcha_code" placeholder="Recopiez le code ici" required size="10" maxlength="6" type="text"></input>    
				</li>
				<li>
					<button class="submit" type="submit">Envoyer</button>
				</li>
			</ul>
		</form>
	</div>
</body>

</html>
