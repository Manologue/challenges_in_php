<?php include('includes/header.php') ?>
<h2>Register</h2>
<br />
<form method="POST" action="<?= DOC_ROOT ?>register" enctype="multipart/form-data">
   <div class="text-danger">
      <?= $errors['warning'] ?>
   </div>
   <div class="mb-3">
      <label for="username" class="form-label">User Name</label>
      <input type="text" name="username" value="<?= html_escape($user['username']) ?>" class="form-control"
         id="username" />
      <div class="form-text text-danger">
         <?= $errors['username'] ?>
      </div>
   </div>
   <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" value="<?= html_escape($user['password']) ?>" name="password" class="form-control"
         id="password" />
      <div class="form-text text-danger">
         <?= $errors['password'] ?>
      </div>
   </div>

   <button type="submit" name="register" class="btn btn-primary">Submit</button>
</form>

<?php include('includes/footer.php') ?>