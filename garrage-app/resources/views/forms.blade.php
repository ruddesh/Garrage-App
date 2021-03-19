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
        @include('form2')
    @include('form3')
    {{-- </div> --}}
</div>



@endsection
