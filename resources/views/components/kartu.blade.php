@props(['judul' => 'Tanpa Judul'])

<div class="kartu">
    <h3>{{ $judul }}</h3>

    <div class="isi">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="kaki">
            {{ $footer }}
        </div>
    @endisset
</div>