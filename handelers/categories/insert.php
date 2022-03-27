<?php 
require_once '../../app/config.php';

// getFile(HANDELER_FOLDER."database");
require_once '../../app/database.php';

// getFile(HANDELER_FOLDER."sessions");
require_once '../../app/sessions.php';

// getFile(HANDELER_FOLDER."validation");
require_once '../../app/validation.php';




if(isset($_POST['name']) && $_SERVER['REQUEST_METHOD'] == "POST"){

    $name = val_sanitize($_POST['name']);

    // validations 
    if(!val_required($name)){
        $errors[] = "this field required";
    }elseif(!val_string($name)){
        $errors[] = "this field must be a string";
    }
    elseif(!val_min($name,3)){
        $errors[] = "this field must be grater than 3 chars";
    }
    elseif(!val_max($name,30)){
        $errors[] = "this field must be smaller than 30 chars";
    }



    if(empty($errors)){

        $fields['name'] = "$name";
        InsertInTable("categories",$fields);
        
        if(db_affected_rows()){
            setSession("success","added success");
            redirect("pages/categories/index");
        }
    }else{
        setSession('errors',$errors);
        // var_dump(getSession('errors'));
        redirect("pages/categories/add");
    }


}

