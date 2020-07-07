@component('mail::table')
<table style="background-color: #00ffff; text-size: 2rem;">
    <tr style="color: black">
        <th>From </th>
        <th>Message </th>
    </tr>
    @foreach ($details as $items)
        @foreach ($items as $key => $value)
            <tr style="color: red">
                <td><b><i>{{$key}}</i></b></td>  
                <td><b><i>{{$value}}</i></b></td>
            </tr>
        @endforeach
    @endforeach
</table>
@endcomponent
