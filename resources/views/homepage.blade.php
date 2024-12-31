<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            position: relative;
            margin: 0 auto;
            max-width: fit-content;
            font-family: sans-serif;
        }

        h1 {
            margin: 10px auto;
            max-width: fit-content;
        }

        table td {
            text-align: center;
            border: 1px solid #000;
            padding: 3px;
        }

        .addBtn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .addBtn button:hover {
            opacity: 0.8;
        }

        .addBtn button {
            padding: 0;
            cursor: pointer;
            border-radius: 15px;
            border: 1px solid #000;
        }

        .addBtn button svg {
            vertical-align: middle;
        }

        .form-div {
            display: none;
            position: fixed;
            min-height: 100%;
            min-width: 100%;
            background-color: rgba(0,0,0,0.7);
            top: 0;
            left: 0;
        }

        form {
            display: none;
            position: fixed;
            width: 340px;
            background-color: #f9f9f9;
            border: 1px solid #333;
            border-radius: 10px;
            z-index: 10;
        }

        form > div {
            display: flex;
            justify-content: center;
            margin: 20px 0
        }

        form label {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 5px;
            padding-left: 20px;
            padding-right: 20px;
        }

        form label:first-child {
            padding-top: 20px;
        }
        
        form label:last-child {
            padding-bottom: 20px;
        }

        form div button {
            margin-bottom: 10px;
        }

    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        
            addBtn = document.querySelector(".addBtn button");

            formDiv = document.querySelector(".form-div");
            form = document.querySelector(".form-cars");

            addBtn.addEventListener("click", ()=> {
                formDiv.style.display = "flex";
                form.style.display = "block";
            });

            formDiv.addEventListener("click", ()=> {
                formDiv.style.display = "none";
                form.style.display = "none";
            });

        });
    </script>
</head>
<body>
    <h1>Our Cars</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Brand</td>
            <td>Model</td>
            <td>Color</td>
            <td>Plate</td>
        </tr>

        @foreach($carsList as $car)
        <form method="get" action="/cars/{{$car->Plate}}">
            <tr>
                <td>{{$car->id}}</td>
                <td>{{$car->Brand}}</td>
                <td>{{$car->Model}}</td>
                <td>{{$car->Color}}</td>
                <td>{{$car->Plate}}</td>
                <td>
                    <button type="submit">View</button>
                </td>
            </tr>
        </form>
            @endforeach
        
    </table>
    <div class="addBtn">
        <button ><?xml version="1.0" encoding="utf-8"?>
        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7 12L12 12M12 12L17 12M12 12V7M12 12L12 17" stroke="#333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg></button>
    </div>
    <div class="form-div"></div>
    <form class="form-cars" method="get" action="/carsCreate">
        @foreach($req as $item)
            <label>
                <div>{{$item}}:</div>
                <input type="text" name="{{$item}}" required>
            </label>
        @endforeach
        <div>
            <button type="submit">Add</button>
        </div>
    </form>
</body>
</html>