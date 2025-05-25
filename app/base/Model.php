<?php
abstract class Model {
    protected $db;
    public $database_error;

    public final function __construct() {
        try {
            $host = getenv('DB_HOST');
            $name = getenv('DB_NAME');
            $user = getenv('DB_USER');
            $pass = getenv('DB_PASS');
            $this->db = new mysqli($host, $user, $pass, $name);
            $this->database_error = $this->db === false;
        } catch (Exception) {
            $this->database_error = true;
        }
    }

    protected final function execute($sql, $types, ...$values) : int {
        try {
            $stmt = $this->db->prepare($sql);
            if ($stmt === false) {
                throw new Exception();
            }
            $stmt->bind_param($types, ...$values);
            $state = $stmt->execute();
            if ($state === false) {
                throw new Exception();
            }
            $rows = $stmt->affected_rows;
        } catch (Exception) {
            $rows = -1;
        } finally {
            if ($stmt) {
                $stmt->close();
            }
        }
        return $rows;
    }

    protected final function consult($sql, $types, ...$values) : mysqli_result | false{
        try {
            $stmt = $this->db->prepare($sql);
            if ($stmt === false) {
                throw new Exception();
            }
            $stmt->bind_param($types, ...$values);
            $state = $stmt->execute();
            if ($state === false) {
                throw new Exception();
            }
            $result = $stmt->get_result();
        } catch (Exception) {
            $result = false;
        } finally {
            if ($stmt) {
                $stmt->close();
            }
        }
        return $result;
    }

    public function __destruct() {
        $this->db->close();
    }
}
?>
