<?php declare(strict_types=1);

namespace Correios\Rastro;

use Correios\Rastro\Result\ParseResult;
use Correios\Rastro\Component\Collection;

class Rastro
{
    const WSDL_RASTRO = 'https://webservice.correios.com.br/service/rastro/Rastro.wsdl';

    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function fetch($codes): Collection
    {
        if (!is_array($codes)) {
            $codes = [$codes];
        }
        $collection = new Collection();
        foreach ($this->requestData($codes) as $code => $data) {
            var_dump($code);
            $parseResult = new ParseResult($data);
            $collection->offsetSet($code, $parseResult());
        }
        return $collection;
    }

    private function getClient() : \SoapClient
    {
        $options = [
            'encoding' => 'ISO-8859-1',
            'cache_wsdl' => WSDL_CACHE_NONE,
            'trace' => 1,
            'exceptions' => 1,
            'keep_alive' => false,
            'verifypeer' => false,
            'verifyhost' => false,
            'connection_timeout' => 10,
            'stream_context' => stream_context_create([
                'http' => [
                    'protocol_version' => '1.0',
                    'header' => 'Connection: Close'
                ],
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ]
            ])
        ];

        $soapClient = new \SoapClient(self::WSDL_RASTRO, $options);
        return $soapClient;
    }

    private function requestData(array $codes)
    {
        $client = $this->getClient();
        foreach ($codes as $code) {
            $params = [
                'usuario'   => $this->config->getUsername(),
                'senha'     => $this->config->getPassword(),
                'tipo'      => $this->config->getType(),
                'resultado' => $this->config->getResultType(),
                'lingua'    => $this->config->getLanguage(),
                'objetos'   => $code
            ];
            $events = $client->buscaEventos($params);
            yield $code => $events;
        }
    }
}
