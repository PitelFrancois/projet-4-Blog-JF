<?php $this->title = "Gestion des commentaires" ; ?>
<div class="dashboard">
    <div class="blockDashboard">
        <div class="commentInfo">
            <div class="validateComment">
                <p>Commetaires en attente de validation</p>
                <p class="count"><?= $countValidatecomments ; ?></p>
            </div>
            <div class="signalComment">
                <p>Commentaires signalés</p>
                <p class="count"><?= $countSignalComments ; ?></p>
            </div>
            <div class="publishComment">
                <p>Commentaires publiés</p>
                <p class="count"><?= $countPublishComment ; ?></p>
            </div>
        </div>
        <div class="commentValidationTable">
            <h2>Commentaires en attente de validation</h2>
            <div class="theadComment thead thead1">
                <p class="pseudo">pseudo</p>
                <p class="chapitre">#</p>
                <p class="contenus">contenus</p>
                <p class="date">date</p>
                <p class="actions">Actions</p>
            </div>
            <?php foreach ($comments as $comment) { ?> 
                <div class="tbody tbody1">
                    <p class="pseudo"><?= htmlspecialchars($comment['author']) ; ?></p>
                    <p class="chapitre"><?= htmlspecialchars($comment['post_id']) ; ?></p>
                    <p class="contenus"><?= htmlspecialchars($comment['content']) ; ?></p>
                    <p class="date"><?= htmlspecialchars($comment['date_fr']) ; ?></p>
                    <div class="actions">
                        <a href="index.php?url=validateComment&commentId=<?= $comment['id'] ; ?>"><i class="far fa-check-circle"></i></a>
                        <a href="index.php?url=deleteComment&commentId=<?= $comment['id'] ; ?>"><i class="far fa-trash-alt"></i></a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="signalCommentTable">
                <h2>Commentaires signalés</h2>
                <div class="theadComment thead thead2">
                    <p class="pseudo">pseudo</p>
                    <p class="chapitre">#</p>
                    <p class="contenus">contenus</p>
                    <p class="date">date</p>
                    <p class="actions">Actions</p>
                </div>
                <?php foreach ($signalListComments as $signalListComment) { ?> 
                    <div class="tbody tbody1">
                        <p class="pseudo"><?= htmlspecialchars($signalListComment['author']) ; ?></p>
                        <p class="chapitre"><?= htmlspecialchars($signalListComment['post_id']) ; ?></p>
                        <p class="contenus"><?= htmlspecialchars($signalListComment['content']) ; ?></p>
                        <p class="date"><?= htmlspecialchars($signalListComment['date_fr']) ; ?></p>
                        <div class="actions">
                            <a href="index.php?url=validateSignalComment&commentId=<?= $signalListComment['id'] ; ?>"><i class="far fa-check-circle"></i></a>
                            <a href="index.php?url=deleteComment&commentId=<?= $signalListComment['id'] ; ?>"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="publishCommentTable">
                <h2>Commentaires publiés</h2>
                <div class="theadComment thead thead3">
                    <p class="pseudo">pseudo</p>
                    <p class="chapitre">#</p>
                    <p class="contenus">contenus</p>
                    <p class="date">date</p>
                    <p class="actions">Actions</p>
                </div>
                <?php foreach ($listComments as $listComment) { ?> 
                    <div class="tbody tbody1">
                        <p class="pseudo"><?= htmlspecialchars($listComment['author']) ; ?></p>
                        <p class="chapitre"><?= htmlspecialchars($listComment['post_id']) ; ?></p>
                        <p class="contenus"><?= htmlspecialchars($listComment['content']) ; ?></p>
                        <p class="date"><?= htmlspecialchars($listComment['date_fr']) ; ?></p>
                        <div class="actions">
                            <a href="index.php?url=deleteComment&commentId=<?= $listComment['id'] ; ?>"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
    </div>
</div>