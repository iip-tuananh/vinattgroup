<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Banner;
use App\Model\Admin\Category;
use App\Model\Admin\PostCategory;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin\OrderRevenueDetail;
use App\Model\Admin\Service;
use App\Model\Common\File;

class MenuHomePageComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $productCategories = Category::query()->with([
            'childs' => function ($query) {
                $query->with(['childs']);
            }
        ])
        ->where(['type' => 1, 'parent_id' => 0])
        ->orderBy('sort_order')
        ->get();

        $postCategories = PostCategory::query()->where(['parent_id' => 0, 'show_home_page' => 1])->latest()->get();

        $services = Service::query()->where(['status' => 1])->latest()->get();

        // $galleries = File::query()->where(['status' => 1])->latest()->get();

        $view->with(['productCategories' => $productCategories, 'postCategories' => $postCategories, 'services' => $services]);
    }
}
