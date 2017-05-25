<?php
/**
 * Procob API Factory interface
 *
 * @author Ronaldo Oliveira <rfdeoliveira.pmsp@gmail.com>
 * @version 1.0.0
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace Procob\Contracts;

interface FactoryInterface
{
    /**
     * Creates a new instance of the proper Entity
     *
     * @param (\stdClass|array) $arrayData
     * @return Procob\Contracts\EntityInterface
     */
    public static function create($arrayData);
}
