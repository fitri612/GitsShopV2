$(function () {
    //The passed argument has to be at least a empty object or a object with your desired options
    //$("body").overlayScrollbars({ });
    $("#items").height(552);
    $("#items").overlayScrollbars({
        overflowBehavior: {
            x: "hidden",
            y: "scroll",
        },
    });
    $("#cart").height(445);
    $("#cart").overlayScrollbars({});
});
function incrementValue() {
    var inputElement = document.getElementById("amountInput");
    var currentValue = parseInt(inputElement.value);
    inputElement.value = currentValue + 1;
}

function decrementValue() {
    var inputElement = document.getElementById("amountInput");
    var currentValue = parseInt(inputElement.value);
    if (currentValue > 1) {
        inputElement.value = currentValue - 1;
    }
}

// Ambil semua elemen tab
const tabs = document.querySelectorAll(".nav-link");

// Tambahkan event listener pada setiap tab
tabs.forEach((tab) => {
    tab.addEventListener("click", (e) => {
        e.preventDefault();
        // Hapus kelas 'active' dari semua tab
        tabs.forEach((tab) => tab.classList.remove("active"));
        // Tambahkan kelas 'active' ke tab yang diklik
        e.target.classList.add("active");
        // Ambil target elemen tab-pane dan hapus kelas 'active' dari semua elemen tab-pane
        const target = document.querySelector(e.target.getAttribute("href"));
        const tabPanes = document.querySelectorAll(".tab-pane");
        tabPanes.forEach((pane) => pane.classList.remove("active"));
        // Tambahkan kelas 'active' ke elemen tab-pane yang sesuai dengan target
        target.classList.add("active");
    });
});

$(document).ready(function () {
    // inisialisasi category_id dengan nilai all
    let category_id = "all";

    // ketika link kategori di klik, ubah nilai category_id
    $("#category-nav a").on("click", function (e) {
        e.preventDefault();
        category_id = $(this).data("category-id");
        filterProducts(category_id);
    });

    // fungsi untuk filter produk
    function filterProducts(category_id) {
        // ambil semua produk
        let products = $(".col-md-3");

        // jika category_id bukan all, filter produk berdasarkan category_id
        if (category_id !== "all") {
            products = products.filter(function () {
                return $(this).data("category-id") == category_id;
            });
        }

        // sembunyikan semua produk, kemudian tampilkan produk yang telah difilter
        $(".col-md-3").hide();
        products.show();
    }
});

function searchByName() {
    // Ambil nilai input search
    let input = document.getElementById("searchInput");
    let filter = input.value.toUpperCase();

    // Ambil semua product cards
    let productCards = document.getElementsByClassName("card-product");

    // Looping semua product cards
    for (let i = 0; i < productCards.length; i++) {
        let productName = productCards[i].getElementsByClassName("title")[0];
        let productNameText = productName.textContent || productName.innerText;

        // Cek apakah product name match dengan search query
        if (productNameText.toUpperCase().indexOf(filter) > -1) {
            productCards[i].style.display = "";
        } else {
            productCards[i].style.display = "none";
        }
    }
}
