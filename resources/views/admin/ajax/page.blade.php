@if(!empty($fscat))
<br>
@forelse($findsubcats as $scat)
<div class="row" id={{$scat->id}}>
<div class="col-sm-3"><input type="text" class="form-control" value="{{$scat->name}}" id="scn{{$scat->id}}"></div>
<div class="col-sm-4"><button type="button" class="btn btn-success" id="updatescat" data="{{$scat->id}}">Update</button> 
<button type="button" class="btn btn-danger" id="deletescat" data="{{$scat->id}}">Delete</button></div>

<div class="col-sm-3" id="upres{{$scat->id}}"></div>
</div>
@empty
@endforelse

@endif

@if(!empty($sscat))
<select name="subcat" class="form-control">
    <option value="">Select sub Cateogry</option>
    @forelse($scats as $scat)
    <option value="{{$scat->id}}">{{$scat->name}}</option>
    @empty
    @endforelse
</select>

@endif


<script>
var csrf =  $('meta[name="csrf-token"]').attr('content');

    $("button#updatescat").unbind("click").click(function(){
       var id = $(this).attr('data');
       var scat = $("#scn"+id).val();
       $.post("{{url('/admin/updatscat')}}",{_token:csrf,id:id,name:scat},function(data1){
           $("#upres"+id).html(data1);
       });
    });
    
     $("button#deletescat").unbind("click").click(function(){
       var id = $(this).attr('data');
       $.post("{{url('/admin/deletescat')}}",{_token:csrf,id:id},function(data1){
           $("div#"+id).remove();
       });
    });
    
</script>