<div class="heading" style="background: grey">
    <h3 class="text-center head-ing" style="">Vehicle Information</h3>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">Enter Vehicle Details</div>

            <div class="card-body">
                <form method="POST" action="/form">
                    @csrf
                    <div class="form-group">
                        <label for="vehicle-brand">Vehicle Brand</label>
                        <input class="form-control" type="text" name="vehicle-brand" id="vehicle-brand" value="{{ old('vehicle-brand') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="vehicle-name">Vehicle Name</label>
                        <input class="form-control" type="text" name="vehicle-name" id="vehicle-name" value="{{ old('vehicle-name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="manufacturing-year">manufacturing-year</label>
                        <input class="form-control" type="text" name="manufacturing-year" id="manufacturing-year" value="{{ old('manufacturing-year') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
{{-- </div> --}}
<br>
{{-- <div class="row"> --}}
<div class="col-lg-6">
    <div class="overflow-scroll" >
        <div class="card-header">Vehicle Details</div>

        <div class="card-body ">
            <table class="table " >
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Vehicle Brand</th>
                      <th scope="col">Vehicle Name</th>
                      <th scope="col">Date of Manufacturing</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($cars as $car)
                            <tr>
                                <th scope="row">{{$car->id}}</th>
                                <td>{{$car->vehicle_brand}}</td>
                                <td>{{$car->vehicle_name}}</td>
                                <td>{{$car->manufacturing_year}}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<hr>