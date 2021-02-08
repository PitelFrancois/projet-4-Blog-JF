<?php $this->title = 'Connexion ' ?>

<div class="connexion">
	
<div class="enTete">
	<h2>formulaire de connexion</h2>
</div>
<form action="index.php?url=login" method="post">
	<label for="pseudo">pseudo</label>
	<input type="text" id="pseudo" name="pseudo" />
	<label for="password">Mot de passe</label>
	<input type="password" id="password" name="password" />
	<input id="button" value="connexion" type="submit" />
</form>
</div>