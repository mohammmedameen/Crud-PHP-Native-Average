<?php 
require_once '../../app/config.php';

// getFile(HANDELER_FOLDER."database");
require_once '../../app/database.php';

// getFile(HANDELER_FOLDER."sessions");
require_once '../../app/sessions.php';

// getFile(HANDELER_FOLDER."validation");
require_once '../../app/validation.php';

// check if id was sent throgh url ( get method )
if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == "GET"){

    // sanitize the id 
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    if(db_delete("products","id=$id")){

        // check if this id is exists in db 
        if(db_affected_rows()){
            setSession('success',"deleted successsfully");
        }else{
            setSession('errors',['Error in deleting operation']);
        }
    }else{
        setSession('errors',['this id is not exist']);
    }
}

redirect("pages/products/index");