<?php include 'partials/header.php'?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!$this->session->userdata('loggedin')) {
    redirect('Home');

}

?>


<link href=" <?php echo base_url('assets/css/taskchat.css' )?>" rel="stylesheet"  type = "text/css"/>
<script src="https://www.gstatic.com/firebasejs/3.6.5/firebase.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

<script src="https://use.fontawesome.com/45e03a14ce.js"></script>

<script>
    var config = {
        apiKey: "AIzaSyDEUlmbMLmmJqhiNZZ8he1_muiSTRkWins",
        authDomain: "sparktectaskmodule.firebaseapp.com",
        databaseURL: "https://sparktectaskmodule.firebaseio.com",
        storageBucket: "sparktectaskmodule.appspot.com"
    };
    firebase.initializeApp(config);
</script>

<script type="text/javascript" src="<?php echo base_url('assets/js/displayTasks.js' )?>"></script>


<div class="main_section">
    <div class="container">
        <div class="chat_container">
            <div class="col-md-12 " style="margin-left: 10px;">
                <h2>Task Details:</h2>
                <label for="TaskDetailName">Task Name:</label>
                <h5 id="TaskDetailName"></h5>
                <label for="TaskDetailDescription">Description:</label>
                <h5 id="TaskDetailDescription"></h5>
                <label for="TaskDetailDeadline">Deadline:</label>
                <h5 id="TaskDetailDeadline"></h5>
                <label for="TaskDetailContactName">Contact Name:</label>
                <h5 id="TaskDetailContactName"></h5>
                <label for="TaskDetailContactNumber">Contact Number:</label>
                <h5 id="TaskDetailContactNumber"></h5>
                <label for="TaskDetailArea">Area:</label>
                <h5 id="TaskDetailArea"></h5>
                <label for="TaskDetailsAcceptedDate">Accepted Date:</label>
                <h5 id="TaskDetailsAcceptedDate"></h5>
            </div>


            <div class="col-sm-3 chat_sidebar">
                <div class="row">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="  search-query form-control" placeholder="Conversation" />
                            <button class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                    <!-- <div class="dropdown all_conversation">
                        <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-weixin" aria-hidden="true"></i>
                            All Conversations
                            <span class="caret pull-right"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a href="#"> All Conversation </a>  <ul class="sub_menu_ list-unstyled">
                                    <li><a href="#"> All Conversation </a> </li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div> -->



                    <div class="member_list">
                        <ul class="list-unstyled" id="TaskList">
                            <!-- one task -->

                            <!-- <li class="left clearfix">
                 <span class="chat-img pull-left">
                 <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                 </span>
                                <div class="chat-body clearfix">
                                    <div class="header_sec">
                                        <strong class="primary-font">Jack Sparrow</strong> <strong class="pull-right ">
                                            09:45AM</strong>
                                    </div>
                                    <div class="contact_sec">
                                        <strong class="primary-font">(123) 123-456</strong> <span class="badge pull-right">3</span>
                                    </div>
                                </div>
                            </li>
                            <li class="left clearfix"> -->

                            <!-- end of one task -->

                            <!--chat_sidebar-->
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 message_section" style="width: 800px">



                <div class="row">



                    <!-- <div class="new_message_head">


                        <div class="pull-left"><button><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Message</button></div><div class="pull-right"><div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>  Setting
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </div></div>
                    </div> -->

                    <div class="chat_area" id="chatArea" >
                        <ul id="MessageList" class="list-unstyled " >

                            <!-- oneMessage -->
                            <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="https://www.practicepanther.com/wp-content/uploads/2017/02/user.png" alt="User Avatar" class="img-circle">
                     </span>
                                <div class="chat-body1 clearfix">
                                    <strong class="primary-font MessageSender"></strong>
                                    <p class="MessageContent"></p>
                                    <div class="chat_time pull-right MessageTime"></div>
                                </div>
                            </li>
                            <!-- end of oneMessage -->

                        </ul>
                    </div><!--chat_area-->
                    <div class="message_write">
                        <textarea class="form-control" placeholder="type a message" id="sendingTextArea"></textarea>
                        <div class="clearfix"></div>
                        <div class="chat_bottom"><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                Add Files</a>
                            <a  class="pull-right btn btn-success" onclick="clickSend()">
                                Send</a></div>
                    </div>
                </div>
            </div> <!--message_section-->
        </div>
    </div>
</div>



<?php include 'partials/footer.php'?>


