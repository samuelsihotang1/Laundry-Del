<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? 'JMJ' }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">
  <script src="{{ asset('js/components.js') }}"></script>
  <link rel="modulepreload" href="{{ asset('js/iframe-alpine-964dceff.js') }}">
  <link rel="modulepreload" href="{{ asset('js/iframe-a81dc9a8.js') }}">
  <script type="module" src="{{ asset('js/iframe-alpine-964dceff.js') }}"></script>
  @livewireStyles
</head>

<body class="bg-white">
  {{-- Navbar --}}
  @if(!isset($navbar))
  <div class="bg-white">

    <div x-data="{ open: false }" @keydown.window.escape="open = false">

      <div x-show="open" class="relative z-50 lg:hidden"
        x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
        aria-modal="true" style="display: none;">

        <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
          x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
          x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900/80"
          x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state." style="display: none;">
        </div>


        <div class="fixed inset-0 flex">

          <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            x-description="Off-canvas menu, show/hide based on off-canvas menu state."
            class="relative mr-16 flex w-full max-w-xs flex-1" @click.away="open = false" style="display: none;">

            <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
              x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
              x-description="Close button, show/hide based on off-canvas menu state."
              class="absolute left-full top-0 flex w-16 justify-center pt-5" style="display: none;">
              <button type="button" class="-m-2.5 p-2.5" @click="open = false">
                <span class="sr-only">Close sidebar</span>
                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
              </button>
            </div>

            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4">
              <div class="flex h-32 shrink-0 items-center">
                <img class="h-24 w-auto" src="{{ asset('storage/images/laundry_logo.png') }}">
              </div>
              <h3 class="font-medium text-xl text-gray-900 pb-4">IT Del FreshThreads Laundry Services</h3>
              <nav class="flex flex-1 flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-7">
                  <li>
                    <ul role="list" class="-mx-2 space-y-1">
                      <li>
                        <a href="{{ route('homepage') }}"
                          class="bg-gray-50 text-indigo-600 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                          x-state:on="Current" x-state:off="Default"
                          x-state-description="Current: &quot;bg-gray-50 text-indigo-600&quot;, Default: &quot;text-gray-700 hover:text-indigo-600 hover:bg-gray-50&quot;">
                          <svg class="h-6 w-6 shrink-0 text-indigo-600" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                            </path>
                          </svg>
                          @if (auth()->user()->role === 'mahasiswa')
                          Data Laundry
                          @elseif (auth()->user()->role === 'laundry')
                          Data Mahasiswa
                          @endif
                        </a>
                      </li>
                    </ul>
                  </li>

                </ul>
              </nav>
            </div>
          </div>

        </div>
      </div>


      <!-- Static sidebar for desktop -->
      <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4">
          <div class="flex h-28 shrink-0 items-center pt-4">
            <img class="h-24 w-auto" src="{{ asset('storage/images/laundry_logo.png') }}">
          </div>
          <h3 class="font-medium text-xl text-gray-900 pb-4">IT Del FreshThreads Laundry Services</h3>
          <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
              <li>
                <ul role="list" class="-mx-2 space-y-1">
                  <li>
                    <a href="{{ route('homepage') }}"
                      class="bg-gray-50 text-indigo-600 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                      x-state:on="Current" x-state:off="Default"
                      x-state-description="Current: &quot;bg-gray-50 text-indigo-600&quot;, Default: &quot;text-gray-700 hover:text-indigo-600 hover:bg-gray-50&quot;">
                      <svg class="h-6 w-6 shrink-0 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                        </path>
                      </svg>
                      @if (auth()->user()->role === 'mahasiswa')
                      Data Laundry
                      @elseif (auth()->user()->role === 'laundry')
                      Data Mahasiswa
                      @endif
                    </a>
                  </li>

                </ul>
              </li>

            </ul>
          </nav>
        </div>
      </div>

      <div class="lg:pl-72">
        <div
          class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
          <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="open = true">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5">
              </path>
            </svg>
          </button>

          <!-- Separator -->
          <div class="h-6 w-px bg-gray-200 lg:hidden" aria-hidden="true"></div>

          <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
            <div class="relative flex flex-1">

            </div>
            <div class="flex items-center gap-x-4 lg:gap-x-6">

              <!-- Separator -->
              <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-200" aria-hidden="true"></div>

              <!-- Profile dropdown -->
              <a href="#" class="mr-4 text-lg font-semibold leading-6 text-gray-900">
                Contact
              </a>
              <div x-data="Components.menu({ open: false })" x-init="init()"
                @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative">
                <button type="button" class="-m-1.5 flex items-center p-1.5" id="user-menu-button" x-ref="button"
                  @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()"
                  @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true"
                  x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()"
                  @keydown.arrow-down.prevent="onArrowDown()">
                  <img class="h-8 w-8 rounded-full bg-gray-50" src="{{ asset('storage/images/user.png') }}" alt="">
                  <span class="hidden lg:flex lg:items-center">
                    <span class="ml-4 text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">{{
                      auth()->user()->name }}</span>
                    <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </span>
                </button>

                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                  x-transition:enter-start="transform opacity-0 scale-95"
                  x-transition:enter-end="transform opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-75"
                  x-transition:leave-start="transform opacity-100 scale-100"
                  x-transition:leave-end="transform opacity-0 scale-95"
                  class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                  x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                  x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical"
                  aria-labelledby="user-menu-button" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()"
                  @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
                  @keydown.enter.prevent="open = false; focusButton()"
                  @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                  <a href="{{ route('logout') }}" class="block px-3 py-1 text-sm leading-6 text-gray-900"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    :class="{ 'bg-gray-50': activeIndex === 1 }" role="menuitem" tabindex="-1" id="user-menu-item-1"
                    @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 1)"
                    @mouseleave="onMouseLeave($event)" @click="open = false; focusButton()">Sign out</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>

        <main class="py-10">
          <div class="px-4 sm:px-6 lg:px-8">
            {{ $slot }}
          </div>
        </main>
      </div>
    </div>
  </div>
  @else
  <main class="w-full">
    {{ $slot }}
  </main>
  @endif
  @livewireScripts
</body>

</html>