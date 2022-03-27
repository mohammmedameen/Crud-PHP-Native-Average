<?php require_once '../../app/config.php'; ?>
<!-- < ?php getFile(PREV_FOLDER."app/database");   ?> -->
<?php require_once '../../app/database.php'; ?>

<!-- < ?php getFile(PREV_FOLDER."app/sessions");   ?> -->
<?php require_once '../../app/sessions.php'; ?>
<?php // check if id was sent throgh url ( get method )
if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == "GET"){

    // sanitize the id 
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    

    // check if this id is exists in db 
    $row = db_get_row("categories", "id=$id");
    if(!$row){
        redirect("pages/categories/index");
    }
}
?>
<!-- < ?php getFile(PREV_FOLDER."inc/header");   ?> -->
<?php require_once '../../inc/header.php'; ?>


<div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="<?php url("pages/categories/index"); ?>" role="button">View All Categories </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Edit Categoery  </h1>
    <!-- < ?php getFile(PREV_FOLDER."inc/message"); ?> -->
    <?php require_once '../../inc/message.php'; ?>

        
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <form class="p-4 m-3 border bg-gradient-info" method="POST" action="<?php url("handelers/categories/update"); ?>">
                    <div class="form-group">
                        <label for="cat">Category Name</label>
                        <input type="text" value="<?= $row['name'];?>" name="name" class="form-control" id="cat" >
                        <input type="hidden" name="id" value="<?=$id;?>">
                    </div>
        
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-reply-all-fill"></i> Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

<!-- < ?php include '../inc/footer.php'; ?> -->
<?php include '../../inc/footer.php'; ?>