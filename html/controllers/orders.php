<?php

class OrdersController
{
    public $code = 200;
    public $url;
    public $request_body;

    function __construct()
    {
        $this->url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].mb_substr($_SERVER['SCRIPT_NAME'],0,-9).basename(__FILE__, ".php")."/";
        $this->request_body = json_decode(mb_convert_encoding(file_get_contents('php://input'),"UTF8","ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN"),true);
    }

    // Orderの取得
    public function get($id=null):array
    {

        $data = [];
        $data["id"] = "5XGNMiCS56";
        $data["serviceId"] = "0x3SUBYOax";
        $data["status"] = "CREATED";

        return $data;
    }

    // Orderの作成
    public function post():array
    {
        $success = TRUE;

        $post = $this->request_body;

        if($success){
            $data = [];
            $data["id"] = "5XGNMiCS56";
            $data["serviceId"] = $post["serviceId"];
            $data["status"] = "CREATED";
            return $data;
        }else{
            $this->code = 500;
            return ["error" => [
                "type" => "fatal_error"
            ]];
        }

    }

    // Orderの更新
    public function patch($id=null):array
    {
        $success = TRUE;

        $patch = $this->request_body;
        if($success){
            $data = [];
            $data["id"] = "5XGNMiCS56";
            $data["serviceId"] = "df751c8678";
            $data["status"] = $patch["status"];
            return $data;
        }else{
            $this->code = 500;
            return ["error" => [
                "type" => "fatal_error"
            ]];
        }

    }

    // Orderの削除
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