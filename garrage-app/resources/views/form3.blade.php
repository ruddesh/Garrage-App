<div class="heading" style="background: grey">
    <h3 class="text-center head-ing" style="">Set Services & Prices</h3>
</div>

<div class="row">
 
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">Set Prices For Services</div>

            <div class="card-body">
                <form method="" action="">
                    @csrf
                    <div class="form-group">
                        <label for="services">Services</label>
                        <div id="thisesr" class="row">
                            <div class="col">
                                <input class="form-control" type="text" name="services" id="services" value="" required>
                            </div>
                            <div class="col">
                                <select class="form-control" name="service" id="service" required>
                                    <option value="none" selected disabled>Select Values</option>
                                    @foreach ($services as $service)
                                        <option value="{{$service->service}}">{{$service->service}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="catogories">Catogories</label>
                        <select class="form-control" name="catogories" id="catogories" required>
                            {{-- ajax code --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" type="number" name="price" id="price" value="{{ old('price') }}" required>
                    </div>
                    <button id="button" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Services & Prices</div>

            <div class="card-body">
                <table class="table " id="tani">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Service</th>
                          <th scope="col">Category</th>
                          <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <th scope="row"></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        
        $(document).on('change', '#service', function() {
            var servoce = $('#service').val();
            $('input[name="services"]').val(servoce);
        })

        // form 3

            $('#catogories').append('<option value="0" disabled selected>Loading....</option>');

            $.ajax({
                type: 'GET',
                url: "{{ url('/categories') }}",
                data: {},
                success: function(data){
                    data.forEach(val => {
                        $('#catogories').append('<option value="'+val.vehicle_catogory+'">'+val.vehicle_catogory+ '</option>');
                    })
                },
                error: function(){
                    console.log('error');
                }
            });

            $.ajax({
                type: 'GET',
                url: "{{ url('/services') }}",
                data: {},
                success: function(data){
                    data.forEach(val => {
                        $('tbody tr:last').after('<tr><th scope="row">'+val.id+'</th><td>'+val.service+'</td><td>'+val.category+'</td><td>₹'+val.price+'</td></tr>');
                    })
                },
                error: function(){
                    console.log('error');
                }
            });

        $(document).on('click', '#button', function(e) {
            // e.preventDefault();
            var service = $('#services').val();
            var category = $('#catogories').val();
            var price = $('#price').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ url('/services')}}",
                data: {'service': service, 'category': category, 'price': price},
                success: function(data){
                    console.log(data);
                }
            });
            
        });
    });
</script>