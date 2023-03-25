$(document).ready(()=>{
    $("#currency_opt").val(localStorage.getItem("currency"))
    $("#currency_opt").change(function(){
        let currency = $(this).val();
        
        manipulate_currency(currency) // to change all prices according to currency value


        try {
            display_cart_data()
        } catch (error) {
            
        }
    })


$.ajax({
    url: "https://api.freecurrencyapi.com/v1/latest",
    headers: {
        "Accept": "application/json",
        "Access-Control-Allow-Origin": "*"
    },
    data: {
        "apikey": "tJo758FriIOWQhbAWw4pE7WHQMLhqet5orHIssxK"
    },
    success: function(response) {
        // Get INR and USD exchange rates from the API response
        const inrRate = response.data.INR;

        localStorage.setItem("inrRate",inrRate)

        $('.price-toggle').each(function() {
        current_price = parseFloat($(this).text())
            $(this).attr("data-usd",(current_price / inrRate).toFixed(2))
        })  
        currency = localStorage.getItem("currency");
        manipulate_currency(currency) // to change all prices according to currency value
    },
    error: function(xhr, status, error) {
        
    }
});

function manipulate_currency(currency){
    if(currency === "INR"){

        entity = "&#8377;";
        $('.price-toggle').each(function() {
            let INRVal = $(this).attr("data-inr")  
            $(this).text(INRVal)
        }) 
        $(".price-entity").each(function(){
            $(this).html(entity)
        })
        localStorage.setItem("currency","INR")

    }
    else if(currency === "USD"){

        entity = "&#36;";
        $('.price-toggle').each(function() {
            let USDVal = $(this).attr("data-usd")  
            $(this).text(USDVal)
        }) 
        $(".price-entity").each(function(){
            $(this).html(entity)
        })
        localStorage.setItem("currency","USD")
    }    
}



})