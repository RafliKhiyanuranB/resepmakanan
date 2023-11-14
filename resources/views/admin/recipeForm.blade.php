@extends('template-admin')
@section('content')

    <section class="mt-3">
        <div class="container">

            <form action="{{route('recipe.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="title" class="form-label">Judul Masakan</label>
                    <input name="title" type="text" class="form-control">
                </div>

                <div>
                    <label for="title" class="form-label">Foto</label>
                    <input name="photo" type="file" class="form-control">
                </div>

                <div>
                    <label for="title" class="form-label">Description</label>
                    <input name="description" type="text" class="form-control">
                </div>

                <div>
                    <label for="title" class="form-label">Bahan</label>
                    <textarea name="bahan" id="bahan" type="text" class="form-control"></textarea>
                </div>

                <div>
                    <label for="title" class="form-label">Tata Cara</label>
                    <textarea name="cara" id="cara" type="text" class="form-control"></textarea>
                </div>


                <button class="btn btn-success">Create</button>
            </form>
        </div>
    </section>
@endsection