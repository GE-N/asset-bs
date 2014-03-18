$(document).ready(function() {

    // On start
    $('#device_id_label').hide();
    $('#phoneSelect').hide();
    $('#accessorySelect').hide();
    $('#simcardSelect').hide();

    var type = getUrlVar('type');
    if ('phone' === type)        { selectTypePhone(); }
    else if ('accessory' === type)    { selectTypeAccessory(); }
    else if ('sim' === type)          { selectTypeSim(); }

    // ::Function

    // phone type selected
    function selectTypePhone () {
        $('#device_id_label').show();
        $('#phoneSelect').show();
        $('#accessorySelect').hide();
        $('#simcardSelect').hide();
    }
    
    // accessory type selected
    function selectTypeAccessory () {
        $('#device_id_label').show();
        $('#phoneSelect').hide();
        $('#accessorySelect').show();
        $('#simcardSelect').hide();
    }

    function selectTypeSim () {
        $('#device_id_label').show();
        $('#phoneSelect').hide();
        $('#accessorySelect').hide();
        $('#simcardSelect').show();
    }

    // https://gist.github.com/alkos333/1771618
    function getUrlVar(key){
        var result = new RegExp(key + "=([^&]*)", "i").exec(window.location.search); 
        return result && unescape(result[1]) || ""; 
    }

    // ::Action

    $('#optPhone').click(function() {
        selectTypePhone();
    });

    $('#optAccessory').click(function(){ 
        selectTypeAccessory();
    });

    // simcard type selected
    $('#optSim').click(function() {
        selectTypeSim();
    })

    // calendar input
    $('.datepicker').datepicker({

    });
});