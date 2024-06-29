<?php
require_once('header.php');

$user = unserialize($_SESSION["user"]);
$myposts = $user->my_posts($user->id);
?>

<style>
    .bg-custom {
        background-color: #e3f2fd;
    }

    .card-custom {
        border-radius: 1rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .img-custom {
        width: 180px;
        border-radius: 10px;
    }

    .form-custom {
        background-color: #fff;
        border-radius: 1rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-custom {
        background-color: #007bff;
        border: none;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    .alert-custom {
        border-radius: .5rem;
    }

    .card-custom-body {
        padding: 2rem;
    }
</style>


<section class="w-100 px-4 py-5 bg-custom">
    <div class="row d-flex justify-content-center">
        <div class="col col-md-9 col-lg-7 col-xl-6">
            <div class="card card" style="border-radius:15px;">
                <div class="card card-custom">
                    <div class="card-body ">
                        <div class="d-flex">
                            <div class="col-xl-4">
                                <div class="card mb-4 mb-xl-2">
                                    <div class="card-header text-center ">picture profile</div>
                                    <div class="card-body text-center">

                                        <img class="img-account-profile rounded-circle mb-2" style="width: 110px; height: 110px; border-radius 110px;" src="<?php if (!empty($user->image)) echo $user->image;
                                                                                                                                                            else echo 'https://png.pngtree.com/png-vector/20230131/ourlarge/pngtree-flat-style-user-profile-icon-on-isolated-background-vector-png-image_49602770.jpg'; ?>" alt="">
                                    </div>
                                </div>
                            </div>



                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1" id="roleTitle"><?= ($user->Name) ?></h5>
                                <p class="text-muted mb-2 pb-1" id="roleDescription"><?= ($user->role) ?></p>
                                <div class="d-flex justify-content-start rounded-3 p-2 mb-2 bg-light">
                                    <div>
                                        <p class="small text-muted mb-1">Articles</p>
                                        <p class="mb-0">41</p>
                                    </div>
                                    <div class="px-3">
                                        <p class="small text-muted mb-1">Followers</p>
                                        <p class="mb-0">976</p>
                                    </div>
                                    <div>
                                        <p class="small text-muted mb-1">Rating</p>
                                        <p class="mb-0">8.5</p>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProfileModal">Update Profile</button>
                                <div id="alertContainer" class="mt-3"></div> <!--Container for the alert -->

                                <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'succsess img update') { ?>
                                    <div class="alert alert-success alert-custom" role="alert">
                                        <strong>Success:</strong> Image updated successfully.
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Update Profile Modal -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="store_user_image.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="profileImageInput" class="form-label">Profile Image</label>
                        <input type="file" name="image" class="form-control" id="profileImageInput" name="profileImage">
                    </div>
                    <div class="mb-3">
                        <label for="roleInput" class="form-label">Role</label>
                        <input type="text" class="form-control" id="roleInput" name="role" value="<?= htmlspecialchars($user->role) ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="container my-5">
    <div class="row">
        <div class="col-6 offset-3 bg-primary text-white text-center mt-5 rounded-4 py-3">
            <h1>share your perspective</h1>
        </div>
        <div class="col-6 offset-3 bg-light mt-5 rounded-4 p-5 shadow-sm form-custom">
            <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'Done') { ?>
                <div class="alert alert-success alert-custom" role="alert">
                    <strong>Success:</strong> Post Added successfully.
                </div>
            <?php } ?>
            <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'required_fileds') { ?>
                <div class="alert alert-danger alert-custom" role="alert">
                    <strong>Error:</strong> Required fields are missing.
                </div>
            <?php } ?>
            <form action="storepost.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" />
                    <small class="text-muted">Enter the title of your post.</small>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" class="form-control"></textarea>
                    <small class="text-muted">Write the content of your post.</small>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" />
                    <small class="text-muted">Upload an image for your post (optional).</small>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>

    <?php foreach ($myposts as $post) {
    ?>
        <div class="col-6 offset-3 mt-5">
            <div class="card shadow-sm rounded-4 card-custom">

                <?php if (!empty($post["image"])) { ?>
                    <img class="card-img-top" src="<?= ($post["image"]) ?>" alt="Post Image" />
                <?php } ?>
                <div class="card-body">
                    <h4 class="card-title"><?= ($post["title"]) ?></h4>
                    <p class="card-text"><?= ($post["content"]) ?></p>

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

<script>
    document.getElementById('postForm').addEventListener('submit', function(event) {
        var title = document.getElementById('title').value.trim();
        var content = document.getElementById('content').value.trim();

        if (title === '' || content === '') {
            alert('Please fill in both the title and content fields.');
            event.preventDefault();
        }
    });
</script>

<?php
require_once('footer.php');
?>