<img src="{{ asset($recipe->photo) }}" class="w-100">
<h5>{{ $recipe->title }}</h5>
<p>{{ $recipe->description }}</p>
<hr>
<h6>Bahan</h6>
<div>
    {!! $recipe->bahan !!}
</div>
<hr>
<h6>Tata Cara</h6>
<div>
    {!! $recipe->cara !!}
</div>
