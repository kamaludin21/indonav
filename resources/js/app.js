import "./bootstrap.js"; // relative path assuming it's in resources/js
import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";

// Run after the DOM is fully loaded
document.addEventListener("DOMContentLoaded", () => {
  // === CSRF Token from Laravel ===
  const csrfMeta = document.querySelector('meta[name="csrf-token"]');
  const csrfToken = csrfMeta ? csrfMeta.getAttribute("content") : null;

  if (!csrfToken) {
    console.warn("⚠️ CSRF token not found in meta tag.");
  }

  // === FilePond File Input ===
  const inputElement = document.querySelector('input[type="file"].filepond');
  if (inputElement) {
    const pond = FilePond.create(inputElement);
    pond.setOptions({
      name: "attachment",
      allowRevert: true,
      acceptedFileTypes: [
        ".jpg", ".jpeg", ".png", ".gif", ".pdf",
        ".doc", ".docx", ".xls", ".xlsx"
      ],
      labelFileTypeNotAllowed: "Jenis file tidak didukung",
      labelIdle:
        'Seret & lepas berkas di sini atau <span class="filepond--label-action">telusuri</span>',
      server: {
        process: {
          url: "/temp/upload",
          method: "POST",
          headers: {
            "X-CSRF-TOKEN": csrfToken,
          },
        },
        revert: {
          url: "/temp/revert",
          method: "DELETE",
          headers: {
            "X-CSRF-TOKEN": csrfToken,
            "Content-Type": "text/plain",
          },
        },
      },
    });
  } else {
    console.warn("⚠️ File input with class 'filepond' not found.");
  }

  // === Mobile Nav Toggle ===
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
