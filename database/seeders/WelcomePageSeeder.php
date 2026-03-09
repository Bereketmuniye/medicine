<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;
use App\Models\Article;
use App\Models\Book;
use App\Models\Promotion;
use App\Models\SocialMediaAccount;
use App\Models\Setting;
use Illuminate\Support\Str;

class WelcomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample medicinal plants
        $plants = [
            [
                'name' => 'Tena Adam',
                'local_name' => 'ተና አዳም',
                'scientific_name' => 'Ruta chalepensis',
                'description' => 'Traditional Ethiopian herb used for treating various ailments including colds, flu, and digestive issues. Known for its strong aromatic properties.',
                'region' => 'Amhara',
                'safety_warning' => 'Should be used in moderation. Not recommended for pregnant women.',
                'image' => 'plants/tena-adam.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Moringa',
                'local_name' => 'ሞሪንጋ',
                'scientific_name' => 'Moringa oleifera',
                'description' => 'Nutrient-dense superfood rich in vitamins, minerals, and antioxidants. Used for boosting energy and immune system.',
                'region' => 'Oromia',
                'safety_warning' => 'Generally safe for consumption. Consult healthcare provider for specific conditions.',
                'image' => 'plants/moringa.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Feto',
                'local_name' => 'ፌቶ',
                'scientific_name' => 'Echinops kebericho',
                'description' => 'Traditional medicinal plant used for wound healing and treating stomach ailments. Has antimicrobial properties.',
                'region' => 'Southern Nations',
                'safety_warning' => 'External use recommended. Internal use should be supervised.',
                'image' => 'plants/feto.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gesho',
                'local_name' => 'ገሾ',
                'scientific_name' => 'Rhamnus prinoides',
                'description' => 'Used in traditional Ethiopian medicine for treating fever, malaria, and as a general tonic. Also used in making traditional beverages.',
                'region' => 'Tigray',
                'safety_warning' => 'Safe in moderate amounts. Excessive consumption may cause side effects.',
                'image' => 'plants/gesho.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Plant::insert($plants);

        // Create sample articles
        $articles = [
            [
                'title' => 'The Healing Power of Tena Adam: Traditional Ethiopian Medicine',
                'slug' => 'healing-power-tena-adam',
                'content' => 'Tena Adam has been used for centuries in Ethiopian traditional medicine. This remarkable herb offers numerous health benefits... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'featured_image' => 'articles/tena-adam-article.jpg',
                'author_id' => 1,
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'views' => 245,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Moringa: The Miracle Tree of Ethiopia',
                'slug' => 'moringa-miracle-tree-ethiopia',
                'content' => 'Discover why Moringa is called the miracle tree. Packed with nutrients and healing properties, this superfood is transforming health in Ethiopia... Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'featured_image' => 'articles/moringa-miracle.jpg',
                'author_id' => 1,
                'status' => 'published',
                'published_at' => now()->subDays(12),
                'views' => 189,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ancient Wisdom: Ethiopian Traditional Healing Practices',
                'slug' => 'ethiopian-traditional-healing-practices',
                'content' => 'Explore the rich history of Ethiopian traditional medicine and how ancient wisdom continues to benefit modern health... Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'featured_image' => 'articles/traditional-healing.jpg',
                'author_id' => 1,
                'status' => 'published',
                'published_at' => now()->subDays(20),
                'views' => 156,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Article::insert($articles);

        // Create sample books
        $books = [
            [
                'title' => 'Ethiopian Medicinal Plants: A Complete Guide',
                'slug' => 'ethiopian-medicinal-plants-guide',
                'description' => 'Comprehensive guide to over 200 medicinal plants found in Ethiopia, their uses, and preparation methods.',
                'price' => 850.00,
                'type' => 'physical',
                'cover' => 'books/medicinal-plants-guide.jpg',
                'stock' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Traditional Healing: Ge\'ez Manuscripts Translated',
                'slug' => 'traditional-healing-geez-manuscripts',
                'description' => 'Ancient Ge\'ez medical manuscripts translated into modern language with detailed explanations.',
                'price' => 1200.00,
                'type' => 'physical',
                'cover' => 'books/geez-manuscripts.jpg',
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Herbalist\'s Companion',
                'slug' => 'herbalists-companion',
                'description' => 'Practical guide for preparing and using Ethiopian herbs for common ailments.',
                'price' => 450.00,
                'type' => 'digital',
                'cover' => 'books/herbalists-companion.jpg',
                'stock' => null, // Digital product
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Book::insert($books);

        // Create sample promotions
        $promotions = [
            [
                'title' => 'Welcome Discount',
                'slug' => 'welcome-discount',
                'description' => 'Special discount for first-time customers on all medicinal herbs',
                'image' => 'promotions/welcome-discount.jpg',
                'type' => 'percentage',
                'discount_percentage' => 15.00,
                'promo_code' => 'WELCOME15',
                'starts_at' => now(),
                'ends_at' => now()->addDays(30),
                'is_active' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Traditional Books Bundle',
                'slug' => 'traditional-books-bundle',
                'description' => 'Get 20% off when you purchase any two books from our collection',
                'image' => 'promotions/books-bundle.jpg',
                'type' => 'percentage',
                'discount_percentage' => 20.00,
                'promo_code' => 'BOOKS20',
                'starts_at' => now(),
                'ends_at' => now()->addDays(45),
                'is_active' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Promotion::insert($promotions);

        // Create social media accounts
        $socialAccounts = [
            [
                'platform' => 'facebook',
                'handle' => 'herbmedethiopia',
                'url' => 'https://facebook.com/herbmedethiopia',
                'description' => 'Follow us on Facebook for daily tips on Ethiopian traditional medicine',
                'followers' => 12500,
                'posts' => 342,
                'engagement_rate' => 4.2,
                'last_post_date' => now()->subDay(),
                'is_active' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'platform' => 'instagram',
                'handle' => 'herbmed.et',
                'url' => 'https://instagram.com/herbmed.et',
                'description' => 'Beautiful images and stories about Ethiopian medicinal plants',
                'followers' => 8700,
                'posts' => 256,
                'engagement_rate' => 5.8,
                'last_post_date' => now()->subHours(6),
                'is_active' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'platform' => 'youtube',
                'handle' => 'HerbMedEthiopia',
                'url' => 'https://youtube.com/HerbMedEthiopia',
                'description' => 'Educational videos about traditional Ethiopian healing practices',
                'followers' => 5300,
                'posts' => 89,
                'engagement_rate' => 3.1,
                'last_post_date' => now()->subDays(3),
                'is_active' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        SocialMediaAccount::insert($socialAccounts);

        // Create settings
        $settings = [
            [
                'key' => 'owner_phone',
                'value' => '+2519112345678',
                'description' => 'Owner contact phone number for WhatsApp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Setting::insert($settings);
    }
}
