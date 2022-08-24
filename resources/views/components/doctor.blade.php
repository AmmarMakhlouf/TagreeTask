<tr {!! $attributes !!}>
    <td class="border px-4 py-2">Doctor #{{ $doctor->id }}</td>
    <td class="border px-4 py-2 w-1/2">
        <p>{{ $doctor->firstname.' '.$doctor->lastname  }}</p>
        <p class="text-xs">{{ $doctor->firstname.' '.$doctor->middlename.' '.$doctor->lastname }}</p>
    </td>
    <td class="border px-4 py-2">{{ count($doctor->services) }} {{ Str::plural('Service', count($doctor->services)) }}</td>
</tr>