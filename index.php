<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="vendor/bootstrap-5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/bootstrap-icons-1.4.0/dist/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/button.css">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <title>XChronicle</title>
</head>

<body>
  <?php
  require_once("header.php")
  ?>
  <main class="container-fluid">
    <div class="row">
      <div class="col p-0">
        <div id="mapid"></div>
        <button type="button" class="toggle-btn btn bg-milk position-absolute top-50 start-100 translate-middle">
          <i class="bi bi-arrow-right-circle"></i>
        </button>
      </div>
      <div class="sidebar bg-latte " id="sidebar-wrapper">
        <div class="d-flex flex-column align-items-stretch bg-white" style="width: 240px;">
          <div class="list-name">Новости</div>
          <div class="list-group list-group-flush border-bottom scrollarea scroll-y">
            <?php
            require_once("parser.php");
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="vendor/bootstrap-5.0.0/dist/js/bootstrap.min.js"></script>
  <script src="vendor/jquery-3.6.0/dist/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <script>
    $(".toggle-btn").click(function() {
      $(".toggle-btn").toggleClass("toggle-btn-closed");
      $(".bi").toggleClass('bi-arrow-left-circle');
      $('.bi').toggleClass('bi-arrow-right-circle');
      $(".sidebar").toggle();
    });

    var mymap = L.map('mapid').setView([43.03667, 44.66778], 10);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);


    let news = <?= json_encode($reversed); ?>;
    let news_links = <?= json_encode($links);?>;
    var popupNews = {
      "владикавказ": [],
      "беслан": [],
      "ногир": [],
      "октябрьское": [],
      "моздок": [],
      "ардон": [],
      "алагир": [],
      "дигора": [],
      "заводской": [],
      "мизур": [],
      "садон": []
    };
    var coordinateDict = {
      "владикавказ": "43.0366700 44.6677800",
      "беслан": "43.193760 44.533792",
      "ногир": "43.0816200 44.6365000",
      "октябрьское": "43.06451 44.74171",
      "моздок": "43.7435900 44.6517700",
      "ардон": "43.1772000 44.2970200",
      "алагир": "43.0422200 44.2222200",
      "дигора": "43.1580600 44.1569400",
      "заводской": "43.4624200 132.2849400",
      "мизур": "42.8537600 44.0639300",
      "садон": "42.8526200 44.0065000"
    }
    for (let i of news) {
      f(i);
    }
    for (let key in popupNews) {
      let value = popupNews[key].reverse();
      if (value.length!=0){
        let coordinates = coordinateDict[key].split(" ");
        let s = '<div class="list-group list-group-flush border-bottom scrollarea scroll-y-popup">';
        for(let i in popupNews[key])
        {
          s = s+'<a href ="'+popupNews[key][i][1]+'"class="list-group-item list-group-item-action  py-3 lh-tight" aria-current="true"><div class="d-flex w-100 align-items-center justify-content-between"><strong class="mb-1">'+popupNews[key][i][0]+'</strong><small></small></div><div class="col-10 mb-1 small"></div></a>';
        }
        s = s+'</div>'
        L.marker([parseFloat(coordinates[0]), parseFloat(coordinates[1])]).addTo(mymap)
            .bindPopup(s,{
}) 
            .openPopup(); 
      }
    }
    async function f(i) {
      var adressPoints = [
        ["владикавказ", "43.0366700 44.6677800"],
        ["беслан", "43.193760 44.533792"],
        ["ногир", "43.0816200 44.6365000"],
        ["октябрьское", "43.06451 44.74171"],
        ["моздок", "43.7435900 44.6517700"],
        ["ардон", "43.1772000 44.2970200"],
        ["алагир", "43.0422200 44.2222200"],
        ["дигора", "43.1580600 44.1569400"],
        ["заводской", "43.4624200 132.2849400"],
        ["мизур", "42.8537600 44.0639300"],
        ["садон", "42.8526200 44.0065000"]
      ]
      var mas = i.toLowerCase();
      var or = i
      adressPoints.forEach(function(item, i, adressPoints) {
        if (mas.indexOf(item[0]) != -1 || mas.indexOf(item[0] + "e") != -1 || mas.indexOf(item[0] + "ом") != -1 || mas.indexOf(item[0] + "у") != -1) {
          var p = [mas,news_links[news.indexOf(or)]];
          if (item[0] == "владикавказ") {
            popupNews.владикавказ.push(p);
          }
          if (item[0] == "беслан") {
            popupNews.беслан.push(p);
          }
          if (item[0] == "ногир") {
            popupNews.ногир.push(p);
          }
          if (item[0] == "октябрьское") {
            popupNews.октябрьское.push(p);
          }
          if (item[0] == "моздок") {
            popupNews.моздок.push(p);
          }
          if (item[0] == "ардон") {
            popupNews.ардон.push(p);
          }
          if (item[0] == "алагир") {
            popupNews.алагир.push(p);
          }
          if (item[0] == "дигора") {
            popupNews.дигора.push(p);
          }
          if (item[0] == "заводской") {
            popupNews.заводской.push(p);
          }
          if (item[0] == "мизур") {
            popupNews.мизур.push(p);
          }
          if (item[0] == "садон") {
            popupNews.садон.push(p);
          }
        }
      });
    }
    /*let news = <?= json_encode($textpolups); ?>;
    console.log(news);
    for (let i = 0; i < news.length; i++) {
      f(news[i]);
    }
    map.addLayer(markers);

    async function f(obj) {
      print(obj);
      var addressPoints = [
        ["владикавказ"],
        ["беслан"],
        ["фарн"],
        ["ногир"],
        ["октябрьское"],
        ["моздок"],
        ["ардон"],
        ["алагир"],
        ["дигора"],
        ["заводской"],
        ["мизур"],
        ["садон"]
      ];
      var mas = obj.toLowerCase().split(' ');
      adressPoints.forEach(function(item, i, adressPoints) {
        if (mas.indexOf(item) != -1 || mas.indexOf(item + "e") != -1 || mas.indexOf(item + "ом") != -1 || mas.indexOf(item + "у") != -1) {
          await geocoder.geocode("Россия" + " " + "Республика Северная-Осетия Алания" + " " + item, results => {
            latLng = new L.LatLng(results[0].center.lat, results[0].center.lng);
            marker = new L.Marker(latLng);
            marker.bindPopup(obj);
            markers.addLayer(marker);
          });
        }
      });
    }*/
  </script>
</body>

</html>