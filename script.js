
// Number gen

    document.addEventListener('DOMContentLoaded', function() {
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    
        // Default open the 'View' tab
        document.getElementsByClassName('tablinks')[0].click();
    });

    // auto comma in number

     // Function to format numbers with commas and dots
     function formatNumberWithCommaAndDot(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Function to format input field value when it changes
    function formatInputValue(inputId) {
        var inputElement = document.getElementById(inputId);
        inputElement.value = formatNumberWithCommaAndDot(inputElement.value);
    }

    // Add event listeners to input fields for formatting
    document.getElementById("V_ElectricPerYear").addEventListener("input", function () {
        formatInputValue("V_ElectricPerYear");
    });

    document.getElementById("V_ElectricPerMonth").addEventListener("input", function () {
        formatInputValue("V_ElectricPerMonth");
    });