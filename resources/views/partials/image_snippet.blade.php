@if (Str::startsWith($travel->cover_image, 'https://'))
    <img width="100" src="{{ $travel->cover_image }}" alt="">
@else
    <img width="100" src="{{ asset('storage/' . $travel->cover_image) }}" alt="">
@endif
