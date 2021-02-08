<?php $this->title = "Ajout d'un chapitre" ; ?>

<?= $this->session->show('addPostFieldsNotFilled'); ?>

<div class="dashboardEdit">
		<div class="edit">
			<form action="index.php?url=addPost" method="post">
				<label for="chapitre">numéro du chapitre</label>
				<input type="text" id="chapitre" name="chapitre" value="<?= $countPublishPost+1 ; ?>" readOnly="readOnly "/>
				<label for="title">titre</label>
				<input type="text" id="title" name="title" />
				<label for="content">Contenu</label>
				<textarea id="textarea" name="content"></textarea>
				<label for="author">Auteur</label>
				<input type="text" id="author" name="author" value="Jean Forteroche" />
				<input id="button" type="submit" value="Enregistrer avant publication" />
			</form>
		</div>
	</div>
</div>