<script src="html5-qrcode.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
        .vh100 {
            height: 100vh;
        }
        /* Basic button style */

        button {
            margin-top: 5%;
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            background-color: #3498db; /* Green background color */
            color: white; /* White text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition for background color */
        }

        /* Button hover effect */
        button:hover {
            background-color: #2980b9; /* Darker green on hover */
        }

        /* Any other custom styles */
    </style>
<div class="container">
    <div class="row vh100 justify-content-center align-items-center">
        <div class="col-sm-6">
            
<div class="border border-success rounded p-sm-4"  id="reader"></div>
        </div>
    </div>
</div>
<script>
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });

function onScanSuccess(decodedText, decodedResult) {
    const data = stringToJSON(decodedText);
    console.log(data)

    window.location.href = "add_book.php?Author="+data.Author+"&Category="+data.Category+"&Copies="+data.Copies+"&Copyright="+data.Copyright+"&Publication="+data.Publication+"&Publisher="+data.Publisher+"&Status="+data.Status+"&Title="+data.Title;


    html5QrcodeScanner.clear(); //stop the qr

}


function stringToJSON(inputString) {
    const lines = inputString.split('\n');
    const jsonObject = {};
    lines.forEach(line => {
        const [key, value] = line.split(':');
        jsonObject[key.trim()] = value.trim();
    });
    return jsonObject;
}

html5QrcodeScanner.render(onScanSuccess);

</script>
