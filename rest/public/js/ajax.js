$(document).ready(function(){

    $('.addToCart').click(function() {
        event.preventDefault();

        let dish = $(this).data('dish');
        // console.log(dish);
        $.ajax({
            type: "GET",
            url: "/addDishAjax/" + dish,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#totalQty').html(data.items.length);
            },
            error: function(data) {
                console.log('Error ', data);
            }
        });
    });
});
