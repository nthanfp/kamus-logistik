<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function showListIndonesia()
    {
        // Buat array yang berisi huruf dari A hingga Z
        $alphabets = range('A', 'Z');

        $words = Dictionary::whereNotNull('indonesian_definition')
            ->orderBy('indonesian')
            ->get();

        return view('dictionary.indonesia', compact('words', 'alphabets'));
    }

    public function showListIndonesiaByAlphabet($alphabet)
    {
        // Buat array yang berisi huruf dari A hingga Z
        $alphabets = range('A', 'Z');

        $words = Dictionary::whereNotNull('indonesian_definition')
            ->where('indonesian', 'LIKE', $alphabet . '%')
            ->orderBy('indonesian')
            ->get();

        return view('dictionary.indonesia', compact('words', 'alphabets'));
    }

    public function showListEnglish()
    {
        // Buat array yang berisi huruf dari A hingga Z
        $alphabets = range('A', 'Z');

        $words = Dictionary::whereNotNull('english_definition')
            ->orderBy('english')
            ->get();

        return view('dictionary.english', compact('words', 'alphabets'));
    }

    public function showListEnglishByAlphabet($alphabet)
    {
        // Buat array yang berisi huruf dari A hingga Z
        $alphabets = range('A', 'Z');

        $words = Dictionary::whereNotNull('english_definition')
            ->where('english', 'LIKE', $alphabet . '%')
            ->orderBy('english')
            ->get();

        return view('dictionary.english', compact('words', 'alphabets'));
    }

    public function showWordDetail($id){
        // Buat array yang berisi huruf dari A hingga Z
        $alphabets = range('A', 'Z');

        // Mengambil data kata dari database berdasarkan ID
        $word = Dictionary::find($id);

        return view('word.detail', compact('alphabets', 'word'));
    }
}
