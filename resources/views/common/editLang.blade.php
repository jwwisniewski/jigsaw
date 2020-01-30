{!! Form::open(['url' => request()->path(), 'method' => 'get']) !!}
    {!! Form::select('edit-lang', config('jigsaw.active-locales'), request()->get('edit-lang', \App::getLocale()), ['onchange' => 'this.form.submit();']) !!}
{!! Form::close() !!}
