import intlTelInput from "intl-tel-input";
import "intl-tel-input/build/css/intlTelInput.css";
import { isMobileAndTablet } from "../utils";

export default class PhoneInput {
  constructor() {
    this.phoneInputs = $('input[type="tel"]');
    this.globalIti = null;
    if (!this.phoneInputs.length) {
      return;
    }
    this.init();
  }

  init = () => {
    this.phoneInputs.each((i, el) => {
      this.globalIti = intlTelInput(el, {
        initialCountry: "ae",
        separateDialCode: true,
        showSelectedDialCode: true,
        preferredCountries: ["ae"],
      });

      //Add country code to hidden input field initailly
      const dialCode = this.globalIti.getSelectedCountryData().dialCode;
      $(el)
        .parents(".form-group")
        .find("#" + $(el)[0].id + "-dial-code")
        .val("+" + dialCode);

      //Add country code to hidden input field on country change
      $(el).on("countrychange", (e) => {
        const dialCode = this.globalIti.getSelectedCountryData().dialCode;
        $(e.currentTarget)
          .parents(".form-group")
          .find("#" + $(el)[0].id + "-dial-code")
          .val("+" + dialCode);
      });

      //Prevent background scroll on mobile
      if (isMobileAndTablet()) {
        $(el).on("open:countrydropdown", () => {
          $("body").addClass("active");
        });
        $(el).on("close:countrydropdown", () => {
          $("body").removeClass("active");
        });
      }

      $(el).on("input", function (e) {
        const input = e.target;
        let value = input.value.replace(/\D/g, ""); // Remove non-numeric characters

        // Limit the input to 15 characters
        if (value.length > 15) {
          value = value.slice(0, 15);
        }

        $(input).val(value);

        //Add phone number to hidden input field on input
        $("#" + $(input)[0].id + "-number-original").val(value);
      });
    });
  };
}
