<?php
    class app
    {
        function getData($conn){
            $query = "SELECT subject_offer.Subject_Code , term.Term_Name, subject_offer.Subject_Offer_ID, subject_offer.Faculty_ID,
                        subject.Subject_Description
                    FROM subject_offer
                    INNER JOIN term on subject_offer.Term_ID = term.Term_ID
                    INNER JOIN subject on subject_offer.Subject_Code = subject.Subject_Code
                    WHERE subject_offer.Faculty_ID  = '".$_SESSION['Faculty_ID']."' ";
            $result = mysqli_query($conn,$query);
            return $result;
        }

        

        function getAllStudentsEvaluation($conn, $key){
            $query2 = "SELECT student_evaluation.average_rate , subject_taken_handle.Subject_Offer_ID
                    FROM student_evaluation
                    INNER JOIN subject_taken_handle on student_evaluation.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                    WHERE subject_taken_handle.Subject_Offer_ID  = '".$key."' ";
            $result2 = mysqli_query($conn,$query2);
            return $result2;
        }

        function getCategoryTotal($conn, $key){
            $query3 = "SELECT evaluation_rating.Evaluation_Item_ID , 
                    evaluation_rating.Rating_ID,
                    evaluation_rating.Subject_Student_Taken,
                    subject_taken_handle.Subject_Offer_ID,
                    evaluation_item.eval_cat_ID
                    FROM evaluation_rating
                    INNER JOIN subject_taken_handle ON evaluation_rating.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                    INNER JOIN evaluation_item on evaluation_rating.Evaluation_Item_ID = evaluation_item.Evaluation_Item_ID
                    WHERE subject_taken_handle.Subject_Offer_ID = '".$key."'";
             $result3 = mysqli_query($conn,$query3);
             return $result3;
        }

        function getCurrentComments($conn, $key){
            $query4 = "SELECT subject_taken_handle.Subject_Offer_ID , student_evaluation.Comments
                    FROM student_evaluation
                    INNER JOIN subject_taken_handle on student_evaluation.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                    WHERE subject_taken_handle.Subject_Offer_ID = '".$key."'";
            $result4 = mysqli_query($conn,$query4);
            return $result4;
        }

        function getSpecificComments($conn, $key){
            $query5 = "SELECT subject_taken_handle.Subject_Offer_ID , evaluation_detail.Comments, evaluation_detail.Evaluation_Item_ID, evaluation_item.Evaluation_Item_Description
                    from evaluation_detail
                    INNER JOIN subject_taken_handle on evaluation_detail.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                    INNER JOIN evaluation_item on evaluation_detail.Evaluation_Item_ID = evaluation_item.Evaluation_Item_ID
                    WHERE subject_taken_handle.Subject_Offer_ID = '".$key."' ";
            $result5 = mysqli_query($conn,$query5);
            return $result5;
        }

        function getAllTeacherData($conn){
            $query3 = "SELECT student_evaluation.average_rate , subject_taken_handle.Subject_Offer_ID, subject_offer.Faculty_ID
                        FROM student_evaluation
                        INNER JOIN subject_taken_handle on student_evaluation.Subject_Student_Taken = subject_taken_handle.Subject_Student_Taken
                        INNER JOIN subject_offer on subject_taken_handle.Subject_Offer_ID = subject_offer.Subject_Offer_ID
                        WHERE subject_offer.Faculty_ID  = '".$_SESSION['Faculty_ID']."'";
            $res3 = mysqli_query($conn,$query3);
            return $res3;
        }

        function getRange($conn){
            $query6 = "SELECT * FROM eval_range";
            $res6 = mysqli_query($conn, $query6);
            return $res6;
        }
    }