<?php include('includes/header.php') ?>

<?php if ($success !== null): ?>
   <h3 class="text-success">
      <?= $success ?>
   </h3>
<?php endif; ?>
<br />
<h2>Users</h2>
<br />
<table class=" table">
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
         </tr>
      <?php endforeach ?>
   </tbody>
</table>


<?php include('includes/footer.php') ?>