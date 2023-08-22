<?php
namespace Donuts\DB;

use App\DB\DataBase;
use PDO;

class MariaDB implements DataBase {

    // function create(array $userData) : void;
    // function update(int $userId, array $userData) : void;
    // function delete(int $userId) : void;
    // function show(int $userId) : array;
    // function showAll() : array;

    private $table, $pdo;

    public function __construct($tableName)
    {
        $host = '127.0.0.1';
        $db   = 'iguana';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $options);
        $this->table = $tableName;
    }

    public function create(array $userData) : void
    {
        if ($this->table == 'donuts') {
            $sql = "
                INSERT INTO {$this->table} (title, coating, extra, description, hole)
                VALUES (? , ? , ? , ? , ?)
            ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([ $userData['title'], $userData['coating'], $userData['extra'], $userData['desc'], $userData['hole'] ]);
        }
        if ($this->table == 'users') {
            $sql = "
                INSERT INTO {$this->table} (name, email, password, color, role)
                VALUES (? , ? , ? , ? , ?)
            ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([ $userData['name'], $userData['email'], $userData['password'], $userData['color'], $userData['role'] ]);
        }
    }

    public function update(int $userId, array $userData) : void
    {
        if ($this->table == 'donuts') {
            $sql = "
                UPDATE {$this->table}
                SET title = ?, coating = ?, extra = ?, description = ?, hole = ?
                WHERE id = ?
            ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([ $userData['title'], $userData['coating'], $userData['extra'], $userData['desc'], $userData['hole'], $userId ]);
        }
        if ($this->table == 'users') {
            $sql = "
                UPDATE {$this->table}
                SET name = ?, email = ?, password = ?, color = ?, role = ?
                WHERE id = ?
            ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([ $userData['name'], $userData['email'], $userData['password'], $userData['color'], $userData['role'], $userId ]);
        }
    }

    public function delete(int $userId) : void
    {
        $sql = "
            DELETE FROM {$this->table}
            WHERE id = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ $userId ]);
    }

    public function show(int $userId) : array
    {
        $sql = "
            SELECT *
            FROM {$this->table}
            WHERE id = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ $userId ]);

        return $stmt->fetch();
    }

    public function showAll() : array
    {
        $sql = "
            SELECT *
            FROM {$this->table}
        ";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }

}