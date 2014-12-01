			<? sleep(1); ?>
			<header>
				<div class="container">
					<h1>Fitness Tracker - Food Type</h1>
				</div>
			</header>

			<div class="container content">
				<a class="btn btn-success toggle-modal" data-target="#myModal" href="?action=create">
					<i class="glyphicon glyphicon-plus"></i>
					Add
				</a>
				
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" >
				  <div class="modal-dialog">
				    <div class="modal-content">
<<<<<<< HEAD
				    	<div class="modal-body">
				    		<img src="../content/images/wait.gif" />
=======
				    	<div style="text-align: center">
				    		<img width="150" height="150" src="../content/images/jar-loading.gif" />
>>>>>>> origin/Nov_17
				    	</div>
				    </div>
				  </div>
				</div>
				
				<!-- Alert -->
				<div class="alert alert-success initialy-hidden" id="myAlert">
					<button type="button" class="close" >
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					<div>
						Excelent Job. Your meal has been recorded
					</div>
				</div>
				
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              	<? foreach ($model as $rs): ?>
                <tr>
                  <td><?=$rs['Name']?></td>
                  <td>
					<a title="Edit" class="btn btn-default btn-sm toggle-modal" data-target="#myModal" href="?action=edit&id=<?=$rs['id']?>">
						<i class="glyphicon glyphicon-pencil"></i>
					</a>
					<a title="Delete" class="btn btn-default btn-sm toggle-modal" data-target="#myModal" href="?action=delete&id=<?=$rs['id']?>">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
                  	
                  </td>
                </tr>
                <? endforeach; ?>
              </tbody>
            </table>
          </div>

			</div>

		<script type="text/javascript">
			$(function(){
				$(".food").addClass("active");
				
				var $mContent = $("#myModal .modal-content");
				var defaultContent = $mContent.html();
				$(".toggle-modal").on('click', function(event){
					event.preventDefault();
<<<<<<< HEAD
					$.get(this.href + "&format=plain", function(data){
							$("#myModal .modal-content")
							.html(data)
							.find("form")
							.on('submit', function(event){
								event.preventDefault();
								$.post(this.action, $(this).serialize()  + "&format=json", function(data){
									alert(data);
								}, 'json');
							});
					});
					
=======
>>>>>>> origin/Nov_17
					$("#myModal").modal("show");
					
					$.get(this.href + "&format=plain", function(data){
						$mContent.html(data);
						$mContent.find('form')
						.on('submit', function(e){
							e.preventDefault();
							$("#myModal").modal("hide");
							
							$.post(this.action + '&format=json', $(this).serialize(), function(data){
								$("#myAlert").show().find('div').html(JSON.stringify(data));
							
								$("tr:eq(1)").clone()
								.appendTo('tbody').find('td:eq(0)')
								.text(data.Name);
							}, 'json');
							
							
						});
					});
				})
								
				$('#myModal').on('hidden.bs.modal', function (e) {
					$mContent.html(defaultContent);
				    
				})
				
				$('.alert .close').on('click',function(e){
					$(this).closest('.alert').slideUp();
				});
			});
		</script>
