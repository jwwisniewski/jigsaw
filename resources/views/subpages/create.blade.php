<h1>
    create
</h1>

@include('common.errors')
@include('common.editLang', ['disabled' => true])

{!! Form::open(['route' => ['subpage.store']]) !!}

{!! Form::text('title') !!} <br>
{!! Form::textarea('contents') !!} <br>

{!! Form::submit(__('ui.save-and-continue'), ['name' => \App\Enum\SaveMode::SAVE_AND_CONTINUE]) !!}
{!! Form::submit(__('ui.save-and-return'), ['name' => \App\Enum\SaveMode::SAVE_AND_RETURN]) !!}
{!! Form::button(__('ui.cancel'), ['onclick' => new Illuminate\Support\HtmlString("window.location.href='" . route('subpage.index') . "'")]) !!}

{!! Form::hidden('edit-lang', request()->get('edit-lang', config('jigsaw.defaultClientLocale'))) !!}
{!! Form::close() !!}


