export default class CopyToClipClick {
  constructor() {
    this.copyShareButton = ".js-copy-clipboard";
    this.init();
  }

  init = () => {
    const copyShareButton = document.querySelector(this.copyShareButton);

    if (copyShareButton) {
      copyShareButton.addEventListener("click", this.copyShareInit);
    }
  };

  copyShareInit = () => {
    let pageLink = window.location.href;

    if (navigator.share) {
      navigator
        .share({
          url: pageLink, // The URL to share
        })
        .then(() => {
          //console.log('Share successful');
        })
        .catch((error) => {
          console.error("Share failed:", error);
          this.copyToClipboard(pageLink);
        });
    } else {
      this.copyToClipboard(pageLink);
    }
  };

  copyToClipboard = (text) => {
    let message = "Link copied to clipboard successfully.";
    console.log(message);
    let tempInput = document.createElement("input");
    let tempMessageBar = document.createElement("div");
    tempInput.setAttribute("value", text);
    tempMessageBar.textContent = message;
    tempMessageBar.classList.add("toast-message");

    document.body.appendChild(tempInput);
    document.body.appendChild(tempMessageBar);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    setTimeout(() => {
      document.body.removeChild(tempMessageBar);
    }, 2000);
  };
}
