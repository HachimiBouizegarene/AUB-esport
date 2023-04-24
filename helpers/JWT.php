<?php
namespace Helper;

use Exception;
use Throwable;

class JWT{
    public function generate(array $header, array $payload, string $secret, int $validity = 60 * 60 * 24 * 15):string{

        $expiration = time() + $validity;
        $payload['iat'] = time();
        $payload['exp'] = $expiration;

        $base64Header = base64_encode(json_encode($header));
        $base64payload = base64_encode(json_encode($payload));
        $base64Secret = base64_encode($secret);

        //nettoyage 
        $base64payload = str_replace(['+', '/', '='], ['-', '_', ''], $base64payload);
        $base64Header = str_replace(['+', '/', '='], ['-', '_', ''], $base64Header);

        $signature = hash_hmac('sha256', $base64Header. ".". $base64payload, $base64Secret, true);
        $signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        $jwt = $base64Header. '.' . $base64payload. "." . $signature;

        return $jwt;
    }

    public function check($token, $secret): bool{
        $header = $this->getHeader($token);
        $payload = $this->getPayload($token);

        if(!is_array($header) || !is_array($payload)){
            return false;
        }

        $base64Header = base64_encode(json_encode($header));
        $base64payload = base64_encode(json_encode($payload));
        $base64Secret = base64_encode($secret);

        //nettoyage 
        $base64payload = str_replace(['+', '/', '='], ['-', '_', ''], $base64payload);
        $base64Header = str_replace(['+', '/', '='], ['-', '_', ''], $base64Header);

        $signature = hash_hmac('sha256', $base64Header. ".". $base64payload, $base64Secret, true);
        $signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        $jwt = $base64Header. '.' . $base64payload. "." . $signature;

        return $jwt===$token;
    }


    public function getHeader(string $token){
        try{
            $array = explode("." ,$token);
            $headerEncoded =  $array[0];
            $headerDecoded = json_decode(base64_decode($headerEncoded), true);
            return $headerDecoded;
        }catch(Throwable $e){
            return false;
        }
        
    }

    public function getPayload(string $token){

        try{
            $array = explode("." ,$token);
            $headerEncoded =  $array[1];
            $headerDecoded = json_decode(base64_decode($headerEncoded), true);
            return $headerDecoded;
        }catch(Throwable $e){
            return false;
        }
        
    }


    //voir si le token est expiree
}