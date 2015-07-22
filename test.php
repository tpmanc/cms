<?php
$t = [
	'm1' => 'main 1',
	'm2' => 'main 2',
];

$arr = [
	'm1',
	[
		's11',
	],
	[
		't' => 's12',
		[
			'ss11',
		],
		[
			'ss12',
		],
	],
	[
		's13',
		[
			'ss11',
		],
		[
			'ss12',
			[
				'sss11',
			],
		],
	],
	[
		's14',
	],

	'm2',
	[
		's21',
	],
];


function get_child($arr, $t, $level=0) {
    $res = '<ul>';
    if(is_array($arr)){
        foreach ($arr as $k => $value) {
            if (is_array($value)) {
            	$res .= get_child($value,$level+1);
            }
            if (is_string($value)) {
            	$res .= '<li>' . $t[$value] . '</li>';
            }
        }
    }
    $res .= '</ul>';
    return $res;
}
echo get_child($arr, $t);