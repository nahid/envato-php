<?php 

namespace Nahid\EnvatoPHP\Api;

use Nahid\EnvatoPHP\HttpManager\RequestHandler;

class Market extends AbstractApi
{

    function __construct($config) 
    {
        $this->config = $config;
        parent::__construct();
    }

   
    public function collection($id)
    {
        return $this->get('/v3/market/catalog/collection?id=' . $id);
    }
   
    public function item($id)
    {
        return $this->get('/v3/market/catalog/item?id=' . $id);
    }  

    public function popularItems($site = 'themeforest')
    {
        return $this->get('/v1/market/popular:' . $site . '.json');
    }

    public function categories($site = 'themeforest')
    {
        return $this->get('/v1/market/categories:' . $site . '.json');
    }

    public function itemPrices($id)
    {
        return $this->get('/v1/market/item-prices:' . $id . '.json');
    }

    public function newItems($site = 'themeforest', $category = 'wordpress')
    {
        return $this->get('/v1/market/new-files:' . $site .',' . $category . '.json');
    }

    public function features($site = 'themeforest')
    {
        return $this->get('/v1/market/features:' . $site . '.json');
    }

    public function randomNewItems($site = 'themeforest')
    {
        return $this->get('/v1/market/random-new-files:' . $site . '.json');
    }

    public function search($query = ["site"=>"themeforest.net"])
    {
        $param = http_build_query($query);
        return $this->get('/v1/discovery/search/search/item?' . $param);
    }


    public function totalUsers()
    {
        return $this->get('/v1/market/total-users.json');
    }

    public function totalItems()
    {
        return $this->get('/v1/market/total-items.json');
    }


    public function numberOfItemsAsCategory($site = 'themeforest')
    {
        return $this->get('/v1/market/number-of-files:' . $site . '.json');
    }



}