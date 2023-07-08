<?php

namespace Engine\Core\Database;

use PDO;

class Connection
{
    /**
     * @var object
     */
    private object $link;

    /**
     *
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return void
     */
    private function connect(): void
    {

        $config = require_once dirname(__DIR__, 2) . "/Config/config.php";
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
        $this->link = new PDO($dsn, $config['username'], $config['password']);
    }

    /**
     * @param $sql
     * @return bool
     */
    public function execute($sql): bool
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    /**
     * @param $sql
     * @return array
     */
    public function query($sql): array
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if($result === false) {
            return [];
        }
        return $result;
    }
}