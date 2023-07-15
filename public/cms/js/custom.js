 // Delete Cart Data
 $(document).ready(function () {

    $('.delete_cart_data').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest(".cartpage").find('.product_id').val();

        var data = {
            '_token': $('input[name=_token]').val(),
            "product_id": product_id,
        };

        // $(this).closest(".cartpage").remove();

        $.ajax({
            url: '/delete-from-cart',
            type: 'DELETE',
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });
    });

});
