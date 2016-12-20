<?php 

namespace Nahid\EnvatoPHP\HttpManager;

use GuzzleHttp\Client;


class RequestHandler
{
   
   const BASE_URL = 'https://api.envato.com';

   public $http;


   function __construct()
   {
        $this->http = new Client(['base_uri' => self::BASE_URL, 'timeout' => 2.0]);
   } 
    
}