$(document).ready(function(){
    $("#ikea").hide();
    $('#appbundle_gestionretour_donneurOrdre').on('change', function() {
        if ( this.value === '1')
        {
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

            $("#ikea").show();
            $("#appbundle_gestionretour_dateDemandeDsa").val(today);

        }
        else
        {
            $("#ikea").hide();
            $("#appbundle_gestionretour_dateDemandeDsa").val("2000-01-01");
        }
    });
});
