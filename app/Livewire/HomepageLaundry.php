<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class HomepageLaundry extends Component
{
  public $pengguna;

  public function render()
  {
    return view('laundry.all_mahasiswa')->title('Homepage');
  }

  public function boot()
  {
    $this->pengguna = User::where('role', '=', 'mahasiswa')->get();
  }
}
