<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Feed extends Component
{
    public function render()
    {
        $liveStreams = array();
        $inputStreams = json_decode(file_get_contents('http://' . env('RTMP_HOST') . ':' . env('RTMP_PORT') . '/api/streams'), true);

        if (!empty($inputStreams))
        {
            foreach ($inputStreams['live'] as $i)
            {
                $liveStream = (object)[
                    'title' => $i['publisher']['stream'] . '\'s live stream.',
                    'publisher' => $i['publisher']['stream']
                ];
                array_push($liveStreams, $liveStream);
            }
        }

        return view('livewire.feed', ['liveStreams' => $liveStreams])
            ->extends('layouts.app', ['page_title' => 'Albicant - Feed'])
            ->section('page_content');
    }
}
