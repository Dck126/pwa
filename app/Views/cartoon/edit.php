<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
     <div class="row">
          <div class="col-8">
               <h2 class="my-3">Ubah Data Cartoon</h2>
               <form action="/cartoon/update/<?= $cartoon['id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="<?= $cartoon['slug']; ?>">
                    <input type="hidden" name="sampulLama" value="<?= $cartoon['sampul']; ?>">
                    <div class="row mb-2">
                         <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?> " id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $cartoon['judul'] ?>">
                              <div class="invalid-feedback">
                                   <?= $validation->getError('judul'); ?>
                              </div>
                         </div>
                    </div>
                    <div class="row mb-2">
                         <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?> " id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $cartoon['penulis'] ?>">
                              <div class="invalid-feedback">
                                   <?= $validation->getError('penulis'); ?>
                              </div>
                         </div>
                    </div>
                    <div class="row mb-2">
                         <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $cartoon['penerbit'] ?>">
                              <div class="invalid-feedback">
                                   <?= $validation->getError('penerbit'); ?>
                              </div>
                         </div>
                    </div>
                    <div class="row mb-2">
                         <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                         <div class="col-sm-2">
                              <img src="/img/<?= $cartoon['sampul']; ?>" class="img-thumbnail img-preview">
                         </div>
                         <div class="col-sm-8">
                              <div class="custom-file">
                                   <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                                   <div class="invalid-feedback">
                                        <?= $validation->getError('sampul'); ?>
                                   </div>
                                   <label class="custom-file-label" for="sampul"><?= $cartoon['sampul']; ?></label>
                              </div>
                         </div>
                    </div>
                    <div class="row mb-2">
                         <div class="col-sm-10 offset-sm-2">
                              <div class="form-check">
                                   <input class="form-check-input" type="checkbox" id="gridCheck1">
                                   <label class="form-check-label" for="gridCheck1">
                                        Example checkbox
                                   </label>
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-info">Ubah Cartoon</button>
               </form>
          </div>
     </div>
</div>
<?= $this->endSection(); ?>