<?php $i=0; foreach($question as $questions):  $i++;?>
            <h1 class="inset"><?=$questions->question ?>
            <p id="answer_added_by">Asked by:  <b><?=$questions->user_name ?></b> on  <b><?=$questions->asked_on ?></b></p>

        </h1>
            <?php  
            $question_id_Enc = magicfunction($questions->q_id,'e');
               $answer = $this->M_questions->list_answers_of_questions($question_id_Enc);

               if(empty($answer)): ?>
                    <center><p>No Answers Found</p></center>
               <?php endif; 

            foreach($answer as $answers): ?>
                <p id="answer_place"><?=$answers->answer ?>  
                        <span id="answer_added_by">Answered by:  <b><?=$answers->user_name ?></b> on  <b><?=$answers->added_on ?></b></span>
                </p>
                
            <?php endforeach; ?>
            <p><a class="btn btn-danger btn-sm add_answer" data-id="<?=$question_id_Enc ?>">Add Answer</a></p>
        <?php endforeach; ?>