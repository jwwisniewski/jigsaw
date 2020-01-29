<h1>
    subpages
</h1>

@foreach ($subpages as $subpage)
     {{ $subpage->id }}, {{ $subpage->title }}
     - {!! link_to_route('subpage.edit', trans('ui.edit'), [$subpage->id]) !!}
     - {!! link_to_route('subpage.destroy', trans('ui.destroy'), [$subpage->id]) !!}
    <br>
@endforeach

