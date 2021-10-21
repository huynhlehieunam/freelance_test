<?php


namespace Collection;


use Model\AbstractModel;

/**
 * Class AbstractCollection
 * @package Collection
 */
abstract class AbstractCollection
{
    /**
     * @var \DbConnection
     */
    protected $connection;
    /**
     * @var
     */
    protected $tableName;
    /**
     * @var array
     */
    protected $idFields = [];
    /**
     * @var string
     */
    protected $model;
    /**
     * @var AbstractModel[]
     */
    protected $items;


    /**
     * AbstractCollection constructor.
     * @param \DbConnection $connection
     * @param string $abstractModel
     */
    public function __construct(
        \DbConnection $connection,
        $abstractModel = ""
    )
    {
        $this->connection = $connection;
        $this->model = $abstractModel;
        $this->items = [];
    }

    /**
     * @param string $collumn
     * @return $this
     */
    public function loadAll($collumn = "*"){
        $query = "select $collumn from $this->tableName";
        $data = $this->connection->getConnection()->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($data as $datum){
            $model = new $this->model($datum);
            $this->items[] = $model;
        }
        return $this;
    }

    /**
     * @return array|AbstractModel[]
     */
    public function getItems(){
        return $this->items;
    }
}