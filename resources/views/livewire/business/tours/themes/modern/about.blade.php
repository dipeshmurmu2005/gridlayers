<div>
    @section('seo')
        <x-business.tours.themes.modern.seo :seo="$this->page" />
    @endsection
    <div class="px-5 pt-28 md:pt-40 lg:px-50 2xl:px-60">
        <div class="flex justify-center items-center">
            <h2 class="px-3 py-2 bg-black/10 rounded-full text-sm">About Us</h2>
        </div>
        <div
            class="text-3xl lg:px-24 2xl:px-50 flex justify-center mt-5 lg:text-[5rem] 2xl:text-[6rem] font-black text-center leading-snug">
            <h2>Optimal Yesterday, Today and Tomorrow</h2>
        </div>
        <div
            class="flex justify-center overflow-hidden md:overflow-visible h-70 md:h-fit md:grid grid-cols-4 mt-10 md:mt-20 gap-5">
            <div class="rounded-3xl overflow-hidden h-60 min-w-40 md:min-w-auto lg:h-80 2xl:h-100 -rotate-12">
                <img src="https://img.freepik.com/free-photo/courage-man-jump-through-gap-hill-business-concept-idea_1323-262.jpg?semt=ais_hybrid&w=740&q=80"
                    alt="" class="h-full w-full object-cover">
            </div>
            <div class="rounded-3xl overflow-hidden h-60 min-w-40 md:min-w-auto lg:h-80 2xl:h-100 -rotate-2">
                <img src="https://images.unsplash.com/photo-1526779259212-939e64788e3c?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8ZnJlZSUyMGltYWdlc3xlbnwwfHwwfHx8MA%3D%3D"
                    alt="" class="h-full w-full object-cover">
            </div>
            <div class="rounded-3xl overflow-hidden h-60 min-w-40 md:min-w-auto lg:h-80 2xl:h-100 rotate-2">
                <img src="https://img.freepik.com/free-photo/high-angle-man-living-countryside_23-2150642419.jpg?semt=ais_user_personalization&w=740&q=80"
                    alt="" class="h-full w-full object-cover">
            </div>
            <div class="rounded-3xl overflow-hidden h-60 min-w-40 md:min-w-auto lg:h-80 2xl:h-100 rotate-12">
                <img src="https://media.istockphoto.com/id/1317323736/photo/a-view-up-into-the-trees-direction-sky.webp?b=1&s=612x612&w=0&k=20&c=8xbZvMyptEaqMW46diKakhVgkPkAzBi5l7J1yveCZFk="
                    alt="" class="h-full w-full object-cover">
            </div>
        </div>
        <div class="mt-10 md:mt-48 lg:px-50 2xl:px-60 text-lg md:text-2xl font-semibold text-center">
            <h2>For 17 years, Optimal has been the trusted partner behind the world's best user experiences. But we're
                not
                just resting on our legacy, we're building the future of user insights and experience.</h2>
        </div>
    </div>
    <div class="mt-10 md:mt-32">
        <livewire:business.tours.themes.modern.home.benefits-section />
    </div>
</div>
