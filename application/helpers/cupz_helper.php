<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('nav_in'))
{
	function nav_in($param = array())
	{
		return ($this->uri->segment($param['uri']) == $param['url']) ? 'in' : null;
	}
}