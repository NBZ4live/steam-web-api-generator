<div class="panel panel-default" id="{{ $interface->name . '_' . $method->name . '_' . $method->version }}">
    <div class="panel-heading">
        <h3 class="api-method-heading"><span class="text-muted">{{ $interface->name }}/</span>{{ $method->name }}</h3>
        <span class="label label-info">Version: {{ $method->version }}</span>
    </div>
    <div class="panel-body">
        <pre><span class="text-danger"><strong>{{ $method->httpmethod }}</strong></span> https://api.steampowered.com/{{ $interface->name }}/{{ $method->name }}/v{{ $method->version }}</pre>
    </div>
    @if(!empty($method->parameters))
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Required?</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($method->parameters as $parameter)
                @include('inc.parameter')
            @endforeach
            </tbody>
        </table>
    @else
        <div class="panel-body">
            This method has no listed parameters.
        </div>
    @endif
</div>