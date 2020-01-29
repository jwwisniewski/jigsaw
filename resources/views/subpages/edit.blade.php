<h1>
    edit
</h1>

{!! Form::model($subpage, ['route' => ['subpage.update', $subpage->id]]) !!}
{!! Form::text('title') !!}
{!! Form::textarea('contents') !!}
{!! Form::submit(trans('ui.save-and-continue'), ['name' => \App\Enum\SaveMode::SAVE_AND_CONTINUE]) !!}
{!! Form::submit(trans('ui.save-and-return'), ['name' => \App\Enum\SaveMode::SAVE_AND_RETURN]) !!}
{!! Form::close() !!}


