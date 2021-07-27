<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">
        <header class="section-header">
            <h2>Serviços</h2>
            <p>Como podemos ajudar</p>
        </header>

        <div class="row gy-4">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6" data-aos-delay="200">
                <div class="flex flex-col border-b-2 border-{{ $category->color }} shadow-xl drop-shadow-md m-2 p-3 w-full hover:shadow-2xl">
                    <div class="text-{{ $category->color }} w-24 self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            {!! $category->icon_svg_path !!}
                        </svg>
                    </div>
                    <div class="mt-1 p-1 text-center h-56">
                        <h3 class="text-{{ $category->color }} text-center w-full font-semibold text-2xl mb-3">{!! $category->name !!}</h3>
                        <p class="text-md">{!! Str::markdown($category->description ? $category->description : '') !!}</p>
                    </div>
                    <div class="p-2 text-center">
                        <a href="{{ route('services') }}#{{ $category->slug }}" class="text-{{ $category->color }} font-semibold">
                            <span>Saiba mais</span> <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>