<footer class="site-footer">
	<img class="logo-icon" src="<?= HTML_PATH_THEME_IMG ?>logo-icon.svg?v2" alt=""/>
	<div class="footer-bar">
		<div class="site-info">
			<p><?= preg_replace('/20\d{2}/', date('Y'), $Site->footer()) ?></p>
			<p>Website by <a href="http://rocketchilli.com">Rocket Chilli</a>, powered by <a href="http://bludit.com">Bludit CMS</a></p>
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
		<div class="page-links">
			<a href="about">About</a>
			<a href="mailto:<?= contactEmail() ?>">Contact</a>
			<?php if ($plugins["all"]["pluginRSS"]->installed()): ?>
				<a href="rss.xml">RSS</a>
			<?php endif ?>
		</div>
	</div>
</footer>
<?php Theme::plugins("siteBodyEnd") ?>
