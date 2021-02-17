<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //? для чего он нужен ? В него попадают данные которые нам возвращаються обратно с сайта с формой или еще чем то
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        // dd(User::find(41)->hasRole('admin'));

        $title = 'Welcome to Home Page';
        $subtitle = '<em>to store</em>';
        $products = Product::with('category')->recomended()->latest()->paginate(9); //?название метода в Модели
        $sliders = Slider::get();
        // $reviews = Product::with('reviews')->get();
        // dd($products[0]);

        // $categories = Category::all();
        // dump($products); //? команада laravel
        // dd($products[0]); //? die dump выводит данные переменных(свойст,массивов,обьектов и тд) и останавливает дальнейший код
        return view('main.index', compact('title', 'products', 'subtitle','sliders')); //? имя папки первое дальше могут быть еще папки или файлы но ставим . а не / меджу ними

    }
    public function contacts()

    {
        $title = 'Contacts';
        return view('main.contacts', compact('title'));
    }
    public function getContacts(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:25',
            'email' => 'required|email',
            'message' => 'required|min:3|max:255',
        ]);

        //dd($request->all()); //? all() - это все данные которые содержит request, если нам нужны какие именно то мы должно указать какие
        // Продожение работьы...
        // Тут буедт отправка письма

        // return redirect('/contacts')->with('success', 'Thank you, your message sended');
        return back()->with('success', 'Thank you, your message sended'); //? возваращает пользователя на ту страницу с которой он пришел
    }
}
