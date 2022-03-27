<?php



function get_row($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_assoc($result);
    }
}





//check if value in database or not
function db_real_escape($value){
    global $conn;
    return mysqli_real_escape_string($conn,$value);
}

//check if query is true or not
function db_affected_rows(){
    global $conn;
    if(mysqli_affected_rows($conn) >= 0){
        return true;
    }else{
        die("database error : ". mysqli_error($conn));
    }
}

// insert into database 
function InsertInTable($table,&$fields){
    global $conn;

    $col = "insert into $table (`".implode("` , `",array_keys($fields))."`)";
    $val = " values('";		

    foreach($fields as $key => $value) { 
        $fields[$key] =  db_real_escape($value);
    }

    $val .= implode("' , '",array_values($fields))."');";		
	
    $fields = array();
    $query = $col . $val;
    $result = mysqli_query($conn,$query);
    return db_affected_rows();
}


// Modify database data
function UpdateTable($table,&$fields,$condition) {
    global $conn;
    $sql = "UPDATE $table SET ";
    foreach($fields as $key => $value) { 
        $fields[$key] = " `$key` = '".db_real_escape($value)."' ";
    }
    $sql .= implode(" , ",array_values($fields))." WHERE ".$condition.";";	
    $fields = array();
    $result = mysqli_query($conn,$sql);
    return db_affected_rows();
}

// delete items from database
function db_delete($table,$condition){
    global $conn;
    $query ="DELETE FROM `$table` WHERE $condition";
    $result =mysqli_query($conn,$query);
    return db_affected_rows();
}

//retreve all data  in same time
function db_get_all($table,$order){
    global $conn;
    $query ="SELECT * FROM `$table` ORDER BY $order DESC";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        return [];
    }
}

//retreve data as row
function db_get_row($table, $condition){
    global $conn;
    $query ="SELECT * FROM `$table` WHERE $condition";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_assoc($result);
    }else{
        return [];
    }
}

function db_join($F_table,$S_table,$F_column,$S_column){
    global $conn;
    $query ="SELECT * FROM `$F_table` INNER JOIN $S_table ON $F_column = $S_column";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        return [];
    }
}

?>