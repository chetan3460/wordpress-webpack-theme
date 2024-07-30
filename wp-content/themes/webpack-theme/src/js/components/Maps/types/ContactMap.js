import Maps from "..";

export default class ContactMap {
  constructor() {
    this.$window = null;
    this.$defaultIcon = null;
    this.$infoWindow = null;
    this.$marker = null;
    this.$retailerItem = null;
    this.$mapBlocks = $(".map_contact");
    this.maps = []; // Initialize maps as an empty array
    this.themeUrl = document.querySelector('meta[name="theme-url"]').getAttribute('content');

    Maps.loadGoogleApi().then((map) => {
      this.google = map.google;

      // Iterate over each map_contact element
      this.$mapBlocks.each((index, mapBlock) => {
        let mapInstance = map.init(this.google, mapBlock); // Initialize map for each element
        this.maps.push(mapInstance); // Store the map instance
        let $mapBlock = $(mapBlock); // Convert mapBlock to jQuery object

        let defaultIcon = {
          url: this.themeUrl + "/assets/images/marker.svg",
          origin: new this.google.Point(0, 0),
          anchor: new this.google.Point(15, 15),
        };

        let activeIcon = {
          url: this.themeUrl + "/assets/images/marker-active.svg",
          origin: new this.google.Point(0, 0),
          anchor: new this.google.Point(15, 15),
        };

        let markers = []; // Array to store all markers

        // Loop through each .coordinates element and create a marker for each set of coordinates
        $mapBlock.siblings(".map-coordinates").find(".coordinates").toArray().reverse().forEach((coordinate,index,arr) => {
          let $coordinate = $(coordinate);
          let icon = index === arr.length - 1 ? activeIcon : defaultIcon; // Set active icon for the first item
          let marker = new this.google.Marker({
            position: {
              lat: parseFloat($coordinate.attr("data-lat")),
              lng: parseFloat($coordinate.attr("data-lng")),
            },
            map: mapInstance,
            animation: this.google.Animation.DROP,
            icon: icon,
            id: parseFloat($coordinate.attr("data-lat")),
          });
          markers.push(marker);
          mapInstance.setCenter(marker.position);

        });

        // Reusable function to set icon and center map
        const setIconAndCenterMap = (latitude) => {
          markers.forEach((marker, i) => {
            marker.setIcon(marker.id === latitude ? activeIcon : defaultIcon);
            if (marker.id === latitude) {
              mapInstance.setCenter(marker.position);
            }
          });
        };

        // Add click event to each location-item inside this mapBlock
        $mapBlock.parents().find(".location-item h3").on("click", function(event) {
          let item = $(this).closest(".location-item").attr("data-lat");
          let lat = parseFloat(item);
          setIconAndCenterMap(lat);
        });

        $mapBlock.parents().find(".free-slider .swiper-slide").on("click", function(event) {
            setTimeout(function(){
                let activeSlide = $mapBlock.parents().find(".tab-content .swiper-slide-active .active");
                let latitude = parseFloat(activeSlide.attr("data-lat"));
                setIconAndCenterMap(latitude);
            },700)
        });
      });
    });
  }
}
