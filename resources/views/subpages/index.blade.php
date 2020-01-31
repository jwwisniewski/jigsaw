<h1>
    subpages
</h1>

<p>
    {!! link_to_route('subpage.create', __('ui.create'), ['return-path' => base64_encode(request()->fullUrl())]) !!}
</p>

@foreach ($subpages as $subpage)
     {{ $subpage->id }}, {{ $subpage->title }}
     - {!! link_to_route('subpage.edit', __('ui.edit'), [$subpage->id, 'return-path' => base64_encode(request()->fullUrl())]) !!}
     - {!! link_to_route('subpage.destroy', __('ui.destroy'), [$subpage->id, 'return-path' => base64_encode(request()->fullUrl())]) !!}
    <br>
@endforeach

