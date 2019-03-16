// initMap() - функция инициализации карты
function initMap() {
    // Координаты центра на карте. Широта: 56.2928515, Долгота: 43.7866641
    var centerLatLng = new google.maps.LatLng(59.127415, 37.906929);
 
    // Обязательные опции с которыми будет проинициализированна карта
    var mapOptions = {
        center: centerLatLng, // Координаты центра мы берем из переменной centerLatLng
        zoom: 13               // Зум по умолчанию. Возможные значения от 0 до 21
    };
 
   
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
	var image = 'http://www.tamillocal.com/wp-content/uploads/2018/02/health.png';
    var beachMarker = new google.maps.Marker({
    position: {lat: 59.126830, lng: 37.927309},
    map: map,
    icon: image,
    title: "Поликлиника 2"
    })

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.126440, lng: 37.92140},
    map: map,
    icon: image,
    });

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.132175, lng: 37.883670},
    map: map,
    icon: image
    });

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.128739, lng: 37.926438},
    map: map,
    icon: image
    });

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.129649, lng: 37.893588},
    map: map,
    icon: image
    });

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.127331, lng: 37.908261},
    map: map,
    icon: image
    });

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.123605, lng: 37.910208},
    map: map,
    icon: image
    });

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.132205, lng: 37.931612},
    map: map,
    icon: image
    });

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.123605, lng: 37.910208},
    map: map,
    icon: image
    });

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.131119, lng: 37.933724},
    map: map,
    icon: image
    });

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.119319, lng: 37.922605},
    map: map,
    icon: image
    });

    var beachMarker = new google.maps.Marker({
    position: {lat: 59.128898, lng: 37.888639},
    map: map,
    icon: image
    });

}
 // Ждем полной загрузки страницы, после этого запускаем initMap()
google.maps.event.addDomListener(window, "load", initMap);