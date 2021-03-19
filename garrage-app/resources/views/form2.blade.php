<div class="heading" style="background: grey">
    <h3 class="text-center head-ing" style="">Set Vehicle Category</h3>
</div>

<div class="row">
    <div class="col-sm-5">
        <div class="card">
            <div class="card-header">Set Catogory</div>

            <div class="card-body">
                <form method="POST" action="/category">
                    @csrf
                    <div class="form-group">
                        <label for="category">Vehicle Category</label>
                        <input class="form-control" type="text" name="category" id="category" value="{{ old('category') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="brands">Vehicle Brand</label>
                        <select class="form-control" name="brands" id="brands" required>
                            <option value="" disabled selected>select car brand</option>
                            @foreach ($brands as $item)
                                <option value="{{$item->vehicle_brand}}">{{$item->vehicle_brand}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vehicles">Vehicle Name</label>
                        <select class="form-control" name="vehicles" id="vehicles" required>
                            {{-- ajax code  --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Manufactyring year</label>
                        <select class="form-control" name="year" id="year" required>
                            {{-- ajax code --}}
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
<br>
<div class="col-lg-7">
    <div class="card">
        <div class="card-header">Category Details</div>

        <div class="card-body">
            <table class="table table-borderless table-striped table-earning ">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Category</th>
                      <th scope="col">Vehicle Brand</th>
                      <th scope="col">Vehicle Name</th>
                      <th scope="col">Date of Manufacturing</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        @foreach ($catogories as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->vehicle_catogory}}</td>
                                <td>{{$item->vehicle_brand}}</td>
                                <td>{{$item->vehicle_name}}</td>
                                <td>{{$item->manufacturing_year}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<hr>

<script type="text/javascript">
    $(document).ready(function(){
        
        // fill car names dropdown wrt car Brand
        $(document).on('change', '#brands', function () {
            $('#vehicles').empty();
            $('#vehicles').append('<option value="0" disabled selected>Loading....</option>');
            var brand = $(this).val();
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            $.ajax({
                type: 'GET',
                url: "{{ url('/getCarNames') }}",
                data: {'brand': brand},
                success: function(data){;
                    data.forEach(val => {
                        $('#vehicles').append('<option value="'+val.vehicle_name+'">'+val.vehicle_name+ '</option>');
                    })
                },
                error: function(){
                    console.log('error');
                }
            });
        });

        // fill car manufacturing year dropdown wrt car name
        $(document).on('change', '#vehicles', function () {
            $('#year').empty();
            $('#year').append('<option value="0" disabled selected>Loading....</option>');
            var vehicle = $(this).val();

            $.ajax({
                type: 'GET',
                url: "{{ url('/getCarYear') }}",
                data: {'vehicle': vehicle},
                success: function(data){
                    data.forEach(val => {
                        $('#year').append('<option value="'+val.manufacturing_year+'">'+val.manufacturing_year+ '</option>');
                    })
                },
                error: function(){
                    console.log('error');
                }
            });
        });
        
        // form 3
   
    });
</script>