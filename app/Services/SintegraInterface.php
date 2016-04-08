<?php

namespace App\Services;

/**
 * Os serviços dos SINTEGRA de todos os estados deverão implementar essa interface.
 *
 * @package App\Services
 */
interface SintegraInterface
{
    /**
     * Realiza a busca passando o documento
     * 
     * @param string $documentNumber
     * @param string $documentType
     * @return mixed
     */
    public function consult($documentNumber, $documentType);
}