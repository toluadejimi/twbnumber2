@extends('layout.main')
@section('content')

    <div class="container p-5">

        <div class="d-flex justify-content-center my-4 p-2 mt-5">
            <h2 style="font-size: 18px; ">Welcome! {{ Auth::user()->username }}</h2>
        </div>

        <div class="d-flex justify-content-center mb-3 p-1">
            <p style="font-size: 10px">
                Rent a phone for 7 minutes.
                Credits are only used if you receive the SMS code.
            </p>
        </div>

        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif



        <div class="row mt-5">

    

            <div class="col-lg-5 col-sm-12">
                <div class="card border-0 shadow-lg p-3 mb-5 bg-body rounded-40">
                    <div class="card-body">
                        <div class="">

                            <div class="p-2 col-lg-6">
                                <input type="text" id="searchInput" class="form-control border-0"
                                    placeholder="Search for a service..." onkeyup="filterServices()">
                            </div>


                            <div class="row my-3 p-2"
                                style="background: #000000; border-radius: 10px; color: white; font-size: 12px; border-radius: 18px">
                                <div class="col-7">
                                    <h5>Services</h5>
                                </div>
                                <div class="col">
                                    <h5>Price</h5>
                                </div>
                            </div>


                        </div>


                        <div style="height:400px; width:100%; overflow-y: scroll;" class="p-2">


                            @foreach ($services as $key => $value)
                                <div class="row service-row">
                                    @foreach ($value as $innerKey => $innerValue)
                                        <div style="font-size: 11px" class="col-5 service-name">
                                            {{ $innerValue->name }}
                                        </div>

                                        <div style="font-size: 11px" class="col">
                                            @php $cost = $get_rate * $innerValue->cost + $margin  @endphp
                                            <strong>N{{ number_format($cost, 2) }}</strong>
                                        </div>

                                        <div class="col">
                                            <a
                                                href="/order-now?service={{ $key }}&price={{ $cost }}&cost={{ $innerValue->cost }}&name={{ $innerValue->name }}">
                                                <i class="fa fa-shopping-bag"></i>
                                            </a>
                                        </div>


                                        <hr style="border-color: #cccccc" class=" my-2">
                                    @endforeach
                                </div>
                            @endforeach


                        </div>
                    </div>


                </div>
            </div>



            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body">
                            <p>
                                Why SMS does not arrive?
                                Please consider the following recommendations:

                            </p>
                            <p> 1.⁠ ⁠Repeat sending the SMS code from the selected service to the purchased phone number.
                            </p>
                            <p> 2.⁠ ⁠Change your IP address. Use a proxy or VPN. Your IP address should comply with the
                                country of the purchased phone number.</p>
                            <p> 3.⁠ ⁠Apply extensions in the browser to change the user-agent or open the tab in incognito
                                mode. Many websites track a certain set of user information.</p>
                            <p> 4.⁠ ⁠Try to buy another phone number.</p>

                            <p>Additionally:
                                We don’t charge you until you receive code , so you can keep trying different numbers</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-7 col-sm-12">
                <div class="card border-0 shadow-lg p-3 mb-5 bg-body rounded-40">

                    <div class="card-body">


                        <div class="">

                            <div class="p-2 col-lg-6">
                                <strong>
                                    <h4>Verifications</h4>
                                </strong>
                            </div>

                            <div>


                                <div class="table-responsive ">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Service</th>
                                                <th>Phone No</th>
                                                <th>Code</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Date</th>


                                            </tr>
                                        </thead>
                                        <tbody>


                                            @forelse($verification as $data)
                                                <tr>
                                                    <td style="font-size: 12px;">{{ $data->id }}</td>
                                                    <td style="font-size: 12px;">{{ $data->service }}</td>
                                                    <td style="font-size: 12px; color: green"><a href="receive-sms?phone={{ $data->id }}" >{{ $data->phone }} </a></td>
                                                    <td style="font-size: 12px;">{{ $data->sms }}</td>
                                                    <td style="font-size: 12px;">₦{{ number_format($data->cost, 2) }}</td>
                                                    <td>
                                                        @if ($data->status == 1)
                                                            <span  style="background: orange; border:0px; font-size: 10px" class="btn btn-warning btn-sm">Pending</span>
                                                            <a  href="cancle-sms?id={{  $data->id }}&delete=1" style="background: rgb(168, 0, 14); border:0px; font-size: 10px" class="btn btn-warning btn-sm">Delete</span>

                                                        @else
                                                            <span style="font-size: 10px;"
                                                                class="text-white btn btn-success btn-sm">Completed</span>
                                                        @endif

                                                    </td>
                                                    <td style="font-size: 12px;">{{ $data->created_at }}</td>
                                                </tr>

                                            @empty

                                                <h6>No verification found</h6>
                                            @endforelse

                                        </tbody>

                                        {{ $verification->links() }}

                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
    </div>


    <script>
        function filterServices() {
            var input, filter, serviceRows, serviceNames, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            serviceRows = document.getElementsByClassName("service-row");
            for (i = 0; i < serviceRows.length; i++) {
                serviceNames = serviceRows[i].getElementsByClassName("service-name");
                txtValue = serviceNames[0].textContent || serviceNames[0].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    serviceRows[i].style.display = "";
                } else {
                    serviceRows[i].style.display = "none";
                }
            }
        }
    </script>







@endsection
