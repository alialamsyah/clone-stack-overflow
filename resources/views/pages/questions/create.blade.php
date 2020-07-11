@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Pertanyaan</h4>
                    </div>

                    <div class="card-body">
                        <form method='POST' action='/question'>
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Judul:</label>
                                <input type="text" name='judul' class="form-control" id="formGroupExampleInput">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Isi Pertanyaan:</label>
                                <textarea type="text" name='isi' class="form-control" rows="5"
                                    id="formGroupExampleInput"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags:</label>
                                <input type="text" name='tags' class="form-control" id="tags" placeholder="tags">
                            </div>
                            <button type="submit" class="btn btn-secondary">Submit</button>
                            <!-- <a href="/daftar" class="btn btn-info" role="button">Submit</a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection