<?php
/**
 * Procob API Persons factory
 *
 * @author Ronaldo Oliveira <rfdeoliveira.pmsp@gmail.com>
 * @version 1.0.0
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace Procob\Persons;

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
               ->setName($personData['nome']);

        return $person;
    }
}
