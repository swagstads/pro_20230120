<?php
//if (session_id() == '') {
    session_start();
//}
if (!isset($_SESSION['usr'])) {
    header("Location: index.php");
    die();
}

include 'db.php';
include_once 'GCM.php';

if (isset($_GET['eid'])) {
    $uid = $_GET['eid'];
    $query ="select * from contact_us where id='$uid';";
    $message_result =  mysqli_query($conn,$query);
    if (mysqli_num_rows($message_result) > 0) {
        $message = $message_result->fetch_assoc();
    }
}else{
    header("Location: messages.php");
    die();
}

if (isset($_SESSION['them'])) {
    $them = $_SESSION['them'] . ".php";
    include $them;
}
$display = '';
if ($_SESSION['role']!='Admin'){
    $display = 'disabled';
}

if (isset($_POST['btnedit'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $query = "UPDATE `contact_us` SET `status`='$status', `modified_on`=now() WHERE id = '$id';";
    $result =  mysqli_query($conn,$query);
    echo "<script>window.location.href='messages.php';</script>";
    header("Location: messages.php");
}

//email
?>

<input type="hidden" id="page_name" value="contact">
<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="color: #007bff;">
            <button class="btn btn-link btn-sm text-orange order-1 order-sm-0" id="sidebarToggle" href="#" style="color: #007bff;">
                <i class="fas fa-bars"></i>
            </button>
                Read Message
            </li>
        </ol>
        <?php
        if ($tmsg != '') {
            echo '<div class="alert alert-success alert-dismissible">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo '<label class="control-label"><i class="fas fw fa-check-circle"></i> ' . $tmsg . '</label>';
            echo '</div><br/>';
        } if ($terrormsg != ''&&isset($_GET['did'])) {
            echo '<div class="alert alert-danger alert-dismissible">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo '<label class="control-label"><i class="fas fw fa-times-circle"></i> ' . $terrormsg . '</label>';
            echo '</div><br/>';
        }
        ?>
        <div class="alert alert-danger" id="alert_message_div" style="display: none;">
            <label class="control-label" id="errormsg"></label>
        </div><br/>

        <div class="row">

            <div class="col-6">
                <div class="card-body">
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $_GET['eid'];?>" name="id">
                            <label class="control-label"><b>Name :</b></label>
                            <label class="control-label"><?php echo $message['name'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>E-mail :</b></label>
                            <label class="control-label"><?php echo $message['email'];?></label>
                        </div>
                        <div class="form-group field_wrapper" id="image_div" style="display:block;">
                            <label class="control-label"><b>Subject :</b></label>
                            <label class="control-label"><?php echo $message['subject'];?></label>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>Message :</b></label>
                            <label class="control-label"><?php echo $message['message'];?></label>
                        </div>
                        <?php
                        if($_SESSION['role']=='Admin'||$_SESSION['role']=='Editor'){
                        ?>
                        <div class="form-group">
                                <label class="control-label"><b>Mark As :</b></label>
                                <select name="status" class="form-control" id="status">
                                    <option value="Pending" <?php if($message['status'] == 'Pending'){echo 'selected';} ?>>Pending</option>
                                    <option value="Read" <?php if($message['status'] == 'Read'){echo 'selected';} ?>>Read</option>
                                    <option value="Replied" <?php if($message['status'] == 'Replied'){echo 'selected';} ?>>Replied</option>
                                </select>
                            </div>
                        <input '.$display.' type="submit" value="Update" id="btnedit" name="btnedit" class="btn btn-primary btn-block col-sm-3"/>
                        <br />
                        <!--
                        <div class="form-group">
                            <label class="control-label"><b>Subject :</b></label>
                            <input type="text" name="title" id="subject" required="required" class="form-control" placeholder="Subject" 
                            value= <?php echo $message['subject']?>
                            
                            maxlength="100">
                        </div>

                        <div class="form-group"  action=<?php 
                            if(isset($_POST['reply'])&&$_POST['reply']!='') {
                                // Always set content-type when sending HTML email
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                // More headers
                                //$from = 'From: yoursite.com'; "\r\n";
                                $headers .= 'From: noreply@atoz.com' . "\r\n";
                                $uid = $_GET['eid'];
                                $to = $message['email'];
                                $subject = $message['subject'];
                                $message = $_POST['reply'];
                                if(mail($to, $subject, $message, $headers)){
                                    $update = mysqli_query($conn,"UPDATE `contact_us` SET `status`='Replied' WHERE id='$uid';");
                                }
                                header("Location: messages.php");
                            }
                            ?>   
                        >
                            <label class="control-label"><b>Reply Message :</b></label>
                            <textarea name="reply" id="reply" class="form-control" rows="5" maxlength="20">
                            </textarea>
                            <br />
                        -->
                            <input '.$display.' type="button" value="Reply" id="btnreply" name="btnreply" class="btn btn-primary btn-block col-sm-3" onclick="location.href='mailto:<?php echo $message['email'];?>';"/>
                        </div>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

<script>
    // CKEditor Scriptckeditor
    CKEDITOR.replace( 'reply-inactive', {
        wordcount: {
            showCharCount: true,
            maxCharCount: 600,
        }
    });
</script>