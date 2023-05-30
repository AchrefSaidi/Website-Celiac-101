var emptyCart = document.querySelector('.panierVide');
var width = document.querySelector('#catalogue a').offsetWidth;
var myLineHover;
var myLine;
if (emptyCart) {
    document.querySelector('#catalogue a').addEventListener("mouseover", () => {

        width = document.querySelector('#catalogue a').offsetWidth;
        myLine.remove()
        myLineHover = new LeaderLine(
            LeaderLine.pointAnchor(document.querySelector('#visiterCatalogue'), {
                x: '50%',
                y: '0%'
            }), LeaderLine.pointAnchor(document.querySelector('#catalogue a'), {
                x: width,
                y: '50%'
            }), {
                color: '#3B556D',
                size: 6,
                dash: true,
            }
        );
        myLineHover.setOptions({
            startSocketGravity: [-200, -100]
        });
    });
    document.querySelector('#catalogue a').addEventListener("mouseout", () => {

        width = document.querySelector('#catalogue a').offsetWidth;
        myLineHover.remove()
        myLine = new LeaderLine(
            LeaderLine.pointAnchor(document.querySelector('#visiterCatalogue'), {
                x: '50%',
                y: '0%'
            }), LeaderLine.pointAnchor(document.querySelector('#catalogue a'), {
                x: width,
                y: '50%'
            }), {
                color: '#3B556D',
                size: 6,
                dash: true,
            }
        );

        myLine.setOptions({
            startSocketGravity: [-200, -100]
        });

    })
    myLine = new LeaderLine(
        LeaderLine.pointAnchor(document.querySelector('#visiterCatalogue'), {
            x: '50%',
            y: '0%'
        }), LeaderLine.pointAnchor(document.querySelector('#catalogue a'), {
            x: width,
            y: '50%'
        }), {
            color: '#3B556D',
            size: 6,
            dash: true,
        }
    );
    myLine.setOptions({
        startSocketGravity: [-200, -100]
    });
}

/*dispaly*/
var wishlistButton=document.querySelector("#wishlist");
var wishlist=document.querySelector(".wishlist");
var cartButton=document.querySelector("#cart");
var cart=document.querySelector(".cart");
var orderButton=document.querySelector("#order");
var order=document.querySelector(".order");
wishlistButton.addEventListener('click',()=>{
    wishlist.style.display="block";
    order.style.display="none";
    cart.style.display="none";
    wishlistButton.classList.add("active");
    cartButton.classList.remove("active");
    orderButton.classList.remove("active");
    myLine.hide();
    myLineHover.hide();
})
cartButton.addEventListener('click',()=>{
    cart.style.display="block";
    wishlist.style.display="none";
    order.style.display="none";
    wishlistButton.classList.remove("active");
    cartButton.classList.add("active");
    orderButton.classList.remove("active");
    myLine.show();
    myLineHover.show();
})

orderButton.addEventListener('click',()=>{
    order.style.display="block";
    wishlist.style.display="none";
    cart.style.display="none";
    wishlistButton.classList.remove("active");
    cartButton.classList.remove("active");
    orderButton.classList.add("active");
    myLine.hide();
    myLineHover.hide();
})
/*Product control*/
var shopped = document.querySelectorAll(".shopped");
var addCart = document.querySelectorAll(".addCart");
var removeCart = document.querySelectorAll(".removeCart");
var product = {};
/*To remove element refrsh page !!!!*/ /*please read important*/
product["shopping"] = [];

for (let i = 0; i < shopped.length; i++) {
    product["shopping"].push(1);
}
for (let i = 0; i < shopped.length; i++) {
    addCart[i].addEventListener('click', () => {

        shopped[i].children[1].innerHTML = parseInt(shopped[i].children[1].innerHTML) + 1;
    });

    removeCart[i].addEventListener('click', () => {
        if (shopped[i].children[1].innerHTML > 1) {

            shopped[i].children[1].innerHTML = parseInt(shopped[i].children[1].innerHTML) - 1;
        }

    });
}

$('.addCart').each(function (index) {

    $(this).on("click", function () {
        product["shopping"][index]++;
        $(".sendPost").load("cartAjax.php", product);
    });
});
$('.removeCart').each(function (index) {

    $(this).on("click", function () {
        if (product["shopping"][index] > 1) {
            product["shopping"][index]--;
            $(".sendPost").load("cartAjax.php", product);
        }
    });
});
/*Payment pop up control*/
var confirmCart = document.querySelector("#confirmCart");
var paymentPopUp = document.querySelector(".paymentPopUp");
var overlayCart = document.querySelector("#overlayCart");
var closePaymentPopUp = document.querySelector(".closePaymentPopUp");
confirmCart.addEventListener("click", () => {
    paymentPopUp.classList.add("active");
    overlayCart.classList.add("active");
    document.querySelector('body').style.overflow = "hidden";
});
closePaymentPopUp.addEventListener("click", () => {
    paymentPopUp.classList.remove("active");
    overlayCart.classList.remove("active");
    document.querySelector('body').style.overflow = "auto";
});
overlayCart.addEventListener("click", () => {
    paymentPopUp.classList.remove("active");
    overlayCart.classList.remove("active");
    document.querySelector('body').style.overflow = "auto";
});
/*/*/
/*Adress Popup control*/
var changeLocation = document.querySelector("#changeLocation");
var locationPopUp = document.querySelector(".locationPopUp");
var overlayCart = document.querySelector("#overlayCart");
var closeLocationPopUp = document.querySelector(".closeLocationPopUp");
changeLocation.addEventListener("click", () => {
    locationPopUp.classList.add("active");
    overlayCart.classList.add("active");
    document.querySelector('body').style.overflow = "hidden";
});
closeLocationPopUp.addEventListener("click", () => {
    locationPopUp.classList.remove("active");
    overlayCart.classList.remove("active");
    document.querySelector('body').style.overflow = "auto";
});
overlayCart.addEventListener("click", () => {
    locationPopUp.classList.remove("active");
    overlayCart.classList.remove("active");
    document.querySelector('body').style.overflow = "auto";
});
/*Passer adresse et num vers pop up*/

