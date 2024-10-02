// GSAP for animating gallery item details
const galleryItems = document.querySelectorAll(".gallery-item");

// Hover effect: show product details after hovering for 6 seconds
galleryItems.forEach((item) => {
  let hoverTimeout;
  item.addEventListener("mouseenter", () => {
    hoverTimeout = setTimeout(() => {
      gsap.to(item.querySelector(".details"), { opacity: 1, duration: 0.6 });
      item.querySelector(".details").style.display = "block";
    }, 6000); // 6 seconds hover
  });
  item.addEventListener("mouseleave", () => {
    clearTimeout(hoverTimeout);
    gsap.to(item.querySelector(".details"), { opacity: 0, duration: 0.6 });
    setTimeout(() => {
      item.querySelector(".details").style.display = "none";
    }, 600);
  });
});

// Image Preview on Upload and "+" icon for adding more
const fileInput = document.getElementById("fileInput");
const imagePreview = document.getElementById("imagePreview");
const previewContainer = document.getElementById("preview");
const uploadForm = document.getElementById("uploadForm");
const plusIcon = document.querySelector(".upload-more");

// Trigger file input on clicking "+" icon
plusIcon.addEventListener("click", () => {
  fileInput.click();
});

// Show preview of uploaded file
fileInput.addEventListener("change", function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function () {
      imagePreview.setAttribute("src", reader.result);
      previewContainer.style.display = "block";
    };
    reader.readAsDataURL(file);
  } else {
    previewContainer.style.display = "none";
  }
});

// Tags Section: Add and Remove Tags
function addTag(event) {
  if (event.key === "Enter") {
    event.preventDefault(); // Prevent form submission
    const tagsBox = document.getElementById("tagsBox");
    const tagInput = document.getElementById("tagsInput");
    const tagValue = tagInput.value.trim();

    if (tagValue) {
      const tag = document.createElement("div");
      tag.classList.add("tag");
      tag.innerHTML = `${tagValue} <span class="remove" onclick="removeTag(this)">×</span>`;
      tagsBox.appendChild(tag);
      tagInput.value = ""; // Clear input
    }
  }
}

// Remove Tag Function
function removeTag(element) {
  element.parentElement.remove();
}

// Custom Right Click Menu
window.addEventListener("contextmenu", function (e) {
  e.preventDefault();
  const menu = document.getElementById("contextMenu");
  menu.style.display = "block";
  menu.style.top = `${e.pageY}px`;
  menu.style.left = `${e.pageX}px`;
});

// Hide the custom context menu on clicking elsewhere
window.addEventListener("click", function () {
  document.getElementById("contextMenu").style.display = "none";
});

// Context Menu Actions
function refreshPage() {
  location.reload();
}

function viewProduct() {
  alert("Viewing Product");
}

function searchProduct() {
  const searchInput = prompt("Enter product name");
  if (searchInput) {
    alert(`Searching for: ${searchInput}`);
    // Add search logic here
  }
}

// Product Search with Smooth Animation
function performSearch() {
  const searchTerm = document.querySelector("#searchBar").value.toLowerCase();
  const galleryItems = document.querySelectorAll(".gallery-item");

  galleryItems.forEach((item) => {
    const productName = item
      .querySelector(".product-name")
      .textContent.toLowerCase();

    if (productName.includes(searchTerm)) {
      gsap.to(item, { opacity: 1, duration: 0.5, display: "block" });
    } else {
      gsap.to(item, { opacity: 0, duration: 0.5, display: "none" });
    }
  });
}

// Tooltip Functionality
const tooltips = document.querySelectorAll(".tooltip");
tooltips.forEach((tooltip) => {
  const tooltipText = tooltip.querySelector(".tooltiptext");
  tooltip.addEventListener("mouseover", () => {
    gsap.to(tooltipText, { opacity: 1, duration: 0.3 });
  });
  tooltip.addEventListener("mouseout", () => {
    gsap.to(tooltipText, { opacity: 0, duration: 0.3 });
  });
});
