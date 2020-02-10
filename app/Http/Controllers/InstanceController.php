<?php

namespace App\Http\Controllers;

use App\Enum\SaveMode;
use App\Http\Requests\StoreInstance;
use App\Http\Requests\UpdateInstance;
use App\Instance;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InstanceController extends Controller
{
    public function index()
    {
        $instanceList = Instance::all();

        return view('instance.index', ['instanceList' => $instanceList]);
    }

    public function create()
    {
        $modules = [
            null => 'choose...',
            News::class => 'News',
        ];

        return view('instance.create', compact('modules'));
    }

    public function store(StoreInstance $request)
    {
        $validated = $request->validated();
        if($validated['url'] === null) {
            $validated['url'] = $validated['title'];
        }
        $validated['url'] = Str::slug($validated['url']);

        $instance = new Instance();
        $instance->fill($validated);
        $instance->save();

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('instance.edit', [
            $instance->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);
    }

    public function edit(Instance $instance)
    {
        $modules = [
            null => 'choose...',
            News::class => 'News',
        ];

        return view('instance.edit', compact('instance', 'modules'));
    }

    public function update(UpdateInstance $request, Instance $instance)
    {
        $validated = $request->validated();
        if($validated['url'] === null) {
            $validated['url'] = $validated['title'];
        }
        $validated['url'] = Str::slug($validated['url'], '-', $request->get('editLang'));

        $instance->update($validated);

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('instance.edit', [
            $instance->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instance $instance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instance $instance, Request $request)
    {
        $instance->delete();

        return redirect()->to(base64_decode($request->get('returnPath')));

    }
}
