//As shown below we added two listeners for buttons update and remove and for each button
// just send ajax request to update and remove products.

$(".update-cart").click(function (e) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

   e.preventDefault();
   var ele = $(this);
    $.ajax({
       url: "update-cart",
       type: "patch",
       data: { id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
       success: function (response) {
           window.location.reload();
       }
    });
});

$(".remove-from-cart").click(function (e) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    e.preventDefault();
    var ele = $(this);
    var pid=ele.attr("data-id");
    //alert(pid);
    if(confirm("Are you sure")) {
        $.ajax({
            url: "removefromcart",
            type: "DELETE",
            data: {id: pid},
            success: function (response) {
                console.log(response);
                window.location.reload();
            }
        });
    }
});

