<?php 

class QueryBuilder
{
    public $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    function selectAll(string $type, $column = null, $value = null) {

        $table = $type::$_table;
        $sql = "SELECT * FROM `${table}`";
        
        if ($column != null) {
            $sql .= " WHERE ${column} = ${value}";
        }
        
        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_CLASS, $type);

        $result = $statement->fetchAll();

        return $result;
    }

    function selectBy(string $type, $column, $value) {

        $table = $type::$_table;

        $statement = $this->pdo->prepare("SELECT * FROM `${table}` WHERE ${column} = ?");

        $statement->execute([$value]);

        $result = $statement->fetchObject($type);

        return $result;
    }
}
?>