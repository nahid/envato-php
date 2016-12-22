<?php 

namespace Nahid\EnvatoPHP\Api;


class Authentication extends AbstractApi
{
    protected $code = null;

    public function __construct($config)
    {
        $this->config = $config;

        parent::__construct();
    

        if ($this->session->get('expire') == null) {
            $this->session->set('expire', (time() - 60));
        }
    }
    public function getAuthUrl()
    {
        $this->clearCache();
        $params = [
            'response_type'=> 'code',
            'client_id' =>  $this->clientId,
            'redirect_uri'  =>  $this->redirectUri
        ];

        return 'https://api.envato.com/authorization?'. http_build_query($params);

    }

    public function authenticate()
    {
        $response = null;
        if ($this->isExpired() && $this->getRefreshToken()==null){
            $response = $this->getAccessToken();
        }elseif($this->isExpired() && $this->getRefreshToken() != null) {
            echo 'use refresh';
            $response = $this->getAccessTokenByRefreshToken();
        }
        
        if (!is_null($response)) {
            if ($response->getStatusCode() == 200) {
                $this->session->set('access_token', $response->data->access_token);
                $this->session->set('refresh_token', isset($response->data->refresh_token)?$response->data->refresh_token:($this->session->get('refresh_token')!=null?$this->session->get('refresh_token'):'hello'));
                $this->session->set('expire', (time() + 3600));
            }
        }      
        
    }

    public function getAccessTokenByRefreshToken()
    {
        $authSecret = base64_encode($this->clientId . ':' . $this->clientSecret);
        
                $response = $this->formParams([
                    'grant_type'=>'refresh_token',
                    'refresh_token'=> $this->session->get('refresh_token'),
                    'client_id'=> $this->clientId,
                    'client_secret'=> $this->clientSecret,
                    'Content-Type'=>'application/x-www-form-urlencode'
                ])
                ->headers([
                    'User-Agent'=>$_SERVER['HTTP_USER_AGENT'],
                    'Authorization'=> 'Basic '. $authSecret
                ])
                ->post('/token');

            return $response;
    }



    protected function getAccessToken()
    {
        $this->code = @$_GET['code'];
        if (!is_null($this->code)) {
            $authSecret = base64_encode($this->clientId . ':' . $this->clientSecret);
            $response = $this->formParams([
                    'client_id'=> $this->clientId,
                    'client_secret'=> $this->clientSecret,
                    'code'=> $this->code,
                    'grant_type'=>'authorization_code',
                    'Content-Type'=>'application/x-www-form-urlencode'
                ])
                ->headers([
                    'User-Agent'=>$_SERVER['HTTP_USER_AGENT'],
                    'Authorization'=> 'Basic '. $authSecret
                ])
                ->post('/token');

            return $response;       
        }
    }

    public function isExpired()
    {
        if ($this->session->get('expire') < time()) {
            return true;
        }

        return false;
    }

    public function getRefreshToken()
    {
        if ($this->session->get('refresh_token') != null) {
            return $this->session->get('refresh_token');
        }

        return null;
    }

    public function clearCache()
    {
        $this->session->delete('refresh_token');
        $this->session->delete('expire');
        $this->session->delete('access_token');
    }

}
