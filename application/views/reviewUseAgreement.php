<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <style>
        table, tr {
            border: 1px solid black;
            background-color: transparent;
        }
        
        span.click{
			float: right;
			margin-top: -25px;
		}
		
		div.accordion{
			margin-bottom: 8px;
		}

    </style>
    <title>Use Agreement Admin Form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="shortcut icon" href="http://library.marist.edu/archives/icon/box.png" />
    <link rel="stylesheet" type="text/css" href="http://library.marist.edu/css/library.css" />
    <link rel="stylesheet" type="text/css" href="http://library.marist.edu/css/library_child.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="http://library.marist.edu/archives/mainpage/mainStyles/style.css" />
    <link rel="stylesheet" type="text/css" href="http://library.marist.edu/archives/mainpage/mainStyles/main.css" />
    <link rel="stylesheet" type="text/css" href="styles/useagreement.css" />
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/progress-wizard.min.css" />
    <script type="text/javascript" src="http://library.marist.edu/archives/mainpage/scripts/archivesChildMenu.js"></script>
    <script type="text/javascript" src="js/cloneRequests.js"></script>
    <?php
    $userId= $_GET['userId'];
    //researcher info
    $sizeofRequests = sizeof($requests);
    $userName = $researcher[0];
    $citystate = $researcher[1];
    $address =$researcher[2];
    $emailId = $researcher[3];
    $zipCode = $researcher[4];
    $date = $researcher[5];
    $phoneNumber = $researcher[6];
    $status = $researcher[7];
    $fileAttachment = $researcher[8];
    $userInitials = $researcher[9];
    $termsAndConditions = $researcher[10];
    $emailSubject = $researcher[11];
    $receiver = $researcher[12];
    $requestAddedBy = $researcher[13];
    $attachmnetLink = $researcher[14];
    $copies_sent = $researcher[15];

    if($status == 0){
        $formStatus = "Initiated";
    }elseif($status == 1){

        $formStatus = "Returned";
    }
    elseif($status == 2){
        $formStatus = "Submitted";
    }
    elseif($status == 3){

        $formStatus = "Approved";
    }
    ?>
    <script type="text/javascript">
       /* updateList = function() {
            var input = document.getElementById('upload');
            var output = document.getElementById('fileList');

            output.innerHTML = '<ul>';
           var sizeLimit = false;
            for (var i = 0; i < input.files.length; ++i) {
                if(input.files.item(i).size> 2000000){

                    output.innerHTML += '<li>' + input.files.item(i).name + "<h4 style='color: red'>(Exceeded 2 MB File size limit)<h4>"+'</li>';
                    sizeLimit = true;
                }else {
                    output.innerHTML += '<li>' + input.files.item(i).name + '</li>';

                    //output.innerHTML += '<li>' + input.files.item(i).size + '</li>';
                }
            }
            if(sizeLimit) {
                $('#requestStatus').show().css('background', '#b31b1b').append("Each uploaded file should be less than 2 MB");


            }
            output.innerHTML += '</ul>';

        }*/
        $(document).ready(function(){

            if("<?php echo $status ?>" ==0){
                document.getElementById('step1').className='warning';
                document.getElementById("approve").style.display = "none";
                document.getElementById("disapprove").style.display = "none";
                document.getElementById("complete").style.display="none";
               // document.getElementById("4").style.display="none";

            }else if("<?php echo $status ?>" ==1){
                document.getElementById('step1').className='danger';
                document.getElementById('step2').className='danger';
                document.getElementById('step3').className='danger';
                document.getElementById('step4').className='';
                document.getElementById("approve").style.display = "none";
                document.getElementById("disapprove").style.display = "none";
                document.getElementById("complete").style.display="none";
               // document.getElementById("4").style.display="none";


            }else if("<?php echo $status ?>" ==2){
                document.getElementById('step1').className='warning';
                document.getElementById('step2').className='warning';
                document.getElementById('step3').className='';
                document.getElementById('step3').className='';
                document.getElementById("complete").style.display="none";

                //document.getElementById("4").style.display="none";


            }else if("<?php echo $status ?>" ==3){
                document.getElementById('step1').className='completed';
                document.getElementById('step2').className='completed';
                document.getElementById('step3').className='completed';
                document.getElementById('step4').className='completed';
                document.getElementById("approve").style.display = "none";
                document.getElementById("disapprove").style.display = "none";
                document.getElementById("instructions").style.display="none";
                document.getElementById("completeTransaction").style.visibility= 'visible';


            }else if("<?php echo $status ?>"==4){
                document.getElementById('step1').className='completed';
                document.getElementById('step2').className='completed';
                document.getElementById('step3').className='completed';
                document.getElementById('step4').className='completed';
                document.getElementById('step5').className='completed';
                document.getElementById("approve").style.display = "none";
                document.getElementById("disapprove").style.display = "none";
                document.getElementById("complete").style.display = "none";
                document.getElementById("instructions").style.display="none";
                document.getElementById("message").style.display = "none";

              //  $('#requestStatus').style.display="none";
                <?php if($copies_sent != null){ ?>
                <?php

                $filesUploaded = explode('||',$copies_sent );

                ?>
                var output = document.getElementById('copies_sent');
                output.innerHTML = '<ul>';
            <?php foreach($filesUploaded as $fileUploaded){  ?>


                var fileupload = "<?php echo $fileUploaded; ?>";
                    output.innerHTML += '<li><a href=' + fileupload + '> ' + fileupload + '</a></li></br>';
                   <?php } ?>
                output.innerHTML += '</ul>';


            <?php }?>
            }

            var inputemail = 0;


            /* validation ends */

            $('#formcontents').hide();
            var inst = 0;

            <!--?php if ($requestAddedBy == "Email") {?-->

            //document.getElementById("formcontents").style.display = "none";
            //document.getElementById("approve").style.display = "none";
            //document.getElementById("disapprove").style.display = "none";
            //document.getElementById("attachment").style.display = "none";
            //document.getElementById("submitInfo").style.display = "none";
            //document.getElementById("requests").style.display = "none";
            //document.getElementById("accept").style.display = "none";

            <!--?php } ?-->

            $('#datepicker').datepicker();
            var requestsCnt = 0;
            var reqSize = "<?php echo sizeof($requests)?>";
            var fields = $('div#request_input').html();
            for (var j= 0;j<reqSize; j++ ) {
                var request_input = "";
                requestsCnt = requestsCnt + 1;
                request_input = "request_input" + requestsCnt + "";
                var requests = "<div id=" + request_input + " style='border-bottom: 1px solid; padding: 10px;'>" + fields;
                $('div#formcontents').append(requests);
            }
            var tNc = '<?php echo $termsAndConditions?>';
            if(tNc =="true"){
                $('#accept').prop('checked',true);
                $('#condofuse').prop('checked',true)    ;
                $('#cond_of_use').css({'color':'green', 'font-weight':'bold'});
                $('#accept-cond').css({'color':'green', 'font-weight':'bold'});

            }else{
                $('#accept-cond').css({'color':'#b31b1b', 'font-weight':'bold'});

            }
            requestsCnt = 0;
            <?php if($sizeofRequests>0){ ?>
            <?php foreach($requests as $request){ ?>
            var requestId= '<?php echo $request[0]?>';
            requestsCnt++;
            var str1 = "div#request_input";
            var str2 = str1.concat(requestsCnt);
            var requestIds =[];
            requestIds.push(str2.concat(" input#request_collection"));
            requestIds.push(str2.concat(" input#request_boxno"));
            requestIds.push(str2.concat(" input#request_itemno"));
            requestIds.push(str2.concat(" input:not(:checked)[name='dpi'][value='72']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='dpi'][value='300']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='dpi'][value='600']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='dpi'][value='1200']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='format'][value='pdf']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='format'][value='jpeg']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='format'][value='tiff']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='avformat'][value='wav']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='avformat'][value='mp3']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='avformat'][value='mpeg']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='avformat'][value='hd']"));
            requestIds.push(str2.concat(" input:not(:checked)[name='avformat'][value='mov']"));
            requestIds.push(str2.concat(" textarea#request_desc"));
            $(requestIds[0]).val('<?php echo $request[1]?>');
            $(requestIds[1]).val('<?php echo $request[2]?>');
            $(requestIds[2]).val('<?php echo $request[3]?>');
            $(requestIds[15]).val('<?php echo $request[4]?>');

            <?php foreach($request[5] as $dpi) {?>

            if("<?php echo $dpi ?>" == "72"){
                $(requestIds[3]).attr('checked',true);

            }else if("<?php echo $dpi ?>" == "300"){
                $(requestIds[4]).attr('checked',true);
            }else if("<?php echo $dpi ?>" == "600"){
                $(requestIds[5]).attr('checked',true);
            }else if("<?php echo $dpi ?>" == "1200"){
                $(requestIds[6]).attr('checked',true);

            }
            <?php }?>
            <?php foreach($request[6] as $format) {?>

            if("<?php echo $format ?>" == "pdf"){
                $(requestIds[7]).attr('checked',true);
            }else if("<?php echo $format ?>" == "jpeg"){
                $(requestIds[8]).attr('checked',true);
            }else if("<?php echo $format ?>" == "tiff"){
                $(requestIds[9]).attr('checked',true);
            }
            <?php }?>
            <?php foreach($request[7] as $avformat) {?>

            if("<?php echo $avformat ?>" == "wav"){
                $(requestIds[10]).attr('checked',true);
            }else if("<?php echo $avformat ?>" == "mp3"){
                $(requestIds[11]).attr('checked',true);
            }else if("<?php echo $avformat ?>" == "mpeg"){
                $(requestIds[12]).attr('checked',true);
            }else if("<?php echo $avformat ?>" == "hd"){
                $(requestIds[13]).attr('checked',true);
            }else if("<?php echo $avformat ?>" == "mov"){
                $(requestIds[14]).attr('checked',true);
            }
            <?php }?>

            <?php } ?>
            <?php }?>
            //alert(requestsCnt);
            $('button#disapprove').click(function(){
                if ($('input#name').val() == ""){
                    $('input#name').css('border','1px solid red');
                }else if ($('input#email').val() == ""){
                    $('input#email').css('border','1px solid red');
                }else{
                    if ($('textarea#instructions').val()== 0){
                        $('textarea#instructions').css('border','1px solid red');
                    }else {
                        var date = $('input#datepicker').val();
                        var userName = $('input#name').val();
                        var address = $('input#address').val();
                        var citystate = $('input#citystate').val();
                        var zipCode = $('input#zip').val();
                        var emailId = $('input#email').val();
                        var comments = $('textarea#comments').val();
                        var phoneNumber = $('input#phoneNo').val();
                        var requestCount = $("#formcontents > div").length - 1;
                        var instructions = $('textarea#instructions').val();
                        var requestList = [];

                        //iterating multiple requests.
                        for (var i = 1; i <= requestCount; i++) {
                            var checked = [];
                            var imageResolutions = "";
                            var fileFormats = "";
                            var avFormats = "";
                            var str1 = "div#request_input";
                            var str2 = str1.concat(i);
                            var request = [];
                            var reqCollection = $(str2.concat(" input#request_collection")).val();
                            var boxNumber = $(str2.concat(" input#request_boxno")).val();
                            var itemNumber = $(str2.concat(" input#request_itemno")).val();
                            $.each($(str2.concat(" input:checked[name='dpi']")), function () {
                                imageResolutions = imageResolutions.concat($(this).val());
                                imageResolutions = imageResolutions.concat(":");
                            });
                            imageResolutions = imageResolutions.slice(0, -1);
                            $.each($(str2.concat(" input:checked[name= 'format']")), function () {
                                checked.push($(this).val());
                                fileFormats = fileFormats.concat($(this).val());
                                fileFormats = fileFormats.concat(":");
                            });
                            fileFormats = fileFormats.slice(0, -1);

                            $.each($(str2.concat(" input:checked[name= 'avformat']")), function () {
                                checked.push($(this).val());
                                avFormats = avFormats.concat($(this).val());
                                avFormats = avFormats.concat(":");
                            });
                            avFormats = avFormats.slice(0, -1);
                            request.push(reqCollection);
                            request.push(boxNumber);
                            request.push(itemNumber);
                            request.push(imageResolutions);
                            request.push(fileFormats);
                            request.push(avFormats);
                            requestList.push(request);
                        }
                        $.post("<?php echo base_url("?c=usragr&m=disapproveRequest&userId=" . $userId);?>", {
                            date: date,
                            userName: userName,
                            address: address,
                            zipCode: zipCode,
                            citystate: citystate,
                            emailId: emailId,
                            comments: comments,
                            phoneNumber: phoneNumber,
                            requestCount: requestCount,
                            requestList: requestList,
                            instructions: instructions
                        }).done(function (userId) {
                            if (userId > 0) {
                                $('#requestStatus').show().css('background', '#66cc00').append("#" + userId + ":User Agreement Form has been disapproved and an email sent to " + userName);
                           //     $('#stat').show().css("font-weight","Bold").append("Status: Rejected");
                                document.getElementById('step1').className='danger';
                                document.getElementById('step2').className='danger';
                                document.getElementById('step3').className='danger';
                                document.getElementById('step4').className='';
                              //  $('#statusInfo').html().replace(/<br\s?\/?>/,'');
                              //  $('#statusInfo').hide();
                            } else {
                                $('#requestStatus').show().css('background', '#b31b1b').append("Something wrong with the form. Contact Administrator");

                            }
                            $("html, body").animate({ scrollTop: 0}, 600);
                        });
                    }
                }
            });

            $('button#approve').click(function(){




                var email = $('input#email').val();
                var selectEmail = prompt("Please select recipient emailId",email );

              if(selectEmail != null) {
                  if ($('input#name').val() == "") {
                      $('input#name').css('border', '1px solid red');
                  } else if ($('input#email').val() == "") {
                      $('input#email').css('border', '1px solid red');
                  } else {

                      var date = $('input#datepicker').val();
                      var userName = $('input#name').val();
                      var address = $('input#address').val();
                      var citystate = $('input#citystate').val();
                      var zipCode = $('input#zip').val();
                      var emailId = selectEmail;
                     // var emailId = $('input#email').val();
                      var comments = $('textarea#comments').val();
                      var phoneNumber = $('input#phoneNo').val();
                      var instructions = $('textarea#instructions').val();
                      var requestCount = $("#formcontents > div").length - 1
                      var requestList = [];
                      //iterating multiple requests.
                      for (var i = 1; i <= requestCount; i++) {
                          var checked = [];
                          var imageResolutions = "";
                          var fileFormats = "";
                          var avFormats = "";
                          var str1 = "div#request_input";
                          var str2 = str1.concat(i);
                          var request = [];
                          var reqCollection = $(str2.concat(" input#request_collection")).val();
                          var boxNumber = $(str2.concat(" input#request_boxno")).val();
                          var itemNumber = $(str2.concat(" input#request_itemno")).val();
                          $.each($(str2.concat(" input:checked[name='dpi']")), function () {
                              imageResolutions = imageResolutions.concat($(this).val());
                              imageResolutions = imageResolutions.concat(":");
                          });
                          imageResolutions = imageResolutions.slice(0, -1);
                          $.each($(str2.concat(" input:checked[name= 'format']")), function () {
                              checked.push($(this).val());
                              fileFormats = fileFormats.concat($(this).val());
                              fileFormats = fileFormats.concat(":");
                          });
                          fileFormats = fileFormats.slice(0, -1);

                          $.each($(str2.concat(" input:checked[name= 'avformat']")), function () {
                              checked.push($(this).val());
                              avFormats = avFormats.concat($(this).val());
                              avFormats = avFormats.concat(":");
                          });
                          avFormats = avFormats.slice(0, -1);
                          request.push(reqCollection);
                          request.push(boxNumber);
                          request.push(itemNumber);
                          request.push(imageResolutions);
                          request.push(fileFormats);
                          request.push(avFormats);
                          requestList.push(request);
                      }
                      $.post("<?php echo base_url("?c=usragr&m=approveRequest&userId=" . $userId);?>", {
                          date: date,
                          userName: userName,
                          address: address,
                          zipCode: zipCode,
                          citystate: citystate,
                          emailId: emailId,
                          comments: comments,
                          phoneNumber: phoneNumber,
                          requestCount: requestCount,
                          requestList: requestList,
                          instructions: instructions
                      }).done(function (userId) {
                          if (userId > 0) {

                              $('#requestStatus').show().css('background', '#66cc00').append("#" + userId + ": User Agreement Form has been approved and confirmation mail sent to " + userName);
                              // $('#stat').show().append("Status: Approved");
                              document.getElementById('step1').className = 'completed';
                              document.getElementById('step2').className = 'completed';
                              document.getElementById('step3').className = 'completed';
                              document.getElementById('step4').className = 'completed';
                              //var htmlcleaned = $('#statusInfo h3').html().replace(/<br\s?\/?>/,'');
                              //  $('#statusInfo h3').html(htmlcleaned);
                              // $('#statusInfo').hide();

                          } else {
                              $('#requestStatus').show().css('background', '#b31b1b').append("Something wrong with the form. Contact Administrator");

                          }
                          $("html, body").animate({scrollTop: 0}, 600);
                      });

                  }
              }
            });//end of approve function
           $('button#complete').click(function() {

               var user_name =  $('input#name').val();
               var user_email =  $('input#email').val();
               var message = $('textarea#message').val();
              //  var m_data = new FormData();
                //m_data.append('user_name', $('input#name').val());
                //m_data.append('user_email', $('input#email').val());
                //m_data.append('message', $('textarea#message').val());

                //m_data.append('file_attach', $('input#uploaded_file')[0].files[0]);
                //m_data.append('file_attach', $('input#uploaded_file')[1].files[1]);
                //m_data.append('file_attach', $('input#uploaded_file')[2].files[2]);

            //    m_data.append('date', $('input#datepicker').val());
               $.post("<?php echo base_url("?c=usragr&m=completetransaction&userId=".$userId);?>", {
                   user_name: user_name,
                   user_email:user_email,
                   message :message

               }).done(function (response) {
                   if(response>0){
                       $('#requestStatus').show().css('background', '#66cc00').append("Email has been sent to user");
                       document.getElementById('step1').className = 'completed';
                       document.getElementById('step2').className = 'completed';
                       document.getElementById('step3').className = 'completed';
                       document.getElementById('step4').className = 'completed';
                       document.getElementById('step5').className = 'completed';
                   }else{

                       $('#requestStatus').show().css('background', '#b31b1b').append("Something wrong with the form. Contact Administrator");

                   }


               });
/*                $.ajax({
                    type: "POST",
                    url: "<!--?php echo base_url("?c=usragr&m=completetransaction&userId=".$userId);?>",
                    data: m_data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) {


                    }
                });*/
               $("html, body").animate({scrollTop: 0}, 600);

           });

            $('div#request_input').clone();

        });
        //});// end of document function
    </script>
