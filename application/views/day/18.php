<?php if(empty($chars)): ?>
	<!-- Error message if script could not run -->
	<div data-closable class="callout alert-callout-border alert radius">
		<strong>Error</strong> - The file, or the file's contents were not loaded
		<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php else: ?>

	<div class="row">
		<div class="small-12 columns">
			<?php
				foreach($chars AS $char){
					echo $char;
				}
			?>
		</div>
	</div>

<?php endif; ?>
