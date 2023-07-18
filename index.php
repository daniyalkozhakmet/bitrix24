<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kozhakmetov Daniyal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
</head>

<body>
  <div class="container my-4 px-4">
    <?php
    if (!empty($_SESSION['message'])) {
      echo '<p class="alert alert-success"> ' . $_SESSION['message'] . '</p>';
      unset($_SESSION['message']);
    }
    if (!empty($_SESSION['error'])) {
      echo '<p class="alert alert-danger"> ' . $_SESSION['error'] . '</p>';
      unset($_SESSION['error']);
    }
    ?>
    <h1 class="mb-3">Task 1 (Bitrix24)</h1>
    <form action="sender.php" method="POST">
      <div class="form-group my-2">
        <label for="name">Email address</label>
        <input type="email" class="form-control" id="name" name="name" placeholder="Enter name" required />
      </div>
      <div class="form-group my-2">
        <label for="email">Address</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required />
      </div>
      <div class="form-group my-2">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" required />
      </div>
      <div class="form-group my-2">
        <label for="message">Message</label>
        <input type="text" class="form-control" id="message" name="message" placeholder="Enter message" required />
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>