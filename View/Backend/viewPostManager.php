<?php $this->title = "Gestion des chapitres" ; ?>

<?= $this->session->show('add_post'); ?>
<?= $this->session->show('updatePost'); ?>


<div class="dashboard">
    <div class="blockDashboard">
    	<div class="postInfo">
            <div class="postPublish">
                <p>Chapitres publiés</p>
                <p class="count"><?= $countPublishPost ; ?></p>
            </div>
            <div class="postNotPublish">
                <p>Chapitres non publiés</p>
                <p class="count"><?= $countDraftPost ; ?></p>
            </div>
            <div class="newPost">
                <p>Ajouter un chapitre</p>
                <a href="index.php?url=addViewPost"><p class="count"><i class="fas fa-plus"></i></p></a>
            </div>
        </div>
        <div id="listPosts" class="postPublishTable">
            <h2>Liste des chapitres</h2>
            <div class="testPost">
                <div class="theadPost thead thead1">
                    <p class="chapitre">#</p>
                    <p class="titre">Titre</p>
                    <p class="contenus">contenus</p>
                    <p class="date">date</p>
                    <p class="actions">Actions</p>
                </div>
                <?php foreach ($posts as $post) { ?> 
                    <div class="tbody tbody2">
                        <p class="chapitre"><?= $post['chapitre'] ; ?></p>
                        <p class="titre"><?= $post['title'] ; ?></p>
                        <div class="contenus">
                            <p><a href="index.php?url=post&chapter=<?= $post['chapitre']?>" target="_blank" ><?= nl2br(substr($post['content'], 0, 300) . '...') ?></a></p>
                        </div>
                        <p class="date"><?= $post['date_fr'] ; ?></p>
                        <div class="actions">
                            
                            <?php if($post['posted'] == 1) { ?>
                                <a href="index.php?url=draftPost&chapterId=<?= $post['chapitre'] ; ?>"><i class="fas fa-circle"></i></a>
                            <?php } else { ?>
                                <a href="index.php?url=publishPost&chapterId=<?= $post['chapitre'] ; ?>"><i class="fas fa-circle cercle2"></i></a>
                            <?php } ?>
                            <a href="index.php?url=editPost&chapterId=<?= $post['chapitre'] ; ?>"><i class="far fa-edit"></i></a>
                            <a href="index.php?url=deletePost&chapterId=<?= $post['chapitre'] ; ?>"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </div>
                    
                <?php } ?>
            </div>
        </div>
    </div>
</div>