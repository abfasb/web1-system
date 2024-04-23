// Tiny Slider

var slider = tns({
    container: ".slider",
    items: 3,
    speed: 500,
    mouseDrag: true,
    autoplay: false,
    center: true,
    loop: false,
    nav: false,
    controlsContainer: "#custom-control",
    controlsPosition: "bottom",
  });
  
  // ScrollReveal JS
  
  ScrollReveal({ distance: "30px", easing: "ease-in" });
  
  ScrollReveal().reveal(".title", {
    delay: 300,
    origin: "top",
  });
  
  ScrollReveal().reveal(".paragraph", {
    delay: 800,
    origin: "top",
  });
  
  ScrollReveal().reveal("#form", {
    delay: 1200,
    origin: "bottom",
  });
  
  // Form
  
  const emailId = document.getElementById("email-id");
  const error = document.getElementById("error");
  const mailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  
  //! get the cursor position in the input
  emailId.addEventListener("keyup", (e) => {
    console.log("Caret at: ", e.target.selectionStart);
  });
  
  //! show whether the email address is valid or not with an outline
  emailId.addEventListener("input", (e) => {
    const emailInputValue = e.currentTarget.value;
    if (
      /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(emailInputValue) !=
      true
    ) {
      emailId.style.outline = "2px dotted rgb(117, 152, 242)";
    } else {
      emailId.style.outline = "2px dotted rgb(118, 167, 63)";
    }
  });
  
  //! if email address is empty, remove the outline from the input
  function checkEmpty() {
    if (emailId.value == "") {
      emailId.style.outline = "none";
    }
  }
  
  //! submit the email address
  form.addEventListener("submit", (e) => {
    if (emailId.value.match(mailRegex)) {
      e.preventDefault();
      form.innerHTML = `<p style="font-size: 2rem; font-weight: 500; color: rgb(118, 167, 63);">Subscribed! 🎉</p>`;
       // setTimeout("location.reload(true);", 2000);
      setTimeout(() => { 
        window.location.href = "#card-container";
  }, 1700);
    } else {
      e.preventDefault();
      alert("Oops! Please check your email");
    }
  });
  
  //! typing animation for the placeholder
  let i = 0;
  let placeholder = "";
  const txt = "example@domain.com";
  const speed = 150;
  
  setTimeout(() => {
    type();
  }, 1600);
  
  function type() {
    placeholder += txt.charAt(i);
    emailId.setAttribute("placeholder", placeholder);
    i++;
    setTimeout(type, speed);
  }
  
  // Vanilla-Tilt JS
  
  var VanillaTilt = (function () {
    "use strict";
  
    /**
     * Created by Sergiu Șandor (micku7zu) on 1/27/2017.
     * Original idea: https://github.com/gijsroge/tilt.js
     * MIT License.
     * Version 1.8.1
     */
  
    class VanillaTilt {
      constructor(element, settings = {}) {
        if (!(element instanceof Node)) {
          throw (
            "Can't initialize VanillaTilt because " + element + " is not a Node."
          );
        }
  
        this.width = null;
        this.height = null;
        this.clientWidth = null;
        this.clientHeight = null;
        this.left = null;
        this.top = null;
  
        // for Gyroscope sampling
        this.gammazero = null;
        this.betazero = null;
        this.lastgammazero = null;
        this.lastbetazero = null;
  
        this.transitionTimeout = null;
        this.updateCall = null;
        this.event = null;
  
        this.updateBind = this.update.bind(this);
        this.resetBind = this.reset.bind(this);
  
        this.element = element;
        this.settings = this.extendSettings(settings);
  
        this.reverse = this.settings.reverse ? -1 : 1;
        this.resetToStart = VanillaTilt.isSettingTrue(
          this.settings["reset-to-start"]
        );
        this.glare = VanillaTilt.isSettingTrue(this.settings.glare);
        this.glarePrerender = VanillaTilt.isSettingTrue(
          this.settings["glare-prerender"]
        );
        this.fullPageListening = VanillaTilt.isSettingTrue(
          this.settings["full-page-listening"]
        );
        this.gyroscope = VanillaTilt.isSettingTrue(this.settings.gyroscope);
        this.gyroscopeSamples = this.settings.gyroscopeSamples;
  
        this.elementListener = this.getElementListener();
  
        if (this.glare) {
          this.prepareGlare();
        }
  
        if (this.fullPageListening) {
          this.updateClientSize();
        }
  
        this.addEventListeners();
        this.reset();
  
        if (this.resetToStart === false) {
          this.settings.startX = 0;
          this.settings.startY = 0;
        }
      }
  
      static isSettingTrue(setting) {
        return setting === "" || setting === true || setting === 1;
      }
  
      /**
       * Method returns element what will be listen mouse events
       * @return {Node}
       */
      getElementListener() {
        if (this.fullPageListening) {
          return window.document;
        }
  
        if (typeof this.settings["mouse-event-element"] === "string") {
          const mouseEventElement = document.querySelector(
            this.settings["mouse-event-element"]
          );
  
          if (mouseEventElement) {
            return mouseEventElement;
          }
        }
  
        if (this.settings["mouse-event-element"] instanceof Node) {
          return this.settings["mouse-event-element"];
        }
  
        return this.element;
      }
  
      /**
       * Method set listen methods for this.elementListener
       * @return {Node}
       */
      addEventListeners() {
        this.onMouseEnterBind = this.onMouseEnter.bind(this);
        this.onMouseMoveBind = this.onMouseMove.bind(this);
        this.onMouseLeaveBind = this.onMouseLeave.bind(this);
        this.onWindowResizeBind = this.onWindowResize.bind(this);
        this.onDeviceOrientationBind = this.onDeviceOrientation.bind(this);
  
        this.elementListener.addEventListener(
          "mouseenter",
          this.onMouseEnterBind
        );
        this.elementListener.addEventListener(
          "mouseleave",
          this.onMouseLeaveBind
        );
        this.elementListener.addEventListener("mousemove", this.onMouseMoveBind);
  
        if (this.glare || this.fullPageListening) {
          window.addEventListener("resize", this.onWindowResizeBind);
        }
  
        if (this.gyroscope) {
          window.addEventListener(
            "deviceorientation",
            this.onDeviceOrientationBind
          );
        }
      }
    }
}
  )