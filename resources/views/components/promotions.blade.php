@if($activePromotions->isNotEmpty())
<section class="promotions-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">የገደል ጊዜ ሽልማቶች</span>
            <h2 class="section-title">የተለዩ <span>ቅናሾች</span></h2>
        </div>
        
        <div class="promotions-grid">
            @foreach($activePromotions as $promotion)
                <div class="ad-banner" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="ad-content">
                        <div class="ad-badge">ፍላሽ ሽውያ</div>
                        <div class="ad-main">
                            <h3 class="ad-title">{{ $promotion->title }}</h3>
                            <p class="ad-subtitle">{{ $promotion->description }}</p>
                            
                            @if($promotion->promo_code)
                                <div class="ad-code-box">
                                    <span class="code-text">ኮድ: {{ $promotion->promo_code }}</span>
                                    <button class="code-copy-btn" onclick="copyPromoCode('{{ $promotion->promo_code }}')">ኮፒ ያድርጉ</button>
                                </div>
                            @endif
                            
                            <div class="ad-footer">
                                <span class="ad-discount">{{ $promotion->discount_percentage ? $promotion->discount_percentage . '% ቅናሽ' : 'አሁን ይቆጥቡ' }}</span>
                                @if($promotion->expiry_date)
                                    <span class="ad-urgent">ይወጣል {{ \Carbon\Carbon::parse($promotion->expiry_date)->diffForHumans() }}!</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.promotions-section {
    padding: 60px 0;
    background: #ffffff;
    width: 100%;
    margin: 0;
}

.promotions-grid {
    width: 100%;
    max-width: none;
    margin: 0;
    padding: 0 2rem;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.ad-banner {
    background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
    border-radius: 12px;
    padding: 2rem;
    position: relative;
    overflow: hidden;
    transition: all 0.3s;
    cursor: pointer;
    border: 2px solid transparent;
    width: 100%;
}

.ad-banner::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,202,8,0.1) 0%, transparent 70%);
    animation: rotate 20s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.ad-banner:hover {
    transform: translateY(-5px);
    border-color: var(--primary-light);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.ad-badge {
    position: absolute;
    top: 15px;
    right: -30px;
    background: #ff4444;
    color: white;
    font-weight: 700;
    font-size: 0.7rem;
    padding: 0.3rem 3rem;
    transform: rotate(45deg);
    text-transform: uppercase;
    letter-spacing: 1px;
    z-index: 2;
    box-shadow: 0 5px 15px rgba(255,68,68,0.3);
}

.ad-content {
    position: relative;
    z-index: 2;
    color: white;
}

.ad-title {
    font-size: 2rem;
    font-weight: 900;
    margin-bottom: 0.5rem;
    line-height: 1.2;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.ad-subtitle {
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    opacity: 0.9;
    line-height: 1.5;
}

.ad-code-box {
    background: rgba(255,255,255,0.15);
    border: 2px dashed rgba(255,255,255,0.3);
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    backdrop-filter: blur(5px);
}

.code-text {
    font-family: 'Courier New', monospace;
    font-weight: 700;
    font-size: 1.2rem;
    color: var(--primary-light);
    letter-spacing: 2px;
}

.code-copy-btn {
    background: var(--primary-light);
    color: var(--primary);
    border: none;
    padding: 0.6rem 1.8rem;
    border-radius: 6px;
    font-weight: 700;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.code-copy-btn:hover {
    background: white;
    color: var(--primary);
    transform: scale(1.05);
}

.ad-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.ad-discount {
    background: var(--primary-light);
    color: var(--primary);
    font-weight: 900;
    font-size: 1.4rem;
    padding: 0.6rem 1.8rem;
    border-radius: 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 5px 15px rgba(255,202,8,0.3);
}

.ad-urgent {
    color: #ff6b6b;
    font-weight: 700;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

@media (max-width: 768px) {
    .promotions-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
        padding: 0 1rem;
    }
    
    .ad-title {
        font-size: 1.6rem;
    }
    
    .ad-subtitle {
        font-size: 1rem;
    }
    
    .ad-code-box {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .ad-footer {
        flex-direction: column;
        text-align: center;
    }
    
    .ad-badge {
        right: -25px;
        padding: 0.2rem 2rem;
        font-size: 0.6rem;
    }
}

@media (min-width: 1400px) {
    .promotions-grid {
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        padding: 0 4rem;
    }
    
    .ad-title {
        font-size: 2.2rem;
    }
}
</style>
@endif
