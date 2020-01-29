<?php

namespace App\Http\Controllers;

use App\Enum\SaveMode;
use App\Subpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Subpages extends Controller
{
    public function index()
    {
        $subpages = Subpage::all();

        return view('subpages.index', ['subpages' => $subpages]);
    }

    public function create()
    {
        return view('subpages.create');
    }

    public function store(Request $request)
    {
        $subpage = new Subpage();
        $subpage->forceFill([
            'title->en' => 'the Subpage ' . rand(1, 1000),
            'contents->en' => 'the Subpage ' . rand(1, 1000),
        ]);

        $subpage->save();

    }

    public function edit(Subpage $subpage)
    {
        return view('subpages.edit', compact('subpage'));
    }

    public function update(Request $request, Subpage $subpage)
    {
        $subpage->update($request->only(['title', 'contents']));

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->route('subpage.index');
        }

        return redirect()->route('subpage.edit', $subpage->id);

    }

    public function destroy(Subpage $subpage)
    {
        $subpage->delete();
        return redirect()->route('subpage.index');
    }
}
