<tr {!! $attributes !!}>
    <td class="border px-4 py-2">Service #{{ $service->id }}</td>
    <td class="border px-4 py-2 w-1/2">
        <p>{{ $service->name  }}</p>
        <p class="text-xs">{{ $service->name }}</p>
    </td>
    <td class="border px-4 py-2">{{ count($service->clinics) }} {{ Str::plural('Clinic', count($service->clinics)) }},<br/>
            {{ count($service->doctors) }} {{ Str::plural('Doctor', count($service->doctors)) }}
        </td>
    
</tr>