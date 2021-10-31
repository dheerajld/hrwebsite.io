<?php
$section_main_category = get_theme_mod('walkermag_before_middle_section_main_category');
$walkermag_second_category = get_theme_mod('walkermag_before_middle_section_sidebar_category');
$walkermag_third_category = get_theme_mod('walkermag_before_middle_section_sidebar_category_2');
$walkermag_section_heading_one = get_theme_mod('before_middle_section_main_heading');
$walkermag_section_heading_two = get_theme_mod('before_middle_section_sidebar_heading');
$walkermag_section_heading_three = get_theme_mod('before_middle_section_sidebar_heading_2');
$walkermag_section_ads_image_url= get_theme_mod('before_middle_section_ads_image');
$walkermag_section_ads_image_link= get_theme_mod('before_middle_section_ads_image_link');
$walkermag_section_sidebar = 'before-middle-sidebar';
$walkermag_section_layout = get_theme_mod('walkermag_before_middle_section_section');

if(get_theme_mod('before_middle_section_status')){
	$walkermag_section_args = [
	    'section_main_cat' => $section_main_category,
	    'section_secondary_cat' =>$walkermag_second_category,
	    'section_third_cat' => $walkermag_third_category,
	    'section_heading_one' =>$walkermag_section_heading_one,
	    'section_heading_two' =>$walkermag_section_heading_two,
	    'section_heading_three'=>$walkermag_section_heading_three,
	    'section_ads_image' =>$walkermag_section_ads_image_url,
	    'section_ads_image_link' => $walkermag_section_ads_image_link,
	    'section_sidebar' =>$walkermag_section_sidebar
	];
	set_query_var( 'walkermag_args', $walkermag_section_args );
	if($walkermag_section_layout=='single-cat-style-1'){
		$walkermag_template_part = 'single-category-style-one';
	}
	elseif($walkermag_section_layout=='single-cat-style-2'){
		$walkermag_template_part = 'single-category-style-two';
	}
	elseif($walkermag_section_layout=='single-cat-style-3'){
		$walkermag_template_part = 'single-category-style-three';
	}
	elseif($walkermag_section_layout=='single-cat-style-4'){
		$walkermag_template_part = 'single-category-style-four';
	}
	elseif($walkermag_section_layout=='double-cat-style-1'){
		$walkermag_template_part = 'double-category-style-one';
	}
	elseif($walkermag_section_layout=='double-cat-style-2'){
		$walkermag_template_part = 'double-category-style-two';
	}
	elseif($walkermag_section_layout=='double-cat-style-3'){
		$walkermag_template_part = 'double-category-style-three';
	}
	elseif($walkermag_section_layout=='video-section-1'){
		$walkermag_template_part = 'video-section-one';
	}
	elseif($walkermag_section_layout=='three-cat-style-2'){
		$walkermag_template_part = 'category-style-two';
	}elseif($walkermag_section_layout=='three-cat-style-1'){
		$walkermag_template_part = 'category-style-one';
	}
	else{
		$walkermag_template_part = 'single-category-style-one';
	}
	get_template_part( 'template-parts/partials/layouts/'.$walkermag_template_part);
} ?>