<?php
//mysqli_report(MYSQLI_REPORT_ALL);

class BaseModel
{
    private $dbc;

    function __construct($object = null)
    {
        // exported by dbconn.php
        global $dbc;
        $this->dbc = &$dbc;
        if ($object) {
            foreach ($object as $property => $value) {
                $this->$property = $value;
            }
        }
    }

    private static function getStaticPropertyOfChildClass($property_name)
    {
        $class = new ReflectionClass(get_called_class());
        return $class->getStaticPropertyValue($property_name);
    }

    public static function find($id)
    {
        $primaryKey = @self::getStaticPropertyOfChildClass('primaryKey') or 'id';
        return @self::findFirst([$primaryKey => $id]);
    }

    public static function findFirst($conditions)
    {
        return @self::findAll($conditions, 1)[0];
    }

    public static function findAll($conditions, $limit = 0)
    {
        global $dbc;

        $tableName = self::getStaticPropertyOfChildClass('table');
        $conditionsCount = count($conditions);

        if ($conditionsCount > 0) {
            $sql = "select * from $tableName where " .
                join(' and ', array_map(function ($item) {
                    return $item . '=?';
                }, array_keys($conditions)));
        } else {
            $sql = "select * from $tableName";
        }

        if ($limit > 0)
            $sql .= " limit $limit";

        $statement = $dbc->prepare($sql);

        if ($conditionsCount > 0) {
            // taken from http://stackoverflow.com/a/24713481/6247478
            $params = array_merge([str_repeat('s', $conditionsCount)], array_values($conditions));
            $tmp = array();
            foreach ($params as $key => $value) $tmp[$key] = &$params[$key];
            call_user_func_array(array($statement, 'bind_param'), $tmp);
        }

        $statement->execute();
        return array_map(
            function ($item) {
                $class = get_called_class();
                return new $class($item);
            },
            $statement->get_result()->fetch_all(MYSQLI_ASSOC)
        );
    }

    public function save()
    {
        $tableName = self::getStaticPropertyOfChildClass('table');
        $primaryKey = @self::getStaticPropertyOfChildClass('primaryKey') or 'id';
        $cols = self::getStaticPropertyOfChildClass('cols');
        $colsCount = count($cols);

        if (@$this->{$primaryKey}) {
            // update the model
            $sql = "update $tableName set " . join(', ',
                    array_map(function ($item) {
                        return "$item=?";
                    }, $cols)
                ) . " where $primaryKey={$this->{$primaryKey}};";
            $statement = $this->dbc->prepare($sql);
            $params = array_merge([str_repeat('s', $colsCount)], array_map(function ($item) {
                return @$this->{$item};
            }, array_merge(array_values($cols))));
            $tmp = array();
            foreach ($params as $key => $value) $tmp[$key] = &$params[$key];
            call_user_func_array(array($statement, 'bind_param'), $tmp);
            $statement->execute();
            if ($statement->error) {
                var_dump($statement->error);
            }
        } else {
            // insert new model
            $sql = "insert into $tableName (" . join(',', $cols) . ") values (" . join(",", array_fill(0, $colsCount, "?")) . ");";
            $statement = $this->dbc->prepare($sql);
            $params = array_merge([str_repeat('s', $colsCount)], array_map(function ($item) {
                return @$this->{$item};
            }, array_values($cols)));
            $tmp = array();
            foreach ($params as $key => $value) $tmp[$key] = &$params[$key];
            call_user_func_array(array($statement, 'bind_param'), $tmp);
            $statement->execute();
            if ($statement->error) {
                var_dump($statement->error);
            }
            $this->{$primaryKey} = $statement->insert_id;
        }
    }
}
