<header id="header">
	<?= $this->session->show('loginFieldsNotFilled') ; ?>
	<a href="" id="icon"><i class="fas fa-bars"></i></a>
	<nav id="menu">
		<ul>
			<?php
				// Si l'utilisateur est un user
				if ($this->session->get('pseudo')) {
			?>
				<li><a href="index.php"><i class="fas fa-feather-alt"></i>Accueil</a></li>
				<li><a href="index.php?url=postManager">Chapitres</a></li>
				<li><a href="index.php?url=commentManager">Commentaires</a></li>
				<li><a href="index.php?url=messageManager">Messages</a></li>
				<li><a href="index.php?url=logout">déconnexion</a></li>
			<?php 
			} else {
			?>
				<li><a href="index.php"><i class="fas fa-feather-alt"></i>Accueil</a></li>
				<li><a href="index.php?url=posts">Chapitres</a></li>
				<li><a href="index.php?url=about">Jean Forteroche</a></li>
				<li><a href="index.php?url=contact">Contact</a></li>
				<li><a id="connect">Connexion</a></li>
			</ul>
			<div class="windowConnect">
				<form action="index.php?url=login" method="post">
					<label for="pseudo">pseudo</label>
					<input type="text" id="pseudo" name="pseudo" />
					<label for="password">Mot de passe</label>
					<input type="password" id="password" name="password" />
					<input id="button" value="connexion" type="submit" />
				</form>
				<a class="cross"><i class="fas fa-times"></i></a>
			</div>
			<?php		
			} 
			?>
	</nav>
</header>