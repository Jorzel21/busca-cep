<?php

namespace Jorzelalves\BuscaCep;

class Search
{
    private string $url = "https://viacep.com.br/ws/";

    public function getAddressFromZipCode(string $zipcode): array
    {
        $zipcode = preg_replace("/[^0-9]/im", '', $zipcode);

        $get = file_get_contents($this->url . $zipcode . "/json");

        return (array) json_decode($get);
    }
}
