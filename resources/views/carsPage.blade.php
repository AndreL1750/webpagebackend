<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Page</title>
    <style>
        body {
            position: relative;
            margin: 0 auto;
            max-width: fit-content;
            font-family: sans-serif;
        }

        h1, h2, h3 {
            text-align: center;
        }

        table{
            margin: 0 auto;
        }

        table td {
            text-align: center;
            border: 1px solid #000;
            padding: 3px;
        }

        .addBtn {
            display: flex;
            justify-content: center;
            margin-top: 10px;
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
            background-color: #f9f9f9;
            border: 1px solid #333;
            border-radius: 10px;
            z-index: 10;
            top: 20vh;
        }

        

        form label {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding-left: 20px;
            padding-right: 20px;
            margin-bottom: 10px;
        }

        form label textArea {
            min-width: 500px;
            max-width: 500px;
            min-height: 200px;
        }

        form div:last-child {
            display: flex;
            justify-content: center;
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
    <h1>{{$carsSpecs->Brand}} {{$carsSpecs->SubModel}} {{$carsSpecs->Version}}</h1>
    <table>
        @foreach($specs as $spec)
        <tr>
            <td>{{$spec}}:</td>
            <td>{{$carsSpecs->$spec}}</td>
        </tr>
        @endforeach
    </table>
    <h2>Maintenance</h2>
    <table>
        <tr>
            <td>Plate</td>
            <td>Worker</td>
            <td>Description</td>
            <td>Date</td>
        </tr>
        @if(isset($maintenances) && count($maintenances) > 0)
        @foreach($maintenances as $maintenance)
            <tr>
                <td>{{ $maintenance['Plate'] }}</td>
                <td>{{ $maintenance['Worker'] }}</td>
                <td>{{ $maintenance['Description'] }}</td>
                <td>{{ $maintenance['Date'] }}</td>
            </tr>
        @endforeach
        @else
            <tr>
                <td colspan="4">No maintenance records found.</td>
            </tr>
        @endif
    </table>
    <div class="addBtn">
        <button ><?xml version="1.0" encoding="utf-8"?>
        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7 12L12 12M12 12L17 12M12 12V7M12 12L12 17" stroke="#333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg></button>
    </div>
    <div class="form-div"></div>
    <form class="form-cars" method="post" action="/cars/{{$carsSpecs->Plate}}/addMaintenance">
        @csrf
        <h3>Maintenance Report</h3>
        <div>
            <label>
                <div>Plate:</div>
                <input type="text" name="Plate" value="{{$carsSpecs->Plate}}" required readonly>
            </label>
            <label>
                <div>Worker:</div>
                <input type="text" name="Worker" required>
            </label>
            <label>
                <div>Description:</div>
                <textarea name="Description" required></textarea>
            </label>
            <label>
                <div>Date:</div>
                <input type="date" name="Date" required>
            </label>
        </div>
        <div>
            <button type="submit">Add</button>
        </div>
    </form>
</body>
</html>