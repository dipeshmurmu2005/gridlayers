   @section('seo')
       <x-business.tours.themes.modern.seo :seo="$this->seo" />
   @endsection
   <div class="px-5 pt-28 md:pt-48 lg:px-24 2xl:px-32">
       <div class="grid md:grid-cols-2 gap-5 md:gap-18">
           <div class="relative">
               <div class="w-[70%] rounded-3xl overflow-hidden h-120 hidden md:block">
                   <img src="{{ Storage::url($this->destination->cover_image) }}" alt=""
                       class="h-full w-full object-cover">
               </div>
               <div class="md:absolute right-0 -bottom-10 h-70 md:w-100 z-50 rounded-2xl overflow-hidden">
                   <div x-data="{
                       init() {
                           var distinationImagesSwiper = new Swiper('.destinationimages', {
                               slidesPerView: 1,
                               speed: 500,
                               loop: true,
                               autoplay: {
                                   delay: 3000,
                               }
                           })
                       }
                   }">
                       <div class="swiper destinationimages">
                           <div class="swiper-wrapper">
                               @foreach ($this->destination->images as $image)
                                   <div class="swiper-slide">
                                       <div class="h-70">
                                           <img src="{{ Storage::url($image) }}" alt=""
                                               class="h-full w-full object-cover">
                                       </div>
                                   </div>
                               @endforeach
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div>
               <div class="space-y-5">
                   <div class="flex gap-2 items-center">
                       <div
                           class="flex w-fit items-center gap-1 px-3 py-2 bg-primary/10 text-primary rounded-xl 2xl:text-base lg:text-sm">
                           <x-icon name="{{ $this->destination->type->getIcon() }}" class="h-5 w-5" />
                           {{ $this->destination->type->getLabel() }}
                       </div>
                       <div class="flex gap-1 items-center 2xl:text-base lg:text-sm">
                           <x-heroicon-m-map-pin class="h-5 w-5" />
                           <span>{{ $this->destination->country->name }}</span>
                       </div>
                   </div>
                   <h2 class="text-4xl lg:text-5xl 2xl:text-6xl font-black">{{ $this->destination->name }}</h2>
                   <div>
                       <div class="prose capitalize">{!! $this->destination->content !!}</div>
                   </div>
               </div>
           </div>
       </div>
       <div class="mt-10 md:mt-32">
           <h2 class="font-black text-xl lg:text-xl 2xl:text-2xl">Available Packages</h2>
           <div class="md:grid grid-cols-4 mt-10 hidden">
               @forelse ($this->destination->packages as $package)
                   <x-business.tours.themes.modern.package :package="$package" />
               @empty
                   <div class="col-span-3 h-fit">
                       <div>
                           <div
                               class="text-error bg-error/5 px-3 py-2 w-fit rounded-xl flex items-center gap-1 text-sm">
                               <x-heroicon-m-information-circle class="h-5 w-5" /> Currently no packages found.
                           </div>
                       </div>
                   </div>
               @endforelse
           </div>
           <div class="pt-5 md:hidden" x-data="{
               init() {
                   dealsSwiper = new Swiper('.dealsswiper', {
                       slidesPerView: 1.2,
                   })
               }
           }">
               <div class="swiper dealsswiper">
                   <div class="swiper-wrapper">
                       @foreach ($this->destination->packages as $package)
                           <div class="swiper-slide">
                               <x-business.tours.themes.modern.package :package="$package" />
                           </div>
                       @endforeach
                   </div>
               </div>
           </div>
       </div>
   </div>
