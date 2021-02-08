<?php foreach ($posts as $post): ?>

<?php $this->title = 'chapitre n°' . $post['chapitre'] ?>

<?= $this->session->show('add_comment') ; ?>
<?= $this->session->show('signal_comment') ; ?>
<?= $this->session->show('commentFieldsNotFilled') ; ?>
<?= $this->session->show('signalCommentNotId') ; ?>

<div class="postSolo">

    <div class="controlChapter">
        <?php
        if ($post['chapitre'] > 1) {

    ?>
            <a href="index.php?url=post&chapter=<?= $post['chapitre'] - 1 ?>">
                <div class="previewChapter">
                    <i class="fas fa-caret-square-left"></i>
                    <p>Chapitre précedent</p>
                </div>
            </a>
    <?php
        } 
        if ($post['chapitre'] < $countPublishPost ) {
    ?>       
            <a href="index.php?url=post&chapter=<?= $post['chapitre'] + 1 ?>"> 
                <div class="nextChapter">
                <p>Chapitre suivant</p>
                <i class="fas fa-caret-square-right"></i>
                </div>
            </a>
    <?php
        } 
    ?>
    </div>
    <h2><?= $post['title'] ?></h2>
    <h3><em>Publié le <?= $post['date_fr'] ?></em></h3>
    <p><?= nl2br($post['content']) ?></p>
</div>

<div class="formComment">
    <div class="textComment">
        <h2>Commentaire</h2>
        <p>N'hésitez pas à dire si chapitre vous a plus ou non.</p>
        <p><em>Pas besoin d'être inscrit pour laiser un commentaire.</em></p>
    </div>
    <div class="form">
        <form action="index.php?url=addComment&chapter=<?= $post['chapitre'] ?>" method="post">
            <label for="author">pseudo</label><br />
            <input type="text" id="author" name="author" />
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
            <input id="button2" type="submit" />
        </form>
    </div>
</div>



<div id=comments class="comments">
    <h2>Commentaires à propos du chapitre "<?= $post['title'] ?>"</h2>
    <?php endforeach ; ?>
    <?php foreach ($comments as $comment): ?>
    <div class="box">
        <div class="box2">
            <h3><?= $comment['author'] ?></h3>
            <p><em>Le <?= $comment['date_fr'] ?></em></p>
            <p><?= $comment['content'] ?></p>
            <?php
                if($comment['signalComment'] == 1) {
            ?>
                <p>Ce commentaire à été signalé.</p>
            <?php        
                } elseif ($comment['al_ready_signal'] == 1) {
            ?>
                <p>Ce commentaire à déja été signalé puis validé par Jean Forteroche.</p>
            <?php
                } elseif ($comment['signalComment'] == 0) {
            ?>
                <a href="index.php?url=signalComment&commentId=<?= $comment['id'] ; ?>&chapterId=<?= $comment['post_id'] ; ?>"><button>signaler</button></a>
            <?php
                } 
            ?>
        </div>
    </div>
    <?php endforeach ; ?>

</div>