<div class="mt-3 flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span class="ms-2 me-2 text-gray-700">{{ $locale_name }}</span>
        @else
            <a class="ms-1 underline ms-2 me-2" href="language/{{ $available_locale }}">
                <span>{{ $locale_name }}</span>
            </a>
        @endif
    @endforeach
</div>
