<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Author;
use App\Models\Article;

class NewsSeeder extends Seeder
{
    public function run(): void
    {

        $categoryNames = [
            'Technology',
            'Politics',
            'Sports',
            'Business',
            'Entertainment',
        ];

        $categories = [];

        foreach ($categoryNames as $name) {
            $categories[$name] = Category::firstOrCreate(
                ['slug' => strtolower($name)],
                [
                    'title' => $name,
                    'meta_title' => $name . ' News',
                    'meta_description' => 'Latest ' . $name . ' news and updates.',
                ]
            );
        }


        $author = Author::firstOrCreate(
            ['name' => 'NewsHub Editorial Team'],
            ['image' => null]
        );


        $articles = [
            [
                'title' => 'Artificial Intelligence Is Transforming the Future',
                'slug' => 'artificial-intelligence-transforming-future',
                'category' => 'Technology',
                'image' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=1200',
                'content' => 'Artificial intelligence is rapidly changing the world. From healthcare and education to business and communication, AI is creating new opportunities and transforming how people work and live. Experts believe that AI will continue to play an important role in the future.',
            ],
            [
                'title' => 'Global Leaders Discuss Important Economic Issues',
                'slug' => 'global-leaders-economic-issues',
                'category' => 'Politics',
                'image' => 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?w=1200',
                'content' => 'Global leaders have gathered to discuss major economic challenges. Discussions include international trade, economic growth, employment opportunities and cooperation between countries.',
            ],
            [
                'title' => 'International Sports Competition Attracts Millions',
                'slug' => 'international-sports-competition',
                'category' => 'Sports',
                'image' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=1200',
                'content' => 'Sports fans around the world are following an exciting international competition. Athletes are demonstrating their skills and determination while representing their countries.',
            ],
            [
                'title' => 'Technology Startups Create New Business Opportunities',
                'slug' => 'technology-startups-business-opportunities',
                'category' => 'Business',
                'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=1200',
                'content' => 'Technology startups are creating new opportunities in the business sector. Young entrepreneurs are introducing innovative products and services while contributing to economic development.',
            ],
            [
                'title' => 'Entertainment Industry Embraces Digital Platforms',
                'slug' => 'entertainment-industry-digital-platforms',
                'category' => 'Entertainment',
                'image' => 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=1200',
                'content' => 'Digital platforms are changing the entertainment industry. Audiences now have more ways to watch movies, enjoy music and discover new content through online services.',
            ],
        ];

        foreach ($articles as $data) {
            $article = Article::firstOrCreate(
                ['slug' => $data['slug']],
                [
                    'title' => $data['title'],
                    'author_id' => $author->id,
                    'content' => $data['content'],
                    'image' => $data['image'],
                    'meta_title' => $data['title'],
                    'meta_description' => substr($data['content'], 0, 150),
                ]
            );

            $article->categories()->syncWithoutDetaching([
                $categories[$data['category']]->id
            ]);
        }
    }
}
