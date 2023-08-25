let list = document.querySelectorAll(".navigation li");

function activeLink() {
  // Menghapus kelas 'active' dari semua item
  list.forEach((item) => {
    item.classList.remove("active");
  });
  // Menambahkan kelas 'active' ke item yang diklik
  this.classList.add("active");
}

// Menambahkan event listener 'mouseover' (hover)
list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menambahkan event listener 'click'
list.forEach((item) => item.addEventListener("click", activeLink));

document.addEventListener("DOMContentLoaded", function () {
  // Skrip JavaScript Anda
  let toggle = document.querySelector(".toggle");
  let navigation = document.querySelector(".navigation");
  let main = document.querySelector(".main");

  toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
  };
});
