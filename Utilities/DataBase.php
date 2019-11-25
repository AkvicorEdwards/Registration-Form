<?php


class DataBase
{
    protected $_DSN = 'mysql' . ":host=" . '127.0.0.1'; // For PDO only
    protected $_HOST = '127.0.0.1'; // For Mysqli only
    protected $_USER_NAME = 'root';
    protected $_PASSWORD = 'password';
    protected $_prepareSql = null;

    public function __construct()
    {

    }

    public function setPrepareSql(string $prepareSql): void
    {
        $this->_prepareSql = $prepareSql;
    }

    public function getPrepareSql()
    {
        return $this->_prepareSql;
    }

    /**
     * Create PDO connection
     * @access protected
     * @Author Akvicor
     * @return PDO|null
     */
    protected function create_connection()
    {
        try {
            $pdo = new \PDO($this->_DSN, $this->_USER_NAME, $this->_PASSWORD);
            $pdo->exec("SET names utf8");
            // 设置错误使用的异常模式
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            $pdo = null;
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * 主要用于处理有结果集的语句 SELECT DESC SHOW
     * @access public
     * @Author Akvicor
     * @param $sql string 有效的sql语句
     * @return false|PDOStatement
     */
    public function query(string $sql)
    {
        $pdo = $this->create_connection();
        try {
            $rows = $pdo->query($sql);
            $pdo = null;
            return $rows;
        } catch (\PDOException $e) {
            $pdo->rollBack();
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * 主要用于处理非结果集的语句 INSERT UPDATE DELETE CREATE
     * @access public
     * @Author Akvicor
     * @param string $sql string 有效的sql语句
     * @return int 语句执行后受影响的行数
     */
    public function exec(string $sql)
    {
        $pdo = $this->create_connection();
        try {
            $rows = $pdo->exec($sql);
            $pdo = null;
            return $rows;
        } catch (\PDOException $e) {
            $pdo->rollBack();
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * 执行多条语句
     * 主要用于处理非结果集的语句 INSERT UPDATE DELETE CREATE
     * @access public
     * @Author Akvicor
     * @param $sql:string
     * @return array 每条语句执行后受影响的行数
     */
    public function exec_s(string ...$sql)
    {
        $pdo = $this->create_connection();
        try {
            $count = count($sql);
            $rows = [];
            $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT, 0);
            $pdo->beginTransaction();
            for ($i = 0; $i < $count; ++$i)
                $rows[$i] = $pdo->exec($sql[$i]);
            $pdo->commit();
            $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT, 1);
            $pdo = null;
            return $rows;
        } catch (\PDOException $e) {
            $pdo->rollBack();
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * 执行预处理语句
     * @param mixed ...$values 对应的
     * @return bool TRUE on success or FALSE on failure.
     * @version 1.0
     * @access public
     * @Author Akvicor
     */
    public function execute(...$values)
    {
        if ($this->_prepareSql == null) {
            echo "No sql Prepared!";
            exit;
        }

        $pdo = $this->create_connection();
        try {
            $ps = $pdo->prepare($this->_prepareSql);
            $rows = $ps->execute($values);
            return $rows;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
