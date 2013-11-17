#!/usr/bin/env php
<?php
function max_from_left($values) {
	$max = 0;
	$max_values = array();
	
	foreach ($values as $i) {
		if ($i > $max) {
			$max = $i;
		}
		$max_values[] = $max;
	}
	
	return $max_values;
}

function max_from_right($values) {
	# pass max_from_left reversed values and reverse
	return array_reverse(max_from_left(array_reverse($values)));
}

function water_volume($land) {
	$l_max = max_from_left($land);
	$r_max = max_from_right($land);
	
	assert(count($l_max) == count($r_max));
	
	# contour = water + land
	$contour = array();
	for ($i = 0; $i < count($l_max); $i++) {
		$x = $l_max[$i];
		$y = $r_max[$i];
		$contour[] = min($x, $y);
	}

	assert(count($land) == count($contour));
	
	# water = contour - land
	$water = array();
	for ($i = 0; $i < count($land); $i++) {
		$x = $contour[$i];
		$y = $land[$i];
		$water[] = $x - $y;
	}
	
	$volume = array_sum($water);
	
	return $volume;
}

$land = array(2, 3, 5, 1, 2, 3, 4, 7, 7, 6);

print water_volume($land) . "\n";
?>
