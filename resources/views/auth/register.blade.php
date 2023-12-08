<x-layouts.app>
  <x-slot name="title">
    Register
  </x-slot>

  <x-slot name="navbar">
    NoNavbar
  </x-slot>

  <div class="flex flex-col bg-white">
    <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=600"
          alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register your account
        </h2>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
        <form x-data="{ on: false }" class="space-y-6" action="{{ route('register') }}" method="POST">
          @csrf
          <input type="hidden" name="role" :value="on ? 'laundry' : 'mahasiswa'" required autocomplete="role">
          <div class="flex items-center justify-center bg-white p-8">
            <h2 class="px-4 text-center text-xl leading-9 tracking-tight"
              :class="{ 'font-bold': !(on), 'text-gray-900': !(on), 'text-gray-400': on }">
              Mahasiswa
            </h2>
            <button type="button"
              class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 bg-indigo-600"
              role="switch" aria-checked="true" @click="on = !on"
              :class="{ 'bg-indigo-600': on, 'bg-gray-200': !(on) }">
              <span aria-hidden="true"
                class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out translate-x-5"
                :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }"></span>
            </button>
            <h2 class="px-4 text-center text-xl leading-9 tracking-tight"
              :class="{ 'font-bold': on, 'text-gray-900': on, 'text-gray-400': !(on) }">
              Pihak Laundry
            </h2>
          </div>
          <div>
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
              <input id="name" type="text"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
              <span role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
            <div class="mt-2">
              <input id="email" type="email"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
              <span role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div>
            <label :for="on ? 'telp' : 'nim'" class="block text-sm font-medium leading-6 text-gray-900"
              x-text="on ? 'No. Telp' : 'NIM'">
            </label>
            <div class="mt-2">
              <input :id="on ? 'telp' : 'nim'" type="text"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                :name="on ? 'telp' : 'nim'" required :autocomplete="on ? 'telp' : 'nim'">
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            </div>
            <div class="mt-2">
              <input id="password" type="password"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                name="password" required autocomplete="new-password">

              @error('password')
              <span role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password-confirm" class="block text-sm font-medium leading-6 text-gray-900">Confirm
                Password</label>
            </div>
            <div class="mt-2">
              <input id="password-confirm" type="password"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <div>
            <button type="submit"
              class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Register</button>
          </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
          Sudah punya akun?
          <!-- space -->
          <a href="{{ route('login') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
            Sign In</a>
        </p>
      </div>
    </div>
  </div>

</x-layouts.app>