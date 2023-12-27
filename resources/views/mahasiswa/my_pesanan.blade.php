<div>
  <h3 class="font-bold text-center text-3xl text-gray-900 pb-4">List Pakaian Laundry</h3>

  <p class="font-small text-center text-xl text-gray-700 pt-2">Nama: {{ isset($this->user->name) ? $this->user->name :
    '(nama)'}}</p>
  <p class="font-small text-center text-xl text-gray-700 pb-2">NIM: {{ isset($this->user->name) ? $this->user->nim :
    '(nim)'}}</p>


  <div class="mx-auto max-w-7xl divide-y divide-gray-200 lg:flex lg:justify-center lg:divide-x lg:divide-y-0 lg:pt-8">

    @if (isset($this->pesanan))
    <div class="py-8 px-4 lg:w-1/3 lg:flex-none lg:py-0">
      <h3 class="font-medium text-center text-xl text-gray-900 pb-4">Jenis Pakaian</h3>

      @foreach ($this->pesanan->pakaians as $pakaian)
      <div
        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
        {{ $jenisPakaian[$pakaian->jenis] }}
      </div>
      @endforeach
    </div>


    <div class="py-8 px-4 lg:w-1/3 lg:flex-none lg:py-0">
      <h3 class="font-medium text-center text-xl text-gray-900 pb-4">Jumlah Pakaian</h3>

      @foreach ($this->pesanan->pakaians as $pakaian)
      <div
        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
        {{ $pakaian->jumlah }}
      </div>
      @endforeach
    </div>


    <div class="py-8 px-4 lg:w-1/3 lg:flex-none lg:py-0">
      <h3 class="font-medium text-center text-xl text-gray-900 pb-4">Deskripsi</h3>
      <div style="height: {{( count($this->pesanan->pakaians) * 42 ) - 6}}px;"
        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
        {{ $this->pesanan->description }}
      </div>
    </div>
    @else
    <div class="py-8 px-4 lg:w-1/3 lg:flex-none lg:py-0">
      <p class="text-center text-md text-gray-900 pb-4">Tidak ada Pakaian</p>
    </div>
    @endif
  </div>
</div>