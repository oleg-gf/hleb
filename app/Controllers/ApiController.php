<?php

namespace App\Controllers;

use Hleb\Constructor\Handlers\Request;

class ApiController extends \MainController
{
    protected $responce = [
        "jsonrpc" => "2.0", 
        "result"=> "", 
        "id"=> ""
    ];

    public function index() {

        
        if ($_GET["method"] == "mysql_date") {
            $responce["jsonrpc"] = $_GET["jsonrpc"];
            $responce["result"] = $this->mysql_date();
            $responce["id"] = (int) $_GET["id"];
            return json_encode($responce);
        }

        if ($_GET["method"] == "unix_date") {
            $responce["jsonrpc"] = $_GET["jsonrpc"];
            $responce["result"] = $this->unix_date();
            $responce["id"] = (int) $_GET["id"];
            return json_encode($responce);
        }       
    }

    public function mysql_date($var = null)
    {
        return date("Y-m-d H:i:s");
    }
    public function unix_date($var = null)
    {
        return time();
    }

}

