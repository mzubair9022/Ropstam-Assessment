jQuery(document).ready(function ($) {
    $('.get-projects').on("click", function(){
        // Using jQuery for AJAX request
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'GET',
            dataType: 'json',
            data: {
                action: 'get_last_three_projects'
            },
            success: function (response) {
                if (response.success) {
                    console.log(response.data);
                } else {
                    console.error("Error: " + response.data.message);
                }
            },
            error: function (error) {
                console.error("Error: " + error.status);
            }
        });
    })
    
});