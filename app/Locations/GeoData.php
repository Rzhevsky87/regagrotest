<?php

namespace App\Locations;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class GeoData
{
	private $apiKey;
	protected $responseFormat;
	protected $responseLang;
	protected $baseUri;

	public $locationName;


	function __construct($locationName) {
	    $this->apiKey = env('YANDEX_API_KEY', null);
    	$this->responseFormat = 'json';
    	$this->responseLang = 'ru_RU';
    	$this->baseUri = 'https://geocode-maps.yandex.ru/1.x';

    	$this->locationName = $locationName;
	  }

	/**
     * Get coordinates of geo location.
     *
     * @param  string  $locationName
     * @return string
     */
    public function getGeoData()
    {
    	$response = $this->guzzlClient()->request('GET', $this->requestUrl());

    	$code = $response->getStatusCode(); // 200
		$reason = $response->getReasonPhrase(); // OK

		if( $response->getStatusCode() != 200 
			|| 
			$response->getReasonPhrase() != 'OK'
		){
			return false;
		}


	    return explode(
	    	' ',
	    	json_decode($response->getBody()->getContents())
	    	->response
    		->GeoObjectCollection
    		->featureMember[0]
    		->GeoObject
    		->Point
    		->pos
	    );
    }

    /**
     * Get Guzzl client.
     *
     * @return GuzzleHttp\Client
     */
    protected function guzzlClient()
    {
    	return new Client([
		    // Base URI is used with relative requests
		    'base_uri' => $this->baseUri,
		    // Request options.
		    'timeout'  => 2.0,
		]);
    }

	/**
     * Get url.
     *
     * @return string
     */
    protected function requestUrl()
    {
    	return $this->baseUri 
    		. '/?apikey=' 
    		. $this->apiKey 
    		. '&geocode=' 
    		. $this->locationName 
    		. '&format=' 
    		. $this->responseFormat 
    		. '&lang=' 
    		. $this->responseLang;
    }
}