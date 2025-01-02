<div class=" mx-auto rounded-md bg-white min-h-screen relative">
    <div class=" space-y-6">
        <div class=" min-h-screen pt-6 relative space-y-4 bg-[#1A5319]">
            <div class=" flex flex-col justify-center items-center py-4 md:py-8 px-4 gap-4 relative text-white">
                <p class=" text-2xl font-black">{{$data->name}}</p>
                <div class=" w-28 aspect-square bg-white rounded-full overflow-hidden">
                    <img src="{{ asset('storage/images/product/' . $data->image) }}" class=" w-full h-full object-cover " alt="">
                </div>
                <p class=" text-center">{{$data->subtitle}}</p>
            </div>
            <div class=" w-full max-w-[640px] mx-auto px-4 md:px-0 relative">
                <div class=" w-full grid grid-cols-3 gap-4">
                    <div class=" w-full h-full rounded-md bg-[#FF0000] flex items-center justify-center p-[10%]">
                        <div class=" w-full aspect-square">
                            <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><rect height="512" rx="64" ry="64" width="512" fill="#ff0000" fill-opacity="1" fill-rule="nonzero" stroke="none" class="fill-cf2200"></rect><path d="M371.289 348.587h-21.956l.103-12.751c0-5.667 4.653-10.303 10.342-10.303h1.4c5.698 0 10.364 4.636 10.364 10.303l-.253 12.75zm-82.342-27.325c-5.57 0-10.125 3.742-10.125 8.325V391.6c0 4.573 4.556 8.307 10.125 8.307 5.59 0 10.15-3.734 10.15-8.307v-62.013c0-4.587-4.56-8.325-10.15-8.325zm133.72-34.689v117.974c0 28.297-24.543 51.453-54.534 51.453H143.871c-30.004 0-54.538-23.156-54.538-51.453V286.573c0-28.297 24.534-51.457 54.538-51.457h224.262c29.991 0 54.534 23.16 54.534 51.457zM158.83 417.356V293.084l27.8.01V274.68l-74.107-.111v18.102l23.134.067v124.618h23.19zm83.333-105.76h-23.177v66.36c0 9.6.582 14.4-.045 16.093-1.884 5.147-10.355 10.609-13.657.555-.56-1.76-.067-7.07-.076-16.19l-.093-66.818h-23.05l.072 65.764c0 10.08-.227 17.6.08 21.018.564 6.03.364 13.066 5.96 17.08 10.426 7.515 30.413-1.12 35.413-11.858l-.044 13.702 18.613.022V311.596zm74.147 75.99-.049-55.23c0-21.05-15.764-33.658-37.142-16.627l.093-41.062-23.155.035-.111 141.734 19.035-.28 1.734-8.827c24.337 22.324 39.63 7.031 39.595-19.742zm72.538-7.32-17.382.094c0 .689-.045 1.484-.045 2.351v9.698c0 5.187-4.289 9.413-9.497 9.413h-3.405c-5.218 0-9.502-4.226-9.502-9.413v-25.507h39.795v-14.978c0-10.946-.28-21.888-1.186-28.146-2.845-19.796-30.631-22.938-44.667-12.805-4.409 3.165-7.773 7.4-9.729 13.094-1.978 5.693-2.955 13.47-2.955 23.35v32.93c.004 54.746 66.502 47.009 58.568-.08zm-89.147-178.79c1.196 2.906 3.054 5.262 5.574 7.04 2.488 1.75 5.675 2.63 9.484 2.63 3.342 0 6.302-.902 8.88-2.764 2.569-1.853 4.733-4.622 6.498-8.315l-.436 9.093h25.836V99.289H335.2V184.8c0 4.631-3.813 8.422-8.476 8.422-4.635 0-8.462-3.79-8.462-8.422V99.289h-21.226v74.107c0 9.44.168 15.733.448 18.924a32.158 32.158 0 0 0 2.218 9.156zm-78.293-62.054c0-10.546.88-18.782 2.627-24.72 1.76-5.915 4.92-10.67 9.497-14.258 4.565-3.604 10.41-5.408 17.516-5.408 5.978 0 11.098 1.173 15.378 3.47 4.297 2.312 7.609 5.312 9.91 9.014 2.343 3.716 3.934 7.533 4.783 11.44.867 3.96 1.293 9.933 1.293 17.991v27.787c0 10.19-.409 17.689-1.2 22.449-.786 4.773-2.475 9.2-5.089 13.35-2.582 4.107-5.91 7.179-9.946 9.139-4.08 1.977-8.747 2.946-14.018 2.946-5.889 0-10.849-.813-14.938-2.51-4.102-1.69-7.27-4.236-9.529-7.619-2.28-3.386-3.884-7.51-4.853-12.32-.973-4.804-1.436-12.03-1.436-21.662v-29.089zm20.235 43.645c0 6.222 4.632 11.302 10.272 11.302 5.644 0 10.253-5.08 10.253-11.302v-58.49c0-6.213-4.609-11.293-10.253-11.293-5.64 0-10.272 5.08-10.272 11.294v58.489zM170.142 212.6h24.374l.044-84.267 28.8-72.186h-26.658l-15.31 53.617L165.861 56H139.48l30.64 72.373.044 84.227z" fill="#ffffff" fill-opacity="1" class="fill-ffffff"></path></svg>
                        </div>
                    </div>
                    <div class=" col-span-2 w-full aspect-video rounded-md overflow-hidden bg-white">
                        <div class="w-full h-full">
                            <iframe src="{{$data->embed}}" frameborder="0" class="w-full h-full" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" w-full max-w-[640px] mx-auto px-4 sm:px-0 relative">
                <!-- Accordion Item 1 -->
                <div  x-data="{ open: null }" class="p-4 space-y-4 bg-[#508D4E] rounded-md ">
                    <button
                        @click="open = open === 1 ? null : 1"
                        class="w-full flex justify-between items-center rounded-md focus:outline-none text-white ">
                        <span class="font-black text-lg">Deskripsi</span>
                        <svg
                            :class="{ 'rotate-180': open === 1 }"
                            class="w-5 h-5 transform transition-transform"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        x-show="open === 1"
                        x-transition
                        class=" text-white rounded-md">
                        <p class="">{!! nl2br(e($data->description == '' ? 'Description' : $data->description)) !!}</p>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-[640px] mx-auto px-4 md:px-0 relative">
                <div class=" w-full">
                    <div class=" grid grid-cols-1 gap-3">
                        @foreach ($data->productHighlight as $item)
                            @php
                                // Tentukan warna berdasarkan indeks
                                $colors = ['#80AF81', '#508D4E']; // Biru gelap kehijauan, Kuning
                                $boxShadowColor = $colors[$loop->index % 2]; // Berganti warna setiap kelipatan 2
                            @endphp
                            <div style="background-color: {{ $boxShadowColor }};" class=" w-full p-3 rounded-xl flex gap-2 text-white">
                                <div class=" min-w-24 h-24 aspect-square rounded-full border-2 overflow-hidden border-[#00fffb]">
                                    <img src="{{ asset('storage/images/product/highlight/' . $item->image) }}" class="w-full h-full object-cover" alt="">
                                </div>
                                <div class=" flex flex-col justify-between gap-2">
                                    <p class=" line-clamp-1 font-semibold">{{$item->title}}</p>
                                    <p class=" line-clamp-2 text-sm">
                                        {{$item->description}}
                                    </p>
                                    <div class="flex gap-1">
                                        @for ($i = 0; $i < 5; $i++)
                                            <div class=" w-4 h-4 text-yellow-400">
                                                <svg viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg">
                                                    <g fill="none" fill-rule="evenodd">
                                                        <path d="M30.757 1.144 38.2 16.948a1.968 1.968 0 0 0 1.475 1.123l16.644 2.534a2.08 2.08 0 0 1 1.086 3.502L45.362 36.408a2.115 2.115 0 0 0-.563 1.818l2.843 17.37a1.98 1.98 0 0 1-2.843 2.164l-14.887-8.201a1.88 1.88 0 0 0-1.824 0l-14.887 8.2a1.98 1.98 0 0 1-2.843-2.163l2.843-17.37a2.115 2.115 0 0 0-.563-1.818L.594 24.107a2.08 2.08 0 0 1 1.086-3.502l16.644-2.534a1.968 1.968 0 0 0 1.475-1.123l7.444-15.804a1.92 1.92 0 0 1 3.514 0Z" fill="#ffffff" class="fill-f6ab27"></path>
                                                        <path d="M17.148 38.872a6.124 6.124 0 0 0-1.654-5.264L6.07 23.983l12.857-1.957a5.966 5.966 0 0 0 4.49-3.37L29 6.802l5.581 11.85a5.969 5.969 0 0 0 4.492 3.374l12.857 1.957-9.426 9.627a6.125 6.125 0 0 0-1.652 5.264l2.184 13.348-11.194-6.167a5.88 5.88 0 0 0-5.683 0l-11.195 6.167 2.184-13.35Z" fill="currentColor" class="fill-f4cd1e"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-full max-w-[640px] mx-auto px-4 md:px-0 relative">
                @include('components.guest.gallery')
            </div>
            <div class=" w-full sticky bottom-0 py-2 px-4 sm:px-8 z-30 rounded-b-md">
                <div class="grid grid-cols-2 gap-2 w-full max-w-[640px] mx-auto">
                    <a href="{{route('home')}}">
                        <button
                            class=" text-base w-full py-2 border rounded-md text-white bg-[#80AF81] border-[#80AF81] hover:text-white hover:bg-[#59875a] hover:border-[#59875a] hover:font-black duration-300 relative shadow-md shadow-black/20">
                            <div class=" absolute w-5 aspect-square top-1.5 sm:top-2.5 left-2">
                                <svg viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"><path d="m21.146 8.576-7.55-6.135a2.543 2.543 0 0 0-3.192 0L2.855 8.575a1.119 1.119 0 0 0-.416.873v11.543c0 .62.505 1.13 1.125 1.13h5.062c.62 0 1.125-.51 1.125-1.13v-7.306h4.499v7.306c0 .62.505 1.13 1.125 1.13h5.062c.62 0 1.125-.51 1.125-1.13V9.448a1.122 1.122 0 0 0-.416-.872zm-.71 12.421h-5.062V13.68c0-.62-.505-1.119-1.125-1.119H9.75c-.62 0-1.125.499-1.125 1.119v7.317H3.564V9.448l7.55-6.134a1.411 1.411 0 0 1 1.773 0l7.55 6.134v11.549z" fill="currentColor" class="fill-000000"></path></svg>
                            </div>
                            Home
                        </button>
                    </a>
                    <a href="https://wa.me/{{ $no_tlp ?? '' }}">
                        <button
                            class=" text-base w-full py-2 border rounded-md bg-[#508D4E] text-white border-[#508D4E] hover:text-white hover:bg-[#2d5f2c] hover:border-[#2d5f2c] hover:font-black duration-300 relative shadow-md shadow-black/20">
                            <div class=" absolute w-5 aspect-square top-1.5 sm:top-2.5 left-2">
                                <svg viewBox="0 0 56.693 56.693" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 56.693 56.693"><path d="M46.38 10.714C41.73 6.057 35.544 3.492 28.954 3.489c-13.579 0-24.63 11.05-24.636 24.633a24.589 24.589 0 0 0 3.289 12.316L4.112 53.204l13.06-3.426a24.614 24.614 0 0 0 11.772 2.999h.01c13.577 0 24.63-11.052 24.635-24.635.002-6.582-2.558-12.772-7.209-17.428zM28.954 48.616h-.009a20.445 20.445 0 0 1-10.421-2.854l-.748-.444-7.75 2.033 2.07-7.555-.488-.775a20.427 20.427 0 0 1-3.13-10.897c.004-11.29 9.19-20.474 20.484-20.474a20.336 20.336 0 0 1 14.476 6.005 20.352 20.352 0 0 1 5.991 14.485c-.004 11.29-9.19 20.476-20.475 20.476z" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" class="fill-000000"></path><path d="M40.185 33.281c-.615-.308-3.642-1.797-4.206-2.003-.564-.205-.975-.308-1.385.308-.41.617-1.59 2.003-1.949 2.414-.359.41-.718.462-1.334.154-.615-.308-2.599-.958-4.95-3.055-1.83-1.632-3.065-3.648-3.424-4.264-.36-.617-.038-.95.27-1.257.277-.276.615-.719.923-1.078.308-.36.41-.616.616-1.027.205-.41.102-.77-.052-1.078-.153-.308-1.384-3.338-1.897-4.57-.5-1.2-1.008-1.038-1.385-1.057-.359-.018-.77-.022-1.18-.022s-1.077.154-1.642.77c-.564.616-2.154 2.106-2.154 5.135 0 3.03 2.206 5.957 2.513 6.368.308.41 4.341 6.628 10.516 9.294a35.341 35.341 0 0 0 3.509 1.297c1.474.469 2.816.402 3.877.244 1.183-.177 3.642-1.49 4.155-2.927.513-1.438.513-2.67.359-2.927-.154-.257-.564-.41-1.18-.719z" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" class="fill-000000"></path></svg>
                            </div>
                            WhatApp
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>