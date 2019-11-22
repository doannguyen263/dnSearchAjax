(function($) {

  $.fn.dntheme_search = function(options) {
    var _this = this;
    var settings = $.extend({
      length_search: 3
    },options);

    this.each(function(index, value){
      _self =  $(this)
      var dnsearch_results = $( "<div id='dnsearch_results"+index+"' class='dnsearch_results dnsearch-"+index+"' data-dnsearch-id='dnsearch-"+index+"''>Loading ...</div>" )
      box_create(dnsearch_results,_self,index)
      _self.attr('data-dnsearch','dnsearch-'+index);

      var x_timer; 
      _self.on( "change keydown input",function(e) {
        _self_this = $(this)
        dnsearch_results.show();
        var key_search = _self_this.val();
        clearTimeout(x_timer);
          x_timer = setTimeout(function(e) {
          if(key_search.length > settings.length_search){
            var query = _self_this.attr('data-query')
            box_search(dnsearch_results,query,key_search);
          }else{
            dnsearch_results.hide().empty();
          }
        }, 1000);

      });

      box_close(dnsearch_results);
    });

    $('.dnsearch_results').on( "click",'.item__wrap',_box_select); // Select item
    
    function box_create(dnsearch_results,_this,index) {
      var box_offset = _this.offset();
      var box_height = _this.innerHeight();
      var box_width = _this.outerWidth();
      
      $('body').addClass('dnsearch--active')
      create_box = dnsearch_results.insertAfter('body')
      dnsearch_results.css({"position":"absolute","top":box_offset.top + box_height,'left':box_offset.left,'width':box_width,"z-index":999})

    }
    function box_search(dnsearch_results,query,key_search) {
      $.ajax({
            type : 'POST',
            url : dntheme_params.ajax_url,
            data : {
                action : 'dnsearch_ajax',
                data : key_search,
                query : query
            },
            success : function( data ) {
              dnsearch_results.html(data)
            },
            error : function(jqXHR, textStatus) {
              dnsearch_results.html(textStatus)
            }
       });
    }

    // Close box
    $(this).click(function(e){
      e.stopPropagation();
      $(this).show();
    });

    function _box_select() {
      dnsearch_id = $(this).parents('.dnsearch_results').attr('data-dnsearch-id');
      option_val = $(this).text().trim();
      $("[data-dnsearch="+dnsearch_id+"]").val(option_val).change();
      box_close($(this));
      }

    function box_close(_this) {
      $(document).click(function(e){
        $('body').removeClass('dnsearch--active')
        _this.hide();
      });
    }
    
    return _this;
  }
  $('.search__field').dntheme_search();
})(jQuery);