</head>
<body>
<div id="headerContainer">
    <div id="header">
        <div id="logo">
        </div><!-- /logo -->
    </div>
</div>
<div id="menu">
    <div id="menuItems">
    </div><!-- /menuItems -->
</div><!-- /menu -->
<div class= "content_container">
    <div class = "container_home_child" >
        <div class = "ref_box">
            <table>
                <th class = "search_drop_header" colspan="4">Library Resources</th>
                <tr>
                    <td class = "search_drop"><a href="http://voyager.marist.edu/vwebv/searchBasic"><img src ="http://library.marist.edu/images/library_catalog_red.png" title="Library Catalog"></a></td>
                    <td class = "search_drop"><a href="http://libguides.marist.edu/"><img src ="http://library.marist.edu/images/library_pathfinders_red.png" title="Pathfinders"></a></td>
                    <td class = "search_drop"><a href="http://library.marist.edu/forms/ask.php"> <img src ="http://library.marist.edu/images/ask_a_librarian_red.png" title="Ask A Librarian"></a></td>
                    <td class = "search_drop_last"><a href="http://site.ebrary.com.online.library.marist.edu/lib/marist/home.action"><img src ="http://library.marist.edu/images/ebrary_small.png" title ="ebrary"></a></td>
                </tr>
            </table>
        </div>
        <div class="content">
            <p class="breadcrumb">
                <a href="http://library.marist.edu" class="map_link"><img src="http://library.marist.edu/images/home.png" class="fox2"/></a>
                > Forms > Reserve Forms
            </p>
            <div id="researcherInfo"><h1 class="page_head" align="center" style="float: none;">Use Agreement Admin Form</h1></br>
                </br>
                <div id="requestStatus" style="width: auto; height:40px; margin-bottom: 7px; margin-top: -15px; color:#000000; font-size: 12pt; text-align: center; padding-top: 10px; display: none;">
                </div></br>
                <ul class="progress-indicator">
                    <li id="step1" class="">
                        <span class="bubble"></span>
                        Initiated <br>
                    </li>
                    <li id="step2" class="">
                        <span class="bubble"></span>
                        Submitted <br>
                    </li>
                    <li id="step3"  class="">
                        <span class="bubble"></span>
                        Returned <br>
                    </li>
                    <li id="step4" class="">
                        <span class="bubble"></span>
                        Approved
                    </li>
                    <li id="step5" class="">
                        <span class="bubble"></span>
                        Completed
                    </li>
                </ul></br>
                <div id="confirmations"></div></br>
