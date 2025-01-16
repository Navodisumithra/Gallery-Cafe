document.addEventListener("DOMContentLoaded", function() {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const searchInput = document.querySelector(".search-bar");
    const menuItemsContainer = document.getElementById("menu-items");

    filterButtons.forEach(button => {
        button.addEventListener("click", function() {
            filterButtons.forEach(btn => btn.classList.remove("active"));
            button.classList.add("active");
            filterItems(button.dataset.filter);
        });
    });

    searchInput.addEventListener("input", function() {
        filterItems(getActiveFilter());
    });

    function filterItems(category) {
        const items = menuItemsContainer.querySelectorAll(".food-item");
        items.forEach(item => {
            const matchesCategory = category === "all" || item.dataset.category === category;
            const matchesSearch = item.querySelector(".food-name").textContent.toLowerCase().includes(searchInput.value.toLowerCase()) ||
                                   item.querySelector(".food-cuisine").textContent.toLowerCase().includes(searchInput.value.toLowerCase());
            if (matchesCategory && matchesSearch) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    }

    function getActiveFilter() {
        return document.querySelector(".filter-btn.active").dataset.filter;
    }
});
