<html>
<head>
</head>
<body>

<h1>
    edit
</h1>

@include('common.errors')
@include('common.editLang')

{!! Form::model($instance, ['route' => ['instance.update', $instance->id]]) !!}

    module - {!! Form::select('module', $modules, null, ['disabled']) !!} <br>
    title - {!! Form::text('title') !!} <br>
    url - {!! Form::text('url') !!} <br>
    kw - {!! Form::text('keywords') !!} <br>
    descr - {!! Form::textarea('description') !!} <br>

    {!! Form::submit(__('ui.saveAndContinue'), ['name' => \App\Enum\SaveMode::SAVE_AND_CONTINUE]) !!}
    {!! Form::submit(__('ui.saveAndReturn'), ['name' => \App\Enum\SaveMode::SAVE_AND_RETURN]) !!}
    {!! Form::button(__('ui.cancel'), ['onclick' => new Illuminate\Support\HtmlString("window.location.href='" . base64_decode(request()->get('returnPath')) . "'")]) !!}

    {!! Form::hidden('editLang', request()->get('editLang', config('jigsaw.defaultClientLocale'))) !!}
    {!! Form::hidden('returnPath', request()->get('returnPath')) !!}
{!! Form::close() !!}


</body>
</html>