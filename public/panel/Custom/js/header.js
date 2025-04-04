// Automatically save and restore the user's chosen sidebar size using localStorage.
document.addEventListener("DOMContentLoaded", function () {
    let body = document.body;

    // Load the saved sidebar size from localStorage
    let savedSize = localStorage.getItem("sidebarSize");
    if (savedSize) {
        body.setAttribute("data-sidebar-size", savedSize);
    }

    // Listen for attribute changes on <body> (in case the template modifies it dynamically)
    const observer = new MutationObserver(mutations => {
        mutations.forEach(mutation => {
            if (mutation.attributeName === "data-sidebar-size") {
                let newSize = body.getAttribute("data-sidebar-size");
                localStorage.setItem("sidebarSize", newSize); // Save the new size
            }
        });
    });

    // Start observing changes in <body> attributes
    observer.observe(body, { attributes: true });
});




