<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Phrase;

class PhrasesController extends Controller
{
    public function index()
    {
        $phrases = Phrase::all();
        return view('index', ['phrases' => $phrases]);
    }

    public function edit(Phrase $phrase)
    {
        return view('phrases.edit', ['phrase' => $phrase]);
    }

    public function update(Phrase $phrase)
    {
        request()->validate([
            'content' => 'required',
            'author' => 'required',
        ]);
        $phrase->update([
            'content' => request('content'),
            'author' => request('author'),
        ]);
        return redirect('/phrases');
    }

    public function create()
    {
        return view('phrases.create');
    }

    public function store()
    {
        request()->validate([
            'content' => 'required',
            'author' => 'required',
        ]);
        Phrase::create([
            'content' => request('content'),
            'author' => request('author'),
        ]);
        return redirect('/phrases');
    }

    public function destroy(Phrase $phrase)
    {
        $phrase->delete();
        return redirect('/phrases');
    }
}
