<x-layout.guest>
    @if (Route::has('login'))
        <div class=" bg-white/70 backdrop-blur fixed w-full top-0 left-0 p-4 text-right z-10">
            <div class=" flex justify-center font-black text-3xl">
                <a href="{{route('home')}}">BizLink</a>
            </div>
            {{-- @auth
                <a href="{{ route('dashboard') }}" class=" absolute top-1/2 -translate-y-1/2 right-4 sm:right-10 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class=" absolute top-1/2 -translate-y-1/2 right-4 sm:right-10 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Register</a>
                @endif
            @endauth --}}
        </div>
    @endif
    <div class="pt-20 px-4 space-y-4 md:space-y-8">
        <div class=" w-full max-w-[1080px] mx-auto">
            <form action="{{ route('home') }}" class="flex justify-center" method="GET">
                <div class="w-full flex items-center justify-center gap-4">
                    <!-- Search Input -->
                    <input type="text" name="search" placeholder="Search..." class="w-full sm:w-auto py-1 rounded-md" value="{{ request('search') }}" @input="document.querySelector('form').submit()">
            
                    <!-- Dropdown Filter -->
                    <div x-data="{ open: false }" class="relative">
                        <!-- Button -->
                        <button 
                            @click="open = !open" 
                            type="button"
                            class="w-7 h-7 p-1 duration-300"
                            :class="{ 'text-black': open, 'text-neutral-600 hover:text-black': !open }"
                            aria-expanded="open"
                            :aria-expanded="open.toString()">
                            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="m12 12 8-8V0H0v4l8 8v8l4-4v-4z" fill="currentColor" class="fill-000000"></path>
                            </svg>
                        </button>
            
                        <!-- Dropdown Content -->
                        <div 
                            x-show="open" 
                            @click.outside="open = false" 
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95">
                            <ul class="py-2 text-sm text-neutral-600">
                                <li>
                                    <button 
                                        type="submit" 
                                        name="filter" 
                                        value="all" 
                                        class="block w-full text-left px-4 py-2 hover:bg-neutral-100"
                                        :class="{ 'bg-neutral-100': '{{ request('filter') }}' == 'all' || '{{ request('filter') }}' === '' }"
                                        @click="open = false">
                                        Semua
                                    </button>
                                </li>
                                @foreach ($tag as $item)
                                    <li>
                                        <button 
                                            type="submit" 
                                            name="filter" 
                                            value="{{ $item->id }}" 
                                            class="block w-full text-left px-4 py-2 hover:bg-neutral-100"
                                            :class="{ 'bg-neutral-100': '{{ request('filter') }}' == '{{ $item->id }}' }"
                                            @click="open = false">
                                            {{ $item->tag }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
        <div class=" w-full max-w-[1080px] mx-auto">
            <div class=" w-full space-y-4">
                <p class=" text-xl font-black">Recomended</p>
                <div class=" w-full swiper">
                    <div class="swiper-wrapper">
                        @foreach ($recomend as $item)
                            <div class=" swiper-slide w-full aspect-video rounded-md overflow-hidden relative">
                                <img class=" w-full h-full object-cover"
                                    src="{{asset('storage/images/product/'. $item->image)}}"
                                    alt="">
                                <a href="{{route('detail', ['slug'=>$item->slug])}}" class=" text-center text-sm sm:text-base absolute top-0 left-0 flex items-center justify-center w-full h-full bg-black/40 hover:bg-black/70 text-white duration-300 font-black">
                                    <p>{{$item->name}}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <script>
                        window.addEventListener('load', function() {
                            const swiper = new Swiper('.swiper', {
                                // Optional parameters
                                direction: 'horizontal',
                                slidesPerView: 3,
                                spaceBetween: 8,
                                loop: true,
                                autoplay: {
                                    delay: 2500,
                                    disableOnInteraction: false,
                                },
                                speed: 500,
                                breakpoints: {
                                    640: {
                                        slidesPerView: 4,
                                        spaceBetween: 8,
                                    },
                                    748: {
                                        slidesPerView: 5,
                                        spaceBetween: 8,
                                    },
                                    1024: {
                                        slidesPerView: 6,
                                        spaceBetween: 8,
                                    },
                                },
                                // Navigation arrows
                                navigation: {
                                    nextEl: '.next',
                                    prevEl: '.prev',
                                },
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[1080px] mx-auto">
            <div class=" w-full pb-24">
                <div class="grid grid-cols-2 gap-3 lg:gap-8">
                    @foreach ($data as $item)
                        <div class=" w-full bg-white shadow-md shadow-black/20 rounded-md grid grid-cols-1 md:grid-cols-7 md:p-4 gap-2 md:gap-4">
                            <div class=" md:col-span-3 flex items-center w-full aspect-[5/4] md:max-h-[157.6px] md:aspect-auto rounded-t-md md:rounded overflow-hidden">
                                <img class=" w-full h-full object-cover"
                                    src="{{asset('storage/images/product/'. $item->image)}}"
                                    alt="">
                            </div>
                            <div class=" md:col-span-4 flex flex-col justify-between md:pt-1 gap-1 p-2 pt-0 md:p-0 md:gap-2 text-sm md:text-base">
                                <a href="{{route('detail', ['slug'=>$item->slug])}}">
                                    <p class=" text-lg font-semibold line-clamp-1">{{$item->name}}</p>
                                </a>
                                <div class="">
                                    {{-- <p class="">Mulai dari Rp. {{ str_replace(',', '.', number_format($item->price))}}</p> --}}
                                    <p class=" text-neutral-600 text-sm line-clamp-2">{{$item->subtitle}}</p>
                                </div>
                                <div class=" pt-2 grid grid-cols-2 gap-2">
                                    <a href="{{route('detail', ['slug'=>$item->slug])}}">
                                        <button 
                                            class="w-full flex justify-center py-1 sm:py-2 border rounded-md text-white bg-blue-500 border-blue-500 hover:text-white hover:bg-blue-950 hover:border-blue-950 hover:font-black duration-300 relative text-sm">
                                            <div class="w-4 sm:w-5 aspect-square">
                                                <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M16 7C9.934 7 4.798 10.776 3 16c1.798 5.224 6.934 9 13 9s11.202-3.776 13-9c-1.798-5.224-6.934-9-13-9z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" class="stroke-000000"></path><circle cx="16" cy="16" fill="none" r="5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" class="stroke-000000"></circle></svg>
                                            </div>
                                        </button>
                                    </a>                                   
                                    <a href="https://wa.me/{{ $no_tlp ?? '' }}">
                                        <button
                                            class=" w-full flex justify-center py-1 sm:py-2 border rounded-md bg-[#25d366] text-white border-[#25d366] hover:text-white hover:bg-[#1b4b2c] hover:border-[#1b4b2c] hover:font-black duration-300 relative text-sm">
                                            <div class=" w-4 sm:w-5 aspect-square">
                                                <svg viewBox="0 0 56.693 56.693" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 56.693 56.693"><path d="M46.38 10.714C41.73 6.057 35.544 3.492 28.954 3.489c-13.579 0-24.63 11.05-24.636 24.633a24.589 24.589 0 0 0 3.289 12.316L4.112 53.204l13.06-3.426a24.614 24.614 0 0 0 11.772 2.999h.01c13.577 0 24.63-11.052 24.635-24.635.002-6.582-2.558-12.772-7.209-17.428zM28.954 48.616h-.009a20.445 20.445 0 0 1-10.421-2.854l-.748-.444-7.75 2.033 2.07-7.555-.488-.775a20.427 20.427 0 0 1-3.13-10.897c.004-11.29 9.19-20.474 20.484-20.474a20.336 20.336 0 0 1 14.476 6.005 20.352 20.352 0 0 1 5.991 14.485c-.004 11.29-9.19 20.476-20.475 20.476z" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" class="fill-000000"></path><path d="M40.185 33.281c-.615-.308-3.642-1.797-4.206-2.003-.564-.205-.975-.308-1.385.308-.41.617-1.59 2.003-1.949 2.414-.359.41-.718.462-1.334.154-.615-.308-2.599-.958-4.95-3.055-1.83-1.632-3.065-3.648-3.424-4.264-.36-.617-.038-.95.27-1.257.277-.276.615-.719.923-1.078.308-.36.41-.616.616-1.027.205-.41.102-.77-.052-1.078-.153-.308-1.384-3.338-1.897-4.57-.5-1.2-1.008-1.038-1.385-1.057-.359-.018-.77-.022-1.18-.022s-1.077.154-1.642.77c-.564.616-2.154 2.106-2.154 5.135 0 3.03 2.206 5.957 2.513 6.368.308.41 4.341 6.628 10.516 9.294a35.341 35.341 0 0 0 3.509 1.297c1.474.469 2.816.402 3.877.244 1.183-.177 3.642-1.49 4.155-2.927.513-1.438.513-2.67.359-2.927-.154-.257-.564-.41-1.18-.719z" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" class="fill-000000"></path></svg>
                                            </div>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('components.admin.mobile-navbar')
</x-layout.guest>