<section class="perusahaan">
    <div class="perusahaan-headings">
        <h1 class="perusahaan-heading">Perusahaan</h1>
        <p class="perusahaan-description">Kami bermitra dengan perusahaan-perusahaan yang berperan dalam memajukan karier lulusan kami, menciptakan peluang pertumbuhan profesional yang menjanjikan.</p>
    </div>
    <div class="perusahaan-mitra">
        @foreach ($companies as $item => $company)
            <img src="{{ asset('images/upload/' . $company->image) }}" alt="{{ $company->name }}" class="mitra-item" />
        @endforeach
    </div>
</section>