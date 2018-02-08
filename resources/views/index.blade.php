@component('layout')
<div class="container">
    <div class="col-md-9">
        @foreach($interfaces as $interface)
            <h2 id="{{ $interface->name }}">{{ $interface->name }}</h2>
            @foreach($interface->methods as $method)
                @include('inc.method')
            @endforeach
        @endforeach
    </div>
    <div class="col-md-3" role="complementary">
        <nav class="hidden-print hidden-sm hidden-xs" id="toc" data-toggle="toc"></nav>
    </div>
</div>
@endcomponent