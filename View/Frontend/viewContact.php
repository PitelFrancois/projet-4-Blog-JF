<?php $this->title = 'Contact ' ?>

<?= $this->session->show('messageFieldsNotFilled') ; ?>
<?= $this->session->show('add_message') ; ?>


<div class="contact">
		<div class="enTete">
			<h2>formulaire de contact</h2>
			<p><em>Pas besoin d'être inscrit pour m'envoyer un message.</em></p>
		</div>
		<form action="index.php?url=addMessage" method="post">
			<label for="pseudo">pseudo</label>
			<input type="text" id="pseudo2" name="pseudo" />
			<label for="mail">Email</label>
			<input type="Email" id="mail" name="mail" />
			<label for="message">Message</label>
			<textarea id="message" name="message"></textarea>
			<input id="button3" type="submit" />
		</form>
	</div>
