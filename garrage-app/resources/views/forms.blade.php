@extends('layouts.app')

@section('content')
{{-- <script>
    function saveValueFunction(){
        var selectBrandDiv = document.getElementById("brands");
        var selectedValue = selectBrandDiv.options[selectBrandDiv.selectedIndex].value;
        console.log(selectedValue)
    }   
</script> --}}

<div class="container">
    {{-- <div class="main"> --}}
    @include('form1')
    <div id="f2" class="tab">
        @include('form2')
    </div>
    @include('form3')
    {{-- </div> --}}
</div>



@endsection
