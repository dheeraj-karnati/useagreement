<!DOCTYPE html><html lang="en"><head>    <meta charset="utf-8">    <meta http-equiv="X-UA-Compatible" content="IE=edge">    <meta name="viewport" content="width=device-width, initial-scale=1">    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->    <title>Reserve Forms</title>    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    <link rel="shortcut icon" href="http://library.marist.edu/archives/icon/box.png" />    <link rel="stylesheet" type="text/css" href="http://library.marist.edu/css/library.css" />    <link rel="stylesheet" type="text/css" href="http://library.marist.edu/css/library_child.css" />    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">    <script src="//code.jquery.com/jquery-1.10.2.js"></script>    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>    <link rel="stylesheet" type="text/css" href="http://library.marist.edu/archives/mainpage/mainStyles/style.css" />    <link rel="stylesheet" type="text/css" href="http://library.marist.edu/archives/mainpage/mainStyles/main.css" />    <link rel="stylesheet" type="text/css" href="styles/useagreement.css" />    <script type="text/javascript" src="http://library.marist.edu/archives/mainpage/scripts/archivesChildMenu.js"></script>    <!-- Bootstrap -->    <link href="styles/bootstrap.min.css" rel="stylesheet">    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>    <script src="js/bootstrap.min.js"></script>    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script></head><body><div id="headerContainer">    <div id="header">    </div>    <!-- /header --></div><div id="menu">    <div id="menuItems">    </div><!-- /menuItems --></div><!-- /menu --><div class="container">    <div class="page-header">        <h3 align="center">Use Agreement Requests</h3>    </div>    <label class="label" for="collection">Filter By Status:</label><br/>    <select id ="status" style="width: 100px;" >        <option value="All" class="selectinput">All</option>        <option value="Submitted" class="selectinput">Submitted</option>        <option value="Returned" class="selectinput">Returned</option>        <option value="Approved" class="selectinput">Approved</option> </select></br></br>    <div class="table-responsive" id="the-content"><table align="center" class="table table-striped table-bordered">    <thead>    <tr>        <th>ID</th>        <th>Name</th>        <th>Attachments(if any)</th>        <th>Status</th>        <th>Date</th>    </tr>    </thead>    <tbody>    <?php $offset = $this->uri->segment(3, 0) + 1; ?>    <?php foreach ($query->result() as $row): ?>        <tr>            <td><a href="<?php echo base_url("?c=usragr&m=reviewRequest&userId=").$row ->userId?>"><?php echo $row ->userId ?></a></td>            <td><?php echo $row->userName; ?></td>            <td><?php echo $row->attachment ?></td>            <td><?php if($row->status == 1){ ?>                    Returned                <?php } else if($row->status == 2){ ?>                    Submitted                <?php } else if($row->status == 3){ ?>                    Approved                <?php } else if($row->status == 0){ ?>                  Initiated                <?php }?>            </td>            <td><?php echo $row->date; ?></td>        </tr>    <?php endforeach; ?>    </tbody></table>        <div align="right" id="NumRecords">            <label class="label" for="collection">Total:<?php echo $total_rows?></label>        </div><nav class='text-center'>    <?php echo $pagination_links; ?></nav>    </div></div><div class="bottom_container">    <p class = "foot">        James A. Cannavino Library, 3399 North Road, Poughkeepsie, NY 12601; 845.575.3199        <br />        &#169; Copyright 2007-2016 Marist College. All Rights Reserved.        <a href="http://www.marist.edu/disclaimers.html" target="_blank" >Disclaimers</a> | <a href="http://www.marist.edu/privacy.html" target="_blank" >Privacy Policy</a> | <a href="http://library.marist.edu/ack.html?iframe=true&width=50%&height=62%" rel="prettyphoto[iframes]">Acknowledgements</a>    </p></div><script>    $("body").on("click", ".pagination a", function() {        var url = $(this).attr('href');        $("#the-content").load(url);        return false;    });    $("#status").change(function(){        if ($(this).val() == "Submitted") {            var url = "<?php echo base_url("?c=usragr&m=useAgreementRequests&status=2")?>";            $("#the-content").load(url);        }else if($(this).val() == "Approved"){            var url = "<?php echo base_url("?c=usragr&m=useAgreementRequests&status=3")?>";            $("#the-content").load(url);        }else if($(this).val() == "Returned"){            var url = "<?php echo base_url("?c=usragr&m=useAgreementRequests&status=1")?>";            $("#the-content").load(url);        }        else if($(this).val() == "All"){            var url = "<?php echo base_url("?c=usragr&m=pages")?>";            $("#the-content").load(url);        }    });</script></body></html>