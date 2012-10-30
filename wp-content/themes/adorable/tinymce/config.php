<?php

// Buttons shortcode config
$pego_shortcodes['button'] = array(
	'params' => array(
		'color' => array(
			'type' => 'select',
			'label' => __('Button color', 'pego_tr'),
			'desc' => __('Select the button color.', 'pego_tr'),
			'options' => array(
				'mainCol' => 'Main Color',
				'black' => 'Black'
			)
		),
	 'codecol' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button Code Color', 'pego_tr'),
			'desc' => __('Insert the code for the button color. If inserted the selection above(Button color) will be overwritten.', 'pego_tr'),
		),
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'pego_tr'),
			'desc' => __('Add the button\'s url', 'pego_tr')
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Button\'s Size', 'pego_tr'),
			'desc' => __('Select the button\'s size', 'pego_tr'),
			'options' => array(
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'pego_tr'),
			'desc' => __('Add the button\'s text', 'pego_tr'),
		)
	),
	'shortcode' => '[button url="{{url}}"  type="{{type}}" color="{{color}}" codecol="{{codecol}}"] {{content}} [/button]',
	
	
	'popup_title' => __('Insert Button Shortcode', 'pego_tr')
);

//video
$pego_shortcodes['video'] = array(
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Video Type', 'pego_tr'),
			'desc' => __('Select the video type.', 'pego_tr'),
			'options' => array(
				'youtube' => 'Youtube',
				'vimeo' => 'Vimeo'
			)
		),
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Video ID', 'pego_tr'),
			'desc' => __('Inupt the Id of the video.', 'pego_tr')
		)
	),
	'shortcode' => '[{{type}} id="{{id}}"]',
	'popup_title' => __('Insert Video Shortcode', 'pego_tr'),
	'no_preview' => true
);


// columns
$pego_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', 
	'popup_title' => __('Insert Columns Shortcode', 'pego_tr'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Type of the Column', 'pego_tr'),
				'desc' => __('Select the type, which present the width of the column.', 'pego_tr'),
				'options' => array(
					'one_third' => __('One Third','pego_tr'),
					'one_third_last' => __('One Third Last','pego_tr'),
					'two_third' => __('Two Thirds','pego_tr'),
					'two_third_last' => __('Two Thirds Last','pego_tr'),
					'one_half' => __('One Half','pego_tr'),
					'one_half_last' => __('One Half Last','pego_tr'),
					'one_fourth' => __('One Fourth','pego_tr'),
					'one_fourth_last' => __('One Fourth Last','pego_tr'),
					'three_fourth' => __('Three Fourth','pego_tr'),
					'three_fourth_last' => __('Three Fourth Last','pego_tr'),
					'one_fifth' => __('One Fifth','pego_tr'),
					'one_fifth_last' => __('One Fifth Last','pego_tr'),
					'two_fifth' => __('Two Fifth','pego_tr'),
					'two_fifth_last' => __('Two Fifth Last','pego_tr'),
					'three_fifth' => __('Three Fifth','pego_tr'),
					'three_fifth_last' => __('Three Fifth Last','pego_tr'),
					'four_fifth' => __('Four Fifth','pego_tr'),
					'four_fifth_last' => __('Four Fifth Last','pego_tr')
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'pego_tr'),
				'desc' => __('Insert column content.', 'pego_tr'),
			)
		),
		'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
		'clone_button' => __('Add Column', 'pego_tr')
	)
);


// Lists
$pego_shortcodes['list'] = array(
    'params' => array(
		'list_icon' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('List Icon URL', 'pego_tr'),
                'desc' => __('Insert the list icon url.', 'pego_tr')
            )
	),
    'no_preview' => true,
    'shortcode' => '[list icon="{{list_icon}}"] {{child_shortcode}}  [/list]',
    'popup_title' => __('Insert List Shortcode', 'pego_tr'),
    
    'child_shortcode' => array(
        'params' => array(
            'content' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('List Item Content', 'pego_tr'),
                'desc' => __('Insert the list item content.', 'pego_tr')
            )
        ),
        'shortcode' => '[list_li] {{content}} [/list_li]',
        'clone_button' => __('Add List Item', 'pego_tr')
    )
);

