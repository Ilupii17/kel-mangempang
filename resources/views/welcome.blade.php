<x-layouts.app :settings="$settings">
    <x-hero :settings="$settings" :ringkasanStats="$ringkasanStats" />
    <x-statistik :ringkasanStats="$ringkasanStats" :settings="$settings" />
    <x-profil :settings="$settings" :misiList="$misiList" />
    <x-berita :beritaTerbaru="$beritaTerbaru" />
    <x-data-kelurahan :dataPenduduk="$dataPenduduk" :dataPendidikan="$dataPendidikan" :dataPekerjaan="$dataPekerjaan" :dataUmkm="$dataUmkm" />
    <x-galeri :galeris="$galeris" />
    <x-kontak :settings="$settings" />
</x-layouts.app>