<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\throwException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            return redirect('/test');
        }

        return redirect('/');
    }

    public function test()
    {
        // $file_path = base_path('tests/hulft');
        // $contents = file_get_contents($file_path . '/maturity.txt');

        $file_path  = base_path('tests/hulft/maturity.txt');
        // $file_path = config('hulft.IMPORT_TEST');
        info($file_path);
        if (! file_exists($file_path)) {
            return 'File Not Exist';
        }
        $import_data_array = file($file_path, FILE_IGNORE_NEW_LINES);
        return $import_data_array;
    }
}
