<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Main extends REST_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->helper('html');
		

	}

	function testsky_get()
	{

		$result = file_get_contents('http://partners.api.skyscanner.net/apiservices/browsequotes/v1.0/GB/GBP/en-GB/UK/anywhere/anytime/anytime?apiKey=hck11771716567529700800748989040');

		$result = json_decode($result, true);
		unset('')
		foreach($result as $key => $value)
		{
			foreach($value as $key1 => $value1)
			{
				if(isset($value1['QuoteId']))
				{

				}
					
			}
		}
		
	}


}