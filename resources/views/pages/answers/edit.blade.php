@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Answer</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="/answer/{{ $data->id }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Isi Jawaban:</label>
                            <input type="text" name="isi" class="form-control" value="{{ $data->isi }}">
                        </div>

                        <button type="submit" class="btn btn-secondary mb-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
