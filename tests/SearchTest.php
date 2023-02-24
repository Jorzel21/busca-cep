<?php

use PHPUnit\Framework\TestCase;
use Jorzelalves\BuscaCep\Search;

class SearchTest extends TestCase
{
    /**
     * @dataProvider dadosTeste
     */

    public function testGetAddressFromZipCodeDefaultUsage(string $input, array $esperado)
    {
        $search = new Search();
        $resultado = $search->getAddressFromZipCode($input);

        $this->assertEquals($esperado, $resultado);
    }

    public static function dadosTeste()
    {
        return [
            "Endereço Praça da Sé" => [
                "01001000",
                [
                    "cep" => "01001-000",
                    "logradouro" => "Praça da Sé",
                    "complemento" => "lado ímpar",
                    "bairro" => "Sé",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "ibge" => "3550308",
                    "gia" => "1004",
                    "ddd" => "11",
                    "siafi" => "7107"
                ]
            ],
            "Endereço Qualquer" => [
                "59633560",
                [
                    "cep" => "59633-560",
                    "logradouro" => "Avenida Celina Viana",
                    "complemento" => "",
                    "bairro" => "Alto do Sumaré",
                    "localidade" => "Mossoró",
                    "uf" => "RN",
                    "ibge" => "2408003",
                    "gia" => "",
                    "ddd" => "84",
                    "siafi" => "1759"
                ]
            ],
        ];
    }
}
