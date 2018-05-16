var prev_page_url;
var next_page_url;
var pagination_params;
var cardsContainer = $('.card-columns');
var showCards = function (response) {
    
    cardsContainer.empty();
    
    $.each(response.data, function(i, user){
        cardsContainer.append('<div class="card card-user text-white bg-info mb-3"><div class="card-header p-2 pl-3">' + user.position + '</div> <div class="card-body p-2 pl-3"><h5 class="card-subtitle my-1">' + user.name + '</h5><p class="card-text">salary: $' + user.salary + '<br>from ' + user.employment_date + '</p></div></div>');
    });

    if (response.prev_page_url === null) {
        $('#prev').removeClass('page-item').addClass('page-item disabled');    
    } else {
        $('#prev').removeClass('page-item disabled').addClass('page-item');
    }

    if (response.next_page_url === null) {
        $('#next').removeClass('page-item').addClass('page-item disabled');    
    } else {
        $('#next').removeClass('page-item disabled').addClass('page-item');
    }

    prev_page_url = response.prev_page_url;
    next_page_url = response.next_page_url;

} 

var showResponse = function (response) {
    
    cardsContainer.empty();
    
    $.each(response.data, function(i, user){
        cardsContainer.append('<p>'+ response +'</p>');
    });
}   

$(function() {

    // Show cards with default sorting
    $.ajax({
        type: "GET",
        url: "ajax/users?sort=position&order=asc",
        success: showCards
    });

    // Show cards after changing sorting
    $('select').change(function () {
        var sort_params = $('option:selected').attr('value');

        // Taking parameters for pagination
        pagination_params = sort_params;

        $.ajax({
            type: "GET",
            url: "ajax/users?" + sort_params,
            success: showCards
        });
    })

    // Pagination next
    $('#next a').click(function() {
        $.ajax({
            type: "GET",
            url: next_page_url + "&" + pagination_params,
            success: showCards
        });
    })

    // Pagination previous
    $('#prev a').click(function() {
        $.ajax({
            type: "GET",
            url: prev_page_url + "&" + pagination_params,
            success: showCards
        });
    })    

    // Search UI
    $('#search-input').click(function() {
        $(this).attr('placeholder', 'Enter name, position, salary or employment date');
    });

    $('#search-input').focusout(function() {
        $(this).attr('placeholder', 'Search...');
    });
    
    // Search function
    $('#search-input').keypress(function (e) {
        if (e.which == 13) {

            // Taking parameters for pagination
            pagination_params = "search=" + $(this).val()

            $.ajax({
                type: "GET",
                url: "ajax/search",
                data: {
                    "search": $(this).val()        
                },
                success: showCards
            });
        } 
    });

}); 
