<?php $this->title = "Page d'accueil" ; ?>

<div class="home">
	<div class="accroche">
		<?php $imgHome = "Public/IMG/imgFront.jpg" ; ?>
		<img id="imgHome" src="<?= $imgHome ; ?>">
		<div class="accrocheText">
			<h1>Un billet simple pour <span>l'alaska</span></h1>
			<h2>Jean Forteroche</h2>
		</div>
	</div>

	<div class="homeContent1">
    	<h2>Bienvenue sur mon blog</h2>
		<p>Je suis <span class="bold">Jean Forteroche</span>, écrivain !</p>
		<p>Depuis quelque temps maintenant, j'ai commencé l'écriture de mon nouveau roman <span class="bold">"Billet simple pour l'Alaska"</span>.</p> 
		<p>Cependant, j'ai voulu innover en publiant mon roman sur mon blog. Le fonctionnement est très simple, je publie régulièrement par "<span class="bold">épisodes</span>", des petits chapitres de mon roman.</p>
		<p><span class="bold">Vous pouvez consulter le dernier chapitre juste en dessous.</span></p>
	</div>

	<?php foreach ($lastPosts as $lastPost): ?>
		<div class="post">
    		<div>
    			<h2><?= $lastPost['title'] ?></h2>
    			<h3><em>Publié le <?= $lastPost['date_fr'] ?></em></h3>
    			<p><?= nl2br(substr($lastPost['content'], 0, 500) . '...') ?></p>
    			<a href="index.php?url=post&chapter=<?= $lastPost['chapitre'] ?>"><button>Lire la suite</button></a>
    		</div>
    	</div>
	<?php endforeach ; ?>
</div>