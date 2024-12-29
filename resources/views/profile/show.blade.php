<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="flex gap-x-2 justify-around w-full mx-auto dark:bg-gray-950 bg-white  rounded-md shadow-lg p-5">
                <div class="flex gap-x-2">
                    <div class="flex-shrink-0">
                        <img
                        class="h-24 w-24 rounded-full mx-auto object-cover"
                        src="{{ $user->avatar }}"
                        alt="profile woman" />
                    </div>
                    <div class="py-3">
                        <a href="/guleria_sid/" class="text-4xl font-semibold dark:text-gray-100 text-gray-900 font-Roboto tracking-widest">{{ $user->username }}</a>
                        <p class="text-xl dark:text-gray-100 text-gray-900 font-poppins font-semibold leading-6 whitespace-nowrap">{{ $user->name }}</p>
                    </div>
                </div>
                <div class="flex flex-col gap-x-2 mt-3 gap-y-5">
                    @if(Auth::id() !== $user->id)
                    @if($isFollowing)
                        {{-- Option to unfollow --}}
                        <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            <x-danger-button>{{ __('Unfollow') }}</x-danger-button>
                        </form>
                    @elseif($isFollowPending)
                        {{-- Follow request is pending --}}
                        <p>Follow request pending...</p>
                    @elseif($notificationId)
                        {{-- Accept or reject follow request --}}
                        <form action="{{ route('accept-follow', ['notificationId' => $notificationId]) }}" method="POST">
                            @csrf
                            <x-primary-button>{{ __('Accept Follow Request') }}</x-primary-button>
                        </form>
                        <form action="{{ route('reject-follow', ['notificationId' => $notificationId]) }}" method="POST">
                            @csrf
                            <x-danger-button>{{ __('Reject Follow Request') }}</x-danger-button>
                        </form>
                    @elseif($canFollowBack)
                        {{-- Follow back --}}
                        <form action="{{ route('follow-back', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            <x-primary-button>{{ __('Follow Back') }}</x-primary-button>
                        </form>
                    @else
                        {{-- Follow --}}
                        <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            <x-primary-button>{{ __('Follow') }}</x-primary-button>
                        </form>
                    @endif
                @endif
                @if($privacy->profile_visibility == "1")
                <p class="text-xl dark:text-gray-100 text-gray-900 font-poppins font-semibold leading-6 whitespace-nowrap">Profile is public.</p>
            @else
                <p class="text-xl dark:text-gray-100 text-gray-900 font-poppins font-semibold leading-6 whitespace-nowrap">Profile is private.</p>
            @endif
                </div>
            </div>
           
        </div>
       <div class="max-w-7xl mx-auto p-4">
        @if($privacy->profile_visibility == "1")
        <p class="text-xl dark:text-gray-100 text-gray-900 font-poppins font-semibold leading-6 whitespace-nowrap">Profile is public.</p>
    @else
    @if($isFollowing)
        <p class="text-xl dark:text-gray-100 text-gray-900 font-poppins font-semibold leading-6 whitespace-nowrap">posts is private.</p>
   @endif
        @endif
       </div>
      
    </div>
</x-app-layout>
