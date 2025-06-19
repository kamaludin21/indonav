import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
  const menuButton = document.getElementById("mobile-menu-button");
  const mobileMenu = document.getElementById("mobile-menu");
  const body = document.body;

  if (menuButton && mobileMenu) {
    menuButton.addEventListener("click", () => {
      const isHidden = mobileMenu.classList.toggle("hidden");

      if (!isHidden) {
        body.classList.add("overflow-hidden");
      } else {
        body.classList.remove("overflow-hidden");
      }
    });
  }
});
