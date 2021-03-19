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
    <div id="f1">
        @include('form1')
    </div>
    <div id="f2">
        @include('form2')
    </div>
    <div id="f3">
        @include('form3')
    </div>
    {{-- </div> --}}
</div>



@endsection
