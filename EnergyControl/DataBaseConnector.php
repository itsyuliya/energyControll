<?php

/**
 * Created by PhpStorm.
 * User: Соловей
 * Date: 26.09.2016
 * Time: 20:26
 */
class DataBaseConnector
{
    private $pdo;
    private $dbName;

    public function  __construct($host, $dbname, $user, $password)
    {
        try
        {
            $this->dbName = $dbname;
            $dsh = "mysql:host=$host; dbname=$dbname";
            $this->pdo = new PDO($dsh, $user, $password);
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }

    }

    private function checkTableName($tableName)
    {
        $sqlForCheck = "SELECT TABLE_NAME FROM information_schema.tables
                        WHERE table_schema = $this->dbName";
        $tableNamesArray = $this->pdo->query($sqlForCheck);

        // foreach ($tableNamesArray as $value)
        // {
        //     return ($value[0] == $tableName) ? false : true;
        // }

    }

    public  function getTable($tableName)
    {
        try
        {
            if ($this->checkTableName($tableName)) throw new TableNotFoundException("Table wasn`t found");
            $sql = "SELECT * FROM $tableName";
            $result = $this->pdo->query($sql);
            $countColumn = $result->columnCount();
            echo "<div class='container'>";
            echo  "<div class='row centered mt grid'>";
            echo "<table>";
            ?>
            <table>
            <tr>
            <th>Месяц</th>
            <th>Водосбережения</th>
            <th>Энергобережения</th>
            <th>Теплобережения</th>
            <th>Газобережения</th>
            <th>Обслуживание коммунальных услуг</th>
            <th>Дополнительные услуги</th>
            </tr>
            <?
            foreach ($result as $row)
            {

                echo "<tr>";
                for ($j = 0; $j < $countColumn; ++$j)
                {
                    echo "<td>". $row[$j] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
            echo  "</div>";

        }
        catch (TableNotFoundException $ex)
        {
              echo $ex->getMessage();
        }
    }
        public  function getTableText($tableName)
    {
        try
        {
            if ($this->checkTableName($tableName)) throw new TableNotFoundException("Table wasn`t found");
            $sql = "SELECT text FROM $tableName";
            $result = $this->pdo->query($sql);
            $countColumn = $result->columnCount();

            foreach ($result as $row)
            {
                for ($j = 0; $j < $countColumn; ++$j)
                {
                    echo $row[$j] . " ";
                }
                echo "</br>";
            }

        }
        catch (TableNotFoundException $ex)
        {
              echo $ex->getMessage();
        }
    }
    public  function getTableImage($tableName)
    {
        try
        {
            if ($this->checkTableName($tableName)) throw new TableNotFoundException("Table wasn`t found");
            $sql = "SELECT image FROM $tableName";
            $result = $this->pdo->query($sql);
            $countColumn = $result->columnCount();

            foreach ($result as $row)
            {
                for ($j = 0; $j < $countColumn; ++$j)
                {
                    echo $row[$j] . " ";
                }
                echo "</br>";
            }

        }
        catch (TableNotFoundException $ex)
        {
              echo $ex->getMessage();
        }
    }
    public  function getTableDate($tableName)
    {
        try
        {
            if ($this->checkTableName($tableName)) throw new TableNotFoundException("Table wasn`t found");
            $sql = "SELECT date FROM $tableName";
            $result = $this->pdo->query($sql);
            $countColumn = $result->columnCount();

            foreach ($result as $row)
            {
                for ($j = 0; $j < $countColumn; ++$j)
                {
                    echo $row[$j] . " ";
                }
                echo "</br>";
            }

        }
        catch (TableNotFoundException $ex)
        {
              echo $ex->getMessage();
        }
    }
    public  function getTableHeader($tableName)
    {
        try
        {
            if ($this->checkTableName($tableName)) throw new TableNotFoundException("Table wasn`t found");
            $sql = "SELECT header FROM $tableName";
            $result = $this->pdo->query($sql);
            $countColumn = $result->columnCount();

             foreach ($result as $row)
             {
                 for ($j = 0; $j < $countColumn; $j++)
                 {
                     echo  $row[$j] . " " ;
                 }
                 echo "</br>";
             }
        }
        catch (TableNotFoundException $ex)
        {
              echo $ex->getMessage();
        }
    }

    public function setId($tableName)
    {
        try
        {
            if ($this->checkTableName($tableName)) throw new TableNotFoundException("Table wasn`t found");
            $sql = "SELECT MAX(user_id) FROM `users`";
            $result = $this->pdo->query($sql) + 1;
            echo $result;
        }
        catch(TableNotFoundException $ex)
        {
            echo $ex->getMessage();
        }
    
    }



    // connection to data base in project 1 time.
}
$db = new DataBaseConnector('localhost', 'energy', 'root','');
