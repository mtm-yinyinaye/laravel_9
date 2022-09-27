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

        $test = TestModel::whereFullText('description', 'Sample')->get();
        return Blade::render(
            '
            <h1>List</h1>
            <div>
            @foreach ($test as $t)
                <p>{{ $t->name }}</p>
            @endforeach
            </div>
            ', ['test' => $test]
        );

    }

    public function create()
    {
        $product = new TestModel();
        $product->name = "Sample Product 2";
        $product->amount = 12;
        $product->description = "Testing Fulltext Method";
        $product->save();
    }
}