//heading
$pego_shortcodes['heading'] = array(
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Heading Type', 'pego_tr'),
			'desc' => __('Select the heading type.', 'pego_tr'),
			'options' => array(
				'h1' => 'H1',
				'h2' => 'H2',
				'h3' => 'H3',
				'h4' => 'H4',
				'h5' => 'H5'
			)
		),
		'content' => array(
			'std' => __('Heading','pego_tr'),
			'type' => 'text',
			'label' => __('Heading content', 'pego_tr'),
			'desc' => __('Input heading content.', 'pego_tr')
		),
		'second_content' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Before content', 'pego_tr'),
			'desc' => __('Input before content.(optional for H1 only)', 'pego_tr')
		)
	),
	'shortcode' => '[{{type}} left="{{second_content}}"]{{content}}[/{{type}}]',
	'popup_title' => __('Insert Heading Shortcode', 'pego_tr')
);



// team
$pego_shortcodes['team'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[team] {{child_shortcode}}  [/team]',
    'popup_title' => __('Insert Team Shortcode', 'pego_tr'),
    
    'child_shortcode' => array(
        'params' => array(
            'img' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Team member image', 'pego_tr'),
                'desc' => __('Insert the team member image.', 'pego_tr')
            ),
			'name' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Team member name', 'pego_tr'),
                'desc' => __('Insert the team member name.', 'pego_tr')
            ),
			'position' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Team member position', 'pego_tr'),
                'desc' => __('Insert the team member position.', 'pego_tr')
            )	
        ),
        'shortcode' => '[team_member  name="{{name}}"  img="{{img}}" position="{{position}}"] {{content}} [/team_member]',
        'clone_button' => __('Add Team Member', 'pego_tr')
    )
);

//img
$pego_shortcodes['img'] = array(
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Image Url', 'pego_tr'),
			'desc' => __('Inupt the image url.', 'pego_tr')
		)
	),
	'shortcode' => '[img url="{{url}}"]',
	'popup_title' => __('Insert Image Shortcode', 'pego_tr'),
	'no_preview' => true
);

//latest portfolio items
$pego_shortcodes['latestportfolio'] = array(
	'params' => array(
		'number' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Number of latest portfolio items', 'pego_tr'),
			'desc' => __('Inupt the number of altest portfolios you want to display.', 'pego_tr')
		)
	),
	'shortcode' => '[latestportfolio number="{{number}}"]',
	'popup_title' => __('Insert Latest Portfolio Item Shortcode', 'pego_tr'),
	'no_preview' => true
);

//columsn with icon
$pego_shortcodes['columnwithicon'] = array(
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Insert columns title', 'pego_tr'),
			'desc' => __('Inupt the title for the columns.', 'pego_tr')
		),
		'icon' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Columns icon', 'pego_tr'),
			'desc' => __('Insert icon url for the column.', 'pego_tr')
		),
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Read more url', 'pego_tr'),
			'desc' => __('Insert url for read more.', 'pego_tr')
		),
		'readmore' => array(
			'std' => __('Read More &rarr;','pego_tr'),
			'type' => 'text',
			'label' => __('Read more text', 'pego_tr'),
			'desc' => __('Insert read more text.', 'pego_tr')
		),
		'content' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Columns content', 'pego_tr'),
			'desc' => __('Input columns content.', 'pego_tr')
		),
	),
	'shortcode' => '[columnwithicon title="{{title}}" icon="{{icon}}" url="{{url}}" readmore="{{readmore}}"]{{content}} [/columnwithicon]',
	'popup_title' => __('Insert columns with icon', 'pego_tr'),
	'no_preview' => true
);


?>