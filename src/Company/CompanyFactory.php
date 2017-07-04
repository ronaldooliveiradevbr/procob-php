<?php
/**
 * Procob API Company factory class
 *
 * @author Ronaldo Oliveira <rfdeoliveira.pmsp@gmail.com>
 * @version 1.0.0
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace Procob\Company;

use Procob\Contracts\FactoryInterface;

class CompanyFactory implements FactoryInterface
{
    public static function create($response)
    {
        if (! is_object($response)) {
            return null;
        }

        if ('000' != $response->code) {
            return null;
        }

        if ('NAO' == $response->content->nome->existe_informacao) {
            return null;
        }

        $data = get_object_vars(
            $response->content->nome->conteudo[0]
        );

        $verifiedAt = \DateTimeImmutable::createFromFormat(
            'Y-m-d H:i:s',
            sprintf(
                "%s %s",
                $data['situacao_receita_data'],
                $data['situacao_receita_hora']
            )
        );

        return new Company(
            $data['documento'],
            $data['nome'],
            $data['nome_fantasia'],
            $data['uf'],
            $data['situacao_receita'],
            $verifiedAt
        );
    }
}
