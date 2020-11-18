<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <h5>ระบุคำค้นหา</h5>
        </div>
        <div class="row">
            <div class="col-md-9">
                <input type="text" style="width: 100%;" id="music">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" style="width: 50%;" onclick="search('search')">ค้นหา</button>
            </div>
        </div>
        <div class="row">
        <?php
        $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
        $response = file_get_contents($url);
        $result = json_decode($response);
        $data = $result->tracks->items;

        foreach ($data as $key) {
            echo  '<div class="col-md-4 mt-3">';
            echo '<div class="card">';
            $image = base64_encode(file_get_contents($key->album->images[0]->url));
            echo '<img class="card-img-top" src="data:image/jpeg;base64,' . $image . '" alt="Card image">';
            echo "<div class='card-body'>";
            $name =  $key->album->name;
            echo "<h4 class='card-title'>$name</h4>";
            $artist =  $key->album->artists[0]->name;
            echo "<p class='card-text'>Artist: $artist </p>";
            $re_date =  $key->album->release_date;
            echo "<p class='card-text'>Release date: $re_date </p>";
            $avail = sizeof($key->available_markets);
            echo "<p class='card-text'>Available: $avail country </p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
    </div>
</body>

</html>