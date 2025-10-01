<div class="min-w-16 w-auto">
    <form action="{{ route($updateRouteName) }}" method="POST">
        @csrf

        <select name="locale" onchange="this.form.submit()"
            class="  bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            @foreach ($supportedLanguages as $code => $name)
                <option value="{{ $code }}" {{ $code == $currentLanguage ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>

    </form>

</div>