<!--                <div id="statusInfo">
                    <h3 align="right">Status: <!--?php /*echo $formStatus */?></h3></br></br>
                </div>
                <div id="stat" style="width: auto; height:40px; margin-bottom: 7px; margin-top: -15px; font-size: 12pt; text-align: right; padding-top: 10px; display: none;">
                </div>-->
                <div align="right">
                    <div  style="width:170px;height:30px; background: #b31b1b;" class="box" id="requestInf">

                        <h3 style="color: white;text-align: center; vertical-align:middle;line-height: 30px;">Request ID : <?php echo $userId ?></h3>
                    </div>
                </div></br>
                <div class="accordion" id="2"><h4 id="2">Section 1: Researcher's Information:</h4><span class="click">Click to Open/Close</span></div>
                <div class="formcontents" id="2-contents" aria-readonly="true">
                    <label class="label">Date:</label><br/><input type="text" id="datepicker" class="textinput"  value = "<?php echo $date; ?>" style="width: 100px;"readonly/>
                    <label class="label">Researcher's Name:</label><br/><input type="text" id="name" class="textinput" value = "<?php echo $userName; ?>"readonly/>
                    <label class="label">Address:</label><br/><textarea class="readonlytext" readonly><?php echo $address; ?></textarea>
                    <label class="label">City/State:</label><br/><textarea  class="readonlytext" readonly><?php echo $citystate; ?></textarea>
                    <label class="label">Zip:</label><br/><input type="text" id="zip" class="textinput" value = "<?php echo $zipCode; ?>" readonly/>
                    <label class="label">Phone Number:</label><br/><input type="text" id="phoneNo" class="textinput" value = "<?php echo $phoneNumber; ?>" readonly/>
                    <!--p><label class="label">City/State:</label><input type="text" id="citystate" class="textinputinline" style="margin-right: 20px;"/><label class="label">Zip:</label><input type="text" id="zip" class="textinputinline" style="width:125px;"/></p-->
                    <label class="label">Email:</label><br/><input type="text" id="email" class="textinput" value = "<?php echo $emailId; ?>" readonly/>
                    <!-- <option value="Archivist" class="selectinput" >Archivist</option>
                     <option value="Researcher" class="selectinput">Researcher</option>
                     <option value="Email" class="selectinput">Email</option>
                   </select>--></br></br>
                </div>

                <div class="accordion" id="3"><h4 id="3">Section 2: Conditions of use</h4><span class="click">Click to Open/Close</span></div>
                <div id="3-contents" class="formcontents">
                    <div style="height: 200px; border-bottom: 1px solid #e0e0e0; border-width: 75%; overflow-y: auto; padding: 10px; margin-bottom: 1px;">
							<ul>
								<li>(1) To use the image(s), audio, or video only for the purpose or project stated above. Later and different use constitutes reuse and is
									prohibited. Subsequent requests for permission to reuse image(s), audio, or video must be made in writing. A reuse fee may apply</li><br/>
								<li>(2) To give proper credit for the image(s), audio, or video. Unless otherwise stated on the photographic copy, the credit line should
									read: James A. Cannavino Library, Archives & Special Collections, Marist College, USA. When the name of the photographer
									or collection is supplied, this should also be included in the credit. The placement of credit should be as follows:<br/>
									<ul>a) Printed material - Preferably the credit line should appear on the same page as the printed copy of the image and
									immediately adjacent to it. The credit may appear elsewhere in the publication if done in such a way that readers
