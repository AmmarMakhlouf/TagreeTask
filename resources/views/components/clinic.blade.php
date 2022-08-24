<tr {!! $attributes !!}>
    <td class="border px-4 py-2">Clinic #{{ $clinic->id }}</td>
    <td class="border px-4 py-2 w-1/2">
        <p>{{ $clinic->name }}</p>
        <p class="text-xs">{{ $clinic->name }}</p>
    </td>
    <td class="border px-4 py-2">{{ count($clinic->services) }} {{ Str::plural('Service', count($clinic->services)) }}</td>
</tr>