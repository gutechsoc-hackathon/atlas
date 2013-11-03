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

		/*
		$place_id = array();

		$count = count($result['Places']); 
		echo $count;


		for($i=0; $i<count($result['Places']); $i++)
		{
			$place_id = $result['PlaceId'];
		}

		print_r($place_id);*/


		//initiaize
		$ch = curl_init();
		//set the url
		$url = 'http://partners.api.skyscanner.net/apiservices/browsequotes/v1.0/GB/GBP/en-GB/UK/anywhere/anytime/anytime?apiKey=hck11771716567529700800748989040';		
		//set options		
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);		
		//execute 
		$result = curl_exec($ch); 
		//close curl session / free resources
		curl_close($ch);
		//decode the json string into an array
		$result = json_decode($result, true);

		unset($result['Quotes']);
		unset($result['Currencies']);
		unset($result['Carriers']);

		$place_id_arr = array();

		$count = 0;
		for($i=0; $i<count($result['Places']); $i++)
		{
			$place_id_arr[] = array('PlaceId' => $result['Places'][$i]['PlaceId'], 'Name' => $result['Places'][$i]['Name']);
		}

		$rand_arr = array_rand($place_id_arr, 5);

		$rand_place_selected = array();
		for($i=0; $i<count($place_id_arr); $i++)
		{
			for($j=0; $j<count($rand_arr); $j++)
			{
				if($i == $rand_arr[$j])
				{
					$rand_place_selected[] = array('PlaceId' => $place_id_arr[$i]['PlaceId'], 'Name' => $place_id_arr[$i]['Name']);
				}	
			}
			
		}

		//print_r($rand_arr);
		//print_r($place_id_arr);
		//echo $count;

		//$this->response($place_id_arr);
		$this->response($rand_place_selected);
		
	}


}