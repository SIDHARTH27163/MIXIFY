<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Enble Two-factor authentication onyour account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account has Two-factor authentication to stay secure.') }}
        </p>
    </header>
        @if (auth()->user()->two_factor_secret)
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('Two-factor authentication is enabled on your account.') }}</p>

        <form class="my-5" method="POST" action="{{ url('user/two-factor-authentication') }}">
            @csrf
            @method('DELETE')

            <x-danger-button class="ms-3">

                {{ __(' Disable 2FA 2FA') }}
            </x-danger-button>
        </form>

        @if (session('status') == 'two-factor-authentication-enabled')
            <div class="text-gray-900 dark:text-gray-100">
                <p>{{ __('Two-factor authentication is now enabled. Please scan the following QR code using your authenticator app.') }}</p>
                {!! auth()->user()->twoFactorQrCodeSvg() !!}
            </div>
        @endif

        <h3 class="text-gray-900 dark:text-gray-100 my-2  text-xl">Recovery Codes</h3>
        <ul class="text-gray-900 dark:text-gray-100 my-2">
            @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                <li>{{ $code }}</li>
            @endforeach
        </ul>
    @else
        <form class="my-5" method="POST" action="{{ url('user/two-factor-authentication') }}">
            @csrf


            <x-primary-button>
                {{ __('Enable 2FA') }}
            </x-primary-button>
        </form>
    @endif
          
</section>