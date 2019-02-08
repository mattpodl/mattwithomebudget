<?php
script('mattwithomebudget', 'script');
style('mattwithomebudget', 'style');
?>

<div id="app">
	<div id="app-navigation">
		<?php print_unescaped($this->inc('navigation/index')); ?>
		<?php print_unescaped($this->inc('settings/index')); ?>
	</div>

	<div id="app-content">
		<div id="app-content-wrapper">
			<?php 
				$content = 'content/'.$_['content'];
				print_unescaped($this->inc($content));
			?>
		</div>
	</div>
</div>

