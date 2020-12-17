<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body>
     <div class="container">
          <div class="row">
               <div class="col-5">
                    <h2 class="mt-4">Daftar Cartoon</h2>
                    <form action="" method="post">
                         <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                   <button class="btn btn-info" type="submit" name="submit">Cari</button>
                              </div>
                              <input type="text" class="form-control" placeholder="masukkan nama cartoon.." name="keyword">
                         </div>
                    </form>
               </div>
          </div>
     </div>
     <div class="container">
          <div class="row">
               <div class="col">
                    <a href="/cartoon/create" class="btn btn-info mt-3">Tambah Data Cartoon</a>


                    <?php if (session()->getFlashdata('pesan')) : ?>
                         <div class="alert alert-info" role="alert">
                              <?= session()->getFlashdata('pesan'); ?>
                         </div>
                    <?php endif; ?>
                    <table class="table table-borderless">
                         <thead>
                              <tr>
                                   <th scope="col">No</th>
                                   <th scope="col">Sampul</th>
                                   <th scope="col">Judul</th>
                                   <th scope="col">Aksi</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $i = 1; ?>
                              <?php foreach ($cartoon as $c) : ?>

                                   <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><img src="/img/<?= $c['sampul']; ?>" alt="" class="sampul"></td>
                                        <td><?= $c['judul']; ?></td>
                                        <td>
                                             <a href="/cartoon/detail/<?= $c['slug']; ?>" class="btn btn-info">Detail</a>
                                        </td>
                                   </tr>
                              <?php endforeach; ?>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
     <?= $this->endSection(); ?>