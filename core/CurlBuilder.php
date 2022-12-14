<?php

namespace core;

use core\CurlBuilderInterface;

class CurlBuilder
{
    // private $curlHandler;


    // public function executeCurl(string $endpoint, string $method, $id = 0, $json_body = ""): array|false {

    //     $this->curlSetOptions($endpoint);

    //     switch ($method) {
    //         case 'get':
    //             return $this->curlGet();
    //             break;
    //         case 'post':
    //             return $this->curlPost();
    //             break;
    //         case 'put':
    //             $this->curlPut();
    //             break;
    //         case 'delete':
    //             $this->curlDelete();
    //             break;
    //         default:
    //             $this->getCurl();
    //             break;
    //     }

    //     return curl_exec($this->curlHandler);
    // }

    // public function curlSetOptions(string $endpoint)
    // {
    //     curl_setopt_array($this->curlHandler, [
    //             CURLOPT_URL => $endpoint,
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => '',
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 0,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_HTTPHEADER => array('Content-Type: application/json')
    //         ]
    //     );
    // }

    // public function curlGet(): array
    // {
    //     $this->curlHandler = curl_init();
    //     $response = curl_exec($this->curl);
    //     curl_close($this->curlHandler);
    
    //     return json_decode($response, true);
    // }

    // public function curlPost(): bool
    // {
    //     $this->curlHandler = curl_init();
    //     curl_setopt_array($this->curl, array(
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => json_encode($_POST)
    //     ));
    //     curl_exec($this->curl);
    //     curl_close($this->curlHandler);
        
    // }
}