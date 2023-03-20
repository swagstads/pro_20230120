<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .about-content-card-container{
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: center;
            position: relative;
            left: 0;
            right: 0;
            margin: auto;
        }
        .about-content-card-container .about-content-card{
            display: flex;
            gap: 10px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.118);
        }
        .about-content-card-container .about-content-card:nth-child(1){
            background-color: #9fc1ff;
        }
        .about-content-card-container .about-content-card:nth-child(2){
            background-color: #ff97a3;
        }
        .about-content-card-container .about-content-card:nth-child(3){
            background-color: #8484b3;
        }
        .about-content-card-container .about-content-card .left .icon{
            display: flex;
            height: 100%;
            align-items: center;
        }
        .about-content-card-container .about-content-card .left .about-content-card-icon{
            height: 50px;
        }
        .about-content-card-container .right .text{
            text-align: justify;
        }
        
        @media (max-width: 992px) {
            .about-content-card-container {
                flex-direction: column;
            }
        }
        @media (min-width: 768px) {
        .about-content-card-container {
            max-width: 768px !important;
        }            
        }
        @media (min-width: 992px) {
        .about-content-card-container {
            max-width: 985px !important;
        }            
        }
        @media (min-width: 1220px){
        .about-content-card-container {
            max-width: 1210px !important;
        }
        }
    </style>
</head>
<body>
    <div class="about-content-card-wrapper">

            <div class="about-content-card-container">



                <div class="about-content-card">
                    <div class="left">
                        <div class="icon">
                        <img class="product-card__img-icon about-content-card-icon lazyload imgFlyCart "
                            src="./assets/icons/25-years.svg" 
                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                            data-aspectratio="1.1538461538461537"
                            data-ratio="1.1538461538461537" data-sizes="auto" alt="" />
                        </div>
                    </div>
                    <div class="right">
                        <div class="text">
                            <h4 class="boxServiceTitle">85+ Years of Experience</h4>
                        </div>
                    </div>
                </div>

                <div class="about-content-card">
                    <div class="left">
                        <div class="icon">
                            <img class="product-card__img-icon about-content-card-icon lazyload imgFlyCart "
                                src="./assets/icons/design.svg" 
                                data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                data-aspectratio="1.1538461538461537"
                                data-ratio="1.1538461538461537" data-sizes="auto" alt="" />
                        </div>
                    </div>
                    <div class="right">
                        <div class="text">
                            <h4 class="boxServiceTitle">Impressive Design</h4> 
                        </div>
                    </div>
                </div>


                <div class="about-content-card">
                    <div class="left">
                        <div class="icon">
                        <img class="product-card__img-icon about-content-card-icon lazyload imgFlyCart "
                            src="./assets/icons/happy-customer.svg" 
                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                            data-aspectratio="1.1538461538461537"
                            data-ratio="1.1538461538461537" data-sizes="auto" alt="" />
                        </div>
                    </div>
                    <div class="right">
                        <div class="text">
                            <h4 class="boxServiceTitle">10,00,000+ Happy Customer</h4>
                        </div>
                    </div>
                </div>


            </div>

    </div>
</body>
</html>