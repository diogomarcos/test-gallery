<?php
/**
 * Connection: Destinado para a conexão do banco de dados
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace Micro\Database;

use PDO;

class Connection
{
    // Constante comum
    const DBNAME = 'test-gallery';

    // Constantes para o MySQL
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWD = '';

    // Constantes para o SQLite
    const PATH_TO_SQLITE_FILE = '../App/SQLite/'.self::DBNAME.'.db';

    /**
     * Instância PDO para MySQL
     *
     * @var PDO $pdo_mysql
     */
    private static $pdo_mysql;

    /**
     * Instância PDO para SQLite
     *
     * @var PDO $pdo_sqlite
     */
    private static $pdo_sqlite;

    /**
     * getConnMySQL: conexão para o MySQL
     *
     * @return PDO
     */
    public static function getConnMySQL(): PDO
    {
        if (self::$pdo_mysql === null) {
            self::$pdo_mysql = new PDO(
                'mysql:host='.self::HOST.';dbname='.self::DBNAME,
                self::USERNAME,
                self::PASSWD
            );
        }
        return self::$pdo_mysql;
    }

    /**
     * getConnSQLite: conexão para o SQLite
     *
     * @return PDO
     */
    public static function getConnSQLite() : PDO
    {
        if (self::$pdo_sqlite === null) {
            self::$pdo_sqlite = new PDO('sqlite:'.self::PATH_TO_SQLITE_FILE);
        }
        return self::$pdo_sqlite;
    }
}
