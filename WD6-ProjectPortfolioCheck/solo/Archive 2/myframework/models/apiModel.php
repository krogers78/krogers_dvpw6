<?php
  class apiModel {
    public function __construct($parent) {
      $this->db = $parent->db;
    }
    public function googleBooks($term='') {
      require_once './google-api-php-client/src/Google/autoload.php';

      $client = new Google_Client();
      $client->setApplicationName('googleBooks');
      $client->setDeveloperKey('AIzaSyBHiAoKIGlgc7KVtVukfjM6PD1gETSclVo');


      $service = new Google_Service_Books($client);

      $optparams = ['filter'=>'free-ebooks'];
      $result = $service->volumes->listVolumes($term, $optparams);

      return $result;
    }
    public function twitter() {
      // Require the file to get it to run
      require_once './twitter-api-php-master/TwitterAPIExchange.php';
      // initialize all the keys and tokens to get a response
      $settings = [
            'oauth_access_token' => "2598835393-cy1dqHovLI1pXKismmU9H4Na1s4x1ahzUVJd21C",
            'oauth_access_token_secret' => "lx0vshRawcCRUe01UxAehTNz26ZjZlym4Mm4Ev4HQJegI",
            'consumer_key' => "o7ecMk0whSqn8o8HXO3Ibb2lP",
            'consumer_secret' => "gATThCm4wVpkbMFa9lXWUslBrgrmHbWIbOu9aA6K1r5LWaZrtZ"
            ];
      // Define the url for the response
      $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
      // Define the paramater for the response
      $getfield = '?screen_name=LukeHarperWWE';
      // Set the request method the GET
      $requestMethod = 'GET';
      // Instatiate a new TwitterAPIExchange with the tokens and keys
      $twitter = new TwitterAPIExchange($settings);
      // get the call to fire and decode it to parse out the information
      return json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest());
    }
  }
?>