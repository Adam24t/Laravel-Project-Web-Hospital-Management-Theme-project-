<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Diagnosa</title>

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
            <div class="row align-items-center">
            <h1 class='m-3 col' style="font-size: 36px">Daftar Diagnosa</h1>
            <button type="button" data-bs-toggle="modal" data-bs-target="#myModal" id="create-form" class="btn col-auto btn-sm h-25 w-23 text-nowrap"style="background-color: #5F8D4E;color:white">
            <i class="bi bi-person-fill-add mr-2"></i>
            Tambah Baru</button>
            </div>
            <div>
            @csrf
                @livewire('diagnosa-table-view')
            </div>
              <script>
              Livewire.onPageExpired((response, message) => {
	location.reload()
})
            </script>
          </section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah diagnosa baru</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
</button>
      </div>
      <div class="modal-body">
        <form class="container-fluid" method="post" action="{{route('diagnosa.add')}}">
          @csrf
          <div class="row">
            <div class="form-group col">
              <label for="Tanggal_Diagnosa">Tanggal Diagnosa</label>
              <input type="date" class="form-control" id="Tanggal_Diagnosa" name="Tanggal_Diagnosa"/>
            </div>
            <div class="form-group col">
              <label for="Nama_Diagnosa">Nama Diagnosa</label>
              <input type="text" class="form-control" id="Nama_Diagnosa" name="Nama_Diagnosa"/>
            </div>
          </div>
          <div class="row mt-3">
            <div class="form-group col">
              <label for="Deskripsi_Diagnosa">Deskripsi Diagnosa</label>
              <input type="text" class="form-control" id="Deskripsi_Diagnosa" name="Deskripsi_Diagnosa"/>
            </div>
            <div class="form-group col">
              <label for="Tindakan_Medis_Yang_Dibutuhkan">Tindakan Medis Yang Dibutuhkan</label>
              <input type="text" class="form-control" id="Tindakan_Medis_Yang_Dibutuhkan" name="Tindakan_Medis_Yang_Dibutuhkan"/>
            </div>
          </div>
          <div class="row mt-3">
            <div class="form-group col">
              <label for="ID_Obat">Obat</label>
              <select name="ID_Obat" id="ID_Obat" class="form-control">
                @foreach($obat as $ID => $Nama_Obat)
                    <option value="{{ $ID }}">{{ $ID }}. {{ $Nama_Obat }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col">
              <label for="Jumlah_Obat">Jumlah Obat</label>
              <input type="number" id="Jumlah_Obat" name="Jumlah_Obat" class="form-control"/>
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
