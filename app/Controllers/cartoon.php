<?php

namespace App\Controllers;

use App\Models\CartoonModel;

class cartoon extends BaseController
{
     protected $cartoonModel;

     public function __construct()
     {
          $this->cartoonModel = new CartoonModel();
     }

     public function index()
     {
          $keyword = $this->request->getVar('keyword');
          if ($keyword) {
               $cartoon = $this->cartoonModel->search($keyword);
          } else {

               $cartoon = $this->cartoonModel;
          }
          $data = [
               'title' => 'Daftar Cartoon',
               'cartoon' => $this->cartoonModel->getCartoon()
          ];


          return view('cartoon/index', $data);
     }



     public function detail($slug)
     {
          $data = [
               'title' => 'Detail Cartoon',
               'cartoon' => $this->cartoonModel->getCartoon($slug)
          ];
          //Jika cartoon tidak ada di cartoon
          if (empty($data['cartoon'])) {
               throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul cartoon' . $slug . 'tidak ditemukan.');
          }
          return view('cartoon/detail', $data);
     }

     public function create()
     {

          $data = [
               'title' => 'Form Tambah Data Cartoon',
               'validation' => \Config\Services::validation()

          ];

          return view('cartoon/create', $data);
     }
     public function save()
     {
          //validasi input
          if (!$this->validate([
               'judul' => [
                    'rules' => 'required|is_unique[cartoon.judul]',
                    'errors' => [
                         'required' => '{field} cartoon wajib diisi.',
                         'is_unique' => '{field} cartoon sudah ada.'
                    ]
               ],
               'penulis' => [
                    'rules' => 'required|is_unique[cartoon.penulis]',
                    'errors' => [
                         'required' => '{field} cartoon wajib diisi.',
                         'is_unique' => '{field} cartoon sudah ada.'
                    ]
               ],
               'penerbit' => [
                    'rules' => 'required|is_unique[cartoon.penerbit]',
                    'errors' => [
                         'required' => '{field} cartoon wajib diisi.',
                         'is_unique' => '{field} cartoon wudah ada.'
                    ]
               ],
               'sampul' => [
                    'rules' => 'required|is_unique[cartoon.sampul]',
                    'errors' => [
                         'required' => '{field} cartoon wajib diisi.',
                         'is_unique' => '{field} cartoon sudah ada.'
                    ]
               ],
               'sampul' => [
                    'rules' => 'max_size[sampul,1050]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                         'max_size' => 'ukuran file terlalu besar',
                         'is_image' => 'file yang anda pilih bukan gambar',
                         'mime_in' => 'file yang anda pilih bukan gambar',
                    ]
               ]

          ])) {
               // $validation = \Config\Services::validation();
               // return redirect()->to('/cartoon/create')->withInput()->with('validation', $validation);
               return redirect()->to('/cartoon/create')->withInput();
          }
          //ambil gambar
          $fileSampul = $this->request->getFile('sampul');
          // apakah tidak ada gamabr yg di upload
          if ($fileSampul->getError() == 4) {
               $namaSampul =  'default.jpg';
          } else {

               // generate nama sampul
               $namaSampul = $fileSampul->getRandomName();
               //pindahkan file ke folder img
               $fileSampul->move('img', $namaSampul);
          }

          $slug = url_title($this->request->getVar('judul'), '-', true);
          $this->cartoonModel->save([
               'judul' => $this->request->getVar('judul'),
               'slug' => $slug,
               'penulis' => $this->request->getVar('penulis'),
               'penerbit' => $this->request->getVar('penerbit'),
               'sampul' => $namaSampul

          ]);

