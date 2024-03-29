<?php 
    require_once "../../util/get_cur_user_info.php";
    $userInfo = getCurUserInfo(false);
    $page = "exam";
    $title = "EWU APE Exams";
    $tableTitle = "Exams";
    //Strings in $modalsArr are the modal HTML file names minus "_modal.html" E.g. "roster_modal.html" -> "roster"
    $modalTabsArr = array("exam", "roster", "report");
    $modalTabsTitles = array("Exam", "Roster", "Report");
    $modalSize = "large";
    //Strings in $jsArr are the JS file names minus "_script.js" E.g. "exam_student_script.js" -> "exam_student"
    $jsArr = array();


    if(in_array("Student", $userInfo["userType"]))
    {
        $tableTitle = "Exams History";
        $jsArr = array("exam_student");
    }
    else
    {
        if(in_array("Teacher", $userInfo["userType"]) || in_array("Admin", $userInfo["userType"]))
        {
            $page = "exam";
            $title = "EWU APE Exams";
            $tableTitle = "Exams";
            $tableTabs = array();
            $tableTabs = array("Open", "In Progress", "Grading", "Archived", "Hidden");
            $jsArr = array("exam", "exam_modal", "exam_detail", "exam_roster", "exam_report");
        }
        else
        {
            require_once "../includes/error_handler.php";
            loadErrorPage("401");
            die();
        }
    }
    
    
    require_once "../index.php";
?>