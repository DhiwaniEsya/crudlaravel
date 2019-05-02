@include('header')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}  
</div><br />
@endif
<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">JUDUL</th>
                    <th scope="col">PENERBIT</th>
                    <th scope="col">TAHUN TERBIT</th>
                    <th scope="col">PENGARANG</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @if(count($buku) > 0)
                    @foreach($buku->all() as $b)
                        <tr class="table-light text-center">
                            <td>{{$b->id}}</td>
                            <td>{{$b->judul}}</td>
                            <td>{{$b->penerbit}}</td>
                            <td>{{$b->tahun_terbit}}</td>
                            <td>{{$b->pengarang}}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <!-- <div class="col-2"> -->
                                        <a href="{{ route('buku.edit',$b->id)}}" class="btn btn-outline-info">UPDATE</a>
                                    <!-- </div> -->
                                    <!-- <div class="col-2"> -->
                                        <form action="{{ route('buku.destroy', $b->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                                        </form>
                                    <!-- </div> -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@include('footer')