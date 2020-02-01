<?php

namespace App\Http\Controllers;

use App\Enum\SaveMode;
use App\Http\Requests\StoreSubpage;
use App\Http\Requests\UpdateSubpage;
use App\Subpage;
use Illuminate\Http\Request;

class SubpageController extends Controller
{
    public function index()
    {
        $subpages = Subpage::all();

        return view('subpage.index', ['subpageList' => $subpages]);
    }

    public function create()
    {
        return view('subpage.create');
    }

    public function store(StoreSubpage $request)
    {
        $validated = $request->validated();

        $subpage = new Subpage();
        $subpage->fill($validated);
        $subpage->save();

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('subpage.edit', [
            $subpage->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);

    }

    public function edit(Subpage $subpage)
    {
        return view('subpage.edit', compact('subpage'));
    }

    public function update(UpdateSubpage $request, Subpage $subpage)
    {
        $validated = $request->validated();
        $subpage->update($validated);

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('subpage.edit', [
            $subpage->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);
    }

    public function destroy(Subpage $subpage, Request $request)
    {
        $subpage->delete();

        return redirect()->to(base64_decode($request->get('returnPath')));
    }
}
