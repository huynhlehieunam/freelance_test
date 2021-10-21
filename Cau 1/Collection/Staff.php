<?php


namespace Collection;


class Staff extends AbstractCollection
{
    /**
     * @var \DbConnection
     */
    protected $connection;
    protected $tableName = "staff";
    protected $idFields = ["id"];
    public function __construct(\DbConnection $connection, $abstractModel = \Model\Staff::class)
    {
        parent::__construct($connection, $abstractModel);
    }
}