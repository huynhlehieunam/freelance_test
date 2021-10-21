<?php


namespace Collection;
require_once "AbstractCollection.php";

class ExamResult extends AbstractCollection
{
    /**
     * @var \DbConnection
     */
    protected $connection;
    protected $tableName = "exam_result";
    protected $idFields = ["staff_id","exam_date","subject"];

    public function __construct(\DbConnection $connection, $abstractModel = \Model\ExamResult::class)
    {
        parent::__construct($connection, $abstractModel);
    }

    public function loadResultByStaffId($id,$collumn = "*"){
        $query = "select $collumn from $this->tableName where staff_id = :staffId";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([':staffId' => $id]);
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($result as $data){
            $this->items[] = new $this->model($data);
        };
        return $this;
    }
}