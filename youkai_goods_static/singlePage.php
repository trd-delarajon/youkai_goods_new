<?php
// Comparison function
function cmp($a, $b) {
	if ($a == $b) {
		return 0;
	}
	return ($a < $b) ? -1 : 1;
}

// Array to be sorted
$array = array('a' => 4, 'b' => 8, 'c' => -1, 'd' => -9, 'e' => 2, 'f' => 5, 'g' => 3, 'h' => -4);
echo '<pre>';
print_r($array);
echo '</pre>';

// Sort and print the resulting array
uasort($array, 'cmp');

echo '<pre>';
print_r($array);
echo '</pre>';

?>