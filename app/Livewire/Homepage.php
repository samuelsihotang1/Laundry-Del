<?php

namespace App\Livewire;

use App\Models\Pakaian;
use App\Models\Pesanan;
use Livewire\Component;

class Homepage extends Component
{
  public $jenis = [];
  public $jumlah = [];
  public $pakaian = [];
  public $deskripsi;
  public $pesanan;
  public $jenisPakaian;

  public function render()
  {
    if (Pesanan::where('user_id', auth()->id())->exists()) {
      return view('homepage_my_pesanan')->title('Homepage');
    } else {
      return view('homepage_add_pesanan')->title('Homepage');
    }
  }

  public function boot()
  {
    if (Pesanan::where('user_id', auth()->id())->exists()) {
      $this->pesanan = Pesanan::where('user_id', auth()->id())->first();
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

  public function createPakaian()
  {
    // try {
    for ($i = 1; $i <= 6; $i++) {
      if ((isset($this->jenis[$i]) && isset($this->jumlah[$i])) && $this->jumlah[$i] > 0) {
        if (!isset($this->pesanan)) {
          $this->pesanan =
            Pesanan::create([
              'user_id' => auth()->id(),
              'description' => $this->deskripsi,
            ]);
        }

        for ($j = 1; $j <= $i; $j++) {
          if ($j == $i) {
            $this->pakaian[$i] =
              Pakaian::create([
                'jenis' => $this->jenis[$i],
                'jumlah' => $this->jumlah[$i],
                'user_id' => auth()->id(),
                'pesanan_id' => $this->pesanan->id,
                'created_at' => now(),
                'updated_at' => now()
              ]);
          } elseif ($this->jenis[$j] == $this->jenis[$i]) {
            $this->pakaian[$j]->jumlah = $this->pakaian[$j]->jumlah + $this->jumlah[$i];
            $this->pakaian[$j]->save();
            break;
          }
        }
      }
    }
    // } catch (\Throwable $th) {
    // }

    $this->boot();
  }
}
