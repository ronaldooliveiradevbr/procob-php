<?php
/**
 * Procob API Persons factory
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
    public static function create($personData)
    {
        if (is_object($personData)) {
            $personData = (array) $personData;
        }

        $person = new Person();
        $person->setDocument($personData['documento'])
               ->setName($personData['nome'])
               ->setAge($personData['idade'])
               ->setGender($personData['sexo'])
               ->setObituary($personData['obito'])
               ->setZodiacSign($personData['signo'])
               ->setLivedIn($personData['uf'])
               ->setIrpfStatus($personData['situacao_receita']);

        $person->setBirthday(
            DateTimeImmutable::createFromFormat(
                "d/m/Y",
                $personData['data_nascimento']
            )
        );

        $verifiedAt = sprintf(
            "%s %s",
            $personData['situacao_receita_data'],
            $personData['situacao_receita_hora']
        );
        $person->setIrpfVerifiedAt(
            DateTimeImmutable::createFromFormat(
                "Y-m-d H:i:s",
                $verifiedAt
            )
        );

        return $person;
    }
}
