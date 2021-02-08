<?php $this->title = "Edition d'un chapitre" ; ?>
<div class="dashboardEdit">
		<div class="edit">
			<?php foreach ($posts as $post): ?>
			<form action="index.php?url=updatePost&postId=<?= $post['id'] ; ?>" method="post">
				<label for="chapitre">numéro du chapitre</label>
				<input type="text" id="chapitre" name="chapitre" value="<?= $post['chapitre'] ?>" />
				<label for="title">titre</label>
				<input type="text" id="title" name="title" value="<?= $post['title'] ?>"/>
				<label for="content">Contenu</label>
				<textarea id="textarea" name="content"><?= $post['content'] ; ?></textarea>
				<label for="author">Auteur</label>
				<input type="text" id="author" name="author" value="<?= $post['author'] ?>" />
				<input id="button" type="submit" value="mettre à jour" />
			</form>
			<?php endforeach ; ?>
		</div>
	</div>
</div>