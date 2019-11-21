(function($) {
  $.fn.dntheme_search = function(options) {
    var _this = this;
    var settings = $.extend({
      length_search: 3
    },options);

    this.each(function(index, value){
      _self =  $(this)
      var dnsearch_results = $( "<div id='dnsearch_results"+index+"' class='dnsearch_results' data-dnsearch='dnsearch-"+index+"''>Loading ...</div>" )
      box_create(dnsearch_results,_self,index)

      _self.keyup(function(e) {
        dnsearch_results.show()
        e.stopPropagation();
        var key_search = $(this).val();
        if(key_search.length > settings.length_search){
          var postType = $(this).attr('data-postType')
          box_search(dnsearch_results,postType,key_search);
        }
      });
      box_close(dnsearch_results);
    });
    
    function box_create(dnsearch_results,_this,index) {
      var box_offset = _this.offset();
        var box_height = _this.innerHeight();
        var box_width = _this.outerWidth();
      
      $('body').addClass('dnsearch--active')
      create_box = dnsearch_results.addClass('tez'+index).insertAfter('body')
      dnsearch_results.css({"position":"absolute","top":box_offset.top + box_height,'left':box_offset.left,'width':box_width})

    }
    function box_search(dnsearch_results,postType,key_search) {
      console.log(postType)
      $.ajax({
            type : 'post',
            url : dntheme_params.ajax_url,
            data : {
                action : 'dnsearch_ajax',
                data : key_search,
                postType : postType
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
      // dnsearch_results.empty();
      console.log($(this))
      $(this).show();
    });
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
