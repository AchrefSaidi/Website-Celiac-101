function initMap() {
    // The location of Uluru
    const safe = { lat: 36.78856185195046, lng: 10.171294439124441 };
    const roman = { lat: 36.84413110014686, lng: 10.170408366664864 };
    const seine = { lat: 36.845450136137735, lng: 10.164743237442398 };
    const vignole = { lat: 36.84034658824694, lng: 10.245671172227544 };
    const bistrot = { lat: 36.83325880870789, lng: 10.2369432602928 }; 
    const farfale = { lat: 36.835759688586194, lng: 10.246312380265406 }; 
    // The map, centered at safe
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 17,
      center: safe,
    });
    var infowindow1 = new google.maps.InfoWindow({
        content: 'Celiac Safe'
    });
    var infowindow2 = new google.maps.InfoWindow({
        content: 'La Romanesca'
    });
    var infowindow3 = new google.maps.InfoWindow({
        content: 'La Seine Patisserie'
    });
    var infowindow4 = new google.maps.InfoWindow({
        content: 'Il Vongole'
    });
    var infowindow5 = new google.maps.InfoWindow({
        content: 'Breizh Bistrot'
    });
    var infowindow6 = new google.maps.InfoWindow({
        content: 'La Farfalle'
    });
    const marker6 = new google.maps.Marker({
        position: farfale,
        map: map,
        title: "La Farfalle",
  
      });
    const marker5 = new google.maps.Marker({
        position: bistrot,
        map: map,
        title: "Breizh Bistrot",
  
      });
    const marker4 = new google.maps.Marker({
        position: vignole,
        map: map,
        title: "Il Vongole",
  
      });
    const marker3 = new google.maps.Marker({
        position: seine,
        map: map,
        title: "La Seine Patisserie",
  
      });
    const marker2 = new google.maps.Marker({
        position: roman,
        map: map,
        title: "La Romanesca",
  
      });
    // The marker, positioned at safe
    const marker1 = new google.maps.Marker({
      position: safe,
      map: map,
      title: "Celiac Safe",

    });
    infowindow6.open(map, marker6);
    infowindow5.open(map, marker5);
    infowindow4.open(map, marker4);
    infowindow3.open(map, marker3);
    infowindow2.open(map, marker2);
    infowindow1.open(map, marker1);
    document.getElementById("mybtn1").addEventListener("click", () => {
        map.setCenter(safe);
        map.setZoom(17);
        });
    document.getElementById("mybtn2").addEventListener("click", () => {
        map.setCenter(roman);
        map.setZoom(17);
        });  
    document.getElementById("mybtn3").addEventListener("click", () => {
        map.setCenter(seine);
        map.setZoom(17);
        }); 
    document.getElementById("mybtn4").addEventListener("click", () => {
        map.setCenter(vignole);
        map.setZoom(17);
        });
    document.getElementById("mybtn5").addEventListener("click", () => {
        map.setCenter(bistrot);
        map.setZoom(17);
        });     
    document.getElementById("mybtn6").addEventListener("click", () => {
        map.setCenter(farfale);
        map.setZoom(17);
        });                  
      map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
  }
