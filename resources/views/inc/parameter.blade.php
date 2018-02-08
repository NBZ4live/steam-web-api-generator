<tr>
    <td>{{ $parameter->name }}</td>
    <td>{{ $parameter->type }}</td>
    <td>
        @if($parameter->optional)
            <i class="glyphicon glyphicon-ok text-success"></i>
        @else
            <i class="glyphicon glyphicon-remove text-danger"></i>
        @endif
    </td>
    <td>
        @if(!empty($parameter->description))
            {{ $parameter->description }}
        @else
            This parameter has no listed description.
        @endif
    </td>
</tr>