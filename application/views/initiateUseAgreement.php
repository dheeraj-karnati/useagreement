<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reserve Forms</title>
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
    <script type="text/javascript" src="http://library.marist.edu/archives/mainpage/scripts/archivesChildMenu.js"></script>
    <script type="text/javascript" src="js/cloneRequests.js"></script>
    <script type="text/javascript">

        function verifyEmail(email){
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
                return false;
            }
        }
        uploadedFile = function() {
            $('#message').remove();
            var input = document.getElementById('uploaded_file');
            var output = document.getElementById('fileInfo');

            output.innerHTML = '<ul>';

          //  for (var i = 0; i < input.files.length; ++i) {
                if(input.files.item(0).size> 2000000){

                    output.innerHTML += '<li>' + input.files.item(0).name + "<h4 style='color: red'>(Exceeded 2 MB File size limit)<h4>"+'</li>';

                }else {
                   // output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
                    //output.innerHTML += '<li>' + input.files.item(i).size + '</li>';
                }
         //   }
            output.innerHTML += '</ul>';

        }
        $(document).ready(function() {

            $('#datepicker').datepicker();
            $("#datepicker").datepicker("setDate", new Date());
            $('div#request_input').clone();

            /* Validation */
            $('input#name').keydown(function (e) {
                if ((e.which == 9) && ($(this).val().length == 0)) {
                    $(this).css('border', '1px solid red');
                } else {
                    $(this).css('border', '1px solid #ccc');
                }
            });

            $('input#email').keydown(function (e) {
                $(this).css('border', '1px solid #ccc');
            });

            /* validation ends */
            $('#request_added_by').change(function () {
                if ($(this).val() == 'Archivist') {
                    $('div#requests').show();
                } else {
                    $('div#requests').hide();
                }
            });

            function progress(e) {

                if (e.lengthComputable) {
                    var max = e.total;
                    var current = e.loaded;

                    var Percentage = (current * 100) / max;
                    console.log(Percentage);


                    if (Percentage >= 100) {
                        // process completed
                    }
                }
            }

            $('button#initiate').click(function () {
                var filesize = 0;
                if($('input#uploaded_file')[0].files[0]) {
                    filesize  = $('input#uploaded_file')[0].files[0].size / 1024 / 1024;
                }
                if (filesize <= 2 ){
                 //   var input = document.getElementById('uploaded_file');
                //var output = document.getElementById('fileInfo');
                if ($('input#name').val() == "") {
                    $('input#name').css('border', '1px solid red');
                    $("html, body").animate({scrollTop: 0}, 600);
                } else if (verifyEmail($('input#email').val()) == false) {
                    $('input#email').css('border', '1px solid red');
                    $("html, body").animate({scrollTop: 0}, 600);
                }
                else {
                    var date = $('input#datepicker').val();
                    var userName = $('input#name').val();
                    var address = $('input#address').val();
                    var citystate = $('input#citystate').val();
                    var zipCode = $('input#zip').val();
                    var emailId = $('input#email').val();
                    var comments = $('textarea#comments').val();
                    var phoneNumber = $('input#phoneNo').val();
                    var requestCount = $("#formcontents > div").length - 1;
                    var requestList = [];
                    //alert (requestCount);
                    //iterating multiple requests.
                    for (var i = 1; i <= requestCount; i++) {
                        var checked = [];
                        var imageResolutions = "";
                        var fileFormats = "";
                        var avFormats = "";
                        var str1 = "div#request_input";
                        var str2 = str1.concat(i);
                        var request = [];
                        var reqCollection = $(str2.concat(" select#collection")).val();
                        //var reqCollection = $(str2.concat(" input#request_collection")).val();

                        var boxNumber = "";//$(str2.concat(" input#request_boxno")).val()
                        var itemNumber = $(str2.concat(" input#request_itemno")).val();
                        var descOfUse = $(str2.concat(" textarea#request_desc")).val();
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
                        request.push(descOfUse);
                        requestList.push(request);
                    }
                    //alert(requestList);
                    $.post("<?php echo base_url("?c=usragr&m=insertNewResearcher");?>", {
                        date: date,
                        userName: userName,
                        address: address,
                        zipCode: zipCode,
                        citystate: citystate,
                        emailId: emailId,
                        comments: comments,
                        phoneNumber: phoneNumber,
                        requestCount: requestCount,
                        requestList: requestList

                    }).done(function (userId) {
                        if (userId > 0) {
                            if($('input#uploaded_file')[0].files[0]) {
                            var m_data = new FormData();
                            m_data.append('user_name', $('input#name').val());
                            m_data.append('user_email', $('input#email').val());
                            m_data.append('phone_number', $('input#phoneNo').val());
                            m_data.append('file_attach', $('input#uploaded_file')[0].files[0]);
                            m_data.append('date', $('input#datepicker').val());
                            m_data.append('comments', $('textarea#comments').val());
                            var pcdone = 0;
                            $.ajax({

                                xhr: function () {
                                    var xhr = new window.XMLHttpRequest();
                                    xhr.upload.addEventListener("progress", function (evt) {
                                        if (evt.lengthComputable) {
                                            var percentComplete = evt.loaded / evt.total;
                                            console.log(percentComplete);
                                            pcdone = percentComplete;
                                            $('.progress').css({
                                                width: percentComplete * 100 + '%'

                                            });
                                            if (percentComplete === 1) {
                                                $("#progressstatus").html("<p color='black'>File Upload is in progress</p>");

                                            }
                                        }
                                    }, false);
                                    return xhr;
                                },

                                type: "POST",
                                url: "<?php echo base_url("?c=usragr&m=InitiateWithMailAttachment&userId=");?>" + userId,
                                data: m_data,
                                processData: false,
                                contentType: false,
                                cache: false,

                                success: function (response) {
                                    //load json data from server and output message
                                    if (response.type == 'error') { //load json data from server and output message
                                        output = '<div class="error">' + response.text + '</div>';
                                    } else {
                                        setTimeout(function () {
                                            $('.progress').addClass('hide');
                                            $("#progressstatus").html("<p color='black'></p>");
                                            $('#requestStatus').show().css('background', '#66cc00').append("#" + userId + ": A User Agreement Form has been sent to " + userName);

                                        }, 5000);


                                        // output = '<div class="success">' + response.text + '</div>';
                                    }
                                    $("#contact_form #contact_results").hide().html(output).slideDown();
                                }
                            });

                            /* } else {

                             $('#requestStatus').show().css('background', '#66cc00').append("#" + userId + ": A User Agreement Form has been sent to " + userName);


                             }*/
                        }else{

                                var m_data = new FormData();
                                m_data.append('user_name', $('input#name').val());
                                m_data.append('user_email', $('input#email').val());
                                m_data.append('phone_number', $('input#phoneNo').val());
                                m_data.append('date', $('input#datepicker').val());
                                m_data.append('comments', $('textarea#comments').val());
                                var pcdone = 0;
                                $.ajax({


                                    type: "POST",
                                    url: "<?php echo base_url("?c=usragr&m=InitiateWithMailAttachment&userId=");?>" + userId,
                                    data: m_data,
                                    processData: false,
                                    contentType: false,
                                    cache: false,

                                    success: function (response) {
                                        //load json data from server and output message
                                        if (response.type == 'error') { //load json data from server and output message
                                            output = '<div class="error">' + response.text + '</div>';
                                        } else {

                                            $('#requestStatus').show().css('background', '#66cc00').append("#" + userId + ": A User Agreement Form has been sent to " + userName);

                                        }
                                        $("#contact_form #contact_results").hide().html(output).slideDown();
                                    }
                                });

                            }

                        }
                         else {
                            $('#requestStatus').show().css('background', '#b31b1b').append("Something wrong with the form. Contact Administrator");

                        }
                      //  $("html, body").animate({scrollTop: 0}, 600);
                    });
                }


            }else{
                    $('#requestStatus').show().css('background', '#b31b1b').append("<div id='message'>Uploaded file size should be less than 2 MB</div>");

                }
                $("html, body").animate({scrollTop: 0}, 600);
            });


        });
    </script>
