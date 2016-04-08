<?php

namespace App\DataTypes;

/**
 * Class DocumentType representa os tipos de documentos que podem ser pesquisados.
 *
 * @package App\DataTypes
 */
abstract class DocumentType
{
    const CNPJ = 'num_cnpj';
    const INSCRICAO_ESTADUAL = 'num_ie';
}