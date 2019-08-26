@extends('backend.layouts.master')
@section('title','Bulaşık Takvimi')

@section('content')

    <div class="calendar">


            <select name="menu" style="width:150px; height: 40px;"  >
            <option value="1">Ocak</option>
            <option value="2">Şubat</option>
            <option value="3">Mart</option>
            <option value="4">Nisan</option>
            <option value="5">Mayıs</option>
            <option value="6">Haziran</option>
            <option value="7">Temmuz</option>
            <option value="8">Ağustos</option>
            <option value="9">Eylül</option>
            <option value="10">Ekim</option>
            <option value="11">Kasım</option>
            <option value="12">Aralık</option>
        </select>

{{--@dump($months)--}}
        <h1 class="month">
            @foreach($months as $data)
                @if($data->id == $ay)
                    {{$data->months_name}}
                @endif
            @endforeach
        2019</h1>
        <ol class="day-names">
            <li>Pazartesi</li>
            <li>Salı</li>
            <li>Çarşamba</li>
            <li>Perşembe</li>
            <li>Cuma</li>
            <li>Cumartesi</li>
            <li>Pazar</li>
        </ol>
        <ol class="days">
            @php
            $dayCount = $months->where('id',$ay)->first();
            @endphp

            @for($day= 1; $day <= $dayCount->number_days ; $day++)
                    <li>
                        <div class="date">{{$day}}</div>
                        <div class="event">
                            @foreach($calender as $calenders)
                                @if($day == $calenders->days)
                                    @foreach($personel as $data)
                                        @if($calenders->personel_id == $data->id)
                                            <div style="position: relative">
                                                {{$data->personel_name}}
                                                <input class="input" type="hidden" value="{{$data->personel_name}}">
                                                <a href="#" class="updatebutton" onclick="updatePersonel({{$data->id}},this)">Düzenle</a>
                                                <a href="#" class="deleteButton" onclick="deletePersonel({{$calenders->id}})">x</a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </li>

            @endfor()


            <li class="event clear"></li> &nbsp;
        </ol>
    </div>

    <div class="modal-wrapper">
        <div class="modal">
            <div class="head">
                <a class="btn-close trigger" href="javascript:;"></a>
            </div>
            <div class="content">

                {{--Html Kodları--}}
                
            </div>
        </div>
    </div>
    @endsection
@push('afterJs')
    <script type="text/javascript">
        $(document).ready(function(){
            $("select[name=menu]").change(function(){
                var ay = $(this).val();

                window.location.href = '/calender/'+ay ;
            });

            $("select[name=menu]").val({{$ay}}); //seçilen aya göre ay ismi

            $('.trigger').click(function() {
                $('.modal-wrapper').toggleClass('open');
                $('.page-wrapper').toggleClass('blur');
            });

            $(".days li").click(function() {
              //Modal JS Kodu
                $('.modal-wrapper').toggleClass('open');
                return false;
            });
        });

        function deletePersonel(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
        });
            // alert(id);
                $.ajax({
                        url: "{{url('')}}/calenderPersonelAddDelete/"+id,
                        type: 'POST',
                        data: {
                            "id": id,
                        },
                        success: function ()
                        {
                            console.log("it Work");
                            location.reload();

                        }
                    });

                console.log("It failed");
            };
            function updatePersonel(id, input) {
                // alert(id);
                $('.input').attr("type","hidden");
                $(input).closest('div').find('.input').attr("type", "text");
             }

    </script>
    @endpush