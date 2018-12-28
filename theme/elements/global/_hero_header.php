<header class="header">
	<div class="container">
		<div class="row justify-content-between align-items-center">
				
			<div class="brand">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<span class="brand__logo icon-logo-white-full-v">
					
				</span>
				</a>
			</div>
		
		
			<div class="nav">
				<div class="nav--desktop hidden-md-down">
					<?php MOZ_Menu::nav_menu('primary'); ?>
				</div>
				<div class="toggle-mobile-menu hidden-lg-up">
					<a href="javascript:void(0);">
						<span class="icon-mobile-menu"></span>
					</a>
				</div>
			</div>

			
		</div>
	</div>
</header>