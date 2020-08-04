<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
    <img src="https://firebasestorage.googleapis.com/v0/b/angular-b18c2.appspot.com/o/Logo-csi.svg?alt=media&token=6da0ba85-8c28-4250-b976-4eeafe7dc066" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
