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

  public function render()
  {
    return view('homepage')->title('Homepage');
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
  }
}
