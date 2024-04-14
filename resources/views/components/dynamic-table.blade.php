
@php
    $models = collect($models);
    $firstItem = $models->first();
    $headers = $firstItem ? array_keys(get_object_vars($firstItem)) : [];
@endphp

@if($firstItem)
<table class="min-w-full leading-normal">
    <thead>
        <tr>
            @foreach ($headers as $header)
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    {{ ucfirst(str_replace('_', ' ', $header)) }}
                </th>
            @endforeach
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $model)
            <tr>
                @foreach ($headers as $header)
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $model->$header }}
                    </td>
                @endforeach
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    @foreach ($actions as $action)
                        @if($action['type'] === 'link')
                        <a href="{{ route($action['route'], $model->id) }}" class="{{ $action['class'] }}">{{ $action['label'] }}</a>
                        @elseif($action['type'] === 'form')
                            <form action="{{ route($action['route'], $model->id) }}" method="POST">
                                @csrf
                                @method($action['method'])
                                <button type="submit" class="{{ $action['class'] }}">{{ $action['label'] }}</button>
                            </form>
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
@if($total_pages > 1)
    @for($i = 1; $i <= $total_pages; $i++)
        <a href="{{ route('authors', ['page' => $i]) }}"
        @if($i == $current_page)
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded shadow"
        @else
            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
        @endif
        >
            {{ $i }}
        </a>
    @endfor
@endif
