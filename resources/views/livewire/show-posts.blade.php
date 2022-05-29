<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">


        <x-table>  

            <div class="px-6 py-4 flex items-center">
               {{--<input type="text" wire:model="search">--}}
               <x-jet-input class="flex-1 mr-4" placeholder="Escriba lo que quiere buscar" type="text" wire:model="search" />
            
                @livewire('create-post')
            
            </div>
            @if($posts->count())

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="w-24 cursor-pointer px-6 py-3"
                                wire:click="order('id')">
                                ID

                                {{-- Sort --}} 
                                @if ($sort =='id')

                                    @if($direction== 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                    
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif



                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-3"
                                wire:click="order('title')">
                                Title

                                {{-- Sort --}} 
                                @if ($sort =='title')

                                    @if($direction== 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif



                                    
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif


                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-3"
                                wire:click="order('content')">
                                Content

                                {{-- Sort --}} 
                                @if ($sort =='content')

                                    @if($direction== 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                    
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                        </tr>
                    <thead class="bg-gray-50">
                    </thead>
                    
                    <tbody classs="bg-white divide-y divide-gray-200">
                        @foreach ($posts as $post)
                            <tr>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{$post->id}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$post->title}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$post->content}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @livewire('edit-post', ['post' => $post], key($post->id))
                                    </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No existe ningun registro coincidente
                </div>
            @endif

        </x-table>

    </div>
</div>
