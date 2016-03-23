<?php
$conn = new mysqli("localhost", "mohsine_mps", "20151988", "mohsine_MPS_planning");
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}

//select data function 
 function sqlQuery($sql, $key = NULL) {
                                global $conn;
                                // execute query    
                                $db_result = $conn->query($sql);
                                // if db_result is null then trigger error
                                if (!$db_result) {
                                    print "SQL failed: (" . $conn->errno . ") " . $conn->error;
                                    exit();
                                }
                                // prepare result array
                                $resultSet = Array();
                                // if resulted array isn't true and that is in case of select statement then open loop
                                // (insert / delete / update statement will return true on success) 
                                if ($db_result !== true) {
                                    // loop through fetched rows and prepare result set
                                    while ($row = $db_result->fetch_row()) {
                                        // if array key is defined
                                        if ($key !== NULL) {
                                            $resultSet[$row[$key]] = $row;
                                        }
                                        // array key is not needed
                                        else {
                                            $resultSet[] = $row;
                                        }
                                    }
                                }
                                // return result set
                                return $resultSet;
                            }


?>