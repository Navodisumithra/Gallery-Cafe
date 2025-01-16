document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const foodItems = document.querySelectorAll('.food-items .item');

    
    foodItems.forEach(item => {
        item.classList.add('show');
    });

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');

            
            foodItems.forEach(item => {
                item.classList.remove('show', 'fade-in');
            });

            
            foodItems.forEach(item => {
                if (item.classList.contains(filter)) {
                    item.classList.add('fade-in');
                }
            });

            
            setTimeout(() => {
                foodItems.forEach(item => {
                    if (item.classList.contains('fade-in')) {
                        item.classList.add('show');
                    }
                });
            }, 10);
        });
    });
});

