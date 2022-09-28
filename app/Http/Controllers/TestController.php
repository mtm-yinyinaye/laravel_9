<?php

namespace App\Http\Controllers;

use App\Models\TestModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;

class TestController extends Controller
{
    public function index()
    {
        // $test = TestModel::get();
        // $test = DB::table('tests')->whereFullText('description', 'Sample')->get();
        // return $test;

        $test = TestModel::whereFullText('description', 'Sample')->paginate(1);
        $selected = [
           ["id" => 1, "name" => "Yangon", "selected" => false],
           ["id" => 2, "name" => "Mandalay", "selected" => false],
           ["id" => 3, "name" => "Myawlamyine", "selected" => true],
           ["id" => 4, "name" => "Bago", "selected" => false],
           ["id" => 5, "name" => "Taunggi", "selected" => false],
        ];
        // info($test);
        // return Blade::render(
        //     '
        //     <h1>List</h1>
        //     <div>
        //     @foreach ($test as $t)
        //         <p>{{ $t->name }}</p>
        //     @endforeach
        //     </div>
        //     ', ['test' => $test]
        // );
        return view('posts.index', ['posts' => $test, 'selectes' => $selected]);

    }

    public function create()
    {
        $product = new TestModel();
        $product->name = "Sample Product 2";
        $product->amount = 12;
        $product->description = "Sample Fulltext Method";
        $product->active = 1;
        $product->save();
    }
}
