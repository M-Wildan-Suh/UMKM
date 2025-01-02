<div class=" w-full grid grid-cols-3 gap-2">
    @foreach ($data->productGallery as $item)
        <div id="gallery" class="flex items-center justify-center w-full aspect-[3/2] rounded overflow-hidden relative">
            <a class=" w-full h-full" href="{{ asset('storage/images/product/gallery/' . $item->image)}}" data-caption="{{$item->image_alt}}" aria-label="{{$item->image_alt}}">
                <div class="absolute w-full h-full top-0 left-0 duration-300 hover:bg-black/30 z-10"></div>
                <div x-data="{ src: '{{ asset('storage/images/product/gallery/' . $item->image) }}', isLoading: true, observer: null }"
                    x-init="() => {
                    observer = new IntersectionObserver(entries => {
                        entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = new Image();
                            img.src = '{{ asset('storage/images/product/gallery/' . $item->image) }}';
                            img.onload = () => {
                            src = img.src;
                            isLoading = false;
                            };
                            observer.disconnect();
                        }
                        });
                    });
                    observer.observe($el);
                    }"
                    class="relative w-full h-full flex items-center object-cover">
                
                    <!-- Placeholder / Loader -->
                    <div x-show="isLoading" class="absolute inset-0 flex items-center justify-center bg-gray-100">
                        <svg class="animate-spin h-8 w-8 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    
                    <!-- Image -->
                    <img :src="src" 
                        x-show="!isLoading" 
                        class="w-full h-full object-cover"
                        alt="">
                </div>
            </a>
        </div>
    @endforeach
</div>
<script>
    window.onload = function() {
        Fancybox.bind('#gallery a', {
            groupAll: true,
        });
    };
</script>