
  
  <a href="#top" id="top-button">
    <i class="icon-angle-up"></i>
  </a>
  <div class="row">
    
  </div> 
  

  
  <div class="row mt mb">
    <div class="col-md-12">
     

      <div class="large-12 small-12 normal lpad" id="list-data">
        
     
        
        </div>


    </div>
  </div>

  <script>
				        $(window).on('load', function() {
							getQuestionsAndAnswers();
						});

						function getQuestionsAndAnswers(){
             var category = $('#select_category').val();
						$.ajax({
									method: 'GET',
									url: 'usershome/show_questions_and_answers/'+category,
									processData: false,
									contentType: false,
								})
								.done(function(data) {
                                    $('#list-data').html(data);
								
								});
             

                             }

                        $(document).on('click','.my_profile', function(){
                            var user_id = $(this).attr('data-id');
                            $('#user_id_in_modal').val(user_id);
                            $('#profile_modal').modal('show');
                        });

                        $(document).on('click','.add_answer', function(){
                            var question_id = $(this).attr('data-id');
                            $('#question_id_modal').val(question_id);
                            $('#answer_modal').modal('show');
                        });  

                        $(document).on('click','.add_question', function(){
                            $('#question_modal').modal('show');
                        });  
                        
                     
                        

 $(document).on('click','#submit_answer', function(){
     var quest_id = $('#question_id_modal').val();
     var answer = $('#answer_in_modal').val();

     $.ajax({
				method: 'POST',
				url: 'usershome/save_answer',
                data: {quest_id : quest_id,answer: answer}
			})
				.done(function(data) {
                    $('#answer_in_modal').val('');
                    $('#answer_modal').modal('hide');
                    getQuestionsAndAnswers();

				      });
     }); 
     
     
 $(document).on('click','#submit_question', function(){
     var category_id = $('#category_id_in_modal').val();
     var question = $('#question_in_modal').val();

     $.ajax({
				method: 'POST',
				url: 'usershome/save_question',
                data: {question : question,category_id: category_id}
			})
				.done(function(data) {
                    $('#question_in_modal').val('');
                    $('#question_modal').modal('hide');
                    getQuestionsAndAnswers();

				      });
     });    

 $(document).on('click','#submit_profile', function(){
     var user_id = $('#user_id_in_modal').val();

     var form = $('#profile-form')[0];
        var formdata = new FormData(form);		
     $.ajax({
				method: 'POST',
				url: '<?= base_url() ?>auth/change_profile',
        data: formdata,
        contentType: false,
        processData: false
			})
				.done(function(data) {
                    $('#profile_modal').modal('hide');
                    getQuestionsAndAnswers();

				      });
     });    


     $(document).on('change', '#select_category', function(){
      getQuestionsAndAnswers();
     });
</script>

  <!---------Modal for Answer ----> 
<div class="modal fade" id="answer_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <h5>Add an answer</h5>
          <h6 id="question_heading_modal"></h6>

          <input type="hidden" name="question_id_enc" id="question_id_modal" class="form-control">
          <textarea name="answer_modal" id="answer_in_modal" class="form-control"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success btn-sm" id="submit_answer">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!---------Modal for Answer ---->




  <!---------Modal for Question ----> 
<div class="modal fade" id="question_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <h5>Add a New Question</h5>

        <br><br>
        <label for="name">Category</label>
        <select name="category_id" id="category_id_in_modal" class="form-control">
          <?php foreach($category as $categories): ?>
              <option value="<?= magicfunction($categories->c_id,'e') ?>"><?=$categories->category_name ?></option>
            <?php endforeach; ?>
        </select>

        <br><br>
        <label for="name">Question</label>
        <input type="text" name="question" id="question_in_modal" class="form-control">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success btn-sm" id="submit_question">Add Question</button>
        </div>
      </div>
      
    </div>
  </div>
  <!---------Modal for Question ---->


  
  <!---------Modal for Answer ----> 
<div class="modal fade" id="profile_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <h5>Profile Page</h5>
          <h6 id="question_heading_modal"></h6>

<form id="profile-form">
        <input type="hidden" name="user_id_enc" id="user_id_in_modal" class="form-control">
        <input type="text" name="user_name" id="user_name" class="form-control" value="<?=$this->session->userdata('userdata')->user_name ?>" placeholder="Username">
        <input type="text" name="contact_no" id="contact_no" class="form-control" value="<?=$this->session->userdata('userdata')->contact_no ?>"  placeholder="Contact No">
        <input type="text" name="email" id="email" class="form-control" value="<?=$this->session->userdata('userdata')->email ?>"  placeholder="Email">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
</form> 
        </div>
     <!--   <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success btn-sm" id="submit_profile">Submit</button>
        </div> --->
      </div>
      
    </div>
  </div>
  
  <!---------Modal for Answer ---->

