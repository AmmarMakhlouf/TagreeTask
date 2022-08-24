<tr {!! $attributes !!}>
    <td class="border px-4 py-2">City #{{ $city->id }}</td>
    <td class="border px-4 py-2 w-1/2">
        <p>{{ $city->name }}</p>
        <p class="text-xs">{{ $city->name }}</p>
    </td>
    <td class="border px-4 py-2">{{ $city->clinics_count }} {{ Str::plural('clinic', $city->clinics_count) }}</td>
</tr>