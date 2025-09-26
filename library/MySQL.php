<?php
class MySQL{
    protected $DB_NAME = 'Teampoint';
    function query($query){
        $db = mysqli_connect('localhost','root','',$this->DB_NAME);
        $response = mysqli_query($db,$query);
        if (FALSE === $response) {
            $error = array();
            $error['message'] = $this->error($db) . "\nQuery is:\n" . $query;
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