          session()->setFlashdata('pesan', 'Cartoon Berhasil Ditambahkan.');
          return redirect()->to('/cartoon');
     }

     public function delete($id)
     {
          // cari gambar berdasarkan id
          $cartoon = $this->cartoonModel->find($id);

          // cek jika file gambar default
          if ($cartoon['sampul'] != 'default.jpg') {
               // hapus gambar
               unlink('img/' . $cartoon['sampul']);
          }

          $this->cartoonModel->delete($id);
          session()->setFlashdata('pesan', 'cartoon berhasil dihapus.');
          return redirect()->to('/cartoon');
     }
     public function edit($slug)
     {
          $data = [
               'title' => 'Form Ubah Data Cartoon',
               'validation' => \Config\Services::validation(),
               'cartoon' => $this->cartoonModel->getCartoon($slug)

          ];
          return view('cartoon/edit', $data);
     }
     public function update($id)
     {
          //Cek Judul 
          $cartoonLama = $this->cartoonModel->getCartoon($this->request->getVar('slug'));
          if ($cartoonLama['judul'] == $this->request->getVar('judul')) {
               $rule_judul = 'required';
          } else {
               $rule_judul = 'required|is_unique[cartoon.judul]';
          }
          if ($cartoonLama['penulis'] == $this->request->getVar('penulis')) {
               $rule_penulis = 'required';
          } else {
               $rule_penulis = 'required|is_unique[cartoon.penulis]';
          }
          if ($cartoonLama['penerbit'] == $this->request->getVar('penerbit')) {
               $rule_penerbit = 'required';
          } else {
               $rule_penerbit = 'required|is_unique[cartoon.penerbit]';
          }
          if ($cartoonLama['sampul'] == $this->request->getVar('sampul')) {
               $rule_sampul = 'required';
          } else {
               $rule_sampul = 'required|is_unique[cartoon.sampul]';
          }
          if (!$this->validate([
               'judul' => [
                    'rules' => $rule_judul,
                    'errors' => [
                         'required' => '{field} cartoon wajib diisi.',
                         'is_unique' => '{field} cartoon sudah ada.'
                    ]
               ],
               'penulis' => [
                    'rules' => $rule_penulis,
                    'errors' => [
                         'required' => '{field} cartoon wajib diisi.',
                         'is_unique' => '{field} cartoon sudah ada.'
                    ]
               ],
               'penerbit' => [
                    'rules' => $rule_penerbit,
                    'errors' => [
                         'required' => '{field} cartoon wajib diisi.',
                         'is_unique' => '{field} cartoon wudah ada.'
                    ]
               ],
               'sampul' => [
                    'rules' => $rule_sampul,
                    'errors' => [
                         'required' => '{field} cartoon wajib diisi.',
                         'is_unique' => '{field} cartoon sudah ada.'
                    ]
               ],
               'sampul' => [
                    'rules' => 'max_size[sampul,1050]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                         'max_size' => 'ukuran file terlalu besar',
                         'is_image' => 'file yang anda pilih bukan gambar',
                         'mime_in' => 'file yang anda pilih bukan gambar',
                    ]
               ]
          ])) {

               return redirect()->to('/cartoon/edit/' . $this->request->getVar('slug'))->withInput();
          }


          $fileSampul = $this->request->getFile('sampul');

          // cek gambar, apakah gambar lama?
          if ($fileSampul->getError() == 4) {
               $namaSampul = $this->request->getVar('sampulLama');
          } else {
               // generate nama file random
               $namaSampul = $fileSampul->getRandomName();
               // pindahkan gambar
               $fileSampul->move('img', $namaSampul);
               // hapus file yang lama
               unlink('img/' . $this->request->getVar('sampulLama'));
          }

          $slug = url_title($this->request->getVar('judul'), '-', true);
          $this->cartoonModel->save([
               'id' => $id,
               'judul' => $this->request->getVar('judul'),
               'slug' => $slug,
               'penulis' => $this->request->getVar('penulis'),
               'penerbit' => $this->request->getVar('penerbit'),
               'sampul' => $namaSampul

          ]);

          session()->setFlashdata('pesan', 'cartoon berhasil diubah.');
          return redirect()->to('/cartoon');
     }
}
