<?php $this->title = 'Liste des chapitres' ?>

<div class="posts">
	<?php foreach ($posts as $post): ?>

    	<div class="post">
    		<div>
    			<h2><?= $post['title'] ?></h2>
    			<h3><em>Publié le <?= $post['date_fr'] ?></em></h3>
    			<p><?= nl2br(substr($post['content'], 0, 500) . '...') ?></p>
    			<a href="index.php?url=post&chapter=<?= $post['chapitre'] ?>">Lire la suite</a>
    		</div>
    	</div>

<?php endforeach ; ?>
</div>