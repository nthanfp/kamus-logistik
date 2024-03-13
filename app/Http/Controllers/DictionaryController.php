<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function showListIndonesia()
    {
        $words = Dictionary::whereNotNull('indonesian_definition')
            ->orderBy('indonesian')
            ->get();
        return view('dictionary.indonesia', ['words' => $words]);
    }
}
