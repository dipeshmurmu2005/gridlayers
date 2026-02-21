    @props(['package'])
    <a href="{{ route('package.view', ['slug' => $package->slug]) }}" class="rounded-3xl block h-full group">
        <div class="h-40 2xl:h-50 rounded-2xl overflow-hidden relative">
            <img src="{{ count($package->images) > 0 ? Storage::url($package->images[0]) : '' }}"
                class="h-full w-full object-cover group-hover:scale-110 duration-300" alt="">
            <div class="absolute right-5 top-5">
                <div
                    class="w-fit h-fit px-3 font-bold text-primary rounded-full py-2 bg-white flex justify-center items-center text-xs 2xl:text-sm lg:text-xs">
                    {{ $package->duration_days }} Days - {{ $package->duration_days - 1 }} Nights
                </div>
            </div>
            <div class="absolute left-5 bottom-5 text-warning">
                <div class="bg-white rounded-full h-fit w-fit flex justify-center items-center">
                    <x-heroicon-m-percent-badge class="h-8 w-8 2xl:h-8 lg:h-8 2xl:w-8 lg:w-8" />
                </div>
            </div>
        </div>
        <div class="mt-5 space-y-2 lg:space-y-3 2xl:space-y-5">
            <div>
                <h2 class="font-black lg:text-sm 2xl:text-base text-black/70">{{ $package->title }}</h2>
                <p class="lg:text-xs 2xl:text-sm">{{ $package->type->getLabel() }}</p>
            </div>
            {{-- <div class="space-y-2">
                <div class="lg:text-xs 2xl:text-sm flex lg:gap-1 2xl:gap-1 items-center">
                    <x-heroicon-m-map-pin class="h-5 w-5 2xl:h-4 lg:h-3 2xl:w-4 lg:w-3" />
                    Destinations
                </div>
                <div class="flex gap-1 flex-wrap text-black/60">
                    @foreach ($package->destinations as $destination_key => $destination)
                        <h3 class="font-medium lg:text-xs 2xl:text-sm">{{ $destination->name }}
                            {{ $destination_key == $package->destinations->count() - 1 ? '' : '-' }}
                        </h3>
                    @endforeach
                </div>
            </div> --}}
            <div class="flex justify-between items-end">
                <div>
                    <div class="flex gap-1 items-center text-sm">
                        From
                        <span class="font-medium line-through lg:text-sm 2xl:text-sm text-error">
                            Rs. {{ $package->original_price }}
                        </span>
                    </div>
                    <div class="font-bold text-sm lg:text-sm 2xl:text-base">
                        Rs. {{ $package->discounted_price }} <span class="text-xs font-medium">per person</span>
                    </div>
                </div>
            </div>
        </div>
    </a>
