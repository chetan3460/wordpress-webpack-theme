import loadGoogleMapsApi from "load-google-maps-api";
import { mapStyle, mapOptions } from "./constants";

export default class Maps {
  constructor(async_google) {
    if (async_google === "undefined") {
      throw new Error("Cannot be called directly");
    }

    this.google = async_google;
  }

  static loadGoogleApi() {
    return loadGoogleMapsApi({
      key: "AIzaSyBSifPHvfWPxL2b4A3v_ZlvzqqvLEekwTs",
    }).then((google) => {
      return new Maps(google);
    });
  }

  init = (google, mapContainer) => {
    this.mapCenter = new google.LatLng(15, 75);
    this.map = new google.Map(mapContainer, {
      ...mapOptions(google),
      ...{
        center: this.mapCenter,
        styles: mapStyle,
      },
    });

    return this.map;
  };
}
