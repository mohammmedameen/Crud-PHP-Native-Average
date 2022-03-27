<?php 
require_once '../../app/config.php';

// getFile(HANDELER_FOLDER."database");
require_once '../../app/database.php';

// getFile(HANDELER_FOLDER."sessions");
require_once '../../app/sessions.php';

// getFile(HANDELER_FOLDER."validation");
require_once '../../app/validation.php';


// check if id was sent throgh url ( get method )
if(isset($_POST['id']) && $_SERVER['REQUEST_METHOD'] == "POST"){

    // sanitize the id 
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
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



    

    // check from validation 
    if(empty($errors)){
        // check if this id is exists in db 
        if(db_get_row("categories","id=$id")){
            
            
            $fields['name'] = "$name";
            if(UpdateTable("categories",$fields,"id=$id")){
                setSession('success',"updated successsfully");
            }
            
            
            else{
                setSession('errors',['Error in updating operation']);
            }

            
        }else{
            setSession('errors',['this id is not exist']);
        }

    }else{
        setSession('errors',$errors);
        redirect("pages/categories/edit.php?id=".$id);
    }
}
redirect("pages/categories/index");
