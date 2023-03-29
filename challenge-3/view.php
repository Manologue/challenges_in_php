<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <div class="section section-color-description">
      <div class="section-center">

         <!-- alerts -->
         <?php if (isset($mssg['success'])): ?>
            <h4 class="text-success">
               <?= $mssg['success'] ?>
            </h4>
         <?php endif ?>
         <?php if (isset($mssg['failure'])): ?>
            <h4 class="text-danger">
               <?= $mssg['failure'] ?>
            </h4>
         <?php endif ?>

         <!-- form input -->
         <form action="index" method="GET">
            <input name="numbers" placeholder="Enter numbers e.g 1...25,63.2" type="text">
            <button type="submit">Submit</button>
         </form>
         <br />

         <!-- colors descriptions -->
         <div class="container">
            <?php if (!empty($data)): ?>
               <?php foreach ($data as $number): ?>
                  <?php if (!in_array(numberColorStatus($number)[0], $check_colors)):
                     $check_colors[] = numberColorStatus($number)[0] // to prevent duplicates
                        ?>
                     <div class="box-item">
                        <div class="box bg-<?= numberColorStatus($number)[0] ?>"></div>
                        <p>
                           <?= numberColorStatus($number)[1] ?>
                        </p>
                     </div>
                  <?php endif ?>
               <?php endforeach ?>
            <?php endif ?>
         </div>

         <!-- list of numbers -->
         <table>
            <tr>
               <th>
                  <h2>numbers</h2>
               </th>
            </tr>
            <?php if (!empty($data)): ?>
               <?php foreach ($data as $number): ?>
                  <tr>
                     <td class="color-<?= numberColorStatus($number)[0] ?>">
                        <?= $number ?>
                     </td>
                  </tr>
               <?php endforeach ?>
            <?php endif ?>
         </table>
      </div>
   </div>
</body>

</html>