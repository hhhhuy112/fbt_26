$(document).ready( function () {
    function totalprice() {
        var price = $('#total').val();
        function compute() {
            var numberPassengers = $('#capacity').val();
            var discount = $('#package').val();
            var total = numberPassengers * price * discount / 100;
            $('#total').val(total);
        }
        $('#capacity, #package').change(compute);
    }
    totalprice();

    function openBlock(event, blockName) {
        for (var i = 0; i < 3; i++) {
            $('.tabcontent')[i].style.display = "none";
        }
        var tablinks = $('.tablinks');
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace("active", "");
        }
        document.getElementById(blockName).style.display = "block";
        event.currentTarget.className += " active";
    }
    $('#blocka').on('click', openBlock(event, 'description'))
    $('#blockb').on('click', openBlock(event, 'booking'))
    $('#blockc').on('click', openBlock(event, 'review'))
    $('.defaultOpen').click();
});
