<div>
    @if ($isFollowing)
        <button
            class="bg-red-500 text-white px-4 py-2 rounded"
            onclick="event.preventDefault(); document.getElementById('unfollow-form-{{ $user->id }}').submit();"
        >
            Unfollow
        </button>
        <form id="unfollow-form-{{ $user->id }}" action="{{ route('unfollow', $user->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @elseif ($isPending)
        <button class="bg-gray-500 text-white px-4 py-2 rounded" disabled>
            Request Pending
        </button>
    @else
        <button
            class="bg-blue-500 text-white px-4 py-2 rounded"
            onclick="event.preventDefault(); document.getElementById('follow-form-{{ $user->id }}').submit();"
        >
            Follow
        </button>
        <form id="follow-form-{{ $user->id }}" action="{{ route('follow', $user->id) }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endif
</div>
