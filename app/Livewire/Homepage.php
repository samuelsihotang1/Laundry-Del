<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Homepage extends Component
{
  public function boot()
  {
    if (auth()->user()->role === 'mahasiswa') {
      $this->redirect('/user');
    } elseif (auth()->user()->role === 'laundry') {
      $this->redirect('/admin');
    }
  }
}
