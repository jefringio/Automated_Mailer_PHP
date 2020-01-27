function update(e,obj){

    var id = e;
    var sel= document.getElementById("status"+id);
    

       var dataid =$(obj).data("id");
       console.log(dataid);
      var first= $('#'+dataid).find('#firstname').text();
      var last= $('#'+dataid).find('#lastname').text();
      var email= $('#'+dataid).find('#email').text();
      var country= $('#'+dataid).find('#country').text();
      var gender= $('#'+dataid).find('#gender').text();
      var year18= $('#'+dataid).find('#year18').text();
      var ship= $('#'+dataid).find('#ship').text();
      var team= $('#'+dataid).find('#team').text();
      var relation= $('#'+dataid).find('#relation').text();
      var interest= $('#'+dataid).find('#interest').text();
      var learn= $('#'+dataid).find('#learn').text();
      var status= sel.options[sel.selectedIndex].value;


      if(status=="Recruited"){
        $('#'+dataid).removeAttr("contenteditable");
        $('#'+dataid).css("background-color","green");
        $(".Update"+e).remove();
        $("#status"+e).attr("disabled","true");

      }

      console.log(status);

      
    $.ajax({
        url:'updatestatus.php',
        method:'POST',
        data: {ID:dataid, 
            firstname:first, 
            lastname:last, 
            email:email, 
            country:country, 
            sex:gender, 
            adult:year18, 
            ship:ship,
            team:team,
            relation:relation,
            interest:interest,
            learn:learn,
            status:status,
                        
        },
        success:function(response){
            console.log("ajax"+response);
              
        }
    });


}
function insert(value){
$("#formid").submit(function(e){
    e.preventDefault();
    console.log($("form").serialize());
        $.ajax({
        url:'insert.php',
        method:'POST',
        data:{
            "data":$("form").serialize()
        },                  
        success:function(response){
            console.log(response);
            $("#thankyou").css("display","block");
            $("#spanremove").css("display","none");
              
        }
    });
});
    $("#thankyou").css("display","block");
    $("#spanremove").css("display","none");
}


