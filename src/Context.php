<?php

namespace Testify;

use React\Socket\Connection;

class Context
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var string
     */
    private $data;

    /**
     * @param Connection $connection
     * @param $data
     */
    public function __construct(Connection $connection, $data)
    {
        $this->connection = $connection;
        $this->data = $data;
    }

    /**
     * @return Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param Connection $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}
