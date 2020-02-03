<?php
	// Creates new pattern per-line
	function generate_pattern($repeats, $pattern){
		$new_pattern = [];
		foreach($pattern AS $p){
			// Repeat each pattern number, per number of times
			foreach(range(1, $repeats) AS $repeat){
				$new_pattern[] = $p;
			}
		}
		// Append original start to end, skip the first in pattern
		$new_pattern[] = $new_pattern[0];
		array_shift($new_pattern);
		return $new_pattern;
	}

	function get_offset($input, $start = 0, $length = 7){
		$offset = "";
		foreach(range($start, ($length - 1)) AS $index){
			$offset .= $input[$index];
		}
		return $offset;
	}

	// Repeat the input as many times as needed
	function generate_input($input, $repeat){
		$output = $input;
		foreach(range(1, $repeat) AS $r){
			$output = array_merge($output, $input);
		}
		return $output;
	}
?>

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
				$offset = get_offset($chars);

				//$chars = generate_input($chars, $input_repeat);
				//die;


				//var_dump($offset);
				//die;

				$phases = [];

				foreach(range(1, $phasecount) AS $phaseIndex => $p){

					$phases[$phaseIndex] = "";

					if(!empty($phaseIndex)){
						$chars = str_split($phases[($phaseIndex - 1)]);
					}

					foreach(range(1, count($chars)) AS $lineIndex => $lines){
						$use_pattern = generate_pattern(($lineIndex+1), $pattern);
						$output = 0;
						foreach($chars AS $index => $char){
							$output += $char * $use_pattern[$index % count($use_pattern)];
						}
						$phases[$phaseIndex] .= abs($output % 10);
					}
				}

				echo "Day 16, Part I Answer: ".substr(end($phases), 0, 8);
			?>
		</div>
	</div>

<?php endif; ?>
