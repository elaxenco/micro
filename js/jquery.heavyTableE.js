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
        var input = $('<input style="width:4.5em;"  min="0" type="number">', {type: "text"})
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
          totalPagos();
        } 
      }); 
    });
  };
})(jQuery);
