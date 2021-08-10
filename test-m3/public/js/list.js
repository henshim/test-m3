$(document).ready(function () {
    $('.delete').click(function () {
        if (confirm('Are you sure you want to delete ???')) {
            let id = $(this).attr('data-id');
            let origin = location.origin
            $.ajax({
                url: origin + "/shop/delete/" + id,
                method: 'GET',
                type: 'json',
                success: function (res) {
                    //console.log(res)
                    $('#shop-' + id).remove();
                },
                error: function (error) {
                    alert('error');
                }
            })
        }
    })
})
