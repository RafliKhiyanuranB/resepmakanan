@extends('template-admin')
@section('content')
    <section>
        <div class="container">
            <a href="{{ route('recipe.create') }}" class="btn btn-success mb-3">Create Recipes</a>
            <div class="row">
                @foreach ($recipes as $recipe)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <a href="{{ route('recipe.edit', $recipe->id) }}" class="btn btn-warning mb-3 me-2">Update</a>

                                    <form class="me-2" onsubmit="return confirm('yakin ingin menghapus data ini?')"
                                        action="{{ route('recipe.destroy', $recipe->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger mb-3">Delete</button>
                                    </form>

                                    <a class="btn btn-primary mb-3 me-2" onclick="show({{$recipe->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Detail
                                    </a>
                                </div>
                                <img src="{{ asset($recipe->photo) }}" class="w-100">
                                <h5>{{ $recipe->title }}</h5>
                                <p>{{ $recipe->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="suangar" class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function show(id) {
            $.ajax(`/recipe/${id}`).then(e => {
                $('#suangar').html(e)
            })
        }
    </script>
@endsection
