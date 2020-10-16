@if(count($marks)>0)
<table>
    <th>Adm </th>
    <th>Cat</th>
    <th>&nbsp; End</th>
    <tbody>
    @foreach($marks as $mark)
    <tr>
    <td>{{$mark->markable->admission_number.' '}}</td>
    <td>&nbsp;{{$mark->cat}}</td>
    <td>&nbsp;{{$mark->endterm}}</td>
    </tr>
    @endforeach
</tbody>
</table>
@else
<p>Marks Not Entered!</p>
@endif 
</table>
