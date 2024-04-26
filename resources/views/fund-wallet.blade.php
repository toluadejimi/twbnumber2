@extends('layout.main')
@section('content')



    <div class="container p-5">

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


            <div class="text-stone-900 text-bold my-3 text-xl text-center mt-10">
                FUND WALLET
            </div>




            <div class="col-lg-5 col-sm-12">
                <div class="card border-0 shadow-lg p-3 mb-5 bg-body rounded-40">
                    <div class="card-body">
                        <div class="">

                            <form action="fund-now" method="POST">
                                @csrf
                        
                                <label class="my-2">Enter the Amount (NGN)</label>
                                <input type="text" name="amount" class="form-control" max="999999" min="5" name="amount"
                                placeholder="Enter the Amount you want Add" required >
                        

                                <label class="my-2 mt-4">Select Payment mode</label>
                                <select name="type" class="form-control">
                                    <option value="1">Instant</option>
                                    <option value="2">Manual</option>
                                </select>
                        
            
                                <button type="submit" class="text-white btn btn-block btn-dark my-4">
                                    Add Funds
                                </button>
                            </form>
                        
                        


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
                                    <h4>Latest Transactions</h4>
                                </strong>
                            </div>

                            <div>


                                <div class="table-responsive ">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            @forelse($transaction as $data)
                                                <tr>
                                                    <td style="font-size: 12px;">{{ $data->id }}</td>
                                                    <td>
                                                        @if ($data->type == 2)
                                                            <p style="font-size: 12px;">Instant</p>
                                                        @else
                                                            <p style="font-size: 12px;">Manual</p>
                                                        @endif

                                                    </td>


                                                    <td style="font-size: 12px;">₦{{ number_format($data->amount, 2) }}


                                                    <td>
                                                        @if ($data->status == 1)
                                                            <span style="background: orange; border:0px; font-size: 10px"
                                                                class="btn btn-warning btn-sm">Pending</span>
                                                            <a href="resolve-page?trx_ref={{ $data->ref_id }}"
                                                                style="background: rgb(168, 0, 14); border:0px; font-size: 10px"
                                                                class="btn btn-warning btn-sm">Reslove</span>
                                                            @elseif ($data->status == 2)
                                                                <span style="font-size: 10px;"
                                                                    class="text-white btn btn-success btn-sm">Completed</span>
                                                            @else
                                                        @endif

                                                    </td>

                                                    <td style="font-size: 12px;">{{ $data->created_at }}

                                                </tr>

                                            @empty

                                                <h6>No transaction found</h6>
                                            @endforelse

                                        </tbody>

                                        {{ $transaction->links() }}

                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
    






@endsection
