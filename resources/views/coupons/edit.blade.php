@if(session()->get('role_id')==2)

@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Coupons / Edit #{{$coupon->coupon_code}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('coupon_code')) has-error @endif">
                       <label for="coupon_code-field">Coupon_code</label>
                    <input type="text" id="coupon_code-field" name="coupon_code" class="form-control" value="{{ is_null(old("coupon_code")) ? $coupon->coupon_code : old("coupon_code") }}"/>
                       @if($errors->has("coupon_code"))
                        <span class="help-block">{{ $errors->first("coupon_code") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('website')) has-error @endif">
                       <label for="website-field">Website</label>
                    <!-- <input type="text" id="website-field" name="website" class="form-control" value="{{ is_null(old("website")) ? $coupon->website : old("website") }}"/> -->
                       @if($errors->has("website"))
                        <span class="help-block">{{ $errors->first("website") }}</span>
                       @endif

                       <select  id="website-field" name="website" class="form-control" >  
                       @foreach($items as $item)
                       <option  value="{{$item->website}}">{{$item->website}}</option>
                       @endforeach
                     </select>
                     
                    </div>
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <textarea class="form-control" id="description-field" rows="3" name="description">{{ is_null(old("description")) ? $coupon->description : old("description") }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('expiry_date')) has-error @endif">
                       <label for="expiry_date-field">Expiry_date</label>
                    <input type="text" id="expiry_date-field" name="expiry_date" class="form-control date-picker" value="{{ is_null(old("expiry_date")) ? $coupon->expiry_date : old("expiry_date") }}"/>
                       @if($errors->has("expiry_date"))
                        <span class="help-block">{{ $errors->first("expiry_date") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('coupons.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
      format: 'mm/dd/yyyy'
    });
  </script>
@endsection

@else

    <script type="text/javascript">
        window.location = "{{ url('login') }}";
    </script>

@endif
