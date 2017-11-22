<footer class="site-footer">
	<img class="logo-icon" src="<?= HTML_PATH_THEME_IMG ?>logo-icon.svg" alt=""/>
	<div class="footer-bar">
		<div class="page-links">
			<a href="about">About</a>
			<a href="contact">Contact</a>
		</div>
		<div class="social-links">
			<?php if ($Site->facebook()): ?>
				<a class="icon facebook" href="<?= $Site->facebook() ?>" title="Facebook"></a>
			<?php endif ?>
			<?php if ($Site->twitter()): ?>
				<a class="icon twitter" href="<?= $Site->twitter() ?>" title="Twitter"></a>
			<?php endif ?>
			<?php if ($Site->instagram()): ?>
				<a class="icon instagram" href="<?= $Site->instagram() ?>" title="Instagram"></a>
			<?php endif ?>
		</div>
		<div class="site-info">
			<p>Copyright Rikki-Lea James 2017 - All rights reserved</p>
			<p>Website by <a href="http://rocketchilli.com">Rocket Chilli</a>, powered by <a href="http://bludit.com">Bludit CMS</a></p>
		</div>
	</div>
</footer>
