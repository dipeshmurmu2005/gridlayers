<div class="pt-28 md:pt-32">
    <div class="px-5 md:px-80 md:py-20">
        <div class="md:w-150">
            <h2 class="text-5xl lg:text-5xl 2xl:text-6xl font-black leading-snug">{{ $this->country->page_title }}</h2>
        </div>
    </div>
    <div class="mt-10 md:mt-0" x-data="{
        init() {
            var swiper = new Swiper('.destinations', {
                slidesPerView: 1.2,
                spaceBetween: 30,
                loop: true,
                breakpoints: {
                    '1024': {
                        slidesPerView: 4.5,
                    }
                }
            })
        }
    }">
        <div class="swiper destinations">
            <div class="swiper-wrapper">
                @foreach ($this->destinations as $destination)
                    <div class="swiper-slide">
                        <a href={{ route('destination.view', ['slug' => $destination->slug]) }}
                            class="rounded-3xl block overflow-hidden h-90 lg:h-95 2xl:h-120 relative group">
                            <img src="{{ Storage::url($destination->cover_image) }}" alt=""
                                class="h-full w-full object-cover group-hover:scale-110 group-hover:rotate-3 duration-300 transition-all">
                            <div
                                class="absolute flex items-end left-0 top-0 h-full w-full object-cover bg-linear-to-tr from-black to-transparent">
                                <div class="p-5 text-white space-y-2 md:space-y-0">
                                    <h2 class="text-xl font-black flex gap-1"><x-heroicon-m-map-pin class="h-7 w-7" />
                                        {{ $destination->name }}</h2>
                                    <p class="text-white/60 capitalize">{{ $destination->short_description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="md:px-28 pt-20 md:pt-32">
        <h2 class="font-semibold text-2xl lg:text-xl 2xl:text-2xl px-5 md:px-0">Available Packages</h2>
        <div class="mt-10">
            <div class="md:grid grid-cols-4 mt-10 gap-8 hidden">
                @forelse ($this->packages as $package)
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
            @if ($this->packages->count() > 0)
                <div class="md:hidden" x-data="{
                    init() {
                        dealsSwiper = new Swiper('.dealsswiper', {
                            slidesPerView: 1.2,
                        })
                    }
                }">
                    <div class="swiper dealsswiper">
                        <div class="swiper-wrapper">
                            @foreach ($this->packages as $package)
                                <div class="swiper-slide">
                                    <x-business.tours.themes.modern.package :package="$package" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="col-span-3 h-fit md:hidden">
                    <div>
                        <div class="text-error bg-error/5 px-3 py-2 w-fit rounded-xl flex items-center gap-1 text-sm">
                            <x-heroicon-m-information-circle class="h-5 w-5" /> Currently no packages found.
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
