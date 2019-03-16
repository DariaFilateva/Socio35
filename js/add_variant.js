// <script type="text/javascript">
var total = 2;
function add_new_field(){
  if (total < 6)
  {
    total++;
   $('<div>')
   //$('<tr>')
   .attr('id','div'+total)
   //.css({lineHeight:'20px'})
   // .append (
       //$('<td>')
       //.attr('id','td_title_'+total)
       //.css({paddingRight:'5px',width:'200px'})
       .append(
           $('<input type="text" style="width: 90%;" placeholder="Вариант ответа" required " />')
           //.css({width:'200px'})
           .attr('id','variant'+total)
           .attr('name','variant'+total)
           )                              
                               
    // )
    // .append(
    //     // $('<td>')
    //     // .css({width:'60px'})
    //     // .append(
    //        $('<span id="progress_'+total+'" class="padding5px"><a href="#" onclick="$(\'#var_img'+total+'\').remove();" class="ico_delete"><img src="delete.png" alt="del" border="0"></a></span>')
    //      // )
    //  )

    // )
    .append(
        // $('<td>')
        // .css({width:'60px'})
        // .append(
           $('<span id="X"><a onclick="$(\'#div'+total+'\').remove(), total--;">X</a></span>')
         // )
     )


     .appendTo('#fields');  
  }
                  
}
// $(document).ready(function() {
//     add_new_field();
// });
// </script>