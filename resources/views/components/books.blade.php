@if($featuredBooks->isNotEmpty())
<section class="py-5 bg-light" id="books">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">ANCIENT WISDOM</span>
            <h2 class="section-title">Featured <span>Books</span></h2>
        </div>
        
        <div class="row g-4">
            @foreach($featuredBooks as $book)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-book-card :book="$book" :ownerPhone="$owner_phone ?? '+251 91 163 1253'" />
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('books.index') }}" class="btn-action" style="max-width: 250px; margin: 0 auto;">
                View All Books <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif