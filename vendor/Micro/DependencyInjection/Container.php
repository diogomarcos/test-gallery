<?php
/**
 * Container: Destinado para a injeção de dependência
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace Micro\DependencyInjection;

use Micro\Database\Connection;

class Container
{
    /**
     * getModel: encontra o model no sistema
     *
     * @param $model string
     *
     * @return mixed
     */
    public static function getModel($model)
    {
        $class = '\\App\\Models\\'.ucfirst($model);
        return new $class(Connection::getConnSQLite());
    }
}