can quickly match individual images with their respective credit.</ul><br/>
<ul>b) Films, filmstrips, video, or electronic media (including Internet productions) - The credit line should appear
on the film, filmstrip, video, or electronic media where other sources are listed. If manuals accompany films or
filmstrips, the credit should appear where the subject of the illustration is discussed in the text.</ul><br/>
<ul>c) Public exhibitions - The credit should appear within the exhibit area.</ul><br/>
<ul>d) Audio broadcasts – The credit should be read at the end of the broadcast or given when other sources are listed.</ul><br/>
			</li>
								<li>(3) Not to digitize images at a resolution higher than 72 dots per inch for use on the Internet, or distribute image(s), audio, or
video without written authorization from the Marist College Archives &amp; Special Collections.</li><br/>
<li>(4) To assume all responsibility for questions of copyright and invasion of privacy that may arise in the copying and in the use of
the image(s), audio, or video and to assume responsibility for obtaining all necessary permissions pertaining to use.</li><br/>
<li>(5) To defend and indemnify and save and hold harmless Marist College, its Archives &amp; Special Collections, its employees or
designates, and the donors and former owners of Marist College Archives or Special Collections, from any and all costs,
expense, damage and liability arising because of any claim whatsoever which may be presented by anyone for loss or damage or
other relief occasioned or caused by the release of image(s), audio, or video to the undersigned applicant and their use in any
manner, including inspection, publication, reproduction, duplication or printing by anyone for any purpose whatsoever.</li><br/>
<li>(6) To supply the Marist College Archives &amp; Special Collections with one complimentary copy of any printed, broadcast, or
published work in which one or more image(s), audio, or video appear.</li><br/>
<li>(7) Not to permit others to reproduce the image(s), audio, or video; to destroy any digitized copies of image(s) audio, or
video following their use.</li><br/>
<li>(8) Not to place the image(s), audio, or video in another institution, repository, or collection--public or private.</li><br/>
<li>(9) To return to the Marist College Archives &amp; Special Collections the supplied copies of any image(s), audio, or video if they are
designated by the Archives &amp; Special Collections for return.</li><br/>
<li>(10) That the Marist College Archives &amp; Special Collections in no way surrenders its own right to publish or otherwise use the image(s),
audio, or video, or to grant permission for others to do so. That the Marist College Archives & Special Collections reserves the right
to make exceptions or additions to the conditions stated herein.</li><br/>
							</ul>
							<p>As a patron of Marist College Archives &amp; Special Collections, I agree to abide by all copyright laws as they are applicable to my work, including intellectual rights, privacy of individuals, corporate privacy rights and federal and state laws. I agree to abide by all donor and/or
