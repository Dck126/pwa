<?php

namespace App\Models;

use CodeIgniter\Model;

class CartoonModel extends Model
{
     protected $table = 'cartoon';
     protected $useTimestamps = true;
     protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

     public function getCartoon($slug = false)
     {
          if ($slug == false) {
               return $this->findAll();
          }

          return $this->where(['slug' => $slug])->first();
     }
     public function search($keyword)
     {
          // $builder = $this->table('orang');
          // $builder->like('nama', $keyword);
          // return $builder;

          return $this->table('cartoon')->like('judul', $keyword)->orLike('id', $keyword);
     }
}
