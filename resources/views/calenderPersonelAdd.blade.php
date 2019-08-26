@extends('backend.layouts.master')
@section('title','Bulaşık Takvimi')
@section('content')

    <form action="{{route('calender.save')}}" method="post" name="myform" id="myform">
        {{csrf_field()}}
    <div class="container">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tarih">Tarih:
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="datepicker"  class="form-control col-md-7 col-xs-12" name="tarih" autocomplete="off">
        </div>
        <br>
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adı Soyadı:
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="personel_name" style="width:150px; height: 40px;"  >
                @foreach($personel as $data)

                    <option value="{{$data->id}}"> {{$data->personel_name}}</option>
                @endforeach


            </select>
        </div>
        <br>
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="text-area">Not:
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="form-control rounded-0" id="Textarea" name="note" rows="5"></textarea>
        </div>
       <br>
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button  id="submit-btn" type="submit" class="btn btn-success">Kaydet</button>
            </div>

    </div>

    </form>



    </div>
    @endsection
@push('afterJs')

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );

        window.onload = function() {
            document.getElementById('submit-btn').onclick = function (event) {
                event.preventDefault();
                // refilter();
                document.getElementById('myform').submit();
            }
        }
        @if(session()->has('message'))
            alert('{{ session()->get('message') }}');
        @endif

    </script>
    @endpush