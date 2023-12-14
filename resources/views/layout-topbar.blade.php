<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true" class="scroll-smooth"
    @isset($html_tag_data)
    @foreach ($html_tag_data as $key => $value)
    data-{{ $key }}='{{ $value }}'
    @endforeach
@endisset>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ config('app.name') }} | {{ strtoupper($title) }}</title>
    <meta name="description" content="{{ $description }}" />
    @include('_layout.head')
</head>

<body>
    <section class="my-0 mx-auto min-h-full max-w-screen-sm">
        <div class="my-0 mx-auto min-h-screen max-w-480 overflow-x-hidden bg-[#f4f4f4] pb-[66px]">
            
                @yield('content')
            
        </div>
        @include('_layout.footer')
      </section>

    @include('_layout.modal_settings')
    @include('_layout.modal_search')
    @include('_layout.scripts-topbar')
</body>

</html>
