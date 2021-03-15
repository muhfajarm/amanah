		</div>

	    <!-- Optional JavaScript -->

	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

	    <script src="./asset/js/jquery-3.4.1.min.js"></script>

	    <script src="./asset/js/bootstrap.bundle.js"></script>

	    <script src="./asset/js/bootstrap.min.js"></script>

	    <script>

	    	$(document).ready(function() {

	    		$.ajax({

	    			type: "GET",

	    			dataType: "html",

	    			url: "data-provinsi.php",

	    			success: function(msg){

	    				$("select#provinsi").html(msg);

	    			}

				})

	    		$('#provinsi').on('change', function() {

					let provinsi_id = $(this).val()



					$.ajax({

		    			type: "POST",

		    			dataType: "html",

		    			data:"prov_id="+provinsi_id,

		    			url: "data-kota.php",

		    			success: function(data){

		    				$("select#kota").html(data);

		    			}

					})

				})

				$("#ongkir").submit(function(e) {

			      e.preventDefault();

			      $.ajax({

			          url: 'cek-ongkir.php',

			          type: 'post',

			          data: $( this ).serialize(),

			          success: function(data) {

			            document.getElementById("response_ongkir").innerHTML = data;

			          }

			      })

				})

			})

	    </script>

	    <script>
	    	addEventListener('load',function loadstok(id_produk){
  				let stok = $('#stok').val()
  				let card = document.getElementById("produk-"+id_produk)
	            if (stok <= 0) {
		            // card.className = "d-none"
		            console.log(stok)
		        }
			});
	        // function loadstok(id_produk){
	        // 	let stok = $('#stok').val()
	        //     let card = document.getElementById("produk-"+id_produk)
	        //     if (stok <= 0) {
		       //      card.className = "d-none"
		       //      consolo.log(card)
		       //  }

	        // }

	    </script>

	    

	    <script>

	        function increment_quantity(id_produk){

	            let inputQuantityElement = $("#input-quantity-"+id_produk)
	            let stok = $("#stok").val()
	            if ($(inputQuantityElement).val()==stok) {
	            	return
	            }
	            let newQuantity = parseInt($(inputQuantityElement).val())+1

	            update_to_qty(id_produk, newQuantity)

	        }

	        

	        function decrement_quantity(id_produk){

	            let inputQuantityElement = $("#input-quantity-"+id_produk)

	            if($(inputQuantityElement).val()>1){

    	            let newQuantity = parseInt($(inputQuantityElement).val())-1

    	            update_to_qty(id_produk, newQuantity)

	            }

	        }

	        

	        function update_to_qty(id_produk, new_quantity){

	            $('#input-quantity-'+id_produk).remove()

	            $('#divqty').append('<input id="input-quantity-'+id_produk+'" min="1" max="" name="qty" value="'+new_quantity+'" required="">')

	            $('#qty-ongkir').remove()

	            $('#qtyongkir').append('<input type="hidden" id="qty-ongkir" name="qty-ongkir" value="'+new_quantity+'">')

	        }

	    </script>

	</body>

</html>