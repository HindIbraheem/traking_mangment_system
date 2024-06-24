@if ($value->mag_classes_aprove == '0')
 <strong class="text-yellow"> قيد الموافقة </strong>

@elseif($value->mag_classes_aprove == '1')
<strong class="text-success"> مقبولة </strong>
@elseif($value->mag_classes_aprove == '2')
<strong class="text-danger"> مرفوظة </strong>
@endif
