<?php

namespace App\Auth;

/**
 * 
 */
class Credentials
{
    protected array $data;
    protected array $jwt;

    public function __construct($decodedJwt = [])
    {
        if(!is_array($decodedJwt)) {
            throw new \Exception('Constructor must receive an array');
        }

        if(!isset($decodedJwt['user'])) {
            throw new \Exception('JWT password has no field "user"');
        }

        $this->jwt = $decodedJwt;
        $this->data = (array)$decodedJwt['user'];
    }

    public function data($field)
    {
        return isset($this->data[$field]) ? $this->data[$field] : null;
    }

    public function __toString()
    {
        return print_r([
            'jwt' => $this->jwt,
            'data' => $this->data
        ], true);
    }
}
