<h1>
    subpages
</h1>

<p>
    {!! link_to_route('subpage.create', __('ui.create'), ['returnPath' => base64_encode(request()->fullUrl())]) !!}
</p>

@foreach ($subpageList as $subpage)
     {{ $subpage->id }}, {{ $subpage->title }}
     - {!! link_to_route('subpage.edit', __('ui.edit'), [$subpage->id, 'returnPath' => base64_encode(request()->fullUrl())]) !!}
     - {!! link_to_route('subpage.destroy', __('ui.destroy'), [$subpage->id, 'returnPath' => base64_encode(request()->fullUrl())]) !!}
    <br>
@endforeach

