<div class="bg-gray-800 rounded-md">
    <div class="grid gap-2 grid-cols-1 grid-rows-5">
        <div class="row-span-1">
            <div class="flex justify-center">
                <span class="text-lg">Stream Chat - {{$channel}}</span>
            </div>
        </div>
        <div class="row-span-2">
            <div class="grid gap-2 grid-cols-1 grid-rows-2">
                <div class="flex justify-evenly">
                    <span class="align-self-center">Nickname:</span>
                    <input class="dark:bg-black h-6 w-28" wire:model="nickname" type="text">
                </div>
                <div class="flex justify-around">
                    <button class="btn-primary" wire:click="setNickname">Set Nickname</button>
                    <button class="btn-primary" wire:click="startChat">Connect</button>
                </div>
            </div>
        </div>
        <div class="row-span-2">
            <div class="grid gap-2 grid-cols-1 grid-rows-2">
                <textarea class="dark:bg-black" readonly>{{ $chatTextarea }}</textarea>
                <div class="grid gap-1 grid-cols-1 grid-rows-4">
                    <div class="row-span-2">
                        <input class="dark:bg-black" wire:model="msgBox" type="text">
                    </div>
                    <div class="row-span-1">
                        <button class="btn-primary" wire:click="sendMsg">Send</button>
                    </div>
                    <div class="row-span-1">
                        <button class="btn-primary" wire:click="clearChat">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
