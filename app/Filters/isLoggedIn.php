<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class isLoggedIn implements FilterInterface {
  
  public function before(RequestInterface $request, $arguments = null) {
    $session = session();
    if($session->isLoggedIn != True) {
      $session->setFlashdata("error", "Anda belum login");
      return redirect()->to("/");
    } 
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
    
  }


}