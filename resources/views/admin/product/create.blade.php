<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-4 px-4">
        <div class="max-w-[1080px] mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-4 md:p-6 text-gray-900">
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class=" w-full space-y-6">
                            <div class=" grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class=" flex flex-col gap-2">
                                    <div class=" w-full h-full max-h-[268.8px] relative">
                                        <img id="thumbnail" class=" object-cover w-full h-full rounded-md" 
                                            src="{{ asset('assets/images/placeholder.webp')}}" 
                                            alt="Logo">
                                        <div class="w-full text-transparent rounded-md h-full absolute top-0 left-0 flex justify-center items-center hover:bg-black/60 hover:text-white/50 duration-300">
                                            <label for="thumbnail-input" class="relative">
                                                <div class="w-full h-full p-[35%]">
                                                    <svg fill="none" class=" w-full h-full" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z" fill="currentColor" class="fill-212121"></path></svg>
                                                </div>
                                                <input accept="image/*" type="file" name="thumbnail" class="absolute bottom-0 left-0 z-0 w-40 opacity-0" id="thumbnail-input" required/>
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
                                        <input class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="name" id="name">
                                    </div>
                                    <div class=" space-y-2">
                                        <label for="price">Price</label>
                                        <input class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" min="0" name="price" id="price">
                                    </div>
                                    <div class=" space-y-2">
                                        <label for="link">Link Youtube</label>
                                        <input class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="link" id="link">
                                    </div>
                                </div>
                            </div>
                            <div class=" space-y-2">
                                <label for="subtitle">Sub Title</label>
                                <textarea class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="subtitle" id="subtitle" rows="2" maxlength="64"></textarea>
                            </div>
                            <div class=" space-y-2">
                                <label for="no_tlp">No. Telephone</label>
                                <input class=" w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="no_tlp" id="no_tlp">
                            </div>
                            <div class=" space-y-2">
                                <label for="desc">Description</label>
                                <textarea class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="description" id="desc" rows="5"></textarea>
                            </div>
                            <div class=" space-y-2">
                                <label for="address">Address</label>
                                <textarea class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="address" id="address" rows="5"></textarea>
                            </div>
                            <x-admin.component.taginput title="Tag" :value="null" :tag="$tag" name="tag[]"></x-admin.component.taginput>
                            <div class=" space-y-2">
                                <label for="template">template</label>
                                <div x-data="{ selected: '{{$product->template ?? ''}}' }" class=" w-full grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
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
                            {{-- <div x-data="imageGallery" class="flex flex-col gap-2">
                                <label for="image_gallery">Gallery</label>
                                <input type="file" class="hidden" id="image_gallery" name="image_gallery[]" multiple @input="previewImages" accept="image/*">
                                
                                <!-- Pratinjau Gambar -->
                                <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                                    <!-- Loop Gambar -->
                                    <template x-for="(image, index) in images" :key="index">
                                        <div class="w-full aspect-[3/2] rounded-md relative overflow-hidden">
                                            <img :src="image" class="w-full h-full object-cover" alt="Gallery Image Preview">
                                            <!-- Tombol Hapus Gambar -->
                                            <button @click="removeImage(index)" class="absolute inset-0 text-transparent hover:bg-black/60 hover:text-white/50 transition duration-300 p-[20%]">
                                                <svg viewBox="0 0 24 24" class="w-full h-full" xmlns="http://www.w3.org/2000/svg"><path d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z" fill="currentColor" class="fill-000000"></path></svg>
                                            </button>
                                        </div>
                                    </template>
                            
                                    <!-- Tambahkan Gambar (Placeholder jika kurang dari 8 gambar) -->
                                    <template x-if="images.length < 8">
                                        <label for="image_gallery" class="w-full aspect-[3/2] border bg-neutral-100 border-neutral-600 rounded-md relative border-dashed overflow-hidden">
                                            <label for="image_gallery" class="w-full text-neutral-600 h-full absolute top-0 left-0 flex justify-center items-center p-[20%] hover:bg-neutral-600 hover:text-white/50 duration-300 cursor-pointer">
                                                <svg viewBox="0 0 24 24" class="w-full h-full" xmlns="http://www.w3.org/2000/svg"><path d="m9 13 3-4 3 4.5V12h4V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h8v-4H5l3-4 1 2z" fill="currentColor" class="fill-000000"></path><path d="M19 14h-2v3h-3v2h3v3h2v-3h3v-2h-3z" fill="currentColor" class="fill-000000"></path></svg>
                                            </label>
                                        </label>
                                    </template>
                                </div>
                            </div>
                            
                            <script>
                                function imageGallery() {
                                    return {
                                        images: [],
                                        
                                        previewImages(event) {
                                            const files = Array.from(event.target.files).slice(0, 8 - this.images.length);
                                            files.forEach(file => {
                                                const url = URL.createObjectURL(file);
                                                this.images.push(url);
                                            });
                                        },
                                        
                                        removeImage(index) {
                                            this.images.splice(index, 1);
                                        }
                                    };
                                }
                            </script> --}}
                            
                            <div class="">
                                <button class=" font-bold w-full py-2 bg-indigo-500 hover:bg-indigo-700 duration-300 text-white rounded-md text-center">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
