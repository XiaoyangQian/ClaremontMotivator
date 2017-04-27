<?php

class BaseModel
{
    function __construct()
    {
        // exported by dbconn.php
        global $dbc;
        $this->dbc = &$dbc;
    }

    private static function getStaticPropertyOfChildClass($property_name)
    {
        $class = new ReflectionClass(get_called_class());
        return $class->getStaticPropertyValue($property_name);
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
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
