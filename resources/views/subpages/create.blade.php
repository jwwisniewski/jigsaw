<h1>
    create
</h1>

{!! Form::open(['route' => 'subpage.store']) !!}
{!! Form::text('title') !!}
{!! Form::textarea('contents') !!}
{!! Form::submit(trans('ui.save')) !!}
{!! Form::close() !!}



