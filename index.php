<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>dnSearchAjax</title>
  </head>
  <body>
    <div class="container">
      <style>
        .dnsearch_results{background:#fff;border:1px solid #3c8dbc;display:none;}
        .dnsearch_results .item__wrap:not(:last-child){border-bottom:1px solid #3c8dbc;}
        .dnsearch_results .item__wrap{padding:10px;line-height:normal;}
      </style>
 
        <div class="form__search mt-5">
			<div class="row mb-3">
				<div class="col-md-12">
					<label for="">Search Post Type</label>
					<input type="text"  class="search__field" value="" data-query='{"post_type":"hosting","posts_per_page":3}' placeholder="Search">
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-12">
					<label for="">Search Metabox</label>
					<input type="text" class="search__field" value="" data-query='{"post_type":"hosting","posts_per_page":3,"meta_query":"my_meta_key",}' placeholder="Search">
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-12">
					<label for="">Search Taxonomy</label>
					<input type="text" class="search__field" value="" data-query='{"post_type":"hosting","posts_per_page":3,"taxonomy":"my_taxonomy_key"}' placeholder="Search">
				</div>
			</div>
		</div>
            
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
