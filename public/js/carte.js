carteBar = {
    map: document.getElementById('map'),
    url: 'http://webmaster-rmd.fr/carte_des_bars/info',
    donneesJson: null,
    myLatlng:null,
    marker:null,
    nomBar: document.getElementById('nomBar'),
    descriptionBar: document.getElementById('descriptionBar'),
    adresseBar:document.getElementById('adresseBar'),
    stylecontainer: document.getElementById('container-info-bar'),

    initMap: function ()
    {
        posCarte = {lat: 48.8534, lng: 2.3488};

        carteBar.map = new google.maps.Map(carteBar.map, {
            center: posCarte,
            zoom: 13
        });
    },
    initMarker1: function ()
    {
        amarker = new Array();

        ajaxGet(carteBar.url, function (infoJson) {
            carteBar.donneesJson = JSON.parse(infoJson);

            carteBar.donneesJson.forEach(function(element){
                carteBar.myLatlng = new google.maps.LatLng(element.lat, element.lng);

                carteBar.marker = new google.maps.Marker({
                    position: carteBar.myLatlng,
                    map: carteBar.map,
                });

                carteBar.marker.addListener('click', function(){
                   carteBar.nomBar.textContent = element.Nom;
                   carteBar.nomBar.style.fontSize= "50px";
                   carteBar.nomBar.style.textAlign = "center";
                   carteBar.nomBar.style.textDecoration = "underline";

                   carteBar.descriptionBar.textContent = element.Description;
                   carteBar.descriptionBar.style.textAlign = "center";

                   carteBar.adresseBar.textContent = element.Adresse;
                   carteBar.adresseBar.style.textAlign = "center";
                   carteBar.adresseBar.style.fontStyle = "italic";

                   carteBar.stylecontainer.style.backgroundColor = "goldenrod";
                    carteBar.stylecontainer.style.borderRadius = "25px";

                });

                amarker.push(carteBar.marker);
            })
        });
    }
};
carteBar.initMap();
carteBar.initMarker1();
