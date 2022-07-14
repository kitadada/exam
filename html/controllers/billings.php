<?php

class BillingsController
{
    public $code = 200;
    public $url;
    public $request_body;

    function __construct()
    {
        $this->url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].mb_substr($_SERVER['SCRIPT_NAME'],0,-9).basename(__FILE__, ".php")."/";
        $this->request_body = json_decode(mb_convert_encoding(file_get_contents('php://input'),"UTF8","ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN"),true);
    }

    // Billingの作成
    public function post():array
    {
        $success = TRUE;

        $post = $this->request_body;

        if($success){
            $data = [];
            $data["id"] = "auB7hhfm6U";
            $data["orderId"] = $post["orderId"];
            $data["amount"] = $post["amount"];
            return $data;
        }else{
            $this->code = 500;
            return ["error" => [
                "type" => "fatal_error"
            ]];
        }

    }

    // Billingの取得
    public function get($id=null):array
    {

        $data = [];
        $data["id"] = "auB7hhfm6U";
        $data["orderId"] = "5XGNMiCS56";
        $data["amount"] = 10000;

        return $data;
    }
    
    // Billingの更新
    public function patch($id=null):array
    {
        $success = TRUE;

        $patch = $this->request_body;
        if($success){
            return $patch;
        }else{
            $this->code = 500;
            return ["error" => [
                "type" => "fatal_error"
            ]];
        }

    }

    // Billingの削除
    public function delete($id=null):array
    {
        $success = TRUE;

        if($success){
            return [];
        }else{
            $this->code = 500;
            return ["error" => [
                "type" => "fatal_error"
            ]];
        }
    }

    public function options():array
    {
        header("Access-Control-Allow-Methods: OPTIONS,GET,HEAD,POST,PUT,DELETE");
        header("Access-Control-Allow-Headers: Content-Type");
        return [];
    }

    private function is_set($value):bool
    {
        return !(is_null($value) || $value === "");
    }
}