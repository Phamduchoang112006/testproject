<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{
    // Hiển thị form
    public function index()
    {
        return view('Examples.ptb1');
    }

    // Xử lý giải phương trình
    public function solve(Request $request)
    {
        $a = $request->input('a');
        $b = $request->input('b');

        if ($a == 0) {
            if ($b == 0) {
                $result = "Phương trình vô số nghiệm";
            } else {
                $result = "Phương trình vô nghiệm";
            }
        } else {
            $x = -$b / $a;
            $result = "Nghiệm x = " . $x;
        }

        return view('Examples.ptb1', compact('result'));
    }
}