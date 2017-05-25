<?php
/**
 * Procob API Request interface
 *
 * @author Ronaldo Oliveira <rfdeoliveira.pmsp@gmail.com>
 * @version 1.0.0
 * @license https://opensource.org/licenses/MIT MIT License
 */
namespace Procob\Contracts;

interface RequestInterface
{
    /**
     * Get the request http verb
     *
     * @return string Http's verb
     */
    public function method();

    /**
     * Get the resource path
     *
     * @return string The resource path
     */
    public function uri();
}
