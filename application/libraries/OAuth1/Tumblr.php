<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/OAuth2/OAuth2_Abstract.php');

class Tumblr
{
    public function setProvider($data) {
        return new League\OAuth1\Client\Server\Tumblr(array(
            'identifier'        => $data->client_id,
            'secret'            => $data->client_secret,
            'callback_uri'      => base_url() .'auth/oauth1/verify/Tumblr',
        ));
    }
}