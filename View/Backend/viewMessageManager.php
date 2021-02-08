<?php $this->title = "Gestion des mails" ; ?>

<?= $this->session->show('erreurMail'); ?>


<div class="dashboard">
    <div class="blockDashboard">
    	<div class="mailInfo">
            <div class="mailRead">
                <p>Nouveau message</p>
                <p class="count"><?= $countReadMail ; ?></p>
            </div>
            <div class="mailNoRead">
                <p>message lu</p>
                <p class="count"><?= $countNotReadMail ; ?></p>
            </div>
        </div>
        <div class="mailReadTable">
            <h2>Nouveau message</h2>
            <div class="theadMail thead thead1">
                <p class="pseudo">pseudo</p>
                <p class="contenus">contenus</p>
                <p class="date">date</p>
                <p class="email">email</p>
                <p class="actions">Actions</p>
            </div>
            <?php foreach ($mails as $mail) { ?> 
                <div class="tbody tbody3">
                    <p class="pseudo"><?= htmlspecialchars($mail['pseudo']) ; ?></p>
                    <p class="contenus"><a href="index.php?url=readMail&mailId=<?= $mail['id'] ; ?>"><?= htmlspecialchars(nl2br(substr($mail['message'], 0, 100) . '...')) ?></a></p>
                    <p class="date"><?= $mail['date_fr'] ; ?></p>
                    <p class="email"><?= htmlspecialchars($mail['mail']) ; ?></p>
                    <div class="actions">
                        <a href="index.php?url=deleteMessage&mailId=<?= $mail['id'] ; ?>"><i class="far fa-trash-alt"></i></a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="mailNotReadTable">
            <h2>Message lu</h2>
            <div class="theadMail thead thead2">
                <p class="pseudo">pseudo</p>
                <p class="contenus">contenus</p>
                <p class="date">date</p>
                <p class="email">email</p>
                <p class="actions">Actions</p>
            </div>
            <?php foreach ($getListNotReadMails as $getListNotReadMail) { ?> 
                <div class="tbody tbody3">
                    <p class="pseudo"><?= htmlspecialchars($getListNotReadMail['pseudo']) ; ?></p>
                    <p class="contenus"><a href="index.php?url=readMail&mailId=<?= $getListNotReadMail['id'] ; ?>"><?= htmlspecialchars(nl2br(substr($getListNotReadMail['message'], 0, 100) . '...')) ; ?></a></p>
                    <p class="date"><?= htmlspecialchars($getListNotReadMail['date_fr']) ; ?></p>
                    <p class="email"><?= htmlspecialchars($getListNotReadMail['mail']) ; ?></p>
                    <div class="actions">
                        <a href="index.php?url=deleteMessage&mailId=<?= $getListNotReadMail['id'] ; ?>"><i class="far fa-trash-alt"></i></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>    