informant restrictions placed on the items that I request to use, and agree that this material will not be misquoted, misused, or mishandled. I
also agree that these reproductions are solely for my personal use, and I will not resell or donate them.
</p>
<p>All reproductions are handled by the Marist College Archives &amp; Special Collections staff (unless noted otherwise) and are dependent on the
physical condition of the item. Reproductions are limited to 10% of a book, article, or folder unless otherwise authorized by a curator.
Orders are completed in the order that they are received.
</p>
						</div>
                    <?php if ($status ==2 || $status ==3) { ?>

                        <div>
                            <input type="checkbox" id="condofuse" value="condofuse"  name = "condofuse" class="checkbox" disabled="disabled" required><span id="cond_of_use" style="color: #b31b1b; font-weight: bold;"> I accept

						 10	Conditions of use agreement of Marist College Archives and Special Collection </span></input>
                        </div>

                    <?php } else {?>
                        <div id="numcheck">	<input type="checkbox" style="background-color: #f6f5f7" id="condofuse" value="condofuse" name = "condofuse"  disabled='disabled' ><span id="cond_of_use" style="color: #fd2323; font-weight: bold;">I accept 10
						         	Conditions of use agreement of Marist College Archives and Special Collection</span></input>
                            </br>



                    <?php } ?>
                    <p><label style="font-weight: bold;">Copyright Notice: </label>The individual requesting reproductions expressly assumes the responsibility for compliance with all pertinent provisions of
                        the Copyright Act, 17 U.S.C. ss101 et seq. The patron further agrees to indemnify and hold harmless the Marist College Archives & Special
                        Collections and its staff in connection with any disputes arising from the Copyright Act, over the reproduction of material at the request of the
                        patron.</p>
                    <input type="checkbox" value="Accept" id="accept" name = "accept" class="checkbox" disabled="disabled"><span id="accept-cond" style="color: green; font-weight: bold"> I accept and agree with the conditions of use.</span></input></br></br>
                    <label>Applicant's Initials</label><input type="text" id="name" class="textinput" value = "<?php echo $userInitials ?>" readonly/>
                </div>

                <div class="accordion" id="requests"><h4 id ="requests">Section 3: Requests:</h4><span class="click">Click to Open/Close</span></div>
                <div class="formcontents" id="formcontents">
                    <div id='attachment'>
                        <h3 style="color:#b31b1b">Attached files:</h3></br>
                       <a href="<?php echo $attachmnetLink;?>"><?php echo $fileAttachment;?> </a></br><!--label ><!--?php echo $fileAttachment; ?></label-->
                    </div></br>
                    <?php if($sizeofRequests>0){?>
                    <h3>Requests</h3><br/>
                    <?php } ?>
                    <!--button id="buttonAdd-request" >+</button>
                    <!--button id="buttonRemove-request" disabled style="opacity: 0.5;">-</button--></br>
                    <div id="request_input" style="border-bottom: 1px solid; padding: 10px; display: none;">
                        <label class="label" for="collection">Collection:</label><br/><input type="text" id="request_collection" class="textinput" readonly <!--value="--><--?php /*echo $collection */?> "/>
                        <label class="label" for="boxno">Box Number:</label><br/><input type="text" id="request_boxno" class="textinput" readonly<!--value="--><--?php /*echo $boxNumber */?> "/>
                        <label class="label" for="itemno">Item Numbers:</label><br/><input type="text" id="request_itemno" class="textinput" readonly<!--value="--><--?php /*echo $itemNumber */?> "/>
                        <label class="label" for="dpi">Requested Resolution (dpi):</label><br/>
                        <input type="checkbox" name="dpi" value="72" class="checkbox" disabled>72</input>
                        <input type="checkbox" name="dpi" value="300" class="checkbox"disabled>300</input>
                        <input type="checkbox" name="dpi" value="600" class="checkbox"disabled>600</input>
                        <input type="checkbox" name="dpi" value="1200" class="checkbox"disabled>1200</input><br/><br/>
                        <label class="label" for="format">Requested File Format:</label><br/>
                        <input type="checkbox" name="format" value="pdf" class="checkbox"disabled>PDF</input>
                        <input type="checkbox" name="format" value="jpeg" class="checkbox"disabled>JPEG</input>
                        <input type="checkbox" name="format" value="tiff" class="checkbox"disabled>TIFF</input><br/><br/>
                        <label class="label" for="avformat">Audio/Video File Format:</label><br/>
                        <input type="checkbox" name="avformat" value="wav" class="checkbox"disabled>WAV</input>
                        <input type="checkbox" name="avformat" value="mp3" class="checkbox"disabled>MP3</input>
                        <input type="checkbox" name="avformat" value="mpeg" class="checkbox"disabled>MPEG</input>
                        <input type="checkbox" name="avformat" value="hd" class="checkbox" disabled>HD</input>
                        <input type="checkbox" name="avformat" value="mov" class="checkbox" style="background-color:black" disabled>MOV</input>
                        <br/><br/>
                        <label class="label" for="desc">Description of Use (Provided by the researcher):</label><br/><textarea id="request_desc" rows="4" cols="4" readonly/></textarea>
                    </div><!-- request_input template -->
                </div> <!-- formcontents -->
                <?php
                if(sizeof($chatList)>0){
                    ?>
                  <div class="accordion" id="1"><h4 align="left" id="1">Conversations</h4><span class="click">Click to Open/Close</span></div>
                <?php  }?>
                <div id="1-contents">

                    <!--table style="border: none; margin-top: -10px; margin-bottom: 10px; padding-left: 15px;"-->
                    <?php foreach ($chatList as $chat){ ?>
                        <!--tr>
							<?php echo "<td ><strong>".$chat['commentType'] . "</strong></p></td>";?>
							<?php echo "<td ><strong>DATE</strong></p></td>";?>
							<?php echo "<td ><strong>TIME</strong></p></td>";?>

						</tr>
						<tr>
							<?php echo "<td aria-autocomplete='inline'>".$chat['comment'] . "</td>";?>
							<?php echo "<td aria-autocomplete='inline'>".$chat['comment_add_date'] . "</td>";?>
							<?php echo "<td>".$chat['comment_add_time'] . "</td>";?>
						</tr-->
                        <div class="conversations">
                            <strong><?php echo "<td>".$chat['commentType']." - ". $chat['comment_add_date']." ". $chat['comment_add_time'] .": </td>";?></strong><br/>
                            <?php echo "<td aria-autocomplete='inline'>".$chat['comment'] . "</td>";?>
                        </div>

                    <?php } ?>
                </div>
                <!-- <div class="accordion" id="4"><h4 id="4" class="accordion">Upload Copies</h4><span class="click">Click to Open/Close</span></div>
                <div class='contents' id="copies_sent">
                </div>-->

                <!--form action="" id='complete' enctype="multipart/form-data"  method="post">
                    <div>

