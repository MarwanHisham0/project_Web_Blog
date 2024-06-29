<?php

require_once('header.php');
require_once('../../classes.php');
$user = unserialize($_SESSION["user"]);
$homeposts = $user->home_posts();




?>
<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Welcome <?=$user->Name?></h1>
      </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row">
        <?php foreach ($homeposts as $post) {
        ?>
          <div class="col-6 offset-3 mt-5">
            <div class="card shadow-sm rounded-4 card-custom">
               
              <?php if (!empty($post["image"])) { ?>
                <img class="card-img-top" src="<?= htmlspecialchars($post["image"]) ?>" alt="Post Image" />
              <?php } ?>
              <div class="card-body">
                <h4 class="card-title"><?= htmlspecialchars($post["title"]) ?></h4>
                <p class="card-text"><?= htmlspecialchars($post["content"]) ?></p>

                                    <!------------likes---------->
                                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
                        <style>
                            .button-container {
                                display: flex;
                                justify-content: flex-start;
                                gap: 10px;
                                /* زيادة المسافة بين الأزرار */
                            }

                            .like-button,
                            .dislike-button {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                width: 90px;
                                /* تصغير عرض الأزرار */
                                height: 30px;
                                /* تصغير ارتفاع الأزرار */
                                font-size: 14px;
                                /* تصغير حجم الخط */
                                border: none;
                                border-radius: 20px;
                                /* تقليل زوايا الأزرار */
                                color: #fff;
                                cursor: pointer;
                                transition: transform 0.3s, box-shadow 0.3s;
                                text-transform: uppercase;
                                outline: none;
                            }

                            .like-button i,
                            .dislike-button i {
                                margin-right: 6px;
                                /* زيادة المسافة بين الأيقونة والنص */
                            }

                            .like-button {
                                background-color: #1abc9c;
                                /* لون الإعجاب */
                                box-shadow: 0 4px 8px rgba(26, 188, 156, 0.3);
                                /* تعديل ظل الأزرار */
                            }

                            .like-button:hover {
                                transform: translateY(-2px);
                                /* تعديل حركة التحويم */
                                box-shadow: 0 6px 12px rgba(26, 188, 156, 0.3);
                                /* تعديل ظل الأزرار عند التحويم */
                            }

                            .dislike-button {
                                background-color: #e74c3c;
                                /* لون عدم الإعجاب */
                                box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
                                /* تعديل ظل الأزرار */
                            }

                            .dislike-button:hover {
                                transform: translateY(-2px);
                                /* تعديل حركة التحويم */
                                box-shadow: 0 6px 12px rgba(231, 76, 60, 0.3);
                                /* تعديل ظل الأزرار عند التحويم */
                            }
                        </style>


                    </head>

                    <body>

                       

                            <form action="like_posts.php" method="post">
                                <input type="hidden" name="like" value="<?= $post["id"] ?>">
                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col text-center">
                                            <div class="button-container">


                                                <button class="like-button">

                                                    <i class="fas fa-thumbs-up"></i>
                                                    Like
                                                </button>
                                                <button class="dislike-button">
                                                    <i class="fas fa-thumbs-down"></i>
                                                    Dislike
                                                </button>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
                    </body>

                    </html>


                    <!------------likes---------->
              </div>

              <div class="row d-flex justify-content-center">
                <div class="col">
                  <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4">

                      <form action="store_comment.php" method="post">
                        <div data-mdb-input-init class="form-outline mb-4">
                          <input type="text" id="addANote" name="comment" class="form-control" placeholder="Type comment..." />
                          <input type="hidden" name="post_id" value="<?= $post["id"] ?>">
                          <button type="submit" class="btn btn-primary mt-2 ms-2 ">+ Add a note</button>
                        </div>
                      </form>




                      <?php

                      $Comments = $user->get_post_comment($post["id"]);
                      foreach ($Comments as $comment) {
                      ?>
                        <div class="card mb-4">
                          <div class="card-body">
                            <p><?= $comment["comment"] ?></p>

                            <div class="d-flex justify-content-between">
                              <div class="d-flex flex-row align-items-center">
                                <img src="<?php if (!empty($comment['image'])) echo $comment['image'];
                                          else echo 'https://png.pngtree.com/png-vector/20230131/ourlarge/pngtree-flat-style-user-profile-icon-on-isolated-background-vector-png-image_49602770.jpg'; ?>" alt="" width="25" height="25" />
                                <p class="small mb-0 ms-2"><?= $comment["Name"] ?></p>
                              </div>
                              <div class="d-flex flex-row align-items-center">
                                <p class="small text-muted mb-0"><?= $comment["created_at"] ?></p>

                              </div>
                            </div>
                          </div>
                        </div>
                      <?php
                      }
                      ?>



                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        <?php } ?>



      </div>
    </div>
  </div>

</main>
<?php

require_once('footer.php');
?>