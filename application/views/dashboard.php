<?php
// Load Menu
$this->template->top('dashboard');
$this->template->menu('dashboard');
?>
 
<div id="container">
 	<ng-view></ng-view>
</div>