@if (Auth::user()->role_as == 'admin')


        <p>
            {{ $user->name }}
            {{ $user->middlename }}
            {{ $user->surname }}
            {{ $user->email }}
            {{ $user->phone}}
            {{ $user->position}}
            @if ($user->role_as == 'user')
            @foreach ($user->userd->skill as $value )
                <ul>
                    <li>
                        {{ $value ?? 'n/a' }}
                    </li>
                </ul>
            @endforeach
            @endif
        </p>

        @else
        hello
        @endif

