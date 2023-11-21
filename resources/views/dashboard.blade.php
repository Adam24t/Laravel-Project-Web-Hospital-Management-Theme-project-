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

            /* number of rooms card box */
            
            .active-box-content {
                margin-left: 0;
            }

            #box-content {
                transition: 0.4s;
            }
            
            .custom-container {
            max-width: 80%; /* Adjust the percentage as needed */
            margin: 50 auto; /* Center the container horizontally */
            }

            .custom-container-2 {

                max-width: 60%;
                margin-left: 70 auto; /* Center the container horizontally */
                
                

            }

            
                

            

            
            

            
        </style>
    </head>
    <body>
    @include('sidebar')

    <section class="p-4" id="main-content">
        <button class="btn" id="button-toggle" style="color:white;background-color: #5F8D4E">
          <i class="bi bi-list"></i>
        </button>
        <div class="card mt-5">
          <div class="card-body">
            <h4>Administrator dahsboard</h4>
            <p>
              
            Insert text
            </p>
          </div>
        </div>
        </section>

    

    
        <section class="p-2" id="box-content">
        <div class="container-fluid custom-container">
        <div class="row">
            <div class="col-3 mb-5 mr-1 " style="margin-right: 20;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Patients
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$patientCount}}</div>
                    </div>
                </div>
            </div>

            <div class="col mb-5 mr-1">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Doctors
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numDoctor }}</div>
                    </div>
                </div>
            </div>

            <div class="col mb-5 mr-1">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Rawat Inap
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numRawat}}</div>
                    </div>
                </div>
            </div>

            <div class="col mb-5 mr-1">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Available rooms
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numRoom }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
<div class="container-fluid custom-container-2">
    <div class="row">
        <div class="col-md-6 mt-5 pl-4">
            <div class="card">
                <div class="card-body">
                    {!! $Count_transactions->container() !!}
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-5">
            <div class="card" style="height: 100px;"> <!-- Increase the height here -->
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Pembayaran
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($paidTransaction) }}</div>
                </div>
            </div>

            <div class="card mt-3" style="height: 100px;"> <!-- Increase the height here -->
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        total Tagihan 
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($unpaid_transaction) }}</div>
                </div>
            </div>


            <div class="card mt-3" style="height: 100px;"> <!-- Increase the height here -->
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Admitted Patients
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admitted }}</div>
                </div>
            </div>


            <div class="card mt-3" style="height: 100px;"> 
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Discharged Patients  
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dischargedCount }}</div>
                </div>
            </div>
        </div>
    </div>

</div>



        <div class="container-fluid custom-container-2">
    <div class="row">
        <div class="col-md-6 mt-5 pl-4">
            <div class="card">
                <div class="card-body">
                {!! $results->container() !!}
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-5 pl-4">
            <div class="card">
                <div class="card-body">
                {!! $book_brs->container() !!}
                </div>
            </div>
        </div>


    </section>
      

    

    
    @laravelViewsScripts
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
      <script>
        // event will be executed when the toggle-button is clicked
        document.getElementById("button-toggle").addEventListener("click", () => {
    
            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");
    
            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
    

    
    <script src="{{ $Count_transactions->cdn() }}"></script>
    {{ $Count_transactions->script() }} 

    <script src="{{ $results->cdn() }}"></script>
    {{ $results->script() }} 

    <script src="{{ $book_brs->cdn() }}"></script>
    {{ $book_brs->script() }} 

    

    </body>
</html>
