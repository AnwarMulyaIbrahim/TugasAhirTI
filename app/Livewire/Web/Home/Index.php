<?php

namespace App\Livewire\Web\Home;

use App\Models\Slider;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class Index extends Component
{
    /**
     * getPopularProducts
     *
     * @return void
     */
    protected function getPopularProducts()
    {
        return Product::with('category', 'ratings.customer')
            ->withAvg('ratings', 'rating') // Menghitung rata-rata rating
            ->having('ratings_avg_rating', '>=', 4)
            ->limit(5)
            ->get();
    }


    /**
     * getLatestProducts
     *
     * @return void
     */
    protected function getLatestProducts()
    {
        //get products
        return Product::query()
            ->with('category', 'ratings.customer')
            ->withAvg('ratings', 'rating')
            ->limit(5)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.web.home.index', [

            //get sliders
            'sliders' => Slider::oldest()->get(),

            //get categories
            'categories' => Category::latest()->get(),

            //get popular products
            'popularProducts' => $this->getPopularProducts(),
            //get latest products
            'latestProducts' => $this->getLatestProducts(),

        ]);
    }
}
