<?php

namespace App\Http\Controllers;

use App\Enum\SaveMode;
use App\Http\Requests\StoreSubpage;
use App\Http\Requests\UpdateSubpage;
use App\Subpage;

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

    public function store(StoreSubpage $request)
    {
        $validated = $request->validated();

        $subpage = new Subpage();
        $subpage->fill($validated);
        $subpage->save();

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->route('subpage.index');
        }

        return redirect()->route('subpage.edit', $subpage->id);

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
