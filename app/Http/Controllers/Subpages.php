<?php

namespace App\Http\Controllers;

use App\Enum\SaveMode;
use App\Http\Requests\UpdateSubpage;
use App\Subpage;
use Illuminate\Http\Request;

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

    public function update(UpdateSubpage $request, Subpage $subpage)
    {
        $validated = $request->validated();
        $subpage->update($validated);

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
