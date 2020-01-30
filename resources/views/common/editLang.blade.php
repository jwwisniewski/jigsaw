{!! Form::open(['url' => request()->path(), 'method' => 'get']) !!}
    {!! Form::select('edit-lang', config('jigsaw.availableClientLocales'), request()->get('edit-lang', config('jigsaw.defaultClientLocale')), ['onchange' => 'this.form.submit();', 'disabled' => $disabled ?? false]) !!}
{!! Form::close() !!}
