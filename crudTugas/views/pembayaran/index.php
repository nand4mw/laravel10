 <?php
    require_once("../../controllers/pembayaran/pembayaranController.php");



    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>

 <body>
     <table border="1" cellpadding="20" cellspacing="0">
         <tr>
             <th>No</th>
             <th>Nama Pembayaran</th>
             <th>Nominal Terbayar</th>
             <th>Action</th>
         </tr>
         <?php $i = 1;
            foreach ($pembayaran as $pmb) : ?>
             <tr>
                 <td> <?= $i++; ?> </td>
                 <td> <?= $pmb["nama_pembayaran"] ?> </td>
                 <td> <?= $pmb["nominal_terbayar"] ?> </td>

                 <td>
                     <a href="update.php?id=<?= $pmb["id_pembayaran"] ?> ">Update</a> |
                     <a href="delete.php?id=<?= $pmb["id_pembayaran"] ?> " onclick="return confirm('Yakin anda Ingin menghapusnya ?')">Delete</a>
                 </td>
             </tr>


         <?php endforeach; ?>
     </table>
 </body>

 </html>