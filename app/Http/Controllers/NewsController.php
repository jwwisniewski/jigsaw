<?php

namespace App\Http\Controllers;

use App\Enum\SaveMode;
use App\Http\Requests\StoreNews;
use App\Http\Requests\UpdateNews;
use App\Instance;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('news.index', ['newsList' => $news]);
    }

    public function create()
    {
        $instances = Instance::whereModule(News::class)->get()->mapWithKeys(static function (Instance $instance) {
            return [$instance->id => $instance->title];
        });

        return view('news.create', compact('instances'));
    }

    public function store(StoreNews $request)
    {
        $validated = $request->validated();
        if($validated['url'] === null) {
            $validated['url'] = $validated['title'];
        }
        $validated['url'] = Str::slug($validated['url']);

        $subpage = new News();
        $subpage->fill($validated);
        $subpage->save();

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('news.edit', [
            $subpage->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);
    }

    public function edit(News $news)
    {
        $instances = Instance::whereModule(News::class)->get()->mapWithKeys(static function (Instance $instance) {
            return [$instance->id => $instance->title];
        });

        return view('news.edit', compact('news', 'instances'));
    }

    public function update(UpdateNews $request, News $news)
    {
        $validated = $request->validated();
        if($validated['url'] === null) {
            $validated['url'] = $validated['title'];
        }
        $validated['url'] = Str::slug($validated['url']);

        $news->update($validated);

        if ($request->has(SaveMode::SAVE_AND_RETURN)) {
            return redirect()->to(base64_decode($request->get('returnPath')));
        }

        return redirect()->route('news.edit', [
            $news->id,
            'editLang' => $request->get('editLang'),
            'returnPath' => $request->get('returnPath'),
        ]);
    }

    public function destroy(News $news, Request $request)
    {
        $news->delete();

        return redirect()->to(base64_decode($request->get('returnPath')));
    }
}
