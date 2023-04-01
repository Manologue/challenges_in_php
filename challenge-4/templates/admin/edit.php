<?php include('../' . VIEW_FOLDER . '/includes/header.php') ?>

<h2>Edit User</h2>
<br />
<form method="POST" action="<?= DOC_ROOT ?>admin/edit/<?= $id ?>" enctype="multipart/form-data">
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
      <input type="password" name="password" class="form-control" id="password" />
      <div class="form-text text-danger">
         <?= $errors['password'] ?>
      </div>
   </div>
   <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select name="role" class="form-control" id="role">
         <option value="<?= html_escape($user['role']) ?>"><?= ucfirst($user['role']) ?></option>
         <?php if ($user['role'] === 'subscriber'): ?>
            <option value="admin">Admin</option>
         <?php else: ?>
            <option value="subscriber">Subscriber</option>
         <?php endif; ?>
      </select>

   </div>

   <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>

<?php include('../' . VIEW_FOLDER . '/includes/footer.php') ?>