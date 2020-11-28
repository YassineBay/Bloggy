<?php 
if (sizeof($posts) == 0):  
    echo "You have no posts";
else :
?>
<table class="table table-bordered">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Auther</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Comments</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Actions</th>

                                </tr>
                              </thead>
                              <tbody>
                                  <?php foreach($posts as $post): ?>
                                  <tr>
                                  <td><?= $post["id"] ?></td>
                                  <td><?= $post["post_author"] ?></td>
                                  <td><?= $post["nom"] ?></td>
                                  <td><?php echo findCategoryById($post["post_cat_id"])?></td>
                                  <td><?= $post["post_status"] ?></td>
                                  <td><img width="50" height="50" class="img-responsive" src="../img/<?= $post["post_image"] ?>"/></td>
                                  <td>Comment Count</td>
                                  <td><?= $post["publish_date"] ?></td>
                                  <td colspan="2">
                                        <a class="btn btn-primary" href="posts.php?option=edit_post&id=<?php echo $post["id"] ?>"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="posts.php?option=del_post&id=<?php echo $post["id"] ?>"><i class="fa fa-trash"></i></a></td>
                                   <td>
                                       <?php if($post["post_status"] == "Unpublished") : ?>
                                        <a class="btn btn-success" href="posts.php?option=share_post&id=<?php echo $post["id"] ?>"><i class="fa fa-share-square-o"></i></a>
                                        <?php else: ?>
                                       <a class="btn btn-danger" href="posts.php?option=Unshare_post&id=<?php echo $post["id"] ?>"><i class="fa fa-share-square-o"></i></a>
                                       <?php endif; ?>
                                      </td>
                                  </tr>
                                
                                  <?php endforeach; ?>
                              </tbody>
                        </table>
<?php 
endif;
?>