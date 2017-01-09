<?php
// Load Menu
$this->template->top('users');
?>
<div id="main">
	<div class="wrapper">
    <?php $this->template->menu('users'); ?>
		<section id="content">
            <div id="container" class="container-fluid">
 				<ng-view></ng-view>
 			</div>
		</section>
    </div>
</div>