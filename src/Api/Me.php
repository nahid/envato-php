<?php 

namespace Nahid\EnvatoPHP\Api;

use Nahid\EnvatoPHP\HttpManager\RequestHandler;

class Me extends AbstractApi
{
    function __construct($config)
    {
        $this->config = $config;
        parent::__construct();
    }
   
    public function accounts()
    {
        return $this->get('/v1/market/private/user/account.json');    
    } 

    public function sales($page = 1)
    {
         //->headers(['Authorization'=> 'Bearer ' . $this->personalToken])
        return $this->get('/v3/market/author/sales?page=' . $page);
    }

    public function sale($code)
    {
        return $this->get('/v3/market/author/sale?code=' . $code); 
    }

    public function username()
    {
        return $this->get('/v1/market/private/user/username.json');
    }  

    public function email()
    {
        return $this->get('/v1/market/private/user/email.json');
    }

    public function earningAndSalesByMonth()
    {           
        return $this->get('/v1/market/private/user/earnings-and-sales-by-month.json');
    }


    public function purchageList($filter = null, $page = 1)
    {
        $filter = is_null($filter)?'':'filter=' . $filter . '&';
        return $this->get('/v3/market/buyer/list-purchases?'. $filter. 'page=' . $page);
    }

    public function buyerDownload($itemId, $purchaseCode, $shortenUrl = false)
    {
        $shortenUrl = $shortenUrl?'true':'false';
        return $this->get('/v3/market/buyer/download?item_id=' . $itemId. '&purchase_code=' . $purchaseCode . '&shorten_url=' . $shortenUrl);
    }


    public function buyerPurchase($code)
    {
        return $this->get('/v3/market/buyer/purchase?code=' . $code);
    }


    public function statements($page=1, $fromDate=null, $toDate=null, $type=null, $site=null)
    {
        $args = 'page=' . $page;
        $args .= !is_null($fromDate)?'&from_date=' . $fromDate:'';
        $args .= !is_null($toDate)?'&to_date=' . $toDate:'';
        $args .= !is_null($type)?'&type=' . $type:'';
        $args .= !is_null($site)?'&site=' . $site:'';
    
        return $this->get('/v3/market/user/statement?' . $args);
    }

     public function bookmarks()
     {
        return $this->get('/v3/market/user/bookmarks');
     } 

     public function collection($id)
     {
        return $this->get('/v3/market/user/collection?id=' . $id);
     } 
}