<style>
    .progress {
        display: block;
        text-align: center;
        width: 0;
        height: 15px;
        background: #07bb6c;
        transition: width 10.5s;
        border-color: #0c0c0c;
    }
    .progress.hide {
        opacity: 0;
        transition: opacity 2.3s;
    }
    .progress.status {
        top:3px;
        left:5%;
        position:absolute;
        display:inline-block;
        color: #000000;
    }


</style>
</head>
<body>
<div id="headerContainer">
    <div id="header">
        <div id="logo">

        </div><!-- /logo -->
    </div>
    <!-- /header -->
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
            <div id="researcherInfo"><h1 class="page_head" style="float: none;">User Agreement Initiation Form</h1>

                <div id="requestStatus" style="width: auto; height:40px; margin-bottom: 7px; margin-top: -15px; color:#000000; font-size: 12pt; text-align: center; padding-top: 10px; display: none;">
                </div></br>
                <div id ="progressstatus"></div>
                <div class="progress"></div>
                <h2>Researcher's Information:</h2>
                <div class="formcontents">
                    <label class="label">Date:</label><br/><input type="text" id="datepicker" class="textinput" style="width: 100px;"/>
                    <label class="label">Researcher's Name:</label><br/><input type="text" id="name" class="textinput"/>
                    <label class="label">Address:</label><br/><input type="text" id="address" class="textinput" />
                    <label class="label">City/State:</label><br/><input type="text" id="citystate" class="textinput" />
                    <label class="label">Zip:</label><br/><input type="text" id="zip" class="textinput" />
                    <label class="label">Phone Number:</label></br><input type="text" id="phoneNo" class="textinput" />
                    <!--p><label class="label">City/State:</label><input type="text" id="citystate" class="textinputinline" style="margin-right: 20px;"/><label class="label">Zip:</label><input type="text" id="zip" class="textinputinline" style="width:125px;"/></p-->
                    <label class="label">Email:</label><br/><input type="text" id="email" class="textinput" />
                    <!--input type="text" id="request_collection" class="textinput"/-->
                </div>
                <div id="requests">
                    <h2>Requests:</h2>
                    <div class="formcontents" id="formcontents">
                        <h3>Add/Remove Requests</h3><br/></br>
                        <button id="buttonAdd-request">+</button>
                        <button id="buttonRemove-request" disabled style="opacity: 0.5;">-</button></br>
                        <div id="request_input" style="border-bottom: 1px solid; padding: 10px; display: none;">
                            <label class="label" for="collection">Collection:</label><br/>
                            <select id ="collection" style="width: 500px;" >
                                <option value="Lowell Thomas Papers" class="selectinput">Lowell Thomas Papers</option>
                                <option value="Lowell Thomas Capital Cities" class="selectinput">Lowell Thomas Capital Cities</option>
                                <option value="Emmy Award Winning Video Collection">Emmy Award Winning Video Collection</option>
                                <option value="Walt Hawver Collection">Walt Hawver Collection</option>
                                <option value="John Tillman Collection">John Tillman Collection</option>
                                <option value="George Carroll Papers">George Carroll Papers</option>
                                <option value="Fred Crawford Papers">Fred Crawford Papers</option>
                                <option value="Cornwall Pumped Storage Project Collection">Cornwall Pumped Storage Project Collection</option>
                                <option value="Duggan Family Papers">Duggan Family Papers</option>
                                <option value="Henry Dain Papers">Henry Dain Papers</option>
                                <option value="The Arthur Glowka Papers">The Arthur Glowka Papers</option>
                                <option value="John Grim Collection">John Grim Collection</option>
                                <option value="Hudson River Conservation Society, Inc. Collection">Hudson River Conservation Society, Inc. Collection</option>
                                <option value="Hudson River Environmental Society Collection">Hudson River Environmental Society Collection</option>
                                <option value="Hudson River Environmental Society Library">Hudson River Environmental Society Library</option>
                                <option value="Hudson River Sloop Clearwater, Inc. Collection">Hudson River Sloop Clearwater, Inc. Collection</option>
                                <option value="Hudson River Valley Commission Collection: Records Relating to the Storm King Case, 1966 - 1967">Hudson River Valley Commission Collection: Records Relating to the Storm King Case, 1966 - 1967</option>
                                <option value="Hudson River Valley Commission Collection: Records Relating to the 1965 - 1970 Surveys">Hudson River Valley Commission Collection: Records Relating to the 1965 - 1970 Surveys</option>
                                <option value="Hudson River Valley Greenway Council Collection">Hudson River Valley Greenway Council Collection</option>
                                <option value="Hudson Valley GREEN Collection">Hudson Valley GREEN Collection</option>
                                <option value="On the River Collection">On the River Collection</option>
                                <option value="Alexander Saunders Papers">Alexander Saunders Papers</option>
                                <option value="Scenic Hudson Collection: Records Relating to the Storm King Case, 1963 - 1981">Scenic Hudson Collection: Records Relating to the Storm King Case, 1963 - 1981</option>
                                <option value="Scenic Hudson Decision Hearings Transcripts Collection">Scenic Hudson Decision Hearings Transcripts Collection</option>
                                <option value="Scenic Hudson, Inc. Administrative History Collection">Scenic Hudson, Inc. Administrative History Collection</option>
                                <option value="Whitney N. Seymour Jr. Papers">Whitney N. Seymour Jr. Papers</option>
                                <option value="The Fred Starner Collection">The Fred Starner Collection</option>
                                <option value="Edvard Bech Collection">Edvard Bech Collection</option>
                                <option value="Annia F. Booth Papers">Annia F. Booth Papers</option>
                                <option value="Cathedral College Collection: Class of 1924">Cathedral College Collection: Class of 1924</option>
                                <option value="Catholic Studies Collection">Catholic Studies Collection</option>
                                <option value="Coffin Family Papers">Coffin Family Papers</option>
                                <option value="Community Experimental Repertory Theatre (C.E.R.T.) Collection">Community Experimental Repertory Theatre (C.E.R.T.) Collection</option>
                                <option value="Cunneen-Hackett Family Papers">Cunneen-Hackett Family Papers</option>
                                <option value="Henry and Elizabeth Eugle Collection">Henry and Elizabeth Eugle Collection</option>
                                <option value="Hudson River Ships and Commerce Collection">Hudson River Ships and Commerce Collection</option>
                                <option value="Hyde Park Stone Wall Restoration Project Collection">Hyde Park Stone Wall Restoration Project Collection</option>
                                <option value="Intercollegiate Rowing Association Collection">Intercollegiate Rowing Association Collection</option>
                                <option value="McCann Postcard Collections">McCann Postcard Collections</option>
                                <option value="Reese Family Papers">Reese Family Papers</option>
                                <option value="Scrapbook Collection">Scrapbook Collection</option>
                                <option value="Stewart Newburgh Airport Records">Stewart Newburgh Airport Records</option>
                                <option value="College Archives - Photograph Collection">College Archives - Photograph Collection</option>
                                <option value="College Archives">College Archives</option>
                                <option value="College Archives - Audio-Visual Collection">College Archives - Audio-Visual Collection</option>
                                <option value="Stanley Becchetti Collection">Stanley Becchetti Collection</option>
                                <option value="Brother Cornelius Russell Papers">Brother Cornelius Russell Papers</option>
                                <option value="Student Newspapers: The Record and The Circle">Student Newspapers: The Record and The Circle</option>
                                <option value="Brother Gerard Matthew Weiss Papers">Brother Gerard Matthew Weiss Papers</option>
                                <option value="Thomas Steininger Collection">Thomas Steininger Collection</option>
                                <option value="Joseph (Joe) McHugh, Jr. Collection">Joseph (Joe) McHugh, Jr. Collection</option>
                                <option value="Student Theatre Collection">Student Theatre Collection</option>
                                <option value="Nelly Goletti Papers">Nelly Goletti Papers</option>
                                <option value="Rick Whitesell Collection">Rick Whitesell Collection</option>
                                <option value="James T. Cox Collection">James T. Cox Collection</option>
                                <option value="Gill Family Fore-Edge Painting Collections">Gill Family Fore-Edge Painting Collections</option>
                                <option value="Geraldine Geller Collection">Geraldine Geller Collection</option>
                                <option value="Blaise Pascal Collection">Blaise Pascal Collection</option>
                                <option value="Other">Other</option>
                            </select><!--input type="text" id="request_collection" class="textinput"/-->
                            </br></br><!--label class="label" for="boxno">Box Number:</label><br/><input type="text" id="request_boxno" class="textinput"/-->
                            <label class="label" for="itemno">Item Numbers:</label><br/><input type="text" id="request_itemno" class="textinput"/>
                            <label class="label" for="dpi">Requested Resolution (dpi):</label><br/>
                            <input type="checkbox" name="dpi" value="72" class="checkbox">72</input>
                            <input type="checkbox" name="dpi" value="300" class="checkbox">300</input>
                            <input type="checkbox" name="dpi" value="600" class="checkbox">600</input>
                            <input type="checkbox" name="dpi" value="1200" class="checkbox">1200</input><br/><br/>
                            <label class="label" for="format">Requested File Format:</label><br/>
                            <input type="checkbox" name="format" value="pdf" class="checkbox">PDF</input>
                            <input type="checkbox" name="format" value="jpeg" class="checkbox">JPEG</input>
                            <input type="checkbox" name="format" value="tiff" class="checkbox">TIFF</input><br/><br/>
                            <label class="label" for="avformat">Audio/Video File Format:</label><br/>
                            <input type="checkbox" name="avformat" value="wav" class="checkbox">WAV</input>
                            <input type="checkbox" name="avformat" value="mp3" class="checkbox">MP3</input>
                            <input type="checkbox" name="avformat" value="mpeg" class="checkbox">MPEG</input>
                            <input type="checkbox" name="avformat" value="hd" class="checkbox">HD</input>
                            <input type="checkbox" name="avformat" value="mov" class="checkbox">MOV</input>
                            <br/><br/>
                            <label class="label" for="desc">Description of Use (Provided by the researcher):</label><br/><textarea id="request_desc" rows="4" cols="4"/></textarea>

                        </div><!-- request_input template -->
                    </div>
                    <h3 align="center">(OR)</h3><br/>
                    <h3>Add Attachment</h3><br/></br>
                    <input align="center" class='btn' type="file" name="uploaded_file" onchange="uploadedFile()" id="uploaded_file"><br/></br>
                       <div id="fileInfo"></div>
                     <!-- formcontents -->
                </div>

                <label class="label">Optional Message (This will be part of the email sent to the researcher):</label><br/><textarea id="comments" rows="8" cols="75" style="display: block; margin-bottom: 10px;"></textarea>

                <button class="btn" type="button" id="initiate">Initiate Use Agreement &amp; Send email</button>
            </div> <!-- researcherInfo -->
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

</body>
</html>
