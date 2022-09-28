<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\TestModel;
use App\Rules\ExistsID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TestController extends Controller
{
    public function index()
    {
        $test = TestModel::whereFullText('description', 'Sample')->paginate(1);
        $selected = [
           ["id" => 1, "name" => "Yangon", "selected" => false],
           ["id" => 2, "name" => "Mandalay", "selected" => false],
           ["id" => 3, "name" => "Myawlamyine", "selected" => true],
           ["id" => 4, "name" => "Bago", "selected" => false],
           ["id" => 5, "name" => "Taunggi", "selected" => false],
        ];
        return view('posts.index', ['posts' => $test, 'selectes' => $selected]);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        // info($request);


        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);

        TestModel::create([
            "name" => $request->name,
            "amount" => $request->amount,
            "description" => $request->description,
            "name" => $request->name,
        ]);


        // Validating Nested Array Input
        // $input = [
        //     'channels' => [
        //         [
        //             'type' => '',
        //             'address' => 'abigail@example.com',
        //         ],
        //         [
        //             'type' => '',
        //             'address' => 'https://example.com',
        //         ],
        //         [
        //             'test' => [
        //                 'type' => '',
        //             ]
        //         ],
        //     ],
        // ];
        // $validator = Validator::make($input, [
        //     'channels.*.type' => 'required',
        // ]);
        // $validator->validated();



        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        // ]);
        // $validator->validated();


        // $input = [
        //     'tests' => [
        //         [
        //             'id' => 1,
        //             'name' => 'One',
        //         ],
        //         [
        //             'id' => 4,
        //             'name' => 'Two',
        //         ],
        //     ],
        // ];
        // $validator = Validator::make($input, [
        //     'tests.*.id' => ['required', new ExistsID],
        // ]);
        // $validator->validated();


        // $input = [
        //     'tests' => [
        //         [
        //             'id' => 3,
        //             'name' => 'Three Post Test',
        //         ],
        //         [
        //             'id' => 4,
        //             'name' => 'Three Post Test',
        //         ],
        //     ],
        // ];
        // $validator = Validator::make($input, [
        //     'tests.*.id' => Rule::forEach(function ($value, $attribute) { // can't use in Request file
        //         return [
        //             'required',
        //             Rule::exists(TestModel::class, 'id'),
        //         ];
        //     }),
        // ]);
        // $validator->validated();

    }
}
