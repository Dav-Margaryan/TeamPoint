<?php
class MySQL{

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function query(string $sql) {
        $response = $this->pdo->query($sql)->fetchAll();

        if (FALSE === $response) {
            $error = array();
            $error['message'] = $this->error($this->pdo) . "\nQuery is:\n" . $sql;
            echo JSON_encode($error);
        } else {
            $product = array();
            $i = 0;
            if (is_object($response) && $response->num_rows > 0) {
                while ($pro = mysqli_fetch_assoc($response)) {
                    $product[$i] = $pro;
                    $i++;
                }
                echo JSON_encode($product);
            }
        }

        return $response;
    }

    /**
     * Returns the last error message for the most recent MySQLi function call that can succeed or fail.
     * @access public
     * @return string    A string that describes the error. An empty string if no error occurred.
     */
    public function error($_link)
    {
        Logger::logDebugInformation('eeee');
        return mysqli_error($_link);
    }
}
