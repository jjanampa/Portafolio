window.tooltip = function (){
    return {
        init: function () {
            let elements = document.querySelectorAll(".tooltip-inline");
            elements.forEach(function (element) {
                let content = element.getAttribute("title");
                let div = document.createElement("div");
                div.setAttribute("role", "tooltip");
                div.setAttribute("class", "absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700");
                div.innerHTML = content + '<div class="tooltip-arrow" data-popper-arrow></div>';
                element.after(div);
                let tooltip = new Tooltip(div, element);
            });
        }
    }
}();
window.tooltip.init()
