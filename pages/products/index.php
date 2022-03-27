<?php require_once '../../app/config.php'; ?>

<!-- < ?php getFile(PREV_FOLDER."app/database");   ?> -->
<?php require_once '../../app/database.php'; ?>


<!-- < ?php getFile(PREV_FOLDER."app/sessions");   ?> -->
<?php require_once '../../app/sessions.php'; ?>


<!-- < ?php getFile(PREV_FOLDER."inc/header");   ?> -->
<?php require_once '../../inc/header.php'; ?>







<div class="jumbotron p-2 m-4">
    <h3 class="">
        <a class="btn btn-success btn-lg" href="<?php url('pages/products/add') ?>" role="button">Add New Product </a>
    </h3>
</div>
<h1 class=" p-3 border display-4"> All Products </h1>
<!-- < ?php getFile(PREV_FOLDER."inc/message"); ?> -->
<?php require_once '../../inc/message.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>



                <tbody>
                    <?php
                    // $data=db_join("products","categories","category_id  ","category_id ");
                    // $data=db_get_row("products", "id_prodect = 17");
                    $data = db_get_all("products", "id");
                    foreach ($data as $row) :
                    ?>
                        <tr>
                            <th scope="row"><?php iteration(); ?></th>
                            <td><?= $row['name']; ?> </td>
                            <td><?= $row['price']; ?> </td>
                            <td><?= $row['qty']; ?> </td>
                            <td>
                                <a href="<?php full_url('pages/products/edit.php?id=' . $row['id']); ?>" class="btn btn-info">Edit <i class="bi bi-pencil-square"></i></a>
                                <a href="<?php full_url('handelers/products/delete.php?id=' . $row['id']); ?>" class="btn btn-danger">Delete <i class="bi bi-x-square-fill"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>


            </table>


        </div>
    </div>
</div>


<!-- < ?php getFile(PREV_FOLDER."inc/footer");   ?> -->
<?php include '../../inc/footer.php'; ?>