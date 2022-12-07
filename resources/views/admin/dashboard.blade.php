@extends('layouts.backend')
@section('content')

<div class="container-fluid">
     
        <div class="row">

          <!--TOTAL TICKETS-->
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-info">
              <div class="inner">
              @if(!empty($total))
                <h3>{{$total}}</h3>
                @endif
                
                <p><sup style="font-size: 20px">Open Tickets</sup></p>
              </div>
            </div>
          </div>
          <!-- END OF TOTAL TICKETS CARD -->

          <!--OPEN TICKETS-->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><sup style="font-size: 20px">Open Tickets</sup></h3>

                <p></p>
              </div>
              
            </div>
          </div>
          <!--CLOSE OF OPEN TICKET -->
        
          <!--CLOSED TICKET-->
          <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
              <div class="inner">
              @if(!empty($count))
                <h3>{{$count}}</h3>
                @endif
                
                <p><sup style="font-size: 20px">Closed Tickets</sup></p>
              </div>
            </div>
          </div>
          <!--END OF CLOSED TICKETS -->
        </div>
       
      </div>
@endsection