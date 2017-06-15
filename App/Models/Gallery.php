<?php
/**
 * Gallery: Destinado para o modelo da galeria e manipulação de dados
 *
 * @author  Diogo Marcos <contato@diogomarcos.com>
 * @version 1.0
 */

namespace App\Models;

use Micro\Model\Manipulation;

class Gallery extends Manipulation
{
    /** @var string $table nome da tabela */
    protected $table = "gallery";

    /** @var array $type_photo tipos permitidos das fotos */
    private static $type_photo = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');

    /**
     * createTable: criação da tabela no banco de dados
     */
    public function createTable()
    {
        $query = "
            CREATE TABLE IF NOT EXISTS {$this->table} (
              `id` INTEGER PRIMARY KEY NOT NULL,
              `title` TEXT NOT NULL,
              `name` TEXT NOT NULL UNIQUE,
              `created` TEXT NOT NULL,
              `modified` TEXT NOT NULL
            )
        ";

        $this->database->exec($query);
    }

    /**
     * add: adiciona as informações no banco de dados
     *
     * @param string $title
     * @param string $name
     *
     * @return int
     */
    public function add($title, $name): int
    {
        $query = "INSERT INTO 
                  {$this->table}(`title`, `name`, `created`, `modified`)
                  VALUES(:title_photo, :name_photo, :created_photo, :modified_photo)";

        $created = date('d/m/Y \à\s H:i:s');

        $stmt = $this->database->prepare($query);
        $stmt->bindParam(':title_photo', $title);
        $stmt->bindParam(':name_photo', $name);
        $stmt->bindParam(':created_photo', $created);
        $stmt->bindParam(':modified_photo', $created);

        $stmt->execute();

        return $this->database->lastInsertId();
    }

    /**
     * update: atualiza das informações no banco de dados
     *
     * @param int $id
     * @param string $title
     * @param string $name
     *
     * @return int
     */
    public function update($id, $title, $name): int
    {
        $query = "UPDATE {$this->table} SET
                  `title` = :title_photo,
                  `name` = :name_photo,
                  `modified` = :modified_photo
                  WHERE `id` = :id_photo";

        $modified = date('d/m/Y \à\s H:i:s');

        $stmt = $this->database->prepare($query);
        $stmt->bindParam(':id_photo', $id);
        $stmt->bindParam(':title_photo', $title);
        $stmt->bindParam(':name_photo', $name);
        $stmt->bindParam(':modified_photo', $modified);

        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * getTypePhoto: tipos permitidos das fotos
     *
     * @return array
     */
    public static function getTypePhoto(): array
    {
        return self::$type_photo;
    }
}
