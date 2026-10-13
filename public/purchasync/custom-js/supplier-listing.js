document.addEventListener("DOMContentLoaded", function () {
    // Function to handle tab switching and content loading
    function handleTabSwitching() {
        document.querySelectorAll('.ps-tab-list li a').forEach(tab => {
            tab.addEventListener('click', function (event) {
                event.preventDefault();  // Prevent default link behavior

                // Get the current category from the URL by splitting after '/s/'
                const currentCategory = window.location.pathname.split('/s/')[1].split('/')[0];

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

                // Construct the new URL dynamically
                const newUrl = `/s/${currentCategory}/${tabType}`;
                // console.log("New URL:", newUrl);

                // Update the URL without reloading the page
                history.pushState(null, '', newUrl);

                // Update the active class on the tabs
                document.querySelectorAll('.ps-tab-list li').forEach(li => li.classList.remove('active'));
                if(tabType == 'supplier'){
                    // document.querySelectorAll('.product-filter-element').forEach(li => li.classList.remove('d-none'));
                    document.querySelectorAll('.seller-filter-element').forEach(li => li.classList.remove('d-none'));
                }else{
                    // document.querySelectorAll('.product-filter-element').forEach(li => li.classList.add('d-none'));
                    document.querySelectorAll('.seller-filter-element').forEach(li => li.classList.add('d-none'));
                }
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
                const currentCategory = window.location.pathname.split('/s/')[1].split('/')[0];
                const currentTabType = window.location.pathname.split('/')[3];

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
    const tabTypeOnLoad = initialPath.split('/')[3];  // Extract the 'product', 'service', or 'supplier' from the URL

    // Load the appropriate tab content on initial page load
    if (tabTypeOnLoad === 'product' || tabTypeOnLoad === 'service' || tabTypeOnLoad === 'supplier') {
        loadContent(initialPath, tabTypeOnLoad);
    }

    // Initialize tab switching and pagination handling
    handleTabSwitching();
    handlePaginationLinks();









    // Function to apply filters and update the URL with filter parameters
    function applyFilters() {
        // Get selected filter values
        // const filter_by_quality_certificates = Array.from(document.querySelectorAll("input[name='filter_by_quality_certificates[]']:checked")).map(checkbox => checkbox.value);
        // const filter_by_sustainability_certificates = Array.from(document.querySelectorAll("input[name='filter_by_sustainability_certificates[]']:checked")).map(checkbox => checkbox.value);
        // const filter_by_other_certificates = Array.from(document.querySelectorAll("input[name='filter_by_other_certificates[]']:checked")).map(checkbox => checkbox.value);

        const filter_by_quality_certificates = Array.from(document.querySelectorAll("input[name='filter_by_quality_certificates[]']:checked")).map(checkbox => checkbox.value);
        const filter_by_sustainability_certificates = Array.from(document.querySelectorAll("input[name='filter_by_sustainability_certificates[]']:checked")).map(checkbox => checkbox.value);
        const filter_by_other_certificates = Array.from(document.querySelectorAll("input[name='filter_by_other_certificates[]']:checked")).map(checkbox => checkbox.value);
        const filter_by_seller_office_country = Array.from(document.querySelectorAll("input[name='filter_by_seller_office_country[]']:checked")).map(checkbox => checkbox.value);
        const suppllier_described_seller = Array.from(document.querySelectorAll("input[name='suppllier_described_seller[]']:checked")).map(checkbox => checkbox.value);
        
        
        
        const sortby = Array.from(document.querySelectorAll("select[name='sortBy']")).map(selectBox => selectBox.value);

        // Get current category and tab type from the URL
        const currentCategory = window.location.pathname.split('/s/')[1].split('/')[0];
        const currentTabType = window.location.pathname.split('/')[3];

        const params = {
            sortby: sortby.join(","),
            // supplier filter
            filter_by_quality_certificates: filter_by_quality_certificates.join(","),
            filter_by_sustainability_certificates: filter_by_sustainability_certificates.join(","),
            filter_by_other_certificates: filter_by_other_certificates.join(","),
            filter_by_seller_office_country : filter_by_seller_office_country.join(","),
            suppllier_described_seller : suppllier_described_seller.join(",")
        };

        const queryString = Object.entries(params)
            .filter(([key, value]) => value) // Exclude empty or falsy values
            .map(([key, value]) => `${key}=${value}`)
            .join("&");

        const url = `/s/${currentCategory}/${currentTabType}?${queryString}`;

        // const url = `/s/${currentCategory}/${tabType}`;


        // Construct the URL path with filters
        // const url = `/p/${currentCategory}/${currentTabType}?brands=${selectedBrands.join(",")}&colors=${selectedColors.join(",")}&sortby=${sortby.join(",")}&filter_by_price=${filter_by_price.join(",")}`; // Fixed the equal sign

        // Update the URL without reloading the page
        window.history.pushState(null, null, url);
        // Load content dynamically
        loadContent(url, currentTabType);
    }

    // Attach event listeners to checkboxes
    // document.querySelectorAll("input[name='filter_brands[]'], input[name='filter_by_color[]']").forEach(checkbox => {
    //     checkbox.addEventListener("change", applyFilters);
    // });
    
    const filters_input_names = [
        "filter_by_quality_certificates[]",
        "filter_by_sustainability_certificates[]",
        "filter_by_other_certificates[]",
        "filter_by_seller_office_country[]",
        "suppllier_described_seller[]",
        
    ];

    const selector = filters_input_names.map(name => `input[name='${name}']`).join(',');
    document.querySelectorAll(selector).forEach(checkbox => {
        checkbox.addEventListener("change", applyFilters);
    });

    // document.querySelectorAll("input[name='filter_by_quality_certificates[]'],input[name='filter_by_sustainability_certificates[]'],input[name='filter_by_other_certificates[]']").forEach(checkbox => {
    //     checkbox.addEventListener("change", applyFilters);
    // });

    // Attach event listener to the sortBy select
    document.querySelectorAll("select[name='sortBy']").forEach(selectBox => {
        console.log("calling");

        selectBox.addEventListener("change", applyFilters);
    });
});
