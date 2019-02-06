/* eslint-disable */
(function($){

   
    
    function search(){
        
    }
    
    $(document).ready(function(){
        if($('#rehber_search').hasClass('rehber_search')){

            var form = $('#rehber_search_form');
            var table = $('#rehber_table tbody');
            form.submit(function(e){
                e.preventDefault();
                search();
            });
            function clearTable(){
                table.html("");
            }
            function drawTable(data) {
                if(data.length>0) {
                    for (var i = 0; i < data.length; i++) {
                        drawRow(data[i]);
                    }
                }
                else{
                    drawEmptyResponse();
                }
            }
           
            function drawRow(kisi) {
                var row = $("<tr />")
                table.append(row); 
                row.append($("<td>" + kisi['Ad Soyad'] + "</td>"));
                row.append($("<td>" + kisi['Gorev Unvan'] + "</td>"));
                row.append($("<td>" + kisi['Gorev Birim'] + "</td>"));
                row.append($("<td>" + kisi['Telefon'] + "</td>"));
                row.append($("<td>" + kisi['Oda No'] + "</td>"));
                row.append($("<td>" + kisi['Faks'] + "</td>"));
                row.append($("<td>" + kisi['Birim Telefon'] + "</td>"));
                if(kisi['E-Posta'].length>1)
                {
    
                    row.append($("<td style='text-align:center'> <a href='mailto:" + kisi['E-Posta'] + "'><i class='fa fa-envelope'></i></a> </td>"));
                }
                else{
                    row.append($('<td/>'));
                }
                if(kisi['Web Sayfa'].length>7){
    
                    row.append($("<td  style='text-align:center'> <a href='" + kisi['Web Sayfa'] + "' target='_blank' style='text-decoration:none'><i class='icon-globe-network'></i></a></td>"));
                }
                else{
                    row.append($('<td/>'));
                }
                
            }
            function drawEmptyResponse(){
                var row = $("<tr />");
                table.append(row);
                row.append($("<td colspan='9'>Kayıt bulunamadı!!!Lütfen, arama kriterinizi kontrol edip tekrar deneyiniz ...</td>"));
    
            }
            function search() {
                clearTable();
                var formData = {
                    "langid": $('html').attr('lang') == 'tr_TR' ? "tr":"en",
                    "qj": form.find('input.search-field').val()
                }
                $.ajax({
                    type: 'GET',
                    url: 'http://rehber.iyte.edu.tr/index.php',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        //console.log(result);
                        drawTable(result);
                    },
                    error: function (err) {
                        console.log('error: ', err);
                    }
    
                });
            }
            //do we have the query_var s
            if(form.find('input.search_field').val() != ""){
                search();
            }
        }
        

    });
})(jQuery);