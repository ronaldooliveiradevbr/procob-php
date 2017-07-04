<?php
/**
 * Procob API Person's factory
 *
 * @author Ronaldo Oliveira <rfdeoliveira.pmsp@gmail.com>
 * @version 1.0.0
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace Procob\Person;

use \DateTimeImmutable;
use Procob\Contracts\FactoryInterface as Factory;

class PersonFactory implements Factory
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

        $personData = get_object_vars(
            $response->content->nome->conteudo[0]
        );

        $birthday = DateTimeImmutable::createFromFormat(
            "d/m/Y",
            $personData['data_nascimento']
        );

        $irpfVerifiedAt = DateTimeImmutable::createFromFormat(
            "Y-m-d H:i:s",
            sprintf(
                "%s %s",
                $personData['situacao_receita_data'],
                $personData['situacao_receita_hora']
            )
        );

        return new Person(
            $personData['documento'],
            $personData['nome'],
            $birthday,
            $personData['idade'],
            $personData['sexo'],
            $personData['obito'],
            $personData['signo'],
            $personData['uf'],
            $personData['situacao_receita'],
            $irpfVerifiedAt
        );
    }
}
