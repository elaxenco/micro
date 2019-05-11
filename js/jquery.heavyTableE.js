(function($) {
  $.fn.heavyTable = function(params) {

    params = $.extend( {
      startPosition: {
        x: 1,
        y: 1
      }
    }, params);

    this.each(function() {
      var 
        $hTable = $(this).find('tbody'),
        i = 0,
        x = params.startPosition.x,
        y = params.startPosition.y,
        max = {
          y: $hTable.find('tr').length,
          x: $hTable.parent().find('th').length
        };
        
      //console.log(xMax + '*' + yMax);
      
      function clearCell () {    
        content = $hTable.find('.selected input').val();
        $hTable.find('.selected').html(content);
        $hTable.find('.selected').toggleClass('selected');
      }

      function selectCell () {
        if ( y > max.y ) y = max.y;
        if ( x > max.x ) x = max.x;
        if ( y < 1 ) y = 1;
        //campos editables
        if ( x <8 || x>7) x =8;
        currentCell = 
         $hTable
            .find('tr:nth-child('+(y)+')')
            .find('td:nth-child('+(x)+')');
        content = currentCell.html();
        currentCell
          .toggleClass('selected')
        return currentCell;
      }
      
      function edit (currentElement) {
        var input = $('<input style="width:3em;"  min="0" type="number">', {type: "text"})
          .val(currentElement.html())
        currentElement.html(input)
        input.focus(); 
      }

      $hTable.find('td').click( function () {
        clearCell();
        x = ($hTable.find('td').index(this) % (max.x) + 1);
        y = ($hTable.find('tr').index($(this).parent()) + 1);
        edit(selectCell());
      });

      $(document).keydown(function(e){
        if (e.keyCode == 13) {
          clearCell(); 

          var table = document.querySelector("table");
        var data  = parseTable(table);   
        var total=0;

        console.log(data);
    
            for(var i=0;i<data.length;i++){
              

               var cobranza = parseInt($("#co"+data[i].Id).html());
                var pren = parseInt($("#pr"+data[i].Id).html());
               var cren = parseInt($("#ctr"+data[i].Id).html());
               var reno =  parseInt($("#ren"+data[i].Id).html());
               var comren = parseInt($("#cmr"+data[i].Id).html()); 
               var comp = parseInt($("#cmp"+data[i].Id).html()); 

               
               var ctnuevos = parseInt(data[i].CN);
               var comicn =ctnuevos*50;
               var dctnuevos= ctnuevos*2000;
             


               if(data[i].Id>0){
                    if(data[i].CN>0  ){ 

                        var tcobranza =cobranza+pren-reno-dctnuevos-(cren*50)-comicn-comp;

                      $("#dctn"+data[i].Id).html(dctnuevos.toFixed(2));
                      $("#cmn"+data[i].Id).html(comicn.toFixed(2));
                      $("#eo"+data[i].Id).html(tcobranza.toFixed(2));
     
                      
                      total+=tcobranza;

                      console.log(total);
                    }
                    else{

                       $("#dctn"+data[i].Id).html('0.00');
                       $("#cmn"+data[i].Id).html('0.00');

                       var tcobranza =cobranza+pren-reno-(cren*50)-comp;

                        total+=tcobranza;

                       $("#eo"+data[i].Id).html(tcobranza.toFixed(2));

                       console.log(total);
                    } 
                }
            }

            $("#tdTotal").html(total.toFixed(2));
        } 
      }); 
    });
  };
})(jQuery);
