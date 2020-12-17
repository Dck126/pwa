<?php

namespace App\Controllers;

class Pages extends BaseController
{
     public function index()
     {
          $data = [
               'title' => 'Home | Pemrograman Web A'
          ];
          return view('Pages/home', $data);
     }
     public function about()
     {
          $data = [
               'title' => 'About Me'
          ];
          return view('Pages/about', $data);
     }
     public function contact()
     {
          $data = [
               'title' => 'contact Us'
          ];
          return view('Pages/contact', $data);
     }
}
