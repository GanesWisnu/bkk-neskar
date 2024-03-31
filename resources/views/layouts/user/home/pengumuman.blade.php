<section class="pengumuman">
    <div class="pengumuman-illustration">
        <img class="illustration-person_pengumuman" src="{{ asset('images/person_lowongan.png') }}" />
        <div class="illustration-background_arch"></div>
    </div>
    <div class="pengumuman-info">
        <h1 class="pengumuman-heading">Pengumuman Lowongan</h1>
        <p class="pengumuman-description" style="margin-bottom: 1.4em">Sudah pernah melamar disini? Lihat info pengumuman dari lowongan yang sudah kamu lamar</p>
        <x-forms.button variant="primary" size="md" onclick="window.location='{{ route('user.pengumuman') }}'">Lihat Pengumuman</x-forms.button>
    </div>
</section>