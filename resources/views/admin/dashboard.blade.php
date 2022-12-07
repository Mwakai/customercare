@extends('layouts.backend')
@section('content')

<div class="container-fluid">
     
        <div class="row">

          <!--TOTAL TICKETS-->
          <div class="col-lg-4 col-6">
           
            <div class="small-box bg-success">
              <div class="inner">
              @if(!empty($total))
                <h3>{{$total}} Open Tickets</h3>
              @else
                <h3>0 Open Tickets</h3>
              @endif
                
              </div>
            </div>
          </div>
          <!-- END OF TOTAL TICKETS CARD -->

          <!--OPEN TICKETS
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><sup style="font-size: 20px">Open Tickets</sup></h3>

                <p></p>
              </div>
              
            </div>
          </div>
         CLOSE OF OPEN TICKET -->
        
          <!--CLOSED TICKET-->
          <div class="col-lg-4 col-6">
          <div class="small-box bg-danger">
              <div class="inner">
              @if(!empty($count))
                <h3>{{$count}} Closed Tickets</h3>
              @else
              <h3>0 Closed Tickets</h3>
              @endif
                
              </div>
            </div>
          </div>
          <!--END OF CLOSED TICKETS -->
        </div>
       
      </div>
@endsection