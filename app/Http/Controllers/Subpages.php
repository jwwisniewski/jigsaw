<?php

namespace App\Http\Controllers;

use App\Enum\SaveMode;
use App\Http\Requests\StoreSubpage;
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

    public function store(StoreSubpage $request)
    {
        $validated = $request->validated();

        $subpage = new Subpage();
        $subpage->fill($validated);
        $subpage->save();

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('return-path')));
        }

        return redirect()->route('subpage.edit', [
            $subpage->id,
            'edit-lang' => $request->get('edit-lang'),
            'return-path' => $request->get('return-path'),
        ]);

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
            return redirect()->to(base64_decode($request->get('return-path')));
        }

        return redirect()->route('subpage.edit', [
            $subpage->id,
            'edit-lang' => $request->get('edit-lang'),
            'return-path' => $request->get('return-path'),
        ]);
    }

    public function destroy(Subpage $subpage, Request $request)
    {
        $subpage->delete();

        return redirect()->to(base64_decode($request->get('return-path')));
    }
}
