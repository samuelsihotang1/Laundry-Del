<div>

  <p class="font-small text-center text-xl text-gray-700">Hello, {{ auth()->user()->name ? auth()->user()->name :
    '(nama)'}}</p>
  <h3 class="font-bold text-center text-3xl text-gray-900 py-4 ">List Mahasiswa</h3>

  <div class="mx-auto max-w-7xl divide-y divide-gray-200 lg:flex lg:justify-center lg:divide-x lg:divide-y-0 lg:pt-8">

    <div class="py-8 px-4 lg:w-1/2 lg:flex-none lg:py-0">
      <h3 class="font-medium text-center text-xl text-gray-900 pb-4">Nama</h3>
      @if($this->pengguna->count() > 0)
      @foreach ($this->pengguna as $pengguna)
      <div
        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
        <a href="{{ route('pesanan', $pengguna->name_slug) }}">{{ $pengguna->name }}</a>
      </div>
      @endforeach
      @else
      Tidak ada Mahasiswa
      @endif
    </div>


    <div class="py-8 px-4 lg:w-1/2 lg:flex-none lg:py-0">
      <h3 class="font-medium text-center text-xl text-gray-900 pb-4">NIM</h3>
      @if($this->pengguna->count() > 0)
      @foreach ($this->pengguna as $pengguna)
      <div
        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
        <a href="{{ route('pesanan', $pengguna->name_slug) }}">{{ $pengguna->nim }}</a>
      </div>
      @endforeach
      @else
      Tidak ada Mahasiswa
      @endif
    </div>
  </div>
</div>