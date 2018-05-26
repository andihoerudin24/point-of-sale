<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pagination') ) 
{
	function pagination($total_rows, $per_page, $url = null, $uri_segment = 3)
	{
		$ci =& get_instance();

		if (is_null($url)) {
			$segment[] = $ci->router->class;
			$segment[] = $ci->router->method;
			$url = implode("/", $segment);
		}

		$config['base_url']    = site_url($url);
		$config['total_rows']  = $total_rows;
		$config['uri_segment'] = $uri_segment;
		$config['per_page']    = $per_page;

		$ci->load->library('pagination');		
		$ci->pagination->initialize($config);
		return $ci->pagination->create_links();
	}
}