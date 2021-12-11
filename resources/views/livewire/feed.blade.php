<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-600 shadow">
                <table class="divide-y divide-green-400 ">
                    <thead class="bg-gray-400">
                        <tr>
                            <th class="px-6 py-2 text-xs">
                                Title
                            </th>
                            <th class="px-6 py-2 text-xs">
                                Publisher
                            </th>
                            <th class="px-6 py-2 text-xs">
                                Type
                            </th>
                            <th class="px-6 py-2 text-xs">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500 divide-y divide-gray-300">
                        @if(!empty($liveStreams))
                            @foreach ($liveStreams as $liveStream)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4">
                                        {{$liveStream->title}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$liveStream->publisher}}
                                    </td>
                                    <td class="px-6 py-4">
                                        Live Stream
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="btn-primary" href="{{ route('watch.live', ['liveStream' => json_encode($liveStream)]) }}">Watch</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
