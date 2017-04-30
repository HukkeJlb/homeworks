<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use App\Category;
use App\Order;
use App\Article;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    protected function dataForAllPages(&$data)
    {
        if (!Auth::guest()){
            $countOrders = Order::where('user_id', Auth::User()->getAuthIdentifier())->count();
            $data['countOrders'] = $countOrders;
        }
        $categories = Category::all();
        $data['categories'] = $categories;
        $last_articles = Article::orderBy('id', 'desc')->take(3)->get();
        $data['last_articles'] = $last_articles;
        $rand_good = Good::orderBy('id', 'desc')->take((rand(1, 5)))->get()->last();
        $data['rand_good'] = $rand_good;
    }

    public function index()
    {
        $data['title'] = 'Последние товары';
        $data['title_page'] = 'Главная';
        $goods = Good::orderBy('id', 'desc')->paginate(6);
        $data['goods'] = $goods;
        $this->dataForAllPages($data);
        return view("index", $data);
    }

    public function category($category_id)
    {
        try {
            $category = Category::findOrFail($category_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $data['title_page'] = $category->name;
        $goods = Good::where('category_id', $category_id)->paginate(6);
        $data['goods'] = $goods;
        $this->dataForAllPages($data);
        return view("category", $data);
    }

    public function good($good_id)
    {
        try {
            $good = Good::findOrFail($good_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $data['good'] = $good;
        $data['title'] = $good->name;
        $data['title_page'] = $good->name;
        $this->dataForAllPages($data);
        return view("good", $data);
    }

    public function orders()
    {
        $orders = Order::where("user_id", Auth::User()->getAuthIdentifier())->paginate(6);
        $data['orders'] = $orders;
        $data['title'] = 'Мои заказы';
        $data['title_page'] = 'Мои заказы';
        $this->dataForAllPages($data);
        return view("myorders", $data);
    }

    public function news()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(3);
        $data['articles'] = $articles;
        $data['title'] = 'Новости';
        $data['title_page'] = 'Новости';
        $this->dataForAllPages($data);
        return view("news", $data);
    }

    public function article($article_id)
    {
        try {
            $article = Article::findOrFail($article_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $goods = Good::all()->random(3);
        $data['goods'] = $goods;
        $data['article'] = $article;
        $data['title'] = 'Новости';
        $data['title_page'] = $article->name;
        $this->dataForAllPages($data);
        return view("article", $data);
    }

    public function about()
    {
        $goods = Good::all()->random(3);
        $data['goods'] = $goods;
        $data['title'] = 'О магазине';
        $data['title_page'] = 'О магазине';
        $this->dataForAllPages($data);
        return view("about", $data);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword != '') {
            $goods = Good::where("name", "LIKE", "%$keyword%")
                ->orWhere("description", "LIKE", "%$keyword%")->paginate(6);
        }
        $data['goods'] = $goods;
        $data['title_page'] = 'Поиск';
        $data['title'] = 'Результаты поиска "' . $keyword . '"';
        $this->dataForAllPages($data);
        return view("index", $data);
    }
}