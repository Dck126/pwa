<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body>
     <div class="container">
          <div class="row">
               <div class="col-4">
                    <h2 class="mt-4">Daftar Penulis Cartoon Terbaik</h2>
                    <form action="" method="post">
                         <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                   <button class="btn btn-info" type="submit" name="submit">Cari</button>
                              </div>
                              <input type="text" class="form-control" placeholder="masukkan data pencarian.." name="keyword">
                         </div>
                    </form>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <table class="table table-borderless">
                         <thead>
                              <tr>
                                   <th scope="col">No</th>
                                   <th scope="col">Nama</th>
                                   <th scope="col">Cartoon</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $i = 1 + (6 * ($currentpage - 1)); ?>
                              <?php foreach ($orang as $o) : ?>

                                   <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $o['nama']; ?></td>
                                        <td><?= $o['alamat']; ?></td>
                                        <!-- <td>
                                             <a href="" class="btn btn-info">Detail</a>
                                        </td> -->
                                   </tr>
                              <?php endforeach; ?>
                         </tbody>
                    </table>
                    <?= $pager->links('orang', 'orang_pagination'); ?>
               </div>
          </div>
     </div>
     <?= $this->endSection(); ?>