<?php $this->title = "message" ; ?>
<div class="dashboardEdit">
		<div class="edit">
			<div class="f1">
				<?php foreach ($mails as $mail): ?>
			<h2>Message de <?= $mail['pseudo'] ?></h2>
			<p><?= htmlspecialchars($mail['message']) ?></p>
			<p><?= $mail['mail'] ?></p>
			<?php endforeach ; ?>
			</div>
		</div>
	</div>
</div>