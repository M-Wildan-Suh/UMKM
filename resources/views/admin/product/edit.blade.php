<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    <div x-data="{ activeTab: '{{ session('highlight', 'product') }}' }" class="w-full ">
        <div class=" w-full py-2 px-4 bg-white">
            <div class="w-full max-w-[1080px] mx-auto ">
                <!-- Tabs -->
                <div class="flex flex-row gap-4">
                    <button 
                        @click="activeTab = 'product'" 
                        :class="activeTab === 'product' ? 'text-indigo-500 border-indigo-500' : 'text-neutral-600 border-transparent hover:border-black hover:text-black duration-300'"
                        class="px-3 pb-2 border-b-2">
                        Product
                    </button>
                    <button 
                        @click="activeTab = 'highlight'" 
                        :class="activeTab === 'highlight' ? 'text-indigo-500 border-indigo-500' : 'text-neutral-600 border-transparent hover:border-black hover:text-black duration-300'"
                        class="px-3 pb-2 border-b-2">
                        Highlight
                    </button>
                    <button 
                        @click="activeTab = 'gallery'" 
                        :class="activeTab === 'gallery' ? 'text-indigo-500 border-indigo-500' : 'text-neutral-600 border-transparent hover:border-black hover:text-black duration-300'"
                        class="px-3 pb-2 border-b-2">
                        Gallery
                    </button>
                </div>
            </div>
        </div>
    
        <!-- Tab Contents -->
        <div class="mt-4">
            <div x-show="activeTab === 'product'" class="py-4 px-4">
                <div class="max-w-[1080px] mx-auto">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class=" p-4 md:p-6 text-gray-900">
                            <form action="{{route('product.update', ['product' => $product->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class=" w-full space-y-6">
                                    <div class=" grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div class=" flex flex-col gap-2">
                                            <div class=" w-full h-full max-h-[268.8px] relative">
                                                <img id="thumbnail" class=" object-cover w-full h-full rounded-md" 
                                                    src="{{ asset('storage/images/product/' . $product->image . '')}}" 
                                                    alt="Logo">
                                                <div class="w-full text-transparent rounded-md h-full absolute top-0 left-0 flex justify-center items-center hover:bg-black/60 hover:text-white/50 duration-300">
                                                    <label for="thumbnail-input" class="relative">
                                                        <div class="w-full h-full p-[35%]">
                                                            <svg fill="none" class=" w-full h-full" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z" fill="currentColor" class="fill-212121"></path></svg>
                                                        </div>
                                                        <input accept="image/*" type="file" name="thumbnail" class="absolute bottom-0 left-0 z-0 w-40 opacity-0" id="thumbnail-input"/>
                                                    </label>
                                                </div>
                                                <script>
                                                    const logoinput = document.getElementById('thumbnail-input');
                                                    const logo = document.getElementById('thumbnail');
                            
                                                    logoinput.onchange = evt => {
                                                        const [file] = logoinput.files;
                                                        if (file) {
                                                            logo.src = URL.createObjectURL(file);
                                                        }
                                                    };
                            
                                                    window.addEventListener('paste', e => {
                                                        const [file] = e.clipboardData.files;
                                                        if (file) {
                                                            logo.src = URL.createObjectURL(file);
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class=" w-full md:col-span-2 space-y-6">
                                            <div class=" space-y-2">
                                                <label for="name">Product Name</label>
                                                <input value="{{$product->name}}" class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="name" id="name">
                                            </div>
                                            <div class=" space-y-2">
                                                <label for="price">Price</label>
                                                <input value="{{$product->price}}" class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" min="0" name="price" id="price">
                                            </div>
                                            <div class=" space-y-2">
                                                <label for="link">Link Youtube</label>
                                                <input value="{{$product->youtube}}" class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="link" id="link">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" space-y-2">
                                        <label for="subtitle">Sub Title</label>
                                        <textarea class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="subtitle" id="subtitle" rows="2" maxlength="64">{{$product->subtitle}}</textarea>
                                    </div>
                                    <div class=" space-y-2">
                                        <label for="no_tlp">No. Telephone</label>
                                        <input value="{{$product->no_tlp}}" class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="no_tlp" id="no_tlp">
                                    </div>
                                    <div class=" space-y-2">
                                        <label for="desc">Description</label>
                                        <textarea class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="description" id="desc" rows="5">{{$product->description}}</textarea>
                                    </div>
                                    <div class=" space-y-2">
                                        <label for="address">Address</label>
                                        <textarea class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="address" id="address" rows="5">{{$product->address}}</textarea>
                                    </div>
                                    <x-admin.component.taginput title="Tag" :value="$product->productTags" name="tag[]" :tag="$tag"></x-admin.component.taginput>
                                    <div class=" space-y-2">
                                        <label for="template">template</label>
                                        <div x-data="{ selected: '{{$product->template ?? ''}}' }" class=" w-full grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                                            <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                                <input type="radio" name="template" id="two" value="two" class="hidden" 
                                                       @checked(isset($product->template) && $product->template === 'two') 
                                                       @change="selected = 'two'">
                                                <label for="two" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'two' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                                <div class=" bg-black flex items-start w-full h-full">
                                                    <img src="{{asset('/assets/images/template/two.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                                </div>
                                            </div>
                                            <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                                <input type="radio" name="template" id="three" value="three" class="hidden" 
                                                       @checked(isset($product->template) && $product->template === 'three') 
                                                       @change="selected = 'three'">
                                                <label for="three" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'three' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                                <div class=" bg-black flex items-start w-full h-full">
                                                    <img src="{{asset('/assets/images/template/three.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                                </div>
                                            </div>
                                            <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                                
                                                <input type="radio" name="template" id="four" value="four" class="hidden" 
                                                       @checked(isset($product->template) && $product->template === 'four') 
                                                       @change="selected = 'four'">
                                                <label for="four" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'four' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                                <div class=" bg-black flex items-start w-full h-full">
                                                    <img src="{{asset('/assets/images/template/four.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                                </div>
                                            </div>
                                            <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                                <input type="radio" name="template" id="five" value="five" class="hidden" 
                                                       @checked(isset($product->template) && $product->template === 'five') 
                                                       @change="selected = 'five'">
                                                <label for="five" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'five' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                                <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                                    <img src="{{asset('/assets/images/template/five.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                                </div>
                                            </div>
                                            <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                                <input type="radio" name="template" id="six" value="six" class="hidden" 
                                                       @checked(isset($product->template) && $product->template === 'six') 
                                                       @change="selected = 'six'">
                                                <label for="six" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'six' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                                <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                                    <img src="{{asset('/assets/images/template/six.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                                </div>
                                            </div>
                                            <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                                <input type="radio" name="template" id="seven" value="seven" class="hidden" 
                                                       @checked(isset($product->template) && $product->template === 'seven') 
                                                       @change="selected = 'seven'">
                                                <label for="seven" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'seven' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                                <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                                    <img src="{{asset('/assets/images/template/seven.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                                </div>
                                            </div>
                                            <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                                <input type="radio" name="template" id="eight" value="eight" class="hidden" 
                                                       @checked(isset($product->template) && $product->template === 'eight') 
                                                       @change="selected = 'eight'">
                                                <label for="eight" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'eight' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                                <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                                    <img src="{{asset('/assets/images/template/eight.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                                </div>
                                            </div>
                                            <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                                <input type="radio" name="template" id="nine" value="nine" class="hidden" 
                                                       @checked(isset($product->template) && $product->template === 'nine') 
                                                       @change="selected = 'nine'">
                                                <label for="nine" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'nine' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                                <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                                    <img src="{{asset('/assets/images/template/nine.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                                </div>
                                            </div>
                                            <div class="w-full aspect-[2/3] rounded-md overflow-hidden relative">
                                                <input type="radio" name="template" id="ten" value="ten" class="hidden" 
                                                       @checked(isset($product->template) && $product->template === 'ten') 
                                                       @change="selected = 'ten'">
                                                <label for="ten" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'ten' ? 'bg-black/50' : 'hover:bg-black/20'"></label>
                                                <div class=" bg-[#1679AB] flex items-start w-full h-full">
                                                    <img src="{{asset('/assets/images/template/ten.png')}}" class=" w-full h-full object-cover object-top" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="">
                                        <button class=" font-bold w-full py-2 bg-indigo-500 hover:bg-indigo-700 duration-300 text-white rounded-md text-center">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'highlight'" class="py-4 px-4">
                <div class="max-w-[1080px] mx-auto">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class=" p-4 md:p-6 text-gray-900 space-y-4">
                            <p>Highlights ( Max 3 )</p>
                            <div class=" space-y-2">
                                <div class=" w-full grid lg:grid-cols-2 gap-4">
                                    @foreach ($product->productHighlight as $item)
                                        <div class=" w-full rounded-xl flex justify-between gap-4">
                                            <form id="highlight-form-{{$item->id}}" action="{{route('highlight.update', ['highlight' => $item->id])}}" method="POST" class="flex-grow" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class=" rounded-xl flex justify-between gap-4 bg-white">
                                                    <div class=" min-w-20 sm:min-w-24 h-20 sm:h-24 aspect-square rounded-md border-2 overflow-hidden">
                                                        <div class="w-full h-full flex flex-col text-sm font-medium gap-2 justify-center items-center">
                                                            <div class="w-full h-full relative flex justify-center overflow-hidden">
                                                                <img id="highlightimage{{$item->id}}-preview" class="object-cover w-full" 
                                                                    src="{{$item->image == '' ? asset('assets/images/placeholder.webp') : asset('storage/images/product/highlight/'. $item->image)  }}" 
                                                                    alt="Logo">
                                                                <div class="w-full h-full absolute z-10 top-0 opacity-0 hover:opacity-100 duration-300">
                                                                    <label for="highlightimage{{$item->id}}-input" class="relative">
                                                                        <div class="w-full h-full bg-black opacity-60 flex justify-center items-center text-neutral-400">
                                                                            <div class="w-7 aspect-square">
                                                                                <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
                                                                            </div>
                                                                        </div>
                                                                        <input accept="image/*" type="file" name="highlightimage" 
                                                                            class="absolute bottom-0 left-0 z-0 w-40 opacity-0" 
                                                                            id="highlightimage{{$item->id}}-input" 
                                                                            oninput="handleImagePreview(this, 'highlightimage{{$item->id}}-preview')" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <script>
                                                            function handleImagePreview(input, previewId) {
                                                                const previewImage = document.getElementById(previewId);
                                                                const [file] = input.files;
                                                                if (file) {
                                                                    previewImage.src = URL.createObjectURL(file);
                                                                }
                                                            }
                                                        
                                                            // Paste event to handle all image inputs
                                                            window.addEventListener('paste', e => {
                                                                const [file] = e.clipboardData.files;
                                                                if (file) {
                                                                    document.querySelectorAll('img[id$="-preview"]').forEach(img => {
                                                                        img.src = URL.createObjectURL(file);
                                                                    });
                                                                }
                                                            });
                                                        </script>
                                                    </div>
                                                    <div class=" flex flex-col flex-grow justify-between gap-2">
                                                        <input type="text" class=" min-w-0 p-0 w-full border-t-0 border-l-0 border-r-0 ring-0 focus:ring-0" value="{{$item->title}}" name="title" placeholder="Title" maxlength="27" >
                                                        <textarea name="description" id="" class=" min-w-0 w-full p-0 border-t-0 border-l-0 border-r-0 ring-0 focus:ring-0 text-sm" placeholder="Description" maxlength="64" cols="40">{{$item->description}}</textarea>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class=" min-w-[50px] grid grid-cols-1 grid-rows-2 gap-1">
                                                <button onclick="submitHighlightForm({{$item->id}})" class=" min-w-[50px] bg-indigo-500 hover:bg-indigo-700 duration-300 text-white rounded-md text-center text-sm">Edit</button>
                                                <form action="{{route('highlight.destroy', ['highlight'=>$item->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class=" min-w-[50px] h-full bg-red-500 hover:bg-red-700 duration-300 text-white rounded-md text-center text-sm">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach

                                    <script>
                                        function submitHighlightForm(formId) {
                                            const form = document.getElementById(`highlight-form-${formId}`);
                                            if (form) {
                                                form.submit();
                                            }
                                        }
                                    </script>
                                    
                                    @if ($product->productHighlight->count() < 3)    
                                        <form action="{{route('highlight.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class=" w-full max-w-full rounded-xl flex justify-between gap-4 bg-white">
                                                <div class=" min-w-20 sm:min-w-24 h-20 sm:h-24 aspect-square rounded-md overflow-hidden">
                                                    <div class="w-full h-full flex flex-col text-sm font-medium gap-2 justify-center items-center">
                                                        <div class="w-full h-full relative flex justify-center overflow-hidden">
                                                            <img id="highlightimage-preview" class="object-cover w-full" 
                                                                src="{{asset('assets/images/placeholder.webp')}}" 
                                                                alt="Logo">
                                                            <div class="w-full h-full absolute z-10 top-0 opacity-0 hover:opacity-100 duration-300">
                                                                <label for="highlightimage-input" class="relative">
                                                                    <div class="w-full h-full bg-black opacity-60 flex justify-center items-center text-neutral-400">
                                                                        <div class="w-7 aspect-square">
                                                                            <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
                                                                        </div>
                                                                    </div>
                                                                    <input accept="image/*" type="file" name="highlightimage" 
                                                                        class="absolute bottom-0 left-0 z-0 w-40 opacity-0" 
                                                                        id="highlightimage-input" 
                                                                        required
                                                                        oninput="handleImagePreview(this, 'highlightimage-preview')" />
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        function handleImagePreview(input, previewId) {
                                                            const previewImage = document.getElementById(previewId);
                                                            const [file] = input.files;
                                                            if (file) {
                                                                previewImage.src = URL.createObjectURL(file);
                                                            }
                                                        }
                                                    
                                                        // Paste event to handle all image inputs
                                                        window.addEventListener('paste', e => {
                                                            const [file] = e.clipboardData.files;
                                                            if (file) {
                                                                document.querySelectorAll('img[id$="-preview"]').forEach(img => {
                                                                    img.src = URL.createObjectURL(file);
                                                                });
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                                <div class=" flex flex-col flex-grow justify-between gap-2">
                                                    <input type="text" class="hidden" name="product_id" value="{{$product->id}}">
                                                    <input type="text" name="title" class=" min-w-0 p-0 w-full border-t-0 border-l-0 border-r-0 ring-0 focus:ring-0" placeholder="Title" maxlength="27" >
                                                    <textarea name="description" id="description" class=" min-w-0 w-full p-0 border-t-0 border-l-0 border-r-0 ring-0 focus:ring-0 text-sm" placeholder="Description" maxlength="64" cols="40"></textarea>
                                                </div>
                                                <button class=" min-w-[50px] bg-indigo-500 hover:bg-indigo-700 duration-300 text-white rounded-md text-center text-sm">Save</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                                <div class="">
                                    <a href="{{route('product.index')}}">
                                        <button class=" font-bold w-full py-2 bg-indigo-500 hover:bg-indigo-700 duration-300 text-white rounded-md text-center">Save</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'gallery'" class="py-4 px-4">
                <div class="max-w-[1080px] mx-auto">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class=" p-4 md:p-6 text-gray-900 space-y-4">
                            <div x-data="galleryComponent({{ $product->productGallery }}, {{ $product->id }})" class="flex flex-col gap-2">
                                <label class="font-semibold" for="image_gallery">Galeri ( Max 9 )</label>
                                <input type="file" class="hidden" id="image_gallery" name="image_gallery[]" multiple accept="image/*" @change="addImages($event)">
                                <div class="w-full grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                                    <template x-for="(image, index) in images" :key="index">
                                        <div class="w-full aspect-[3/2] rounded-md relative overflow-hidden">
                                            <img :src="image.url" class="w-full h-full object-cover" alt="Gallery Image Preview">
                                            {{-- Delete Image --}}
                                            <label @click="deleteImage(index)" class="w-full text-transparent h-full absolute top-0 left-0 flex justify-center items-center p-[20%] hover:bg-black/60 hover:text-white/50 duration-300 cursor-pointer">
                                                <svg viewBox="0 0 24 24" class="w-full h-full" xmlns="http://www.w3.org/2000/svg"><path d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z" fill="currentColor" class="fill-000000"></path></svg>
                                            </label>
                                        </div>
                                    </template>
                            
                                    {{-- Add Image --}}
                                    <div class="w-full aspect-[3/2] border bg-neutral-100 border-neutral-600 rounded-md relative border-dashed overflow-hidden" x-show="images.length < 9">
                                        <label for="image_gallery" class="w-full text-neutral-600 h-full absolute top-0 left-0 flex justify-center items-center p-[20%] hover:bg-neutral-600 hover:text-white/50 duration-300 cursor-pointer">
                                            <svg viewBox="0 0 24 24" class="w-full h-full" xmlns="http://www.w3.org/2000/svg"><path d="m9 13 3-4 3 4.5V12h4V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h8v-4H5l3-4 1 2z" fill="currentColor" class="fill-000000"></path><path d="M19 14h-2v3h-3v2h3v3h2v-3h3v-2h-3z" fill="currentColor" class="fill-000000"></path></svg>
                                        </label>
                                    </div>
                                </div>
                            
                                <p x-show="errorMessage" class="text-red-500" x-text="errorMessage"></p>
                            </div>
                            <script>
                                function galleryComponent(initialImages = [], productId) {
                                    return {
                                        images: initialImages.map(item => ({
                                            id: item.id, // Include image ID from the server for delete functionality
                                            url: item.image ? `{{ asset('storage/images/product/gallery/') }}/${item.image}` : `{{ asset('assets/images/placeholder.png') }}`
                                        })),
                                        errorMessage: '',
                                        addImages(event) {
                                            const files = Array.from(event.target.files);
                                            
                                            // Check if adding new images would exceed the limit of 8
                                            if (this.images.length + files.length > 9) {
                                                this.errorMessage = 'You can only upload up to 8 images.';
                                                return;
                                            }
                            
                                            this.errorMessage = ''; // Reset error message
                            
                                            // Loop through selected files
                                            files.forEach(file => {
                                                const formData = new FormData();
                                                formData.append('image_gallery', file);
                                                formData.append('product_id', productId); // Add product ID to the form data
                            
                                                // Send the image data to the server using Axios
                                                axios.post('/admin/product-gallery', formData)
                                                    .then(response => {
                                                        const newImage = response.data; // Expect the server to return the new image details
                                                        const reader = new FileReader();
                                                        reader.onload = (e) => {
                                                            this.images.push({
                                                                id: newImage.id, // Use the ID returned from the server
                                                                url: e.target.result // Local preview URL
                                                            });
                                                        };
                                                        reader.readAsDataURL(file); // Read the file to get a local preview
                                                    })
                                                    .catch(error => {
                                                        console.error('Error uploading image:', error);
                                                        this.errorMessage = 'Error uploading image. Please try again.';
                                                    });
                                            });
                                        },
                                        deleteImage(index) {
                                            const image = this.images[index];
                                            
                                            // Send delete request to the server using Axios
                                            axios.delete(`/admin/product-gallery/${image.id}`)
                                                .then(() => {
                                                    // If successful, remove the image from the local array
                                                    this.images.splice(index, 1);
                                                })
                                                .catch(error => {
                                                    console.error('Error deleting image:', error);
                                                    this.errorMessage = 'Error deleting image. Please try again.';
                                                });
                                        }
                                    };
                                }
                            </script>
                            <div class="">
                                <a href="{{route('product.index')}}">
                                    <button class=" font-bold w-full py-2 bg-indigo-500 hover:bg-indigo-700 duration-300 text-white rounded-md text-center">Save</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
