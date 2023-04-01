<?php include('../' . VIEW_FOLDER . '/includes/header.php') ?>


<?php if ($success !== null): ?>
   <h2 class="text-success">
      <?= $success ?>
   </h2>
<?php endif; ?>

<h2>Add User</h2>
<br />
<form method="POST" action="<?= DOC_ROOT ?>admin/index" enctype="multipart/form-data">
   <div class="text-danger">
      <?= $errors['warning'] ?>
   </div>
   <div class="mb-3">
      <label for="username" class="form-label">User Name</label>
      <input type="text" value="<?= html_escape($user['username']) ?>" name="username" class="form-control"
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
   <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select name="role" class="form-control" id="role">
         <option value="subscriber">Subscriber</option>
         <option value="admin">Admin</option>
      </select>

   </div>

   <button type="submit" name="add" class="btn btn-primary">Submit</button>
</form>

<br />
<h2>Users</h2>
<br />
<table class="table">
   <thead>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Username</th>
         <th scope="col">Role</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($users as $user): ?>
         <tr>
            <th scope="row">
               <?= html_escape($user['id']) ?>
            </th>
            <td>
               <?= html_escape($user['username']) ?>
            </td>
            <td>
               <?= html_escape($user['role']) ?>
            </td>
            <td class="d-flex">
               <form method="POST" action="<?= DOC_ROOT ?>admin/index">
                  <input value=<?= html_escape($user['id']) ?> name="id" type="hidden">
                  <button name="delete" type="submit" onclick="return confirm('Delete this user ?')"
                     class="btn  btn-danger">Delete</button>
               </form>
               <a href="<?= DOC_ROOT ?>admin/edit/<?= html_escape($user['id']) ?>" class="btn  btn-primary">Edit</a>
            </td>
         </tr>
      <?php endforeach ?>
   </tbody>
</table>


<?php include('../' . VIEW_FOLDER . '/includes/footer.php') ?>