<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\FavoriteContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    protected $favoriteRepository;

    public function __construct(FavoriteContract $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    public function index()
    {
        $categories = Category::all();
        return view('pages.product_favorite', compact('categories'));
    }

    public function updateFavorite(Request $request)
    {
        $user = Auth::user();
        if ($request->favorite == 'true') {
            $favorite = $this->favoriteRepository->create([
                'user_id' => $user->id,
                'product_id' => $request->productId
            ]);
        } else {
            $favorite = $this->favoriteRepository
                ->findByUserIdAndProductId($user->id, $request->productId);
            if (!empty($favorite)) {
                $this->favoriteRepository->destroy($favorite->id);
            }
        }
    }
}