<!--                        <label for='upload'>Add Attachments:</label>
                        <input id='upload' class='btn' name="upload[]" type="file" multiple="multiple" onchange="updateList()"></br></br>
                        <div id="fileList">
                        </div>-->
                        </br>
                    <!--/div-->


                <!--/form-->

                <div id ="instructions">
                    </br><label class="label">Optional Message (This will be part of the email sent to the researcher):</label><br/><textarea id="instructions" rows="8" cols="75" style="display: block; margin-bottom: 10px;" ></textarea>
                </div>
                <button class="btn" type="submit" id="approve">Approve</button>
                <button class="btn" type="button" id="disapprove">Return for review</button></br>

				<div id="completeTransaction" style="visibility: hidden;">
                    <label class="label">Message:</label><br/><textarea id="message" name='message' rows="8" cols="75" style="display: block; margin-bottom: 10px;" ></textarea>
                    <button class="btn" type="button" id="complete">Complete Transaction</button>

                    <!--button class='btn' type="button" id="complete" name="submit" value="Complete Transaction"-->
                </div>

            </div>

                
        </div> <!-- content -->
    </div>

    <div class="bottom_container">
        <p class = "foot">
            James A. Cannavino Library, 3399 North Road, Poughkeepsie, NY 12601; 845.575.3199
            <br />
            &#169; Copyright 2007-2016 Marist College. All Rights Reserved.

            <a href="http://www.marist.edu/disclaimers.html" target="_blank" >Disclaimers</a> | <a href="http://www.marist.edu/privacy.html" target="_blank" >Privacy Policy</a> | <a href=<?php echo base_url("?c=usragr&m=ack");?> target="_blank">Acknowledgements</a>
      </p>
    </div>
    <script>
        $('div.accordion').click(function(){
            var div =$(this).attr('id');
            if(div == '1'){
                $('div#1-contents').toggle();
            }else if (div == '2'){
                $('div#2-contents').toggle();
            }else if (div == '3'){
                $('div#3-contents').toggle();
            }else if (div == 'requests'){
                $('div#formcontents').toggle();
            }else if(div=='4'){

                $('div#copies_sent').toggle();

            }

        });
    </script>
