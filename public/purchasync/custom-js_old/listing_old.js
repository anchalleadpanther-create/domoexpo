document.addEventListener("DOMContentLoaded", function () {
    // Function to handle tab switching and content loading
    function handleTabSwitching() {
        document.querySelectorAll('.ps-tab-list li a').forEach(tab => {
            tab.addEventListener('click', function (event) {
                event.preventDefault();  // Prevent default link behavior

                // Get the current URL parts
                const pathParts = window.location.pathname.split('/');

                // Extract the current category (everything after `/p/` but before the tab type)
                const currentCategory = pathParts.slice(2, pathParts.length - 1).join('/');  // This will join all parts between '/p/' and the last part (which is the current tab type)
                console.log("Current Category:", currentCategory);

                // Determine which tab was clicked (product, service, or supplier)
                let tabType;
                const tabHref = this.getAttribute('href');  // href points to tab

                if (tabHref.includes('tab-1')) {
                    tabType = 'product';
                } else if (tabHref.includes('tab-2')) {
                    tabType = 'service';
                } else {
                    tabType = 'supplier';
                }

                // Construct the new URL dynamically, preserving the category and changing only the tab type
                const newUrl = `/p/${currentCategory}/${tabType}`;
                console.log("New URL:", newUrl);

                // Update the URL without reloading the page
                history.pushState(null, '', newUrl);

                // Update the active class on the tabs
                document.querySelectorAll('.ps-tab-list li').forEach(li => li.classList.remove('active'));
                this.parentElement.classList.add('active');  // Add active class to the clicked tab

                // Load the correct content based on the tab type
                loadContent(newUrl, tabType);
            });
        });
    }

    // Function to handle pagination links and loading paginated content dynamically
    function handlePaginationLinks() {
        document.querySelectorAll('.pagination li a').forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();  // Prevent default link behavior

                // Get the current category and current tab type from the URL
                const pathParts = window.location.pathname.split('/');
                const currentCategory = pathParts.slice(2, pathParts.length - 1).join('/');
                const currentTabType = pathParts[pathParts.length - 1];

                // Get the URL for the clicked pagination link
                const nextPageUrl = link.getAttribute('href');

                // Load the content for the new page
                loadContent(nextPageUrl, currentTabType);
            });
        });
    }

    // Function to load content dynamically via AJAX
    async function loadContent(url, tabType = null) {
        // Show the loader while the content is being fetched
        document.getElementById('my-css-loader').style.display = "block";

        try {
            console.log("Loading content from:", url);

            const response = await axios.get(url, { params: { pagetype: tabType } });
            const htmlContent = response.data.html;

            console.log("Tab Type:", tabType);

            // Determine where to append the content (products, services, or suppliers)
            if (tabType === 'product') {
                document.querySelector('.product-listings').innerHTML = htmlContent;
            } else if (tabType === 'service') {
                document.querySelector('.service-listings').innerHTML = htmlContent;
            } else if (tabType === 'supplier') {
                document.querySelector('.supplier-listings').innerHTML = htmlContent;
            }

            // Re-attach pagination links to handle pagination after new content is loaded
            handlePaginationLinks();

            // Optionally reinitialize any scripts after content is replaced
            reinitializeScripts();

        } catch (error) {
            console.error('Error fetching content:', error);
        } finally {
            // Hide the loader once the content is loaded
            document.getElementById('my-css-loader').style.display = "none";
        }
    }

    // Function to reinitialize any necessary scripts after content is replaced
    function reinitializeScripts() {
        // Example: Reinitialize dropdowns or carousels if needed
        // $('.dropdown').dropdown();
        // Add other JS reinitialization logic here
    }

    // Handle initial page load and load appropriate tab content
    const initialPath = window.location.pathname;
    const tabTypeOnLoad = initialPath.split('/').pop();  // Extract the 'product', 'service', or 'supplier' from the URL

    // Load the appropriate tab content on initial page load
    if (tabTypeOnLoad === 'product' || tabTypeOnLoad === 'service' || tabTypeOnLoad === 'supplier') {
        loadContent(initialPath, tabTypeOnLoad);
    }

    // Initialize tab switching and pagination handling
    handleTabSwitching();
    handlePaginationLinks();
});
