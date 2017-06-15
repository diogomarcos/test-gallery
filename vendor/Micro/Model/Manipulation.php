<?php
/**
 * Manipulation: Destinado para as monipulações
 * comuns nas operações no banco de dados
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace Micro\Model;

use PDO;

abstract class Manipulation
{
    /** @var  PDO $database */
    protected $database;

    /** @var  string $table */
    protected $table;

    /**
     * Manipulation constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * createTable: criação da tabela no banco de dados
     *
     * @return mixed
     */
    abstract public function createTable();

    /**
     * fetchAll: retornar todos os dados do banco
     *
     * @return array
     */
    public function fetchAll(): array
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->database->query($query);

        return $stmt->fetchAll();
    }

    /**
     * find: retorna a informação de acordo com o id
     *
     * @param int $id
     *
     * @return array
     */
    public function find($id) : array
    {
        $query = "SELECT * FROM {$this->table} WHERE id=:id";
        $stmt = $this->database->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * delete: apaga a informação de acordo com o id
     *
     * @param int $id
     *
     * @return int
     */
    public function delete($id): int
    {
        $query = "DELETE FROM {$this->table} WHERE id=:id";
        $stmt = $this->database->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
