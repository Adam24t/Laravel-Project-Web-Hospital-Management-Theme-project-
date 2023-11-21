<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Styles -->
        @laravelViewsStyles
        <style>
            li {
                list-style: none;
                margin: 20px 0 20px 0;
            }
        
            a {
                text-decoration: none;
            }
        
            .sidebar {
                width: 250px;
                height: 100vh;
                position: fixed;
                margin-left: -300px;
                transition: 0.4s;
            }
        
            .active-main-content {
                margin-left: 250px;
            }
        
            .active-sidebar {
                margin-left: 0;
            }
        
            #main-content {
                transition: 0.4s;
            }
        </style>
    </head>
    <body>
      @include('sidebar')
          <section class="p-4" id="main-content">
            <button class="btn P-4" id="button-toggle" style="color:white;background-color: #5F8D4E">
              <i class="bi bi-list"></i>
          </button>
          </section>
          <section class="container-fluid overflow-hidden p-5">
            <div class="row align-items-center gx-5">
            <h1 class='m-3 col' style="font-size: 36px">Daftar Dokter</h1>
            <div class='col-auto'>
              <button type="button" data-bs-toggle="modal" data-bs-target="#specModal" id="create-form" class="btn btn-sm h-25 w-23 text-nowrap"style="background-color: #5F8D4E;color:white">
                <i class="bi bi-plus mr-2"></i>
                Tambah Spesialisasi</button>
              <button type="button" data-bs-toggle="modal" data-bs-target="#myModal" id="create-form" class="btn btn-sm h-25 w-23 text-nowrap"style="background-color: #5F8D4E;color:white">
              <i class="bi bi-person-fill-add mr-2"></i>
              Tambah Baru</button>
            </div>
            </div>
            <div>
            @csrf
                @livewire('users-table-view')
            </div>
          </section>

<div class="modal fade" id="specModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah spesialisasi baru</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form class="container-fluid" method="post" action="{{route('spesialisasid.add')}}">
          @csrf
          <div class="row">
            <div class="form-group col">
              <label for="Bidang_Spesialisasi">Bidang Spesialisasi</label>
              <input type="text" class="form-control" id="Bidang_Spesialisasi" name="Bidang_Spesialisasi">
            </div>
          </div>
          <button type="submit" class="btn form-control mt-3"style="background-color: #5F8D4E;color:white">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah dokter baru</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form class="container-fluid" method="post" action="{{route('doctor.add')}}">
          @csrf
          <div class="row">
            <div class="form-group col">
              <label for="ID">NIP</label>
              <input type="text" class="form-control" id="ID" name="ID">
            </div>
            <div class="form-group col">
              <label for="Nama_Dokter">Nama Lengkap</label>
              <input type="text" class="form-control" id="Nama_Dokter" name="Nama_Dokter">
            </div>
          </div>
          <div class="row mt-3">
            <div class="form-group col">
              <label for="Tanggal_Lahir">Tanggal Lahir</label>
              <input type="date" class="form-control" id="Tanggal_Lahir" name="Tanggal_Lahir"/>
            </div>
            <div class="form-group col">
              <label for="Jenis_Kelamin">Jenis Kelamin</label>
              <select name="Jenis_Kelamin" id="Jenis_Kelamin" class="form-control">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="form-group col">
              <label for="Alamat">Alamat</label>
              <input type="text" class="form-control" id="Alamat" name="Alamat">
            </div>
            <div class="form-group col">
              <label for="No_HP">No. HP</label>
              <input type="text" id="No_HP" name="No_HP" class="form-control"
              placeholder="08xxxxxxxxxxx" pattern="[0-9]{10,13}">
            </div>
          </div>
          <div class="row mt-3">
            <div class="form-group col">
              <label for="ID_Spesialisasi">Bidang Spesialisasi</label>
              <select name="ID_Spesialisasi" id="ID_Spesialisasi" class="form-control">
                @foreach($spesialisasi as $ID => $Bidang_Spesialisasi)
                    <option value="{{ $ID }}">{{ $ID }}. {{ $Bidang_Spesialisasi }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <button type="submit" class="btn form-control mt-3"style="background-color: #5F8D4E;color:white">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah dokter baru</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form class="container-fluid" method="post" action="{{route('doctor.add')}}">
          @csrf
          <div class="row">
            <div class="form-group col">
              <label for="ID">NIP</label>
              <input type="text" class="form-control" id="ID" name="ID">
            </div>
            <div class="form-group col">
              <label for="Nama_Dokter">Nama Lengkap</label>
              <input type="text" class="form-control" id="Nama_Dokter" name="Nama_Dokter">
            </div>
          </div>
          <div class="row mt-3">
            <div class="form-group col">
              <label for="Tanggal_Lahir">Tanggal Lahir</label>
              <input type="date" class="form-control" id="Tanggal_Lahir" name="Tanggal_Lahir"/>
            </div>
            <div class="form-group col">
              <label for="Jenis_Kelamin">Jenis Kelamin</label>
              <select name="Jenis_Kelamin" id="Jenis_Kelamin" class="form-control">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="form-group col">
              <label for="Alamat">Alamat</label>
              <input type="text" class="form-control" id="Alamat" name="Alamat">
            </div>
            <div class="form-group col">
              <label for="No_HP">No. HP</label>
              <input type="text" id="No_HP" name="No_HP" class="form-control"
              placeholder="08xxxxxxxxxxx" pattern="[0-9]{10,13}">
            </div>
          </div>
          <div class="row mt-3">
            <div class="form-group col">
              <label for="ID_Spesialisasi">Bidang Spesialisasi</label>
              <select name="ID_Spesialisasi" id="ID_Spesialisasi" class="form-control">
                @foreach($spesialisasi as $ID => $Bidang_Spesialisasi)
                    <option value="{{ $ID }}">{{ $ID }}. {{ $Bidang_Spesialisasi }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <button type="submit" class="btn form-control mt-3"style="background-color: #5F8D4E;color:white">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
      @laravelViewsScripts
      <script>
        // event will be executed when the toggle-button is clicked
        document.getElementById("button-toggle").addEventListener("click", () => {
    
            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");
    
            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
    </body>
</html>
