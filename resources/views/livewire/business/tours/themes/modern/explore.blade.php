<div class="pt-90 md:pt-70 md:px-32 px-5">
    @section('seo')
        <x-business.tours.themes.modern.seo :seo="$this->page" />
    @endsection
    <div class="grid md:grid-cols-8 gap-10">
        <div class="md:col-span-2 bg-white p-8 shadow-sm rounded-3xl h-fit sticky top-32 hidden md:block">
            <div>
                <h2 class="font-semibold text-lg">Filters</h2>
                <div class="mt-2">
                    <label class="flex gap-2 items-center text-sm">
                        <input type="checkbox" checked="checked" wire:model.live="offers" class="checkbox" />
                        <span>Offers/Deals</span>
                    </label>
                </div>
                <div class="mt-8 space-y-5">
                    <div>
                        <h3 class="font-semibold">Price Sort</h3>
                        <div class="mt-2 space-y-4">
                            <label class="flex gap-2 items-center text-sm">
                                <input type="checkbox" checked="checked" wire:model.live="price_high_to_low"
                                    class="checkbox" />
                                <span>High to Low</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-semibold">Countries</h3>
                        <div class="mt-2 space-y-4" x-data="{
                            selected_countries: @entangle('selected_countries').live,
                            countrySelected(key) {
                                var country = this.selected_countries.find((country_key) => country_key == key);
                                return country ? true : false;
                            },
                            selectCountry(key) {
                                var countryIndex = this.selected_countries.findIndex((country_key) => country_key == key);
                                if (countryIndex >= 0) {
                                    this.selected_countries.splice(countryIndex, 1);
                                } else {
                                    this.selected_countries.push(key);
                                }
                            }
                        }">
                            @foreach ($this->countries as $key => $country)
                                <label class="flex gap-2 items-center text-sm">
                                    <input type="checkbox" value="{{ $key }}"
                                        x-on:click="selectCountry({{ $key }})"
                                        :checked="countrySelected({{ $key }})" class="checkbox" />
                                    <span>{{ $country }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-6">
            <div class="grid md:grid-cols-3 gap-5">
                @forelse ($this->packages as $package)
                    <x-business.tours.themes.modern.package :package="$package" />
                @empty
                    <div class="md:col-span-3 md:h-100 flex justify-center items-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="h-fit w-50">
                                <img class="h-full w-full object-contain"
                                    src="{{ asset('images/empty_state_image.webp') }}" alt="">
                            </div>
                            <div class="text-gray-600 font-semibold">Search Result Not Found</div>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="mt-8">
                {{ $this->packages->links() }}
            </div>
        </div>
    </div>
</div>
