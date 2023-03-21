<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .index-product-description-card{
            display: grid;
            grid-template-columns: 50% 50%;
            width: 100%;
            background-color:beige;
        }

        .index-product-description-card .left,.index-product-description-card .right{
            max-height: 90vh;
            overflow: hidden;
        }
        .index-product-description-card .info{
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
        }
        .index-product-description-card .info .title{
            font-size: 2rem;
        }
        .index-product-description-card .info .description{
            font-size: 1.5rem;
            padding: 0 0 40px 0;
            text-align: justify;
        }
        .index-product-description-card .info .index-product-description-card-button button{
            border: 1px solid black;
            background-color: transparent;
            padding: 20px 40px;
            font-size: 1.2rem;
        }
        .index-product-description-card .product-main-img{
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        @media (max-width: 992px) {
            .index-product-description-card-image{
                grid-area: bannerImg;
            }
            .index-product-description-card-info{
                grid-area: info;
            }
            .index-product-description-card{
                grid-template-columns: auto;
                grid-template-areas: 'bannerImg' 'info';
            }
        }
    </style>
</head>
<body>
    <div class="index-product-description-card-wrapper">
        <div class="index-product-description-card-container page-container">


            <div class="index-product-description-card">
                <div class="left index-product-description-card-image">
                    <img class="product-main-img" src="./assets/images/our-bank/floor.jpg" alt="">
                </div>
                <div class="right index-product-description-card-info">
                    <div class="info">
                        <div class="title">
                            <h4>Product One</h4>
                        </div>
                        <div class="description">
                            The classic collection comprises antique pieces and newly recreated versions. The antiques have been handpicked from across the world and are timeless works of art. The recreations are carefully and mindfully created with attention to detail, quality and beauty. The woven magnificence and superb condition of each piece, reflects the discerning standards and thorough process to ensure the high benchmark of quality and craftsmanship that has come to be associated with The Carpet Cellar.
                        </div>
                        <div class="index-product-description-card-button">
                            <button>
                                Shop Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="index-product-description-card">
                <div class="left index-product-description-card-info">
                    <div class="info">
                        <div class="title">
                            <h4>Product One</h4>
                        </div>
                        <div class="description">
                            The classic collection comprises antique pieces and newly recreated versions. The antiques have been handpicked from across the world and are timeless works of art. The recreations are carefully and mindfully created with attention to detail, quality and beauty. The woven magnificence and superb condition of each piece, reflects the discerning standards and thorough process to ensure the high benchmark of quality and craftsmanship that has come to be associated with The Carpet Cellar.
                        </div>
                        <div class="index-product-description-card-button">
                            <button>
                                Shop Now
                            </button>
                        </div>
                    </div>
                </div>
                <div class="right index-product-description-card-image">
                    <img class="product-main-img" src="./assets/images/our-bank/floor.jpg" alt="">
                </div>
            </div>


        </div>
    </div>
</body>
</html>