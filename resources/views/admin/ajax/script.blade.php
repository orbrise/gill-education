<script>
	var csrf =  $('meta[name="csrf-token"]').attr('content');
    $("#addsubcat").click(function(){
        $("#res").empty();
        var pcat = $("#pcat").val();
        var subcat = $("#subcat").val();
       $.post("{{url('admin/addsubcat')}}",{_token:csrf,pcat:pcat,subcat:subcat},function(data){
           $("#res").html(data);
       });
    });
    
    
    $("#searchsubcat").click(function(){
        $("#searchdata").empty();
        var pcat = $("#pcats").val();
       $.post("{{url('admin/findsubcat')}}",{_token:csrf,pcat:pcat},function(data){
           $("#searchdata").html(data);
       });
    });
    

     $("select[name='category']").change(function(){

        $("#showsubcats").empty();
        var pcat = $(this).val();
       $.post("{{url('admin/getsubcats')}}",{_token:csrf,pcat:pcat},function(data){
           $("#showsubcats").html(data);
       });
    });
    
    
	
</script>