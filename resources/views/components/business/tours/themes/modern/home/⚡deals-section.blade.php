<?php

use Livewire\Component;
use App\Models\Business\Tours\Package;
use App\Enums\Business\Tours\PackageStatusEnum;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

new class extends Component {
    public $packages_categories;

    public function mount()
    {
        $this->package_categories = Package::where('status', PackageStatusEnum::ACTIVE)->where('is_offer', true)->distinct()->pluck('type');
    }

    #[Computed]
    public function packages()
    {
        $packages = Package::where('status', PackageStatusEnum::ACTIVE)->where('is_offer', true)->get()->shuffle();
        return $packages;
    }
};
?>
<div>
    @if ($this->packages->count() > 0)
        <div class="lg:px-24 2xl:px-32 pt-5">
            <div class="grid-cols-5 pt-10 gap-8 space-y-8 hidden md:grid">
                @foreach ($this->packages as $package)
                    <x-business.tours.themes.modern.package :package="$package" />
                @endforeach
            </div>
            <div class="pt-10 md:hidden" x-data="{
                init() {
                    dealsSwiper = new Swiper('.dealsswiper', {
                        slidesPerView: 1.2,
                        spaceBetween: 20,
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
        </div>
    @endif
</div>
