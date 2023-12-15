<form enctype="multipart/form-data" wire:submit.prevent="createPakaian">
  <h3 class="font-bold text-center text-3xl text-gray-900 pb-4">Buat Pesanan Laundry Anda</h3>

  {{-- 1 --}}
  <div class="mx-auto max-w-7xl divide-y divide-gray-200 lg:flex lg:justify-center lg:divide-x lg:divide-y-0 lg:pt-8">

    <div class="py-8 px-4 lg:w-1/3 lg:flex-none lg:py-0">
      <h3 class="font-medium text-center text-xl text-gray-900 pb-4">Jenis Pakaian</h3>

      @for ($i = 1; $i <= 6; $i++) <select {{ $i==1 ? 'required' : '' }} wire:model="jenis.{{ $i }}"
        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
        <option value="" selected>---</option>
        <option value="baju">Baju</option>
        <option value="celana">Celana</option>
        <option value="jaket">Jaket/Hoodie</option>
        <option value="sprei">Sprei</option>
        <option value="handuk">Handuk</option>
        <option value="selimut">Selimut</option>
        </select>
        @endfor
    </div>


    <div class="py-8 px-4 lg:w-1/3 lg:flex-none lg:py-0">
      <h3 class="font-medium text-center text-xl text-gray-900 pb-4">Jumlah Pakaian</h3>

      @for ($i = 1; $i <= 6; $i++) <input type="number" wire:model="jumlah.{{ $i }}"
        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
        step="1" pattern="\d+" min="0" {{ $i==1 ? 'required' : '' }}>
        @endfor
    </div>


    <div class="py-8 px-4 lg:w-1/3 lg:flex-none lg:py-0">
      <h3 class="font-medium text-center text-xl text-gray-900 pb-4">Deskripsi</h3>
      <textarea wire:model="deskripsi"
        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
        required style="height: 255px;"></textarea>
    </div>
  </div>

  <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
    <button type="submit"
      class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Submit</button>
    <a href="#"
      class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</a>
  </div>
</form>