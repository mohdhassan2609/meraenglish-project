<?php

	function single_image_row($page_section_id, $grid, $tis)
	{
		$info['page_section_id'] = $page_section_id;
		$info['grid'] = $grid;
		$tis->common_model->insert('tbl_image_with_link', $info);
	}
	
	function new_common_inputs_row($page_section_id, $option_name, $tis)
	{
		$info['page_section_id'] = $page_section_id;
		$info['option_name'] = $option_name;
		$info['value'] = "";
		$tis->common_model->insert('tbl_common_inputs', $info);
	}