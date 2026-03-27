<section class="py-5" id="remedies">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">THE APOTHECARY</span>
            <h2 class="section-title">Featured <span>Remedies</span></h2>
        </div>

        <div class="row g-4">
            @forelse ($featuredPlants as $plant)
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <div class="product-card">
                        <div class="product-image">
                            @if($plant->image)
                                <img src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1615485242221-39656461c360?auto=format&fit=crop&w=800&q=80" alt="{{ $plant->name }}">
                            @endif
                            <span class="product-badge">Premium</span>
                            <div class="product-actions">
                                <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-region">{{ $plant->region ?? 'Ethiopian Highlands' }}</div>
                            <h5 class="product-name">{{ $plant->name }}</h5>
                            @if($plant->scientific_name)
                                <div class="product-scientific">{{ $plant->scientific_name }}</div>
                            @endif
                            <div class="product-local">{{ $plant->local_name ?? 'Traditional Herb' }}</div>
                            <div class="product-price">{{ $plant->price ?? '0' }} {{ __('messages.currency') }}</div>
                            <div class="product-footer">
                                <button class="btn-reserve contact-btn" data-phone="{{ $owner_phone ?? '+251911XXXXXX' }}">
                                    <i class="bi bi-whatsapp"></i>
                                </button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No medicinal plants available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
