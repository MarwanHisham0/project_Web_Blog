<?php
session_start();

require_once('header.php');
require_once('../../classes.php');
$user = unserialize($_SESSION["user"]);
$all_users = $user->get_all_users();
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
     
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi">
          <use xlink:href="#calendar3" />
        </svg>
        This week
      </button>
    </div>
  </div>

  <h2 class="mt-4">All Users</h2>
  <div class="table-responsive small">
    <table class="table table-hover table-sm align-middle">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($all_users as $user): ?>
          <tr>
            <td><?= htmlspecialchars($user["id"]) ?></td>
            <td><?= htmlspecialchars($user["Name"]) ?></td>
            <td><?= htmlspecialchars($user["Email"]) ?></td>
            <td><?= htmlspecialchars($user["role"]) ?></td>
            <td><?= htmlspecialchars($user["Phone"]) ?></td>
            <td>
              <form action="deleteaccount.php" method="post" onsubmit="return confirm('Are you sure you want to delete this account?');" style="display:inline-block;">
                <input type="hidden" name="user_id" value="<?= ($user["id"]) ?>">
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>
<?php
require_once('footer.php');
?>
