<?php
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $expiration_date = '2021/12/01'; // random date

    // create db connection
    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASSWORD = "pa55word";
    $DB_DATABASE = "db_jason_willis";
    $mysqli_link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);

    // get the action you want this page to take
    $action = $_POST['action'];

    if($action=='check_login_data'){
        // get input data
        $input_username = $_POST['username'];
        $input_password = $_POST['password'];

        //test input data against db data
        //get data stored in db for given username
        $sql_test_inputs=$mysqli_link->prepare("SELECT * 
                                                FROM tbl_user_data
                                                WHERE username = ? 
                                                AND is_active = 1");
        $sql_test_inputs->bind_param('s',$input_username);
        $sql_test_inputs->execute();
        $db_data = $sql_test_inputs->get_result()->fetch_all(MYSQLI_ASSOC);
        $sql_test_inputs->close();
        // get db password for user
        $user_id = $db_data[0]['id'];
        $db_password = $db_data[0]['password'];
        //test input password against database password for username and make sure that something is entered for the input password
        if($db_password == $input_password && $input_password){
            //passwords match, return user_id
            echo $user_id;
        }
    }else if($action == 'print_string_table'){
        // insert current string into db if it exists
        $user_id = $_GET['user_id'];
        $string_to_save = $_POST['string_to_save'];
        if($string_to_save){
            $sql_insert_string=$mysqli_link->prepare("INSERT INTO tbl_strings
                                                    SET user_id = ?,
                                                    string = ?,
                                                    is_active = 1");
            $sql_insert_string->bind_param('is',$user_id, $string_to_save);
            $sql_insert_string->execute();
            $sql_insert_string->close();
        }
        // get current saved data
        $sql_get_string_list=$mysqli_link->prepare("SELECT string 
                                                    FROM tbl_strings
                                                    WHERE user_id = ?");
        $sql_get_string_list->bind_param('i',$user_id);
        $sql_get_string_list->execute();
        $db_data = $sql_get_string_list->get_result()->fetch_all(MYSQLI_ASSOC);
        $sql_get_string_list->close();
        // print table
        echo "<table class='table'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>Save Data Table</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach($db_data as $string_array){
                foreach($string_array as $single_string){
                    echo "<tr>";
                        echo "<td>$single_string</td>";
                    echo "</tr>";
                }
            }
            echo "</tbody>";
        echo "</table>";

    }else{
        echo "how did you get here";
    }
?>