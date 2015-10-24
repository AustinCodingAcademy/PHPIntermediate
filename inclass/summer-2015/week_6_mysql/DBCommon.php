<?php
/**
 * Class DBCommon contains functionality for us to interact with the database
 *
 * @package TIB\CoreBundle\Db
 */
class DBCommon
{
    /**
     * mysqli connection object
     *
     * @var mysqli
     */
    protected $mysqli;

    /**
     * Current query to run
     *
     * @var string
     */
    protected $query;

    /**
     * If we are running multiple queries
     *
     * @var array
     */
    protected $queries;

    /**
     * Number of rows returned from query, if applicable
     *
     * @var int
     */
    protected $numRows = 0;

    /**
     * @param string $host What server is the database located on?
     * @param string $user What is the DB user
     * @param string $pass What is her password
     * @param string $database What is the name of the database that we want to query
     * @param int $port What port should we connect to
     *
     * @throws Exception
     */
    public function __construct($host, $user, $pass, $database, $port = 3306)
    {
        $this->mysqli = new mysqli($host, $user, $pass, $database, $port);
        $this->mysqli->set_charset("utf8");
        if ($this->mysqli->connect_errno) {
            throw new Exception("Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error);
        }
    }

    /**
     * Run a query like an insert or an update
     * @throws Exception
     * @return mysqli_result
     */
    public function query()
    {
        $result = $this->mysqli->query($this->getQuery());
        if ($result && isset($result->num_rows)) {
            $this->numRows = $result->num_rows;
        }
        if (!$result && $this->mysqli->error) {
            throw new Exception($this->mysqli->error);
        }

        return $result;
    }

    /**
     * Execute a query that returns a single value
     *
     * @return mixed
     */
    public function loadResult()
    {
        $result = $this->query();
        $result = $result->fetch_array();
        if ($result) {
            return $result[0];
        }

        return null;
    }

    /**
     * Get one record from the database
     *
     * @return null|stdClass
     */
    public function loadObject()
    {
        $result = $this->query();
        if ($result && is_object($result)) {
            $obj = $result->fetch_object();
        } else {
            pre($result, 'loadObject()->result');
        }

        if ($obj) {
            return $obj;
        }

        return null;
    }

    /**
     * Get a number of rows from the db
     *
     * @return stdClass[]
     */
    public function loadObjectList()
    {
        $result = $this->query();
        if (!$result || !is_object($result)) {
            echo 'query::' . $this->getQuery();
        }
        $return = [];
        while ($obj = $result->fetch_object()) {
            $return[] = $obj;
        }

        return $return;
    }

    /**
     * Get the last insert id. Only applicable for insert queries
     *
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->mysqli->insert_id;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return int
     */
    public function getNumRows()
    {
        return $this->numRows;
    }

    /**
     * Escape a string safely
     * @param string $string String to quote
     *
     * @return string
     */
    public function quote($string)
    {
        return $this->mysqli->escape_string($string);
    }
}