var num = document.querySelector("#num");
var popupnum = document.querySelector("#popupNum");
num.addEventListener('change',()=>{
  popupnum.innerHTML=num.value;
  document.querySelector("#numInput").value=num.value;
})

/*var service;
var request;
var map;
var insat;
var infoWindow;
var names;
Map adreesse
function initMap() {
    The location of Uluru
    insat = {
        lat: 36.84286722163025,
        lng: 10.196148353222771
    };
    The map, centered at center
    map = new google.maps.Map(document.getElementById("mapAddress"), {
        zoom: 17,
        center: insat,
    });
    
    request = {
        placeId: "ChIJN1t_tDeuEmsRUsoyG83frY4",
        fields: ["name", "formatted_address", "place_id", "geometry"],
      };
      infowindow = new google.maps.InfoWindow();
      service = new google.maps.places.PlacesService(map);
      service.getDetails(request, (place, status) => {
        if (
          status === google.maps.places.PlacesServiceStatus.OK &&
          place &&
          place.geometry &&
          place.geometry.location
        ) {
          const marker = new google.maps.Marker({
            map:map,
            position: place.geometry.location,
          });
         
          google.maps.event.addListener(marker,"click",function () {
            names=place.geometry.location;
          });
          google.maps.event.addListener(marker, "click", function () {
            infowindow.setContent(
              "<div><strong>" +
                place.name +
                "</strong><br>" +
                "Place ID: " +
                place.place_id +
                "<br>" +
                place.formatted_address +
                "</div>"
            );
            infowindow.open(map, this);
            
          });


          
        }
        
      });
      
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
}*/
var names;
function initMap() {
    const origin = { lat: 36.84286722163025, lng: 10.196148353222771 };
    const map = new google.maps.Map(document.getElementById("mapAddress"), {
      zoom: 15,
      center: origin,
    });
    new ClickEventHandler(map, origin);
  }
  
  function isIconMouseEvent(e) {
    return "placeId" in e;
  }
  
  class ClickEventHandler {
    origin;
    map;
    directionsService;
    directionsRenderer;
    placesService;
    infowindow;
    infowindowContent;
    marker;
    constructor(map, origin) {
      this.origin = origin;
      this.map = map;
      this.directionsService = new google.maps.DirectionsService();
      this.directionsRenderer = new google.maps.DirectionsRenderer();
      this.directionsRenderer.setMap(map);
      this.placesService = new google.maps.places.PlacesService(map);
      this.infowindow = new google.maps.InfoWindow();
      // Listen for clicks on the map.
      this.map.addListener("click", this.handleClick.bind(this));
    }
    handleClick(event) {
      console.log("You clicked on: " + event.latLng);
  
      // If the event has a placeId, use it.
      if (isIconMouseEvent(event)) {
        console.log("You clicked on place:" + event.placeId);
        // Calling e.stop() on the event prevents the default info window from
        // showing.
        // If you call stop here when there is no placeId you will prevent some
        // other map click event handlers from receiving the event.
        event.stop();
  
        if (event.placeId) {
          this.getPlaceInformation(event.placeId);
        }
      }
    }
    getPlaceInformation(placeId) {
      const me = this;
      this.placesService.getDetails({ placeId: placeId }, (place, status) => {
        if (
          status === "OK" &&
          place &&
          place.geometry &&
          place.geometry.location
        ) {
          names=place.name+place.formatted_address;
          if(me.marker){(me.marker).setMap(null);}
          me.marker = new google.maps.Marker({
            map:me.map,
            position: place.geometry.location,
          });
            me.infowindow.setContent(
              "<div><strong>" +
                place.name +
                "</strong><br>" +
                place.formatted_address +
                "</div>" );
            me.infowindow.open(me.map, me.marker);
        }
      });
    }
  }

  var closeLocationPopUp2 = document.querySelector("#mybutton1");
        closeLocationPopUp2.addEventListener("click", () => {
        document.getElementById("locAddress").innerHTML = names;
        document.querySelector("#popupAdresse").innerHTML=names;
        document.querySelector("#adresseInput").value=names;
        locationPopUp.classList.remove("active");
        overlayCart.classList.remove("active");
        document.querySelector('body').style.overflow = "auto";
            });