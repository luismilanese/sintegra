<?php

namespace App\Services;

use App\DataTypes\DocumentType;
use GuzzleHttp\Client;

class Sintegra implements SintegraInterface
{
    protected $client;

    /**
     * Sintegra constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Realiza a consulta junto ao Sintegra
     *
     * @param string $documentNumber
     * @param string $documentType
     *
     * @return string
     */
    public function consult($documentNumber, $documentType)
    {
        $request = $this->client->request('POST', 'http://www.sintegra.es.gov.br/resultado.php', [
            'form_params' => [
                $documentType => $documentNumber,
                'botao' => 'Consultar'
            ]
        ]);

        $requestBody = $request->getBody()->getContents();

        return $this->parse($requestBody);
    }

    /**
     * Faz o parse do resultado.
     * 
     * @param string $body
     * @return string
     */
    protected function parse($body) {
        preg_match_all('/<td(?:[^>]+class=\"(titulo|valor)\"[^>]*)?>(.*?)<\/td>/', $body, $matches);

        $encodedMatches = array();

        foreach ($matches[2] as $match) {
            $encodedMatches[] = trim(html_entity_decode(filter_var(utf8_encode($match), FILTER_SANITIZE_STRING)));
        }

        return json_encode($encodedMatches, JSON_UNESCAPED_UNICODE);
    }
}