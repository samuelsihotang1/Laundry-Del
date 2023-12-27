<?php

namespace App\Livewire;

use App\Models\Pakaian;
use App\Models\Pesanan;
use App\Models\User;
use Livewire\Component;

class PesananMahasiswa extends Component
{
  public $pesanan;
  public $jenisPakaian;
  public $name_slug;
  public $user;

  public function render()
  {
    return view('mahasiswa.my_pesanan')->title('Homepage');
  }

  public function boot()
  {
    $this->user = User::where('name_slug', $this->name_slug)->first();
    if (Pesanan::where('user_id', $this->user->id)->exists()) {
      $this->pesanan = Pesanan::where('user_id', $this->user->id)->first();
      $this->jenisPakaian = [
        'baju' => 'Baju',
        'celana' => 'Celana',
        'jaket' => 'Jaket/Hoodie',
        'sprei' => 'Sprei',
        'handuk' => 'Handuk',
        'selimut' => 'Selimut'
      ];
    }
  }
}
