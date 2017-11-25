<?php

namespace Service;


use Doctrine\ORM\Id\UuidGenerator;
use Ramsey\Uuid\Uuid;

class Log
{

    private $table;

    public function __construct()
    {
        $this->table = [];
    }

    public function log($array) {

        $uuid = Uuid::uuid4();

        $this->table[$uuid->toString()] = $array;

        return $uuid->toString();
    }

    public function getLog($uuid) {
        return $this->table[$uuid];
    }

}