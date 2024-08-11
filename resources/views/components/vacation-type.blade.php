
<?php $vacation_type = DB::table('vacation_types')->where('id' , '=' , $value->vacation_type_id)->get(); ?>

@foreach($vacation_type as $Vvalue)

{{$Vvalue->vacation_type}}

@endforeach
{{-- @if ($value->vacation_type == '1')
    اعتيادية
@endif

@if ($value->vacation_type == '2')
    مرضية
@endif
@if ($value->vacation_type == '3')
    زمنية
@endif





@if ($value->vacation_type == '4')
    اجازة امومة
@endif

@if ($value->vacation_type == '5')
    اجازة بدون راتب
@endif


@if ($value->vacation_type == '6')
    اجازة  تعويضية
@endif


@if ($value->vacation_type == '7')
    اجازة دراسية
@endif --}}

{{-- @if ($value->vacation_type == '7')
    اجازة دراسية
@endif --}}
