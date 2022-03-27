<?php require_once '../../app/config.php'; ?>

<!-- < ?php getFile(PREV_FOLDER."app/database");   ?> -->
<?php require_once '../../app/database.php'; ?>


<!-- < ?php getFile(PREV_FOLDER."app/sessions");   ?> -->
<?php require_once '../../app/sessions.php'; ?>


<!-- < ?php getFile(PREV_FOLDER."inc/header");   ?> -->
<?php require_once '../../inc/header.php'; ?>

<div class="jumbotron p-2 m-4">
    <h3 class="">
        <a class="btn btn-primary btn-lg" href="<?php url('pages/products/index'); ?>" role="button">View All Products </a>
    </h3>
</div>
<h1 class=" p-3 border display-4"> Add New Product </h1>
<!-- < ?php getFile(PREV_FOLDER."inc/message"); ?> -->
<?php require_once '../../inc/message.php'; ?>


<?php
/* 
$data=db_get_all('categories','name');
foreach($data as $row):
echo '<pre>';
print_r($row);
echo '</pre>';
endforeach;

*/ ?>



<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <form class="p-4 m-3 border bg-gradient-info" method="POST" action="<?php url("handelers/products/insert"); ?>">
               
               <div class="form-group">
                    <label for="cat">Category</label>
                    <select name="category_id" class="form-control" id="">
                        <?php
                        $data = db_get_all('categories', 'name');
                        foreach ($data as $row) : ?>
                            <option value="<?php echo $row['id']; ?>"><?= $row['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cat">Product Name</label>
                    <input type="text" name="name" value="<?php old('name') ?>" class="form-control" id="cat">
                </div>
                <div class="form-group">
                    <label for="cat">Product Price</label>
                    <input type="number" name="price" value="<?php old('price') ?>" class="form-control" id="cat">
                </div>
                <div class="form-group">
                    <label for="cat">Product Quantity</label>
                    <input type="number" name="qty" value="<?php old('qty') ?>" class="form-control" id="cat">
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-reply-all-fill"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>

<!-- < ?php getFile(PREV_FOLDER."inc/footer");   ?> -->
<?php include '../../inc/footer.php'; ?>