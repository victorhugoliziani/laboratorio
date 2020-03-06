<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #1873a3;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                color: #fff;
                font-size: 40px;
                font-weight: bold;
            }

            .title span {
                margin-top: -20px;
            }

            .title img {
                width:15%;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{url("images/shift.png")}}" >
                    <span>Ordem de serviço</span>
                </div>
            </div>
            <div class="content">
                <div class="row">

                </div>
            </div>
    <script>
        let todosMedicos = () => {

            axios.get('/api/medicos')
                .then(function(response){
                    console.log(response.data); 
                });
        }

        todosMedicos();
    </script>  
    </body>
</html>
