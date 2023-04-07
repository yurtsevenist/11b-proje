<script>
    $(function(){
       $('.add-click').click(function(){
         pid=$(this)[0].getAttribute('pid');
        //  console.log(pid);
        $.ajax({
          type:'GET',
          url:'{{route('addCart')}}',
          data:{pid:pid},
          success:function(data){
            // console.log(data);
             $('#mycart').text('('+data+')')
          },
        })
       });
    });
  </script>
