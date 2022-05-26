<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center"
		style="z-index: 2;">
		<div class="modal-overlay absolute w-full h-full"
			style="backdrop-filter: blur(5px); background-color: rgba(0, 0, 0, 0.253);"></div>

		<div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded-3xl shadow-lg z-50 overflow-y-auto">

			<div class="modal-content py-4 text-left px-6">
				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-2xl font-bold">Hého</p>
					<div class="modal-close cursor-pointer z-50">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
							viewBox="0 0 18 18">
							<path
								d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
							</path>
						</svg>
					</div>
				</div>

				<!--Body-->
				<p class="my-5">
					Tu t'aprètes à télécharger notre super jeu UNO ! <br>
					Veux tu continuer ?
				</p>

				<!--Footer-->
				<div class="flex justify-end pt-2">
					<a href="../download/uno.py" download="Le jeu trop cool qu'il faut avoir.py">
						<button class="transition ease-in-out lg:rounded-l-mdbg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 modal-close px-4 bg-blue-500 p-3 rounded-full text-white hover:bg-blue-600"> 
							OUI !
						</button>
					</a>
				</div>

			</div>
		</div>
	</div>
	<!-- Modal's script -->
	<script>
		var openmodal = document.querySelectorAll('.modal-open')
		for (var i = 0; i < openmodal.length; i++) {
			openmodal[i].addEventListener('click', function (event) {
				event.preventDefault()
				toggleModal()
			})
		}

		const overlay = document.querySelector('.modal-overlay')
		overlay.addEventListener('click', toggleModal)

		var closemodal = document.querySelectorAll('.modal-close')
		for (var i = 0; i < closemodal.length; i++) {
			closemodal[i].addEventListener('click', toggleModal)
		}

		document.onkeydown = function (evt) {
			evt = evt || window.event
			var isEscape = false
			if ("key" in evt) {
				isEscape = (evt.key === "Escape" || evt.key === "Esc")
			} else {
				isEscape = (evt.keyCode === 27)
			}
			if (isEscape && document.body.classList.contains('modal-active')) {
				toggleModal()
			}
		};


		function toggleModal() {
			const body = document.querySelector('body')
			const modal = document.querySelector('.modal')
			modal.classList.toggle('opacity-0')
			modal.classList.toggle('pointer-events-none')
			body.classList.toggle('modal-active')
		}


	</script>