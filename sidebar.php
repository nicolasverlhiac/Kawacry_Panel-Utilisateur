			<div class="header-sidebar">
				<img src="<?php echo $_SESSION["url_image"]; ?>" width="80" height="80">
				<h2><?php echo $_SESSION["prenom"]; ?> <?php echo $_SESSION["nom"]; ?></h2>
			</div>

			<ul class="sidebar">
				<li>
					<a href="profil.php" <?php if($f=='profil.php') echo 'class="current"'; ?>>
						Profil <i class="icon-lifebuoy <?php if($f=='profil.php') echo 'current'; ?>"></i>
					</a>
				</li>
				<li>
					<a href="settings.php" <?php if($f=='settings.php') echo 'class="current"'; ?>>
						Paramètres <i class="icon-cog2 <?php if($f=='settings.php') echo 'current'; ?>"></i>
					</a>
				</li>
				<li>
					<a href="donations.php" <?php if($f=='donations.php') echo 'class="current"'; ?>>
						Soutenir <i class="icon-heart <?php if($f=='donations.php') echo 'current'; ?>"></i>
					</a>
				</li>
				<li>
					<a href="inc/logout.php">Déconnexion <i class="icon-logout"></i></a>
				</li>
			</ul>