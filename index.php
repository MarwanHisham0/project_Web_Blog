<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Signin Template · Bootstrap v5.3</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }

    body {
      background: #f8f9fa;
      font-family: 'Helvetica Neue', Arial, sans-serif;
    }

    .form-signin {
      max-width: 400px;
      padding: 15px;
      margin: auto;
      background: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .form-signin h1 {
      color: #1877F2;
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .form-signin h1.mb-3.fw-normal {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #333;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    .form-signin .form-check-label {
      font-size: 0.875rem;
    }

    .form-signin .btn-primary {
      background-color: #1877F2;
      border-color: #1877F2;
      font-weight: 600;
    }

    .form-signin .btn-primary:hover {
      background-color: #145dbf;
      border-color: #145dbf;
    }

    .form-signin .alert {
      text-align: left;
      font-size: 0.875rem;
    }

    .form-signin .p-3 {
      text-align: center;
      font-size: 0.875rem;
    }

    .form-signin .p-3 a {
      color: #1877F2;
    }

    .form-signin .p-3 a:hover {
      text-decoration: underline;
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="assets/sign-in.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258a1.156 1.156 0 0 0 .732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path d="M8 4.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7zM8 1a.5.5 0 0 1 .5.5V3a.5.5 0 0 1-1 0V1.5A.5.5 0 0 1 8 1zm4.5 7a.5.5 0 0 1 .5-.5H15a.5.5 0 0 1 0 1h-2.5a.5.5 0 0 1-.5-.5zm-10 0a.5.5 0 0 1 .5-.5H5a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5zm8.096 5.096a.5.5 0 0 1 0-.707l1.768-1.768a.5.5 0 0 1 .708.707l-1.768 1.768a.5.5 0 0 1-.708 0zm-8.192 0a.5.5 0 0 1 0-.707l1.768-1.768a.5.5 0 1 1 .708.707l-1.768 1.768a.5.5 0 0 1-.708 0zm8.192-10.192a.5.5 0 0 1 .707 0l1.768 1.768a.5.5 0 0 1-.707.708L10.5 3.914a.5.5 0 0 1 0-.708zM3.914 10.5a.5.5 0 0 1 0-.707l1.768-1.768a.5.5 0 1 1 .708.707L4.621 10.5a.5.5 0 0 1-.707 0z" />
    </symbol>
  </svg>

  <main class="form-signin w-100 m-auto">

    <form action="handle_login.php" method="post">
      <h1 class="mb-3  fw-normal "> Please sign in..</h1>

      <?php
      if (!empty($_GET["msg"]) && $_GET["msg"] == 'empty_field') {
      ?>
        <div class="alert alert-danger" role="alert">
          <strong>Empty Field! </strong><br> please Enter Email And Password.
        </div>

      <?php
      }
      ?>

      <?php
      if (!empty($_GET["msg"]) && $_GET["msg"] == 'no_user') {
      ?>
        <div class="alert alert-warning" role="alert">
          <strong>No User! </strong><br> please Enter valid Email And Password or <a href="register.php">register</a>
        </div>

      <?php
      }
      ?>

      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <?php if (isset($_GET['error'])) : ?>
        <div class="alert alert-danger mt-2"><?php echo $_GET['error']; ?></div>
      <?php endif; ?>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

      <div class="p-3">

        <strong>Create a new account ? </strong> <a href="register.php">new account</a>
      </div>
    </form>
    <p class="mt-3 text-muted">© Deade Zone</p>
  </main>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>