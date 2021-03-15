		</div>

	    <!-- Optional JavaScript -->

	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

	    <script src="./asset/js/jquery-3.4.1.min.js"></script>

	    <script src="./asset/js/bootstrap.bundle.js"></script>

	    <script src="./asset/js/bootstrap.min.js"></script>

	    <script>

	    	$(document).ready(function() {

				$('#provinsi').append('<option value="">Loading...</option>')

	    		$.ajax({

	    			type: "GET",

	    			dataType: "html",

	    			url: "data-provinsi.php",

	    			success: function(msg){

	    				$("select#provinsi").html(msg)

			    		$('#provinsi').removeAttr('disabled')

	    			}

				})

				$('#provinsi').on('change', function() {

					let provinsi_id = $(this).val()

		    		document.getElementById('kota').setAttribute('disabled', 'true')

		    		$('#layanan').empty()

		    		document.getElementById('layanan').setAttribute('disabled', 'true')



					$.ajax({

		    			type: "POST",

		    			dataType: "html",

		    			data:"prov_id="+provinsi_id,

		    			url: "data-kota.php",

		    			success: function(data){

		    				$("select#kota").html(data)

				    		$('#kota').removeAttr('disabled')



							let idkotaku = $("#kota option:selected").val()

				        	$("#id_kota").val(idkotaku);

		    			}

					})

				})

				$('#kota').on('change', function() {

		    		$('#kurir').removeAttr('disabled')

		    		let id_kota = $("#kota option:selected").val()

		    		let nama_kota = $("#kota option:selected").attr("namakota")

		    		$('#id_kota').val(id_kota)

		    		$('#namakota').remove()

    				$("#divkota").append('<input type="hidden" id="namakota" name="namakota" value="'+nama_kota+'">')

		    		$('#layanan').empty()

		    		document.getElementById('layanan').setAttribute('disabled', 'true')

				})

				$('#kurir').on('change', function() {

					let kurirkode = $("#kurir option:selected").val()

					$("#kodekurir").val(kurirkode)

					let kotatujuan = $("input[name=id_kota]").val()

					let berat = $("#berat").val()

					$('#layanan').append('<option value="">Loading...</option>')

					$('#input_hargalayanan').remove()

					$('#cost').remove()



					$.ajax({

		    			type: "POST",

		    			dataType: "html",

		    			data:"courier="+kurirkode+"&destination="+kotatujuan+"&weight="+berat,

		    			url: "data-layanan.php",

		    			success: function(data){

		    				$("select#layanan").html(data);

				    		$('#layanan').removeAttr('disabled')



		    				let pilihKurir = $("#layanan option:selected, this").attr("hargaKurir")

							$('#hargalayanan').append('<input type="hidden" name="input_hargalayanan" id="input_hargalayanan" class="form-control" value="'+pilihKurir+'">')

							let hargalayanan = $('#input_hargalayanan').val()

							let intOngkir = parseInt(hargalayanan)

							let format_ongkir = intOngkir.toLocaleString(

								undefined,

								{ minimumFractionDigits: 0 }

							)

							$('#formbayar').append('<input type="hidden" id="cost" name="cost" class="form-control" value="'+intOngkir+'">')

							$('#th_ongkir').empty()

							$('#th_ongkir').append('Rp '+format_ongkir)



							let subtotal = <?= $totalbelanja ?>;

							let total = parseInt(subtotal) + parseInt(hargalayanan)

							let format_total = total.toLocaleString(

								undefined,

								{ minimumFractionDigits: 0 }

							)

							$('#formbayar').append('<input type="hidden" id="amount" name="amount" class="form-control" value="'+total+'">')

							$('#th_total').empty()

							$('#th_total').append('Rp '+format_total)

		    			}

					})

				})

				$('#layanan').on('change', function() {

					let pilihKurir = $("#layanan option:selected, this").attr("hargaKurir")

					$('#input_hargalayanan').val(pilihKurir)

					let hargalayanan = $('#input_hargalayanan').val()

					let intOngkir = parseInt(hargalayanan)

					let format_ongkir = intOngkir.toLocaleString(

						undefined,

						{ minimumFractionDigits: 0 }

					)

					$('#cost').val(intOngkir)

					$('#th_ongkir').empty()

					$('#th_ongkir').append('Rp '+format_ongkir)

					

					let subtotal = <?= $totalbelanja ?>;

					let total = parseInt(subtotal) + parseInt(hargalayanan)

					let format_total = total.toLocaleString(

						undefined,

						{ minimumFractionDigits: 0 }

					)

					$('#amount').val(total)

					$('#th_total').empty()

					$('#th_total').append('Rp '+format_total)

				})

			})

	    </script>

	</body>

</html>