<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://xn--80ajlddcoceflnu7byb2cp.xn--p1ai/wp-content/uploads/photo.png" alt="ВСоШ">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
