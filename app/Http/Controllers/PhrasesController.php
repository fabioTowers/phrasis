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

    public function edit($id)
    {
        $phrase = Phrase::find($id);
        return view('phrases.edit', ['phrase' => $phrase]);
    }

    public function update($id)
    {
        $phrase = Phrase::find($id);

        request()->validate([
            'content' => 'required',
            'author' => 'required',
        ]);
        $phrase->update([
            'content' => request('content'),
            'author' => request('author'),
        ]);
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
        return redirect('/');
    }

    public function destroy($id)
    {
        $phrase = Phrase::find($id);
        $phrase->delete();
    }
}
