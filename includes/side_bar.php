<?php 
include_once "functions/category.php";
$categories = findAllCategories();
?>
<div class="col-md-4">

<!-- Blog Search Well -->
    <?php require_once "includes/search.php" ?>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php foreach($categories as $cat): ?>
                <li><a href="#"><?=$cat["cat_title"]; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>