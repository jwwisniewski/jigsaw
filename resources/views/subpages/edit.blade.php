<html>
<head>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
</head>
<body>
<h1>
    edit
</h1>

@include('common.errors')
@include('common.editLang')

{!! Form::model($subpage, ['route' => ['subpage.update', $subpage->id]]) !!}

    {!! Form::text('title') !!} <br>
    {!! Form::textarea('contents', null, ['id' => 'editor']) !!} <br>

    {!! Form::submit(__('ui.save-and-continue'), ['name' => \App\Enum\SaveMode::SAVE_AND_CONTINUE]) !!}
    {!! Form::submit(__('ui.save-and-return'), ['name' => \App\Enum\SaveMode::SAVE_AND_RETURN]) !!}
    {!! Form::button(__('ui.cancel'), ['onclick' => new Illuminate\Support\HtmlString("window.location.href='" . base64_decode(request()->get('return-path')) . "'")]) !!}

    {!! Form::hidden('edit-lang', request()->get('edit-lang', config('jigsaw.defaultClientLocale'))) !!}
    {!! Form::hidden('return-path', request()->get('return-path')) !!}

{!! Form::close() !!}


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>