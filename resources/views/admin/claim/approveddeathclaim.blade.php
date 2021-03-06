@extends('master')

@section('content')

  <h3>Approved Death Claim List</h3>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Account Holder Name</th>
            <th scope="col">Account Number</th>
            <th scope="col">NID</th>
            <th scope="col">Benificient Name</th>
            <th scope="col">Benificient NID</th>
            
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Place</th>
            <th scope="col">Reason</th>
            <th scope="col">Amount</th>
            
            <th scope="col">Status</th>
            <th scope="col">Death Certificate</th>

             @if(auth()->user()->role==='accountant')
            <th scope="col">Action</th>
            @endif
            
           
        </tr>
        </thead>
        <tbody>

        @foreach($all_claims as $key=>$single_data)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$single_data->policy->policy_holder_name}}</td>
                <td>{{$single_data->policy->id}}</td>
                <td>{{$single_data->policy->nid_number}}</td>
                <td>{{$single_data->policy->benificant_name}}</td>
                <td>{{$single_data->policy->banificient_nid}}</td>
                
                <td>{{$single_data->date}}</td>
                <td>{{$single_data->time}}</td>
                <td>{{$single_data->place}}</td>
                <td>{{$single_data->reason}}</td>
                <td>{{$single_data->amount}}</td>
                <td>{{$single_data->status}}</td>
                <td>
                

                <img style="width: 80px;" src="{{url('/uploads/Images/'.$single_data->death_certificate)}}" alt="death_certicate">
                </td>

                @if(auth()->user()->role==='accountant')

                <td>
                    <a href="{{route('deathclaim.confirm',$single_data->id)}}" class="btn btn-success">Done</a>
                   
                </td>
                @endif
                

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$all_claims->links()}}


@endsection














