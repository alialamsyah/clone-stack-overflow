@extends('layouts.master')

@push('style')
<link rel="stylesheet" href="{{ asset('/sbadmin2/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/sbadmin2/vendor/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Pertanyaan</h4>
                    </div>
                    <div class="card-body">
                        <div><a href="/question/create" class="btn btn-secondary" role="button">Create</a></div>
                        <br />
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Judul</th>
                                    <th scope="col" class="text-center">Isi Pertanyaan</th>
                                    <th scope="col" class="text-center">Tags</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>
                                @foreach($data as $data)
                                    <?php $no++ ;?>
                                    <tr>
                                        <td class="text-center">{{ $no }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ $data->isi }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td class="text-center">
                                            <a href="/question/{{ $data->id }}"><button>Detail</button></a>
                                            @if ($data->id == Auth::user()->id)
                                                <a href="/question/{{ $data->id }}/edit"><button>Update</button></a>
                                                <form action="/question/{{$data->id}}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">delete</button></a>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('/sbadmin2/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/sbadmin2/vendor/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable();
    });
  </script>
@endpush