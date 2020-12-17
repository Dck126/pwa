<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
     <div class="row">
          <div class="col">
               <h2 class="mt-2">Detail Cartoon</h2>
               <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                         <div class="col-md-4">
                              <img src="/img/<?= $cartoon['sampul']; ?>" class="card-img" alt="...">
                         </div>
                         <div class="col-md-8">
                              <div class="card-body">
                                   <h5 class="card-title"><?= $cartoon['judul']; ?></h5>
                                   <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ab exercitationem cum maiores et distinctio labore nihil dolorum, tenetur sequi? Libero distinctio inventore consequuntur maiores ut, est voluptas. Velit, totam?</p>
                                   <p class="card-text"><b>Penulis : </b> <?= $cartoon['penulis']; ?>

                                   </p>
                                   <p class="card-text"><small class="text-muted"><b>Penerbit : </b><?= $cartoon['penerbit']; ?></small></p>

                                   <a href="/cartoon/edit/<?= $cartoon['slug']; ?>" class="btn btn-warning">Edit</a>

                                   <form action="/cartoon/<?= $cartoon['id']; ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus cartoon ini?');">Delete</button>
                                   </form>
                                   <br><br>
                                   <a href="/cartoon"> Daftar Cartoon</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection(); ?>