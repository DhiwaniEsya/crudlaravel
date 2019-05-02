@include('header')
<div class="container">
    <h1>Tambah Buku</h1>
    <div class="card-body">
        <form action="{{ route('buku.store') }}" method="post">
        {{ csrf_field() }}
            <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" required />
            </div>
            <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control" name="penerbit" required/>
            </div>
            <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="text" class="form-control" name="tahun_terbit" required/>
            </div>
            <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input type="text" class="form-control" name="pengarang" required/><br/>
            <input type="submit" class="btn btn-primary" value="Simpan Data">
            <a href="/" class="btn btn-outline-danger"> Kembali</a><br/>
            </div>
        </form>
    </div>
</div>
@include('footer')