<x-app-layout>
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-12">
        
        @auth
        @php
        auth()->user()->add('5', 'usd', 'no reason', '[]');
        
        @endphp
        @endauth
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('faucet')
            @livewire('modals.promocode')
            <div>
                <div class="containter mx-auto mt-10 px-20 pulse">
                    <div class="bg-component p-8 rounded-component shadow-sm relative hover:shadow-lg transition duration-500">
                        <h1 class="text-2xl text-default font-semibold mb-3">Promocode</h1>
                        <p class="text-defaultsoft leading-6 tracking-normal">Every 10 minutes you are able to use a promocode, distributed on our social channels.</p>
                        <button  onclick="$openModal('promocode')" class="py-2 px-4 mt-8 bg-primarysoft text-white rounded-md shadow-xl">Use Promocode</button>
                    </div>
                </div>
            </div>

            @livewire('modals.rakeback')

            <div>
                <div class="containter mx-auto mt-10 px-20 pulse">
                    <div class="bg-component p-8 rounded-component shadow-sm relative hover:shadow-lg transition duration-500">
                        <h1 class="text-2xl text-default font-semibold mb-3">VIP Benefits</h1>
                        <p class="text-defaultsoft leading-6 tracking-normal">Simply by playing, you unlock VIP benefits. @auth Your VIP level is currently at <span class="text-primary font-semibold">level {{ auth()->user()->viplevel }}</span>. @endauth</p>
                        <br>
                        <p class="text-defaultsoft leading-6 tracking-normal">Be it increased rakeback, chance to win jackpot and not to forget <span class="text-primary font-md">every VIP level-up you receive a bunch of free spins.</span></p>
                        <div class="flex flex-col mt-5">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        VIP Level
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Rakeback
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Promocode
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Faucet
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Jackpot
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Free Spins
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach(\App\Models\VIP\VipLevels::orderBy('level', 'asc')->get() as $viplevel)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $viplevel->level }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-500">+{{ ($viplevel->rake_percent / 100) }}%</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-500">+{{ ($viplevel->promocode_bonus) }}%</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-500">+{{ ($viplevel->faucet_bonus) }}%</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-500">+{{ ($viplevel->jackpot_bonus) }}%</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-primary">{{ ($viplevel->fs_bonus) }} FS</div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>