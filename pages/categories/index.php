<?php require_once '../../app/config.php'; ?>

<!-- < ?php getFile(PREV_FOLDER."app/database");   ?> -->
<?php require_once '../../app/database.php'; ?>


<!-- < ?php getFile(PREV_FOLDER."app/sessions");   ?> -->
<?php require_once '../../app/sessions.php'; ?>


<!-- < ?php getFile(PREV_FOLDER."inc/header");   ?> -->
<?php require_once '../../inc/header.php'; ?>

<div class="jumbotron p-2 m-4">
    <h3 class="">
        <a class="btn btn-success btn-lg" href="<?php url('pages/categories/add'); ?>" role="button">Add New Category </a>
    </h3>
</div>
<h1 class=" p-3 border display-4"> All Categories </h1>
<!-- < ?php getFile(PREV_FOLDER."inc/message"); ?> -->
<?php require_once '../../inc/message.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $data=db_get_all('categories','name');
                    foreach($data as $row):
                    ?>
                    <tr>
                        <th scope="row"><?php iteration(); ?></th>
                        <td> <?= $row['name'];?> </td>
                        <td>
                            <a href="<?php full_url('pages/categories/edit.php?id='.$row['id']); ?>" class="btn btn-info">Edit <i class="bi bi-pencil-square"></i></a>
                            <a href="<?php full_url('handelers/categories/delete.php?id='.$row['id']); ?>" class="btn btn-danger">Delete <i class="bi bi-x-square-fill"></i></a>
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