</body>

</html>

<?php
if(isset($_POST['submit'])){


/*    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        $files = array();
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
            $file_size = $_FILES['upload']['size'];
             print_r($file_size);
               //Get the temp file path
               $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

               //Make sure we have a filepath
               if ($tmpFilePath != "") {
                   //save the filename
                   // $shortname = $_FILES['upload']['name'][$i];
                   $shortname = str_replace(' ', '', $_FILES['upload']['name'][$i]);
                   $six_digit_random_number = mt_rand(100000, 999999);

                //save the url and the file
                $filePath = "/data/library/htdocs/archives/useagreement/completed/" . $userId.'_'.$six_digit_random_number.'_'.$shortname;
                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $link = "http://library.marist.edu/archives/useagreement/completed/";
                    array_push($files, $link.$userId.'_'.$six_digit_random_number.'_'.$shortname);
                  //  $files[] = $link.$userId.'_'.$six_digit_random_number.'_'.$shortname;
                    //insert into db
                    //use $shortname for the filename
                    //use $filePath for the relative url to the file
                }
            }
        }*/ //uploading file feature is disabled for time being
        $comment = $_POST["message"];
        $message = '<html><body>';

        $message .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';

        $message .= "<tr ><td align='center'><img src='https://s.graphiq.com/sites/default/files/10/media/images/Marist_College_2_220374.jpg'  /><h3> Marist Archives and Special Collection </h3><h3>COPY/USE AGREEMENT REQUEST</h3> ";

        $message .= "<br/><br/> <h4> Dear $userName ,<br /><br />We have sent you the requested copies through Marist Dropbox. Please verify them and let us know in case of any issues.</h4></tr>";

//$message .= "<tr><td colspan=2 font='colr:#3A5896;'><I>Link:<br></I> $url </td></tr>";
/*         $filestring = "";
        $i=0;
        for ($i=0;$i<sizeof($files);$i++){
            $message.= "<tr><td><I>Link: </I><a href='$files[$i]'> $files[$i]</a> </td></tr>";
            $filestring =$filestring.$files[$i];
            if($i<(sizeof($files)-1)){
                $filestring= $filestring.'||';
            }
        }*/
/*        foreach($files as $file){
            $message.= "<tr><td><I>Link:</I></br>$file </td></tr>";
            $filestring =$filestring.$file;
            $filestring= $filestring.'||';
        }*/

        $message .= "<tr><td colspan=2 font='colr:#3A5896;'><I>Comments/Instructions:<br></I><h4>$comment</h4></td></tr>";
        $message .= "</table>";

        $message .= "</body></html>";
   // }
    $message_body = $message ;
    $ci = get_instance();
    $ci->load->library('email');
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "tls://smtp.googlemail.com";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = "maristarchives@gmail.com";
    $config['smtp_pass'] = "20MaristArchives15";
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";

    $ci->email->initialize($config);

    $ci->email->from('maristarchives@gmail.com', "Marist Archives");
   // $ci->email->cc('dheeraj.karnati1@marist.edu');
    $ci->email->to($emailId);
    $ci->email->reply_to('maristarchives@gmail.com', "Marist Archives");
    $ci->email->message($message_body);
    $ci->email->subject("UseAgreement Request Copies");
    if( $ci->email->send()){


  // $response = file_get_contents(base_url('?c=usragr&m=update_status&status=4&files='.$filestring.'&userId='.$userId));
if($response) {

  //  header("Refresh:0");
        echo "<script>
   $('#requestStatus').show().css('background','#66cc00').append(\"\"  + \"File(s) has been uploaded and email sent to the user\");
     document.getElementById('step1').className='completed';
                document.getElementById('step2').className='completed';
                document.getElementById('step3').className='completed';
                document.getElementById('step4').className='completed';
                document.getElementById('step5').className='completed';
                document.getElementById(\"approve\").style.display = \"none\";
                document.getElementById(\"disapprove\").style.display = \"none\";
                document.getElementById(\"complete\").style.display = \"none\";
                document.getElementById(\"instructions\").style.display=\"none\";
                document.getElementById(\"message\").style.display = \"none\";

   </script>";

}
   }
    //show success message
    /* echo "<h1>Uploaded:</h1>";
    if(is_array($files)){
         echo "<ul>";
         foreach($files as $file){
             echo "<li>$file</li>";
         }
         echo "</ul>";
     }*/
}
?>