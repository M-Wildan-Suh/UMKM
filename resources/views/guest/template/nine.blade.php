<div class=" mx-auto rounded-md bg-white min-h-screen relative">
    <div class=" space-y-6">
        <div class=" min-h-screen pt-6 relative space-y-4 bg-[#ECE852]">
            <div class=" w-full max-w-[640px] mx-auto pl-4 sm:pl-24 relative text-white pb-4">
                <div class=" absolute left-5 sm:left-20 top-5 w-60 sm:w-72 p-4 sm:py-5 bg-[#FB4141] -rotate-6 rounded-sm">
                    <p class=" text-2xl font-black text-center">{{$data->name}}</p>
                    <p class=" text-center">{{$data->subtitle}}</p>
                </div>
                <div class=" absolute top-20 right-2 sm:right-24 w-28 sm:w-36 aspect-square bg-white rounded-full overflow-hidden rotate-6">
                    <img src="{{ asset('storage/images/product/' . $data->image) }}" class=" w-full h-full object-cover " alt="">
                </div>
                <div class=" pt-36 sm:pt-40 pl-8">
                    <div class=" w-52 sm:w-64 bg-white aspect-video overflow-hidden rounded-sm">
                        <div class="w-full h-full">
                            <iframe src="{{$data->embed}}" frameborder="0" class="w-full h-full" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" w-full max-w-[640px] mx-auto px-4 sm:px-0">
                <!-- Accordion Item 1 -->
                <div  x-data="{ open: null }" class="p-4 space-y-4 bg-[#FB4141] rounded-md ">
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
            
            <div class="w-full relative bg-[#FB4141]">
                <div class=" w-full h-10 mb-4">
                    <svg class=" w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                        <path fill="#ECE852" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
                        <path fill="#ECE852" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
                        <path fill="#ECE852" opacity="0.66" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
                    </svg>
                </div>
                <div class=" w-full max-w-[640px] mx-auto grid grid-cols-1 gap-3 px-4 sm:px-0">
                    @foreach ($data->productHighlight as $item)
                        <div class=" bg-[#5CB338] w-full p-3 flex gap-2 text-white {{ $loop->index % 2 == 0 ? 'flex-row rounded-l-[80px] rounded-r-3xl' : ' rounded-l-3xl rounded-r-[80px] flex-row-reverse text-right' }}">
                            <div class=" min-w-24 h-24 aspect-square rounded-full border-2 overflow-hidden border-[#ECE852]">
                                <img src="{{ asset('storage/images/product/highlight/' . $item->image) }}" class="w-full h-full object-cover" alt="">
                            </div>
                            <div class=" flex flex-col justify-between gap-2">
                                <p class=" line-clamp-1 sm:text-lg font-semibold">{{$item->title}}</p>
                                <p class=" line-clamp-2 text-sm sm:text-base">
                                    {{$item->description}}
                                </p>
                                <div class="flex gap-1 {{ $loop->index % 2 == 0 ? '' : 'justify-end' }}">
                                    @for ($i = 0; $i < 5; $i++)
                                        <div class=" w-4 sm:w-5 aspect-square text-yellow-400">
                                            <svg viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg">
                                                <g fill="none" fill-rule="evenodd">
                                                    <path d="M30.757 1.144 38.2 16.948a1.968 1.968 0 0 0 1.475 1.123l16.644 2.534a2.08 2.08 0 0 1 1.086 3.502L45.362 36.408a2.115 2.115 0 0 0-.563 1.818l2.843 17.37a1.98 1.98 0 0 1-2.843 2.164l-14.887-8.201a1.88 1.88 0 0 0-1.824 0l-14.887 8.2a1.98 1.98 0 0 1-2.843-2.163l2.843-17.37a2.115 2.115 0 0 0-.563-1.818L.594 24.107a2.08 2.08 0 0 1 1.086-3.502l16.644-2.534a1.968 1.968 0 0 0 1.475-1.123l7.444-15.804a1.92 1.92 0 0 1 3.514 0Z" fill="#facc15" class="fill-f6ab27"></path>
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
                <div class=" w-full h-10 mt-4">
                    <svg class=" rotate-180 w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                        <path fill="#ECE852" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
                        <path fill="#ECE852" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
                        <path fill="#ECE852" opacity="0.66" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
                    </svg>
                </div>
            </div>
            <div class="w-full max-w-[640px] mx-auto px-4 md:px-0 relative">
                @include('components.guest.gallery')
            </div>
            <div class=" w-full sticky bottom-0 py-2 px-4 sm:px-8 z-30 rounded-b-md">
                <div class="grid grid-cols-2 gap-2 w-full max-w-[640px] mx-auto">
                    <a href="{{route('home')}}">
                        <button
                            class=" text-base w-full py-2 border rounded-md text-white bg-[#FFC145] border-[#FFC145] hover:text-white hover:bg-[#16424b] hover:border-[#16424b] hover:font-black duration-300 relative shadow-md shadow-black/20">
                            <div class=" absolute w-5 aspect-square top-1.5 sm:top-2.5 left-2">
                                <svg viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"><path d="m21.146 8.576-7.55-6.135a2.543 2.543 0 0 0-3.192 0L2.855 8.575a1.119 1.119 0 0 0-.416.873v11.543c0 .62.505 1.13 1.125 1.13h5.062c.62 0 1.125-.51 1.125-1.13v-7.306h4.499v7.306c0 .62.505 1.13 1.125 1.13h5.062c.62 0 1.125-.51 1.125-1.13V9.448a1.122 1.122 0 0 0-.416-.872zm-.71 12.421h-5.062V13.68c0-.62-.505-1.119-1.125-1.119H9.75c-.62 0-1.125.499-1.125 1.119v7.317H3.564V9.448l7.55-6.134a1.411 1.411 0 0 1 1.773 0l7.55 6.134v11.549z" fill="currentColor" class="fill-000000"></path></svg>
                            </div>
                            Home
                        </button>
                    </a>
                    <a href="https://wa.me/{{ $no_tlp ?? '' }}">
                        <button
                            class=" text-base w-full py-2 border rounded-md bg-[#FFC145] text-white border-[#FFC145] hover:text-white hover:bg-[#1f7675] hover:border-[#1f7675] hover:font-black duration-300 relative shadow-md shadow-black/20">
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