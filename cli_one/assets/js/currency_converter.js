$(document).ready(()=>{

    $("#toggle-currency-btn").click(function(){
        $('.price-toggle').each(function() {
            let USDVal = $(this).attr("data-usd")  
            $(this).text(USDVal)
        }) 
        localStorage.setItem("currency","USD")
        price_entity()
        try {
            display_cart_data()
        } catch (error) {
            // console.error("fn display_cart_data not available \n",error);
        }
    })
    $("#toggle-currency-btn2").click(function(){

        $('.price-toggle').each(function() {
            let INRVal = $(this).attr("data-inr")  
            $(this).text(INRVal)
        }) 
        localStorage.setItem("currency","INR")
        price_entity()  
        try {
            display_cart_data()
        } catch (error) {
            // console.error("fn display_cart_data not available",error);
        }
    })




let price_entity = () =>{
    // $#36 &#8377
    currency = localStorage.getItem("currency")
    let entity = ""
    if(currency === "INR"){
        entity = "&#8377;";
        $(".price-entity").each(function(){
            // console.log(entity);
            $(this).html(entity)
        })
    }
    else if(currency === "USD"){
        entity = "&#36;";
        $(".price-entity").each(function(){
            // console.log(this);
            $(this).html(entity)
        })
    }
}


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
        if(currency === "INR"){
            $('.price-toggle').each(function() {
                let INRVal = $(this).attr("data-inr")
                // console.log(INRVal);  
                $(this).text(INRVal)
            }) 
        }
        else if(currency === "USD"){
            
            $('.price-toggle').each(function() {
                let USDVal = $(this).attr("data-usd") 
                // console.log(USDVal);  

                $(this).text(USDVal)
            })     
        }
        price_entity()

        
    },
    error: function(xhr, status, error) {
        // console.log(error);
    }
});




})